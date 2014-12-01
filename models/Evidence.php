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
			'supports' => array('custom-fields', 'title'), 
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

		static $belongs_to = 'dossier'; 
		static $fields = array(
			'dossier' => array('label' => 'Dossier', 'type' => 'post_type', 'post_type' => 'dossier'),
			'pedia' => array('label' => 'Tool', 'type' => 'post_type', 'post_type' => 'pedia', 'filter' => 
				array('meta_key' => '_revision_post_format', 'meta_value' => 'tool')
			),
			'status' => array('label' => 'Status', 'type' => 'set', 'values' => array(
				'-2' => 'Pendente',
				'-1' => 'Pausada',
				'0' => 'Em andamento',
				'1' => 'Concluída',
			)),
			'url' => array('label' => 'URL', 'type' => 'url'),
			'done_at' => array('label' => 'Done at', 'type' => 'date')
		) ;

		static $editable_by = array(
			'Metadata' => array('fields' => array('dossier', 'pedia', 'status', 'done_at')),
			'Evidence' => array('fields' => array('url'), 'placing' => 'normal'),
		);

		static $absent_actions = array('quick-edit');

		static $collumns = array(
			
		);

		public function tool(){
			return new \Benedict\Pedia($this->pedia);
		}

		public function status(){
			return static::$fields['status']['values'][$this->status];
		}

		static function build(){
			$class = get_called_class();
			parent::build();
			add_action('benedict-evidence-save', function($post_id, $object){
				$evidence = new \Benedict\Evidence($post_id);
				$dossier = $evidence->parent();
				$evidences = $dossier->evidences;
				if(!in_array($post_id, $evidences)){
					$evidences[]=$post_id;
					update_post_meta($dossier->ID, 'evidences', $evidences);
				}
			},10, 2);
		}

	}

 ?>