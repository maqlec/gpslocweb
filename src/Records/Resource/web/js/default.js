//var map;
//var mark;
//var lineCoords = [];
//var initialize = function () {
//	map = new google.maps.Map(document.getElementById('map-canvas'), {center: {lat: lat, lng: lng}, zoom: 12});
//	mark = new google.maps.Marker({
//		position: {
//			lat: lat,
//			lng: lng
//		},
//		map: map}
//	);
//	lineCoords.push(new google.maps.LatLng(window.lat, window.lng));
//};
//window.initialize = initialize;
//
//var redraw = function (object) {
//	lat = object.latitude;
//	lng = object.longitude;
//	map.setCenter({
//		lat: lat,
//		lng: lng,
//		alt: 0
//	});
//	mark.setPosition({
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

function initialize() {

	var locations = window.points;

	window.map = new google.maps.Map(document.getElementById('map-canvas'), {
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	});

	var flightPlanCoordinates = [];
	var bounds = new google.maps.LatLngBounds();

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i].point.lat, locations[i].point.lng),
			map: map,
			icon: " "
		});
		flightPlanCoordinates.push(marker.getPosition());
		bounds.extend(marker.position);

	}

	map.fitBounds(bounds);

	var path = new google.maps.Polyline({
		map: map,
		path: flightPlanCoordinates,
		strokeColor: "#FF0000",
		strokeOpacity: 1.0,
		strokeWeight: 2
	});

}
window.initialize = initialize;

//var obj = {
//	latitude: window.lat,
//	longitude: window.lng
//};
//
//redraw(obj);

//var updatePosition = function () {
//	$.ajax({
//		url: '/getposition.php',
//		type: 'GET',
//		dataType: 'json'
//	}).done(function (data) {
//		redraw(window.records[1]);
//		console.log(data);
//	})
//};

//updatePosition();
//setInterval(function () {
//	updatePosition();
//}, 5000);
