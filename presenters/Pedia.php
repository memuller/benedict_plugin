<?php  
	namespace Benedict\Presenters ;
	use Presenter ; 

	class Pedia extends Presenter {

		static $actions = array(
		);

		static function build(){
			parent::build();
			static::filter();
			add_filter('the_content', function($content){
				preg_match_all('/\[\[([^\]]+)\]\]/', $content, $matches);
				if(empty($matches)) return $content ;
				
				$links = array();
				foreach( $matches[1] as $keyword ) {
					$links[$keyword] = current($matches[0]);
					next($matches[0]);
				}

				foreach ($links as $link => $match) {
					list($link, $title) = split('\|', $link, 2);
					if(!$title) $title = $link ;
					$post = get_page_by_title( $link, OBJECT, 'pedia' );
					if($post){
						$replace = sprintf("<a class='pedia' href='%s'>%s</a>", get_permalink($post->ID), $title);
					} else {
						$replace = $title ; 
					}
					$content = str_replace($match, $replace, $content);
				}

				return $content ;
			});
		}

		static function filter(){
			add_action('pre_get_posts', function($query){
				if(!is_admin() && $query->is_main_query() && is_archive() && $query->query['post_type'] == 'pedia'){
					global $active ;
					$active = isset($query->query['filter']) ? $query->query['filter'] : 'term' ; 
					$query->set('meta_key', '_revision_post_format');
					$query->set('meta_value', $active);
				}

				return $query;
			});

		}
	}
?>