$(document).ready(function(){
	var user_name = $("#UserName");
	var real_name = $("#RealName");
	var studentID = $("#StudentID");
	var department = $("#Department");
	var email = $("#Email");
	var tel = $("#Tel");
	var signature = $("#Signature");
	var save_settings = $("#SaveSettings");
	
	save_settings.click(function(){
		if(email.val() != ''){
			var EmailReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //邮件正则
			if(!EmailReg.test(email.val())){
				showWarning(email, '邮箱格式不正确');
				return;
			}else{
				clearTip(email);
			}
		}
		
		submitSettings();
	});

	function submitSettings(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/saveSettings",
			data: {
				"opt": "ajax",
				"user_name": user_name.text(),
				"real_name": real_name.val(),
				"department": department.val(),
				"studentID": studentID.val(),
				"email": email.val(),
				"tel": tel.val(),
				"signature": signature.val(),
			},
			dataType: "json",
			success: function(response){
				if(response == "success"){
					$("#Header").after('<div class="message">设置保存成功!</div>').next().slideDown().click(function(){$(this).slideUp()});
				}else{
					$("#Header").after('<div class="message">设置保存失败!</div>').next().slideDown().click(function(){$(this).slideUp()});
				}
			},
			error: function(){

			}
		});	
	}
	
	/*
	 * 清楚掉提示信息
	 * obj:要清楚的输入框
	 */
	function clearTip(obj){
		obj.parent().next().text("");
	}
	
	/*
	 * 显示提示信息
	 * obj: 输入框对象
	 */
	function showTip(obj, content){
		var msg = obj.parent().next();
		if(msg.hasClass("msgWarning"))
			msg.removeClass("msgWarning");
		if(!msg.hasClass("msgTip"))
			msg.addClass("msgTip");
		msg.text(content);
	}
	
	/*
	 * 显示警告信息
	 * obj: 输入框对象
	 */
	function showWarning(obj, content){
		var msg = obj.parent().next();
		if(msg.hasClass("msg"))
			msg.removeClass("msg");
		if(!msg.hasClass("msgWarning"))
			msg.addClass("msgWarning");
		msg.text(content);
	}
	
	/*
	 * 上传新头像部分
	 */
	var changeAvatar = $("#ChangeAvatar");
	changeAvatar.click(function(){
		location.href = 'http://' + location.hostname + '/member/settings/avatar';
	});
	
	/*
	 * 更改密码
	 */
	var currentPass = $("#CurrentPass");
	var newPass = $("#NewPass");
	var newPassConfirm = $("#NewPassConfirm");
	var changePass = $("#ChangePass");
	
	changePass.click(function(){
		clearTip(currentPass);
		clearTip(newPass);
		clearTip(newPassConfirm);
		
		if(currentPass.val() == ''){
			showWarning(currentPass, "请输入原密码");
		}else if(newPass.val() == ''){
			showWarning(newPass, "请输入新密码");
		}else if(newPass.val().length < 6 || newPass.val().length > 40){
			showWarning(newPass, "密码长度为6-40个字符");
		}else if(newPassConfirm.val() == ''){
			showWarning(newPassConfirm, "请确认密码");
		}else if(newPass.val() != newPassConfirm.val()){
			showWarning(newPassConfirm, "新密码不一致");
		}else{
			submitPass();
		}
	});
	
	function submitPass(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/settings/newpass",
			data: {
				"opt": "ajax",
				"current_pass": currentPass.val(),
				"new_pass": newPass.val(),
			},
			dataType: "json",
			success: function(response){
				if(response == "success"){
					$("#ChangePassTitle").after('<div class="message">更改密码成功!</div>').next().slideDown().click(function(){$(this).slideUp()});
				}else{
					$("#ChangePassTitle").after('<div class="message">更改密码失败!</div>').next().slideDown().click(function(){$(this).slideUp()});
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});	
	}
});