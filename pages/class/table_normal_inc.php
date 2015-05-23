
                                    <thead>
                                        <tr>
                                            <?php $x->getContent()->generateTagTH(); ?>
                                        </tr>
                                    </thead>

                                    <tbody>
									<?php 
									if ($status == "CanReturn") {
										include 'return_inc.php';
									}
									else if ($status == "RequestBorrow" || $status == "RequestReturn" || $status == "RequestLoss") {
										include 'request_inc.php';
									}
									else {
									    $x->getContent()->generateTagTD();
									}
											
											
?>
                                    </tbody>

