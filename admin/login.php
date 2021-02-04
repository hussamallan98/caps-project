
<?php
include("includes/classes.php");
ob_start();
session_start();

$x=new Admin();
if(isset($_POST['submit'])){
	$name=$_POST['admin-name'];
	$pass=$_POST['admin-password'];
	$t=$x->login($name,$pass);
	if ($t[0]['admin_id']) {
		$_SESSION['admin-id']=$t[0]['admin_id'];
		header("location:manage-admin.php");
	}else{
		  $e=" <span class='alert alert-danger mt-5'  role='alert'>invalid User name or password</span>";
		
	}
	


}

?>
<!DOCTYPE html>
<html>
<head>
	<style >
		body{
		 background:#0c355e !important;
		}
	</style>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Log In Admin Dashboard</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 col-lg-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Admin</h2>
						</div>
						<label class="btn active">

						<form method="post">
							
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Admin name" name="admin-name">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="admin-password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-8">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button type="submit" class="btn btn-outline-primary" name="submit">Sign In</button>
									</div>

								</div>
							</div>
						</form>
						<div class="mt-5">
							<?php
                		if (!empty($e)) {
                  		
                  		echo $e;
               			 }
                		?>
						</div>
                		
               
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>