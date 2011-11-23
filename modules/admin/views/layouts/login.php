<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by INDEZINER</title>
<?php echo HTML::style("public/admin/css/style.css")."\n" ?>
<?php echo HTML::script("public/admin/js/jquery.min.js")."\n" ?>
<?php echo HTML::script("public/admin/js/ddaccordion.js")."\n" ?>
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
	togglehtml: ["suffix", "<img src='public/admin/images/plus.gif' class='statusicon' />", "<img src='public/admin/images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
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
	
</script>

<?php echo HTML::script("public/admin/js/niceforms.js")."\n" ?>
<?php echo HTML::style("public/admin/css/niceforms-default.css")."\n" ?>

</head>
<body>
<div id="main_container">

	<?=$content_for_layout?>   
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
    	<div class="right_footer_login"><a href="http://indeziner.com"><?=HTML::image("public/admin/images/indeziner_logo.gif", array("alt"=>"", "border"=>"0")) ?></a></div>
    
    </div>

</div>		
</body>
</html>