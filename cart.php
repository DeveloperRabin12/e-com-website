<?php
include ('server/connection.php');

session_start();

if(isset($_POST['add_to_cart'])){
  
  //if something is added
          if(isset($_SESSION['cart'])){

            $product_ids=array_column($_SESSION['cart'],'product_id');

            if(!in_array($_POST['product_id'],$product_ids)){

              $product_id=$_POST['product_id'];
            $product_image=$_POST['product_image'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $quantity=$_POST['quantity'];

            $_SESSION['cart'][$product_id]=array(
              //key => value
              "product_id"=>$product_id,
              "product_image"=>$product_image,
              "product_name"=>$product_name,
              "product_price"=>$product_price,
              "quantity"=>$quantity);
            }

            else{
              echo "<script>alert('product already added to cart')</script>";
              //echo "<script>window.location='index.php'</script>";
            }
              

          }
          else{

            //if nothing is added to cart
            $product_id=$_POST['product_id'];
            $product_image=$_POST['product_image'];
            $product_name=$_POST['product_name'];
            $product_price=$_POST['product_price'];
            $quantity=$_POST['quantity'];

            $_SESSION['cart'][$product_id]=array(
              //key => value
              "product_id"=>$product_id,
              "product_image"=>$product_image,
              "product_name"=>$product_name,
              "product_price"=>$product_price,
              "quantity"=>$quantity
            );
          }
          //calculate total price
  total_price();

}

 
//remove product from cart
elseif( isset($_POST['remove-btn'])){
  unset($_SESSION['cart'][$_POST['product_id']]);

  //calculate total price
  total_price();

}
//if edit button is pressed
elseif(isset($_POST['edit-btn'])){

  //first getting id and quantity
  $product_id=$_POST['product_id'];
  $quantity=$_POST['quantity']; 

  //then getting the product array there mmay be more than one
  $product_array=$_SESSION['cart'][$product_id];

  //then updating the quantity
  $product_array['quantity']=$quantity;

  //return the updated array
  $_SESSION['cart'][$product_id]=$product_array;

  //calculate total price
  total_price();
}
else{
 // header('location:index.php');
}

  //cacculation of total

  function total_price(){
    $total=0;

    foreach($_SESSION['cart'] as $key => $value){
      $product = $_SESSION['cart'][$key];
      $total = $total + ($product['product_price'] * $product['quantity']);
  }

  $_SESSION['total-prc']=$total; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/7db0450798.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <style>
      .cart1 table{
        width: 100%;
        border-collapse: collapse;

      }

      .cat1 .product-info{
        display: flex;
        gap: 20px;
      }

      .cart1 th{
        text-align: left;
        padding: 5px;
        color: white;
        background-color: black;
      }

      .cart1 td{
        padding: 5px;
        text-align: left;
      }

      .cart1 img{
        width: 100px;
        height: 100px;
      }
     .cart1 td input{
       width: 40px;
      
     }
     .cart1 td a{
      color: black;
     }

     .cart1 .total{
      display: flex;
      justify-content: flex-end;
     }

     .cart1 .remove-btn{
       background-color: black;
       width: 100px;
       color: white;
       padding: 5px 10px;
       border: none;
       cursor: pointer;
     }

     .cart1 .edit-btn{
       background-color: black;
       width: 100px;
       color: white;
       padding: 5px 10px;
       border: none;
       cursor: pointer;
     }

     .cart1 .total table{
       width: 50%;
       max-width: 600px;
     }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
      <div class="container">
       <img onclick="window.location.href='index.php'" class="logo" src="assets/images/samaan-logo.png"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>

        
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

            <li class="nav-item">
              <a href="cart.php" class="icon"><i class="fa-solid fa-bag-shopping"></i></a>
              <a href="login.php" class="icon"><i class="fa-solid fa-user"></i></a>
            </li>
            
          </ul>
         
        </div>
      </div>
    </nav>

      <!--cart section-->
      <section class="cart1 container  my-2 py-1">
        <div class=" container my-5 py-5">
          <h1><b>CART</b></h1>
          <hr>
        </div>

        <table>
          <tr>
            <th>Product Details</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>


          <?php foreach($_SESSION['cart'] as $key => $value){?>
          <tr>
            <td>
              <div class="product-info">
                <img src="assets/images/<?php echo $value['product_image'] ?>" alt="">
                <div>
                  <p><?php echo $value['product_name']?></p>
                  <small>RS <?php echo $value['product_price'] ?></small>
                  <br>
                  <form method="post" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']?>">
                    <input type="submit" name="remove-btn" class="remove-btn" value="Remove">
                  </form>
                </div>
              </div>
            </td>
            <td>
              
              <form method="post" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
              <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>">
              <input type="submit" value="edit" name="edit-btn" class="edit-btn">
              </form>
            </td>

            <td><p>RS <?php echo $value['quantity']* $value['product_price'] ?></p></td>
            
          </tr>
       <?php } ?>
          
        </table>

        <div class="total">
          <table>
        

          <tr>
            <td>total</td>
            <td>RS <?php echo $_SESSION['total-prc'] ?></td>
          </tr>
          </table>
        </div>

        <div class="checkout">
          <form method="post" action="checkout.php">
            <input type="submit" name="checkout-btn" value="checkout" class="btn checkout-btn">
          </form>
        </div>
      </section>






      <footer class="mt-5 py-5">
        <div class="row">
                    <div class="footer-one col-lg-4 col-md-6 col-sm-12 px-5">
                    <img class="logo" src="assets/images/samaan-logo.png"/>
                    <p class= "pt-3">Lorem ipsum dolor sit amet.</p>
                    </div>
        <div class="footer-one col-lg-4 col-md-6 col-sm-12">
          <h5>Quick Links</h5>
          <ul class="text-uppercase">
            <li><a href="#">washing mschine</a></li>
            <li><a href="#">Refrigerator</a></li>
            <li><a href="#">Television</a></li> 
            <li><a href="#">other house items</a></li>                   
          </ul>
        </div>
  
        <div class="footer-one col-lg-4 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
            <h6 class="text-uppercase">Address</h6>
            <p>bkt muncipality, sallaghari</p>
            </div>
            <div>
            <h6 class="text-uppercase">Ring Us</h6>
            <p>+977-98-42589638</p>
            </div>
            <div>
            <h6 class="text-uppercase">Email</h6>
            <p>hamroelecto@email.com</p>
            </div>
        </div>
  
  
             
  
        <div class="copyright mt-5 ">
                <div class="row container mx-auto">
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <p>We Accept</p>
                    <img src="assets/images/Online-Payment-Gateway.jpg"/>
                  </div>
  
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-nowrap text-center">
                    <p>copyright @ 2024 hamroelectric all right reserve</p>
                  </div>
  
                  <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                    <a href="#"><i class="fab fa-facebook" ></i></a>
                    <a href="#"><i class="fab fa-instagram" ></i></a>
                    <a href="#"><i class="fab fa-twitter" ></i></a>
                </div>
              </div>
        </div>
         
  
  
      </footer>
  
     
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html>      