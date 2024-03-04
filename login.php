<?php 
 session_start();
include('server/connection.php');


if(isset($_SESSION['logged_in'])){
  header('location:account.php');
  exit;
}

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt=$conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
  $stmt->bind_param('ss', $email, md5($password));
  $stmt->execute();
 if($stmt->execute()){
  $stmt->bind_result($user_id, $user_name, $user_email,$user_password);
  $stmt->store_result();

  if($stmt->num_rows()==1){
    $stmt->fetch();

    $_SESSION['user_id']=$user_id;
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_email']=$user_email;
    $_SESSION['logged_in']=true;

    header('location:account.php?login=successfully logged in');
  }
  else{
    header('location:login.php?error=login error');
  
  }

 }
 //if error occur
 else{
    header('location:login.php?error=login error');
 }
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
   


    <!-- Login Form -->
    <section class="my-3 py-3">
        <div class="container text-center mt-2 pt-3 ">
            <h1 style="color: antiquewhite; background-color: black;" class="form-weight-bold">Login</h1>
            <hr>
        </div>
        <div class="mx-auto container">
            <form id="login-form" action="login.php" method="post">
              <h5><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></h5>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="login-email" name="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    
                    <input type="submit" name="login" class="btn" id="login-btn" value="Login">
                </div>
                <div class="form-group">
                    <p>Don't have account?<a href="register.php" id="register-link" class="btn"> Register now</a></p>
                 </div>                

            </form>

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