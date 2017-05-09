<?php 
// définition de la classe Manifestation
class Manifestation {   
		private $_idManif;
		private $_idBat; 
		private $_heureManif;
		private $_dateManifDebut;
		private $_dateManifFin;
		private $_nomManif;
		private $_descripManif;
        private $_image;

        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['ID_MANIF'])) { $this->_idManif = $donnees['ID_MANIF']; }
			if (isset($donnees['ID_BAT'])) { $this->_idBat = $donnees['ID_BAT']; }
			if (isset($donnees['HEUREMANIF'])) { $this->_heureManif = $donnees['HEUREMANIFManif']; }
			if (isset($donnees['DATEMANIFDEBUT'])) { $this->_dateManifDebut = $donnees['DATEMANIFDEBUT']; }
			if (isset($donnees['DATEMANIFFIN'])) { $this->_dateManifFin = $donnees['DATEMANIFFIN']; }
			if (isset($donnees['NOMMANIF'])) { $this->_nomManif = $donnees['NOMMANIF']; }
			if (isset($donnees['DESCRIPMANIF'])) { $this->_descripManif = $donnees['DESCRIPMANIF']; }
			if (isset($donnees['IMAGE'])) { $this->_image = $donnees['IMAGE']; }

		}	
		
        // GETTERS //
        public function idManif() { return $this->_idManif;}
		public function idBat() { return $this->_idBat;}
		public function heureManif() { return $this->_heureManif;}
		public function dateManifDebut() { return $this->_dateManifDebut;}
		public function dateManifFin() { return $this->_dateManifFin;}
		public function nomManif() { return $this->_nomManif;}
		public function descripManif() { return $this->_descripManif;}
		public function image() { return $this->_image;}

		
		// SETTERS //
        public function setIdManif($idManif) { $this->_idManif = $idManif; }
		public function setIdBat($idBat) { $this->_idBat = $idBat; }
		public function setHeureManif($heureManif) { $this->_heureManif = $heureManif; }
		public function setDateManifDebut($dateManifDebut) { $this->_dateManifDebut = $dateManifDebut; }
		public function setDateManifFin($dateManifFin) { $this->_dateManifFin = $dateManifFin; }
		public function setNomManif($nomManif) { $this->_nomManif = $nomManif; }
		public function setDescripManif($descripManif) { $this->_descripManif = $descripManif; }
		public function setImage($image) { $this->_image = $image; }
	}
?>