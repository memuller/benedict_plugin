<?php
	namespace Benedict ;  
	use CustomPost ;

	class Pedia extends CustomPost {
		static $name = "pedia" ;
		static $creation_fields = array( 
			'label' => 'pedia','description' => 'An article for the Pedia.',
			'public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post', 'map_meta_cap' => true, 
			'hierarchical' => false,'rewrite' => array('slug' => 'pedia'),'query_var' => true,
			'supports' => array('custom-fields', 'title', 'thumbnail', 'editor'), 
			'has_archive' => true, 'taxonomies' => array('post_tag'),
			'menu_position' => 6
		) ;
		static $labels = array (
			'name' => 'Pedia',
			'singular_name' => 'Article',
			'menu_name' => 'Pedia',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new article',
			'edit' => 'Update',
			'edit_item' => 'Update article',
			'new_item' => 'Register article',
			'view' => 'View',
			'view_item' => 'View article'
		);
		static $icon = '\f118' ;
		static $tabs ; 
		static $fields = array(
			'icon' => array('type' => 'media', 'label' => 'Ícone', 'description' => 'usado em listas e widgets.'), 
			'featured' => array('label' => 'Destaque?', 'type' => 'boolean', 'default' => false,
				'description' => 'no slider da página inicial.'),
			'image_header' => array('label' => 'Usa imagem no cabeçalho?', 'type' => 'boolean', 'default' => false,
				'description' => 'a mesma utilizada como thumbnail.'),
			'claim' => array('label' => 'Chamada', 'type' => 'text', 'description' => 'usada no cabeçalho e slider de destaques.')
		) ;

		static $editable_by = array(
			'Apresentação' => array('fields' => array('featured', 'image_header'), 'placing' => 'side'),
			'Visualização' => array('fields' => array('claim', 'icon'), 'placing' => 'normal')
		);

		static $absent_actions = array('quick-edit');

		static $collumns = array(
			'type' => 'Tipo',
			'featured' => 'Destaque?'
		);

		public function featured(){
			return $this->featured ? 'Sim' : 'Não' ;
		}

		public function type(){
			_e("pedia-$this->post_format");
		}

		static $formats = array('term', 'tool', 'module', 'project', 'reference', 'person');


	}

 ?>