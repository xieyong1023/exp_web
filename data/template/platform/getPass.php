<?php $this->load->view('platform/head');?>

<body>
	<?php $this->load->view('platform/top')?>
	<script type="text/javascript" src="<?php echo $config['site_templaterul'].'/js/getPass.js'?>"></script>
	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">			
			<div id="RightBox">
				<div class="box">公告区
				</div>
			</div>
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="javascript:;">找回密码</a>
					</div>
					<div class="lineTip">
					请填写您注册时的用户名和邮箱，我们将发送一条验证消息到您填写的邮箱中。
					</div>
					<div id="GetPass" class="form">
						<table>
							<tbody>
								<tr>
									<td><label for="UserName">用户名</label>
									<td><input id="UserName" type="text" name="UserName" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Email">邮箱</label>
									<td><input id="Email" type="text" name="Email" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<input id="Submit" type="button" value="确认" />
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div><!-- end RegPage -->
				</div>
			</div>
		</div>
		<div class="sep20"></div>
	</div>
	<?php $this->load->view($config['site_template'].'/foot');?>
</body>
</html>
