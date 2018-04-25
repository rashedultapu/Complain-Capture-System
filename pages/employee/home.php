<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: ../../index.php");
}
$res=mysql_query("SELECT * FROM user_info WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$expert=$userRow['expert_in'];

date_default_timezone_set('Asia/Dhaka');
$daily = date("Y-m-d");

$start_date= date('Y-m-d', strtotime('first day of this month'));
$end_date= date('Y-m-d', strtotime('last day of this month'));



$month=date("M");

$result_set1=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$expert' and `submitted_date` BETWEEN '".$start_date."' AND '".$end_date."'");
$row1=mysql_fetch_assoc($result_set1);

$result_set13=mysql_query("SELECT count(problem_type) as monthly_solved_complain FROM complains WHERE `problem_type` = '$expert' and status = 'Closed' AND  `submitted_date` BETWEEN '".$start_date1."' AND '".$end_date1."'");
$row13=mysql_fetch_assoc($result_set13);

$result_set14=mysql_query("SELECT count(problem_type) as daily_total_complain FROM complains WHERE `problem_type` = '$expert' and `submitted_date` = '$daily'");
$row14=mysql_fetch_assoc($result_set14);

$result_set15=mysql_query("SELECT count(problem_type) as daily_solved_complain FROM complains WHERE `problem_type` = '$expert' and status = 'Closed' AND  `submitted_date` = '$daily'");
$row15=mysql_fetch_assoc($result_set15);

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
	<link id="bootstrap-style" href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../../css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../../css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../../img/favicon.png">
	<!-- end: Favicon -->

	<script>
	  var old_count_New_Job = 1;
	      setInterval(function(){

	          $.ajax({

	              type : "POST",
	              url : "banners.php",
	              success : function(data){
	  				$('#output').html(data);
	              }
	          });
	      
	      },1000);
	  </script>
		

		

		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="home.php"><span>Complain Capture System</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red" id="output"></span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You Have Open Complains</span>
								</li>	
							</ul>
						</li>
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $userRow['username']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="profile.php"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="logout.php?logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="home.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-edit"></i><span class="hidden-tablet"> <b>Complain</b></span></a>
							<ul>
								<li><a class="submenu" href="create_complain.php"><i class="icon-edit"></i><span class="hidden-tablet"> Create Complain</span></a></li>
								<li><a class="submenu" href="complain_details.php"><i class="icon-search"></i><span class="hidden-tablet"> Complain Details</span></a></li>
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-list-alt"></i><span class="hidden-tablet"> <b>Feedback</b></span></a>
							<ul>
								<li><a class="submenu" href="feedback.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Recived Feedback</span></a></li>
								<li><a class="submenu" href="feedback_details.php"><i class="icon-search"></i><span class="hidden-tablet"> Feedback Details</span></a></li>
							</ul>	
						</li>
						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="home.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="home.php">Dashboard</a></li>
			</ul>
			
			<div class="row-fluid">	

				<a class="quick-button metro yellow span3">
					<i class="icon-comments-alt"></i>
					<p>Monthly Total Complain</p>
					<span class="badge"><h1><?php echo $row1['total_complain']; ?></h1></span>
				</a>
				<a class="quick-button metro red span3">
					<i class="icon-legal"></i>
					<p>Monthly Solved Complain</p>
					<span class="badge"><h1><?php echo $row13['monthly_solved_complain']; ?></h1></span>
				</a>
				<a class="quick-button metro blue span3">
					<i class="icon-filter"></i>
					<p>Todays Total Complain</p>
					<span class="badge"><h1><?php echo $row14['daily_total_complain']; ?></h1></span>
				</a>
				<a class="quick-button metro pink span3">
					<i class="icon-legal"></i>
					<p>Todays Solved Complain</p>
					<span class="badge"><h1><?php echo $row15['daily_solved_complain']; ?></h1></span>
				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2017 <a>Complain Capture System</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->
		<script src="../../js/loader.js"></script>
		<script src="../../js/jquery-1.9.1.min.js"></script>
	<script src="../../js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="../../js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="../../js/jquery.ui.touch-punch.js"></script>
	
		<script src="../../js/modernizr.js"></script>
	
		<script src="../../js/bootstrap.min.js"></script>
	
		<script src="../../js/jquery.cookie.js"></script>
	
		<script src='../../js/fullcalendar.min.js'></script>
	
		<script src='../../js/jquery.dataTables.min.js'></script>

		<script src="../../js/excanvas.js"></script>
	<script src="../../js/jquery.flot.js"></script>
	<script src="../../js/jquery.flot.pie.js"></script>
	<script src="../../js/jquery.flot.stack.js"></script>
	<script src="../../js/jquery.flot.resize.min.js"></script>
	
		<script src="../../js/jquery.chosen.min.js"></script>
	
		<script src="../../js/jquery.uniform.min.js"></script>
		
		<script src="../../js/jquery.cleditor.min.js"></script>
	
		<script src="../../js/jquery.noty.js"></script>
	
		<script src="../../js/jquery.elfinder.min.js"></script>
	
		<script src="../../js/jquery.raty.min.js"></script>
	
		<script src="../../js/jquery.iphone.toggle.js"></script>
	
		<script src="../../js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="../../js/jquery.gritter.min.js"></script>
	
		<script src="../../js/jquery.imagesloaded.js"></script>
	
		<script src="../../js/jquery.masonry.min.js"></script>
	
		<script src="../../js/jquery.knob.modified.js"></script>
	
		<script src="../../js/jquery.sparkline.min.js"></script>
	
		<script src="../../js/counter.js"></script>
	
		<script src="../../js/retina.js"></script>

		<script src="../../js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
