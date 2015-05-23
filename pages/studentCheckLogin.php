<?php
session_start();
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
					$sql = "SELECT Status,StdID,COUNT(User) AS c FROM StdAccount WHERE User='$username' AND Pass = '$password'";
					$qry = $conn -> query($sql);
					$result = $qry -> fetch();
					$isCorrect = $result['c'];
					$studentID = $result['StdID'];
					$status = $result['Status'];
					if ($isCorrect != 0) {
						echo "success";
						$_SESSION['username'] = $username;
						$_SESSION['studentID'] = $studentID;
						$_SESSION['status'] = $status;
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
