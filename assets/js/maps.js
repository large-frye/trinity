
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

		var locations = [ 
			  {
				id: 0,
				position: new google.maps.LatLng(38.873555, -77.295380),
				balloon: {
				  pin: lowPin,
				  addr: '00601',
				  txt: '00601: Claims With Part And Labor:139'
				}
			  },{
				id: 1,
				position: new google.maps.LatLng(36.873555, -77.295380),
				balloon: {
				  pin: lowPin,
				  addr: '00601',
				  txt: '00601: Claims With Part And Labor:139'
				}
			  },{
				id: 2,
				position: new google.maps.LatLng(35.873555, -77.295380),
				balloon: {
				  pin: lowPin,
				  addr: '00601',
				  txt: '00601: Claims With Part And Labor:139'
				}
			  },

			];

		function addClickHandler(item, content, position) {
		  google.maps.event.addListener(item, 'click', function () {
			infoWindow.close();
			infoWindow.setContent(content);
			infoWindow.setPosition(position);
			infoWindow.open(map);
		  });
		}

		function addBalloon(location) {
		  var balloon = new google.maps.Marker({
			map: map,
			position: location.position,
		  });
		  addClickHandler(balloon, location.balloon.txt, location.position);
		}

		// loop through the array
		for( i = 0, l = locations.length ; i < l ; i++ ) {
		  location = locations[i];
		  console.log(location);
		 // addBalloon(location);
		}
    }

    google.maps.event.addDomListener(window, 'load', initialize)