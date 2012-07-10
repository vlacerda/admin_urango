<?php 
  /**
  * 
  */
  class Model_Log extends ORM
  {    
    protected $_belongs_to = array(
      "user" => array("model" => "user")
    );

    public function add_log($user, $description){

      if(is_object($user))
        $this->user_id = $user->id;
      else
        $this->user_id = $user;

      $this->description = $description;
      $this->type = "L";
      $this->date = date("Y-m-d h:i:s");
      $this->save();
    }

    public function add_error($user, $description){
      if(is_object($user))
        $this->user_id = $user->id;
      else
        $this->user_id = $user;
      
      $this->description = $description;
      $this->type = "E";
      $this->date = date("Y-m-d h:i:s");
      $this->save();
    }
  }
 ?>