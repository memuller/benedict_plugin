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
			'has_archive' => true, 'taxonomies' => array('post_tag')
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
		static $fields = array() ;

		static $formats = array('term', 'tool', 'module', 'project', 'reference', 'person');

		static $absent_actions = array('quick-edit');


	}

 ?>