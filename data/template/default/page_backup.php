<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>
<div class="h20 w990"></div>
<div class="product inside fn-c w990 h-auto" id="main">
	<div class="product_sidebar h-auto fd-l">
        <?php $this->load->view($config['site_template'].'/sidebar_menu');?>
        <?php $this->load->view($config['site_template'].'/sidebar_honor');?>
        <?php $this->load->view($config['site_template'].'/sidebar_news');?>
        <?php $this->load->view($config['site_template'].'/sidebar_contact');?>
	</div>
	<div class="product_main  bg-fff h-auto fd-r">
		<div class="inside_title">
			<h3><?php echo $category['name']?></h3>
			<p>当前位置：<?php echo x6cms_location($category,'&nbsp;&gt;&nbsp;');?></p>
		</div>
        <div class="inside_main h-auto">
        	<?php echo $category['content']?>
        </div>
	</div>
</div>
<div class="h40 w990"></div>
<?php $this->load->view($config['site_template'].'/foot');?>