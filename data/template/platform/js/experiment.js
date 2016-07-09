$(document).ready(function(){
	var apply = $(".apply_btn");
	apply.click(function(){
		var id = $(this).prev("#device_id").val();
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/applyExp",
			data: {
				"id": id,
			},
			dataType: "json",
			success: function(response){
				if(response.status = "success"){
					location.reload();
				}else{
					alert('当前设备已被占用');
				}
			},
		});
	});
	
	var free = $(".free_btn");
	free.click(function(){
		var id = $(this).prev("#device_id").val();
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/releaseExp",
			data: {
				"id": id,
			},
			dataType: "json",
			success: function(response){
				if(response = "success"){
					location.reload();
				}
			},
		});	
	});
});