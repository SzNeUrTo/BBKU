<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'databaseproject';
$port = 80;


try {
	$conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
	$sql = 'SELECT * FROM table1 ORDER BY ID';
	$qry = $conn -> query($sql);
} catch (PDOException $error) {
	die("Could not connect to the database $dbname :" . $error>getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ShowTableDB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<center><h1>DatabaseProject</h1></center>
			<!--                             -->
			<div class="panel panel-primary">
				<div class="panel-heading">Table1</div>
				<table class="table table-striped" id="dataTables-example">
				<thead>
					<tr>

					<th>ID</th>
					<th>Fullname</th>
					<th>Nickname</th>
					<th>Age</th>

					</tr>
				</thead>
				<tbody>
					<?php while ($row = $qry->fetch()): ?>
						<tr>
							<td><?php echo htmlspecialchars($row['ID'])?></td>
							<td><?php echo htmlspecialchars($row['Fullname']); ?></td>
							<td><?php echo htmlspecialchars($row['Nickname']); ?></td>
							<td><?php echo htmlspecialchars($row['Age']); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			</div>
			<!--                             -->
		</div>
	</div>
</div>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>

<?php 
	// var_dump for see array table
	//$qry = $conn -> query($sql);
	//$table = $qry -> fetchAll();
	//echo count($table) + 1;
	//var_dump($table);
	//echo '<br><br>';
	//var_dump($table[0]);
	//echo '<br>';
?>
