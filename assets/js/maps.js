    var map;

	 function initialize() {
           var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(38.873555, -77.295380),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

		var i, l, location, style, , balloon,
		infoWindow = new google.maps.InfoWindow(); 
		var calledPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FFFF00';
		var newPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FFFF00';
		var schPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FFFF00';
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


		function addClickHandler(balloon,location,  position) {
		  google.maps.event.addListener(balloon, 'click', function () {
			infoWindow.close();
			infoWindow.setContent(location.adjuster_name);
			infoWindow.setPosition(position);
			infoWindow.open(map);
		  });
		}

		function addBalloon(location) {

		  var balloon = new google.maps.Marker({
			map: map,
			position: locationPosition(location),
		  });
		  addClickHandler(balloon, location, locationPosition(location));
		}

		function locationPosition(location){
			return new google.maps.LatLng(location.latitude, location.longtitude);
		}
		// loop through the json array
		for (var key in locations) {
         if (locations.hasOwnProperty(key)) {
            addBalloon(locations[key]);
       		}
  		}  
    }

    google.maps.event.addDomListener(window, 'load', initialize)