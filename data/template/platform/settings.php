<?php $this->load->view('platform/head');?>
<body>
	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/settings.js';?>"></script>

	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo base_url('member/settings');?>">设置</a>
					</div>
					<div class="form">
						<table>
							<tbody>
								<tr>
									<td><label for="UserName">用户名</label>
									<td><p id="UserName" class="piece"><?php echo $detail['username'];?></p></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="StudentID">学号</label>
									<td><p id="UserName" class="piece"><?php echo $detail['studentID'];?></p></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="RealName">真实姓名</label>
									<td><input id="RealName" type="text" value="<?php echo $detail['realname'];?>" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Department">专业</label>
									<td><input id="Department" type="text" value="<?php echo $detail['department']?>" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Email">邮箱</label>
									<td><input id="Email" type="text" value="<?php echo $detail['email'];?>" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Tel">电话</label>
									<td><input id="Tel" type="text" value="<?php echo $detail['tel']?>" /></td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="Signature">个性签名</label>
									<td>
										<textarea id="Signature" maxlength="120" name="signature"><?php echo $detail['signature'];?></textarea>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<input id="SaveSettings" type="button" value="保存设置" />
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell">更改头像</div>
					<div class="form">
						<table>
							<tbody>
								<tr>
									<td><label>当前头像</label></td>
									<td>
										<span  class="piece">
											<img class="large" src="<?php echo $config['site_templateurl'].$detail['avatar'];?>" />
											<img class="middle" src="<?php echo $config['site_templateurl'].$detail['avatar'];?>" />
											<img class="small" src="<?php echo $config['site_templateurl'].$detail['avatar'];?>" />
										</span>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<input id="ChangeAvatar" type="button" value="上传新头像" />
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell" id="ChangePassTitle">更改密码</div>
					<div class="form">
						<table>
							<tbody>
								<tr>
									<td><label for="CurrentPass">原密码</label></td>
									<td>
										<input id="CurrentPass" type="password"/>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="NewPass">新密码</label></td>
									<td>
										<input id="NewPass" type="password"/>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label for="NewPassConfirm">确认密码</label></td>
									<td>
										<input id="NewPassConfirm" type="password"/>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<input id="ChangePass" type="button" value="更改密码"/>
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div id="RightBox">
				<?php $this->load->view('platform/personbox')?>
				<div class="box rightList">
					<div class = "head">点击排行榜</div>
					<?php $this->load->view('platform/orderlist')?>
				</div>
			</div>
		</div>
		<div class="sep20 clear"></div>
	</div>
</body>
</html>