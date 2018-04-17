<?php 

// APP Name

define('APP_NAME', 'APP');


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

// Main Dir Paths

define('DS', DIRECTORY_SEPARATOR);

define('APP_PATH', dirname(__DIR__) . DS);
define('CONIFG_PATH', APP_PATH . "config" . DS);
define('LIBS_PATH', APP_PATH . "libs" . DS);
define('TEMP_PATH', APP_PATH . "templates" . DS);
define('LAYOUTS_PATH', TEMP_PATH . "layout" . DS);


// Main URLs

define('BASE_URL', "HTTP://" . $_SERVER['HTTP_HOST'] . "/");
define('CSS_DIR', BASE_URL . "templates/css" . "/");
define('JS_DIR', BASE_URL . "templates/js" . "/");
define('IMG_DIR', BASE_URL . "templates/images" . "/");














 ?>