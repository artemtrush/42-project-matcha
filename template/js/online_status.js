function online_status(text, data)
{
	document.getElementById('online-span').innerText = text;
	return data;
}

document.addEventListener("DOMContentLoaded", function () {
	var data = {};
	ajax_loop('Profile', 'updateOnlineDate', data, null, 10);
});
