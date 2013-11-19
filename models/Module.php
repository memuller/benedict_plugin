<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Module extends CustomPostFormat {
		static $name = "module" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'Módulos',
			'singular_name' => 'Módulo',
		);

		static $fields = array(
			'phase' => array('label' => 'Fase', 'type' => 'array', 'values' => array('Coletar', 'Moldar', 'Evidenciar')),
			'cost' => array('label' => 'Custo',  'type' => 'integer')
		) ;

	}

 ?>