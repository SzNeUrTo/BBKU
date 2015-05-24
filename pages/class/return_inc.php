<center>
<div class="form-group">
<h2>BikeID: 
<?php echo $x->getBikeID();?>
</h2>
</div>
<div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-4 col-sm-offset-2 col-xs-6">
<button value="<?php echo $x->getBikeID();?>" name="RequestReturn" type="submit" class="btn btn-primary btn-lg" onclick="sendReturn(this)">Return</button>
</div>
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
<button value="<?php echo $x->getBikeID();?>" name="RequestLoss" type="submit" class="btn btn-danger btn-lg" onclick="sendReturn(this)">Loss</button>
</div>
</center>
<script>
function sendReturn(e) {
	var postdata = {};
	postdata['operation'] = e.name;
	postdata['bikeid'] = e.value;
	console.log(postdata);
	var posting = $.post('student.php', postdata);
	posting.done(function() {
		window.location.href = './student.php?action=br';
	});
}
</script>