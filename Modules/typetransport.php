<?php 
// définition de la classe TypeTransport
class TypeTransport {   
		private $idTypeTransport;  
		private $typeTransport; 
        
		
        // constructeur
        public function __construct(array $donnees) {
		// initialisation d'un batiment à partir d'un tableau de données
			if (isset($donnees['idTypeTransport'])) { $this->_idTypeTransport = $donnees['idTypeTransport']; }
			if (isset($donnees['typeTransport'])) { $this->_typeTransport = $donnees['typeTransport']; }
		}	
		
        // GETTERS //
        public function idTypeTransport() { return $this->_idTypeTransport;}
		public function typeTransport() { return $this->_typeTransport;}
		
		
		// SETTERS //
        public function setIdTypeTransport($idTypeTransport) { $this->_idTypeTransport = $idTypeTransport; }
		public function setTypeTransport($typeTransport) { $this->_typeTransport = $typeTransport; }
       
	}
?>
	