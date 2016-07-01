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
        <!-- message -->
        <ul class="messagerul hz">

            <?php foreach ($list as $k=>$item):?>
            <li>
                <div class="messli_title">
                    <div class="timer_02">留言者：<?php echo $item['author']?> 留言日期：<?php echo date("Y-m-d",$item['createtime'])?></div>
                    <strong>标题：<?php echo $item['title']?></strong>
                </div>
                <div class="messli_content_one hz">
                    <?php echo $item['description']?>
                </div>
                <?php if($item['content']!=''):?>
                <div class="messli_content_two hz">
                    <strong>回复：</strong><span><?php echo $item['content']?></span>
                </div>
                <?php endif;?>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="pager hz"><?php echo isset($pagestr)?$pagestr:''?></div>

        <form name="guestbook" id="guestbook" action="" onsubmit="return subGuestBook('<?=site_url('post/guestbook'.$langurl)?>')" method="post">
            <input type="hidden" name="category" id="category" value="<?=$category['id']?>">
        <div class="messageBox hz">
            <div class="box_00 hz">
                <div class="box_01">留言者：</div><input type="text" class="input_01 validate" validtip="required" name="author" id="author">
            </div>
            <div class="box_00 hz">
                <div class="box_01">标&nbsp;&nbsp;&nbsp;题：</div><input type="text" class="input_01 validate" validtip="required" name="title" id="title">
            </div>
            <div class="box_00 hz">
                <div class="box_01">正&nbsp;&nbsp;&nbsp;文：</div><textarea id="description" name="description" class="input_02" ></textarea><div class="box_02"></div>
            </div>
            <div class="box_00 hz">
                <div class="box_01">邮&nbsp;&nbsp;&nbsp;箱：</div><input type="text" class="input_01" name="email" id="email">
            </div>
            <div class="box_00 hz">
                <div class="box_01">电&nbsp;&nbsp;&nbsp;话：</div><input type="text" class="input_01 validate" validtip="required" name="phone" id="phone">
            </div>
            <div class="box_00 hz">
                <div class="box_01">验证码：</div><input type="text" name="code" id="code" class="input_03  validate" validtip="required"> <img src="<?php echo base_url()?>/vcode.php" alt="" id="code" style="margin-left: 5px; margin-top: 3px; cursor: pointer" onclick="reload()" title="看不清？点击刷新">
            </div>
        </div>

        <div class="messagebtn">
            <input name="button" type="submit" class="joinerbtn" id="button" value="确   定" />
            <input  name="button2" type="reset" class="joinerbtn" id="button2" value="重   置" />
        </div>

        </form>

        <script type="text/javascript">
            $("#guestbook").validform();
            function reload()
            {
                document.getElementById('code').src="<?php echo base_url()?>/vcode.php?"+Math.random();
            }
        </script>



    </div>
</div>


<?php $this->load->view($config['site_template'].'/foot');?>
