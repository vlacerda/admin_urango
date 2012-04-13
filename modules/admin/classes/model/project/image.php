<?php 
class Model_Project_Image extends ORM {

	protected $_belongs_to = array(
		"project" => array("model" => "project", "foreign_key" => "project_id")
	);

}
 ?>