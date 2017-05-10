$(document).ready(function() {

    function compare(x, y) {
      return x - y;
    }
    var url = "http://projettechnoweb.esy.es/index.php?action=listequartier";
    var urlBat = "http://projettechnoweb.esy.es/index.php?action=listeBatiments";
    var lienM = 0;
    var lienS = 0;
  

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

        var newDiv = "<div id='"+id+"'></div>";
        $("#selection").append(newDiv);
        var contenu = "<p>"+champ+"</p>";
        var croix = "<img src='Images/croix.png' class='test'width='8px' height='8px'>";
        $("#"+id).append(contenu,croix);

      }
    });

  // complete le formulaire si on souhaite faire un graphique du nombre de salles selon les quartiers
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
          + "</fieldset>"
          + "<input type='button' id='statsSalles' value='Valider'>";
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


  $("body").on('click', "#statsSalles", function(e){
      e.preventDefault();
      var tab = [];
      var tab2 = [];
      $("#selection div").each(function() {
        var idSalle = $(this).attr('id');
        tab.push(idSalle);
      });
    
     
      $.get(urlBat, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var k = 0;
        var i = 0;
        for(k; k<64; k++) {
          tab2[k] = 0;
        }
 
        for(i; i<data.length; i++) {
          var j = 0;
          idQuartier = data[i].IDQUARTIER;
          nom = data[i].NOM;

          for(j; j<tab.length; j++) {
            if(tab[j] ==  idQuartier ) {
              tab2.push(idQuartier);
             // console.log("i"+idQuartier);
              tab2[idQuartier] = tab2[idQuartier] + 1 ;
              break; 
            }
          } 
        }

        for(var k = 0;k<tab2.lentgh;k++) {
          for(var l = 0;l<64;l++) {
          }
        }

    });
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawSalles(tab2));
    });

  	$("body").on('click', '.test', function() { 
  		$(this).parent().remove();
  	});

   	
    function drawSalles(tab) {
      $.get(url, function( data ) {
      data = JSON.parse(data.replace(/&quot;/g,'"'));
      var tab3 =[];
      for(var i = 0; i<data.length; i++) {
        
        idQuartier = data[i].IDQUARTIER;
        nom = data[i].NOM;
        tab3[0] = ["quartier", "nombre de salles"];
        tab3[i] = [nom, tab[i]];
         
      }
        var data2 = google.visualization.arrayToDataTable(tab3);
        var options = {
          title: 'Nombre de salles par quartier'
        };
        var chart = new google.visualization.PieChart(document.getElementById('placeStats'));

        chart.draw(data2, options);
        });
    }




  // complete le formulaire si on souhaite faire un graphique du nombre de manifs manifs selon les quartiers
    $("#lienManifs").click(function() {
      $.get(url, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var field  = "<p>Manifestations</p>"
          + "<fieldset>"
          + "<legend><strong>Quartiers</strong></legend>"
          + "<label>Sélectionnez les quartiers que vous souhaitez comparer : <i>(au moins 2)</i></label>"
          + "<select id='selectQuartierStat'>"
          + "<option value='99'>Sélection de quartier</option>"
          + "<option value='100'>Tous les quartiers</option>"
          + "</select>"
          + "<div id='selection'></div>"
          + "</fieldset>"
          + "<input type='button' id='statsManifs' value='Valider'>";
          
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

  

});

