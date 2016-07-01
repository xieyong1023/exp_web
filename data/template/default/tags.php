<?php $this->load->view($config['site_template'].'/head');?>
<br />
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="195" height="300" valign="top"><table width="195" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?php $this->load->view($config['site_template'].'/leftnav');?></td>
      </tr>
      <tr>
        <td><?php $this->load->view($config['site_template'].'/left');?></td>
      </tr>
    </table></td>
    <td width="26">&nbsp;</td>
    <td width="779" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="51%" height="35" background="<?php echo $config['site_templateurl'];?>/images/index_24.jpg"><span class="z4"><strong><?php echo $category['name']?></strong></span></td>
        <td width="49%" align="right" background="<?php echo $config['site_templateurl'];?>/images/index_24.jpg">您的位置是：<?php echo x6cms_location($category,' &gt; ');?></td>
      </tr>
    </table>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%" height="469">&nbsp;</td>
        <td width="93%" valign="top" style="line-height:25px;">
		
        
        
				<?php $tmpData = x6cms_tagsData('article',$tags,5);?>
				<?php foreach($tmpData as $item):?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13" height="35" class="k3"><img src="<?php echo $config['site_templateurl'];?>/images/2.gif" width="4" height="5" /></td>
            <td width="622" class="k3"><a href="<?php echo $item['url']?>" style="<?php echo $item['color']?><?php echo $item['isbold']?>"><?php echo utf_substr($item['title'],70)?></a><?php if($k==0):?> <img src="<?php echo $config['site_templateurl'];?>/images/new.gif" width="22" height="9" /><?php endif;?></td>
            <td width="74" align="right" class="k3"><span class="z2"><?php echo date('Y-m-d',strtotime($item['puttime']))?></span></td>
          </tr>
        </table>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
				
                
				<?php $tmpData = x6cms_tagsData('product',$tags,5);?>
				<?php foreach($tmpData as $item):?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13" height="35" class="k3"><img src="<?php echo $config['site_templateurl'];?>/images/2.gif" width="4" height="5" /></td>
            <td width="622" class="k3"><a href="<?php echo $item['url']?>" style="<?php echo $item['color']?><?php echo $item['isbold']?>"><?php echo utf_substr($item['title'],70)?></a><?php if($k==0):?> <img src="<?php echo $config['site_templateurl'];?>/images/new.gif" width="22" height="9" /><?php endif;?></td>
            <td width="74" align="right" class="k3"><span class="z2"><?php echo date('Y-m-d',strtotime($item['puttime']))?></span></td>
          </tr>
        </table>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
                
                
				
				<?php $tmpData = x6cms_tagsData('ask',$tags,5);?>
				<?php foreach($tmpData as $item):?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13" height="35" class="k3"><img src="<?php echo $config['site_templateurl'];?>/images/2.gif" width="4" height="5" /></td>
            <td width="622" class="k3"><a href="<?php echo $item['url']?>" style="<?php echo $item['color']?><?php echo $item['isbold']?>"><?php echo utf_substr($item['title'],70)?></a><?php if($k==0):?> <img src="<?php echo $config['site_templateurl'];?>/images/new.gif" width="22" height="9" /><?php endif;?></td>
            <td width="74" align="right" class="k3"><span class="z2"><?php echo date('Y-m-d',strtotime($item['puttime']))?></span></td>
          </tr>
        </table>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
                
                
                
				
				<?php $tmpData = x6cms_tagsData('down',$tags,5);?>
				<?php foreach($tmpData as $item):?>
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13" height="35" class="k3"><img src="<?php echo $config['site_templateurl'];?>/images/2.gif" width="4" height="5" /></td>
            <td width="622" class="k3"><a href="<?php echo $item['url']?>" style="<?php echo $item['color']?><?php echo $item['isbold']?>"><?php echo utf_substr($item['title'],70)?></a><?php if($k==0):?> <img src="<?php echo $config['site_templateurl'];?>/images/new.gif" width="22" height="9" /><?php endif;?></td>
            <td width="74" align="right" class="k3"><span class="z2"><?php echo date('Y-m-d',strtotime($item['puttime']))?></span></td>
          </tr>
        </table>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
                
				
				<?php $tmpData = x6cms_tagsData('hr',$tags,5);?>
				<?php foreach($tmpData as $item):?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13" height="35" class="k3"><img src="<?php echo $config['site_templateurl'];?>/images/2.gif" width="4" height="5" /></td>
            <td width="622" class="k3"><a href="<?php echo $item['url']?>" style="<?php echo $item['color']?><?php echo $item['isbold']?>"><?php echo utf_substr($item['title'],70)?></a><?php if($k==0):?> <img src="<?php echo $config['site_templateurl'];?>/images/new.gif" width="22" height="9" /><?php endif;?></td>
            <td width="74" align="right" class="k3"><span class="z2"><?php echo date('Y-m-d',strtotime($item['puttime']))?></span></td>
          </tr>
        </table>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
        
        </td>
        <td width="5%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php $this->load->view($config['site_template'].'/foot');?>


		

