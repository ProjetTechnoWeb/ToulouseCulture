<?php 
// définition de la classe Dessert
class Dessert {   
		private $idBat;
		private $idArret; 

		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idBat'])) { $this->_idBat = $donnees['idBat']; }
			if (isset($donnees['idArret'])) { $this->_idArret = $donnees['idArret']; }
		}	
		
        // GETTERS //
        public function idBat() { return $this->_idBat;}
		public function idArret() { return $this->_idArret;}
		
		
		// SETTERS //
        public function setIdBat($idBat) { $this->_idBat = $idBat; }
		public function setIdArret($idArret) { $this->_idArret = $idArret; }
       
	}
?>
	