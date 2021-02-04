<?php
session_start();

include('includes\header.php');
include('includes\classes.php');
$admin= new Admin();

if (isset($_GET['id'])){
$id=$_GET['id'];
$admin->delete($id);
}

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
	if (empty($_FILES['admin-image']['name'])) {
        $error_image="image is requierd";
    }else
    {
      $admin->admin_image= $_FILES['admin-image']['name'];
    $tmp = $_FILES['admin-image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $admin->admin_image);  
    }
    if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password)) {
         $admin->create();
    }
}


?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Admin</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Admin Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="admin-name" placeholder="Admin Name">
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
								<input class="form-control" name="admin-email"placeholder="example@example.com" type="email">
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
								<input class="form-control"name="admin-password" placeholder ="password" type="password">
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
							<?php 
                            if (isset($error_image)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_image;
                                echo "</span>";
                               }
                          	?>
						</div>
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-7">
								<button type="submit" name="save"class="btn btn-primary ">Save</button>
							</div>

							
						</div>
					</form>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Admins</h4>
							
						</div>
					</div>
					
				<div class="table-responsive ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Admin Name</th>
									<th scope="col">Admin Email</th>
									<th scope="col">Image</th>
									<th scope="col" >Update</th>
									<th scope="col" >Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$arr=$admin->readAll();
								foreach ($arr as $k => $v) {
									echo "<tr>";
									echo "<th scope='row'>{$v['admin_id']}</th>";
									echo "<td>{$v['admin_name']}</td>";
									echo "<td>{$v['admin_email']}</td>";
									echo "<td><img src='img/{$v['admin_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-admin.php?id={$v['admin_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='manage-admin.php?id={$v['admin_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
									</td>";
									echo "</tr>";
								}
								?>								
							</tbody>
						</table>
					</div>
					</div>
			</div>
<?php 

include('includes\footer.php'); ?>