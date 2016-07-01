<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>
    <!--公告-->
<?php $this->load->view($config['site_template'].'/gonggao');?>
    <!--中间内容--->
    <div class="bodybox">

        <div class="mainbox">
            <?php $this->load->view($config['site_template'].'/left');?>
            <!--right-->
            <div class="right">
                <div class="lm lm_right">
                    <div class="fr dqwz">您现在所在的无位置是：<?php echo x6cms_location($category,' > ')?></div>
                    <h5 style="margin-left:10px;"><?php echo $category['name']?></h5></div>

<?php $tmpData = x6cms_singlecategory(array('parent'=>0),'listorder',0,0,'category');?>
<?php foreach ($tmpData as $item):?>
                <h3><span><a href="<?php echo $item1['url']?>" style="color: #C00"><?php echo $item['name']?></a></span></h3>

    <?php $tmpData1 = x6cms_singlecategory(array('parent'=>$item['id']),'listorder',0,0,'category');
    if(count($tmpData1)>0):
    ?>
                <div class="maplist">
                <?php foreach ($tmpData1 as $item1):?>
                    <a href="<?php echo $item1['url']?>"><?php echo $item1['name']?></a>
                <?php endforeach;?>
    <?php endif;?>
                    <?php unset($tmpData1,$item1);?>
                </div>
    <?php endforeach;?>
                <?php unset($tmpData,$item);?>


            </div>
        </div>
    </div>

<?php $this->load->view($config['site_template'].'/foot');?>