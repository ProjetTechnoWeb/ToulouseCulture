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
		 public function randomManifSlider($type) {
            $manifs = array();  
            $q = $this->_db->query("SELECT ID_MANIF, ID_BAT, NOMMANIF, DESCRIPMANIF, IMAGE, LATITUDE, LONGITUDE FROM MANIFESTATION WHERE IMAGE !='' AND HEUREMANIF != '' ORDER BY RAND() LIMIT 3");

            while ($donnees = $q->fetch())
            {
                $donnees2 = array('ID_MANIF' => $donnees['ID_MANIF'],'ID_BAT' => $donnees['ID_BAT'], 'NOMMANIF'=> $donnees['NOMMANIF'], 'DESCRIPMANIF'=> $donnees['DESCRIPMANIF'], 'IMAGE' =>$donnees['IMAGE'], 'LATITUDE' => $donnees['LATITUDE'], 'LONGITUDE' => $donnees['LONGITUDE']);
                if($type == "json") {
                    $manifs[] = $donnees2;
                } else {
               
                    $manifs[] = new Manifestation($donnees2);
                }
            }
            return $manifs;
        }
		
        // retourne la liste complete des manifs
         public function listeManifs($type) {
            $manifs = array();  
            $q = $this->_db->query("SELECT MANIFESTATION.ID_MANIF, MANIFESTATION.NOMMANIF, BAT.ID_QUARTIER AS ID_QUARTIER FROM MANIFESTATION, BAT WHERE MANIFESTATION.ID_BAT = BAT.ID_BAT");

            while ($donnees = $q->fetch())
            {
                
                if($type == "json") {
                    $donnees2 = array('ID_MANIF' => $donnees['ID_MANIF'],'NOMMANIF' => $donnees['NOMMANIF'], 'ID_QUARTIER'=> $donnees['ID_QUARTIER']);
                    $manifs[] = $donnees2;
                } else {
                    $donnees2 = array('ID_MANIF' => $donnees['ID_MANIF'],'ID_BAT' => $donnees['ID_BAT'], 'NOMMANIF'=> $donnees['NOMMANIF'], 'DESCRIPMANIF'=> $donnees['DESCRIPMANIF'], 'IMAGE' =>$donnees['IMAGE'], 'LATITUDE' => $donnees['LATITUDE'], 'LONGITUDE' => $donnees['LONGITUDE']);
                    $manifs[] = new Manifestation($donnees2);
                }
            }
            return $manifs;
        }
    }
?>