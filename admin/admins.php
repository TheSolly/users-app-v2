<?php 
require_once '../config/config.php';

if (isset($_GET['delete'])) {
  if (isset($_GET['delete']) == null) {
    header("location:404.php");
    exit();
  }
  else {
    $id = $_GET['delete'];
    deleteUserbyId($id);
    exit(header("location:admins.php"));
  }
}

if (isset($_POST['username'],$_POST['full_name'],$_POST['email'],$_POST['password'],$_POST['re_password'])) {
  $username = $_POST['username'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  $type = ADMINS;

  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    updateUser($id, $username, $full_name, $email, $password);
    header("location:admins.php");
      exit();
  }
  else {
    insertUser($username, $full_name, $email, $password, $type);
  }
  
}

$userList = getUserByType(ADMINS);

 ?>

 <!DOCTYPE html>
<html>
  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>AdminLTE 2 | Data Tables</title>
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <!-- Bootstrap 3.3.7 -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>bower_components/font-awesome/css/font-awesome.min.css">
	    <!-- Ionicons -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>bower_components/Ionicons/css/ionicons.min.css">
	    <!-- DataTables -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>dist/css/AdminLTE.min.css">
	    <!-- AdminLTE Skins. Choose a skin from the css/skins
	         folder instead of downloading all of them to reduce the load. -->
	    <link rel="stylesheet" href="<?php echo ADMIN_TEMP_URL; ?>dist/css/skins/_all-skins.min.css">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

	    <!-- Google Font -->
	    <link rel="stylesheet"
	          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

		<!-- Logo -->
		<a href="index.php" class="logo">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class="logo-mini"><b>A</b>LT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class="logo-lg"><b>Admin</b>LTE</span>
		</a>

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
		  <!-- Sidebar toggle button-->
		  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		    <span class="sr-only">Toggle navigation</span>
		  </a>
		  <!-- Navbar Right Menu -->
		  <div class="navbar-custom-menu">
		    <ul class="nav navbar-nav">
		      <!-- Messages: style can be found in dropdown.less-->
		      <li class="dropdown messages-menu">
		        <!-- Menu toggle button -->
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          <i class="fa fa-envelope-o"></i>
		          <span class="label label-success">4</span>
		        </a>
		        <ul class="dropdown-menu">
		          <li class="header">You have 4 messages</li>
		          <li>
		            <!-- inner menu: contains the messages -->
		            <ul class="menu">
		              <li><!-- start message -->
		                <a href="#">
		                  <div class="pull-left">
		                    <!-- User Image -->
		                    <img src="<?php echo ADMIN_TEMP_URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		                  </div>
		                  <!-- Message title and timestamp -->
		                  <h4>
		                    Support Team
		                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
		                  </h4>
		                  <!-- The message -->
		                  <p>Why not buy a new awesome theme?</p>
		                </a>
		              </li>
		              <!-- end message -->
		            </ul>
		            <!-- /.menu -->
		          </li>
		          <li class="footer"><a href="#">See All Messages</a></li>
		        </ul>
		      </li>
		      <!-- /.messages-menu -->

		      <!-- Notifications Menu -->
		      <li class="dropdown notifications-menu">
		        <!-- Menu toggle button -->
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          <i class="fa fa-bell-o"></i>
		          <span class="label label-warning">10</span>
		        </a>
		        <ul class="dropdown-menu">
		          <li class="header">You have 10 notifications</li>
		          <li>
		            <!-- Inner Menu: contains the notifications -->
		            <ul class="menu">
		              <li><!-- start notification -->
		                <a href="#">
		                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
		                </a>
		              </li>
		              <!-- end notification -->
		            </ul>
		          </li>
		          <li class="footer"><a href="#">View all</a></li>
		        </ul>
		      </li>
		      <!-- Tasks Menu -->
		      <li class="dropdown tasks-menu">
		        <!-- Menu Toggle Button -->
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          <i class="fa fa-flag-o"></i>
		          <span class="label label-danger">9</span>
		        </a>
		        <ul class="dropdown-menu">
		          <li class="header">You have 9 tasks</li>
		          <li>
		            <!-- Inner menu: contains the tasks -->
		            <ul class="menu">
		              <li><!-- Task item -->
		                <a href="#">
		                  <!-- Task title and progress text -->
		                  <h3>
		                    Design some buttons
		                    <small class="pull-right">20%</small>
		                  </h3>
		                  <!-- The progress bar -->
		                  <div class="progress xs">
		                    <!-- Change the css width attribute to simulate progress -->
		                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
		                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
		                      <span class="sr-only">20% Complete</span>
		                    </div>
		                  </div>
		                </a>
		              </li>
		              <!-- end task item -->
		            </ul>
		          </li>
		          <li class="footer">
		            <a href="#">View all tasks</a>
		          </li>
		        </ul>
		      </li>
		      <!-- User Account Menu -->
		      <li class="dropdown user user-menu">
		        <!-- Menu Toggle Button -->
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          <!-- The user image in the navbar-->
		          <img src="<?php echo ADMIN_TEMP_URL; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
		          <!-- hidden-xs hides the username on small devices so only the image appears. -->
		          <span class="hidden-xs">Alexander Pierce</span>
		        </a>
		        <ul class="dropdown-menu">
		          <!-- The user image in the menu -->
		          <li class="user-header">
		            <img src="<?php echo ADMIN_TEMP_URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

		            <p>
		              Alexander Pierce - Web Developer
		              <small>Member since Nov. 2012</small>
		            </p>
		          </li>
		          <!-- Menu Body -->
		          <li class="user-body">
		            <div class="row">
		              <div class="col-xs-4 text-center">
		                <a href="#">Followers</a>
		              </div>
		              <div class="col-xs-4 text-center">
		                <a href="#">Sales</a>
		              </div>
		              <div class="col-xs-4 text-center">
		                <a href="#">Friends</a>
		              </div>
		            </div>
		            <!-- /.row -->
		          </li>
		          <!-- Menu Footer-->
		          <li class="user-footer">
		            <div class="pull-left">
		              <a href="#" class="btn btn-default btn-flat">Profile</a>
		            </div>
		            <div class="pull-right">
		              <a href="#" class="btn btn-default btn-flat">Sign out</a>
		            </div>
		          </li>
		        </ul>
		      </li>
		      <!-- Control Sidebar Toggle Button -->
		      <li>
		        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		      </li>
		    </ul>
		  </div>
		</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">

		  <!-- Sidebar user panel (optional) -->
		  <div class="user-panel">
		    <div class="pull-left image">
		      <img src="<?php echo ADMIN_TEMP_URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		    </div>
		    <div class="pull-left info">
		      <p>Alexander Pierce</p>
		      <!-- Status -->
		      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		    </div>
		  </div>

		  <!-- search form (Optional) -->
		  <form action="#" method="get" class="sidebar-form">
		    <div class="input-group">
		      <input type="text" name="q" class="form-control" placeholder="Search...">
		      <span class="input-group-btn">
		          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
		          </button>
		        </span>
		    </div>
		  </form>
		  <!-- /.search form -->

		  <!-- Sidebar Menu -->
		  <ul class="sidebar-menu" data-widget="tree">
		    <li class="header">Main Nav</li>
		    <!-- Optionally, you can add icons to the links -->
		    <li ><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
		    <li><a href="courses.html"><i class="fa fa-book"></i> <span>Courses</span></a></li>
		    <li class="treeview active">
		      <a href="#"><i class="fa fa-user"></i> <span>Users</span>
		        <span class="pull-right-container">
		            <i class="fa fa-angle-left pull-right"></i>
		          </span>
		      </a>
		      <ul class="treeview-menu">
		        <li class="active"><a href="admins.php"> <span>Admins</span></a></li>
		        <li><a href="students.php"> <span>Students</span></a></li>
		        <li><a href="teachers.php"> <span>Teachers</span></a></li>
		      </ul>
		    </li>
		  </ul>
		  <!-- /.sidebar-menu -->
		</section>
		<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
		    All Admins
		  </h1>
		  <ol class="breadcrumb">
		    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		    <li class="active">Admins</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
		    <div class="col-xs-12">
		      <div class="box">
		        <div class="box-header">
		          <h3 class="box-title">All Admins Table</h3>
		        </div>
		        <div class="row">
		          <div class="col-xs-8 col-xs-offset-2">
		            <?php
		                if (isset($_GET['edit'])){
		                    $user = getUserById($_GET['edit']);
		            ?>
		              <form action="" method="post">
		                <div class="form-text bg-success text-white text-center font-weight-bold rounded">Update User</div>
		                <div class="form-group">
		                  <input type="hidden" name="id" class="form-control" value="<?php echo $user['id'] ?>">
		                </div>
		                <div class="form-group">
		                  <label>Full Name</label>
		                  <input type="text" name="full_name" class="form-control" value="<?php echo $user['full_name']?>">
		                </div>
		                <div class="form-group">
		                  <label>Username</label>
		                  <input type="text" name="username" class="form-control" value="<?php echo $user['username']?>">
		                </div>
		                <div class="form-group">
		                  <label>Email</label>
		                  <input type="email" name="email" class="form-control" value="<?php echo $user['email']?>">
		                </div>
		                <div class="form-group">
		                  <label>Password</label>
		                  <input type="password" name="password" class="form-control" value="">
		                </div>
		                <div class="form-group">
		                  <label>Re-enter Password</label>
		                  <input type="password" name="re_password" class="form-control" value="">
		                </div>
		                <div class="form-group">
		                  <button class="btn btn-success btn-block font-weight-bold" type="submit">Save</button>
		                </div>
		              </form>
		            <?php
		                } else {
		            ?>
		              <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add-new">
		                ADD NEW
		              </button>
		            <?php } 
		            ?>
		          </div>
		        </div>
		        <!-- /.box-header -->
		        <div class="box-body">

		          <table id="table-courses" class="table table-bordered table-striped">
		            <thead>
		            <tr>
		      <th>#</th>
		              <th>Full Name</th>
		              <th>Username</th>
		              <th>Email</th>
		              <th>Edit</th>
		              <th>Delete</th>
		            </tr>
		            </thead>
		            <tbody>
		      <?php 
		      foreach($userList as $user) : 
		      ?>
		        <tr>
		          <td><?php echo $user['id']; ?></td>
		          <td><?php echo $user['username']; ?></td>
		          <td><?php echo $user['full_name']; ?></td>
		          <td><?php echo $user['email']; ?></td>
		          <td><a href="<?php ADMIN_URL; ?>?edit=<?php echo $user['id']; ?>" class="btn btn-secondary">Edit</a></td>
		          <td><a href="admins.php?delete=<?php echo $user['id'];?>" class="btn btn-danger">Delete</a></td>
		        </tr>
		      <?php 
		      endforeach; 
		      ?>
		            </tbody>
		            <tfoot>
		            <tr>

		            </tr>
		            </tfoot>
		          </table>
		        </div>
		        <!-- /.box-body -->
		      </div>
		      <!-- /.box -->
		    </div>
		    <!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->


		<footer class="main-footer">
		<div class="pull-right hidden-xs">
		  <b>Version</b> 2.4.0
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
		reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		  <!-- Home tab content -->
		  <div class="tab-pane" id="control-sidebar-home-tab">
		    <h3 class="control-sidebar-heading">Recent Activity</h3>
		    <ul class="control-sidebar-menu">
		      <li>
		        <a href="javascript:void(0)">
		          <i class="menu-icon fa fa-birthday-cake bg-red"></i>

		          <div class="menu-info">
		            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

		            <p>Will be 23 on April 24th</p>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <i class="menu-icon fa fa-user bg-yellow"></i>

		          <div class="menu-info">
		            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

		            <p>New phone +1(800)555-1234</p>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

		          <div class="menu-info">
		            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

		            <p>nora@example.com</p>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <i class="menu-icon fa fa-file-code-o bg-green"></i>

		          <div class="menu-info">
		            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

		            <p>Execution time 5 seconds</p>
		          </div>
		        </a>
		      </li>
		    </ul>
		    <!-- /.control-sidebar-menu -->

		    <h3 class="control-sidebar-heading">Tasks Progress</h3>
		    <ul class="control-sidebar-menu">
		      <li>
		        <a href="javascript:void(0)">
		          <h4 class="control-sidebar-subheading">
		            Custom Template Design
		            <span class="label label-danger pull-right">70%</span>
		          </h4>

		          <div class="progress progress-xxs">
		            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <h4 class="control-sidebar-subheading">
		            Update Resume
		            <span class="label label-success pull-right">95%</span>
		          </h4>

		          <div class="progress progress-xxs">
		            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <h4 class="control-sidebar-subheading">
		            Laravel Integration
		            <span class="label label-warning pull-right">50%</span>
		          </h4>

		          <div class="progress progress-xxs">
		            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
		          </div>
		        </a>
		      </li>
		      <li>
		        <a href="javascript:void(0)">
		          <h4 class="control-sidebar-subheading">
		            Back End Framework
		            <span class="label label-primary pull-right">68%</span>
		          </h4>

		          <div class="progress progress-xxs">
		            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
		          </div>
		        </a>
		      </li>
		    </ul>
		    <!-- /.control-sidebar-menu -->

		  </div>
		  <!-- /.tab-pane -->
		  <!-- Stats tab content -->
		  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		  <!-- /.tab-pane -->
		  <!-- Settings tab content -->
		  <div class="tab-pane" id="control-sidebar-settings-tab">
		    <form method="post">
		      <h3 class="control-sidebar-heading">General Settings</h3>

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Report panel usage
		          <input type="checkbox" class="pull-right" checked>
		        </label>

		        <p>
		          Some information about this general settings option
		        </p>
		      </div>
		      <!-- /.form-group -->

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Allow mail redirect
		          <input type="checkbox" class="pull-right" checked>
		        </label>

		        <p>
		          Other sets of options are available
		        </p>
		      </div>
		      <!-- /.form-group -->

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Expose author name in posts
		          <input type="checkbox" class="pull-right" checked>
		        </label>

		        <p>
		          Allow the user to show his name in blog posts
		        </p>
		      </div>
		      <!-- /.form-group -->

		      <h3 class="control-sidebar-heading">Chat Settings</h3>

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Show me as online
		          <input type="checkbox" class="pull-right" checked>
		        </label>
		      </div>
		      <!-- /.form-group -->

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Turn off notifications
		          <input type="checkbox" class="pull-right">
		        </label>
		      </div>
		      <!-- /.form-group -->

		      <div class="form-group">
		        <label class="control-sidebar-subheading">
		          Delete chat history
		          <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
		        </label>
		      </div>
		      <!-- /.form-group -->
		    </form>
		  </div>
		  <!-- /.tab-pane -->
		</div>
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
		   immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>

		<div class="modal fade" id="add-new">
		<div class="modal-dialog">
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Add New Admin</h4>
		    </div>
		    <form action="" method="post">
		      <div class="modal-body">
		        <div class="row">
		          <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		              <input type="text" class="form-control" placeholder="Username" name="username">
		            </div>
		          </div>
		          <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		              <input type="text" class="form-control" placeholder="Full Name" name="full_name">
		            </div>
		          </div>
		          <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		              <input type="email" class="form-control" placeholder="Email" name="email">
		            </div>
		          </div>
		          <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		              <input type="password" class="form-control" placeholder="Password" name="password">
		            </div>
		          </div>
		          <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		              <input type="password" class="form-control" placeholder="Re enter Password" name="re_password">
		            </div>
		          </div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </form>

		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery 3 -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>bower_components/fastclick/lib/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo ADMIN_TEMP_URL; ?>dist/js/demo.js"></script>
		<!-- page script -->
		<script>
		$(function () {
		    $('table').DataTable();
		});
		</script>
	</body>
</html>