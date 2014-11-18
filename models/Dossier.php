<?php
	namespace Benedict ;  
	use CustomPost ;

	class Dossier extends CustomPost {
		static $name = "dossier" ;
		static $creation_fields = array( 
			'label' => 'dossier','description' => 'A project Dossier.',
			'public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post', 'map_meta_cap' => true, 
			'hierarchical' => false,'rewrite' => array('slug' => 'dossier'),'query_var' => true,
			'supports' => array('custom-fields', 'title', 'thumbnail', 'editor'), 
			'has_archive' => false, 'taxonomies' => array(),
			'menu_position' => 6
		) ;
		static $labels = array (
			'name' => 'Dossier',
			'singular_name' => 'Dossier',
			'menu_name' => 'Dossier',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new dossier',
			'edit' => 'Update',
			'edit_item' => 'Update dossier',
			'new_item' => 'Register dossier',
			'view' => 'View',
			'view_item' => 'View dossier'
		);
		static $icon = '\f480' ;
		static $tabs ;



		static $editable_by = array(
			
		);

		static $absent_actions = array('quick-edit');

		static $collumns = array(
			
		);

	}

 ?>