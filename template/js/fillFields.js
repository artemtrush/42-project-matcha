
function fillFields (input_class)
{
	list = document.querySelectorAll("input." + input_class);
	for (var i = 0; i < list.length; i++)
	{
		if (list[i].value === "")
		{
			alert("Please fill in all required fields.");
			return false;
		}
	}
	return true;;
}