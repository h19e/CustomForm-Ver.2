<?php

echo "Hello CustomForm alpha";


try {
	$pdo = new PDO("mysql:host=localhost; dbname=sampledb","sample_user","sample_user");

	$stmt = $pdo->query('select * from db_test ');

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		var_dump($row);
	}
} catch (PDOException $e) {
	var_dump($e->getMessage());
}




