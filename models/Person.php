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
			'position' => array('label' => "Título"),
			'place' => array('label' => 'Local de atuação'),
			'works_at' => array('label' => 'Trabalha em'),
			'facebook' => array('label' => 'Perfil no Facebook'),
			'email' => array('label' => 'Email')
		) ;

	}

 ?>