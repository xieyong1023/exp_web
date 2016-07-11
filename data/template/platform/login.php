<?php $this->load->view('platform/head');?>
<body>
	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/md5.js';?>"></script>
	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/login.js';?>"></script>

	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo base_url('member/login');?>">登陆</a>
					</div>
					<?php 
					if($tip){
						echo '<div class="message">您所查看的内容需要登录</div>';
					}
					if(get_cookie('attemptLogin')){
						echo '<div class="message">账号和密码不匹配!</div>';
					}
					?>
					
					<div class="form">
						<table>
							<tbody>
								<tr>
									<td><label for="UserName">用户名</label>
									<td><input id="UserName" type="text" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="UserPass">密码</label>
									<td><input id="UserPass" type="password" /></td>
									<td class="msgTip"></td>
								</tr>
								<?php
								if(get_cookie('attemptLogin') >= 3){ 
								echo '<tr>
									<td><label for="Verification">验证码</label>
									<td>
										<input id="Verification" type="text" name="Verification"/ >
										<div id="Vcode" class="no-select" title="点击刷新"></div>
									</td>
									<td class="msgTip"></td>
								</tr>';
								}
								?>
								
								<tr>
									<td><label></label></td>
									<td>
										<input id="Submit" type="button" value="登录" />
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label>自动登录</label></td>
									<td>
										<input id="AutoLogin" type="checkbox" />
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div id="RightBox"></div>
		</div>
		<div class="sep20 clear"></div>
	</div>
	
	<?php $this->load->view($config['site_template'].'/foot')?>
</body>
</html>