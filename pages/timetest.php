<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;

date_default_timezone_set('Asia/Bangkok');
echo "date_default_timezone_set('Asia/Bangkok');"."<br>";
$time = strtotime("now");
echo "\$time = strtotime('now');"."<br>";
echo "date('Y-m-d', \$time)"."<br>";
echo date("Y-m-d", $time)."<br>";
echo "date('H:i:s', \$time)"."<br>";
echo date("H:i:s", $time)."<br>";

try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
			echo "mySQL"."<br>";
			$sql = "SELECT CURRENT_DATE()";
			$qry = $conn -> query($sql);
			$result = $qry -> fetch()['CURRENT_DATE()'];
			echo $result;
			$sql = "SELECT CURRENT_TIME()";
			$qry = $conn -> query($sql);
			$result = $qry -> fetch()['CURRENT_TIME()'];
			echo "<br>".$result;
	  $conn = null;
} catch (PDOException $error) {
	die("error database $dbname :" . $error>getMessage());
}
?>
