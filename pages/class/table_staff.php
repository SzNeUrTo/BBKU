<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php $x->getContent()->generatePanelName();?>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead>
                            <tr>
                                <?php $x->getContent()->generateTagTH();?>
                            </tr>
                        </thead>

                        <tbody>
				<?php $x->getContent()->generateTagTD();?>
                        </tbody>
		</table>
                </div>
            </div>
        </div>
    </div>
</div>
