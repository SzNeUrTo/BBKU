
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KUBB - Register</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title">Please Sign In</h3> -->
                        <h3 class="panel-title">BBKU Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Student ID" name="studentid" autofocus>
                            </div>

                            <div class="form-group">
                                <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;


try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
	echo '<p>'.$_SERVER['PHP_SELF'].'</p>';
     	//$sql = "INSERT INTO table1 (Fullname, Nickname, Age) VALUES ('eiei', 'eiei', 5)";
		//$qry = $conn -> query($sql);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password']; 
		$studentid= $_POST['studentid']; 
		/*
  	echo '<p>';
			var_dump($_POST);
		echo '</p>';
		 */
     if (empty($username) or empty($password) or empty($studentid)) {
     	echo '<p> **** don\'t null **** </p>';
     }
     else {
				 //$sql = "SELECT StdID FROM Student WHERE StdID = '$studentid'";
				 $sql = "SELECT COUNT(StdID) as c FROM Student WHERE StdID = '$studentid'";
				 //$sql = "IF EXISTS (SELECT StdID FROM Student WHERE StdID = '$student') 
					//	 BEGIN 
					//	 INSERT INTO StdAccount(User, Pass, StdID) VALUES ('$username', '$password', '$studentid') END";
				 $qry = $conn -> query($sql);
				if ($qry -> fetch()['c'] != 0) {
						$sql = "INSERT INTO StdAccount(User, Pass, StdID) VALUES ('$username', '$password', '$studentid')";
						$qry = $conn -> query($sql);
				}
		//$fullname = $nickname = $age = null;
		echo '<p> **** success ****'.$qry.'</p>';
     }
	$conn = null;
	}
} catch (PDOException $error) {
	die("error database $dbname :" . $error>getMessage());
}
?>