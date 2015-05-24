<center>
<div class="form-group">
<h2><?php echo $x->getBikeID(); ?></h2>
</div>
<button id="submit" name="submit" type="submit" value="accept" class="btn btn-lg btn-warning center-block" onclick="accept(this.value)">Cancel</button>
<button id="submit" name="submit" type="submit" value="accept" class="btn btn-lg btn-warning center-block" onclick="cancelRequest(this.value)">Cancel</button>
<button id="submit" name="submit" type="submit" value="accept" class="btn btn-lg btn-warning center-block" onclick="cancelRequest(this.value)">Cancel</button>
<script>
function sendAccept(element) {
	var postdata = {};
	postdata['submit'] = element.value;
	console.log(postdata);
	var posting = $.post('staff.php', postdata);
	posting.done(function() {
		window.location.href = './staff.php';
	});
}
function sendReject(element) {
	var postdata = {};
	postdata['submit'] = element.value;
	console.log(postdata);
	var posting = $.post('staff.php', postdata);
	posting.done(function() {
		window.location.href = './staff.php';
	});
}
function sendRuined(element) {
	var postdata = {};
	postdata['submit'] = element.value;
	console.log(postdata);
	var posting = $.post('staff.php', postdata);
	posting.done(function() {
		window.location.href = './staff.php';
	});
}
function sendToRepair(element) {
	var postdata = {};
	postdata['submit'] = element.value;
	console.log(postdata);
	var posting = $.post('staff.php', postdata);
	posting.done(function() {
		window.location.href = './staff.php';
	});
}
function sendPaid(element) {
	var postdata = {};
	postdata['submit'] = element.value;
	console.log(postdata);
	var posting = $.post('staff.php', postdata);
	posting.done(function() {
		window.location.href = './staff.php';
	});
}
</script>
</center>
