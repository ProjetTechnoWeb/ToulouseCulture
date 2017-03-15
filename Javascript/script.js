function initialisation(){
				var optionsCarte = {
					zoom: 8,
					center: new google.maps.LatLng(47.389982, 0.688877)
				}
				var maCarte = new google.maps.Map(document.getElementById("carte"), optionsCarte);
		}
		//	google.maps.event.addDomListener(window, 'load', initialisation);

