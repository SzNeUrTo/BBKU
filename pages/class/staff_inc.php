<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBKU - STAFF</title>
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
    <script src="../js/staffController.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
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
												<a href="#"><i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username']?></a>
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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php $x->getContent()->generatePageHeader(); ?>
                        </h1>
                    </div>
                </div>
                <!-- Edit Here -->
                        <?php 
                            include 'table_staff.php';
                        ?>
                <!-- Edit Here -->
        </div>
    </div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
					<h4 class="modal-title" id="myModalLabel">EditValue</h4>
				</div>
				<div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="/dbtest/postData.php">
<cetner>
	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Ordering : </label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<label for="name" class="control-label" id="ooo">0001</label>
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">BikeID : </label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
		<label for="name" class="control-label" id="bbb">0001</label>
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Cost</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input id="ccc" type="text" class="form-control" id="nickname" name="nickname" placeholder="Cost" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 col-xs-12 control-label">Description</label>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 ">
			<input id="ddd" type="text" class="form-control" id="age" name="age" placeholder="Description" value="">
			<!-- <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"> -->
		</div>
	</div>

</cetner>
</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveInfo()">Save changes</button>
		 			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<script>
  $('#myModal').modal(options)
</script>

</body>

</html>
