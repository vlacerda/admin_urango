<div class="menu">
<ul>
<!--
<li><a class="current" href="index.html">Admin Home</a></li>
-->
<?php foreach ($top_menu as $key => $menu) {
	echo "<li>".HTML::anchor(URL::route(array("controller"=> strtolower($menu->controller), "action"=>"index"), "admin"), $menu->screen_name, array("class"=>"logout"))."</li>";
	
} ?>
</ul>
</div>