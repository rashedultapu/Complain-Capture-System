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
  $username = $_POST['username'];
  $cell = $_POST['cell'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $user_type = $_POST['user_type'];
  $department = $_POST['department'];
  $password = $_POST['pass'];
  $re_password = $_POST['re_pass'];
  
  if ($password == $re_password) {

  	$sql_query = "INSERT INTO user_info (username,cell,email,address,user_type,department,password) VALUES('$username','$cell','$email','$address','$user_type','$department','$password')";
  } else {
  	?>
    <script type="text/javascript">
    alert('Password Not Matched');
    window.location.href='create_access.php';
    </script>
    <?php
  }
  
  if(mysql_query($sql_query))
  {
    ?>
    <script type="text/javascript">
    alert('Access Created Successfully');
    window.location.href='create_access.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
    alert('Error Occured While Creating Access');
    </script>
    <?php
  }
}
if(isset($_POST['btn-cancel']))
{
  header("Location: create_access.php");
}
if(isset($_GET['delete_id']))
{
  $sql_query="DELETE FROM user_info WHERE user_id=".$_GET['delete_id'];
  mysql_query($sql_query);
  header("Location: $_SERVER[PHP_SELF]");
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

    function delete_id(id)
      {
        if(confirm('Are You Want To Delete This User ?'))
          {
             window.location.href='create_access.php?delete_id='+id;
          }
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
					<a href="#">Create Access</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add User</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form method="post" class="form-horizontal">
							<fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>
							  <div class="controls">
								<input type="text" name="username" class="span6 typeahead" placeholder='Name'>
							  </div>
							</div>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">Phone Number</label>
								<div class="controls" >
								  <input type="tel" name="cell" placeholder='17********'>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="input">Em@il</label>
								<div class="controls">
								  <input type="text" name="email" placeholder='john@mail.com'>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Address</label>
								<div class="controls">
								  <textarea class="text" name="address" rows="3" placeholder='Address'></textarea>
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label" for="selectError">User Type</label>
								<div class="controls">
								<select name="user_type" id="user_type" data-rel="chosen">
									<option value="">Select A User Type</option>
									<option value="Admin">Admin</option>
									<option value="Sub-admin">Sub-Admin</option>
									<option value="Employee">Employee</option>
									<option value="Customer">Customer</option>
								  </select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError">Department (If Employee)</label>
								<div class="controls">
								<select name="department" id="department" data-rel="chosen">
									<option value="">Select A Department</option>
									<option value="Hardware">Hardware</option>
									<option value="Software">Software</option>
								  </select>
								</div>
							</div>
							  <div class="control-group">
								<label class="control-label" for="address">Password</label>
								<div class="controls">
								  <input type="password" name="pass" placeholder='Password'>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="address">Re-Type Password</label>
								<div class="controls">
								  <input type="password" name="re_pass" placeholder='Re-Type Password'>
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

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table id="employee-grid" class="table table-striped table-bordered">
						  <thead>
							  <tr>
			                        <th>Username</th>
			                        <th>Cell</th>
			                        <th>Email</th>
			                        <th>Address</th>
			                        <th>User Type</th>
			                        <th>Department</th>
			                        <th>Operation</th>
							  </tr>
						  </thead>
						  <?php
                                            $sql_query=mysql_query("SELECT * FROM `user_info`");
                                            if(mysql_num_rows($sql_query)>0)
                                                {
                                                   while($row=mysql_fetch_array($sql_query))
                                                {
                                        ?>
						  <tbody>
                              <tr>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['cell']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['user_type']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td>
                                      <a href="javascript:delete_id('<?php echo $row['user_id']; ?>')"><button class="btn btn-primary">Delete</button>
                                    </td>
                              </tr>
                          <?php
                               }
                                  }
                                  else
                                    {
                                      ?>
                                        <tr>
                                            <td colspan="10"><center>No Data Found</center></td>
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
