
					<?php if ($_SERVER['QUERY_STRING'] == "action=home") echo "<!--"; ?>
							

                    <div id='tableplace' class="panel panel-primary">
                        <div class="panel-heading">
                            <?php $x->getContent()->generatePanelName(); ?>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
<?php 
if ($pageAction == 'br') {
	//echo "brrrr";
	//include 'borrow_inc.php';
}
else {
	include 'table_normal_inc.php'; 
}


?>
                                </table>
                            </div>
                        </div>
                    </div>
					<?php if ($_SERVER['QUERY_STRING'] == "action=home") echo "-->"; ?>
