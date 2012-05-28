<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Application extends Controller_Template {
  
  public $template = 'layouts/admin';
  public $view = null;
  public $_data = array();
  public $user = null;
  
  // set data for view
  public function __set($name, $value){
    $this->_data[$name] = $value;
  }

  public function before(){
	parent::before();
	  if ($this->auto_render){
		$this->template->site_area = '';
		$this->template->body_id = '';
		$this->template->notice = '';
		$this->template->alert = '';
		$this->user = Auth::instance()->get_user();
	  }						
  }
  
  public function after(){    
	
	$user = Auth::instance()->get_user();
	$controllers = Array();
	$controller_names = Array();
	$screen_names = Array();
	
	if($user != false){				
		$roles = $user->roles->find_all();		
		foreach ($roles as $ind => $role) {
			$sections = $role->sections->find_all();
			 foreach ($sections as $key => $section) {
			 	$controllers[] = $section;
				$controller_names[] = strtolower($section->controller);
				$screen_names[strtolower($section->controller)] = $section->screen_name;
			 }
			$screen_names['user'] = 'Admin';
		}
		
		$this->site_area = $screen_names[$this->request->controller()];
		$this->template->top_menu = $controllers;
	}

	if(in_array($this->request->controller(), $controller_names) || $this->request->controller() == "user"){
		
		// get default view 'directory/controller/action'
	    $view_path = implode(Array($this->request->directory(), $this->request->controller(), $this->request->action()), "/");
		if(Kohana::find_file('views', $view_path)){
			$this->view = View::factory($view_path);
		    
			// assign vars
		    foreach($this->_data as $var => $value){
		      $this->view->{$var} = $value;
		      if($this->template){
		        $this->template->{$var} = $value;
		      }
		    }
		
			$this->view->controller = $this->request->controller();

		    // render
		    if($this->request->is_ajax() || !$this->template){
		      $this->auto_render = false;
		      $this->response->body($this->view);
		    }else{  
		      $this->template->content_for_layout = $this->view;
		    }
		}
	}else{
		$this->request->redirect(URL::route(array("controller"=> "user", "action"=>"index"), "admin"));
	}
    
    return parent::after();
	
  }
  
} // End Application Controller