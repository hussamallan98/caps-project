<?php
include('includes\header.php');
include('includes\classes.php');
$cat= new category();

if (isset($_GET['id'])){
$id=$_GET['id'];
$cat->delete($id);
}

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
	if (empty($_FILES['cat-image']['name'])) {
        $error_image="image is requierd";
    }else
    {
      $cat->cat_image= $_FILES['cat-image']['name'];
    $tmp = $_FILES['cat-image']['tmp_name'];
    $path="img/category/";
    move_uploaded_file($tmp, $path . $cat->cat_image);  
    }
    if (empty($error_name)&&empty($error_desc) &&empty($error_image) ) {
         $cat->create();
    }
}


?>
<div class="main-container">
		

<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Category</h4>
							
						</div>
						
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Category Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text"name="cat-name" placeholder="Category Name">
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
								<input class="form-control" name="cat-desc"placeholder="Description" type="text">
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
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="cat-image">
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
							<h4 class="text-blue h4"> Categories</h4>
							
						</div>
						
					</div>
				<div class="table-responsive ">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Category Name</th>
									<th scope="col">Cateory Description</th>
									<th scope="col">Image</th>
									<th scope="col">Setting</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$arr=$cat->readAll();
								foreach ($arr as $k => $v) {
									echo "<tr>";
									echo "<th scope='row'>{$v['cat_id']}</th>";
									echo "<td>{$v['cat_name']}</td>";
									echo "<td>{$v['cat_desc']}</td>";
									echo "<td><img src='img/category/{$v['cat_image']}'width=70px height=70px></td>";
									echo "<td>	<a href='edit-category.php?id={$v['cat_id']}'><button type='submit' class='btn btn-primary' name='update'><i class='icon-copy fa fa-edit' aria-hidden='true'></i></button></a>";
									echo "</td>";
									echo "<td>
									<a href='manage-category.php?id={$v['cat_id']}'><button type='submit' class='btn btn-danger' name='delete'><i class='icon-copy fa fa-trash' aria-hidden='true'></i></button></a>		
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