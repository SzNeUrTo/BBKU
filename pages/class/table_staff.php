<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php $x->getContent()->generatePanelName();?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead>
                            <tr>
                                <?php $x->getContent()->generateTagTH();?>
                                <?php // <th>Btn</th> ?>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- Looping -->
                                <?php $x->getContent()->generateTagTD();?>
	<?php /*

    							<td class="text-center">
    								<input id="return" name="submit" value="Accept" class="btn btn-success" type="submit" onclick="getValue(this)">
    								<input id="loss" name="submit" value="Reject" class="btn btn-danger" type="submit" onclick="getValue(this)">
    								<input id="loss" name="submit" value="Ruined" class="btn btn-warning" type="submit" onclick="getValue(this)">
    							</td>
	 */ ?>
                            <!-- Looping -->
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>