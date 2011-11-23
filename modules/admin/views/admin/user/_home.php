<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Product</th>
            <th scope="col" class="rounded">Details</th>
            <th scope="col" class="rounded">Price</th>
            <th scope="col" class="rounded">Date</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td>Product name</td>
            <td>details</td>
            <td>150$</td>
            <td>12/05/2010</td>
            <td><a href="#"><?=HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0")) ?></a></td>
            <td><a href="#" class="ask"><?=HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0")) ?></a></td>
        </tr>
		<tr>
        	<td><input type="checkbox" name="" /></td>
            <td>Product name</td>
            <td>details</td>
            <td>150$</td>
            <td>12/05/2010</td>
            <td><a href="#"><?=HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0")) ?></a></td>
            <td><a href="#" class="ask"><?=HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0")) ?></a></td>
        </tr>
		<tr>
        	<td><input type="checkbox" name="" /></td>
            <td>Product name</td>
            <td>details</td>
            <td>150$</td>
            <td>12/05/2010</td>
            <td><a href="#"><?=HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0")) ?></a></td>
            <td><a href="#" class="ask"><?=HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0")) ?></a></td>
        </tr>
		<tr>
        	<td><input type="checkbox" name="" /></td>
            <td>Product name</td>
            <td>details</td>
            <td>150$</td>
            <td>12/05/2010</td>
            <td><a href="#"><?=HTML::image("public/admin/images/user_edit.png", array("alt"=>"", "border"=>"0")) ?></a></td>
            <td><a href="#" class="ask"><?=HTML::image("public/admin/images/trash.png", array("alt"=>"", "border"=>"0")) ?></a></td>
        </tr>
    </tbody>
</table>

	 <a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a> 
     
     
        <div class="pagination">
        <span class="disabled"><< prev</span><span class="current">1</span><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>…<a href="">10</a><a href="">11</a><a href="">12</a>...<a href="">100</a><a href="">101</a><a href="">next >></a>
        </div> 
     
     <h2>Warning Box examples</h2>
      
     <div class="warning_box">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
     </div>
     <div class="valid_box">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
     </div>
     <div class="error_box">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
     </div>  
           
     <h2>Nice Form example</h2>
     
         <div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>						
                        <dt><?=Form::label("email", "Email Address:") ?></dt>
                        <dd><?=Form::input("email", "", array("name"=>"", "id"=>"", "size"=>"54")) ?></dd>
                    </dl>
                                        
                    <dl>
                        <dt><?=Form::label("gender", "Select categories:") ?></dt>
                        <dd>
							<?=Form::select("gender", array("Select 1", "Select 2", "Select 3"), NULL, array("size"=>1, "id"=>"")) ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt><?=Form::label("interests", "Select tags:") ?></dt>
                        <dd>
							<?=Form::checkbox("interests[]", 1) ?>
                            <?=Form::label("interests", "Web design", array("class"=>"check_label")) ?>
                        </dd>
                    </dl>
                    
                    <dl>
                        <dt><?=Form::label("color", "Select type") ?></dt>
                        <dd>
							<?=Form::radio("type", "", true) ?>
							<?=Form::label("type", "Basic", array("class"=>"check_label")) ?>
                        </dd>
                    </dl>
                    
                    <dl>
                        <dt><?=Form::label("upload", "Upload a file:") ?></dt>
                        <dd>
							<?=Form::file("upload") ?>
						</dd>
                    </dl>
                    
                    <dl>
                        <dt><?=Form::label("comments", "Message:") ?></dt>
                        <dd>
							<?=Form::textarea("comments", "", array("id"=>"comments", "rows"=>"5", "cols"=>"36")) ?>
						</dd>
                    </dl>
                    
                    <dl>
                        <dt><?=Form::label("", "") ?></dt>
                        <dd>
                            <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">I agree to the <a href="#">terms &amp; conditions</a></label>
                        </dd>
                    </dl>
                    
                     <dl class="submit">
						<?=Form::submit("", "Submit") ?>
                     </dl>
                     
                     
                    
                </fieldset>
                
         </form>
         </div>  
