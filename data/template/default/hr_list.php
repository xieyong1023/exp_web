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


                <!-- 岗位表 -->
                <table class="join_table" cellpadding='0' cellspacing='0'>
                    <tr class="tr_01">
                        <td width='195' style="border-left:1px solid #A3DDF4;">招聘职位</td>
                        <td width='127'>工作地区</td>
                        <td width='127'>学历要求</td>
                        <td width='127'>性别要求</td>
                        <td width='137'>了解详情</td>
                    </tr>
                    <?php foreach ($list as $k=>$item):?>
                    <tr>
                        <td><?php echo $item['title']?></td>
                        <td><?php echo $item['city']?></td>
                        <td><?php echo $item['year']?></td>
                        <td><?php echo $item['sex']?></td>
                        <td><a href="<?php echo $item['url']?>" class="cinfor">点击详情</a></td>
                    </tr>
                    <?php endforeach; ?>
                 </table>

            </ul>
            <div class="pager hz"><?php echo isset($pagestr)?$pagestr:''?></div>
        </div>
    </div>


<?php $this->load->view($config['site_template'].'/foot');?>

