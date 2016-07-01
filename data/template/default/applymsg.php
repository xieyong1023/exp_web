<?php $this->load->view($config['site_template'].'/head');?>
<?php $this->load->view($config['site_template'].'/nyban');?>


<!-- main -->
<div class="main wrapper mc hz">
    <!-- 左边 -->
    <div class="main_left hz">

        <?php $this->load->view($config['site_template'].'/leftapply');?>

        <?php $this->load->view($config['site_template'].'/left');?>
    </div>
    <!-- 右边 -->
    <div class="main_right">
        <!-- 面包屑 -->
        <div class="breadcrumb">
            <div class="breadcrumb_left">
                <span class="f_01">apply</span>
                <span class="f_02">在线应聘</span>
            </div>
            <div class="breadcrumb_right">
                <a href="<?=base_url($langurl);?>"><?=lang('home')?></a> > 在线应聘
            </div>
        </div>
        <!-- 内容页 -->


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
                <div class="title">
                    <?=$message?>
                </div>
                <?php if (count($actionurl)>0): ?>
                <div class="content">
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
	
    
