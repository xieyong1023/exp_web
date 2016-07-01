<?php $this->load->view($config['site_template'].'/head');?>
<!--main-->
<div id="wrapper">
  <div class="left_wrap">

    <?php $this->load->view($config['site_template'].'/left');?>
    
    
  </div>
  <div class="right_wrap">
    <div class="where"> <a href="<?php echo base_url($langurl);?>">首页</a> > <?php echo lang('sitemap')?></div>
    <h2 class="lanmu_title"><?php echo $category['name']?><span></span></h2>
    <div class="about_us">
   
   <div class="view_title" style="text-align:left;"><h2><?php echo lang('sitemap')?></h2></div>
			<div class="view_con">
				<ul class="sitemap">
				<?php $tmpData = x6cms_allcategory();?>
				<?php foreach ($tmpData as $item): ?>
				<li class="level<?php echo $item['level']?>"><a href="<?php echo $item['url']?>"><?php echo $item['name']?></a></li>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
			  </ul>
			</div>
   
     
    </div>
  </div>
</div>
<?php $this->load->view($config['site_template'].'/foot');?>
		