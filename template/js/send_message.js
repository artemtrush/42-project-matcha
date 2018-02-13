function sendMessage() {
	var msg = document.querySelector('.chat-new-msg').value;
	//clearing the msg textarea field
	document.querySelector('.chat-new-msg').value = "";

	var request = new XMLHttpRequest();
	var params = 'model=Chat&function=saveMessageToBd&whom=' + whom + '&msg=' + msg;

	request.open('POST', '/controllers/RequestController.php');
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(params);
}
