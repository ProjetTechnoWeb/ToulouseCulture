<?php
require_once("connect.php");
require_once("Modules/manifestation.php");
// Définition d'une classe permettant de gérer les itinéraires 
//   en relation avec la base de données	
class ManifestationManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
        // Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($db) {
            $this->_db=$db;
        }
		
		// retourne 3 manif au hasard à afficher sur l'accueil
		 public function randomManifSlider() {
            $manifs = array();  
            $q = $this->_db->query("SELECT ID_MANIF, NOMMANIF, DESCRIPMANIF, IMAGE FROM MANIFESTATION WHERE IMAGE !='' AND HEUREMANIF != '' ORDER BY RAND() LIMIT 3");

            while ($donnees = $q->fetch())
            {
              
                $donnees2 = array('ID_MANIF' => $donnees[0],'NOMMANIF'=> $donnees['NOMMANIF'], 'DESCRIPMANIF'=> $donnees['DESCRIPMANIF'], 'IMAGE' =>$donnees['IMAGE']);
                $manifs[] = new Manifestation($donnees2);
             
            }
            return $manifs;
        }
		
    }
?>