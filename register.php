<?php 

session_start();
include 'server/connection.php';


//if user is already logged in

if(isset($_SESSION['logged_in'])){
  header('location:account.php');
  exit;
}

if(isset($_POST['register'])){
    
              $name = $_POST['name'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $password_con = $_POST['password-con'];

              //check if password matches
              if($password !== $password_con){
                  header('location:register.php?password does not match');
              }

              //check if password is 8 characters long
              else if(strlen($password)<8){
                  header('location:register.php?password must be 8 characters long');
              }
              

              else{
              //check if user already exists
              $stmt1=$conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
              $stmt1->bind_param('s', $email);
              $stmt1->execute();
              $stmt1->bind_result($num_rows);
              $stmt1->store_result();
              $stmt1->fetch();

              //if user already exists of same email
              if($num_rows>0){
                  header('location:register.php?user already exists');
              }

              //if no user of given email exist
              else{
            //inser data of user in databse
              $stmt=$conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");
              $stmt->bind_param('sss', $name, $email, md5($password));
              
              if($stmt->execute()){
                $_SESSION['user_email']=$email;
                $_SESSION['user_name']=$name;
                $_SESSION['logged_in']=true; 
                header('location:account.php?register=registered successfully');
              }
              else{
                  header('location:register.php?error=error occured');
                  
              }
            }
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
   


    <!-- register Form -->
    <section class="my-3 py-3">
        <div class="container text-center mt-2 pt-3 ">
            <h1 style="color: antiquewhite; background-color: black;" class="form-weight-bold">Register</h1>
            <hr>
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="post" action="register.php">
           <p> <?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>    
            <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="register-name" name="name" placeholder="John Stones" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" id="register-password-con" name="password-con" placeholder="retype password" required>
                </div>
                <div class="form-group">
                    
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                </div>
                <div class="form-group">
                    <p>Already have account?<a id="login-link" href="login.php" class="btn"> Log in</a></p>
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