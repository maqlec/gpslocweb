var map;
var mark;
var lineCoords = [];
var initialize = function () {
	map = new google.maps.Map(document.getElementById('map-canvas'), {center: {lat: lat, lng: lng}, zoom: 12});
	mark = new google.maps.Marker({position: {lat: lat, lng: lng}, map: map});
	lineCoords.push(new google.maps.LatLng(window.lat, window.lng));
};
window.initialize = initialize;
var redraw = function (payload) {
	lat = payload.latitude;
	lng = payload.longitude;
	map.setCenter({lat: lat, lng: lng, alt: 0});
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
		url: '/getposition.php',
		type: 'GET',
		dataType: 'json'
	}).done(function (data) {
		redraw(data)
	})
};

updatePosition();
setInterval(function () {
	updatePosition();
}, 60000);	