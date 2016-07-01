$(document).ready(function(){
	var submitFile = $("#SubmitFile");
	var file = $("#File");
	
	file.change(function(){
		filename = file.val();
		filetype = (filename.split('.'))[1];
		filetype = filetype.toLowerCase();
		
		if(filetype != 'jpg' && filetype != 'png' && filetype != 'gif'){
			showMsg('不支持的文件类型');
			submitFile.attr('disabled', 'disabled');
		}else{
			submitFile.removeAttr('disabled');
			$(".message").slideUp();
		}
	});
	
	function showMsg(text){
		$(".message").remove();
		$("#Header").after('<div class="message">' + text + '</div>').next().slideDown().click(function(){$(this).slideUp()});
	}
	
	$('.message').slideDown().click(function(){
		$(this).slideUp();
	});
});