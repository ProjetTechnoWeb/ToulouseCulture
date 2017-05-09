<?php
//---------------------- les vues -------------------------------
// moteur de template pour les vues
require_once ("moteurtemplate.php");

// ---------------------- les models ------------------------------

//---------------------- les Classes -----------------------------
require_once ("Modules/typebatiments.php");
require_once ("Modules/manifestation.php");
require_once ("Modules/quartier.php");

// ----------------------Les managers ---------------------------
require_once("Models/typeBatimentsManager.php");
require_once("Models/manifestationManager.php");
require_once("Models/quartierManager.php");

// ----------------------Les managers ---------------------------
$typeBatManager = new TypeBatimentManager($bdd);
$manifestationManager = new ManifestationManager($bdd);
$quartierManager = new QuartierManager($bdd);

// ------------------------------------------------------------------------------------
	if (isset($_GET["action"])) {
		$action = $_GET["action"]; 
		switch ($action) {
		
		case "accueil" : // si l'action est "accueil"			
			$manifsSlider = $manifestationManager->randomManifSlider();
			echo $twig->render('accueil.html.twig' , array('manifs' => $manifsSlider)); // viewer, va afficher le fichier accueil.html.twig	

		break;
		case "statistiques" : // si l'action est "statistiques"
			$quartiers = $quartierManager->getListeQuartier("json");
			$quartiers = json_encode($quartiers);
			echo $twig->render('statistiques.html.twig', array('quartiers' =>$quartiers)); // viewer, va afficher le fichier statistiques.html.twig	
		break;
	
		case "calendrier" : 
			echo $twig->render('calendrier.html.twig'); // viewer	
		break;
		case "chercher" : 
			echo $twig->render('chercher.html.twig'); // viewer	
		break;
		case "listequartier" :
			$quartiers = $quartierManager->getListeQuartier("json");
			$quartiers = json_encode($quartiers);
			echo $twig->render('listeQuartier.html.twig', array('quartiers' =>$quartiers)); // viewer, va afficher le fichier 
		}
	}
	else {		
	
	echo $twig->render('accueil.html.twig'); 
	
	}


?>