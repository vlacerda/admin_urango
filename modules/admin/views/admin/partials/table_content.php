
<tr>
	<td><!--<input type="checkbox" name="" />--></td>
	<?php foreach ($fields as $key => $val): ?>
		
		<td><?=$item->{$key}?></td>
		
	<?php endforeach; ?>
    <td>
		<?php echo HTML::anchor(
			URL::route(array("controller" => $controller, "action" => "edit", "id" => $id), "admin"), 
			HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0"))
		)?>
	</td>
    <td>
		<?php echo HTML::anchor(
			URL::route(array("controller" => $controller, "action" => "destroy", "id" => $id), "admin"), 
			HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0"))
		)?>
	</td>
</tr>