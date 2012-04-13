<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
			<th scope="col" class="rounded-company"></th>
			<?php foreach ($fields as $key => $value): ?>
                <?php if($key != "[edit]" && $key != "[destroy]"): ?>
				    <th scope="col" class="rounded"><?=$value?></th>
                <?php endif; ?>
			<?php endforeach ?>

            <?php if(array_key_exists("[edit]", $fields)): ?>
            <th scope="col" class="rounded">Edit</th>
            <?php endif; ?>
            <?php if(array_key_exists("[destroy]", $fields)): ?>
            <th scope="col" class="rounded-q4">Delete</th>
            <?php endif; ?>
        </tr>
    </thead>
	<tbody>