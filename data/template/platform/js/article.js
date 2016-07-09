$(document).ready(function(){
	var newReply = $("#NewReply");
	var submitReply = $("#SubmitReply");
	var newReplyRemain = $("#NewReplyRemain");
	var articleID = $("#ArticleID");
	var updateTime = $("#UpdateTime");
	var replyCount = $("#ReplyCount");
	var to;
	var favorite = $("#Favorite");
	
	favorite.click(function(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/addFavorite",
			data: {
				'articleID': articleID.val(),
			},
			dataType: "json",
			success: function(response){
				if(response == 'success'){
					alert('操作成功!');
				}else if(response == 'needLogin'){
					alert('需要登录才能收藏!');
				}else{
					alert('已经收藏过了!');
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			},
		});	
	});
	
	//点击回复按钮
	submitReply.click(function(){
		var content = newReply.val();
		var article_author = $("#ArticleAuthor").text();
		if(content != ''){
			addNewComment(content, article_author);
		}
	});
	
	//更新输入框的字数
	newReply.keydown(function(){
		var inputNum = $(this).val().length;
		newReplyRemain.text(inputNum + '/500');
	});
	
	//处理附加评论
	var attachReply_submit = $(".attachReply_submit");
	var newAttachReply = $(".newAttachReply");
	
	//输入时，改变字数提示信息
	newAttachReply.keydown(function(){
		var inputNum = $(this).val().length;
		$(this).next().text(inputNum + '/500');
	});
	
	//点击评论右下角的回复按钮
	$(".reply_button").click(function(){
		var $inputArea = $(this).parent().nextAll('.attachReplyInput');		
		if($inputArea.hasClass('hide')){
			//显示输入框
			$inputArea.slideDown();
			$inputArea.removeClass('hide');
			
			//添加 @用户 内容
			to = $(this).prev().prev().children().text();
			$inputArea.children('.newAttachReply').empty().append('回复 ' + to + ':');
			newAttachReply.trigger("keydown");
		}else{
//			$inputArea.slideUp().addClass('hide').children('.newAttachReply').empty();
		}
	});

	//评论后的回复按钮
	$(".attachReply_button").click(function(){			
		//找到输入框
		var $inputArea = $(this).parents('.replyContent').children('.attachReplyInput');
		if($inputArea.hasClass('hide')){
			//显示输入框
			$inputArea.slideDown().removeClass('hide');
			
			//显示回复给谁
			to = $(this).parent().prev().find('.reply_person').text();
			$inputArea.children('.newAttachReply').empty().append('回复 ' + to + ':');			

			newAttachReply.trigger("keydown");
		}else{
			//已经存在输入框的时候只需要改变输入框内的内容
			to = $(this).parent().prev().find('.reply_person').text();
			$inputArea.children('.newAttachReply').empty().append('回复 ' + to + ':');
		}
	});
	
	//附加评论提交回复按钮按下
	attachReply_submit.click(function(){
		var replytoID = $(this).parents('.reply').attr('id');
		var str = replytoID.split('_');
		replytoID = str[1];
		var content = $(this).prev().prev().prev().val();
		if(content != ''){
			addNewAttachReply(content, replytoID);
		}
	});
	
	//取消回复按钮
	$(".cancel").click(function(){
		$(this).parent().slideUp().addClass('hide').children('newAttachReply').empty();
	});
	
	//直接回复给作者
	function addNewComment(content, article_author){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/comments/addNewComment",
			data: {
				"opt": "ajax",
				"category": "article",
				'text': content,
				'articleID': articleID.val(),
				'to': article_author,
			},
			dataType: "json",
			success: function(response){
				if(response.status == 'success'){
					var text = new Array();
					text[0] = response.avatar;
					text[1] = response.user_name;
					text[2] = content;
					text[3] = response.time;
					updateNewComment(text);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			},
		});	
	}
	
	//回复给评论
	function addNewAttachReply(content, replytoID){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/comments/addNewAttachReply",
			data: {
				"opt": "ajax",
				"text": content,
				"articleID": articleID.val(),
				"replytoID": replytoID,
				'to': to,
			},
			dataType: "json",
			success: function(response){
				if(response.status == 'success'){
					var text = new Array();
					text[0] = response.avatar;
					text[1] = response.user_name;
					text[2] = content;
					text[3] = response.time;
					updateReplyComment('reply_' + replytoID, text);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	}
	
	/*
	 * text[0] = 头像的URL
	 * text[1] = 名字
	 * text[2] = 回复内容
	 * text[3] = 从服务器返回的时间
	 * text[4] = id
	 * */
	
	//不刷新页面,把新的评论加到页面上
	function updateNewComment(text){
		var new_comment = $('.reply_model').clone(true).removeClass('reply_model').removeClass('hide');  //此处要带上ture参数，复制相应的事件处理
		var pre_comment = $('.reply:last').after(new_comment);
		pre_comment_order = $('.order', pre_comment).text();
		if(pre_comment_order == ''){
			pre_comment_order = 0;
		}
		new_comment_order = parseInt(pre_comment_order) + 1;
		
		$('img', new_comment).attr("src", text[0]);
		$('.reply_person', new_comment).attr("href", "http://"+location.hostname + '/member/p/' + text[1]);
		$('.replyText', new_comment).text(text[2]);
		$('.order', new_comment).text(new_comment_order.toString() + '楼');
		$('.reply_time', new_comment).text(text[3]);
		$('.reply_person_name', new_comment).text(text[1]);
		updateTime.text(text[3]);
		replyCount.text((parseInt(replyCount.text()) + 1).toString());
	}
	
	//不刷新页面,把新的回复加到页面上
	function updateReplyComment(reply_id, text){
		var new_attachReply = $('.attachReply_model').clone(true).removeClass('hide').removeClass('attachReply_model');
		$('.attachReplyInput', '#' + reply_id).before(new_attachReply).slideUp().addClass('hide');
		
		$('img', new_attachReply).attr('src', text[0]);
		$('.reply_person', new_attachReply).attr('href', "http://"+location.hostname + '/member/p/' + text[1]);
		$('.replyText', new_attachReply).text(text[2]);
		$('.reply_time', new_attachReply).text(text[3]);
		$('.reply_person_name', new_attachReply).text(text[1]);
		updateTime.text(text[3]);
	}
	
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
	//获得时间
//	function getDateTime(){
//		d = new Date();
//		year = d.getFullYear().toString();
//		month = d.getMonth();
//		date = d.getDate();
//		hour = d.getHours();
//		minute = d.getMinutes();
//		
//		if(month < 10){
//			month = '0' + month.toString();
//		}
//		
//		if(hour < 10){
//			hour = '0' + hour.toString();
//		}
//		
//		if(minute < 10){
//			minute = '0' + minute.toString();
//		}
//		
//		return year + '-' + month + '-' + date + ' ' + hour + ':' + minute;
//	}
});