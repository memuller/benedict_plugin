<?php
	namespace Benedict ;  
	use CustomTaxonomy, DateTime, DateInterval ;

	class Folio extends CustomTaxonomy {

		static $name = "Folio" ;
		static $applies_to = array('post', 'pedia');
		static $settings = array( 
			'hierarchical' => false,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'compendium'),
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count'
		);
		static $labels = array(
			'name' => 'Folios',
			'singular_name' => 'Folio',
			'search_items' => 'Search Folios',
			'popular_items' => 'Most frequent Folios',
			'all_items' => 'All Folios',
			'parent_item' => 'Parent Folio',
			'parent_item_colon' => 'Parent Folio',
			'edit_item' => 'Edit Folio',
			'update_item' => 'Save Folio',
			'add_new_item' => 'Add new Folio',
			'new_item_name' => 'New Folio title'
		);

		static $fields = array( 
			
		) ;

		static function build(){
			$class = get_called_class();
			parent::build();
		}
	}

 ?>