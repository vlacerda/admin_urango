<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Project extends ORM {
	
	protected $_has_one = array(
		"category" => array("model" => "category", "foreign_key" => "category_id")
	);
	
	protected $_has_many = array(
		"project_contents" => array("model" => "project_content"),
		"project_images" => array("model" => "project_image")
	);
	
	public function save_image1($file){
		if(Upload::valid($file) && Upload::not_empty($file)){
			$filename = $this->id."_t1_".str_replace(" ","", UTF8::transliterate_to_ascii($file['name']));

			Upload::save($file, $filename, "uploads/");

			$img = Image::factory(realpath("uploads/")."/".$filename);
			$img->resize(352, 91, Image::INVERSE);
			$img->crop(352, 91);
			$img->save();
			$img->desaturate();
			$img->save(realpath("uploads/")."/PB_".$filename);
			$this->thumb1 = $filename;
		}
	}
	
	public function save_image2($file){
		if(Upload::valid($file) && Upload::not_empty($file)){
			$filename = $this->id."_t2_".str_replace(" ","", UTF8::transliterate_to_ascii($file['name']));
			
			Upload::save($file, $filename, "uploads/");

			$img = Image::factory(realpath("uploads/")."/".$filename);
			$img->resize(144, 144, Image::INVERSE);
			$img->crop(144, 144);
			$img->save();
			$img->desaturate();
			$img->save(realpath("uploads/")."/PB_".$filename);
			$this->thumb2 = $filename;
		}
	}
		
}

