<?php
function dbConnect($usertype, $connectionType = 'pdo') {
	$host = 'localhost';
	$db = 'dbnfvzd9e2qf8u';
	if ($usertype == 'read') {
		$user = 'u4pdh8wnk4q3e';
		$pwd = '1Bzi$4fyb5$^';
	} elseif ($usertype == 'write') {
		$user = 'u4pdh8wnk4q3e';
		$pwd = '1Bzi$4fyb5$^';
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