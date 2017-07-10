<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $config['site_title']?> - <?php echo $config['site_name']?> </title>
	
	<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico')?>" />
	
	<!-- 样式表 -->
	<link rel="stylesheet" type="text/css" href="<?php echo $config['site_templateurl'];?>/css/style.css"/>
	
	<!-- 加载JQuery库 -->
	<script type="text/javascript" src="<?php echo $config['site_templateurl'] . '/js/jquery/jquery.min.js'; ?>"></script>

	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/public.js';?>"></script>
    <script type="text/javascript" src="<?php echo $config['site_templateurl'] . '/js/browser.js' ?>"></script>
    <script type="text/javascript" >

        HOSTNAME = "<?php echo "http://" . ($_SERVER['SERVER_NAME'] ? : $config['site_name'])?>" + "/index.php";

        var browser = getBrowserInfo();
        if(browser.type == "IE" && browser.version <= 6){
            window.confirm("您的浏览器版本太低，请升级浏览器!");
        }
    </script>
</head>
