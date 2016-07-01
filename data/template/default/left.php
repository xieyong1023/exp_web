<div class="sbox2">
	<img src="<?php echo $config['site_templateurl'];?>/images/sub_btn.jpg" width="240" height="245" border="0" usemap="#Map" />
	<map name="Map" id="Map">
		<area shape="rect" coords="21,170,142,199" href="<?php echo site_url('category/info')?>" />
	</map>
    
    <form action="<?php echo site_url("search")?>" method="post"> 
    <input type="hidden" name="model" value="article" />
       <div class="ss" style="margin-top:10px;">
    	<input name="keyword" type="text" value="请输入搜索关键词" style="width:185px; height:22px; border:1px solid #c9cdca; float:left; color:#999;" onfocus="if(this.value=='请输入搜索关键词'){this.value='';}" onblur="if(this.value==''){this.value='请输入搜索关键词';}"/>
        <input name="" type="submit" style="background:url(<?php echo $config['site_templateurl'];?>/images/ssbtn.jpg) no-repeat; width:42px; height:24px; border:0px; float:right;" value=" "/>
        <div style="clear:both;"></div>
    </div>
    </form>
    
</div>
<div class="sbox3">
	<div class="tit"></div>
	<div class="cen">
		<img src="<?php echo $config['site_templateurl'];?>/images/btn1.jpg" width="177" height="171" border="0" usemap="#Map2" />
		<map name="Map2" id="Map2">
			<area shape="rect" coords="-22,-6,60,71" href="<?php echo site_url('category/sxzn')?>" />
			<area shape="rect" coords="116,1,200,76" href="<?php echo site_url('category/jszn')?>" />
			<area shape="rect" coords="0,89,67,177" href="<?php echo site_url('category/glzn')?>" />
			<area shape="rect" coords="116,91,212,190" href="<?php echo site_url('category/pxzn')?>" />
		</map>
        
	</div>
</div>