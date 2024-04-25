<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// set_time_limit(30);
// ini_set("memory_limit", "-1");

// https://www.w3schools.com/php/php_mysql_select.asp


$db_host = 'mysql-db'; // MySQL server hostname within the same Docker network
$db_user = 'db_user';
$db_pass = 'password';
$db_name = 'test_database';

try {
	$conn = new PDO("mysql:host=$db_host; dbname=$db_name",
		$db_user,
		$db_pass
	);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// sql to create table
	$sql = "CREATE TABLE MyGuests (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	// $conn->exec($sql);
	
	$data = [
		['John', 'Doe', 'john@example.com'],
		['Mary', 'Moe', 'mary@example.com'],
		['Julie', 'Dooley', 'julie@example.com'],
	];
	/*
	$stmt = $conn->prepare("INSERT INTO `MyGuests` (`firstname`,`lastname`,`email`) VALUES (?,?,?)");
	
	$conn->beginTransaction();
	foreach ($data as $rec) {
		$stmt->execute([$rec[0], $rec[1], $rec[2]]);
	}
	$conn->commit();
	*/
	
	// $stmt = $conn->prepare("TRUNCATE TABLE MyGuests");
	// $stmt->execute();
	
	
	$stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
	$stmt->execute();
	
	// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$rows = $stmt->fetchAll(PDO::FETCH_NUM);
	
	$recs = [];
	foreach ($rows as $row) {
		$recs[] = $row;
	}
	
	echo '<pre style="background:#111; color:#b5ce28; font-size:11px;">'; print_r($recs); echo '</pre>';
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
