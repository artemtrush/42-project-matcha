function showMessagesInChat(text, data) {
	var chat = document.querySelector('.chat-window');
	var json = JSON.parse(text);

	for (var i = 0; i < json.length; ++i) {
		var obj = json[i];
		var div = document.createElement('div');
		
		div.textContent = obj.message;
		if (data.user_id == obj.who) {
			div.classList.add("well", "col-md-9");
		} else {
			div.classList.add("well", "col-md-9", "col-md-offset-3");
		}
		chat.appendChild(div);
		chat.scrollTop = chat.scrollHeight;
		data.index = obj.id;
	}
	return data;
}
