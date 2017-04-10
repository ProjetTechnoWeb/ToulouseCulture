<?php
require_once("connect.php");
require_once("Modules/typetrandport.php");
// Définition d'une classe permettant de gérer les itinéraires 
//   en relation avec la base de données	
class TypeTransportManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($db) {
            $this->_db=$db;
        }
		
		// retourne l'ensemble des types de batiment
		 public function getListTypeDeTransports() {
            $typesTransport = array();  
            $q = $this->_db->query('SELECT idtypetransport, typetransport FROM TYPE_TRANSPORT');
            while ($donnees = $q->fetch())
            {
                $typesTransport[] = new TypeTransportManager($donnees);
            }
            return $typesTransport;
        }
		
		// retourne un un type de batiment en fonction de son id
		public function getTypeTransport($idTypeTransport) {
            $q = $this->_db->query("SELECT typetransport FROM TYPE_TRANSPORT where idtypetransport ='".$idTypeTransport."'");
						
            $typeTransport = new TypeTransportManager($q->fetch());
			return $typeTransport;
        }
    }
?>