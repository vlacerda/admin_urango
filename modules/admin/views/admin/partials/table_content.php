
<tr>
	<td><!--<input type="checkbox" name="" />--></td>
	<?php foreach ($fields as $key => $val): ?>
		
		<?php if($key != "[edit]" && $key != "[destroy]"): ?>
			<td><?=$item->{$key}?></td>
		<?php endif; ?>
		
	<?php endforeach; ?>
    <td>
    <?php if(array_key_exists("[edit]", $fields)): ?>
		<?php echo HTML::anchor(
			URL::route(array("controller" => $controller, "action" => "edit", "id" => $id), "admin"), 
			HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0"))
		)?>
		<?php endif; ?>
		</td>
    <td>
    	<?php if(array_key_exists("[destroy]", $fields)): ?>
			<?php echo HTML::anchor(
				URL::route(array("controller" => $controller, "action" => "destroy", "id" => $id), "admin"), 
				HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0"))
			)?>
			<?php endif; ?>
	</td>
</tr>