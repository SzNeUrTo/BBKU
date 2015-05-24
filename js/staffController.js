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

var order;
var bikeID;
var self = this;
function editInfo(order, bikeID) {
	self.order = order;
	self.bikeID = bikeID;
	var oooLabel = document.getElementById('ooo');
	var bbbLabel = document.getElementById('bbb');
	oooLabel.innerHTML = order;
	bbbLabel.innerHTML = bikeID;
	ccc.value = "";
	ddd.value = "";
}

function saveInfo() {
	console.log('save : ' + ooo);
	console.log('save : ' + bikeID);
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
