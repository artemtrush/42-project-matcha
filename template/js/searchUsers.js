function manualUserSearch() {
	var request = new XMLHttpRequest();

	var age = document.querySelector('#age').value;
	var rate = document.querySelector('#rate').value;
	var params = 'model=Search&function=manualUserSearch&xPos=' + x_pos + '&yPos=' + y_pos + '&age=' + age + '&rate=' + rate;
	var tags = document.getElementsByClassName('searchTags');
	for (var i = 0; i < tags.length; ++i) {
		params += '&' + tags[i].name + "=" + tags[i].checked;
	}
	request.open('POST', '/controllers/RequestController.php');
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(params);

	request.onload = function()
	{
		if (request.responseText !== 'false')
		{
			//var json = JSON.parse(request.responseText);
			// console.log(json);
			console.log(request.responseText);
		}
	};
}
