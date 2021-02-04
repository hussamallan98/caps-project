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