$(document).ready(function(){
	var category = $("#category");
	var article = $("#article");
	
	category.click(function(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/admin/experiment/get_articles_by_category",
			data: {
				'category': category.val(),
			},
			dataType: "json",
			success: function(data){
				article.html(options(data));
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			},
		});	
	});
	
	article.click(function(){
		$("#article_id").val($(this).val());
	});
	
	function options(data)	{
		var str = '';
		var option;
		while((option = data.shift()) != undefined){
			str += '<option value=';
			str += option['id'];
			str += '>';
			str += option.title;
			str += '</option>';
		}
		return str;
	}
	
	$("#free").click(function(){
		$("#user").val("");
	})
});