<?php
function dbConnect($usertype, $connectionType = 'pdo') {
	$host = 'localhost';
	$db = 'njferrari';
	if ($usertype == 'read') {
		$user = 'nferrari';
		$pwd = 'PRDDaLkrKcuurIcW';
	} elseif ($usertype == 'write') {
		$user = 'nferrari';
		$pwd = 'PRDDaLkrKcuurIcW';
	} else {
		exit('Unrecognized user');
	}
	if ($connectionType == 'mysqli') {
		$conn = @ new mysqli($host, $user, $pwd, $db);
		if ($conn->connect_error) {
			exit($conn->connect_error);
		}
		return $conn;
	} else {
		try {
			return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}