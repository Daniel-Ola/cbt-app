<?php
require_once('../php/dbconnect.php');
$connect = dbconnect() ;


// To login
if(isset($_POST['login']))
{
	$email = $_POST['email'] ;
	$password = $_POST['password'] ;
	$password = md5(hash("sha256" , $password)) ;
	// echo $password;
	$stafflogquery = mysqli_query($connect , "SELECT * FROM examiners WHERE contact = '$email' ") ;
	$counter = mysqli_num_rows($stafflogquery) ;
	if($stafflogquery)
	{
		// echo "string";
		while($fetchstafflog = mysqli_fetch_assoc($stafflogquery))
		{
			$staffpass = $fetchstafflog['password'] ;
			$staff_id = $fetchstafflog['user_id'] ;
			$access_id = $fetchstafflog['access_id'] ;
			if($password !== $staffpass)
			{
				$feedback = "<div class='alert alert-danger alert-dismissable'><ul><li>Incorrect password entry</li><ul></div>" ;
			}
			else
			{
				session_start() ;
				$_SESSION['user_id'] = $staff_id ;
				$_SESSION['access_id'] = $access_id ;
				header("location:dashboard.php") ;
				//$feedback = "<div class='alert alert-success alert-dismissible'>You have been logged in successfully! You'll be redirected in <span id='logindirect'></span><span id='altdirect' hidden='hidden'><a href='dashboard.php'>click here</a></span></div>" ;
			}
		}
	}
	if($counter == 0)
	{
		$feedback = "<div class='alert alert-danger alert-dismissable'><ul><li>Incorrect email entry</li></ul></div>" ; //mysqli_error($connect);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Examiner | Login</title>
		<meta name="description" content="Hound is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Hound Admin, Houndadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body onload="toRedirect()">
		<!--Preloader-->
		<!--<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>-->
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="dist/img/logo.png" alt="brand"/>
						<span class="brand-text">Moscow</span>
					</a>
				</div>
				<!-- <div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Don't have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="signup.html">Sign Up</a>
				</div>
 -->				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Login</h3>
											<h6 class="text-center nonecase-font txt-grey">You need permissions to access this page</h6>
										</div>	
										<div class="form-wrap">
											<form action="" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<h3>feed back section</h3>
													<?php if(isset($feedback))
													{
														echo $feedback;
														} ?>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="email">Examiner Id</label>
													<input type="text" class="form-control" required="" id="email" placeholder="Enter your examiner id" name="email">
													<span class="help-block" id="help-block"></span>
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="password">Password</label>
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="recoverpwrd.php">forgot password ?</a>
													<div class="clearfix"></div>
													<input type="password" class="form-control" required="" id="password" placeholder="Enter pwd" name="password">
												</div>
												
												<!-- <div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div> -->
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded" name="login">sign in</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>

		<!-- Personal.js -->
		<script type="text/javascript" src="js/login.js"></script>
	</body>
</html>
