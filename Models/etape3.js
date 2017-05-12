function afficherMusees(donneesJSON) {
	var i =0;
	for (i=0;i<donneesJSON.length; i++) {
		var musees = $("div");
		nomMusee = donneesJSON[i].nomMusee;
		ville = donneesJSON[i].ville;
		musees.append("<p>"+nomMusee+"("+ville+")</p>");
		$("#musees").append(musees);
		
	}

}


$("#nomDept").keyup(recupererDept);
function recupererDept(e) {
	
	var nomDept=$(this).val();
		$.get("http://vsp149406.nfrance.com/~16_amato/AJAX/Musee/museesdept.php?nomDept="+nomDept,null, afficherMusees, "json");
		
	
	
}
