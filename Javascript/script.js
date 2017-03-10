function initialisation(){
				var optionsCarte = {
					zoom: 8,
					center: new google.maps.LatLng(47.389982, 0.688877)
				}
				var maCarte = new google.maps.Map(document.getElementById("carte"), optionsCarte);
		}
		//	google.maps.event.addDomListener(window, 'load', initialisation);

//-----------------  SCRIPT PRINCIPAL -------------------------
/*window.addEventListener("load", init);


function initMap(event) {

    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(actionSiSucces);
    else
        console.log("Votre navigateur ne prend pas en compte la gÃ©olocalisation");




}



// role : ?
// parametres : ?
// retour : ?
function actionSiSucces(position) {

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;



    var latlng = new google.maps.LatLng(latitude, longitude);
    //objet contenant des propriÃ©tÃ©s avec des identificateurs prÃ©dÃ©finis dans Google Maps permettant
    //de dÃ©finir des options d'affichage de notre carte
    var options = {
        center: latlng,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //constructeur de la carte qui prend en paramÃªtre le conteneur HTML
    //dans lequel la carte doit s'afficher et les options
    var carteaccueil = new google.maps.Map(document.getElementById("carteaccueil"), options);

}
*/
/*
map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: -34.397, lng: 150.644},
  zoom: 8
});*
