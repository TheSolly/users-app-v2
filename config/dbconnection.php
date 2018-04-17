<?php 



try {
	$dbh = new PDO($dsn, $username, $password, $options);
	
} catch (PDOException $e) {
	$txt = $e->getMessage();
	$myFile = file_put_contents('connection_errors.txt', $txt, PHP_EOL | LOCK_EX);
	// exit(header("Location:" . )) 
}
