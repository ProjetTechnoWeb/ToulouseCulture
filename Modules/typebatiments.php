<?php 
// définition de la classe TypeBatiment
class TypeBatiment {   
		private $idTypeBatiment;
		private $typeBatiment; 
        
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idTypeBatiment'])) { $this->_idTypeBatiment = $donnees['idTypeBatiment']; }
			if (isset($donnees['typeBatiment'])) { $this->_typeBatiment = $donnees['typeBatiment']; }
		}	
		
        // GETTERS //
        public function idTypeBatiment() { return $this->_idTypeBatiment;}
		public function typeBatiment() { return $this->_typeBatiment;}
		
		
		// SETTERS //
        public function setIdTypeBatiment($idTypeBatiment) { $this->_idTypeBatiment = $idTypeBatiment; }
		public function setTypeBatiment($typeBatiment) { $this->_typeBatiment = $typeBatiment; }
       
	}
?>
	