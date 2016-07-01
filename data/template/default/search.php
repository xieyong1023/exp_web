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
			<?php $this->load->view($config['site_template'].'/left');?>
		</div>
		<div class="sub_rgt">
			<div class="tit"><span style="float:right; font-weight:normal; font-size:12px; margin-right:8px; color:#666666; line-height:33px;">您当前的位置：<a href="<?php echo base_url().$langurl?>">首页</a> > 信息检索 </span>信息检索</div>
			<div class="cen2">

				<ul>
					<?php foreach ($list as $k=>$item):?>
					<li><span style="float:right;">[<?php echo date("Y-m-d",strtotime($item['puttime']))?>]</span><a href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"  style="<?=$item['color']?><?=$item['isbold']?>"><?php echo utf_substr($item['title'],80)?></a></li>
					<?php endforeach;?>
				</ul>

				<div class="page"><?php echo isset($pagestr)?$pagestr:''?></div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<?php $this->load->view($config['site_template'].'/foot');?>
</div>
</body>
</html>