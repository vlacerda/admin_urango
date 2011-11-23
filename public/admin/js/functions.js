$(document).ready(function(){
	$("#add_image").click(function(e){
		e.preventDefault();
		$.ajax({
			url: admin_url+"admin/project/new_image/"+$("#gal_count").val(),
			success: function(data){
				$("#images").append(data);
				window.setTimeout(function(){NFFix();}, 500);
				$("#gal_count").val(parseInt($("#gal_count").val())+1);
			}
		})
	})
});