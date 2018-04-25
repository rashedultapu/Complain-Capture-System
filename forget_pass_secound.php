<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
  header("Location: index.php");
}

$cell = $_POST['cell'];
$query=mysql_query("SELECT * FROM user_info WHERE cell='$cell'");
$result=mysql_fetch_array($query);
$user = $result['user_id'];

if(isset($_POST['btn-submit']))
{
  
  $passw = @$_POST['new_pass'];
  $cell = mysql_real_escape_string($_POST['cell']);
  $sq = mysql_real_escape_string($_POST['sq']);
  $sq_ans = mysql_real_escape_string($_POST['sq_ans']);
  $upass = mysql_real_escape_string($_POST['pass']);
  $repass = mysql_real_escape_string($_POST['new_pass']);
if ($upass == '') {
  	?>
    <script type="text/javascript">
    alert('Check Your Re-Password');
    </script>
    <?php
  }

	else if ($repass == '') {
  	?>
    <script type="text/javascript">
    alert('Check Your Password');
    </script>
    <?php
  } 
  else if ($passw == $upass) {

  	$sql_query = "UPDATE user_info SET password='$upass'WHERE user_id = '$user' and cell = '$cell' and sq ='$sq' and sq_ans='$sq_ans'";

  } else {
  	?>
    <script type="text/javascript">
    alert('Password Not Matched');
    </script>
    <?php
  }
  
  if(mysql_query($sql_query))
  {
    ?>
    <script type="text/javascript">
    alert('Password Changed Successfully');
    window.location.href='index.php';
    </script>
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
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
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
					
					<h2><b>Change Your Password</b></h2>
					<form class="form-horizontal" method="post">
						<fieldset>
						<input name="cell" type="hidden" value="<?php echo $result['cell']; ?>"/>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<select name="sq" id="sq">
									<option value="">Select A Security Question</option>
									<option value="What is the name of your favorite pet?">&nbsp;&nbsp; What is the name of your favorite pet? &nbsp;</option>
							        <option value="In which city were you born?" >&nbsp;&nbsp; In which city were you born? &nbsp;</option>
							        <option value="What is your favorite team?" >&nbsp;&nbsp; What is your favorite team? &nbsp;</option>
							        <option value="What was your favorite sport in high school?" >&nbsp;&nbsp; What was your favorite sport in high school? &nbsp;</option>
							        <option value="IWhat was your favorite food as a child?" >&nbsp;&nbsp; What was your favorite food as a child? &nbsp;</option>
							        <option value="Who is your childhood sports hero?" >&nbsp;&nbsp; Who is your childhood sports hero? &nbsp;</option>
							        <option value="In what town or city did you meet your spouse/partner?" >&nbsp;&nbsp; In what town or city did you meet your spouse/partner? &nbsp;</option>
							        <option value="What is your favorite movie?" >&nbsp;&nbsp; What is your favorite movie? &nbsp;</option>
							        <option value="What is your mother's maiden name?">&nbsp;&nbsp; What is your mother's maiden name? &nbsp;</option>
							        <option value="What street did you grow up on?">&nbsp;&nbsp; What street did you grow up on? &nbsp;</option>
							        <option value="What is your favorite color?">&nbsp;&nbsp; What is your favorite color? &nbsp;</option>
							        <option value="What is the name of your first grade teacher?">&nbsp;&nbsp; What is the name of your first grade teacher? &nbsp;</option>
							        <option value="Who is your favorite actor, musician, or artist?">&nbsp;&nbsp; Who is your favorite actor, musician, or artist? &nbsp;</option>
							        <option value="What was your high school mascot?">&nbsp;&nbsp; What was your high school mascot? &nbsp;</option>
							        <option value="what was your favorite place to visit as a child?">&nbsp;&nbsp; What was your favorite place to visit as a child? &nbsp;</option>
								  </select>
							</div>
							<div class="clearfix"></div>
							<div class="input-prepend">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="sq_ans" type="text" placeholder="Answer" />
							</div>
							<div class="clearfix"></div>
							<div class="input-prepend">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="new_pass" type="password" placeholder="New Password" />
							</div>
							<div class="clearfix"></div>
							<div class="input-prepend">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="pass" type="password" placeholder="Re-Type New Password" />
							</div>

							<div class="button-login">	
								<button type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
				</div><!--/span-->
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
