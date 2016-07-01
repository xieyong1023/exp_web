<?php $this->load->view($config['site_template'].'/head');?>
<div class="pro_box">
    <div class="content">
        <div class="del"><p>你现在所在的位置是：<a href="<?php echo base_url().$langurl?>"> 首页</a> > 评论状态</p></div>
        <!--left-->
        <?php $this->load->view($config['site_template'].'/left');?>
        <!--left end-->
        <!--right-->
        <div class="side_right fr">
            <div class="title"><p>评论状态</p></div>




            <div class="contact">
                <div class="pro_tab">

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
        <!--right end-->
    </div>

    <?php $this->load->view($config['site_template'].'/foot');?>
    


	
