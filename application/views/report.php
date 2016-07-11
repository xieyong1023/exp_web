<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head">
		<form name="formsearch" id="formsearch" action="<?=site_aurl($tablefunc)?>" method="post">
			<table class="menu">
				<tr>
					<td>
						<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
						<span><?=lang('filter')?></span>
						<input type="text" name="exp" value="<?=$search['exp']?>" class="input-text">
						<select name="exp_select">
							<option value="exp_name" <?php if ($search['exp_select'] == 'exp_name'): ?>selected<?php endif; ?>><?='设备名'?></option>
							<option value="exp_id" <?php if ($search['exp_select'] == 'exp_id'): ?>selected<?php endif; ?>><?='设备ID'?></option>
						</select>
						<input type="text" name="user" value="<?php echo $search['user']?>" class="input-text" />
						<select name="user_select">
							<option value="username" <?php if($search['user_select'] == 'username') echo 'selected'?>>用户名</option>
							<option value="id" <?php if($search['user_select'] == 'id') echo 'selected'?>>学号</option>
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
					<th width=50  align="left"><?php echo '实验ID'?></th>
					<th align="left"><?php echo '实验名'?></th>
					<th width=100 align="left">用户名</th>
					<th width=200 align="left"><?php echo '学号'?></th>
					<th width=150 align="left"><?php echo '上传时间'?></th>
					<th width=80  align="left"><?php echo '下载'?></th>
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
<?php endif;?>