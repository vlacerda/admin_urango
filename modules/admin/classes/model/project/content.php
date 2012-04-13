<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Project_Content extends ORM {
	
	protected $_belongs_to = array(
		"project" => array("model" => "project", "foreign_key" => "project_id")
	);
		
}