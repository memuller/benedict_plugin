<?php
	namespace CitySpots ;  
	use BasePlugin ;

	class Plugin extends BasePlugin {

		static $db_version = 0.1 ;
		static $custom_posts = array('Spot', 'Experience', 'Hint');
		static $custom_users = array('Spotter');
		static $custom_classes = array();
		static $custom_singles = array();
		static $custom_taxonomies = array('Profiles', 'Ratings');
		static $restricted_menus = array();

		static $roles = array(
		);

		static $absent_roles = array();

		static function build(){
			parent::build();
			\CitySpots\Presenters\Base::build();
			require static::path('presenters/Spot.php'); \CitySpots\Presenters\Spot::build();
			require static::path('presenters/Spotter.php'); \CitySpots\Presenters\Spotter::build();
			require static::path('presenters/Help.php'); \CitySpots\Presenters\Help::build();
			require static::path('presenters/Login.php'); \CitySpots\Presenters\Login::build();
		}
	}

 ?>