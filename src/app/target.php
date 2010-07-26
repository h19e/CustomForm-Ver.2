<?php

if (file_exists(APP_DIR . '/conf/set_env.php')) {
	require_once APP_DIR . '/conf/set_env.php';
} else {
	echo 'please set up set_env.php';
	exit;
}

function __autoload($className)
{
	$filePath = APP_DIR . '/lib/' . str_replace("_","/",$className) . '.php';
	if (file_exists($filePath)) {
		require_once $filePath;
	}
}




try {
	$controller = Controller::getInstance();
	$controller->forward();
} catch (Exception $e) {
    echo "KK";
	echo $e->getMessage();
}




