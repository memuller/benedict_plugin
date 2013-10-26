<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Person extends CustomPostFormat {
		static $name = "person" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'People',
			'singular_name' => 'Person',
		);

		static $fields = array(
			'full_name' => array('label' => "Nome completo"),
			'place' => array('label' => 'Local de atuação'),
			'facebook' => array('label' => 'Perfil no Facebook')
		) ;

	}

 ?>