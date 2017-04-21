<?php
require_once("connect.php");
require_once("Modules/quartier.php");
require_once("Modules/batiment.php");
require_once("Modules/manifestation.php");
// Définition d'une classe permettant de gérer les itinéraires 
//   en relation avec la base de données	
class TransportManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($db) {
            $this->_db=$db;
        }
		
		// retourne l'ensemble des types de batiment
		 public function getListTransports() {
            $transports = array();  
            $q = $this->_db->query('SELECT * FROM TRANSPORT');
            while ($donnees = $q->fetch())
            {
                $transports[] = new TransportManager($donnees);
            }
            return $transports;
        }
		
    }
?>