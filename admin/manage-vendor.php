<?php
include('includes\header.php');
include('includes\classes.php');
$vend=new vendor();

if (isset($_GET['id'])){
$id=$_GET['id'];
$vend->delete($id);
}

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
	if (empty($_FILES['vendor-image']['name'])) {
        $error_image="image is requierd";
    }else
    {
      $vend->v_image= $_FILES['vendor-image']['name'];
    $tmp = $_FILES['vendor-image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $vend->v_image);  
    }
    if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password)) {
         $vend->create();
    }
}

?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Vendor</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Vendor Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-name" placeholder="vendor Name">
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
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="vendor-email"placeholder="example@example.com" type="email">
							</div>
						</div>
						<?php 
                            if (isset($error_email)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_email;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="vendor-password" placeholde="password" type="password">
							</div>
						</div>
						<?php 
                            if (isset($error_password)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_password;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-mobile" placeholder="079-000-0000">
							</div>
						</div>
						<?php 
                            if (isset($error_mobile)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_mobile;
                                echo "</span>";
                               }
                          	?>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="vendor-address" placeholder="zarqa">
							</div>
						</div>
						<?php 
                            if (isset($error_address)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_address;
                                echo "</span>";
                               }
                          	?>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="vendor-image">
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
								<button type="submit" name="save"class="btn btn-primary ">Save</button>
							</div>

							
						</div>
					</form>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Vendors</h4>
							
						</div>
						
					</div>
				<div class="table-responsive ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Vendor Name</th>
									<th scope="col">Vendor Email</th>
									<th scope="col">Vendor mobile</th>
									<th scope="col">Vendor adress</th>
									<th scope="col">Image</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$arr=$vend->readAll();
								foreach ($arr as $k => $v) {
									echo "<tr>";
									echo "<th scope='row'>{$v['v_id']}</th>";
									echo "<td>{$v['v_name']}</td>";
									echo "<td>{$v['v_email']}</td>";
									echo "<td>{$v['v_mobile']}</td>";
									echo "<td>{$v['v_address']}</td>";
									echo "<td><img src='img/{$v['v_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-vendor.php?id={$v['v_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='manage-vendor.php?id={$v['v_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
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