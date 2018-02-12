function initialize() {
	if (!document.getElementById('map'))
		return;
	var myLatlng = new google.maps.LatLng(x_pos, y_pos),
	mapOptions = {
		zoom: 11,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	}

	var map = new google.maps.Map(document.getElementById('map'), mapOptions),
	contentString = uname,
	infowindow = new google.maps.InfoWindow({
		content: contentString,
		maxWidth: 300
	});

	var marker = new google.maps.Marker({
		position: myLatlng,
 		map: map
	});
	if (markable)
	{
		document.getElementById('lat').value = marker.getPosition().lat();
		document.getElementById('lng').value = marker.getPosition().lng();
	}

	google.maps.event.addListener(marker, 'click', function() {
 		infowindow.open(map,marker);
	});

	google.maps.event.addDomListener(window, "resize", function() {
 		var center = map.getCenter();
 		google.maps.event.trigger(map, "resize");
 		map.setCenter(center);
 	});

	if (markable)
	{
		map.addListener('click', function(event) {
			if (marker && marker.setMap)
				marker.setMap(null);
			marker = new google.maps.Marker({
				position: event.latLng,
				map: map
			});
			document.getElementById('lat').value = marker.getPosition().lat();
			document.getElementById('lng').value = marker.getPosition().lng();
	    });
	}
}

google.maps.event.addDomListener(window, 'load', initialize);