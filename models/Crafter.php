<?php
	namespace Benedict;
	use CustomUser, DateTime ;

	class Crafter extends CustomUser  {

		static $name = 'crafter' ;
		static $label = 'Crafter';
		static $inherits_from = 'editor';
		static $capabilities = array();
		static $allow_admin = true ;

		static $fields = array(
			'person' => array('type' => 'post_type', 'post_type' => 'pedia', 'label' => 'Artigo na Pedia', 
				'description' => 'entrada na Pedia correspondente ao crafter.')
		);

		static $required_for = array();

		static function auth(){
		
		}

		static function build(){
			parent::build();
		}

		public function age(){
			if(!($this->birthdate))  
				return false ;
			$now = new DateTime();
			$birthdate = new DateTime($this->birthdate);
			$diff = $now->diff($birthdate);
			return $diff->y ;
		}
	}

 ?>