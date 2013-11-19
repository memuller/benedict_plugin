<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Reference extends CustomPostFormat {
		static $name = "reference" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'References',
			'singular_name' => 'Reference',
		);

		static $fields = array(
			'type' => array('label' => 'Tipo', 'type' => 'array', 'values' => array('Impresso', 'Site', 'Vídeo', 'Filme', 'Autor')),
			'url' => array('label' => 'URL'),
			'citation_block' => array('label' => 'Citação', 'type' => 'text_area')
		) ;

	}

 ?>