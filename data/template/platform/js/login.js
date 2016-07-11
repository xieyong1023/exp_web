$(document).ready(function(){
	var user_name = $("#UserName");
	var user_pass = $("#UserPass");
	var submit = $("#Submit");
	var vcode = $("#Vcode");
	var verification = $("#Verification");
	var message = $(".message");
	var autoLogin = $("#AutoLogin");
	
	message.click(function(){
		$(this).slideUp();
	}).slideDown();
	
	submit.click(function(){
		clearTip(user_name);
		clearTip(user_pass);
		clearTip(verification);
		
		if(user_name.val() == ''){
			showWarning(user_name, "请输入用户名");
		}else if(user_pass.val() == ''){
			showWarning(user_pass, "请输入密码");
		}else if(vcode.length != 0 && vcode.text() != verification.val()){
			showWarning(verification, "验证码错误");
		}else{
			login();
		}
	});
	
	if(vcode.length != 0){
		setVcode();
	}
	
	vcode.click(function(){
		setVcode();
	});
	
	function login(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/ajaxLogin",
			data: {
				"opt": "ajax",
				"user_name": user_name.val(),
				"user_pass": $.md5(user_pass.val()),
				"autoLogin": autoLogin.is(':checked'),  //如果选中则为true,否则为false
			},
			dataType: "json",
			success: function(response){
				if(response == "success"){
					location.href = 'http://' + location.hostname;
				}else{
					location.reload();
				}
			},
			error: function(){
//				showWarning(submit, "不能连接服务器！");
			},
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
	 * 设置验证码
	 * return: 得到的值
	 */
	function setVcode(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/generateVcode",
			data: {"vcode": "vcode"},
			dataType: "json",
			success: function(response){
				vcode.text(response);
			},
			error: function(){
				showWarning(vcode, "无法显示验证码");
			}
		});
	}
});