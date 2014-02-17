
		var map;

	 function initialize() {
           var mapOptions = {
              zoom: 8,
            center: new google.maps.LatLng(38.873555, -77.295380),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

		var i, l, location, style, label, circle, balloon,
		infoWindow = new google.maps.InfoWindow(); // you only need 1 window!
		var lowPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FFFF00';
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


		function addClickHandler(item, content, position) {
		  google.maps.event.addListener(item, 'click', function () {
			infoWindow.close();
			infoWindow.setContent(content);
			infoWindow.setPosition(position);
			infoWindow.open(map);
		  });
		}

		function addBalloon(location) {
			var tmp = locationPosition(location);
			console.log(tmp);
		  var balloon = new google.maps.Marker({
			map: map,
			position: tmp,
		  });
		  addClickHandler(balloon, location.balloon.txt, location.position);
		}

		function locationPosition(location){
			return 'new google.maps.LatLng('+location.latitude+', '+location.longtitude+')'
		}
		// loop through the json array
		for (var key in locations) {
         if (locations.hasOwnProperty(key)) {
            addBalloon(locations[key]);
       		}
  		}  
    }

    google.maps.event.addDomListener(window, 'load', initialize)