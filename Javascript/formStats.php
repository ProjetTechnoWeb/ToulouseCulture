<script>

$(document).ready(function() {
  
  var tab = <?php json_encode($quartiers); ?>;

  console.log(tab);
  	var lien = 0;
	// complete le formulaire si on souhaite faire un graphique du nombre de manifs manifs selon les quartiers
   	$("#lienManifs").click(function() {
   		var field  = "<fieldset>"
				+ "<legend><strong>Quartiers</strong></legend>"
				+ "<label>Sélectionnez les quartiers que vous souhaitez comparer : </label>"
				+ "<select id='selectQuartierStat'>"
				+	"<option value='0'>Sélection de quartier</option>"
				+	"<option value='1'>Quartier 1</option>"
				+	"<option value='2'>Quartier 2</option>"
				+	"<option value='3'>Quartier 3</option>"
				+	"<option value='4'>Tous les quartiers</option>"
				+ "</select>"
				+ "<div id='selection'></div>"
				+ "</fieldset>";
		if(lien == 0) {
			$("#manifs").append(field);
			lien = 1;
		}
   	});


   	// complete le formulaire si on souhaite faire un graphique du nombre de salles selon les quartiers
   	$("#lienSalles").click(function() {

   		var field  = "<fieldset>"
				+ "<legend><strong>Quartiers</strong></legend>"
				+ "<label>Sélectionnez les quartiers que vous souhaitez comparer : </label>"
				+ "<select id='selectQuartierStat'>"
				+	"<option value='0'>Sélection de quartier</option>"
				+	"<option value='1'>Quartier 1</option>"
				+	"<option value='2'>Quartier 2</option>"
				+	"<option value='3'>Quartier 3</option>"
				+	"<option value='4'>Tous les quartiers</option>"
				+ "</select>"
				+ "<div id='selection'></div>"
				+ "</fieldset>";
		if(lien == 0) {
			$("#salles").append(field);
			lien = 1;
		}
   	});


   	// création des tags de quartiers
   	var selectQuartierStat = $("#selectQuartierStat");
   	$("body").on("change", "#selectQuartierStat", function() {
   		var champ = $("#selectQuartierStat option:selected").text();
    	var id = $("#selectQuartierStat option:selected").val();

   		if(id != 0) {
   			if(id ==4 ) {
    			$("#selection div").each(function() {
    				$(this).remove();
    			});
    		}
    		
    		console.log(champ);
    		console.log(id);
    		var newDiv = "<div id='"+id+"'></div>";
    		$("#selection").append(newDiv);
    		var contenu = "<p>"+champ+"</p>";
    		var croix = "<img src='Images/croix.png' class='test'width='8px' height='8px'>";
    		$("#"+id).append(contenu,croix);

    	}
  	});
  	
  	$("body").on('click', '.test', function() { 
  		$(this).parent().remove();
  	});

   	// Rajout stats aléatoires trouvé sur internet pour tester l'affichage de graphique
  	google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('placeStats'));

        chart.draw(data, options);
    }


});


</script>