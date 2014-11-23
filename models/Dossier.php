<?php
	namespace Benedict ;  
	use CustomPost ;

	class Dossier extends CustomPost {
		static $name = "dossier" ;
		static $creation_fields = array( 
			'label' => 'dossier','description' => 'A project Dossier.',
			'public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post', 'map_meta_cap' => true, 
			'hierarchical' => false,'rewrite' => array('slug' => 'private'),'query_var' => true,
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

		static $belongs_to = 'pedia';
		static $has = array('evidence');

		static $fields = array(
			'calendar' => array('type' => 'text', 'label' => 'Calendar'),
			'contact' => array('type' => 'post_type', 'label' => 'Contact', 'post_type' => 'pedia', 'filter' => 
				array('meta_key' => '_revision_post_format', 'meta_value' => 'person', 'post_status' => 'all')
			),
			'folder' => array('type' => 'text', 'label' => 'Google Drive Folder'),
			'pedia' => array('type' => 'post_type', 'label' => 'Project', 'post_type' => 'pedia', 'filter' => 
				array('meta_key' => '_revision_post_format', 'meta_value' => 'project', 'post_status' => 'all')
			),

			'status' => array('type' => 'set', 'label' => 'Status', 'values' => array(
				'-4' => 'Aborted',
				'-3' => 'Prospective',
				'-2' => 'Unitiated',
				'-1' => 'Paused',
				'0' => 'Underway',
				'1' => 'Closed',
				'2' => 'Finished',
			), 'default' => '-2'),
			'days_paused' => array('type' => 'integer', 'label' => 'Days Paused', 'default' => 0),
			
			'evidences' => array('type' => 'multiple', 'label' => 'Evidences', 'post_type' => 'evidence',
				'of' => 'post_type'
			),

		) ;

		static $editable_by = array(
			' ' => array('fields' => array('pedia', 'status', 'days_paused', 'calendar', 'folder', 'contact'), 'placing' => 'normal'),
			'Evidences' => array('fields' => array('evidences'), 'placing' => 'normal')
		);

		static $absent_actions = array('quick-edit');

		static $collumns = array(
			
		);

		public function status(){
			return static::$fields['status']['values'][$this->status];
		}

		public function evidences(){
			$returnable = array();
			foreach ($this->evidences as $evidence) {
				$evidence = new \Benedict\Evidence($evidence);
				$returnable[]= $evidence;
			}
			return array_reverse($returnable);
		}

	}

 ?>