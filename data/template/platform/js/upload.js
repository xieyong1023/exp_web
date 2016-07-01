$(document).ready(function(){
	var submitFile = $("#SubmitFile");
	var exp = $("#Exp");
	var file = $("#File");
	
	file.change(function(){
		filename = file.val();
		filetype = (filename.split('.'))[1];
		filetype = filetype.toLowerCase();
		
		if(filetype != 'doc' && filetype != 'docx' && filetype != 'pdf'){
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
	
	submitFile.click(function(){
		if(exp.val().toString() == "请选择一项实验"){
			exp.focus();
			return false;
		}else{
			return true;
		}
	});
});