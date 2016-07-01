<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $config['seo_title']?> - <?php echo $config['site_name']?> </title>
	<meta name="keywords" content="<?php echo $config['seo_keywords']?>" />
	<meta name="description" content="<?php echo $config['seo_description']?>" />
	<link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico')?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config['site_templateurl'];?>/css/style.css"/>
	<script language="javascript" type="text/javascript" src="<?php echo $config['site_templateurl'];?>/js/MSClass.js"></script>
</head>

<body>
<div id="YP_Web">
<?php $this->load->view($config['site_template'].'/head');?>
	<div id="YP_Main">
		<div class="left">
			<div class="box1">
				<div class="vedio">
					<div class="tit"  onclick="location='<?php echo site_url('category/video')?>'"></div>
					<div class="cen">
						<?php $tmpData = x6cms_modellist('video',18,'default',1,0);
							foreach($tmpData as $item):
							if($item['videourl']==''):
						?>
						<img src="<?php echo ($item['thumb']!=base_url())?$item['thumb']:base_url()."images/nopic.gif"?>" width="273" height="204" />
							<?php else:?>
								<div id="player1">正在加载视频...</div>
								<script type="text/javascript" src="<?php echo $config['site_templateurl'];?>/flvplayer/swfobject.js"></script>
								<script type="text/javascript">
									var s5 = new SWFObject("<?php echo $config['site_templateurl'];?>/flvplayer/flvPlayer.swf","playlist","273","204","7");
									s5.addParam("allowfullscreen","true");
									//s5.addVariable("autostart","true");
									s5.addVariable("repeat","true");
									s5.addVariable("image","<?php echo $item['thumb'];?>");
									s5.addVariable("file","<?php echo $item['videourl'];?>");
									//s5.addVariable("backcolor","0x000000");
									//s5.addVariable("frontcolor","0xCCCCCC");
									//s5.addVariable("lightcolor","0xffffff");
									s5.addVariable("width","273");
									s5.addVariable("height","204");
									s5.write("player1");
								</script>
							<?php endif;?>
							<?php endforeach;unset($tmpData,$item)?>
					</div>
				</div>
				<div class="news">
					<div class="tit"><span style="color:#518ad7; float:right; line-height:33px; font-size:12px; font-weight:normal; margin-right:10px;"><a href="<?php echo site_url("category/news").$langurl?>">更多>></a></span></div>
					<div class="cen">
						<ul>
							<?php $tmpData = x6cms_modellist('article',16,'default',6,0);
							$i=1;
							foreach($tmpData as $item):
							?>
							<li><span style="float:right;">[<?php echo date("Y-m-d",strtotime($item['puttime']))?>]</span><a href="<?php echo $item['url']?>" style="<?=$item['color']?><?=$item['isbold']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo utf_substr($item['title'],48)?><?php if($i<=2):?><img src="<?php echo $config['site_templateurl'];?>/images/new.gif" /><?php endif;?></a></li>
							<?php $i++;endforeach;unset($tmpData,$item)?>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div class="box2">
				<div class="about">
					<div class="tit"><span style="color:#518ad7; float:right; line-height:33px; font-size:12px; font-weight:normal; margin-right:10px;"><a href=" onclick="location='<?php echo site_url('category/about')?>'"">更多>></a></span></div>
					<div class="cen">
						<?php echo x6cms_fragment('about')?>
					</div>
				</div>
				<div class="zc">
					<div class="tit"><span style="color:#518ad7; float:right; line-height:33px; font-size:12px; font-weight:normal; margin-right:10px;"><a href="<?php echo site_url("category/policy").$langurl?>">更多>></a></span></div>
					<div class="cen">
						<ul>
							<?php $tmpData = x6cms_modellist('article',17,'default',6,0);
							foreach($tmpData as $item):
							?>
							<li><a href="<?php echo $item['url']?>" style="<?=$item['color']?><?=$item['isbold']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo utf_substr($item['title'],64)?></a></li>
								<?php endforeach;unset($tmpData,$item)?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="rgt">
			<div class="rbox1"><img src="<?php echo $config['site_templateurl'];?>/images/rgt1.jpg" width="255" height="212" border="0" usemap="#Map" />
				<map name="Map" id="Map">
					<area shape="rect" coords="21,143,142,172" href="<?php echo site_url('category/info')?>" />
				</map>
			</div>
    
    <form action="<?php echo site_url("search")?>" method="post"> 
    <input type="hidden" name="model" value="article" />
       <div class="ss">
    	<input name="keyword" type="text" value="请输入搜索关键词" style="width:211px; height:22px; border:1px solid #c9cdca; float:left; color:#999;" onfocus="if(this.value=='请输入搜索关键词'){this.value='';}" onblur="if(this.value==''){this.value='请输入搜索关键词';}"/>
        <input name="" type="submit" style="background:url(<?php echo $config['site_templateurl'];?>/images/ssbtn.jpg) no-repeat; width:42px; height:24px; border:0px; float:right;" value=" "/>
        <div style="clear:both;"></div>
    </div>
    </form>
            
			<div class="rbox2">
				<div class="tit"></div>
				<div class="cen">
					<img src="<?php echo $config['site_templateurl'];?>/images/btn1.jpg" width="177" height="171" border="0" usemap="#Map2" />
					<map name="Map2" id="Map2">
						<area shape="rect" coords="-7,1,67,80" href="<?php echo site_url('category/sxzn')?>" />
						<area shape="rect" coords="111,3,179,82" href="<?php echo site_url('category/jszn')?>" />
						<area shape="rect" coords="3,91,62,169" href="<?php echo site_url('category/glzn')?>" />
						<area shape="rect" coords="114,93,185,174" href="<?php echo site_url('category/pxzn')?>" />
					</map>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div class="pp">
			<div class="tit" onclick="location='<?php echo site_url('category/show')?>'"></div>
			<div class="cen">
				<div id="dee">

					<table width="980" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<?php $tmpData = x6cms_modellist('product',19,'default',15,0);
							foreach($tmpData as $item):
							?>
							<td align="center" valign="middle" style="line-height:25px; width:196px; height:152px; padding-left:5px;">
								<a href="<?php echo $item['url']?>" style="<?=$item['color']?><?=$item['isbold']?>" target="_blank" title="<?php echo $item['title']?>">
									<img src="<?php echo ($item['thumb']!=base_url())?$item['thumb']:base_url()."images/nopic.gif"?>" width="188" height="144"/><br>
									<?php echo utf_substr($item['title'],26)?>
								</a>
							</td>
							<?php endforeach;unset($tmpData,$item)?>
						</tr>
					</table>
				</div>
				<script language="javascript" type="text/javascript">new Marquee("dee","left",1,953,184,30,3000)</script>
				</div>
				</div>
				<div style="clear:both;"></div>
				<div class="link">
					<div class="tit"></div>
				<div class="cen">
				<?php $tmpData = x6cms_link(1);foreach($tmpData as $item):?>
				<a href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><img src="<?php echo $item['thumb']?>" height="54"/></a>
				<?php endforeach;unset($tmpData,$item)?>
				</div>
				<div style="clear:both;"></div>
				</div>
				</div>

				</div>
				</body>
				</html>
<?php $this->load->view($config['site_template'].'/foot');?>