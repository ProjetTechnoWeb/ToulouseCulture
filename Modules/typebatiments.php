<?php 
// définition de la classe TypeBatiment
class TypeBatiment {   
		private $_idTypeBatiment;
		private $_typeBatiment; 
        
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['IDTYPEBAT'])) { $this->_idTypeBatiment = $donnees['IDTYPEBAT']; }
			if (isset($donnees['TYPEBAT'])) { $this->_typeBatiment = $donnees['TYPEBAT']; }
		}	
		
        // GETTERS //
        public function idTypeBatiment() { return $this->_idTypeBatiment;}
		public function typeBatiment() { return $this->_typeBatiment;}
		
		
		// SETTERS //
        public function setIdTypeBatiment($idTypeBatiment) { $this->_idTypeBatiment = $idTypeBatiment; }
		public function setTypeBatiment($typeBatiment) { $this->_typeBatiment = $typeBatiment; }
       
	}
?>
	