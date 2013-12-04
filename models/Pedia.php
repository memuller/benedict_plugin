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
			'Listas' => array('fields' => array('featured', 'show_image'), 'placing' => 'side'),
			'Visualização' => array('fields' => array('claim', 'image_header'), 'placing' => 'normal')
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

		public function connected($object = true){
			$posts = get_posts(array(
				'connected_type' => 'pedia_to_pedia',
				'connected_items' => $this->base,
				'nopaging' => true, 'suppress_filters' => false,
				'post_type' => 'any'
			));
			if($object){
				$posts = array_map(function($post){
					return new \Benedict\Pedia($post);
				}, $posts);
			}
			return $posts ;
		}

		public function modules(){
			return $this->connected();
		}

		static function build(){
			parent::build();
			add_action('p2p_init', function(){
				p2p_register_connection_type(array(
					'name' => 'pedia_to_pedia',
					'from' => 'pedia',
					'to' => 'pedia',
					'sortable' => 'any',
					'title' => array(
						'to' => 'Involved modules'
					),
					'admin_box' => array(
						'show' => 'from',
						'context' => 'side'
					),
					'to_labels' => array(
						'singular_name' => 'Item',
						'search_items' => 'Buscar',
						'not_found' => 'Nada encontrado',
						'create' => 'Incluir'
					)
				));
			});

			add_filter('p2p_connectable_args', function($args, $ctype, $post){

				if('pedia_to_pedia' == $ctype->name){
					$format = get_post_meta( $post->ID, '_revision_post_format', true );
					if('project' == $format){
						$args['meta_key'] = '_revision_post_format';
						$args['meta_value'] = 'module' ;
					}
				}
				return $args; 
			}, 10,3);
		}
	}

 ?>