    var map;

	 function initialize() {
           var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(38.873555, -77.295380),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

		var i, l, style, balloon,
		infoWindow = new google.maps.InfoWindow(); 
		var calledPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FF8C00';
		var newPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f2c779';
		var schPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|a6ca8a';
		var alrtPin = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f5aca6 ';
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
  			document.getElementById('legend'));

        var icons = {
         called: {
            name: 'Called PH',
            icon: calledPin
          },
          newP: {
            name: 'New',
            icon: newPin
          },
          sch: {
            name: 'Scheduled',
            icon: schPin
          },
          alrt: {
            name: 'Alert',
            icon: alrtPin
          }
        };


   
        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }
	
        function nonNull(a){
        	if (a==null){
        		return '';
        	}else {
        		return a;
        	}
        }
		function getInfoContent(loc){
			var _result= "<div class='googft-info-window'>"+
				"<div id='infoHeader'>"+
				"<strong>"+loc.inspector_name+"</strong>"+
				"</div>"+
				"<div>"+
				"<strong>Inspection ID: </strong>"+loc.id+"<br>"+
				"<strong>Address: </strong>"+nonNull(loc.street_address)+ ', '+nonNull(loc.city)+' ' + nonNull(loc.state)+' '+ nonNull(loc.zip)+"<br>"+
				"<strong>Date: </strong>"+nonNull(loc.date_of_inspection)+"<br>"+
				"<strong>Time: </strong>"+nonNull(loc.time_of_inspection)+"<br>"+
				"<strong>Adjuster Name: </strong>"+nonNull(loc.adjuster_name)+"<br>"+
				"<strong>Policy Holder Name: </strong>"+nonNull(loc.first_name)+" "+ nonNull(loc.last_name)+"<br>"+
				"<strong>Phone Number: </strong>"+loc.phone+''+"<br>"+
				"</div>"+
				"</div>";
			return _result;
		}

		function addClickHandler(balloon, loc,  position) {
		 	google.maps.event.addListener(balloon, 'click', function () {
			infoWindow.close();
			infoWindow.setContent(getInfoContent(loc));
			infoWindow.setPosition(position);
			infoWindow.open(map);
		  }); 
		}
		
		function locationPosition(loc){
			return new google.maps.LatLng(loc.latitude, loc.longtitude);
		}
		function getPin(loc){

			if(loc.status==1){
				return newPin;
			}
			if(loc.status==2){
				return calledPin;
			} 
			if(loc.status==3){
				return alrtPin;	
			} if(loc.status==4) {
				return schPin;
			}
		}
		function addBalloon(loc) {

		  var balloon = new google.maps.Marker({
			map: map,
			position: locationPosition(loc),
			icon: getPin(loc),	
		  });
		  addClickHandler(balloon, loc, locationPosition(loc));
		}

		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 

		today = mm+'/'+dd+'/'+yyyy;
		
		// loop through the json array
		for (var key in locations) {
		
         //if (locations.hasOwnProperty(key)) {
         	
         	if((locations[key].inspection_status=='Complete')==false && (locations[key].date_of_inspection<today)){
         	
            addBalloon(locations[key]);
            	
        		}
       	//	}
  		}  
   
	
   }


    google.maps.event.addDomListener(window, 'load', initialize)