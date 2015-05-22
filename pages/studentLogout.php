<?php
session_start();
session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$action = $_GET["action"];
		if ($action == "logout") {
				$action = "Loging out";
		} else {
				$action = "Please Log In";
		}
}
header("refresh: 2; url=login.html");
?>

<!doctype html>
<html>
<head>
</head>
<body>
<center><h3> 
<?php echo $action?>
.....
</h3></center> 
</body>
</html>
