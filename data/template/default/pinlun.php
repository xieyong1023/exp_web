<div class="pro_dl">
    <?php
    foreach($comments as $des):?>
        <dl>
            <dt>
            <p><?php echo $des['description']?></p>
            </dt>
            <dd><span><?php echo date("Y-m-d H:i:s",$des['createtime'])?></span></dd>
        </dl>
    <?php endforeach;?>
    <div class="messages">
        <div class="mes_tel">
            <p>我要评论</p>
        </div>
        <form name="comments" id="comments" action="" onsubmit="return subComments('<?=site_url('post/comments'.$langurl)?>')" method="post">
            <input type="hidden" name="category" id="category" value="<?=$detail['id']?>">
            <input  name="title" id="title" type="hidden" value="<?php echo $detail['title']?>" />
            <div class="mes_text">
                <textarea class="mes_text_1 validate" validtip="required" name="description" id="description"></textarea>
            </div>

            <div class="mes_sub">
                <input  class="mes_sub_1" name="input" type="submit" value="发 表" />
            </div>
        </form>

        <script type="text/javascript">
            $("#comments").validform();
        </script>

    </div>