
<?php
include("../includes/classes.php");
$cust=new customer();
if (isset($_POST['save'])) {
  $cust->cust_name=$_POST['cust-name'];
  $cust->cust_email=$_POST['cust-email'];
  $cust->cust_password=$_POST['cust-password'];
  $cust->cust_mobile=$_POST['cust-mobile'];
  $cust->cust_address=$_POST['cust-address'];
  $cust->cust_image=$_FILES['cust-image']['name'];
  $tmp = $_FILES['cust-image']['tmp_name'];
    $path="../admin/img/";
    move_uploaded_file($tmp, $path . $cust->cust_image);
    $cust->create();
    header("location:login-customer.php");
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

    <title>Sign Up </title>
  </head>
  <body style="background:url('bg-registration-form-2.jpg'); ">
  

  
   
    <div class="contents pt-5" >

      <div class="container">
        <div class="row align-items-center ">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase text-danger">Sign Up As a customer to <strong >The way Shop</strong></h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="your name" id="username" name="cust-name">
                </div>
                <div class="form-group first">
                  <label for="username">Email</label>
                  <input type="email" class="form-control" placeholder="your-email@gmail.com" id="username" name="cust-email">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name="cust-password">
                </div>
                 <div class="form-group first">
                  <label for="username">Mobile</label>
                  <input type="text" class="form-control" placeholder="your Mobile" id="username" name="cust-mobile">
                </div>
                 <div class="form-group first">
                  <label for="username">Address</label>
                  <input type="text" class="form-control" placeholder="your Address" id="username" name="cust-address">
                </div>
                <div class="form-wrapper mb-3">
                  <label for="">Image :</label>
                  <div>
                    <input class="form-control-life" type="file" name="cust-image">
                  </div>
                </div>
                
              
                <div class="form-group last mb-5">
                <input type="submit" value="Log In" class="btn btn-block py-2 btn-danger" name="save">
                
                <?php
                if (isset($e)) {
                  echo "<span class='alert alert-danger' role='alert'>";
                 
                   echo $e;
                   echo "</span>";
                }
                ?>
                

                 
                
                
              </div>
                
              </form>
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