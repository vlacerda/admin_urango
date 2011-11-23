<?php 
	Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'user',
		'action'     => 'index',
		'directory'     => 'admin'
	));
 ?>