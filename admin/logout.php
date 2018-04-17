<?php 
require_once '../config/config.php';

if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	exit(header("Location:" . ADMIN_URL . "login.php"));
}

 ?>