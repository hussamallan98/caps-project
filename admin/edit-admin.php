<?php
ob_start();
include('includes\header.php');
include('includes\classes.php');
$admin= new Admin();
$id=$_GET['id'];
$arr=$admin->readById($_GET['id']);

if(isset($_POST['save'])){
	

	if(empty($_POST['admin-name'])){
		$error_name="name is requierd";
	}else{
		$admin->admin_name=$_POST['admin-name'];
	}
	if(empty($_POST['admin-email'])){
		$error_email="email is requierd";
	}else{
		$admin->admin_email=$_POST['admin-email'];
	}
	if(empty($_POST['admin-password'])){
		$error_password="password is requierd";
	}else{
		$admin->admin_password=$_POST['admin-password'];
	}
	
      $admin->admin_image= $_FILES['admin-image']['name'];
    $tmp = $_FILES['admin-image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $admin->admin_image);  

    if (empty($error_name)&&empty($error_email)  && empty($error_password)) {
         $admin->update($id);
         header("location:manage-admin.php");


    }

}
?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Admin</h4>
							
						</div>
						
					</div>
					
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Admin Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="admin-name" placeholder="Admin Name"
								value="<?php 
								echo $arr[0]['admin_name'];
								?>">
							</div>
							<?php 
                            if (isset($error_name)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_name;
                                echo "</span>";
                               }
                          	?>
						</div>
						 
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="admin-email"placeholder="example@example.com" type="email"value="<?php 
								echo $arr[0]['admin_email'];
								?>">
							</div>
							<?php 
                            if (isset($error_email)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_email;
                                echo "</span>";
                               }
                          	?>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="admin-password" placeholder ="password" type="password" value="<?php 
								echo $arr[0]['admin_password'];
								?>">
							</div>
							<?php 
                            if (isset($error_password)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_password;
                                echo "</span>";
                               }
                          	?>
						</div>
						

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="admin-image">
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