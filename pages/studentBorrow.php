<?php
$host = 'localhost';
$username = 'root';
$password = 'toor';
$dbname = 'Borrow_Return_Bike';
$port = 80;


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $username, $password);
    $sql = "SELECT BikeID
            FROM Bike
            WHERE Status = 'Ready'";
    $qry = $conn -> query($sql);
} catch (PDOException $error) {
    die("Could not connect to the database $dbname :" . $error>getMessage());
}
?>

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
                            <a href="profile.html"><i class="fa fa-user fa-fw"></i> b561050xxxx</a>
                        </li>

                        <li>
                            <a href="index.html"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a class="active" href="tables.html"><i class="fa fa-shopping-cart fa-fw"></i> Borrowing / Returning</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-history fa-fw"></i> History<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html"><i class="fa fa-share fa-fw"></i> Borrowing</a>
                                </li>
                                <li>
                                    <a href="login.html"><i class="fa fa-reply fa-fw"></i> Returning</a>
                                </li>
                                <li>
                                    <a href="login.html"><i class="fa fa-exchange fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                            <li>
                                <a href="tables.html"><i class="fa fa-bell fa-fw"></i> Alert</a>
                            </li>


                            <li>
                                <a href="tables.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h2 class="page-header">Borrowing</h2>
                </div>
            </div>

            <div class="row">
            <!-- EditHere -->
                <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">

                        <select class="col-lg-6 col-sm-8 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-xs-8 col-xs-offset-2" id="sel1">
                                        <option value="" disabled selected style="display: none;">-----  Select BikeID   -----</option>
                                        <?php while ($row = $qry->fetch()): ?>
				                        <?php echo "<option value=\"". htmlspecialchars($row['BikeID']). "\">" ?>
                                        <?php echo htmlspecialchars($row['BikeID']).'</option>' ?>
                                        <?php endwhile; ?>
                        </select>
                            <br><br><input id="submit" name="submit" type="submit" value="Borrow" class="btn btn-primary center-block">
                    </div>
                </form>
                <!-- EditHere -->
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

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
    </script>


</body>

</html>
