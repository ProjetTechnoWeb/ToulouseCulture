<?php 
// définition de la classe Batiment
class Batiment {   
		private $idBat;
		private $idQuartier;
		private $idTypeBat;
		private $longitude;
		private $latitude ;
		private $nom;
		private $descrCourt;
		private $descrLong;
		private $ouverture;
		private $fermeture;
        
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idBat'])) { $this->_idBat = $donnees['idBat']; }
			if (isset($donnees['idQuartier'])) { $this->_idQuartier = $donnees['idQuartier']; }
			if (isset($donnees['idTypeBat'])) { $this->_idTypeBat = $donnees['idTypeBat']; }
			if (isset($donnees['longitude'])) { $this->_longitude = $donnees['longitude']; }
			if (isset($donnees['latitude'])) { $this->_latitude = $donnees['latitude']; }
			if (isset($donnees['nom'])) { $this->_nom = $donnees['nom']; }
			if (isset($donnees['descrCourt'])) { $this->_descrCourt = $donnees['descrCourt']; }
			if (isset($donnees['DescrLong'])) { $this->_DescrLongt = $donnees['descrLong']; }
			if (isset($donnees['ouverture'])) { $this->_ouverture = $donnees['ouverture']; }
			if (isset($donnees['fermeture'])) { $this->_fermeture = $donnees['fermeture']; }
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
	