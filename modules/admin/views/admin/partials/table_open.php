<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
			<th scope="col" class="rounded-company"></th>
			<?php foreach ($fields as $key => $value): ?>
				<th scope="col" class="rounded"><?=$value?></th>
			<?php endforeach ?>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>
	<tbody>