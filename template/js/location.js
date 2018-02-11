function initialize() {
	if (!document.getElementById('map'))
		return;

	var myLatlng = new google.maps.LatLng(53.3333,-3.08333),
	mapOptions = {
		zoom: 11,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}

	var map = new google.maps.Map(document.getElementById('map'), mapOptions),
	contentString = 'Some address here..',
	infowindow = new google.maps.InfoWindow({
		content: contentString,
		maxWidth: 300
	});

	var marker = new google.maps.Marker({
		position: myLatlng,
 		map: map
	});

	google.maps.event.addListener(marker, 'click', function() {
 		infowindow.open(map,marker);
	});

	google.maps.event.addDomListener(window, "resize", function() {
 		var center = map.getCenter();
 		google.maps.event.trigger(map, "resize");
 		map.setCenter(center);
 	});
}

google.maps.event.addDomListener(window, 'load', initialize);