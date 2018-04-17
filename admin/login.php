<?php
require_once '../config/config.php';


if (isset($_SESSION['user'])) {
	exit(header("Location:" . ADMIN_URL));
}

if (isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (login($username, $password)) {
		session_start();
		$_SESSION['user'] = $user;
		exit(header("Location:" . ADMIN_URL));
	}
	else {
		echo "error";
	}
}


_header_admin(APP_NAME);
 ?>
<div class="row justify-content-around">
      <div class="col-12 text-center">
        <header class="h2 bg-primary text-white pl-3 text-uppercase font-weight-bold">
        	Admin
        </header>
<div class="row justify-content-around mt-5">
	<div class="col-4 text-center">
		<form class="form-signin" action="<?php echo ADMIN_URL; ?>login.php"  method="post">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		    <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
	</div>
</div>








 <?php 
_footer_admin()


  ?>