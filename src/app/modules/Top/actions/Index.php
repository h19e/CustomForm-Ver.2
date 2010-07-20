<?php

class Action_Index
{
	public function execute()
	{

		try {
			$pdo = new PDO("mysql:host=" . DB_HOST ."; dbname=sampledb",DB_USER,DB_PASS);

			$stmt = $pdo->query('select * from db_test ');
			
			$count = 0;
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$count++;
			}
		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}

		$parameter = Parameter::getInstance();
		$parameter->set('count',$count);


	}
}
