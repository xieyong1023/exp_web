<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>


<!-- main -->
<div class="main wrapper mc hz">
    <!-- 左边 -->
    <div class="main_left hz">

        <?php $this->load->view($config['site_template'].'/leftnav');?>

        <div class="newsleft_img hz">
            <img src="<?php echo $config['site_templateurl'];?>/images/pic_01.png" alt="">
        </div>
    </div>
    <!-- 右边 -->
    <div class="main_right">
        <!-- 面包屑 -->
        <div class="breadcrumb">
            <div class="breadcrumb_left">
                <span class="f_01"><?php echo $category['nameen']?></span>
                <span class="f_02"><?php echo $category['name']?></span>
            </div>
            <div class="breadcrumb_right">
                <?php echo x6cms_location($category," > ")?>
            </div>
        </div>
        <!-- 内容页 -->


        <div class="text">
            <h4><?php echo $detail['title']?></h4>
            <div class="text_1"><span>文章出自：<?php echo $detail['comefrom']?></span><span> 点击量：<?php echo $detail['hits']?></span><span>日期：<?php echo lang('puttime')?></span></div>
            <div class="news_ctn">
                <?php echo $detail['content']?>
            </div>
            <br>
            <?php if($detail['tagsstr']!=""):?>
                <p><?php echo lang('tags')?>:<?php echo $detail['tagsstr']?></p>
            <?php endif;?>
        </div>

    </div>
</div>


<?php $this->load->view($config['site_template'].'/foot');?>








