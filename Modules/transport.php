<?php 
// définition de la classe Transport
class Transport {   
        private $idArret;
	    private $idTypeTransport;
	    private $nom;
		private $ligne;
	    private $longitude;
	    private $latitude;
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idArret'])) { $this->_idArret = $donnees['idArret']; }
			if (isset($donnees['idTypeTransport'])) { $this->_idTypeTransport = $donnees['idTypeTransport']; }
			if (isset($donnees['nom'])) { $this->_nom = $donnees['nom']; }
			if (isset($donnees['ligne'])) { $this->_ligne = $donnees['ligne']; }
			if (isset($donnees['longitude'])) { $this->_longitude = $donnees['longitude']; }
			if (isset($donnees['latitude'])) { $this->_latitude = $donnees['latitude']; }
		}	
		
        // GETTERS //
        public function idArret() { return $this->_idArret;}
		public function idTypeTransport() { return $this->_idTypeTransport;}
		public function nom() { return $this->_nom;}
		public function ligne() { return $this->_ligne;}
		public function longitude() { return $this->_longitude;}
		public function latitude() { return $this->_latitude;}
		
		
		// SETTERS //
        public function setIdArret($idArret) { $this->_idArret = $idArret; }
		public function setIdTypeTransport($idTypeTransport) { $this->_idTypeTransport = $idTypeTransport; }
		public function setNom($nom) { $this->_nom = $nom; }
		public function setLigne($ligne) { $this->_ligne = $ligne; }
		public function setLongitude($longitude) { $this->_longitude = $longitude; }
		public function setLatitude($latitude) { $this->_latitude = $latitude; }
       
	}
?>
	