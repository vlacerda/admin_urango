<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Project extends Controller_Admin_Application {
	
	public $template = 'layouts/admin';
	public $controller = "project";
	
	public function action_index(){
		
		$this->fields = array(
			"title" 	=> "Título",
			"author" 	=> "Autor",
			"area"		=> "Área"
		);
		
		$model = ORM::factory($this->controller);
		$projects = $model->where("type", "=", "project")->find_all();		
		
		$items = array();
		foreach ($projects as $key => $project) {	
			$items[$project->id] = $project->project_contents->where("language_id","=","1")->find();
		}
		
		$this->items = $items;
	}
	
	public function action_edit()
	{
		$id = $this->request->param("id");
		
		//Atualiza o item
		if($this->request->post()){
			$p = ORM::factory($this->controller, $id);
			$p->values($_POST);
			$p->type = "project";
			if(!isset($_POST['highlight']))
				$p->highlight = 0;
 			$p->save();

			$pt_content = $_POST['PT'];
			$model = ORM::factory("project_content", $pt_content['category_content_id']);
			$model->values($pt_content);
 			$model->save();

			$en_content = $_POST['EN'];
			$model = ORM::factory("project_content", $en_content['category_content_id']);
			$model->values($en_content);
 			$model->save();

			$p->save_image1($_FILES['thumb1']);
			$p->save_image2($_FILES['thumb2']);
			$p->save();
			
			$gal_count = $_POST['gal_count'];
			for($i = 0; $i < $gal_count;$i++){
				$file = $_FILES['gal_'.$i];
				if(Upload::valid($file) && Upload::not_empty($file)){
					
					$image_model = ORM::factory("project_image");
					$image_model->project_id = $p->id;
		 			$image_model->save();
					
					$image_name = $p->id . "_" . $image_model->id . "_" . str_replace(" ","", UTF8::transliterate_to_ascii($file['name']));
					
					Upload::save($file, $image_name, "uploads/");

					$img = Image::factory(realpath("uploads/")."/".$image_name);
					$img->resize("540", NULL);
					$img->save();
					$img->crop(540, 386);
					$img->save(realpath("uploads/")."/CP_".$image_name);
					$img->desaturate();
					$img->save(realpath("uploads/")."/PB_".$image_name);
					$image_model->image = $image_name;
					$image_model->save();
				}
			}
			
		}
			
		$id = $this->request->param("id");
		$model = ORM::factory($this->controller);
		$project = $model->where("id", "=", $id)->find();
		$projects_content = $project->project_contents->find_all();
		$project_images = $project->project_images->find_all();

		$combo_categories = array();
		$combo_categories[0] = "Selecione...";
		$main_categories = ORM::factory("category")->find_all()->as_array();		
		foreach ($main_categories as $key => $main_category) {
			if($key > 0)
				$combo_categories[$main_category->id] = $main_category->title; 
		}
		
		$languages = ORM::factory("language")->find_all();
		
		
		$this->languages = $languages;
		$this->project = $project;
		$this->projects_content = $projects_content;
		$this->project_images = $project_images;
		$this->combo_categories = $combo_categories;
	}
	
	public function action_new()
	{
		$combo_categories = array();
		$combo_categories[0] = "Selecione...";
		$main_categories = ORM::factory("category")->find_all()->as_array();		
		foreach ($main_categories as $key => $main_category) {
			if($key > 0)
				$combo_categories[$main_category->id] = $main_category->title; 
		}
		
		$this->project = ORM::factory($this->controller);
		$this->combo_categories = $combo_categories;
		
		if($this->request->post()){
			$p = ORM::factory($this->controller, NULL);
			$p->values($_POST);
			$p->type = "project";
			if(!isset($_POST['highlight']))
				$p->highlight = 0;
 			$p->save();

			$project_id = $p->id;

			$pt_content = $_POST['PT'];
			$pt_content['project_id'] = $project_id;
			$model = ORM::factory("project_content");
			$model->values($pt_content);
 			$model->save();

			$en_content = $_POST['EN'];
			$en_content['project_id'] = $project_id;
			$model = ORM::factory("project_content");
			$model->values($en_content);
 			$model->save();

			$p->save_image1($_FILES['thumb1']);
			$p->save_image2($_FILES['thumb2']);
			$p->save();

			$this->request->redirect("admin/project/edit/".$p->id);
		}
		
	}
	
	public function action_category_search(){
		$this->auto_render = false;
		
		$combo_categories = array();
		$combo_categories[0] = "Selecione...";
		$main_categories = ORM::factory("category")->where("parent_id", "=", $this->request->param("id"))->find_all()->as_array();		
		foreach ($main_categories as $key => $main_category) {
			$combo_categories[$main_category->id] = $main_category->title; 
		}
		
		echo form::admin_select("category_id", $combo_categories, NULL, array("label"=>"Categoria"));
	}	
	
	public function action_destroy()
	{
		$id = $this->request->param("id");
		$model = ORM::factory($this->controller, $id);
		$model->delete();
		
		$model = ORM::factory("project_content")->where('project_id', "=", $id)->find_all();
		foreach ($model as $key => $value) {
			$value->delete();
		}
		
		$this->request->redirect("admin/project/index");
	}
	
	public function action_new_image(){
		$this->auto_render = false;
		
		echo form::admin_file("gal_".$this->request->param("id"), array("label" => "Imagem ".($this->request->param("id")+1)));
	}
	
	public function action_delete_image(){
		$id = $this->request->param("id");
		$model = ORM::factory("project_image", $id);
		$model->delete();
		$this->request->redirect("admin/project/edit/".$_GET['project_id']);
	}
}