<?php
	namespace Benedict ;  
	use CustomPost, DateTime, DateInterval ;

	class Folio extends CustomPost {

		static $name = "folio" ;
		static $creation_fields = array( 
			'label' => 'folio','description' => 'A folio of items.',
			'public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post', 'map_meta_cap' => true, 
			'hierarchical' => false,'rewrite' => array('slug' => 'folio'),'query_var' => true,
			'supports' => array('custom-fields', 'title', 'thumbnail', 'editor'), 
			'has_archive' => true, 'taxonomies' => array(), 'menu_position' => 7
		) ;
		static $labels = array (
			'name' => 'Folios',
			'singular_name' => 'Folio',
			'menu_name' => 'Folio',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new folio',
			'edit' => 'Update',
			'edit_item' => 'Update folio',
			'new_item' => 'Register folio',
			'view' => 'View',
			'view_item' => 'View folio'
		);

		static $icon = '\f322' ;

		static $fields = array( 
		) ;

		static $editable_by = array(
		);

		static function build(){
			$class = get_called_class();
			parent::build();

			add_action('p2p_init', function(){
				p2p_register_connection_type(array(
					'name' => 'items_to_folio',
					'from' => array('pedia', 'post'),
					'to' => 'folio',
					'sortable' => 'any',
					'title' => array(
						'from' => 'Folio',
						'to' => 'Conteúdo'
					),
					'admin_box' => array(
						'show' => 'to',
						'context' => 'side'
					),
					'from_labels' => array(
						'singular_name' => 'Conteúdo',
						'search_items' => 'Buscar Conteúdo',
						'not_found' => 'Nada encontrado',
						'create' => 'Incluir conteúdo'
					)
				));
			});
		}

		static function current($post = null){
			if(!$post){ global $post ; }
			$folios = get_posts(array(
				'connected_type' => 'items_to_folio',
				'connected_items' => $post,
				'nopaging' => true, 'suppress_filters' => false 
			)); 
			if(empty($folios)) return false ; 
			return array_map(function($folio){ return new \Benedict\Folio($folio); }, $folios);
		}

		public function items(){
			$posts = get_posts(array(
				'connected_type' => 'items_to_folio',
				'connected_items' => $this->base,
				'nopaging' => true, 'suppress_filters' => false,
				'post_type' => 'any'
			));
			$posts =  array_map(function($post){
				$class = '\Benedict\\'. ucfirst($post->post_type) ;
				return new $class($post) ;
			}, $posts);

			return $posts ;
		}
	}

 ?>