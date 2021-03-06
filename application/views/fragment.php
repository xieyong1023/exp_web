<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head">
		<form name="formsearch" id="formsearch" action="<?=site_aurl($tablefunc)?>" method="post">
			<table class="menu">
				<tr>
					<td>
						<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
						<span><?=lang('filter')?></span><input type="text" name="keyword" value="<?=$search['keyword']?>" class="input-text">
						<select name="searchtype">
							<option value="title" <?php if ($search['searchtype'] == 'title'): ?>selected<?php endif; ?>><?=lang('title')?></option>
							<option value="id" <?php if ($search['searchtype'] == 'id'): ?>selected<?php endif; ?>><?=lang('id')?></option>
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
					<th width=40  align="left"><?=lang('id')?></th>
					<th width=200  align=left><?=lang('title')?></th>
					<th width=200  align=left><?=lang('varname')?></th>
					<th align="left"><?=lang('remark')?></th>
					<th width=50 align="left"><?=lang('status')?></th>
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
	</form>
	<div class="main_foot">
		<table>
			<tr>
				<td>
					<div class="func"><?php if (isset($funcstr)): ?><?=$funcstr?><?php endif; ?></div>
				</td>
				<td align="right">
					<div class="page"><?php if (isset($pagestr)): ?><?=$pagestr?><?php endif; ?></div>
				</td>
			</tr>
		</table>
	</div>
	<?php $this->load->view('admin_foot.php');?>
<?php elseif($tpl=='view'):?>
	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view">
			<table cellSpacing=0 width="100%" class="content_view">
				<tr>
					<td><?=lang('title')?></td>
					<td>
						<input type="text" name="title" id="title" class="validate input-text" validtip="required" size="50" value="<?=isset($view['title'])?$view['title']:'';?>">
					</td>
				</tr>
				<tr>
					<td><?=lang('varname')?></td>
					<td><input type="text" name="varname" id="varname" class="validate input-text" validtip="required" size="50" value="<?=isset($view['varname'])?$view['varname']:'';?>"></td>
				</tr>
				<tr>
					<td><?=lang('content')?></td>
					<td><textarea  cols="110" rows="20" class="editor" name="content" id="content"><?=isset($view['content'])?$view['content']:'';?></textarea></td>
				</tr>
				<tr>
					<td><?=lang('remark')?></td>
					<td colspan="2"><textarea rows="3" cols="50" name="remark" id="remark" class="txtarea"><?=isset($view['remark'])?$view['remark']:'';?></textarea></td>
				</tr>
				<tr>
					<td><?=lang('status')?></td>
					<td>
						<?=lang('status1')?>
						<input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> />
						<?=lang('status0')?>
						<input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?>  />
					</td>
				</tr>
			</table>
		</div>
	</form>
<?php endif;?>