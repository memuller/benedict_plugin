<?php  
	namespace Benedict\Presenters ;
	use Presenter ; 

	class Pedia extends Presenter {

		static function build(){
			parent::build();

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
	}
?>