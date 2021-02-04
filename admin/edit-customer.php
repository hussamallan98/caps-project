<?php
ob_start();
include('includes\header.php');
include('includes\classes.php');
$cust= new customer();
$id=$_GET['id'];
$arr=$cust->readById($_GET['id']);

if(isset($_POST['save'])){
	

	if(empty($_POST['cust-name'])){
		$error_name="name is requierd";
	}else{
		$cust->cust_name=$_POST['cust-name'];
	}
	if(empty($_POST['cust-email'])){
		$error_email="email is requierd";
	}else{
		$cust->cust_email=$_POST['cust-email'];
	}
	if(empty($_POST['cust-password'])){
		$error_password="password is requierd";
	}else{
		$cust->cust_password=$_POST['cust-password'];
	}
	if(empty($_POST['cust-mobile'])){
		$error_mobile="mobile is requierd";
	}else{
		$cust->cust_mobile=$_POST['cust-mobile'];
	}
	if(empty($_POST['cust-address'])){
		$error_address="address is requierd";
	}else{
		$cust->cust_address=$_POST['cust-address'];
	}
	
      $cust->cust_image= $_FILES['cust-image']['name'];
    $tmp = $_FILES['cust-image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $cust->cust_image);  

    if (empty($error_name)&&empty($error_email)   && 
    	empty($error_mobile) && empty($error_address)) {
         $cust->update($id);
         header("location:manage-customer.php");


    }

}
?>
<div class="main-container">
	<div class="pd-20 card-box mb-30">
		<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Costumer</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cust-name" placeholder="customer Name"value="<?php 
								echo $arr[0]['cust_name'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="cust-email"placeholder="example@example.com" type="email"value="<?php 
								echo $arr[0]['cust_email'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="cust-password" placeholder="password" type="password"value="<?php 
								echo $arr[0]['cust_password'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cust-mobile" placeholder="079-000-0000"value="<?php 
								echo $arr[0]['cust_mobile'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cust-address" placeholder="zarqa"value="<?php 
								echo $arr[0]['cust_address'];
								?>">
							</div>
						</div>
						

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="cust-image">
							</div>
						</div>
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-7">
								<button type="submit" name="save"class="btn btn-primary ">Edit</button>
							</div>

							
						</div>
					</form>
				</div>
			</div>



<?php 
include('includes\footer.php');

?>