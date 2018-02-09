/*
**model / func - модель/функция что принимают
**data - ассоц массив с данными которые в POST пойдут
**handler - функция/обработчик результата запроса
**delay - частота опроса
*/

function ajax_loop(model, func, data, handler, delay)
{
	var request = new XMLHttpRequest();
	var params = 'model=' + model + '&function=' + func;
	for (var key in data)
	{
		params = params + '&' + key + '=' + data[key];
	}
	request.open('POST', '/controllers/RequestController.php');
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(params);

	request.onload = function()
	{
		if (request.responseText !== 'false')
		{
			data = handler(request.responseText, data);
		}
		setTimeout(function() {    
			ajax_loop(model, func, data, handler, delay);
		}, delay * 1000);
	};
}
