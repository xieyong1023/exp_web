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
							<option value="id" <?php if ($search['searchtype'] == 'id'): ?>selected<?php endif; ?>>设备ID</option>
							<option value="name" <?php if ($search['searchtype'] == 'name'): ?>selected<?php endif; ?>>设备名</option>
						</select>					
						<input type="submit" class="btn" value="<?=lang('search')?>">
					</td>
				</tr>
			</table>
		</form>
		<table cellSpacing=0 width="100%" class="content_list">
			<thead>
				<tr>
					<th width=40  align="center">id</th>
					<th width=100  align="left">设备ID</th>
					<th align="left">设备名</th>
					<th width=100 align="left">报告数目</th>
					<th width=100 align="left">下载所有报告</th>
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