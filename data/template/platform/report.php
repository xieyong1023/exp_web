<?php $this->load->view('platform/head');?>
<body>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/report.js';?>"></script>
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
						<span class="black">我的实验报告</span>
					</div>
					<?php 
					if(! empty($report)){
						$abc = '';
						foreach ($report as $value){
							$abc .= '
					<div class="cell leftList" id="'.$value['id'].'">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<span class="title">实验名: <a href="'.site_url('article/'.$value['article_id']).'" target="_blank">'.$value['exp_name'].'</a></span>
										<div class="sep5"></div>
										<span class="title">下载实验报告: <a href="'.site_url('download/report/'.$value['id']).'">'.$value['file_name'].'</a></span>
										<div class="sep5"></div>
										<span class="fade">上传时间'.$value['createtime'].'</span>										
									</td>';								
									$abc .= 
									'<td width="25">
										<a class="delete">删除</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>';
						}
						echo $abc;
						unset($abc);
					}
					?>
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