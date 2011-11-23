<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo KOHANA::$config->load('admin')->site_title ?> | <?=$site_area?></title>
<?php echo HTML::style("public/admin/css/style.css")."\n" ?>
<?php echo HTML::script("public/admin/js/clockp.js")."\n" ?>
<?php echo HTML::script("public/admin/js/clockh.js")."\n" ?>
<?php echo HTML::script("public/admin/js/jquery.min.js")."\n" ?>
<?php echo HTML::script("public/admin/js/ddaccordion.js")."\n" ?>
<?php echo HTML::script("public/admin/js/functions.js")."\n" ?>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='<?=URL::base() ?>public/admin/images/plus.gif' class='statusicon' />", "<img src='<?=URL::base() ?>public/admin/images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<?php echo HTML::script("public/admin/js/jconfirmaction.jquery.js")."\n" ?>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
	window.admin_url = "<?php echo URL::site() ?>";
	
</script>



</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo">
		<?php echo HTML::anchor(URL::route(array("controller"=>"user", "action"=>"index"), "admin"), HTML::image("public/admin/images/logo.png", array("alt"=>"", "border"=>"0"))) ?>
	</div>
    <div class="right_header">Welcome <?=Auth::instance()->get_user()->username ?>, <?php echo HTML::anchor("/", "Visitar o Site") ?> | <!--<a href="#" class="messages">(3) Messages</a> |--> <?php echo HTML::anchor(URL::route(array("controller"=>"user", "action"=>"logout"), "admin"), "Logout", array("class"=>"logout")) ?></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">

	<?php echo View::factory("admin/partials/top_menu")->set('top_menu', $top_menu)->render() ?>
                    
    <div class="center_content">  
    
    <?php //echo View::factory("admin/partials/sidebar")->render() ?>
    
    <div class="right_content">            
        
    <h2><?=$site_area?></h2> 
                    
                    
	<?=$content_for_layout ?>
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>