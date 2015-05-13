<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;


try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
		//echo '<p>'.$_SERVER['PHP_SELF'].'</p>';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_POST['username'];
				$password = $_POST['password']; 
				if (empty($username) or empty($password)) {
					echo 'do not NULL';
     			}
				else {
					$sql = "SELECT COUNT(User) AS c FROM StdAccount WHERE User='$username' AND Pass = '$password'";
					$qry = $conn -> query($sql);
					if ($qry -> fetch()['c'] != 0) {
						//$limitTime = time()+60*60;
						echo "success";
						//setcookie("username", $username, $limitTime);
						//setcookie("password", $username, $limitTime);
						$_SESSION['username'] = $username;
						//var_dump($_SESSION['username']);
						//$_SESSION['password'] = $password;
					}
					else {
						echo 'error';
					}
				//echo '<p> **** success ****'.$qry.'</p>';
			}
			$conn = null;
	}
} catch (PDOException $error) {
	die("error database $dbname :" . $error>getMessage());
}
?>
