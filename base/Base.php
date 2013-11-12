<?php
	namespace Benedict ;  
	use BasePlugin ;

	class Plugin extends BasePlugin {

		static $db_version = 0.6 ;
		static $custom_posts = array('Post','Pedia', 'Folio');
		static $custom_post_formats = array('Person', 'Project', 'Reference', 'Module', 'Tool', 'Term');
		static $custom_users = array('Crafter');
		static $custom_classes = array();
		static $custom_singles = array();
		static $custom_taxonomies = array();
		static $restricted_menus = array();
		static $presenters = array('Pedia');

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

			add_filter('upload_mimes', function ( $existing_mimes=array() ) { 
				$existing_mimes['svg'] = 'mime/type'; 
				return $existing_mimes; 
			});
			
			add_action('init', function(){
				if(function_exists('sharing_display')){
					remove_filter('the_content', 'sharing_display', 19);
					remove_filter('the_excerpt', 'sharing_display', 19);
				}
			}, 11);

		}
	}

 ?>