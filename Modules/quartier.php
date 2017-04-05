<?php 
// définition de la classe Quartier
class Quartier {   
	private $idQuartier;
    private $longitude;
    private $latitude;
    private $polygone;
    private $nom;
    private $nbScolarise;
    private $nbMenage;
    private $populationTotal;
    private $nbPersActivite;
    private $nbLogementQuartier;
        
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idQuartier'])) { $this->_idQuartier = $donnees['idQuartier']; }
			if (isset($donnees['longitude'])) { $this->_longitude = $donnees['longitude']; }
			if (isset($donnees['latitude'])) { $this->_latitude = $donnees['latitude']; }
			if (isset($donnees['polygone'])) { $this->_polygone = $donnees['polygone']; }
			if (isset($donnees['nom'])) { $this->_nom = $donnees['nom']; }
			if (isset($donnees['nbScolarise'])) { $this->_nbScolarise = $donnees['nbScolarise']; }
			if (isset($donnees['nbMenage'])) { $this->_nbMenage = $donnees['nbMenage']; }
			if (isset($donnees['populationTotal'])) { $this->_populationTotal = $donnees['populationTotal']; }
			if (isset($donnees['nbPersActivite'])) { $this->_nbPersActivite = $donnees['nbPersActivite']; }
			if (isset($donnees['nbLogementQuartier'])) { $this->_nbLogementQuartier = $donnees['nbLogementQuartier']; }
		}	
		
        // GETTERS //
        public function idQuartier() { return $this->_idQuartier;}
		public function longitude() { return $this->_longitude;}
		public function latitude() { return $this->_latitude;}
		public function polygone() { return $this->_polygone;}
		public function nom() { return $this->_nom;}
		public function nbScolarise() { return $this->_nbScolarise;}
		public function nbMenage() { return $this->_nbMenage;}
		public function populationTotal() { return $this->_populationTotal;}
		public function nbPersActivite() { return $this->_nbPersActivite;}
		public function nbLogementQuartier() { return $this->_nbLogementQuartier;}
		
		
		// SETTERS //
        public function setIdQuartier($idQuartier) { $this->_idQuartier = $idQuartier; }
		public function setLongitude($longitude) { $this->_longitude = $longitude; }
		public function setLatitude($latitude) { $this->_latitude = $latitude; }
		public function setPolygone($polygone) { $this->_polygone = $polygone; }
		public function setNom($nom) { $this->_nom = $nom; }
		public function setNbScolarise($nbScolarise) { $this->_nbScolarise = $nbScolarise; }
		public function setNbMenage($nbMenage) { $this->_nbMenage = $nbMenage; }
		public function setPopulationTotal($populationTotal) { $this->_populationTotal = $populationTotal; }
		public function setNbPersActivite($nbPersActivite) { $this->_nbPersActivite = $nbPersActivite; }
		public function setNbLogementQuartier($nbLogementQuartier) { $this->_nbLogementQuartier = $nbLogementQuartier; }
       
	}
?>
	