<?php
require_once("connect.php");
require_once("Modules/batiment.php");
// Définition d'une classe permettant de gérer les itinéraires 
//   en relation avec la base de données	
class BatimentManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($_db) {
            $this->_db=$_db;
        }
		
		// retourne l'ensemble des types de batiment
		 public function getListeBatiments($type) {
            $batiments = array();  
            $q = $this->_db->query('SELECT * FROM BAT');

            while ($donnees = $q->fetch())
            {

                 $donnees2 = array('IDBAT' => $donnees[0],'IDQUARTIER'=> $donnees[1], 'IDTYPEBAT'=> $donnees[2], 'LONGITUDE' =>$donnees[3], 'LATITUDE' => $donnees[4],'NOM'=> $donnees[5], 'DESCPRCOURT'=> $donnees[6], 'DESCPRLONG' =>$donnees[7], 'OUVERTURE'=> $donnees[8], 'FERMETURE' =>$donnees[9]);
                if($type == "json") {
                    $batiments[] = $donnees2;
                    
                } else {
                $batiments[] = new Quartier($donnees2);
               }
            }

            return $batiments;
        }
		
    }
?>