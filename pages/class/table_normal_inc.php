
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
									else {
									    $x->getContent()->generateTagTD();
									}
											
											
?>
                                    </tbody>

