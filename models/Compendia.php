<?php
	namespace Benedict ;  
	use CustomTaxonomy, DateTime, DateInterval ;

	class Compendia extends CustomTaxonomy {

		static $name = "Compendia" ;
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
			'name' => 'Compendia',
			'singular_name' => 'Compendium',
			'search_items' => 'Search Compendia',
			'popular_items' => 'Most frequent Compendia',
			'all_items' => 'All Compendia',
			'parent_item' => 'Parent Compendia',
			'parent_item_colon' => 'Parent Compendia',
			'edit_item' => 'Edit Compendium',
			'update_item' => 'Save Compendium',
			'add_new_item' => 'Add new Compendium',
			'new_item_name' => 'New Compendium name'
		);

		static $fields = array( 
			
		) ;

		static function build(){
			$class = get_called_class();
			parent::build();
		}
	}

 ?>