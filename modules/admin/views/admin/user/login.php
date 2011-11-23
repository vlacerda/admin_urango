<div class="header_login">
<div class="logo"><a href="#"><?=HTML::image("public/admin/images/logo.png", array("alt"=>"", "border"=>"0")) ?></a></div>

</div>

<div class="login_form">
     
     <h3>Admin Panel Login</h3>
     
     <a href="#" class="forgot_pass">Forgot password</a> 
     
	<?php echo form::open("admin/user/login", array("method"=>"post", "class"=> "niceform")) ?>     
            <fieldset>
	
				<dl>						
                    <dt><?=Form::label("username", "Username:") ?></dt>
                    <dd><?=Form::input("username", "", array("name"=>"", "id"=>"", "size"=>"54")) ?></dd>
                </dl>

				<dl>						
                    <dt><?=Form::label("password", "Password:") ?></dt>
                    <dd><?=Form::input("password", "", array("type"=>"password","name"=>"", "id"=>"", "size"=>"54")) ?></dd>
                </dl>
                
               
                 <dl class="submit">
                	<?=Form::submit("", "Enter") ?>
                 </dl>
                
            </fieldset>
	<?php echo form::close() ?>
</div>