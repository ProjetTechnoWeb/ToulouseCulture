<?php 
// définition de la classe Quartier
class Quartier {   
	private $_idQuartier;
    private $_longitude;
    private $_latitude;
    private $_polygone;
    private $_nom;
    private $_nbScolarise;
    private $_nbMenage;
    private $_populationTotal;
    private $_nbPersActivite;
    private $_nbLogementQuartier;
        
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['ID_QUARTIER'])) { $this->_idQuartier = $donnees['ID_QUARTIER']; }
			if (isset($donnees['LONGITUDE'])) { $this->_longitude = $donnees['LONGITUDE']; }
			if (isset($donnees['LATITUDE'])) { $this->_latitude = $donnees['LATITUDE']; }
			if (isset($donnees['POLYGONE'])) { $this->_polygone = $donnees['POLYGONE']; }
			if (isset($donnees['NOM'])) { $this->_nom = $donnees['NOM']; }
			if (isset($donnees['NBRSCOLARISES'])) { $this->_nbScolarise = $donnees['NBRSCOLARISES']; }
			if (isset($donnees['NBRMENAGES'])) { $this->_nbMenage = $donnees['NBRMENAGES']; }
			if (isset($donnees['POPULATIONTOTALE'])) { $this->_populationTotal = $donnees['POPULATIONTOTALE']; }
			if (isset($donnees['NBRPERSACTIVES'])) { $this->_nbPersActivite = $donnees['NBRPERSACTIVES']; }
			if (isset($donnees['NBRLOGEMENTSQUARTIER'])) { $this->_nbLogementQuartier = $donnees['NBRLOGEMENTSQUARTIER']; }
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
	