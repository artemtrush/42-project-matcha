function error_message(message, delay = 5)
{
    var text = document.createElement('div');
    var block = document.createElement('div');
    block.className = 'col-sm-4 col-md-3 panel panel-danger error_message';
    text.className = 'panel-heading';
    text.innerText = message;
    block.appendChild(text);
    document.body.appendChild(block);

    setTimeout(function() {
    	block.style.opacity = 0;
    	setTimeout(function() {
    		block.remove();
    	}, 3000);
    }, delay * 1000);
}
