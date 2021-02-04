<?php

include('includes\header.php');
include('includes\classes.php');
$cust=new customer();

if (isset($_GET['id'])){
$id=$_GET['id'];
$cust->delete($id);
}
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
	if (empty($_FILES['cust-image']['name'])) {
        $error_image="image is requierd";
    }else
    {
      $cust->cust_image= $_FILES['cust-image']['name'];
    $tmp = $_FILES['cust-image']['tmp_name'];
    $path="img/";
    move_uploaded_file($tmp, $path . $cust->cust_image);  
    }
    if (empty($error_name)&&empty($error_email) &&empty($error_image) && empty($error_password)) {
         $cust->create();
    }
}
?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Costumer</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cust-name" placeholder="Customer Name">
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
								<input class="form-control" name="cust-email"placeholder="example@example.com" type="email">
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
								<input class="form-control"name="cust-password" placeholder="password" type="password">
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
								<input class="form-control" type="text"name="cust-mobile" placeholder="079-000-0000">
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
								<input class="form-control" type="text"name="cust-address" placeholder="zarqa">
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
								<input class="form-control" type="file" name="cust-image">
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
							<h4 class="text-blue h4">Customers</h4>
							
						</div>
						
					</div>
				<div class="table-responsive ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">customer Name</th>
									<th scope="col">customer Email</th>
									<th scope="col">customer mobile</th>
									<th scope="col">customer adress</th>
									<th scope="col">Image</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$arr=$cust->readAll();
								foreach ($arr as $k => $v) {
									echo "<tr>";
									echo "<th scope='row'>{$v['cust_id']}</th>";
									echo "<td>{$v['cust_name']}</td>";
									echo "<td>{$v['cust_email']}</td>";
									echo "<td>{$v['cust_mobile']}</td>";
									echo "<td>{$v['cust_address']}</td>";
									echo "<td><img src='img/{$v['cust_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-customer.php?id={$v['cust_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='manage-customer.php?id={$v['cust_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
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