$(document).ready(function() {
	
	/*Cette fonction est déjà présente dans la partie acceuil.html.twig
	le lien js ne voulais pas ce faire */

//fonction qui permet le slide d'image
	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
		   slides[i].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex> slides.length) {slideIndex = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		setTimeout(showSlides, 100000); // Change l'image toute les 10 secondes 
	}

});