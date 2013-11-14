<?php 
	namespace Benedict ;
	use Translation as Translations ;
	class Translation extends Translations {
		static $texts = array(
			'Main' => array(
				'students' => array('plural form of the student subscription', 'students'),
				'professionals' => array('plural form of the professional subscriptions', 'professionals'),
				'corporate' => array('plural form of the corporate subscription', 'corporate'),
			),
			'Pedia' => array(
				'person' => array('', 'pessoa'),
				'project' => array('', 'projeto'),
				'term' => array('', 'termo'),
				'reference' => array('', 'referência'),
				'module' => array('', 'módulo'),
				'tool' => array('', 'ferramenta')
			)
		);
		static function build(){
			static::$creation_fields['labels'] =  array (
				'name' => 'Textos',
				'singular_name' => 'Texto',
				'menu_name' => 'Textos',
				'add_new' => 'Adicionar novo idioma',
				'add_new_item' => 'Adicionar Idioma',
				'edit' => 'Atualizar',
				'edit_item' => 'Atualizar textos',
				'new_item' => 'Registrar idioma',
				'view' => 'Ver',
				'view_item' => 'Ver textos'
			);
			parent::build();
			add_action('manage_edit-translation_columns', function($columns){
				foreach (array('views') as $column) {
					unset($columns[$column]) ;
				}
				return $columns ;
			});
		}
	}
 ?>