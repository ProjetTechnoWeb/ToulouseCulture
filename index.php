<?php
//---------------------- les vues -------------------------------
// moteur de template pour les vues
require_once ("moteurtemplate.php");

// ---------------------- les models ------------------------------

//---------------------- les Classes -----------------------------
require_once ("Modules/typebatiments.php");
require_once ("Modules/manifestation.php");

// ----------------------Les managers ---------------------------
require_once("Models/typeBatimentsManager.php");
require_once("Models/manifestationManager.php");

// ----------------------Les managers ---------------------------
$typeBatManager = new TypeBatimentManager($bdd);
$manifestationManager = new ManifestationManager($bdd);

// ------------------------------------------------------------------------------------
	if (isset($_GET["action"])) {
		$action = $_GET["action"]; 
		switch ($action) {
		
		case "accueil" : // si l'action est "accueil"			
			$manifsSlider = $manifestationManager->randomManifSlider();
			echo $twig->render('accueil.html.twig' , array('manifs' => $manifsSlider)); // viewer, va afficher le fichier accueil.html.twig	

		break;
		case "statistiques" : // si l'action est "statistiques"
			echo $twig->render('statistiques.html.twig'); // viewer, va afficher le fichier statistiques.html.twig	
		break;
	
		case "calendrier" : 
			echo $twig->render('calendrier.html.twig'); // viewer	
		break;
		case "chercher" : 
			echo $twig->render('chercher.html.twig'); // viewer	
		break;
		}
	}
	else {		
	
	echo $twig->render('accueil.html.twig'); 
	
	}


?>