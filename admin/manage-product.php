<?php
include('includes\header.php');
include('includes\classes.php');
$cat=new category();
$c_name=$cat->readName();

$pro=new product();


if (isset($_GET['id'])){
$id=$_GET['id'];
$pro->delete($id);
}

if(isset($_POST['save'])){
	
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
    $path="img/product/";
    move_uploaded_file($tmp, $path . $pro->pro_image);  
    }
    if (empty($error_name)&&empty($error_desc) &&empty($error_image) &&empty($error_price)&&empty($error_cat)) {
         $pro->create();
    }
}
?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Product</h4>
							
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
								<button type="submit" name="save"class="btn btn-primary ">Save</button>
							</div>
						</div>
					</form>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"> Products</h4>
							
						</div>
						
					</div>
				<div class="table-responsive ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Product Name</th>
									<th scope="col">Product Description</th>
									<th scope="col">Product Price</th>
									<th scope="col">category</th>
									<th scope="col">Image</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$arr=$pro->readAll();
								foreach ($arr as $k => $v) {
									$c_name=$cat->readByid($v['cat_id']);

									echo "<tr>";
									echo "<th scope='row'>{$v['pro_id']}</th>";
									echo "<td>{$v['pro_name']}</td>";
									echo "<td>{$v['pro_desc']}</td>";
									echo "<td>{$v['pro_price']}</td>";
									echo "<td>{$c_name['0']['cat_name']}</td>";
									echo "<td><img src='img/product/{$v['pro_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-product.php?id={$v['pro_id']}&id2={$v['cat_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='manage-product.php?id={$v['pro_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
									</td>";
									echo "</tr>";
								}
								?>				
									
								</tr>
								
							</tbody>
						</table>
					</div>
					</div>
			</div>
<?php 

include('includes\footer.php'); ?>