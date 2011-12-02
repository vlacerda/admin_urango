<?php
	class Model_Section extends ORM {
		// Relationships
		protected $_has_one = array(
			'role' => array('model' => 'role', "foreign_key" => "role_id")
		);		

	}
	

?>