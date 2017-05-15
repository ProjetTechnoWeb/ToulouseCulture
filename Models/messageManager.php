<?php
require_once("connect.php");
require_once("Modules/message.php");
// Définition d'une classe permettant de gérer les quartierd 
//   en relation avec la base de données	
class MessageManager
    {
        private $_db; // Instance de PDO - objet de connexion au SGBD
        
		// Constructeur = initialisation de la connexion vers le SGBD
        public function __construct($_db) {
            $this->_db=$_db;
        }
		
		// retourne l'ensemble des types de quartiers, soit un tableau convertible en JSON pour ajax, soit sous forme d'objets
		 public function getMessages($idBat) {
            $messages = array();  
            $q = $this->_db->query('SELECT * FROM MESSAGE WHERE IDBAT = "'.$idBat.'"');

            while ($donnees = $q->fetch())
            {

                $donnees2 = array('IDMESSAGE' => $donnees[0],'IDBAT'=> $donnees[1], 'DATEMESS'=> $donnees[2], 'HEUREMESS' =>$donnees[3], 'DESCPMESSAGE' => $donnees[4]);
                
                $messages[] = new Message($donnees2);
               
            }

            return $messages;
        }

		
    }
?>