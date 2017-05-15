$(document).ready(function() {

   
    var urlQuartier = "http://projettechnoweb.esy.es/index.php?action=listequartier";
    var urlBat = "http://projettechnoweb.esy.es/index.php?action=listeBatiments";
    var urlTypesBat = "http://projettechnoweb.esy.es/index.php?action=listeTypesBat";
    var urlManifs = "http://projettechnoweb.esy.es/index.php?action=listeManifs";

    var lienM = 0;
    var lienS = 0;
  
    // nombre de salles par types (cinéma, théatre, etc)
    $("#lienTypes").click(function() {

        $("#salles").children().remove();
        $("#manifs").children().remove();
        lienS = 0;
        lienM = 0;
      

        $.get(urlTypesBat, function( data ) { // on charge toutes les salles de la base de données
          
          var tab = [];
          for(var k =0; k<8; k++) {
            tab[k] = 0;
          }
          data = JSON.parse(data.replace(/&quot;/g,'"'));
          
          $.get(urlBat, function(data2) {
            data2 = JSON.parse(data2.replace(/&quot;/g,'"'));

            var i = 0;
            for(i; i<data.length; i++) {
              var idType = data[i].IDTYPEBAT;
            

              var j = 0;
            
              for(j; j<data2.length; j++) {
                var idType2 = data2[j].IDTYPEBAT;
                if(idType ==  idType2) {
                  tab[idType] = tab[idType] + 1 ;
                }
              }  
            }
            console.log(tab);
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawTypeSalles(tab));
          });
         
      });

    });
    // affichage du graphique de stats
    function drawTypeSalles(tab) {

      $.get(urlTypesBat, function( data ) {
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        var tab3 =[];
        for(var i =1; i<=data.length; i++) {
        
          idTypeBat = data[i-1].IDTYPEBAT;
          nom = data[i-1].TYPEBAT;
          tab3[0] = ["type salle", "nombre de salles"];
          tab3[i] = [nom, tab[i]];
         
      }
        var data2 = google.visualization.arrayToDataTable(tab3);
        var options = {
          title: 'Nombre de salles par types'
        };
        var chart = new google.visualization.PieChart(document.getElementById('placeStats'));

        chart.draw(data2, options);
        });
    }


    // création des tags de quartiers
    var selectQuartierStat = $("#selectQuartierStat");
    $("body").on("change", "#selectQuartierStat", function() { // a chaque nouvelle selection dans le select
      var champ = $("#selectQuartierStat option:selected").text();
      var id = $("#selectQuartierStat option:selected").val();

      console.log("Bonjour je suis un ananas");

      if(id != 99) {
        if(id ==100 ) { // si on sélectionne tous les quartiers, on supprime les autres tags
          $("#selection div").each(function() {
            $(this).remove();
          });
        }
        var newDiv = "<div id='"+id+"'></div>"; // on crée le tag avec ke contenu correspondant
        $("#selection").append(newDiv);
        var contenu = "<p>"+champ+"</p>";
        var croix = "<img src='Images/croix.png' class='test'width='8px' height='8px'>";
        $("#"+id).append(contenu,croix);
      }
    });

  // complete le formulaire si on souhaite faire un graphique du nombre de salles selon les quartiers
    $("#lienSalles").click(function() {
      $.get(urlQuartier, function( data ) { // on charge toutes les salles de la base de données
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var field  = "<p>Salles</p>" // on crée le select pour la sélection avec tous les quartiers de la bdd
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
            if(tab[j] ==  idQuartier) {
              tab2.push(idQuartier);

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
      $.get(urlQuartier, function( data ) {
      data = JSON.parse(data.replace(/&quot;/g,'"'));
      var tab3 =[];
      for(var i =1; i<=data.length; i++) {
        
        idQuartier = data[i-1].IDQUARTIER;
        nom = data[i-1].NOM;
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
      $.get(urlQuartier, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var field  = "<p>Manifestations</p>"
          + "<fieldset>"
          + "<legend><strong>Quartiers</strong></legend>"
          + "<label>Sélectionnez les quartiers que vous souhaitez comparer :</label>"
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

    $("body").on('click', "#statsManifs", function(e){
      e.preventDefault();
      var tab = [];
      var tab2 = [];
      $("#selection div").each(function() {
        var idSalle = $(this).attr('id');
        tab.push(idSalle);
      });
    

      $.get(urlManifs, function( data ) {
        
        data = JSON.parse(data.replace(/&quot;/g,'"'));
        
        var k = 0;
        var i = 0;
        for(k; k<64; k++) {
          tab2[k] = 0;
        }
 
        for(i; i<data.length; i++) {
          var j = 0;
          idQuartier = data[i].ID_QUARTIER;
          nom = data[i].NOMMANIF;

          for(j; j<tab.length; j++) {
            if(tab[j] ==  idQuartier) {
              tab2.push(idQuartier);

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
    google.charts.setOnLoadCallback(drawManifs(tab2));
    });

    $("body").on('click', '.test', function() { 
      $(this).parent().remove();
    });

    
    function drawManifs(tab) {
      $.get(urlQuartier, function( data ) {
      data = JSON.parse(data.replace(/&quot;/g,'"'));
      var tab3 =[];
      for(var i =1; i<=data.length; i++) {
        
        idQuartier = data[i-1].IDQUARTIER;
        nom = data[i-1].NOM;
        tab3[0] = ["quartier", "nombre de manifestations"];
        tab3[i] = [nom, tab[i]];
         
      }
        var data2 = google.visualization.arrayToDataTable(tab3);
        var options = {
          title: 'Nombre de manifestations par quartier'
        };
        var chart = new google.visualization.PieChart(document.getElementById('placeStats'));

        chart.draw(data2, options);
        });
    }


  

});

