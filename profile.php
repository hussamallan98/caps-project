<?php 
include('includes/classes.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
}else{
  header("location:login/login-customer.php");
}

$cust=new customer();
$arr=$cust->readById($id);
if(isset($_POST['submit'])){
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
    $path="admin/img/";
    move_uploaded_file($tmp, $path . $cust->cust_image);

    if (empty($error_name)&&empty($error_email)   && 
      empty($error_mobile) && empty($error_address)) {
         $cust->update($id);
         header("location:profile.php?id={$id}");


    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background:url("images/bg-registration-form-2.jpg");    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

    </style>
</head>
<body>
<?php 
include("includes/header.php");
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            
            <div class="col-md-12 mb-5">
              <div class="card mb-3">
                <div class="card-body">
                  <h1 class="text-danger text-center"><strong>Welcome </strong></h1>
              
                <div class="card-body mb-5">
                  <div class="  align-items-center text-center">
                    <?php echo"<img src='admin/img/{$arr[0]['cust_image']}' class='rounded-circle' width='150'>";?>
                    
                  </div>
                
             
      
            </div>
            
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Full Name</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="cust-name" class="form-control" value="<?php echo $arr[0]['cust_name'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Email</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="email" name="cust-email" class="form-control" value="<?php echo $arr[0]['cust_email'];?>">
                    </div>
                     <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">password</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="password" name="cust-password" class="form-control" value="<?php echo $arr[0]['cust_password'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Mobile</h6>
                    </div>
                    
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="cust-mobile" class="form-control" value="<?php echo $arr[0]['cust_mobile'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">Address</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="text" name="cust-address" class="form-control" value="<?php echo $arr[0]['cust_address'];?>">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-2">
                      <h6 class="mt-3">image</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <input type="file" name="cust-image" class="form-control">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                  <div class="row mt-3 mb-3">
                    <div class= "col-md-6 mt-3"></div>
                    <div class="cart-and-bay-btn col-md-6 mt-3">
                        <button type="submit" name="submit"  class="btn hvr-hover text-light"style="padding:5px 10px 5px 10px;">
                          Update
                        </button>
                    </div>
                    </div>
                    

                </div>
              </div>
            </div>
          </div>
        </div>
        <form>
          <h1 class="text-center text-danger"><strong>Orders</strong></h1>
        <table class="table table-striped mb-5 bg-dark text-white ">

  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
<tbody>
    <?php
   
    $order=new orderDetail();
    $order_id=$order->readOrderId($id);
    
    
    

    if (!empty($order_id)) {
      foreach ($order_id as $key => $value) {
        $arr=$order->readById($value['order_id']);
      foreach ($arr as $k => $v) {

      echo "<tr>";
      echo "<th scope='row' class='pt-4'>{$v['order_details_id']}</th>";
      echo "<td class='pt-4'>{$v['pro_name']}</td>";
      echo "<td class='pt-4'>{$v['qty']}</td>";
      echo "<td><img src='admin/img/product/{$v['pro_image']}'' width=75px height=75px></td>";
      echo "<td class='pt-4'>\${$v['total']}</td>";
      echo "</tr>";
    }
      
      
    }
      }
      else{
      echo "<tr>";
      echo "<td>";
      
       echo "<h2 class='text-danger'>* No Orders</h2>";
      
      echo "</td>";
      echo "</tr>";
   
    
  }
    ?>
  </tbody>
</table>
    </div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
<?php 
include("includes/footer.php");
?>