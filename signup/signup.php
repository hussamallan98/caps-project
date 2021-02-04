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
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>The Way Shop Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="row">
		<div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg');">
			
			<div class="inner ">
				<div class="border border-danger " >
				<form action="" method="post" enctype="multipart/form-data">
					<h3>Sign Up</h3>
					
						<div class="form-wrapper">
							<label for=""><b>First Name :</b></label>
							<input type="text" class="form-control" name="cust-name">
						</div>
					<div class="form-wrapper">
						<label for=""><b>Email :</b></label>
						<input type="text" class="form-control" name="cust-email">
					</div>
					<div class="form-wrapper">
						<label for=""><b>Password  :</b></label>
						<input type="password" class="form-control" name="cust-password">
					</div>
					<div class="form-wrapper">
						<label for=""><b>Mobile :</b></label>
						<input type="password" class="form-control" name="cust-mobile">
					</div>
					<div class="form-wrapper">
							<label for=""><b>Address : </b>	</label>
							<input type="text" class="form-control" name="cust-address">
						</div>
						<div class="form-wrapper">
							<label for=""><b>Image :</b></label>
							<input class="form-control-life" type="file" name="cust-image">
						</div>
					
					<button type="submit" name="save">Register Now</button>
				</form>
				</div>
			</div>
		</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>