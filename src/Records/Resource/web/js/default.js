var locations = window.points;

var map;
var marker;
var lineCoords = [];

var initialize = function () {

	map = new google.maps.Map(document.getElementById('map-canvas'), {
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	});

	var planCoordinates = [];
	var bounds = new google.maps.LatLngBounds();

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i].point.lat, locations[i].point.lng),
			map: map,
			icon: " "
		});
		planCoordinates.push(marker.getPosition());
		bounds.extend(marker.position);

	}

	map.fitBounds(bounds);

	var path = new google.maps.Polyline({
		map: map,
		path: planCoordinates,
		geodesic: true,
		strokeColor: "#FF0000",
		strokeOpacity: 1.0,
		strokeWeight: 2
	});

}
window.initialize = initialize;

//var redraw = function (map, object) {
//	lat = object.latitude;
//	lng = object.longitude;
//	map.setCenter({
//		lat: lat,
//		lng: lng,
//		alt: 0
//	});
//	marker.setPosition({
//		lat: lat,
//		lng: lng,
//		alt: 0
//	});
//	lineCoords.push(new google.maps.LatLng(lat, lng));
//	var lineCoordinatesPath = new google.maps.Polyline({
//		path: lineCoords,
//		geodesic: true,
//		strokeColor: '#2E10FF'
//	});
//
//	lineCoordinatesPath.setMap(map);
//};
//
//var updatePosition = function () {
//	$.ajax({
//		url: '/getposition.php',
//		type: 'GET',
//		dataType: 'json'
//	}).done(function (data) {
//		redraw(map, data);
//	})
//};
//
//updatePosition();
//setInterval(function () {
//	updatePosition();
//}, 5000);
