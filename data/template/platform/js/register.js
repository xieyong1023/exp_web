/*
 * 注册页面js代码
 */

$(document).ready(function (){
	var userName = $("#UserName");
	var studentID = $("#StudentID");
	var userPass = $("#UserPass");
	var userPassFirm = $("#UserPassFirm");
	var verification = $("#Verification");
	var vcode = $("#Vcode");
	var regSubmit = $("#Submit");
	
	//提示信息
	var inputTip = {
		"UserName" : "5-20个字符，包含字母大小写，数字等",
		"UserPass" : "长度为6-40个字符",
		"UserPassFirm" : "请再次确认密码",
		"Verification" : ""
	};
	
	var input = new Array(userName, studentID, userPass, userPassFirm, verification);
	
	//验证码
	setVcode();
	
	//点击刷新验证码
	vcode.click(function(){
		setVcode();
	});

	//绑定输入框获得焦点和失去焦点时的事件
	for(var i = 0; i < input.length; i++){
		input[i].bind({
			"focus": function(){
				showTip($(this), inputTip[$(this).attr("id")]);
			},
			"blur": function(){
				if(check($(this)))
					clearTip($(this));
			},
			"keydown": function(event){
				if(event.which == 13)
					regSubmit.trigger("click");
			}
		});
	}
	
	//点击提交按钮
	regSubmit.click(function(){
		var ready = true;
		for(var i = 0; i < input.length; i++){
			if(!check(input[i]))
				ready = false;
		}
		if(!ready){
			setVcode();
		}else{
			register();		
		}
	});
	
	/*
	 * 提交注册
	 */
	function register(){
		$.ajax({
			type: "POST",
			url: "http://" + location.hostname + "/member/register",
			data: {
				"opt": "ajax",
				"userName": userName.val(),
				"userPass": $.md5(userPass.val()),
				"studentID": studentID.val(),
				'v_code': $("#Verification").text(),
			},
			dataType: "json",
			success: function(response){
				if(response == "success"){
					alert('注册成功!');
					location.pathname = "";
				}else{
					showWarning(regSubmit, "出错!");
				}
				clearAllInput(input);
				setVcode();
			},
			error: function(){
				showWarning(regSubmit, "出错！");
				clearAllInput(input);
				setVcode();
			}
		});	
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
	 * 输入合法性检查
	 * obj:待检查的输入框
	 */
	function check(obj){
		var name = obj.attr("id");
		switch(name){
			case "UserName":{
				if(obj.val() == '')
					showWarning(obj, "用户名不能为空!");
				else if(obj.val().length < 0 || obj.val().length > 20)
					showWarning(obj, "长度为1-20个字符!");
				else if(isExist("username", obj.val()))
					showWarning(obj, "该用户名已经被注册!");
				else	
					return true;
			}break;
			case "StudentID":{
				if(obj.val() == '')
					showWarning(obj, "请输入学号");
				else
					return true;
			}break;
			case "UserPass":{
				if(obj.val() == '')
					showWarning(obj, "密码不能为空!");
				else if(obj.val().length < 6)
					showWarning(obj, "密码太短，至少6个字符!");
				else if(obj.val().length > 40)
					showWarning(obj, "密码长度不能超过40个字符!");
				else
					return true;
			}break;
			case "UserPassFirm":{
				if(obj.val() != $("#UserPass").val())
					showWarning(obj, "两次输入的密码不符!");
				else
					return true;
			}break;
			case "Verification":{
				if(obj.val().toLowerCase() != $("#Vcode").text().toLowerCase())
					showWarning(obj, "验证码错了!");
				else 
					return true;
			}break;
			default:;
		}
		return false;//跳转到此处说明待检查的项没有通过。
	}
	
	/*
	 * 检查用户名是否已经注册过
	 * return: true是，false否
	 */
	function isExist(item, value){
		var result;
		$.ajax({
			type: "POST",
			async: false,    //此处为同步通信!
			url: "http://" + location.hostname + "/member/isExist",
			data: {"opt":"ajax", "item":item, "value":value},
			dataType: "json",
			success: function(response){
				if(response == "yes")
					result = true;
				else
					result = false;
			},
			error: function(){
				showWarning(userName, "出错！");
			}
		});
		return result;
	}

	/*
	 * 清楚掉提示信息
	 * obj:要清楚的输入框
	 */
	function clearTip(obj){
		obj.parent().next().text("");
	}

	/*
	 * 生成验证码
	 * len:需要的长度
	 */
	function randomString(len) {
		len = len || 32;
		var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';    //去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
		var maxPos = $chars.length;
		var pwd = '';
		for (i = 0; i < len; i++) {
			pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
		}
		return pwd;
	}
	
	/*
	 * 清除所有输入框数据
	 */
	function clearAllInput(input){
		for(var i = 0; i < input.length; i++){
			input[i].val("");
		}
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
				vcode.text("无法显示验证码");
			}
		});
	}
	
	/*
	 * 显示注册成功的页面
	 */
	function success(){
		$("<div><p>注册成功</p><p>将转到首页</p></div").dialog({
			title: "确认框",
			resizable: false,
			modal: true,
			draggable: false,
			buttons: {
				"确认": function (){
					location.pathname = "";
				},
				"取消": function() {
			        $( this ).dialog( "close" );        
				}
			}
		});
	}
});