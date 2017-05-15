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

                 $donnees2 = array('IDBAT' => $donnees[0],'IDQUARTIER'=> $donnees[1], 'IDTYPEBAT'=> $donnees[2], 'LONGITUDE' =>$donnees[3], 'LATITUDE' => $donnees[4],'NOM'=> $donnees[5]);
                if($type == "json") {
                    $batiments[] = $donnees2;
                    
                } else {
                $batiments[] = new Batiment($donnees2);
               }
            }

            return $batiments;
        }

		// retourne une liste de batiments selon leur quartier et leur type
         public function getListeBatimentsRecherche($idquartier, $idtype) {
            $batiments = array();  
            $q = $this->_db->query('SELECT * FROM BAT WHERE IDTYPEBAT="'.$idtype.'" AND ID_QUARTIER="'.$idquartier.'"');

            while ($donnees = $q->fetch())
            {

                $donnees2 = array('IDBAT' => $donnees[0],'IDQUARTIER'=> $donnees[1], 'IDTYPEBAT'=> $donnees[2], 'LONGITUDE' =>$donnees[3], 'LATITUDE' => $donnees[4],'NOM'=> $donnees[5], 'DESC' => $donnees[6]);
               
                $batiments[] = new Batiment($donnees2);
               
            }

            
            return $batiments;
        }


        // retourne un batiment en fonction de son id
        public function getBatiment($id) {
            $batiment;
            $q = $this->_db->query('SELECT * FROM BAT WHERE ID_BAT = "'.$id.'"');
            
            $donnees = $q->fetch();
            $donnees2 = array('IDBAT' => $donnees[0],'IDQUARTIER'=> $donnees[1], 'IDTYPEBAT'=> $donnees[2], 'LONGITUDE' =>$donnees[3], 'LATITUDE' => $donnees[4],'NOM'=> $donnees[5], 'DESC' => $donnees[6]);
               

           $batiment = new Batiment($donnees2);

           return $batiment;
        }

        // ajoute la description à un batiment
        public function ModifDesc($id, $desc) 
        {
            $req = 'UPDATE BAT SET DESCR ="'.$desc.'" WHERE ID_BAT = "'.$id.'"';
                
            return $this->_db->exec($req);
           
        }
    }
?>