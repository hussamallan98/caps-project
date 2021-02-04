
<?php

session_start();
ob_start();

include("../includes/classes.php");
$cust=new customer();
if (isset($_POST['login'])) {

  $t=$cust->login($_POST['cust-name'],$_POST['cust-password']);
  if ($t[0]['cust_id']) {
    $_SESSION['cust-id']=$t[0]['cust_id'];
    header("location:../index.php");
  }else{
    $e=" invalid  name or password";
    
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login </title>
  </head>
  <body style="background:url('bg-registration-form-2.jpg'); ">
  

  
   
    <div class="contents pt-5" >

      <div class="container">
        <div class="row align-items-center ">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase text-danger">Login  As a customer to <strong >The way Shop</strong></h3>
              </div>
              <form action="" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="cust-name">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name="cust-password">
                </div>
                
              
                <div class="form-group last mb-5">
                <input type="submit" value="Log In" class="btn btn-block py-2 btn-danger" name="login">
                </div>
                
              </form>
              <div class="row">
                <div class="mt-3 col-5">
                    <a href="signup.php" class="text-danger">don't have account ?</a>
                </div>
                <div class="mt-3 col-7">
                <?php
                if (isset($e)) {
                  echo "<span class='alert alert-primary text-danger' role='alert'>";
                 
                   echo $e;
                   echo "</span>";
                }
                ?>
                </div>
              </div>
                

                 
                
                
              
              <div>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 

    
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>