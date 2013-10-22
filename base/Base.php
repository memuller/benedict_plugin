<?php
	namespace Benedict ;  
	use BasePlugin ;

	class Plugin extends BasePlugin {

		static $db_version = 0.6 ;
		static $custom_posts = array('Post','Pedia', 'Folio');
		static $custom_post_formats = array('Person', 'Project', 'Reference', 'Module', 'Tool', 'Term');
		static $custom_users = array();
		static $custom_classes = array();
		static $custom_singles = array();
		static $custom_taxonomies = array();
		static $restricted_menus = array();

		static $roles = array(
		);

		static $absent_roles = array();

		static $migrations = array(
			'0.1' => 'sharedaddy_options'
		);

		static function migrate_sharedaddy_options(){
			update_option('jetpack_active_modules', array('vaultpress', 'sharedaddy', 'omnisearch'));
			update_option( 'sharing-services', array( 
				'visible' => array ( 'facebook', 'google-plus-1', 'twitter', 'pocket', 'pinterest', 'print' ), 
				'hidden' => array()
			));
			update_option( 'sharing-options', array(
				'global' => array(
					'button_style' => 'icon', 
					'sharing_label' => '',
					'open_links' => 'same',
					'show' => array('post', 'pedia'),
					'custom' => array()
				) 
			));
		}

		static function build(){
			parent::build();
			add_filter( 'got_rewrite', '__return_true', 999 );

			add_action('init', function(){
				register_taxonomy('category', array());
			});
		}
	}

 ?>