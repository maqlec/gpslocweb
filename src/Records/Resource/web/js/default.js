var locations = window.points;

var map;
var mark;
var lineCoords = [];

var initialize = function () {

	map = new google.maps.Map(document.getElementById('map-canvas'), {
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 12,
		scrollwheel: false
	});

	var bounds = new google.maps.LatLngBounds();

	for (i = 0; i < locations.length; i++) {
		mark = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i].point.lat, locations[i].point.lng),
			map: map,
			icon: " "
		});
		lineCoords.push(mark.getPosition());
		bounds.extend(mark.position);
	}

	map.fitBounds(bounds);

	var path = new google.maps.Polyline({
		map: map,
		path: lineCoords,
		geodesic: true,
		strokeColor: "#FF0000",
		strokeOpacity: 1.0,
		strokeWeight: 2
	});
};

window.initialize = initialize;

var redraw = function (payload) {
	lat = payload.latitude;
	lng = payload.longitude;
	map.setCenter({lat: lat, lng: lng, alt: 0});
	if (typeof mark == 'undefined') {
		mark = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng),
			map: map,
			icon: {
				path: google.maps.SymbolPath.CIRCLE,
				scale: 3.5,
				fillColor: "#F00",
				fillOpacity: 0.4,
				strokeWeight: 0.4
			}
		});
	}
	mark.setPosition({lat: lat, lng: lng, alt: 0});
	lineCoords.push(new google.maps.LatLng(lat, lng));
	var lineCoordinatesPath = new google.maps.Polyline({
		path: lineCoords,
		geodesic: true,
		strokeColor: '#2E10FF'
	});

	lineCoordinatesPath.setMap(map);
};

var updatePosition = function () {
	$.ajax({
		url: request.baseUrl + '/position',
		type: 'GET',
		dataType: 'json'
	}).done(function (data) {
		redraw(data)
	})
};

$(document).ready(function () {
	if (window.live) {
		updatePosition();
		setInterval(function () {
			updatePosition();
		}, 10000);
	}
});
