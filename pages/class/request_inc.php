<center>
<div class="form-group">
<h2>
<?php echo $x->getBikeID(); ?>
</h2>
</div>
<button id="submit" name="submit" type="submit" value="<?php echo $x->getBikeID(); ?>" class="btn btn-lg btn-warning center-block" onclick="cancelRequest(this.value)">Cancel</button>
<script>
function cancelRequest(v) {
	var postdata = {};
	postdata['bikeid'] = v;
	console.log(postdata);
	var posting = $.post('student.php', postdata);
	posting.done(function() {
		window.location.href = './student.php?action=br';
	});
}
</script>
</center>