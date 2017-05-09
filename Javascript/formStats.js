$(document).ready(function() {


    var url = "http://projettechnoweb.esy.es/index.php?action=listequartier";
    var lienM = 0;
    var lienS = 0;
    
	// complete le formulaire si on souhaite faire un graphique du nombre de manifs manifs selon les quartiers
   	$("#lienManifs").click(function() {
      $.get(url, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var field  = "<p>Manifestations</p>"
          + "<fieldset>"
          + "<legend><strong>Quartiers</strong></legend>"
          + "<label>Sélectionnez les quartiers que vous souhaitez comparer : </label>"
          + "<select id='selectQuartierStat'>"
          + "<option value='99'>Sélection de quartier</option>"
          + "<option value='100'>Tous les quartiers</option>"
          + "</select>"
          + "<div id='selection'></div>"
          + "</fieldset>";
          
    if(lienM == 0) {
      $("#manifs").append(field);
      $("#salles").children().remove();
      lienM = 1;
      lienS = 0;
    }
        var i = 0;
        for(i; i<data.length; i++) {
          idQuartier = data[i].ID_QUARTIER;
          nom = data[i].NOM;
        
          $("#selectQuartierStat").append("<option value='"+idQuartier+"'>"+nom+"</option>");


      }
    });
        
  });



  // complete le formulaire si on souhaite faire un graphique du nombre de manifs manifs selon les quartiers
    $("#lienSalles").click(function() {
      $.get(url, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var field  = "<p>Salles</p>"
          + "<fieldset>"
          + "<legend><strong>Quartiers</strong></legend>"
          + "<label>Sélectionnez les quartiers que vous souhaitez comparer : </label>"
          + "<select id='selectQuartierStat'>"
          + "<option value='99'>Sélection de quartier</option>"
          + "<option value='100'>Tous les quartiers</option>"
          + "</select>"
          + "<div id='selection'></div>"
          + "</fieldset>";
          
    if(lienS == 0) {
      $("#salles").append(field);
      $("#manifs").children().remove();
      lienS = 1;
      lienM = 0;
    }
        var i = 0;
        for(i; i<data.length; i++) {
          idQuartier = data[i].ID_QUARTIER;
          nom = data[i].NOM;
        
          $("#selectQuartierStat").append("<option value='"+idQuartier+"'>"+nom+"</option>");


      }
    });
        
  });


   	// création des tags de quartiers
   	var selectQuartierStat = $("#selectQuartierStat");
   	$("body").on("change", "#selectQuartierStat", function() {
   		var champ = $("#selectQuartierStat option:selected").text();
    	var id = $("#selectQuartierStat option:selected").val();

   		if(id != 99) {
   			if(id ==100 ) {
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

