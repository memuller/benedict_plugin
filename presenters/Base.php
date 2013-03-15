<?php  
	namespace CitySpots\Presenters ;
	use Presenter ; 

	class Base extends Presenter {
		static function build(){
			add_filter('rewrite_rules_array', function($rules){
				$add_spot = array( 'add-spot' => 'index.php?pagename=add-spot' ) ;
				return $add_spot  + $rules ;
			});
		}
	}
?>