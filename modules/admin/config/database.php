<?php
if(Kohana::$environment == Kohana::PRODUCTION){
return array
  (
  	'default' => array
  	(
  		'type'       => 'mysql',
  		'connection' => array(
  			'hostname'   => 'mysql01.milanez-arquitetos.com.br',
  			'username'   => 'msgarquitetos1',
  			'password'   => 'msg1102',
  			'persistent' => FALSE,
  			'database'   => 'msgarquitetos1',
  		),
  		'table_prefix' => '',
  		'charset'      => 'utf8',
  		'caching'      => FALSE,
  		'profiling'    => TRUE,
  	)
);
}else{
	return array
	  (
	  	'default' => array
	  	(
	  		'type'       => 'mysql',
	  		'connection' => array(
	  			'hostname'   => 'localhost',
	  			'username'   => 'root',
	  			'password'   => '',
	  			'persistent' => FALSE,
	  			'database'   => 'milanez_arquitetos',
	  		),
	  		'table_prefix' => '',
	  		'charset'      => 'utf8',
	  		'caching'      => FALSE,
	  		'profiling'    => TRUE,
	  	)
	);
}

?>