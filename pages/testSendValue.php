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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>file:///Users/SugarSeeker/Downloads/SA_ADMIN/pages/blank.html#
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
		
		function getValue(element) {
				//alert(element.value);
					var data = element.value;
					console.log(data);
					var posting = $.post('getValue.php', data);
					console.log('before post');
/*
					posting.done(function(data) {
						console.log('=========');
						console.log(data);
						console.log('=========');
						if (data == 'success') {
							console.log('success post');
							window.location.href = './studentHome.php';
						}
						else {
							console.log('fail post');
							$("#wronguserpwd").text("wrong");
							$("#wronguserpwd").css({"color": "red"});
*/
		}
    </script>

</head>

<body>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		echo "Please Log In .....................";
		//echo "<meta http-equiv='refresh' content='0;url=login.html'>";
		header("refresh: 1; url=login.html");
}
else {
		$username = $_SESSION['username'];
?>
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
                <a class="navbar-brand" href="home.html"><i class="fa fa-bicycle fa-lg"></i> Bike Bowrow KU</a>
                
            </div>
            <!-- /.navbar-header บนขวาเผื่อใช้ -->

<!--             <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul> -->

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <!-- start search -->

 <!--                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li> -->

                        <!-- end search -->

                        <li>
                            <!--<a href="profile.html"><i class="fa fa-user fa-fw"></i> b561050xxxx</a>-->
														<a href="profile.html"><i class="fa fa-user fa-fw"></i><?php echo $username; ?></a>
                        </li>

                        <li>
                            <a class="active" href="studentHome.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a href="studentBorrowReturn.php"><i class="fa fa-shopping-cart fa-fw"></i> Borrowing / Returning</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-history fa-fw"></i> History<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="./studentHistory.php?search=borrow"><i class="fa fa-share fa-fw"></i> Borrowing</a>
                                </li>
                                <li>
                                    <a href="./studentHistory.php?search=return"><i class="fa fa-reply fa-fw"></i> Returning</a>
                                </li>
                                <li>
                                    <a href="./studentHistory.php?search=lost"><i class="fa fa-remove fa-fw"></i> Loss</a>
                                </li>
                                <li>
                                    <a href="./studentHistory.php?search=all"><i class="fa fa-exchange fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                            <li>
                                <a href="studentAlert.php"><i class="fa fa-bell fa-fw"></i> Alert</a>
                            </li>


                            <li>
                                <a href="studentLogout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                     <!--    </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">History Borrowing</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Borrowing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>BikeID</th>
                                            <th>Browser</th>
                                            <th>RequestReturn</th>
                                            <th>RequestBorrow</th>
                                            <th>Return</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- Looping -->
                                        <tr class="odd gradeX">
                                            <td>0001</td>
                                            <td>Internet Explorer 4.0</td>
											<td class="text-center">
												<input id="submit" name="submit" value="Cancel" class="btn btn-danger" type="submit">

												</td>
											<td class="text-center">
												<input id="submit" name="submit" value="Cancel" class="btn btn-danger" type="submit">
											</td>

											<td class="text-center">
												<!--<input id="submit" name="submit" value="Return" class="btn btn-primary" type="submit">
												<input id="submit" name="submit" value="Loss" class="btn btn-danger" type="submit">-->
												<input id="return" name="submit" value="Return" class="btn btn-primary" type="submit" onclick="getValue(this)">
												<input id="loss" name="submit" value="Loss" class="btn btn-danger" type="submit" onclick="getValue(this)">
</td>
                                        </tr>
                                        <!-- Looping -->
                            
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
						<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Borrowing</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
												<h4>You must return the bike by click return.
										        But if the bike is losing, you should click loss.</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        </tr>
                                    </thead>

                                    <tbody>
												<center>
												<div class="form-group">
														<h2>BikeID: 0001</h2>
												</div>
												<div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-5 col-xs-offset-1">
												<input id="return" name="submit" value="Return" class="btn btn-primary btn-lg" type="submit" onclick="getValue(this)">
												</div>
												<div class="col-lg-2 col-md-2 col-xs-5">
												<input id="loss" name="submit" value="Loss" class="btn btn-danger btn-lg" type="submit" onclick="getValue(this)">
												</div>
												</center>
                                        <!-- Looping -->
                            
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
						<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Request Borrow</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
												<h4>You must return the bike by click return.
										        But if the bike is losing, you should click loss.</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">

                                    <tbody>
												<center>
												<div class="form-group">
														<h2>BikeID: 0001</h2>
												</div>
												<input id="loss" name="submit" value="Cancel" class="btn btn-warning" type="submit" onclick="getValue(this)">
												</center>
                                        <!-- Looping -->
                            
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
						<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
				</div>
		</div>
    <!-- /#wrapper -->

<?php
}
?>

</body>

</html>
