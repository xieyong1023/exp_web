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
        <ul class="newslist hz">

            <?php foreach ($list as $k=>$item):?>
                <li>
                    <a href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>" class="news_title">
                        <span class="timer">[<?php echo date("m-d",strtotime($item['puttime']))?>]</span>
                        <span><?php echo utf_substr($item['title'],80)?></span>
                    </a>
                    <div class="news_content hz">
                        <a href="<?php echo $item['url']?>" target="_blank" class="article"><?php echo subString(clearHTML($item['content']),0,280)?>... </a><a href="<?php echo $item['url']?>" target="_blank" class="more">[查看更多]</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="pager hz"><?php echo isset($pagestr)?$pagestr:''?></div>
    </div>
</div>


<?php $this->load->view($config['site_template'].'/foot');?>


