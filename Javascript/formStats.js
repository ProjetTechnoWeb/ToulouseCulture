$(document).ready(function() {
  

    var selectQuartierStat = $("#selectQuartierStat");

	
   	$(selectQuartierStat).change(function () {
   		if(selectQuartierStat.val() != 0) {
   			if(selectQuartierStat.val() ==4 ) {
    			$("#selection div").each(function() {
    				$(this).remove();
    			});
    		}
    		var champ = $("#selectQuartierStat option:selected").text();
    		console.log(champ);
    		var newDiv = "<div id='"+selectQuartierStat.val()+"'></div>";
    		$("#selection").append(newDiv);
    		var contenu = "<p>"+champ+"</p>";
    		var croix = "<img src='Images/croix.png' class='test'width='8px' height='8px'>";
    		$("#"+selectQuartierStat.val()).append(contenu,croix);

    		
    	}


  	});
   	$("body").on('click', '.test', function() { 
  		$(this).parent().remove();
  	});

});
