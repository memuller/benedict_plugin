<?php
	namespace Benedict ;  
	use CustomPost, DateTime, DateInterval ;

	class Post extends CustomPost {

		static $name = "post" ;
		static $icon = '\f157' ;

		static $fields = array( 
			'featured' => array('label' => 'Destaque?', 'type' => 'boolean', 'default' => false,
				'description' => 'no slider da página inicial.'),
			'image_header' => array('label' => 'Usa imagem no cabeçalho?', 'type' => 'boolean', 'default' => false,
				'description' => 'a mesma utilizada como thumbnail.'),
			'claim' => array('label' => 'Chamada', 'type' => 'text', 'description' => 'usada no cabeçalho e slider de destaques.')
		) ;

		static $editable_by = array(
			'Apresentação' => array('fields' => array('featured', 'image_header'), 'placing' => 'side'),
			'Visualização' => array('fields' => array('claim'), 'placing' => 'normal')
		);

		static $collumns = array(
			'featured' => 'Destaque?'
		);

		public function featured(){
			return $this->featured ? 'Sim' : 'Não' ;
		}

		static function build(){
			$class = get_called_class();
			parent::build();
		}
	}

 ?>