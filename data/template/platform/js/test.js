$(document).ready(function(){
	var user_name = $("#user_name");
	var user_pass = $("#user_pass");
	var bt = $("#bt");

	bt.click(function(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/exp_logout",
			data: {
				"id": 1,
				"user_name": user_name.val(),
				"user_pass": user_pass.val(),
			},
			dataType: "json",
			success: function(response){
				alert(response);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});	
	});
	
});