<?php
	echo View::factory("admin/partials/table_open")->set("fields", $fields)->render();
	
	foreach ($items as $key => $item) {

		echo View::factory("admin/partials/table_content")
			->set("fields", $fields)
			->set("item", $item)
			->set("id", $key)
			->set("controller", $controller)
			->render();
	}	
	
	echo View::factory("admin/partials/table_close")->render();
?>	
	<a href="new" class="bt_green"><span class="bt_green_lft"></span><strong>Novo item</strong><span class="bt_green_r"></span></a>