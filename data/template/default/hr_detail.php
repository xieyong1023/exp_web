<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>


<!-- main -->
<div class="main wrapper mc hz">
    <!-- 左边 -->
    <div class="main_left hz">

        <?php $this->load->view($config['site_template'].'/leftnav');?>

        <?php $this->load->view($config['site_template'].'/left');?>
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
              <div class="news_ctn">


                <table width="96%"  cellpadding="5" cellspacing="1" >
                    <tr style="background-color: #FFFFFF">
                        <td>年龄要求：<?php echo $detail['age']?></td>
                        <td>工作地点：<?php echo $detail['city']?></td>
                        <td>性别要求：<?php echo $detail['sex']?></td>
                    </tr>
                    <tr style="background-color: #FFFFFF">
                        <td>学历要求：<?php echo $detail['year']?></td>
                        <td>工资待遇：<?php echo $detail['gzdy']?></td>
                        <td>招聘人数：<?php echo $detail['num']?></td>
                    </tr>
                </table>
                <div style="margin-top: 10px">职位描述：</div>

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
