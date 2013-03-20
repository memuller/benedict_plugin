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
			'has_archive' => true, 'taxonomies' => array('post_tag', 'compendia'),
			'labels' => array (
				'name' => 'Pedia',
				'singular_name' => 'Article',
				'menu_name' => 'Pedia',
				'add_new' => 'Add new',
				'add_new_item' => 'Add new spot',
				'edit' => 'Update',
				'edit_item' => 'Update spot',
				'new_item' => 'Register spot',
				'view' => 'View',
				'view_item' => 'View spot')
		) ;

		static $fields = array(
			
		) ;

		static $absent_actions = array('quick-edit');


	}

 ?>