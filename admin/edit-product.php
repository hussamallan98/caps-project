<?php
ob_start();
include('includes\header.php');
include('includes\classes.php');
$pro= new product();
$id=$_GET['id'];
$arr=$pro->readById($id);
$cat=new category();
$c_name=$cat->readName();

if(isset($_POST['save'])){
	

	if(empty($_POST['pro-name'])){
		$error_name="name is requierd";
	}else{
		$pro->pro_name=$_POST['pro-name'];
	}
	if(empty($_POST['pro-desc'])){
		$error_desc="Description is requierd";
	}else{
		$pro->pro_desc=$_POST['pro-desc'];
	}
	if(empty($_POST['pro-price'])){
		$error_price="Price is requierd";
	}else{
		$pro->pro_price=$_POST['pro-price'];
	}
	if(empty($_POST['pro-cat'])){
		$error_cat="category is requierd";
	}else{
		$pro->cat_id=$_POST['pro-cat'];
	}
	
      $pro->pro_image= $_FILES['pro-image']['name'];
    $tmp = $_FILES['pro-image']['tmp_name'];
    $path="img/product/";
    move_uploaded_file($tmp, $path . $pro->pro_image);  
    
    if (empty($error_name)&&empty($error_desc)&&empty($error_price)&&empty($error_cat) ) {
         $pro->update($id);
         header("location:manage-product.php");
    }
}
?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit Product</h4>
							
						</div>
						
					</div>
					<form action="" method="post"enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="pro-name" placeholder="product Name"value="<?php 
								echo $arr[0]['pro_name'];
								?>">
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
								<input class="form-control" name="pro-desc"placeholder="Description" type="text"value="<?php 
								echo $arr[0]['pro_desc'];
								?>">
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
								<input class="form-control" name="pro-price"placeholder="Description" type="text"value="<?php 
								echo $arr[0]['pro_price'];
								?>">
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
									
									<?php 
									foreach ($c_name as $k => $v) {
										
									if ($v['cat_id']==$_GET['id2']) {
										echo "<option value='{$v['cat_id']}' selected>{$v['cat_name']}</option>";
									}else{
									echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
									}
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

<?php 
include('includes\footer.php');

?>