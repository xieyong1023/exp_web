$(document).ready(function(){
	$(".delete").click(function(){		
		var $this = $(this);
		
		var url = $this.parents(".leftList").find(".title a").attr('href');
		var id = url.split('/')[4];
		
		var category = $("#Category").val();
		
		if(category == "收藏列表"){
			$.ajax({
				type: "POST",
				url: "http://" + location.hostname + "/member/deleteFavorite",
				data: {
					'id': id,
				},
				dataType: "json",
				success: function(response){
					if(response = 'success'){
						$this.parents('.leftList').remove();
					}
				},
				error: function(){

				},
			});
		}
		
		if(category == "全部主题"){			
			$.ajax({
				type: "POST",
				url: "http://" + location.hostname + "/member/deleteArticle",
				data: {
					'id': id,
				},
				dataType: "json",
				success: function(response){
					if(response = 'success'){
						$this.parents('.leftList').remove();
					}
				},
				error: function(){

				},
			});
		}
	});
});