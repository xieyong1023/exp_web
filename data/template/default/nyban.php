<!-- banner -->
<div class="banner hz mc pr" id="slide">
    <ul class="bannerul">
        <?php $tmpData = x6cms_slide(9);?>
        <?php foreach($tmpData as $item):?>
        <li><img src="<?=$item['thumb']?>" alt="<?=$item['title']?>"></li>
        <?php endforeach;?>
        <?php unset($tmpData,$item);?>
    </ul>

    <a href="javascript:" id="prev"></a>
    <a href="javascript:" id="next"></a>
</div>