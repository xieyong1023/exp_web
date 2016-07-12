<?php $this->load->view('platform/head');?>
<body>
	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/avatar.js';?>"></script>

	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo site_url('member/settings');?>">设置</a>
						<span class="chevron"> › </span>
						<a href="<?php echo site_url('member/settings/avatar');?>">更改头像</a>
					</div>
					<?php 
					if($status != ''){
						echo '<div class="message">'.$status.'</div>';
					}
					?>
					<div class="form">
						<form enctype="multipart/form-data" action="<?php echo site_url('member/settings/avatar');?>" method="post">
						<table>
							<tbody>
								<tr>
									<td><label>当前头像</label></td>
									<td>
										<span  class="piece">
											<?php ?>
											<img class="large" src="<?php echo $avatar_path;?>" />
											<img class="middle" src="<?php echo $avatar_path;?>" />
											<img class="small" src="<?php echo $avatar_path;?>" />
										</span>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label>选择新头像</label></td>
									<td>
										<input id="File" type="file" name="userfile" accept=".jpg, .gif, .png"/>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td> 
										<input id="SubmitFile" type="submit" value="开始上传" />
										<input type="hidden" name="file" value="image" />
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<span class="piece">支持 2MB 以内的 PNG / JPG / GIF 文件</span>
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>
				</div>
			</div>
			<div class="sep20 clear"></div>
		</div>
	</div>
	
	<?php $this->load->view($config['site_template'].'/foot')?>
</body>
</html>