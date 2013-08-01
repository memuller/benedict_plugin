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
			'full_name' => array('type' => 'string', 'label' => "Full name", 'description' => "Person's full name")
		) ;

	}

 ?>