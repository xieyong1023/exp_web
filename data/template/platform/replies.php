<?php $this->load->view('platform/head');?>
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
						<a href="<?php echo site_url('member/p/'.$user_detail['username']);?>"><?php echo $user_detail['username']?></a>
						<span class="chevron"> › </span>
						<span class="black">全部回复</span>
					</div>
					<?php 
					if(! empty($comments)){
						$str = '';
						foreach ($comments as $value){
							$str .= 
					'<div class="blue">
						<span class="replyto">回复了 '.$value['replytouser'].' 创建的主题 › <a href="'.site_url('/article/'.$value['articleID']).'">'.$value['title'].'</a></span>
						<span class="replytime">'.$value['createtime'].'</span>
					</div>
					<div class="arrow">
							<img src="'.$config['site_templateurl'].'/images/arrow.png'.'"/>
						</div>
					<div class="cell">
						<span class="replycontent">'.$value['content'].'</span>
					</div>'
							;
						}
						echo $str;
						unset($str);
					}
					?>
				</div>
			</div>
		</div>
		<div class="sep20 clear"></div>
	</div>
</body>
</html>