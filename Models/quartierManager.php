<?php
require_once("connect.php");
require_once("Modules/quartier.php");
// Définition d'une classe permettant de gérer les quartierd 
//   en relation avec la base de données	
class QuartierManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($_db) {
            $this->_db=$_db;
        }
		
		// retourne l'ensemble des types de quartiers, soit un tableau convertible en JSON pour ajax, soit sous forme d'objets
		 public function getListeQuartier($type) {
            $quartiers = array();  
            $q = $this->_db->query('SELECT * FROM QUARTIER');

            while ($donnees = $q->fetch())
            {

                $donnees2 = array('ID_QUARTIER' => $donnees[0],'LONGITUDE'=> $donnees[1], 'LATITUDE'=> $donnees[2], 'POLYGONE' =>$donnees[3], 'NOM' => $donnees[4],'NBRSCOLARISES'=> $donnees[5], 'NBRDEMENAGES'=> $donnees[6], 'POPULATIONTOTALE' =>$donnees[7], 'NBRPERSACTIVES'=> $donnees[8], 'NBRLOGEMENTSQUARTIER' =>$donnees[9]);
                if($type == "json") {
                    $quartiers[] = $donnees2;
                    
                } else {
                $quartiers[] = new Quartier($donnees2);
               }
            }

            return $quartiers;
        }


        // retourne un quartier en fonction de son id
        public function getQuartier($id) {
            $quartier;
            $q = $this->_db->query('SELECT * FROM QUARTIER WHERE ID_QUARTIER = "'.$id.'"');

            $quartier = $q->fetch();
            return $quartier;
        }
		
    }
?>