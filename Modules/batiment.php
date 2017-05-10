<?php 
// définition de la classe Batiment
class Batiment {   
		private $_idBat;
		private $_idQuartier;
		private $_idTypeBat;
		private $_longitude;
		private $_latitude ;
		private $_nom;
		private $_descrCourt;
		private $_descrLong;
		private $_ouverture;
		private $_fermeture;
        
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['IDBAT'])) { $this->_idBat = $donnees['IDBAT']; }
			if (isset($donnees['IDQUARTIER'])) { $this->_idQuartier = $donnees['IDQUARTIER']; }
			if (isset($donnees['IDTYPEBAT'])) { $this->_idTypeBat = $donnees['IDTYPEBAT']; }
			if (isset($donnees['LONGITUDE'])) { $this->_longitude = $donnees['LONGITUDE']; }
			if (isset($donnees['LATITUDE'])) { $this->_latitude = $donnees['LATITUDE']; }
			if (isset($donnees['NOM'])) { $this->_nom = $donnees['NOM']; }
			if (isset($donnees['DESCPRCOURT'])) { $this->_descrCourt = $donnees['DESCPRCOURT']; }
			if (isset($donnees['DESCPRLONG'])) { $this->_DescrLongt = $donnees['DESCPRLONG']; }
			if (isset($donnees['OUVERTURE'])) { $this->_ouverture = $donnees['OUVERTURE']; }
			if (isset($donnees['FERMETURE'])) { $this->_fermeture = $donnees['FERMETURE']; }
		}	
		
        // GETTERS //
        public function idBat() { return $this->_idBat;}
		public function idQuartier() { return $this->_idQuartier;}
		public function idTypeBat() { return $this->_idTypeBat;}
		public function longitude() { return $this->_longitude;}
		public function latitude() { return $this->_latitude;}
		public function nom() { return $this->_nom;}
		public function descrCourt() { return $this->_descrCourt;}
		public function descrLong() { return $this->_descrLong;}
		public function ouverture() { return $this->_ouverture;}
		public function fermeture() { return $this->_fermeture;}

		// SETTERS //
        public function setIdBat($idBat) { $this->_idBat = $idBat; }
		public function setIdQuartier($idQuartier) { $this->_idQuartier = $idQuartier; }
		public function setIdTypeBat($idTypeBat) { $this->_idTypeBat = $idTypeBat; }
		public function setLongitude($longitude) { $this->_longitude = $longitude; }
		public function setLatitude($latitude) { $this->_latitude = $latitude; }
		public function setNom($nom) { $this->_nom = $nom; }
		public function setDescrCourt($descrCourt) { $this->_descrCourt = $descrCourt; }
		public function setDescrLong($descrLong) { $this->_descrLong = $descrLong; }
		public function setOuverture($ouverture) { $this->_ouverture = $ouverture; }
		public function setFermeture($fermeture) { $this->_fermeture = $fermeture; }
       
	}
?>
	