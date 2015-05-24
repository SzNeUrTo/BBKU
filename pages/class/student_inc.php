<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBKU - Student</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body> 

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-bicycle fa-lg"></i> Bike Bowrow KU</a>
                
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
												<a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'];?></a>
                        </li>

                        <li>
                            <a href="./student.php?action=home"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a href="./student.php?action=br"><i class="fa fa-shopping-cart fa-fw"></i> Borrowing / Returning</a>
                        </li>

						<li>
                            <a href="#"><i class="fa fa-history fa-fw"></i> History<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="./student.php?action=history&search=borrow"><i class="fa fa-share fa-fw"></i> Borrowing</a>
                                </li>
                                <li>
                                    <a href="./student.php?action=history&search=return"><i class="fa fa-reply fa-fw"></i> Returning</a>
                                </li>
                                <li>
                                    <a href="./student.php?action=history&search=loss"><i class="fa fa-remove fa-fw"></i> Loss</a>
                                </li>
                                <li>
                                    <a href="./student.php?action=history&search=all"><i class="fa fa-exchange fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                        <li>
                            <a href="./student.php?action=alert"><i class="fa fa-bell fa-fw"></i> Alert</a>
                        </li>


                        <li>
                            <a href="./student.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php $x->getContent()->generatePageHeader(); ?>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
				<!-- Edit Here -->
<?php 
$pageAction = $x->getPageAction();
$status = $x->getStatus();
echo $pageAction;
if ($pageAction == 'br') {
	if ($status == "CanReturn" || $status == "RequestBorrow" || $status == "RequestReturn" || $status == "RequestLoss") {
		include 'table_inc.php'; 
	}
	else {
		include 'borrow_inc.php';
	}
}
else {
	$status = "";
	include 'table_inc.php'; 
}
?>
				<!-- Edit Here -->
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

    <!-- DataTables JavaScript -->
	<?php if ($pageAction == 'br') echo "<!--"; ?>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<?php if ($pageAction == 'br') echo "-->"; ?>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	<?php if ($pageAction == 'br') echo "/*"; ?>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	<?php if ($pageAction == 'br') echo "*/"; ?>
//		function sendValue(element) {
//				  alert(element.value);
//					var o = {};
//					var value = element.value;
//					if (value == "Return") {
//						value = "RequestReturn";
//					}
//					else if (value == "Loss") {
//						value = "RequestLoss";
//					}
//					console.log(value);
//					o['operation'] = value;
//					var data = o;
//					console.log(data);
//					var posting = $.post('./student.php?action=br', data);
//					console.log('before post');
//					posting.done(function(data) {
//						console.log(data);
//					});
//				//	console.log('after post');
//					//window.location.href = "./student.php?action=br";
		//}
    </script>

</body>

</html>
