<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: ../../index.php");
}
$res=mysql_query("SELECT * FROM user_info WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

if(isset($_POST['btn-save']))
{
  date_default_timezone_set('Asia/Dhaka');
  $submitted_by = $userRow['username'];
  $submitted_date = date("Y-m-d H:i:s");
  $customer_number = $_POST['customer_number'];
  $product_name = $_POST['product_name'];
  $feedback = $_POST['feedback'];
  
  $sql_query = "INSERT INTO feedback (submitted_by,submitted_date,customer_number,product_name,feedback) VALUES('$submitted_by','$submitted_date','$customer_number','$product_name','$feedback')";
  
  if(mysql_query($sql_query))
  {
    ?>
    <script type="text/javascript">
    alert('Feedback Added Successfully');
    window.location.href='feedback.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
    alert('Error Occured While Adding Feedback');
    </script>
    <?php
  }
}
if(isset($_POST['btn-cancel']))
{
  header("Location: feedback.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Complain Capture System</title>
	<meta name="description" content="Complain Capture System">
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
					<a href="#">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="feedback.php">Feedback</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Feedback</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form method="post" class="form-horizontal">
							<fieldset>
							<div class="control-group warning">
								<label class="control-label" for="inputWarning">Input Number</label>
								<div class="controls" >
								  <input type="number" name="customer_number" placeholder='17********' required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError">Select Product</label>
								<div class="controls">
								<select name="product_name" id="product_name" data-rel="chosen">
									<option value="">Product List</option>
									<?php
                                              $query = mysql_query("SELECT DISTINCT * FROM `product` ORDER BY `type`");
                                                while($row = mysql_fetch_array($query)){
                                                   echo '<option value = "'.$row['type'].'">'.$row['type'].'</option>';
                                                }
                                            ?>
								  </select>
								</div>
							</div>
							<div class="control-group error">
								<label class="control-label" for="inputError">Feedback</label>
								<div class="controls">
								  <textarea class="cleditor" name="feedback" rows="3"></textarea>
								</div>
							</div>
							  
							  <div class="form-actions">
								<button type="submit" name="btn-save" class="btn btn-primary">Submit</button>
								<button name="btn-cancel" class="btn">Cancel</button>
							  </div>
							</fieldset>
						</form>
					</div>
				</div><!--/span-->
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
