<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/7db0450798.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css"/>
    
    <style>
      .pagination li a:hover{
        background-color: rgb(157, 156, 152)
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

      <section id="popular" class="my-1 py-1">
        <div class="container text-center mt-3 py-3">
          <h3>our products</h3>
          <em><hr></em>
          <p> Here are our different products</p>
        </div>

        <div class="row mx-auto container">
        <?php include('server/all.php') ?>

   <?php while($row= $all_result->fetch_assoc()) {?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image'] ?>" alt="">
            <h4 class="p-name"><?php echo $row['product_name'] ?></h4>
            <h4 class="p-price">Price: RS <?php echo $row['product_price'] ?></h4>
           <a href="single_page.php?product_id=<?php echo $row['product_id']?>"> <button class="buy-btn">BUY NOW</button></a>
          </div>
          <?php } ?>

        </div>
          

          <nav style="background-color: white;" aria-label="page navigation example">
            <ul class="pagination px-5 mt-5">
              <li class="page-item"><a class="page-link" href="#">previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">next</a></li>

            </ul>
          </nav>
        </div>
      </section>

      
         <!--footer-->
    <footer class="mt-5 py-5">
        <div class="container row">
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
        </div>

         
  
  
      </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>