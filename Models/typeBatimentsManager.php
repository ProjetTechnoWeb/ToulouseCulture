<?php
require_once("connect.php");
require_once("Modules/typebatiments.php");
// Définition d'une classe permettant de gérer les itinéraires 
//   en relation avec la base de données	
class TypeBatimentManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($db) {
            $this->_db=$db;
        }
		
		// retourne l'ensemble des types de batiment
		 public function getListTypeDeBatiments($type) {
            $typesBatiments = array();  
            $q = $this->_db->query('SELECT idtypebat, typebat FROM TYPE_BATIMENT');
            while ($donnees = $q->fetch())
            {

                $donnees2 = array('IDTYPEBAT' => $donnees[0],'TYPEBAT'=> $donnees[1]);
                if($type == "json") {
                    $typesBatiments[] = $donnees2;
                } else {
                    $typesBatiments[] = new TypeBatiment($donnees2);
                }
            }
            return $typesBatiments;
        }
		
		// retourne un un type de batiment en fonction de son id
		public function getTypeBatiment($idTypeBat) {
            $q = $this->_db->query("SELECT typebat FROM TYPE_BATIMENT where idtypebat ='".$idTypeBat."'");
						
            $typebat = new TypeBatiment($q->fetch());
			return $typeBat;
        }
    }
?>