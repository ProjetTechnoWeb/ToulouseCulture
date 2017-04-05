<?php 
// définition de la classe Message
class Message {   
		private $idMessage;
		private $idBat; 
		private	$dateMess;
		private $heureMess;
		private $descMess;

        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idMessage'])) { $this->_idMessage = $donnees['idMessage']; }
			if (isset($donnees['idBat'])) { $this->_idBat = $donnees['idBat']; }
			if (isset($donnees['dateMess'])) { $this->_dateMess = $donnees['dateMess']; }
			if (isset($donnees['heureMess'])) { $this->_heureMess = $donnees['heureMess']; }
			if (isset($donnees['descMess'])) { $this->_descMess = $donnees['descMess']; }
		}	
		
        // GETTERS //
        public function idMessage() { return $this->_idMessage;}
		public function idBat() { return $this->_idBat;}
		public function dateMess() { return $this->_dateMess;}
		public function heureMess() { return $this->_heureMess;}
		public function descMess() { return $this->_descMess;}
		
		
		// SETTERS //
        public function setIdMessage($idMessage) { $this->_idMessage = $idMessage; }
		public function setIdBat($idBat) { $this->_idBat = $idBat; }
		public function setDateMess($dateMess) { $this->_dateMess = $dateMess; }
		public function setHeureMess($heureMess) { $this->_heureMess = $heureMess; }
		public function setDescMess($idBat) { $this->_descMess = $descMess; }
       
	}
?>
	