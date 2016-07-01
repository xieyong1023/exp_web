<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $config['seo_title']?> - <?php echo $config['site_name']?> </title>
	<meta name="keywords" content="<?php echo $config['seo_keywords']?>" />
	<meta name="description" content="<?php echo $config['seo_description']?>" />
	<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico')?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config['site_templateurl'];?>/css/style.css"/>
</head>

<body>
<div id="YP_Web">
	<?php $this->load->view($config['site_template'].'/head');?>
	<div id="Sub_Main">
		<div class="sub_left">
			<?php $this->load->view($config['site_template'].'/leftnav');?>
			<?php $this->load->view($config['site_template'].'/left');?>
		</div>
		<div class="sub_rgt">
			<div class="tit"><span style="float:right; font-weight:normal; font-size:12px; margin-right:8px; color:#666666; line-height:33px;">您当前的位置：<?php echo x6cms_location($category," > ")?> </span><?php echo $category['name']?></div>
			<div class="cen">



				<div class="text">
					<h4><?php echo $detail['title']?></h4>
					<div class="text_1"><span>文章出自：<?php echo $detail['comefrom']?></span><span> 点击量：<?php echo $detail['hits']?></span><span>日期：<?php echo date("Y-m-d",strtotime($detail['puttime']))?></span></div>
					<div class="news_ctn">


					<?php if($detail['videourl']!=''):?>
						<div style="text-align: center; margin-top: 15px; margin-bottom: 15px">

							<div id="player1">正在加载视频...</div>
							<script type="text/javascript" src="<?php echo $config['site_templateurl'];?>/flvplayer/swfobject.js"></script>
							<script type="text/javascript">
								var s5 = new SWFObject("<?php echo $config['site_templateurl'];?>/flvplayer/flvPlayer.swf","playlist","500","400","7");
								s5.addParam("allowfullscreen","true");
								//s5.addVariable("autostart","true");
								s5.addVariable("repeat","true");
								s5.addVariable("image","<?php echo $detail['thumb'];?>");
								s5.addVariable("file","<?php echo $detail['videourl'];?>");
								//s5.addVariable("backcolor","0x000000");
								//s5.addVariable("frontcolor","0xCCCCCC");
								//s5.addVariable("lightcolor","0xffffff");
								s5.addVariable("width","500");
								s5.addVariable("height","400");
								s5.write("player1");
							</script>

						</div>
						<?php endif;?>

						<?php echo $detail['content']?>
					</div>
					<br>
					<?php if($detail['tagsstr']!=""):?>
						<p><?php echo lang('tags')?>:<?php echo $detail['tagsstr']?></p>
					<?php endif;?>
				</div>


			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<?php $this->load->view($config['site_template'].'/foot');?>
</div>
</body>
</html>





