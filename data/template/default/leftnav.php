<div class="sbox1">
	<div class="tit"><?php echo $category['top']['name']?></div>
	<div class="cen">
		<ul>
			<?php
			$tmpData = x6cms_singlecategory(array('parent'=>$category['top']['id']),'listorder',0,0,'category');
			if(count($tmpData)>0):
				foreach($tmpData as $item):?>
					<li><a href="<?=$item['url']?>" target="<?php echo $item['target']?>" style="<?php echo $item['color']?>"><?=$item['name']?></a></li>
				<?php endforeach;?>
				<?php unset($tmpData,$item);?>
			<?else:?>
				<a href="<?php echo $category['top']['url']?>"><li><?php echo $category['top']['name']?></li></a>
			<?php endif;?>
		</ul>
	</div>
</div>
