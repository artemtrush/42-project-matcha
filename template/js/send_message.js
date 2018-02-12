function sendMessage() {
	var request = new XMLHttpRequest();
	var params = 'model=Chat&function=saveMessageToBd&whom=' + whom + '&msg=testHuyLolKek';

	document.querySelector('.chat-new-msg').value = "";
	request.open('POST', '/controllers/RequestController.php');
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(params);

	request.onload = function()
	{
		console.log(request.responseText);
	};
}
