<?php
//---------------------- les vues -------------------------------
// moteur de template pour les vues
require_once ("moteurtemplate.php");

// ---------------------- les models ------------------------------

//---------------------- les Classes -----------------------------
require_once ("Modules/typebatiments.php");
require_once ("Modules/manifestation.php");
require_once ("Modules/quartier.php");
require_once ("Modules/batiment.php");
require_once ("Modules/message.php");

// ----------------------Les managers ---------------------------
require_once("Models/typeBatimentsManager.php");
require_once("Models/batimentsManager.php");
require_once("Models/manifestationManager.php");
require_once("Models/quartierManager.php");
require_once("Models/messageManager.php");

// ----------------------Les managers ---------------------------
$typeBatManager = new TypeBatimentManager($bdd);
$manifestationManager = new ManifestationManager($bdd);
$quartierManager = new QuartierManager($bdd);
$batimentsManager = new BatimentManager($bdd);
$messageManager = new messageManager($bdd);
// ------------------------------------------------------------------------------------
	if (isset($_GET["action"])) {
		$action = $_GET["action"]; 
		switch ($action) {
		
		case "accueil" : // si l'action est "accueil"			
			$manifsSlider = $manifestationManager->randomManifSlider("manif");
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
			$quartiers = $quartierManager->getListeQuartier("objet");
			$typebatiments = $typeBatManager->getListTypeDeBatiments("objet");
			echo $twig->render('chercher.html.twig', array("quartiers" => $quartiers, "typesBat" => $typebatiments)); // viewer	
		break;
		case "rechercheSalle" : 
			$valeurs = $_POST;
			$idquartier = $valeurs['quartier'];
			$idtypebat  = $valeurs['typeBat'];
			$quartier = $quartierManager->getQuartier($idquartier);
			$quartier = json_encode($quartier);
			$batiments = $batimentsManager->getListeBatimentsRecherche($idquartier, $idtypebat);
			echo $twig->render('affichagesSalles.html.twig', array("batiments" => $batiments, 'quartier' => $quartier)); // viewer	
		break;
		case "batiment" :
			$idbatiment = $_POST;
			$idbatiment = $idbatiment['idbatiment'];
			$batiment = $batimentsManager->getBatiment($idbatiment);
			echo $twig->render('batiment.html.twig', array("batiment" => $batiment));
		break;


		// les listes au format JSON
		case "listequartier" :
			$quartiers = $quartierManager->getListeQuartier("json");
			$quartiers = json_encode($quartiers);
			echo $twig->render('listeQuartier.html.twig', array('quartiers' =>$quartiers)); // viewer, va afficher le fichier 
		break;
		case "listeBatiments" :
			$batiments = $batimentsManager->getListeBatiments("json");
			$batiments = json_encode($batiments);
			echo $twig->render('listeBatiments.html.twig', array('batiments' => $batiments));
		break;
		case "listeManifsImages" :
			$manifs = $manifestationManager->randomManifSlider("json");
			$manifs = json_encode($manifs);
			echo $twig->render('listeManifsImage.html.twig', array('manifs' => $manifs));
		break;
		case "listeTypesBat" :
			$typesBat = $typeBatManager->getListTypeDeBatiments("json");
			$typesBat = json_encode($typesBat);
			echo $twig->render('listeTypesBat.html.twig', array('typesBat' => $typesBat));
			break;
		case "listeManifs" :
			$listeManifs = $manifestationManager->listeManifs("json");
			$listeManifs = json_encode($listeManifs);
			echo $twig->render('listeManifestations.html.twig', array('listeManifs' => $listeManifs));
		break;
		}

	}
	else {		
	$manifsSlider = $manifestationManager->randomManifSlider("manif");
			echo $twig->render('accueil.html.twig' , array('manifs' => $manifsSlider)); // viewer, va afficher le fichier accueil.html.twig	

	}


?>