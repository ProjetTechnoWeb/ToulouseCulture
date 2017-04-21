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
		
		// retourne l'ensemble des types de batiment
		 public function randomManifSlider() {
            $manifs = array();  
            $q = $this->_db->query("SELECT * FROM MANIFESTATION WHERE IMAGE !='' LIMIT 3");
            while ($donnees = $q->fetch())
            {
                $manifs[] = new ManifestationManager($donnees);
            }
            return $manifs;
        }
		
    }
?>