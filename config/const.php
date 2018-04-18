<?php 

// APP Name

define('APP_NAME', 'APP2');


// Database Connection 

$dbname = "session19";
$driver = "mysql";
$host = "localhost";
$username = "root";
$password = "";

$dsn = "$driver:host=$host;dbname=$dbname";

$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

// Users Type
define('ADMINS', 1);
define('STUDENTS', 2);
define('TEACHERS', 3);


// Main Dir Paths

define('DS', DIRECTORY_SEPARATOR);

define('APP_PATH', dirname(__DIR__) . DS);
define('CONIFG_PATH', APP_PATH . "config" . DS);
define('LIBS_PATH', APP_PATH . "libs" . DS);
define('TEMP_PATH', APP_PATH . "templates" . DS);
define('LAYOUTS_PATH', TEMP_PATH . "layout" . DS);


// Admin Dir Paths

define('ADMIN_PATH', APP_PATH ."admin" .  DS);
define('TEMP_ADMIN_PATH', ADMIN_PATH . "templates" . DS);
define('LAYOUTS_ADMIN_PATH', TEMP_ADMIN_PATH . "layout" . DS);



// Main URLs

define('BASE_URL', "HTTP://" . $_SERVER['HTTP_HOST'] . "/");
define('CSS_DIR', BASE_URL . "templates/css" . "/");
define('JS_DIR', BASE_URL . "templates/js" . "/");
define('IMG_DIR', BASE_URL . "templates/images" . "/");



// Admin URLs
define('ADMIN_URL', BASE_URL . "admin" . "/");
define('ADMIN_TEMP_URL', ADMIN_URL . "templates/");
define('CSS_ADMIN_URL', ADMIN_URL . "templates/css" . "/");
define('JS_ADMIN_DIR', ADMIN_URL . "templates/js" . "/");












