<?php
ob_start();
include('includes\header.php');
include('includes\classes.php');
$vend= new vendor();
$id=$_GET['id'];
$arr=$vend->readById($_GET['id']);

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
	
      $vend->v_image= $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $vend->v_image);  

    if (empty($error_name)&&empty($error_email)   && 
    	empty($error_mobile) && empty($error_address)) {
         $vend->update($id);
         header("location:manage-vendor.php");


    }

}
?>
<div class="main-container">
	<div class="pd-20 card-box mb-30">
		<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit vendor</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">vendor Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-name" placeholder="vendor Name"value="<?php 
								echo $arr[0]['v_name'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="vendor-email"placeholder="example@example.com" type="email"value="<?php 
								echo $arr[0]['v_email'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="vendor-password" placeholder="password" type="password"value="<?php 
								echo $arr[0]['v_password'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-mobile" placeholder="079-000-0000"value="<?php 
								echo $arr[0]['v_mobile'];
								?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-address" placeholder="zarqa"value="<?php 
								echo $arr[0]['v_address'];
								?>">
							</div>
						</div>
						

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="image">
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