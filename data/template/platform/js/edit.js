$(document).ready(function(){
	var newTitle = $("#NewTitle");
	var newContent = $("#NewContent");
	var category = $("#Category");
	var submit = $("#Submit");
	
	//根据输入更新字数提示
	newTitle.keydown(function(){
		var inputNum = $(this).val().length;
		$(this).parent().prev().children('.remaining').text((120 - inputNum).toString());
	})
	.keyup(function(){
		var inputNum = $(this).val().length;
		$(this).parent().prev().children('.remaining').text((120 - inputNum).toString());
	});

	//根据输入自动调整输入框的大小
//	newContent.keydown(function(){
//		var inputNum = $(this).val().length;
//		$(this).height(function(){
//			var textHeight = ((inputNum / 50) + 1) * 20;
//			var inputHeight = $(this).height();
//			var dif = inputHeight - textHeight;
//			if(dif <= 100){                    //如果文本内容快接近输入框底部
//				return 100 + textHeight;       
//			}else if(dif >= 300){			   //如果文本框离输入框太远(当删除已经输入的内容时)
//				var tmp = 100 + textHeight;
//				if(tmp >= 300){
//					return tmp;
//				}else{
//					return 300;                //调整文本框的高度，但不能小于初始值
//				}
//			}else{
//				return inputHeight;
//			}
//		}).parent().prev().children('.remaining').text((20000 - inputNum).toString());
//	})
//	.keyup(function(){
//		var inputNum = $(this).val().length;
//		$(this).height(function(){
//			var textHeight = ((inputNum / 50) + 1) * 20;
//			var inputHeight = $(this).height();
//			var dif = inputHeight - textHeight;
//			if(dif <= 100){                    //如果文本内容快接近输入框底部
//				return 100 + textHeight;       
//			}else if(dif >= 300){			   //如果文本框离输入框太远(当删除已经输入的内容时)
//				var tmp = 100 + textHeight;
//				if(tmp >= 300){
//					return tmp;
//				}else{
//					return 300;                //调整文本框的高度，但不能小于初始值
//				}
//			}else{
//				return inputHeight;
//			}
//		}).parent().prev().children('.remaining').text((20000 - inputNum).toString());
//	});
	
	newTitle.focus(function(){
		$(this).css("background-color", "#FFF");
	}).blur(function(){
		$(this).css("background-color", "#F9F9F9");
	});
	
	submit.click(function(){
		if(newTitle.val().length == 0){
			showMsg("标题不能为空");
			newTitle.trigger("focus");
			
			return false;
		}else if(category.val() == 0){
			showMsg("请选择一个节点");
			
			return false;
		}else if(newContent.val().length > 20000){
			showMsg("内容过长(20000字以内)");
			
			return false;
		}else{
			return true;
		}		
	});
	
	//显示提示信息
	function showMsg(text){
		$(".message").remove();
		$("#Header").after('<div class="message">' + text + '</div>').next().slideDown().click(function(){$(this).slideUp()});
	}
	
	
	//正文框输入
	KindEditor.ready(function(K) {
		var options = {
				width: '100%',
				minHeight: '300px',
				items: [
					'preview', '|', 'undo', 'redo', '|','justifyleft', 'justifycenter', 'justifyright',
			        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent','subscript',
			        'superscript', '|', 'fullscreen', '/','formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
			        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
			        'insertfile', 'table', 'hr', 'emoticons', 'anchor', 'link', 'unlink',
				],
				resizeType: 1,
		};
        window.editor = K.create(newContent, options);
	});
	
	
	
	/*
	 * 获取textarea光标的方法，参考一下。无法解决textarea不统计换行时空间的占用问题
	 * 
	 * 来源http://www.planabc.net/2010/11/17/get_textarea_cursor_position/
	 * 
	 * getCursorPosition Method
	 *
	 * Created by Blank Zheng on 2010/11/12.
	 * Copyright (c) 2010 PlanABC.net. All rights reserved.
	 *
	 * The copyrights embodied in the content of this file are licensed under the BSD (revised) open source license.
	 */
	function getCursorPosition(textarea) {
	    var rangeData = {text: "", start: 0, end: 0 };
		textarea.focus();
	    if (textarea.setSelectionRange) { // W3C
	        rangeData.start= textarea.selectionStart;
	        rangeData.end = textarea.selectionEnd;
	        rangeData.text = (rangeData.start != rangeData.end) ? textarea.value.substring(rangeData.start, rangeData.end): "";
	    } else if (document.selection) { // IE
	        var i,
	            oS = document.selection.createRange(),
	            // Don't: oR = textarea.createTextRange()
	            oR = document.body.createTextRange();
	        oR.moveToElementText(textarea);

	        rangeData.text = oS.text;
	        rangeData.bookmark = oS.getBookmark();

	        // object.moveStart(sUnit [, iCount])
	        // Return Value: Integer that returns the number of units moved.
	        for (i = 0; oR.compareEndPoints('StartToStart', oS) < 0 && oS.moveStart("character", -1) !== 0; i ++) {
	            // Why? You can alert(textarea.value.length)
	            if (textarea.value.charAt(i) == '\n') {
	                i ++;
	            }
	        }
	        rangeData.start = i;
	        rangeData.end = rangeData.text.length + rangeData.start;
	    }

	    return rangeData;
	}
});