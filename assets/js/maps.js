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

	var locations2 = [ 
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
		  var tmp = locationPosition(location);
		  console.log(tmp);
		  console.log(locations2[1].position);
		  var balloon = new google.maps.Marker({
			map: map,
			position: tmp,
		  });
		 // addClickHandler(balloon, location.balloon.txt, location.position);
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