<?php
	namespace Benedict ;  
	use CustomPost ;

	class Evidence extends CustomPost {
		static $name = "evidence" ;
		static $creation_fields = array( 
			'label' => 'evidence','description' => 'Evidences of a Dossier.',
			'public' => true,'show_ui' => true,'show_in_menu' => 'edit.php?post_type=dossier',
			'capability_type' => 'post', 'map_meta_cap' => true, 
			'hierarchical' => false,'rewrite' => false,'query_var' => true,
			'supports' => array('custom-fields', 'title', 'thumbnail', 'editor'), 
			'has_archive' => false, 'taxonomies' => array(),
			'menu_position' => 6,
		) ;
		static $labels = array (
			'name' => 'Evidences',
			'singular_name' => 'Evidence',
			'menu_name' => 'Evidences',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new evidence',
			'edit' => 'Update',
			'edit_item' => 'Update evidence',
			'new_item' => 'Register evidence',
			'view' => 'View',
			'view_item' => 'View evidence'
		);
		static $tabs ; 
		static $fields = array(

		) ;

		static $editable_by = array(
			
		);

		static $absent_actions = array('quick-edit');

		static $collumns = array(
			
		);

	}

 ?>