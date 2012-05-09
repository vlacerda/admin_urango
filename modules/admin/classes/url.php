<?php defined('SYSPATH') or die('No direct script access.');
 
class URL extends Kohana_URL{
	public static function route($params, $route_name = 'default'){
		return Route::get($route_name)->uri($params);
	}
}
 
?>