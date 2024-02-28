<?php 

include('server/connection.php');
if(isset($_GET['product_id'])){
 $product_id=$_GET['product_id'];
 $stmt = $conn -> prepare("SELECT * from products Where product_id=?");
 $stmt->bind_param("i",$product_id);
  $stmt->execute();

  $product = $stmt->get_result();
}

else{
  header('losation:index.php');
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
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
      <div class="container">
       <img class="logo" src="assets/images/mainlogo.png"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="shop.html">Shop</a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            <li class="nav-item">
              <a href="cart.html" class="icon"><i class="fa-solid fa-bag-shopping"></i></a>
              <a href="login.html" class="icon"><i class="fa-solid fa-user"></i></a>
            </li>
            
          </ul>
         
        </div>
      </div>
    </nav>


      <section class="single my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-2" src="assets/images/<?php echo $row['product_image'] ?>" alt="">
            </div>
                <?php while($row = $product->fetch_assoc()) {?>
            <div class="col-lg-6 col-md-12 col-sm-12">
              <?php ?>
                <h4><?php echo $row['product_name'] ?></h4>
                <h3 class="py-3">Price Rs <?php echo $row['product_price'] ?></h3>
                <input type="number" value="1">
                <button class="buy-btn">Add to cart</button>
                <h4 class="mt-3 mb-3">DETAILS</h4>
                <span><?php echo $row['product_description'] ?></span>
            </div>
            <?php } ?>
        </div>
      </section>










         <!--footer-->
    <footer class="mt-5 py-5">
        <div class="row">
                    <div class="footer-one col-lg-4 col-md-6 col-sm-12 px-5">
                    <img class="logo" src="assets/images/mainlogo.png"/>
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
