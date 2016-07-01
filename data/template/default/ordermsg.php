<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>
<!--中间内容--->
<div class="bodybox">
    <?php $this->load->view($config['site_template'].'/leftnav');?>
    <div class="mainbox">
        <?php $this->load->view($config['site_template'].'/left');?>
        <!--right-->
        <div class="right">
            <div class="lm rightlm">
                <div class="fr dqwz">您现在所在的无位置是：<a href="<?php echo base_url().$langurl?>"> 首页</a> > 在线订单</p></div>
                <h5 style="margin-left:10px;font-size:18px">在线订单</h5></div>








            <?php if (count($actionurl)>0): ?>
                <script language="javascript" type="text/javascript">
                    var second = 3;
                    setInterval("redirect()", 1000);
                    function redirect(){
                        if (second < 0){
                            location.href = '<?=$actionurl[0]['url']?>';
                        }else{
                            $("#totalSecond").text(second--);
                        }
                    }
                </script>
            <?php endif; ?>
            <div class="message1">
                <div class="title1">
                    <?=$message?>
                </div>
                <?php if (count($actionurl)>0): ?>
                <div class="content1">
                    <?=lang('message1')?>
                    <span id="totalSecond" style="color:red;">3</span>
                    <?=lang('message2')?>
                    <ul>
                        <?php foreach ($actionurl as $val): ?>
                            <li><a href="<?=$val['url']?>">
                                    <?=$val['name']?>
                                </a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>






        </div>
    </div>
</div>
<?php $this->load->view($config['site_template'].'/foot');?>



