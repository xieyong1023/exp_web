<!-- 关于我们 -->
<div class="aboutus hz">
    <div class="aboutus_title">
        <img src="<?=$config['site_templateurl'];?>/images/icon_02.png" alt="" style="margin-top:9px;margin-right:9px;">
        <span>人才招聘</span>
    </div>
    <ul class="aboutus_Box">
        <?php
        $tmpData = x6cms_singlecategory(array('parent'=>8),'listorder',0,0,'category');
        if(count($tmpData)>0):
            foreach($tmpData as $item):?>
                <a href="<?=$item['url']?>"><li><?=$item['name']?></li></a>
            <?php endforeach;?>
            <?php unset($tmpData,$item);?>
        <?else:?>
            <a href="#"><li>人才招聘</li></a>
        <?php endif;?>
    </ul>
    <div class="boxbottom"></div>
</div>


<!-- 联系我们 -->
<div class="aboutus hz" style="margin-top:20px;background:url(<?=$config['site_templateurl'];?>/images/boxbg_03.png) no-repeat;">
    <div class="aboutus_title">
        <img src="<?=$config['site_templateurl'];?>/images/icon_03.png" alt="" style="margin-top:9px;margin-right:9px;">
        <span>联系我们</span>
    </div>
    <ul class="contactus_Box">
        <?php echo x6cms_fragment("nycontact")?>
    </ul>
    <div class="boxbottom"></div>
</div>
