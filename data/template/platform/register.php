<?php $this->load->view('platform/head');?>

<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/md5.js';?>"></script>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/register.js';?>"></script>
<body>
	<?php $this->load->view('platform/top')?>
	
	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo base_url('member/signup');?>">注册</a>
					</div>
					<div id="RegPage" class="form">
						<table>
							<tbody>
								<tr>
									<td><label for="UserName">用户名</label>
									<td><input id="UserName" type="text" name="UserName" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="StudentID">学号</label>
									<td><input id="StudentID" type="text" name="StudentID" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for=UserPass">密码</label>
									<td><input id="UserPass" type="password" name="UserPass" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="UserPassFirm">确认密码</label>
									<td><input id="UserPassFirm" type="password" name="UserPassFirm" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Verification">验证码</label>
									<td>
										<input id="Verification" type="text" name="Verification"/ >
										<div id="Vcode" class="no-select" title="点击刷新"></div>
									</td>
									<td class="msgTip">不区分大小写</td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<input id="Submit" type="button" value="立即注册" />
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div><!-- end RegPage -->
				</div>
			</div>
			
			<div id="RightBox">
				
			</div>
			<div class="clear"></div>
		</div>
		<div class="sep20"></div>
	</div><!-- end Wrapper -->

	<?php $this->load->view($config['site_template'].'/foot')?>

</body>
</html>