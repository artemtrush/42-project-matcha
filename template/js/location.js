var map = null;

function addMarker(latLng, info, replacement = true)
{
	if (replacement && addMarker.lastMarker && addMarker.lastMarker.setMap)
	{
		addMarker.lastMarker.setMap(null);
		addMarker.lastInfoWindow.setMap(null);
	}
	var marker = new google.maps.Marker({
		position: latLng,
		map: map
	});

	var infowindow = new google.maps.InfoWindow({
		content: info,
		maxWidth: 300
	});
	google.maps.event.addListener(marker, 'click', function() {
 		infowindow.open(map, marker);
	});

	if (markable)
	{
		document.getElementById('lat').value = marker.getPosition().lat();
		document.getElementById('lng').value = marker.getPosition().lng();
	}
	addMarker.lastMarker = marker;
	addMarker.lastInfoWindow = infowindow;
};
addMarker.lastMarker = null;
addMarker.lastInfoWindow = null;

function initialize() {
	if (!document.getElementById('map'))
		return;

	/* map creation */
	var center = new google.maps.LatLng(0, 0);
	var mapOptions = {
			zoom: 2,
			center: center,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
	}
	map = new google.maps.Map(document.getElementById('map'), mapOptions);

	/* set default marker */
	if (typeof x_pos !== 'undefined' &&
		typeof y_pos !== 'undefined' &&
		typeof uname !== 'undefined')
	{
		var defaultLatlng = new google.maps.LatLng(x_pos, y_pos);
		map.setCenter(defaultLatlng);
		map.setZoom(9);
		addMarker(defaultLatlng, uname);
	}

	/* add resize event */
	google.maps.event.addDomListener(window, "resize", function() {
 		var center = map.getCenter();
 		google.maps.event.trigger(map, "resize");
 		map.setCenter(center);
 	});

	/* custom markers */
	if (markable)
	{
		map.addListener('click', function(event) {
			addMarker(event.latLng, uname);
	    });
	}
}

google.maps.event.addDomListener(window, 'load', initialize);