<?php
	namespace Benedict ;  
	use BasePlugin ;

	class Plugin extends BasePlugin {

		static $db_version = 0.2 ;
		static $custom_posts = array('Pedia', 'Folio');
		static $custom_post_formats = array('Person', 'Project', 'Reference', 'Module', 'Tool', 'Term');
		static $custom_users = array();
		static $custom_classes = array();
		static $custom_singles = array();
		static $custom_taxonomies = array();
		static $restricted_menus = array();

		static $roles = array(
		);

		static $absent_roles = array();

		static function build(){
			parent::build();
			add_filter( 'got_rewrite', '__return_true', 999 );

			add_action('init', function(){
				register_taxonomy('category', array());
			});
		}
	}

 ?>