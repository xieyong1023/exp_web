<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head">
		<form name="formsearch" id="formsearch" action="<?=site_aurl($tablefunc)?>" method="post">
			<table class="menu">
				<tr>
					<td>
						<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
						<span><?=lang('filter')?></span>
						<input type="text" name="keyword" value="<?=$search['keyword']?>" class="input-text">
						<select name="searchtype">
							<option value="title" <?php if ($search['searchtype'] == 'title'): ?>selected<?php endif; ?>><?=lang('title')?></option>
							<option value="id" <?php if ($search['searchtype'] == 'id'): ?>selected<?php endif; ?>><?=lang('id')?></option>
						</select>
						<select name="class"><option value=""><?=lang('type')?></option>
							<?php foreach ($classarr as $item): ?>
							<option value="<?=$item?>" <?php if ($item == $search['class']): ?>selected<?php endif; ?>><?=lang('type_'.$item)?></option>
							<?php endforeach; ?>
						</select>
						<input type="submit" class="btn" value="<?=lang('search')?>">
					</td>
				</tr>
			</table>
		</form>
		<table cellSpacing=0 width="100%" class="content_list">
			<thead>
				<tr>
					<th width=30  align="left"><input type="checkbox" onclick="checkAll(this)"></th>
					<th width=50  align="left"><?=lang('order')?></th>
					<th width=40  align="left"><?=lang('id')?></th>
					<th width=200 align=left><?=lang('title')?></th>
					<th width=100 align="left"><?=lang('type')?></th>
					<th align="left"><?=lang('remark')?></th>
					<th width=50 align="left"><?=lang('status')?></th>
					<th width=50  align="left"><?=lang('operate')?></th>
				</tr>
			</thead>
		</table>
	</div>
	
	<form name="formlist" id="formlist" action="<?=site_aurl($tablefunc)?>" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<div id="main" class="main" >
			<table cellSpacing=0 width="100%" class="content_list">
				<tbody id="content_list"><?php if (isset($liststr)): ?><?=$liststr?><?php endif; ?></tbody>
			</table>
		</div>
	</form>
	
	<div class="main_foot">
		<table>
			<tr>
				<td>
					<div class="func"><?php if (isset($funcstr)): ?><?=$funcstr?><?php endif; ?></div>
				</td>
			</tr>
		</table>
	</div>
	<?php $this->load->view('admin_foot.php');?>
<?php elseif($tpl=='view'):?>
	<link rel="stylesheet" href="<?=base_url('js/kindeditor/themes/default/default.css')?>" />
	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view" >
			<table cellSpacing=0 width="100%" class="content_view">
				<tr>
					<td width="80"><?=lang('title')?></td>
					<td><input type="text" name="title" id="title" class="validate input-text" validtip="required" value="<?=isset($view['title'])?$view['title']:'';?>"></td>
					<td rowspan="5" class="upic" valign="top">
						<img src="<?=isset($view['thumb'])&&$view['thumb']!=''?get_image_url($view['thumb']):get_image_url('data/nopic8080.gif')?>" onclick="uploadpic(this,'thumb')" width="150" id="imgthumb">
						<input type="hidden" name="thumb" id="thumb" value="<?=isset($view['thumb'])?$view['thumb']:'';?>">
						<br>
						<input type="button" class="btn" onclick="unsetThumb('thumb','imgthumb')" value="<?=lang('unsetpic')?>">	
					</td>
				</tr>
				<tr>
					<td><?=lang('type')?></td>
					<td>
						<select name="class" id="class" class="validate" validtip="required"><option value=""><?=lang('type')?></option>
							<?php foreach($classarr as $class):?>
							<option value="<?=$class?>" <?php if(isset($view['class'])&&$class==$view['class']):?>selected<?php endif;?>><?=lang('type_'.$class)?></option>
							<?php endforeach;?>
						</select>
					</td>
				</tr>
				<tr>
					<td><?=lang('remark')?></td>
					<td><textarea rows="3" cols="40" name="remark" id="remark" class="txtarea"><?=isset($view['remark'])?$view['remark']:'';?></textarea></td>
				</tr>
				<tr>
					<td><?=lang('status')?></td>
					<td><?=lang('status1')?>
						<input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> />
						<?=lang('status0')?>
						<input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?>  />
					</td>
				</tr>
				<tr>
					<td><?=lang('order')?></td>
					<td>
						<input type="text" name="listorder" id="listorder" value="<?php if(isset($view['listorder'])){echo $view['listorder'];}else{echo '99';} ?>" class="input-text" >
					</td>
				</tr>
			</table>
		</div>
	</form>
<?php endif;?>