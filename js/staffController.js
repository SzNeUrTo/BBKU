function requestAction(action, studentID, typeRequest, bikeID) {
	var postData = {};
	postData['action'] = action;
	postData['studentID'] = studentID;
	postData['typeRequest'] = typeRequest;
	postData['bikeID'] = bikeID;
	console.log(postData);
	var posting = $.post('staff.php', postData);
	var url = window.location.href;
	posting.done(function(d) {
		window.location.href = url;
	});
}

function editInfo(order, bikeID) {
	console.log("order : " + order);
}

function complete(order, bikeID) {
	var postData = {};
	postData['action'] = "Complete";
	postData['order'] = order;
	postData['bikeID'] = bikeID;
	console.log(postData);
	var posting = $.post('staff.php', postData);
	var url = window.location.href;
	posting.done(function(d) {
		window.location.href = url;
	});
}

function paidMoney(order) {
	var postData = {};
	postData['action'] = "Paid";
	postData['order'] = order;
	console.log(postData);
	var posting = $.post('staff.php', postData);
	var url = window.location.href;
	posting.done(function(d) {
		window.location.href = url;
	});

}
