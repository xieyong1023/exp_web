<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $config['seo_title']?> - <?php echo $config['site_name']?> </title>
<meta name="keywords" content="<?php echo $config['seo_keywords']?>" />
<meta name="description" content="<?php echo $config['seo_description']?>" />
<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico')?>" />
<link href="<?php echo $config['site_templateurl'];?>/css/css.css" type="text/css" rel="stylesheet" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="102" align="center" background="<?php echo $config['site_templateurl'];?>/images/index_03.jpg"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="712" align="left"><a href="<?php echo base_url()?>"><img src="<?php echo $config['site_templateurl'];?>/images/111_02.jpg" width="417" height="102" border="0" /></a></td>
        <td width="288" align="right" valign="top"><br />
              <a href="<?php echo base_url()?>">简体中文</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000" height="3" bgcolor="#1990f4"></td>
  </tr>
</table>
<br />
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="255" valign="top" style="line-height:25px;"><?php echo $category['content']?></td>
  </tr>
</table>
<br />
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="3" bgcolor="#1990f4"></td>
  </tr>
  <tr>
    <td height="50" align="center" style="line-height:20px;"><?php echo x6cms_fragment('copyright2');?></td>
  </tr>
</table>
</body>
</html>
