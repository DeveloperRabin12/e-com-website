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
        #popular img,#w-machine img,#fridge img,#h-items img{
          border:2px solid black;
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
            <ul class="navbar-nav me-auto mx-auto  mb-lg-0">
             
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
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

    <!--section-->
      <section id="home">
        <div class="container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span> Offerings</h1>
          <p>Our store offer good things at best Prices</p>
          <button onclick="window.location.href='shop.php'">shop now</button>
        </div>
      </section>

      
      <!--new Arival-->
      <section id="new" class="w-100">
        <div class="container text-center mt-3 py-3">
          <h3>Our New Products</h3>
          <hr>
          <p> Here are our new ARRIVALS</p>
        
        <div class=" container row mx-auto ">
    
                <div onclick="wiindow.location.href='single_page.php'" class="one col-lg-4 col-md-12 col-sm-12 p-0">
                  <img class="img-fluid"  src="assets/images/ac1.jpg" alt="">
                  <div class="details">
                    <h2>Air Conditioner</h2>
                    <button class="text-uppercase">BUY NOW</button>
                  </div>
                </div>

              <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid"  src="assets/images/vacc1.jpg" alt="">
                <div class="details">
                  <h2>Vaccum Cleaner</h2>
                  <button class="text-uppercase">BUY NOW</button>
                </div>
              </div>

                <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid"  src="assets/images/oven.jpg" alt="">
                <div class="details">
                  <h2>Microwave oven</h2>
                  <button class="text-uppercase">BUY NOW</button>
                </div>
               </div>
        </div>
      </div>

      </section>

  <!--popular-->
      <section id="popular" class="my-2 pb-2">
        <div class="container text-center mt-5 py-5">
          <h3>OUR Popular</h3>
          <hr>
          <p> Here are our popular products</p>
        </div>

        <div class="row mx-auto container">
        
<?php include('server/get_product.php') ?>

<?php while($row= $product_result->fetch_assoc()) {?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/images/popular/<?php echo $row['product_image'] ?>" alt="">
            <h4 class="p-name"><?php echo $row['product_name'] ?></h4>
            <h4 class="p-price">Price: rs <?php echo $row['product_price'] ?></h4>
            <a href="single_page.php?product_id=<?php echo $row['product_id'] ?>"><button class="buy-btn">BUY NOW</button></a>
          </div>

                    <?php } ?>
        </div>
      </section>

    <!--washing machines-->
    <section id="w-machine" class="my-5">
      <div class="container text-center mt-3 py-3">
        <h3>Washing Machines</h3>
        <hr>
        <p> Here are our Washing Machines</p>
      </div>

      <div class="row mx-auto container">

      <?php include('server/get_washing.php') ?>

      <?php while($row = $washing_result->fetch_assoc()) {?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image'] ?>" alt="">
          <h4 class="p-name"><?php echo $row['product_name'] ?></h4>
          <h4 class="p-price">Price: Rs <?php echo $row['product_price'] ?></h4>
          <a href="single_page.php?product_id=<?php echo $row['product_id'];?>"><button class="buy-btn">BUY NOW</button></a>
        </div>

        
      <?php } ?>
      </div>
    </section>

    <!--refrigerator-->
    <section id="fridge" class="my-3">
      <div class="container text-center mt-5 py-5">
        <h3>Refrigerator</h3>
        <hr>
        <p> Here are our Refrigerator</p>
      </div>

      <div class="row mx-auto container">

      <?php include('server/get_fridge.php') ?>

      <?php while($row = $f_result->fetch_assoc()) {?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/images/refri/<?php echo $row['product_image'] ?>" alt="">
          <h4 class="p-name"><?php echo $row['product_name'] ?></h4>
          <h4 class="p-price">Price: RS <?php echo $row['product_price'] ?></h4>
          <a href="single_page.php?product_id=<?php echo $row['product_id'] ?>"><button class="buy-btn">BUY NOW</button></a>
        </div>

         <?php } ?>
      </div>
    </section>

    <!--other house items-->
    <section id="h-items" class="my-5">
      <div class="container text-center mt-5 py-5">
        <h3>Other House Items</h3>
        <hr>
        <p> Here are our other house items</p>
      </div>

      <div class="row mx-auto container">

    <?php include('server/get_house_items.php') ?>
     <?php while($row = $houseitem_result->fetch_assoc()) {?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12 ">
          <img class="img-fluid mb-3" src="assets/images/otherhouse/<?php echo $row['product_image'] ?>" alt="">
          <h4 class="p-name"><?php echo $row['product_name'] ?></h4>
          <h4 class="p-price">Price: Rs <?php echo $row ['product_price']?></h4>
          <a href="single_page.php?product_id=<?php echo $row['product_id'] ?>"><button class="buy-btn">BUY NOW</button></a>
        </div>
        <?php } ?>

      </div>
    </section>

    <!--brand-->
      <section id="brand" class="container">
        <div class="row">
          <h3 class="text-center">We Deals Following Brands</h3>
          <hr>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/ip.png" />
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/LGb.jpg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/whirlpool.jpg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/sam.jpg"/>
        </div>
      </section>



    <!--footer-->
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