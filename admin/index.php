<?php 
require_once '../config/config.php';

session_start();
if (!isset($_SESSION['user'])) {
    exit(header("Location:" . ADMIN_URL . "login.php"));
}



_header_admin(APP_NAME);
 ?>


<div class="row">
      <div class="col-12">
        <header class="h2 bg-primary text-white text-center text-uppercase font-weight-bold">
        	Admin
        </header>







 <?php 
_footer_admin();

  ?>