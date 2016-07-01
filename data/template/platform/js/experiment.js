$(document).ready(function(){
	
	//申请使用
	$(".apply").click(function(){
		apply($(this));
	});
	
	$(".release").click(function(){
		release($(this));
	});
	
	function apply($bt){
		var id = $bt.parents('.exp_item').attr('id');
		
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/applyExp",
			data: {
				"id": id,
			},
			dataType: "json",
			success: function(response){
				if(response.status = "success"){
					$bt.replaceWith($('<div class="key" id="Release">释放</div>').click(function(){
						release($(this));
					}));
					$("#" + id).find(".status").text("使用中    ").addClass('red').next().text('当前用户'+response.user)
					.end().end().find('.ip').removeClass('hide');
				}
			},
			error: function(){
				
			},
		});
	}
	
	function release($bt){
		var id = $bt.parents('.exp_item').attr('id');
		
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/releaseExp",
			data: {
				"id": id,
			},
			dataType: "json",
			success: function(response){
				if(response = "success"){
					$bt.replaceWith($('<div class="key" id="Apply">申请使用</div>').click(function(){
						apply($(this));
					}));
					$("#" + id).find(".status").text("空闲").removeClass('red').next().text('')
					.end().end().find('.ip').addClass('hide');
				}
			},
			error: function(){
				
			},
		});	
	}
});