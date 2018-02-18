var notify = function(msg)
{
	var text = document.createElement('div');
	var block = document.createElement('div');
	block.className = 'col-sm-3 col-md-2 panel panel-info notification';
	block.style.top = notify.top + 'px';
	text.className = 'panel-heading';
	text.innerText = msg.substr(0, msg.length - 16);
	block.appendChild(text);
	document.body.appendChild(block);
	var offset = block.clientHeight + 5;
	notify.top += offset;
	setTimeout(function()
	{
		block.style.opacity = 0;
		var list = document.getElementsByClassName('notification');
			for (var i = 0; i < list.length; i++)
				list[i].style.top = parseInt(list[i].style.top) - offset + 'px';
		notify.top -= offset;
		setTimeout(function()
		{
			block.remove();
			notify.number--;
		}, 1000);
	}, (3 + notify.number) * 1000);
	notify.number++;
}
notify.top = 100;
notify.number = 0;

function getNotifications(text, data)
{
	if (text === 'guest')
		return;
	var array = JSON.parse(text);
	var number = notify.number;
	for (var i = 0; i < array.length && i < (10 - number); i++)
	{
		notify(array[i]['message']);
	}
	if (i > 0)
		data.id = array[i - 1]['id'];
	return data;
}

document.addEventListener("DOMContentLoaded", function () {
	var data = {id: 0};
	ajax_loop('History', 'getNotifications', data, getNotifications, 3);
});
