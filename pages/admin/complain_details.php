<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: ../../index.php");
}
$res=mysql_query("SELECT * FROM user_info WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

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

    function edit_id(id)
      {
        window.location.href='complain_view.php?edit_id='+id;
      }

    </script>

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
								<li><a class="submenu" href="product_type.php"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Product Type</span></a></li>
							</ul>	
						</li>
						<li><a href="create_access.php"><i class="icon-user"></i><span class="hidden-tablet"> Create Access</span></a></li>
						
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
				<li>
					<i class="icon-edit"></i>
					<a href="complain_details.php">Complain Details</a>
				</li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-edit"></i><span class="break"></span>Complain Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
					<form method="post">
						<table id="employee-grid" class="table table-bordered">
						  <thead>
						  	<tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Customer Number</th>
                                <th>Operation</th>
                            </tr>
						  </thead>
						  <tbody>
                              <tr>
                                    <td>
									  <div class="control-group warning">
										<div class="controls" >
										  <input type="date" name="start_date">
										</div>
									  </div>
									</td>
									<td>
									  <div class="control-group warning">
										<div class="controls" >
										  <input type="date" name="end_date">
										</div>
									  </div>
									</td>
                                    <td>
									  <div class="control-group warning">
										<div class="controls" >
										  <input type="text" name="cell" placeholder='Customer Number'>
										</div>
									  </div>
									</td>
                                    <td><button type="submit" class="btn btn-primary waves-effect">View</button></td>
                              </tr>
                          </tbody>
					  </table>
					  </form>
						<table id="employee-grid" class="table table-striped table-bordered">
						  <thead>
							  <tr>
			                        <th>Submitted By</th>
			                        <th>Date</th>
			                        <th>Customer Number</th>
			                        <th>Product Name</th>
			                        <th>Problem Title</th>
			                        <th>Problem Type</th>
			                        <th>Department</th>
			                        <th>Problem Date</th>
			                        <th>Status</th>
			                        <th>Operation</th>
							  </tr>
						  </thead>
						  <?php
						  		
                                    if (empty($_POST['start_date']) || empty($_POST['end_date']) || empty($_POST['cell'])) {

                                        $raw_results = mysql_query("SELECT * FROM `complains`");
                                        }
                                    else if (empty($_POST['start_date']) || empty($_POST['end_date'])) {

                                    	$cell = @$_POST['cell'];

                                        $raw_results = mysql_query("SELECT * FROM `complains` WHERE `customer_number` LIKE '".$cell."' ORDER  BY `submitted_date` DESC");
                                        }
                                    else {

                                        $start_date= @$_POST['start_date'];
                                        $end_date= @$_POST['end_date'];
                                        $cell = $_POST['cell'];

                                        $raw_results = mysql_query("SELECT * FROM `complains` WHERE `customer_number` LIKE '".$cell."' AND `submitted_date` BETWEEN '".$start_date."' AND '".$end_date."' ORDER  BY `submitted_date` DESC"); 
                                        }
                                    
                                    if(mysql_num_rows($raw_results) > 0){
                                        while($results = mysql_fetch_array($raw_results)){
                                     ?>
						  <tbody>
                              <tr>
                                    <td><?php echo $results['submitted_by']; ?></td>
                                    <td><?php echo $results['submitted_date']; ?></td>
                                    <td><?php echo $results['customer_number']; ?></td>
                                    <td><?php echo $results['product_name']; ?></td>
                                    <td><?php echo $results['problem_title']; ?></td>
                                    <td><?php echo $results['problem_sub_type']; ?></td>
                                    <td><?php echo $results['problem_type']; ?></td>
                                    <td><?php echo $results['problem_start_date']; ?></td>
                                    <td><?php echo $results['status']; ?></td>
                                    <td><a href="javascript:edit_id('<?php echo $results['user_id']; ?>')" class="btn btn-primary"/>View</td>
                              </tr>
                          <?php
                               }
                                  }
                                  else
                                    {
                                      ?>
                                        <tr>
                                            <td colspan="7"><center>No Data Found</center></td>
                                        </tr>
                                       <?php
                                    }
                                ?>
                          </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			
			
    

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
