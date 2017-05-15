<?php 
// définition de la classe Message
class Message {   
		private $_idMessage;
		private $_idBat; 
		private	$_dateMess;
		private $_heureMess;
		private $_descMess;

        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['IDMESSAGE'])) { $this->_idMessage = $donnees['IDMESSAGE']; }
			if (isset($donnees['IDBAT'])) { $this->_idBat = $donnees['IDBAT']; }
			if (isset($donnees['DATEMESS'])) { $this->_dateMess = $donnees['DATEMESS']; }
			if (isset($donnees['HEUREMESS'])) { $this->_heureMess = $donnees['HEUREMESS']; }
			if (isset($donnees['DESCMESS'])) { $this->_descMess = $donnees['DESCMESS']; }
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
	