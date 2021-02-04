<?php
ob_start();
include('includes\header.php');
include('includes\classes.php');
$cat= new category();
$id=$_GET['id'];
$arr=$cat->readById($id);

if(isset($_POST['save'])){
	

	if(empty($_POST['cat-name'])){
		$error_name="name is requierd";
	}else{
		$cat->cat_name=$_POST['cat-name'];
	}
	if(empty($_POST['cat-desc'])){
		$error_desc="Description is requierd";
	}else{
		$cat->cat_desc=$_POST['cat-desc'];
	}
	
      $cat->cat_image= $_FILES['cat-image']['name'];
    $tmp = $_FILES['cat-image']['tmp_name'];
    $path="img/category/";
    move_uploaded_file($tmp, $path . $cat->cat_image);  
    
    if (empty($error_name)&&empty($error_desc) ) {
         $cat->update($id);
         header("location:manage-category.php");
    }
}
?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Edit category</h4>
							
						</div>
						
					</div>
					
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Admin Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cat-name" placeholder="category Name"
								value="<?php 
								echo $arr[0]['cat_name'];
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
							<label class="col-sm-12 col-md-2 col-form-label">description</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="cat-desc"placeholder="example" type="text"value="<?php 
								echo $arr[0]['cat_desc'];
								?>">
							</div>
							<?php 
                            if (isset($error_desc)) {
                                echo "<span class='text-danger'>";
                                echo "* ".$error_desc;
                                echo "</span>";
                               }
                          	?>
						</div>
						
						

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="cat-image">
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