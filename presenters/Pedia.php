<?php  
	namespace Benedict\Presenters ;
	use Presenter ; 

	class Pedia extends Presenter {

		static $actions = array(
		);

		static function private_projects($fields=array()){
			global $wpdb, $wp_query;
			if( is_singular() && $wp_query->query['post_type'] == 'pedia' ) {
				$fields = str_replace(
				"$wpdb->posts.*",
				"$wpdb->posts.ID, $wpdb->posts.post_author, $wpdb->posts.post_date," .
				" $wpdb->posts.post_date_gmt, $wpdb->posts.post_content," .
				" $wpdb->posts.post_title, $wpdb->posts.post_excerpt," .
				" REPLACE( $wpdb->posts.post_status, 'private', 'publish' ) AS `post_status`," .
				" $wpdb->posts.comment_status, $wpdb->posts.ping_status, $wpdb->posts.post_password," .
				" $wpdb->posts.post_name, $wpdb->posts.to_ping, $wpdb->posts.pinged," .
				" $wpdb->posts.post_modified, $wpdb->posts.post_modified_gmt," .
				" $wpdb->posts.post_content_filtered, $wpdb->posts.post_parent," .
				" $wpdb->posts.guid, $wpdb->posts.menu_order, $wpdb->posts.post_type," .
				" $wpdb->posts.post_mime_type, $wpdb->posts.comment_count",
				$fields
				);
			}
    		return $fields;
		}

		static function build(){
			add_filter('posts_fields_request', array('\Benedict\Presenters\Pedia', 'private_projects'));
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