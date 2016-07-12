$(document).ready(function(){
	$(".delete").click(function(){
		var $this = $(this);
		
		var id = $this.parents('.leftList').attr('id');
		
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/index.php/member/deleteReport",
			data: {
				"id": id,
			},
			dataType: "json",
			success: function(response){
				if(response == 'success'){
					alert('操作成功!');
					$this.parents('.leftList').remove();
				}
			},
			error: function(){
			},
		});	
	});	
});