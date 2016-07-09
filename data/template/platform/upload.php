<?php $this->load->view('platform/head');?>
<body>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/kindeditor-4.1.10/kindeditor-min.js';?>"></script>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/upload.js';?>"></script>
	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo base_url('member/p/'.$user_detail['username']);?>"><?php echo $user_detail['username']?></a>
						<span class="chevron"> › </span>
						<span class="black">上传实验报告</span>
					</div>
					<?php 
					if($status != ''){
						echo '<div class="message">'.$status.'</div>';
					}
					?>
					<div class="form">
						<form enctype="multipart/form-data" action="<?php echo base_url('member/saveReport');?>" method="post">
						<table>
							<tbody>
								<tr>
									<td><label>请选择实验</label></td>
									<td>
										<select id="Exp" name="exp_id">
											<?php 
											$option = '';
											$option .= '<option >请选择一项实验</option>';
											foreach ($exp as $value){
												$option .= '<option id='.$value['id'].' value='.$value['id'].'>';
												$option .= $value['title'].'</option>';
											}
											echo $option;
											unset($option);
											?>
										</select>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label>选择文件</label></td>
									<td>
										<input id="File" type="file" name="userfile" accept=".doc, .docx, .pdf"/>
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td> 
										<input id="SubmitFile" type="submit" value="开始上传" />
									</td>
									<td class="msgTip"></td>
								</tr>
								<tr>
									<td><label></label></td>
									<td>
										<span class="piece">请上传.doc .docx .pdf文件，不超过10MB</span>
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
						</form>
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