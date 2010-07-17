<?php

require_once APP_DIR . '/conf/dbconf.php';

echo 'target';

try {
	$pdo = new PDO("mysql:host=" . DB_HOST ."; dbname=sampledb",DB_USER,DB_PASS);

	$stmt = $pdo->query('select * from db_test ');

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		var_dump($row);
	}
} catch (PDOException $e) {
	var_dump($e->getMessage());
}

