											<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
														<div class="form-group">

														<select class="col-lg-6 col-sm-8 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-xs-8 col-xs-offset-2" id="sel1">
															<?php var_dump($x->getQueryResult());?>
															<option value="" disabled selected style="display: none;">-----  Select BikeID   -----</option>
															<?php while ($row = $x->getQueryResult()->fetch()): ?>
														    <?php echo "<option value=\"". htmlspecialchars($row['BikeID']). "\">" ?>
															<?php echo htmlspecialchars($row['BikeID']).'</option>' ?>
															<?php endwhile; ?>
														</select>
														<br><br><input id="submit" name="submit" type="submit" value="Borrow" class="btn btn-primary center-block">
											    </div>
											</form>