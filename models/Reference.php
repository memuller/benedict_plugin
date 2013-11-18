<?php
	namespace Benedict ;  
	use CustomPostFormat ;

	class Reference extends CustomPostFormat {
		static $name = "reference" ;
		static $for = 'pedia' ;

		static $labels = array (
			'name' => 'Referências',
			'singular_name' => 'Referência',
		);

		static $fields = array(
			'type' => array('label' => 'Tipo', 'type' => 'array', 'values' => array('Impresso', 'Site', 'Vídeo', 'Filme', 'Autor')),
			'url' => array('label' => 'URL'),
			'citation_block' => array('label' => 'Citação', 'type' => 'text_area')
		) ;

	}

 ?>