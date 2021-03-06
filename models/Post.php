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
			'claim' => array('label' => 'Chamada', 'type' => 'text', 'description' => 'usada no cabeçalho e slider de destaques.'),
			'show_image' => array('label' => 'Exibir imagem?', 'type' => 'boolean', 'default' => true, 
				'description' => 'exibe imagem destacada (se houver) em listagens de posts.')
		) ;

		static $editable_by = array(
			'Listas' => array('fields' => array('featured', 'show_image'), 'placing' => 'side'),
			'Visualização' => array('fields' => array('claim', 'image_header'), 'placing' => 'normal')
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