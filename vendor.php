<?php 
session_start();
include('includes/classes.php');
if($_SESSION['vend-id']){
$id2=$_SESSION['vend-id'];

}else{
  header("location:login/login-vendor.php");
}

$vend= new vendor();

$arr=$vend->readById($_SESSION['vend-id']);

if(isset($_POST['save'])){
  

  if(empty($_POST['vendor-name'])){
    $error_name="name is requierd";
  }else{
    $vend->v_name=$_POST['vendor-name'];
  }
  if(empty($_POST['vendor-email'])){
    $error_email="email is requierd";
  }else{
    $vend->v_email=$_POST['vendor-email'];
  }
  if(empty($_POST['vendor-password'])){
    $error_password="password is requierd";
  }else{
    $vend->v_password=$_POST['vendor-password'];
  }
  if(empty($_POST['vendor-mobile'])){
    $error_mobile="mobile is requierd";
  }else{
    $vend->v_mobile=$_POST['vendor-mobile'];
  }
  if(empty($_POST['vendor-address'])){
    $error_address="address is requierd";
  }else{
    $vend->v_address=$_POST['vendor-address'];
  }
  
    $vend->v_image= $_FILES['vendor-image']['name'];
    $tmp = $_FILES['vendor-image']['tmp_name'];
    $path="admin/img/";
    move_uploaded_file($tmp, $path . $vend->v_image); 

     
         $vend->update($id2);
         header("location:vendor.php?id={$id2}");
        



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Vendor-profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background:url("images/bg-registration-form-2.jpg");    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

    </style>
</head>
<body>
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <?php
                        if ( isset($_SESSION['vend-id'])) {
                        echo"<li class='nav-item '><a class='nav-link' href='logout-vendor.php'>Log Out</a></li>";
                    }
                    ?></ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                
                    
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="checkout.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            
            <div class="col-md-12 mb-5">
              <div class="card mb-3">
                <div class="card-body">
                  <h1 class="text-danger text-center"><strong>Welcome </strong></h1>
              
                <div class="card-body mb-5">
                  <div class="  align-items-center text-center">
                    <?php echo"<img src='admin/img/{$arr[0]['v_image']}' class='rounded-circle' width='150'>";?>
                    
                  </div>
                
             
      
            </div>
            
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Full Name</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="vendor-name" class="form-control" value="<?php echo $arr[0]['v_name'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Email</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="email" name="vendor-email" class="form-control" value="<?php echo $arr[0]['v_email'];?>">
                    </div>
                     <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">password</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="password" name="vendor-password" class="form-control" value="<?php echo $arr[0]['v_password'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Mobile</h6>
                    </div>
                    
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="vendor-mobile" class="form-control" value="<?php echo $arr[0]['v_mobile'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Address</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="vendor-address" class="form-control" value="<?php echo $arr[0]['v_address'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">image</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="file" name="vendor-image" class="form-control">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <div class="row mt-3 mb-3">
                    <div class= "col-md-6 mt-3"></div>
                    <div class="cart-and-bay-btn col-md-6 mt-3">
                        <button type="submit" name="save"  class="btn hvr-hover text-light"style="padding:5px 10px 5px 10px;">
                          Update
                        </button>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-4"></div>
                    <div class="cart-and-bay-btn col-md-2 mt-3"><a href="show-product-vendor.php" class="ml-auto btn hvr-hover text-light">show Product</a></div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <form>
          <h1 class="text-center text-danger"><strong>Orders</strong></h1>
        <table class="table table-striped mb-5 bg-dark text-white ">

  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
   
    $order=new orderDetail();
   // $order_id=$order->readOrderId($id);
    $arr=$order->vendorDetail($id2);

    

    if (!empty($arr)) {
      
      foreach ($arr as $k => $v) {

      echo "<tr>";
      echo "<th scope='row' class='pt-4'>{$v['order_details_id']}</th>";
      echo "<td class='pt-4'>{$v['pro_name']}</td>";
      echo "<td class='pt-4'>{$v['qty']}</td>";
      echo "<td><img src='admin/img/product/{$v['pro_image']}'' width=75px height=75px></td>";
      echo "<td class='pt-4'>{$v['total']}</td>";
      echo "</tr>";
    }
      
      
    }else{

      echo "<tr>";
      echo "<td>";
      
       echo "<h2 class='text-danger'>* No Orders</h2>";
      
      echo "</td>";
      echo "</tr>";
   
    
  }
    ?>
  </tbody>
</table>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
<?php 
include("includes/footer.php");
?>