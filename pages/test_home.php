<?php
session_start();
if(!isset($_SESSION['username'])) {
		echo "nooooo";
		//echo "<meta http-equiv='refresh' content='0;url=test_login.html'>";		
}
else {
		//echo $_SESSION['username'];
		echo "session";
}
?>
