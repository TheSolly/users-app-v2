<?php 
require_once 'config/config.php';

if (isset($_POST['username'],$_POST['full_name'],$_POST['password'],$_POST['re-password'])) {
	$username = $_POST['username'];
	$full_name = $_POST['full_name'];
	$password = $_POST['password'];
	$re_password = $_POST['re-password'];
	
	if (insertUser($full_name, $username, $password)) {
		?> <script type="text/javascript">
			var full_name = "<?php echo $full_name; ?>";
			alert(full_name + " " +"Has been added successfully");
			window.location.href = "index.php";
			</script>
		<?php
	}else {
		echo "Failed";
	}
}

_header(APP_NAME);
?>


<div class="col-12">
	<div class="col-12">
		<a href="index.php" class="h4 page-link bg-primary text-white text-center text-uppercase font-weight-bold">All Users</a>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-6">
		<form class="form form-control" action="adduser.php" method="post">
			<div class="form-text bg-success text-white text-center font-weight-bold rounded mb-3">Add User</div>
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" name="full_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Re-enter Password</label>
				<input type="password" name="re-password" class="form-control">
			</div class="form-group">
				<button class="btn btn-success btn-block font-weight-bold" type="submit">Save</button>
			</div>
		</form>
	</div>
</div>
<?php _footer(); ?>