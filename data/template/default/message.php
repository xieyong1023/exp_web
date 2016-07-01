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

				
                
                        <?php if (count($actionurl)>0): ?>
            <script language="javascript" type="text/javascript">
                var second = 3;
                setInterval("redirect()", 1000);
                function redirect(){
                    if (second < 0){
                        location.href = '<?=$actionurl[0]['url']?>';
                    }else{
                        $("#totalSecond").text(second--);
                    }
                }
            </script>
        <?php endif; ?>
        <div class="message1">
            <div class="title">
                <?=$message?>
            </div>
            <?php if (count($actionurl)>0): ?>
            <div class="content">
                <?=lang('message1')?>
                <span id="totalSecond" style="color:red;">3</span>
                <?=lang('message2')?>
                <ul>
                    <?php foreach ($actionurl as $val): ?>
                        <li><a href="<?=$val['url']?>">
                                <?=$val['name']?>
                            </a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
                
                
                
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<?php $this->load->view($config['site_template'].'/foot');?>
</div>
</body>
</html>