<?php 

ob_start();
session_start();

   // include("includes/header.php");
    include("includes/classes.php");
    $id=$_GET['id'];
    $pro=new product();
    $arr=$pro->readById($id);
     $cat_id=$arr[0]['cat_id'];
     $vend_id=$arr[0]['v_id'];
     $vend=new vendor();
     $vendorName=$vend->readById($vend_id);
     $related=$pro->readRelated($cat_id,$vend_id);
    if (isset($_POST['submit'])) {
        $_SESSION['cart'][$arr[0]['pro_name']]=$_POST['qty'];
        
       
        
    }
    

?>
  
     <?php 
   if (!isset($_SESSION)) {
    session_start();
}
   if (isset($_SESSION['cust-id'])) {
        $id=$_SESSION['cust-id'];
   }
  
   ?>
   <!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop </title>
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
           .background{
            background: url("images/bg-registration-form-2.jpg");
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                        
                        <?php
                        if (isset($_SESSION['cust-id'])) {
                              echo "<li class='nav-item'><a class='nav-link' href='profile.php?id={$id}'>";
                              echo "My Profile</a></li>";
                        }
                      
                        ?>
                        
                        
                         <?php
                        if (!isset($_SESSION['cust-id']) ) {

                        
                            ?>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Sign In</a>
                            <ul class="dropdown-menu">
                                <li class="list-group-item list-group-item"><a href="login/login-customer.php">Customer</a></li>
                                <li class="list-group-item list-group-item"><a href="login/login-vendor.php">Vendor</a></li>
                            </ul>
                        </li>
                        <?php 
                        }
                        ?>
                         <?php
                        if (isset($_SESSION['cust-id']) ) {
                        echo"<li class='nav-item '><a class='nav-link' href='logout.php'>Log Out</a></li>";
                    }
                    ?>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                
                    <div class='attr-nav'>
                        <ul>
                        <li class='side-menu'><a href=''>
                        <i class='fa fa-shopping-bag'></i>
                        <span class='badge'>
                        <?php
                        
                        
                           
                           
                            if (empty($_SESSION['cart'])) {
                                echo "0";
                            }else{
                             echo count($_SESSION['cart']);
                            }

                             
                         
                ?>
                </span></a></li></ul></div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                         $conn = mysqli_connect("localhost","root","","final_project");
                         $total1=0;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                     $query="select * from product where pro_name='{$key}'";
                                     $data  =mysqli_query($conn,$query);
                                     $row =mysqli_fetch_assoc($data);
                                    //echo $row['pro_image'];
                                        if ($key=='admin-id' or $key=='cust-id' or $key=='vend-id' ) {
                                            continue;
                                        }else{
                                            echo "<li>";
                                            echo "<a href='' class='photo'><img src='admin/img/product/{$row['pro_image']}' class='cart-thumb' alt='' /></a>";
                                            echo " <h6><a href=''>{$row['pro_name']} </a></h6>";
                                            echo "<p>{$value} x   <span class='price'>\${$row['pro_price']}</span></p>";
                                            echo "</li>";
                                            $total1+=$value*$row['pro_price'];
                                        }
                                    }
                        ?>
                        <li class="total">
                            <a href="checkout.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: <?php echo "\${$total1}";?></span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
   
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Product Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Shop</a></li>
                        <li class="breadcrumb-item active">product Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   

 
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php 
                            foreach ($arr as $k => $v) {
                                echo "<div class='carousel-item active'> <img class='d-block w-100' src='admin/img/product/{$v['pro_image']}' height='350px' alt='First slide'> </div>";
                            }
                            ?>
                            
                            
                            
                        </div>

                      
                        
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2> <?php  echo $arr[0]['pro_name'];?></h2>
                       
                        
                                <h4>Short Description:</h4>
                                <p><?php echo $arr[0]['pro_desc'];?></p>
                                <h4>Vendor :</h4>
                                <p><?php echo $vendorName[0]['v_name'];?></p>
                                        <form method="post">
                                        <div class="form-group quantity-box">
                                            <h4 class="control-label">Quantity</h4>
                                            <input class="form-control" value="1" min="0" max="20" type="number" name="qty">
                                        </div>
                                    
                                <div class="price-box-bar">
                                    <div class="row">   
                                            <div class="cart-and-bay-btn col-lg-6 col-md-4 col-sm-4">
                                                <button type="submit" name="submit"  class="btn hvr-hover text-light mt-3"style="padding:9px;">
                                                Add to cart
                                                </button>
                                                
                                            
                                            </form>
                                            <?php
                                            echo " <a href='product.php?id={$cat_id}'class='btn hvr-hover text-light mt-3' >Go Back</a>";
                                            ?>
                                           
                                            </div>
                                            <div class="share-bar col-lg-6 col-md-8 col-sm-8 mt-3">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>

 

        </div>
    </div>
    <hr>
        <div class="categories-shop background">

        
              
                    
                       
                            <h1 class="text-danger text-center"><strong>relatead product</strong></h1>
                    
           
            <div class="row">
                <?php 
                    foreach ($related as $k => $v) {
                        echo "<div class='col-lg-3 col-md-4 col-sm-12 col-xs-12'>";
                        echo "<div class='shop-cat-box'>";
                        echo "<img class='' height='352px !important'src='admin/img/product/{$v['pro_image']}' alt='' >";
                        echo "<a class='btn hvr-hover' href='product-detail.php?id={$v['pro_id']}'>{$v['pro_name']}</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                
                
            </div>
        
    </div>
 

    <?php 
    include("includes/footer.php");
    ?>