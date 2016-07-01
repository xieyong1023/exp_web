<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=lang('system_adminname')?> - Powered by <?=lang('system_name')?> <?=lang('system_version')?></title>
</head>
<frameset rows="85,*,22">
	<frame src="<?=site_aurl('main/main_top')?>" name="top" frameborder="0" noresize="noresize" scrolling="no" marginwidth="0" marginheight="0" />
	<frameset cols="150,12,*,8" id="frame-body">
		<frame src="<?=site_aurl('main/main_left')?>" frameborder=0 id="main_left" name="menu" />
		<frame src="<?=site_aurl('main/main_center')?>" id="main_center" name="main_center" frameborder="0" scrolling="no" />
		<frame src="<?=site_aurl($defaultfunc)?>" FRAMEBORDER=0 id="main_main" name="main" />
		<frame src="<?=site_aurl('main/main_right')?>" id="main_right" name="main_right" frameborder="0" scrolling="no" />
	</frameset>
	<frame src="<?=site_aurl('main/main_foot')?>"  name="footer1" frameborder="0" noresize="noresize" scrolling="no" marginwidth="0" marginheight="0" />
</frameset>
</html>