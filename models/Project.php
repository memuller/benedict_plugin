<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Project extends CustomPostFormat {
		static $name = "project" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'Projects',
			'singular_name' => 'Project',
		);

		static $fields = array(
			'motivator' => array('label' => 'Tipo', 'type' => 'list', 'values' => array('Comercial', 'Acadêmico', 'Experimental')),
		) ;

	}

 ?>