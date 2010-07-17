<?php

if (file_exists(APP_DIR . '/conf/set_env.php')) {
	require_once APP_DIR . '/conf/set_env.php';
} else {
	echo 'please set up set_env.php';
	exit;
}


try {
	$pdo = new PDO("mysql:host=" . DB_HOST ."; dbname=sampledb",DB_USER,DB_PASS);

	$stmt = $pdo->query('select * from db_test ');

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		var_dump($row);
	}
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

