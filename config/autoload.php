<?php

foreach ($models as $model) {
	$file = MODELS_PATH . $model . ".class.php";
	if (file_exists($file)) {
		require_once $file;
	}
}

foreach ($libs as $lib) {
	$file = LIBS_PATH . $file . ".lib.php";
	if (file_exists($file)) {
		require_once $file;
	}
}