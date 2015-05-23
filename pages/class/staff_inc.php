<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBKU - STAFF</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
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
                            <a href="#"><i class="fa fa-user fa-fw"></i> b561050xxxx</a>
                        </li>

                        <li>
                            <a href="./staff.php?action=home"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bicycle fa-fw"></i> Bike<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=bike&search=ready"><i class="fa fa-check fa-fw"></i> Ready</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=borrow"><i class="fa fa-share fa-fw"></i> Borrow</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=lost"><i class="fa fa-close fa-fw"></i> Lost</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=repair"><i class="fa fa-wrench fa-fw"></i> Repairing</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=requestborrow"><i class="fa fa-share fa-fw"></i> RequestBorrow</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=requestreturn"><i class="fa fa-reply fa-fw"></i> RequestReturn</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=requestloss"><i class="fa fa-close fa-fw"></i> RequestLoss</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=bike&search=all"><i class="fa fa-database fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                        <li>
                            <a href="#"><i class="fa fa-exchange fa-fw"></i> Request<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=request&search=borrow"><i class="fa fa-share fa-fw"></i> Borrowing</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=request&search=return"><i class="fa fa-reply fa-fw"></i> Returning</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=request&search=loss"><i class="fa fa-close fa-fw"></i> Loss</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=request&search=all"><i class="fa fa-database fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                        <li>
                            <a href="#"><i class="fa fa-history fa-fw"></i> History<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=history&search=borrow"><i class="fa fa-share fa-fw"></i> Borrowing</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=history&search=return"><i class="fa fa-reply fa-fw"></i> Returning</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=history&search=lost"><i class="fa fa-remove fa-fw"></i> Loss</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=history&search=all"><i class="fa fa-database fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li>    

                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Repairing<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=repair&search=repaired"><i class="fa fa-check fa-fw"></i> Repaired</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=repair&search=torepair"><i class="fa fa-close fa-fw"></i> To Repair</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=repair&search=all"><i class="fa fa-database fa-fw"></i> All</a>
                                </li>
                            </ul>
                        </li> 

                        <li>
                            <a href="#"><i class="fa fa-ban fa-fw"></i> BlackList<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=blacklist&search=payed"><i class="fa fa-check fa-fw"></i> Payed</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=blacklist&search=notpayed"><i class="fa fa-close fa-fw"></i> NotPayed</a>
                                </li>
                            </ul>
                        </li>                          

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./staff.php?action=student"><i class="fa fa-user fa-fw"></i> Student</a>
                                </li>
                                <li>
                                    <a href="./staff.php?action=staff"><i class="fa fa-star fa-fw"></i> Staff</a>
                                </li>
                            </ul>
                        </li>                          
                        <li>
                            <a href="./staff.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blank</h1>
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
