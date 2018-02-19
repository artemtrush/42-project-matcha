function createTableRow(tbody, rowInfo) {
	var tr = document.createElement('tr');
	tr.role = "row";

	//append username to tr
	var td = document.createElement('td');
	td.classList.add("sorting_1");
	var text = document.createTextNode(rowInfo['username']);
	td.appendChild(text);
	tr.appendChild(td);
	//td.classList.add('sorting_1');

	//append age to tr
	var td = document.createElement('td');
	var text = document.createTextNode(rowInfo['age']);
	td.appendChild(text);
	tr.appendChild(td);
	//append rate to tr
	var td = document.createElement('td');
	var text = document.createTextNode(rowInfo['rate']);
	td.appendChild(text);
	tr.appendChild(td);
	//append gender to tr
	if (rowInfo['gender'] == 1) {
		rowInfo['gender'] = "female";
	} else {
		rowInfo['gender'] = "male";
	}
	var td = document.createElement('td');
	var text = document.createTextNode(rowInfo['gender']);
	td.appendChild(text);
	tr.appendChild(td);
	//append sex_pref to tr
	if (rowInfo['sex_pref'] == 0) {
		rowInfo['sex_pref'] = "bisexual";
	} else if (rowInfo['sex_pref'] == 1) {
		rowInfo['sex_pref'] = "heterosexual";
	} else {
		rowInfo['sex_pref'] = "homosexual";
	}
	var td = document.createElement('td');
	var text = document.createTextNode(rowInfo['sex_pref']);
	td.appendChild(text);
	tr.appendChild(td);

	tbody.appendChild(tr);
}

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
		var table = document.querySelector('#resultsTable');
		//I am deleting lastElementChild from table, which is tbody
		table.removeChild(table.lastElementChild);
		var tbody = document.createElement('tbody');
		// var f2 = document.getElementsByTagName('tr')[2];
		// var f3 = document.getElementsByTagName('tr')[3];
		// return;
		if (request.responseText !== 'false')
		{
			var json = JSON.parse(request.responseText);
			for (var i = 0; i < json.length; ++i) {
				createTableRow(tbody, json[i]);
			}
			console.log(json);
			// console.log(request.responseText);
			table.appendChild(tbody);
			return;
		}
		table.appendChild(tbody);
	};
}
