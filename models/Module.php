<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Module extends CustomPostFormat {
		static $name = "module" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'Modules',
			'singular_name' => 'Module',
		);

		static $fields = array(
			'phase' => array('label' => 'Fase', 'type' => 'list', 'values' => array('Coletar', 'Moldar', 'Evidenciar')),
			'cost' => array('label' => 'Custo',  'type' => 'integer')
		) ;

	}

 ?>