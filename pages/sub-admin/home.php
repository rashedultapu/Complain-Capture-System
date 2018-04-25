<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: ../../index.php");
}
$res=mysql_query("SELECT * FROM user_info WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$dept=$userRow['department'];


date_default_timezone_set('Asia/Dhaka');
$daily = date("Y-m-d");

$start_date= date('Y-m-d', strtotime('first day of this month'));
$end_date= date('Y-m-d', strtotime('last day of this month'));

$start_date5= date('Y-m-d', strtotime('last sunday of last month'));
$end_date5= date('Y-m-d', strtotime('first saturday of this month'));

$start_date1= date('Y-m-d', strtotime('first sunday of this month'));
$end_date1= date('Y-m-d', strtotime('second saturday of this month'));

$start_date2= date('Y-m-d', strtotime('second sunday of this month'));
$end_date2= date('Y-m-d', strtotime('third saturday of this month'));

$start_date3= date('Y-m-d', strtotime('third sunday of this month'));
$end_date3= date('Y-m-d', strtotime('fourth saturday of this month'));

$start_date4= date('Y-m-d', strtotime('fourth sunday of this month'));
$end_date4= date('Y-m-d', strtotime('fifth saturday of this month'));

$week5= date("W", strtotime('last monday of last month'));
$week1= date("W", strtotime('first monday of this month'));
$week2= date("W", strtotime('second monday of this month'));
$week3= date("W", strtotime('third monday of this month'));
$week4= date("W", strtotime('fourth monday of this month'));

$month=date("M");

$result_set1=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date."' AND '".$end_date."'");
$row1=mysql_fetch_assoc($result_set1);

$result_set2=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date5."' AND '".$end_date5."'");
$row2=mysql_fetch_assoc($result_set2);

$result_set3=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date1."' AND '".$end_date1."'");
$row3=mysql_fetch_assoc($result_set3);

$result_set4=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date2."' AND '".$end_date2."'");
$row4=mysql_fetch_assoc($result_set4);

$result_set5=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date3."' AND '".$end_date3."'");
$row5=mysql_fetch_assoc($result_set5);

$result_set6=mysql_query("SELECT count(problem_type) as total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` BETWEEN '".$start_date4."' AND '".$end_date4."'");
$row6=mysql_fetch_assoc($result_set6);

//Open Complain

$result_set7=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND `submitted_date` BETWEEN '".$start_date."' AND '".$end_date."'");
$row7=mysql_fetch_assoc($result_set7);

$result_set8=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND  `submitted_date` BETWEEN '".$start_date5."' AND '".$end_date5."'");
$row8=mysql_fetch_assoc($result_set8);

$result_set9=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND  `submitted_date` BETWEEN '".$start_date1."' AND '".$end_date1."'");
$row9=mysql_fetch_assoc($result_set9);

$result_set10=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND  `submitted_date` BETWEEN '".$start_date2."' AND '".$end_date2."'");
$row10=mysql_fetch_assoc($result_set10);

$result_set11=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND  `submitted_date` BETWEEN '".$start_date3."' AND '".$end_date3."'");
$row11=mysql_fetch_assoc($result_set11);

$result_set12=mysql_query("SELECT count(problem_type) as open_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Open' AND  `submitted_date` BETWEEN '".$start_date4."' AND '".$end_date4."'");
$row12=mysql_fetch_assoc($result_set12);

$result_set13=mysql_query("SELECT count(problem_type) as monthly_solved_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Closed' AND  `submitted_date` BETWEEN '".$start_date1."' AND '".$end_date1."'");
$row13=mysql_fetch_assoc($result_set13);

$result_set14=mysql_query("SELECT count(problem_type) as daily_total_complain FROM complains WHERE `problem_type` = '$dept' AND  `submitted_date` = '$daily'");
$row14=mysql_fetch_assoc($result_set14);

$result_set15=mysql_query("SELECT count(problem_type) as daily_solved_complain FROM complains WHERE `problem_type` = '$dept' AND  status = 'Closed' AND  `submitted_date` = '$daily'");
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
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
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
						<li><a href="pending_complain.php"><i class="icon-warning-sign"></i><span class="hidden-tablet"> Pending Complain</span></a></li>
						<li><a href="assign_experties.php"><i class="icon-fire"></i><span class="hidden-tablet"> Assign Experties</span></a></li>
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
						<li>
							<a class="dropmenu" href="#"><i class="icon-hdd"></i><span class="hidden-tablet"> <b>Data Source</b></span></a>
							<ul>
								<li><a class="submenu" href="problem_type.php"><i class="icon-pencil"></i><span class="hidden-tablet"> Problem Type</span></a></li>
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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
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
			<p>
			<span> </span>
			
		</p>

			<div class="row-fluid">
				
				<div class="widget blue span12" onTablet="span6" onDesktop="span12">
					
					<h2><span class="icon-signal"><i></i></span> Weekly Status</h2>
					
					<hr>
					
					<div class="content">
						
						<div class="verticalChart">
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row2['total_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Total (W <?php echo $week5; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row8['open_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Open (W <?php echo $week5; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row3['total_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Total (W <?php echo $week1; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row9['open_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Open (W <?php echo $week1; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row4['total_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Total (W <?php echo $week2; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row10['open_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Open (W <?php echo $week2; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row5['total_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Total (W <?php echo $week3; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row11['open_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Open (W <?php echo $week3; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row6['total_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Total (W <?php echo $week4; ?>)</div>
							
							</div>
							
							<div class="singleBar">
							
								<div class="bar">
								
									<div class="value">
										<span><?php echo $row12['open_complain']; ?></span>
									</div>
								
								</div>
								
								<div class="title">Open (W <?php echo $week4; ?>)</div>
							
							</div>
							
							<div class="clearfix"></div>
							
						</div>
					
					</div>
					
				</div><!--/span-->

			</br>
						
					
			
			
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	
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
