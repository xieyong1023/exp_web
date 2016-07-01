<script type="text/javascript" src="<?=$config['site_templateurl'];?>/js/image.js"></script>
<script type="text/javascript" src="<?=$config['site_templateurl'];?>/js/topnav.js"></script>
<script type="text/javascript" src="<?=$config['site_templateurl'];?>/js/public.js"></script>
<script type="text/javascript">
	var lang = {};
	lang.validform = {
		'onlyform':'<?=lang('valid_onlyform')?>',
		'required':{
			'text':'* <?=lang('valid_required_text')?>',
			'checkmultiple':'* <?=lang('valid_required_checkmultiple')?>',
			'select':'* <?=lang('valid_required_select')?>',
			'checkbox':'*  <?=lang('valid_required_checkbox')?>'
		},
		'min':{
			'text':'* <?=lang('valid_min_text')?>',
			'text1':'<?=lang('valid_min_text1')?> '
		},
		'max':{
			'text':'* <?=lang('valid_max_text')?>',
			'text1':'<?=lang('valid_max_text1')?>'
		},
		'email':{
			'text':'* <?=lang('valid_email_text')?>'
		},
		'equals':{
			'text':'* <?=lang('valid_equals_text')?>'
		}
	};
</script>


<div id="YP_Head">
	<div class="top"></div>
	<div class="nav">
		<ul>
			<li><a href="<?php echo base_url().$langurl?>">网站首页</a></li>
			<?php $tmpData = x6cms_singlecategory(array('parent'=>0,'isnavigation'=>1),'listorder',0,0,'category');$i=1;?>
			<?php foreach ($tmpData as $item): if($i<=9):?>
			<li><a href="<?php echo $item['url']?>"  target="<?php echo $item['target']?>" style="<?php echo $item['color']?>"><?php echo $item['name']?></a></li>
			<?php endif;$i++;endforeach;?>
			<?php unset($tmpData,$item);?>
		</ul>
	</div>
</div>
