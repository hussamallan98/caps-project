<?php 
session_start();

//echo $_SESSION['vend-id'];


include('includes\classes.php');
$cat=new category();
$c_name=$cat->readName();

$pro=new product();
$vendorId=$_SESSION['vend-id'];

if (isset($_GET['id'])){
$id=$_GET['id'];
$pro->delete($id);
}

if(isset($_POST['save'])){
	$pro->v_id=$_SESSION['vend-id'];

	if(empty($_POST['pro-name'])){
		$error_name='Name is required';
	}else{
		$pro->pro_name=$_POST['pro-name'];
	}
	if(empty($_POST['pro-desc'])){
		$error_desc='Description is required';
	}else{
		$pro->pro_desc=$_POST['pro-desc'];
	}
	if(empty($_POST['pro-price'])){
		$error_price='Price is required';
	}else{
		$pro->pro_price=$_POST['pro-price'];
	}
	if(empty($_POST['pro-cat'])){
		$error_cat='Category is required';
	}else{
		$pro->cat_id=$_POST['pro-cat'];
	}
	if (empty($_FILES['pro-image']['name'])) {
        $error_image="image is requierd";
    }else
    {
      $pro->pro_image= $_FILES['pro-image']['name'];
    $tmp = $_FILES['pro-image']['tmp_name'];
    $path="admin/img/product/";
    move_uploaded_file($tmp, $path . $pro->pro_image);  
    }
    if (empty($error_name)&&empty($error_desc) &&empty($error_image) &&empty($error_price)&&empty($error_cat)) {
         $pro->createByVendor();
    }
}
?>
<!DOCTYPE html>
<html>
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
	<title></title>
	<style type="text/css">
		body{
			background:url("images/bg-registration-form-2.jpg");

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

<div class="main-container mt-5">
		
<div class="container">
<div class=" card-box  border bg-light p-3 mb-3">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-danger h4">Add Product</h4>
							
						</div>
						
					</div>
					<form action="" method="post"enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="pro-name" placeholder="product Name">
							</div>
						</div>
						<?php 
                            if (isset($error_name)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_name;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="pro-desc"placeholder="Description" type="text">
							</div>
						</div>
						<?php 
                            if (isset($error_desc)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_desc;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Price</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="pro-price"placeholder="Description" type="text">
							</div>
						</div>
						<?php 
                            if (isset($error_price)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_price;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Category</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="pro-cat">
									<option selected="" disabled="">Choose...</option>
									<?php 
									foreach ($c_name as $k => $v) {
										
									
									echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
									}
									?>
									
									
								</select>
							</div>
						</div>
						<?php 
                            if (isset($error_cat)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_cat;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="pro-image">
							</div>
						</div>
						<?php 
                            if (isset($error_image)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_image;
                                echo "</span>";
                               }
                          	?>
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-7">
								<button type="submit" name="save"class="btn btn-danger ">Save</button>
							</div>
						</div>
					</form>
				</div>
				<div class="pd-20 card-box mt-4 bg-light border">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-danger h4 m-3"> Products</h4>
							
						</div>
						
					</div>
				<div class="table-responsive ">
						<table class="table table-striped text-dark border">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Product Name</th>
									<th scope="col">Product Description</th>
									<th scope="col">Product Price</th>
									<th scope="col">category</th>
									<th scope="col">Image</th>
									<th scope="col">Setting</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$arr=$pro->readVendorProduct($vendorId);
								foreach ($arr as $k => $v) {
									$c_name=$cat->readByid($v['cat_id']);

									echo "<tr>";
									echo "<th scope='row'>{$v['pro_id']}</th>";
									echo "<td>{$v['pro_name']}</td>";
									echo "<td>{$v['pro_desc']}</td>";
									echo "<td>{$v['pro_price']}</td>";
									echo "<td>{$c_name['0']['cat_name']}</td>";
									echo "<td><img src='admin/img/product/{$v['pro_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-product.php?id={$v['pro_id']}&id2={$v['cat_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='show-product-vendor.php?id={$v['pro_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
									</td>";
									echo "</tr>";
								}
								?>				
									
								</tr>
								
							</tbody>
						</table>
						
					</div>
					</div>
					<div class="row">
						<div class="col-md-10"></div>
						<div class="m-3">
					<?php
						echo " <a href='vendor.php?'class='btn hvr-hover text-light' >Go Back</a>";
						?>
						</div>
					</div>

			</div>

			</div>
<?php 

include('includes\footer.php'); ?>
</body>
</html>

