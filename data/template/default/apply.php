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
        <div class="joiner hz">

            <form name="apply" id="apply" action="" onsubmit="return subApply('<?=site_url('post/apply'.$langurl)?>')" method="post">
                <input type="hidden" name="category" id="category" value="<?=$category['id']?>">
                <p>
                    <span class="joiner_left">职位名称：</span>
                    <input validtip="required" type="text" name="jobs" id="jobs" class="joinerinput validate">
                </p>
                <p>
                    <span class="joiner_left">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
                    <input validtip="required" type="text" name="name" id="name" class="joinerinput validate">
                </p>
                <p>
                    <span class="joiner_left">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
                    <input type="radio" checked="checked" name="sex" id="sex" value="男" style="margin-top:8px;"/><span style="margin:5px 5px;">男</span><input type="radio" name="sex" id="sex" value="女" /><span style="margin:0px 5px;">女</span>
                </p>
                <p>
                    <span class="joiner_left">出生日期：</span>
                    <input validtip="required" type="text" name="birth" id="birth"  class="joinerinput validate"><span style="margin-left:10px;">格式：1988-06-08</span>
                </p>
                <p>
                    <span class="joiner_left">婚姻状况：</span>
                    <input type="radio" checked="checked"  name="marriage" id="marriage"  style="margin-top:8px;"/><span style="margin:5px 5px;">未婚</span><input type="radio"  name="marriage" id="marriage" /><span style="margin:0px 5px;">已婚</span>
                    <input type="radio"  name="marriage" id="marriage" /><span style="margin:0px 5px;">离异</span>
                </p>
                <p>
                    <span class="joiner_left">身高状况：</span>
                    <input  type="text" name="height" id="height" class="joinerinput"><span style="margin-left:10px;">CM</span>
                </p>
                <p>
                    <span class="joiner_left">户籍地址：</span>
                    <input validtip="required" type="text" name="address" id="address" class="joinerinput validate" style="width:340px;">
                </p>
                <p style="height:160px;">
                    <span class="joiner_left">教育经历：</span>
                    <textarea validtip="required" name="eduresume" id="eduresume"  class="joinertextarea validate"></textarea>
                </p>
                <p style="height:160px;">
                    <span class="joiner_left">工作经历：</span>
                    <textarea validtip="required" name="workresume" id="workresume"  class="joinertextarea validate"></textarea>
                </p>
                <p>
                    <span class="joiner_left">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编：</span>
                    <input name="postcode" id="postcode"  class="joinerinput" >
                </p>
                <p>
                    <span class="joiner_left">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</span>
                    <input  type="text" name="tel" id="tel" class="joinerinput" >
                </p>
                <p>
                    <span class="joiner_left">移动电话：</span>
                    <input validtip="required" type="text" name="phone" id="phone" class="joinerinput validate" >
                </p>
                <p>
                    <span class="joiner_left">电子邮箱：</span>
                    <input validtip="required,email" type="text" name="email" id="email" class="joinerinput validate" >
                </p>
                <p>
                    <span class="joiner_left">验证码：</span>
                    <input validtip="required" type="text" name="code" id="code" class="joinerinput validate" > <img src="<?php echo base_url()?>/vcode.php" alt="" id="code" style="margin-left: 5px; margin-top: 3px; cursor: pointer" onclick="reload()" title="看不清？点击刷新">
                </p>
                <p>
                    <span class="joiner_left"></span>
                    <input name="button" type="submit" class="joinerbtn" id="button" value="提交" />
                    <input  name="button2" type="reset" class="joinerbtn" id="button2" value="重置" />
                </p>
            </form>
        </div>


        <script type="text/javascript">
            $("#apply").validform();
            function reload()
            {
                document.getElementById('code').src="<?php echo base_url()?>/vcode.php?"+Math.random();
            }
        </script>

    </div>

    </div>
</div>


<?php $this->load->view($config['site_template'].'/foot');?>




    
