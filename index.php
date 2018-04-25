<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
  header("Location: index.php");
}

if(isset($_POST['btn-login']))
{
  $cell = mysql_real_escape_string($_POST['cell']);
  $upass = mysql_real_escape_string($_POST['pass']);
  $res=mysql_query("SELECT * FROM user_info WHERE cell='$cell'");
  $row=mysql_fetch_array($res);
  
  if($row['password']==$upass & $row['user_type'] == 'Admin')
  {
    $_SESSION['user'] = $row['user_id'];
    header("Location: pages/admin/home.php");
  }
  else if($row['password']==$upass & $row['user_type'] == 'Employee')
  {
    $_SESSION['user'] = $row['user_id'];
    header("Location: pages/employee/home.php");
  }
  else if($row['password']==$upass & $row['user_type'] == 'Sub-admin')
  {
    $_SESSION['user'] = $row['user_id'];
    header("Location: pages/sub-admin/home.php");
  }
  else if($row['password']==$upass & $row['user_type'] == 'Customer')
  {
    $_SESSION['user'] = $row['user_id'];
    header("Location: pages/customer/home.php");
  }
  else
  {
    ?>
        <script>alert('wrong details');</script>
        <?php
  }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Complain Capture System</title>
	<meta name="description" content="Complain Capture System">
	<meta name="author" content="Rashedul Hussain Tapu">
	<meta name="keyword" content=", Dashboard, Bootstrap, Admin, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.png">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					
					<h2><b>Login to your account</b></h2>
					<form class="form-horizontal" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="cell" type="text" placeholder="Mobile Number"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="pass" type="password" placeholder="Password"/>
							</div>
							<div class="clearfix"></div>

							<div class="button-login">	
								<button type="submit" name="btn-login" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3><a href="forget_pass_first.php">Forget Password</a></h3>	
					<div class="already">
			            <p>&nbsp;</p>
			            
			        </div>
					<div class="already">
			            <p> Don't have an account yet? <a href="signup.php">Sign Up</a></p>
			            
			        </div>
				</div><!--/span-->
				<p>&nbsp;</p>
			</div><!--/row-->
			
<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2017 <a>Complain Capture System</a></span>
			
		</p>

	</footer>
	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	   
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
