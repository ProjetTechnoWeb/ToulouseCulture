<?php 
// définition de la classe Manifestation
class Manifestation {   
		private $idManif;
		private $idBat; 
		private $heureManif;
		private $dateManif;
		private $nomManif;
		private $descripManif;
        
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idManif'])) { $this->_idManif = $donnees['idManif']; }
			if (isset($donnees['idBat'])) { $this->_idBat = $donnees['idBat']; }
			if (isset($donnees['heureManif'])) { $this->_heureManif = $donnees['heureManif']; }
			if (isset($donnees['dateManif'])) { $this->_dateManif = $donnees['dateManif']; }
			if (isset($donnees['nomManif'])) { $this->_nomManif = $donnees['nomManif']; }
			if (isset($donnees['descripManif'])) { $this->_descripManif = $donnees['descripManif']; }
		}	
		
        // GETTERS //
        public function idManif() { return $this->_idManif;}
		public function idBat() { return $this->_idBat;}
		public function heureManif() { return $this->_heureManif;}
		public function dateManif() { return $this->_dateManif;}
		public function nomManif() { return $this->_nomManif;}
		public function descripManif() { return $this->_descripManif;}
		
		
		// SETTERS //
        public function setIdManif($idManif) { $this->_idManif = $idBat; }
		public function setIdBat($idBat) { $this->_idBat = $idBat; }
		public function setHeureManif($heureManif) { $this->_heureManif = $heureManif; }
		public function setDateManif($dateManif) { $this->_dateManif = $dateManif; }
		public function setNomManif($nomManif) { $this->_nomManif = $nomManif; }
		public function setDescripManif($descripManif) { $this->_descripManif = $descripManif; }
       
	}
?>