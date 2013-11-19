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
			'media' => array('label' => 'Tipo', 'type' => 'list', 'values' => array('Impresso', 'Site', 'Vídeo', 'Filme', 'Autor')),
			'url' => array('label' => 'URL'),
			'citation_block' => array('label' => 'Citação', 'type' => 'text_area')
		) ;

	}

 ?>