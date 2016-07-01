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
						<span class="black">提示</span>
					</div>
					<div class="message">
					<?php 
						echo $message;
					?>
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