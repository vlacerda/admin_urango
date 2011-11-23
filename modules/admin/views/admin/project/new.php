<div class="form">
 <form action="" method="post" class="niceform"  enctype="multipart/form-data">
 	<h3>Novo projeto</h3>
	<fieldset>
		<?php echo form::admin_select("category_id", $combo_categories, $project->category_id, array("label"=>"Seção do site", "id"=> "main_category")) ?>
	
		<?php echo form::admin_input("city", $project->city, array("label"=>"Cidade")) ?>
		<?php echo form::admin_input("province", $project->province, array("label"=>"Estado")) ?>
		<?php echo form::admin_input("year", $project->year, array("label"=>"Projeto desenvolvido em")) ?>
		<?php echo form::admin_checkbox("highlight", 1, ($project->highlight == 0 ? false : true), array("label"=>"Projeto em Destaque")) ?>
		
		<?php			
			if(isset($projects_content) && count($projects_content) > 0)
				$pc = $projects_content[0];
			else
				$pc = ORM::factory("project_content");
		?>
			<h4>Conteúdo em Português</h4>	
			<?php echo form::hidden("PT[category_content_id]", $pc->id) ?>
			<?php echo form::hidden("PT[language_id]", 1) ?>
			<?php echo form::admin_input("PT[title]", $pc->title, array("label"=>"Título do Projeto")) ?>
			<?php echo form::admin_input("PT[country]", $pc->country, array("label"=>"País")) ?>
			<?php echo form::admin_input("PT[author]", $pc->author, array("label"=>"Autor")) ?>
			<?php echo form::admin_input("PT[area]", $pc->area, array("label"=>"Área")) ?>
			<?php echo form::admin_textarea("PT[description]", $pc->description, array("label"=>"Descrição do projeto")) ?>
			<?php echo form::admin_input("PT[page_name]", $pc->page_name, array("label"=>"URL da página")) ?>
		
		<?php
			if(isset($projects_content) && count($projects_content)>1)
				$pc = $projects_content[1];
			else
				$pc = ORM::factory("project_content");
		?>
			<h4>Conteúdo em Inglês</h4>
			<?php echo form::hidden("EN[category_content_id]", $pc->id) ?>
			<?php echo form::hidden("EN[language_id]", 2) ?>
			<?php echo form::admin_input("EN[title]", $pc->title, array("label"=>"Título do Projeto")) ?>
			<?php echo form::admin_input("EN[country]", $pc->country, array("label"=>"País")) ?>
			<?php echo form::admin_input("EN[author]", $pc->author, array("label"=>"Autor")) ?>
			<?php echo form::admin_input("EN[area]", $pc->area, array("label"=>"Área")) ?>
			<?php echo form::admin_textarea("EN[description]", $pc->description, array("label"=>"Descrição do projeto")) ?>
			<?php echo form::admin_input("EN[page_name]", $pc->page_name, array("label"=>"URL da página")) ?>
		
			<h4>Imagem thumbnail larga (352 x 91)</h4>
			<?php echo form::admin_file("thumb1") ?>
			<?php if($project->thumb1 != ""): ?>
				<?php echo html::image("uploads/".$project->thumb1, array("width"=>150)) ?>
			<?php endif; ?>

			<h4>Imagem thumbnail quadrada (144 x 144)</h4>
			<?php echo form::admin_file("thumb2") ?>
			<?php if($project->thumb2 != ""): ?>
				<?php echo html::image("uploads/".$project->thumb2, array("width"=>150)) ?>
			<?php endif; ?>
		
		<?php echo form::admin_submit("Submit", "Criar novo projeto") ?>
	</fieldset>
  </form>
</div>