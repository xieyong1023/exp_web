<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head" style="height:70px;">
		<table class="menu">
			<tr>
				<td>
					<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
				</td>
			</tr>
		</table>
		<table cellSpacing=0 width="100%" class="content_list">
			<thead>
				<tr>
					<th width=40  align="left"><?=lang('id')?></th>
					<th  align=left><?=lang('title')?></th>
					<th width=150  align="left"><?=lang('category_model')?></th>
					<th width=150 align="left"><?=lang('category_dir')?></th>
					<th width=80 align="left"><?=lang('category_isnavigation')?></th>
					<th width=50  align="left"><?=lang('operate')?></th>
				</tr>
			</thead>
		</table>
	</div>
	<form name="formlist" id="formlist" action="<?=site_aurl($tablefunc)?>" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<div id="main" class="main">
			<table cellSpacing=0 width="100%" class="content_list">
				<tbody id="content_list"><?php if (isset($liststr)): ?><?=$liststr?><?php endif; ?></tbody>
			</table>
		</div>
		<div class="main_foot">
			<table>
				<tr>
					<td>
						<div class="func"><?php if (isset($funcstr)): ?><?=$funcstr?><?php endif; ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</form>
	<?php $this->load->view('admin_foot.php');?>
	
	<?php elseif($tpl=='view'):?>
	
	<link rel="stylesheet" href="<?=base_url('js/kindeditor/themes/default/default.css')?>" />
	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view" >
			<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td><?=lang('category_name')?></td>
				<td>
					<input type="text" name="name" id="name" class="validate input-text"  style="color:<?=isset($view['color'])?$view['color']:'';?>;" validtip="required" value="<?=isset($view['name'])?$view['name']:'';?>">
					<a class="selectcolor colorpicker" onclick="colorpicker(this,'color','name')">&nbsp;</a>
					<input type="hidden" name="color" id="color"  value="<?=isset($view['color'])?$view['color']:'';?>">
				</td>
			</tr>
				<td><?=lang('category_dir')?></td>
				<td><input type="text" name="dir" id="dir" class="validate input-text" validtip="required" value="<?=isset($view['dir'])?$view['dir']:'';?>"></td>
				<td><?=lang('category_target')?></td>
				<td><?=lang('category_self')?><input type="radio" name="target" value="_self" <?php if(!isset($view['target'])||$view['target']=='_self'){echo 'checked';} ?> /><?=lang('category_blank')?><input type="radio" name="target" value="_blank" <?php if(isset($view['target'])&&$view['target']==1){echo 'checked';} ?>  /></td>
			</tr>
			<tr>
				<td><?=lang('category_model')?></td>
				<td>
					<select name="model" id="model" class="validate" validtip="required">
						<?php foreach($modelarr as $key=>$model):?>
						<option value="<?=$key?>" <?php if(isset($view['model'])&&$key==$view['model']):?>selected<?php endif;?>><?=lang('model_'.$key)?></option>
						<?php endforeach;?>
					</select>
				</td>
				<td><?=lang('category_parent')?></td>
					<td>
						<select name="parent" onchange="setClass(this)">
						<?=$parentstr?>
						</select>
					</td>
			</tr>
			<tr>
				<td><?=lang('category_isnavigation')?></td>
				<td><?=lang('yes')?><input type="radio" name="isnavigation" value="1" <?php if(!isset($view['isnavigation'])||$view['isnavigation']==1){echo 'checked';} ?> /><?=lang('no')?><input type="radio" name="isnavigation" value="0" <?php if(isset($view['isnavigation'])&&$view['isnavigation']==0){echo 'checked';} ?>  /></td>
				<td><?=lang('category_isdisabled')?></td>
				<td><?=lang('yes')?><input type="radio" name="isdisabled" value="0" <?php if(!isset($view['isdisabled'])||$view['isdisabled']==0){echo 'checked';} ?> /><?=lang('no')?><input type="radio" name="isdisabled" value="1" <?php if(isset($view['isdisabled'])&&$view['isdisabled']==1){echo 'checked';} ?>  /></td>
			</tr>

				<td>目录提示</td>
				<td><input type="text" name="content" id="content" class="validate input-text" validtip="required" value=<?=isset($view['content'])?htmlspecialchars($view['content']):'';?> /></td></tr>
			<tr>
			<tr>
				<td><?=lang('category_pagesize')?></td>
				<td >
					<input type="text" name="pagesize" id="pagesize" size="5" class="input-text" value="<?=isset($view['pagesize'])?$view['pagesize']:'0';?>"></td>
			</tr>
			<tr>
				<td><?=lang('order')?></td>
				<td colspan="2"><input type="text" name="listorder" id="listorder" value="<?php if(isset($view['listorder'])){echo $view['listorder'];}else{echo '99';} ?>" class="input-text" ></td>
			</tr>
		</table>
		</div>
	</form>
<?php endif;?>