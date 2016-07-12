<?php $this->load->view('platform/head');?>
<body>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/kindeditor-4.1.10/kindeditor-min.js';?>"></script>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/edit.js';?>"></script>
	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo site_url('member/p/'.$user_detail['username']);?>"><?php echo $user_detail['username']?></a>
						<span class="chevron"> › </span>
						<span class="black">编辑新的主题</span>
					</div>
					<form action="<?php echo site_url('member/newArticle')?>" enctype="multipart/form-data" method="post">
						<div class="cell black">
							<span>标题</span>
							<span class="remaining fade">120</span>
						</div>
						<div class="cell" style="padding: 0px">
							<textarea name="newTitle" id="NewTitle" placeholder="请输入主题标题，如果标题能够表达完整内容，则正文可以为空" maxlength="120"></textarea>
						</div>
						<div class="cell black">
							<span>正文</span>
						</div>
						<div class="cell" style="padding: 0px">
							<textarea name="newContent" id=NewContent maxlength="20000"></textarea>
						</div>
						<div class="cell">
							<select id="Category" name="category">
								<?php
								$option = '';
								$option .= '<option value="0" selected="selected">请选择一个节点</option>';
								foreach ($menu['tree'] as $a => $b){
									foreach ($b as $c)
									$option .= '
								<option value="'.$c['id'].'">'.$menu['top'][$a]['name'].' / '.$c['name'].'</option>';
								}
								echo $option;
								unset($option);
								?>
							</select>
						</div>
						<div class="cell">
							<input id="Submit" type="submit" value="发布" onclick="editSubmit()"/>
						</div>
					</form>
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