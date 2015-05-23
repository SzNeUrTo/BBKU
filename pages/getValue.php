<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;


try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_POST['submit'];
				echo $username;
			}
			$conn = null;
	}
} catch (PDOException $error) {
	die("error database $dbname :" . $error>getMessage());
}
?>
