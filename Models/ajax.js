var url = "http://vsp149406.nfrance.com/~pecatte/ServeurRESTCovoiturage/itineraires";
var idIti;


$(document).ready(function(){
	$("#listeDispo").click(listeItinerairesDispo);
	$("#ajoutPage").click(ajouterItineraire);
	$("#mesItineraires").click(mesItineraires);
	$("#mesReservations").click(mesReservations);
	});
	
var membreConnecte = 11;	 // définit le membre connecté

function listeItinerairesDispo() {
	$.get(url+'/dispo', null, afficherItinerairesDispo, "json");
	}

function afficherItinerairesDispo(data) { // affiche les itinéraires disponibles dans un tableau HTML
	$("#message").html("");
	var res = '<table class="table table-bordered table-striped table-responsive">';
	res = res + '<tr><th>' + "Lieu de départ" + "</th><th>" + "Lieu d'arrivée" + '</th><th>' + 'Horaire de départ' + '</th><th>' + '<i class="glyphicon glyphicon-user">' + '</th><th>' + '<i class="glyphicon glyphicon-euro">' + '</th><th>' + '<i class="glyphicon glyphicon-briefcase">' + '</th><th>' + 'Détails' + '</th><th>Autres</th></tr>';
	$.each(data, function(index, val) {
		res = res + '<tr><td>' + val.lieudepart + '</td><td>' + val.lieuarrivee + '</td><td>' + val.datedepart + '-' + val.heuredepart + '</td><td>' +val.nbplacesdispo + "/" + val.nbplaces +'</td><td>' + val.tarif +'</td><td>';
		if (val.bagagesautorises==1) res = res+ "oui"; else res = res + "non";
		res = res + '</td><td>' + val.details + '</td><td><a href="#" name="'+val.iditi+'" id="reserver" class="btn btn-primary">Réserver</a></td></tr>';
	});
		res = res + '</table>';
		$("#contenu").html(res);
		$(".btn-primary").click(reserver);		

}

function ajouterItineraire(e) { // affiche le fichier ajout.html
	e.preventDefault();
	$("#message").html("");
	$("#contenu").load("ajout.html", null, function() {
		$("#annuler").click(annuler);
		$("#ajouter").click(ajouter);
	});
}

function annuler() { // annule l'ajout d'un itinéraire
	$("contenu").html("");
}

function ajouter(e) { // ajoute l'itineraire en récuperant les valeurs ci-dessous
	e.preventDefault();
	var itineraire = {
		idmembre : membreConnecte,
		lieudepart : $("#lieudepart").val(),
		lieuarrivee : $("#lieuarrivee").val(),
		datedepart : $("#datedepart").val(),
		heuredepart : $("#heuredepart").val(),
		nbplaces : $("#nbplaces").val(),
		nbplacesdispo : $("#nbplaces").val(),
		tarif :  $("#tarif").val(),
		bagagesautorises : $("#bagagesautorises:checked").val(),
		details : $("#details").val()
		};
	$.post(url,JSON.stringify(itineraire), messageAjouter, "json");
}

function messageAjouter (data) { // Message en cas d'ajout ou de problème d'ajout
	$("#contenu").html("");
	$("#message").html("");
	if (data==1) {
	$("#message").html("Itinéraire ajouté");
	} else {
	$ ("#message").html("Problème lors de l'ajout");
	}
}


function mesItineraires() { // 
	$.get(url+'/dispo', null, afficherMesItineraires, "json");
}


function afficherMesItineraires(data) { // affiche les itinéraires d'un membre
	if (idmembre = membreConnecte) {
	$("#message").html("");
	var res = '<table class="table table-bordered table-striped table-responsive">';
	res = res + '<tr><th>' + "Lieu de départ" + "</th><th>" + "Lieu d'arrivée" + '</th><th>' + 'Horaire de départ' + '</th><th>' + '<i class="glyphicon glyphicon-user">' + '</th><th>' + '<i class="glyphicon glyphicon-euro">' + '</th><th>' + '<i class="glyphicon glyphicon-briefcase">' + '</th><th>' + 'Détails' + '</th><th></th></tr>';
	$.each(data, function(index, val) {
		res = res + '<tr><td>' + val.lieudepart + '</td><td>' + val.lieuarrivee + '</td><td>' + val.datedepart + '-' + val.heuredepart + '</td><td>' +val.nbplacesdispo + "/"  + val.nbplaces +'</td><td>' + val.tarif +'</td><td>';
		if (val.bagagesautorises==1) res = res+ "oui"; else res = res + "non";
		res = res + '</td><td>' + val.details + '</td><td>'
		+'<div class="btn-group"><a href="#" name="'+val.iditi+'" id="modifier" class="btn btn-warning">Modifier</a>'
		+'<a href="#" name="'+val.iditi+'" id="supprimer" class="btn btn-danger">Supprimer</a>'
		+'</div></td></tr>';
	});
		res = res + '</table>';
		$("#contenu").html(res);
		$(".btn-danger").click(supprimerItineraire);
		$(".btn-warning").click(modifierItineraire);
	} 
}

function modifierItineraire(e) { 
	e.preventDefault();
	idIti = e.target.name;
	$("#contenu").load("modifier.html", null, function() {
		$("#annulermodif").click(annulerModif);
		$("#modifier").click(modifier);
		$.get(url+'/'+idIti,null, modifierAfficherValeur,"json");
	});
	}
	
function modifierAfficherValeur(data) { // récupère les valeurs de l'itinéraire initial dans un formulaire
	$("#lieudepart").val(data.lieudepart);
	$("#lieuarrivee").val(data.lieuarrivee);
	$("#datedepart").val(data.datedepart);
	$("#heuredepart").val(data.heuredepart);
	$("#nbplaces").val(data.nbplaces);
	$("#tarif").val(data.tarif);
	$("#details").val(data.details);
	if (data.bagagesautorises ==1) {
			$("[value='1']").prop("checked", true);
	} else {
			$("[value='0']").prop("checked", true);
	}
}
function annulerModif() { // annule la modification 
	mesItineraires();
}

function modifier(e) { // modifie l'itinéraire
	e.preventDefault();
	var itineraire = {
		iditi : idIti,
		idmembre : membreConnecte,
		lieudepart : $("#lieudepart").val(),
		lieuarrivee : $("#lieuarrivee").val(),
		datedepart : $("#datedepart").val(),
		heuredepart : $("#heuredepart").val(),
		nbplaces : $("#nbplaces").val(),
		tarif :  $("#tarif").val(),
		bagagesautorises : $("#bagagesautorises:checked").val(),
		details : $("#details").val()
		};
	$.ajax({
		url: url,
		data: JSON.stringify(itineraire),
		type:"PUT",
		success: messageModifier,
		dataType: "json"
		});
}
	
function messageModifier(data) { // message de modification réussie ou de problème
	$("#contenu").html("");
	if (data==1) {
	$("#message").html("Itinéraire modifié");
	} else {
	$ ("#message").html("Problème lors de la modification");
	}
}


function supprimerItineraire(e){ // supprime un itinéraire
e.preventDefault();
		$.ajax({
		url: url+"/"+e.target.name,
		type:"DELETE",
		success: messageSupprimer,
		dataType: "json"
		});
}

function messageSupprimer(data) { // message de suppression réussie ou non
	$("#contenu").html("");
	$("#message").html("");
	if (data==1) {
	$("#message").html("Itinéraire supprimé");
	} else {
	$ ("#message").html("Problème lors de la suppression, l'itinéraire a déjà dû être réserver");
	}	
}

function reserver(e) {
	idIti = e.target.name;
    var reservation={
        idmembre : membreConnecte,
        iditi: idIti,
        nbplacesreservees : 1
        };
	$.post(url+"/"+idIti+"/reservations",JSON.stringify(reservation), messageReserver, "json");
	}
	
function messageReserver(data) {
	$("#contenu").html("");
	$("#message").html("");
	if (data==1) {
	$("#message").html("Itinéraire réservé");
	} else {
	$ ("#message").html("Impossible de réserver cet itinéraire, il n'y a plus de places disponibles");
	}	
}


function mesReservations(){
	$.get(url+'/reservations/'+membreConnecte, null,afficherReservation, "json");
}

function afficherReservation(data){
	$("#message").html("");
    var res='<table class="table table-bordered table-striped">';
    res= res + '<tr><th>'+'Numéro de l\'itinéraire'+'</th><th>'+'Date de réservation'+'</th><th>'+'Nombre de places'+'</th><tr>'
        $.each(data, function(index,val){
          res = res+'<td>'+val.iditi+'</td><td>'+val.datereservation+'</td><td>'+val.nbplacesreservees+'</td></tr>';            
		});
    res = res+'</table>';
    $('#contenu').html(res);
}