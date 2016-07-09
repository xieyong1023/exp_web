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
							<option value="id" <?php if ($search['searchtype'] == 'id'): ?>selected<?php endif; ?>><?='设备ID'?></option>
							<option value="name" <?php if ($search['searchtype'] == 'name'): ?>selected<?php endif; ?>><?='设备名称'?></option>
							<option value="article_id" <?php if ($search['searchtype'] == 'article_id'): ?>selected<?php endif; ?>><?='文章ID'?></option>
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
					<th width=300 align="left"><?='设备名称'?></th>
					<th width=40  align="left"><?php echo '文章ID'?></th>
					<th align="left"><?php echo '文章名'?></th>
					<th width=120  align="left"><?php echo '远程桌面IP地址'?></th>
					<th width=50  align="left"><?php echo '密码'?></th>
					<th width=100  align="left"><?php echo '使用者'?></th>
					<th width=50  align="left"><?=lang('status')?></th>
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
	<script type="text/javascript" src="<?=base_url('js/admin.device.js')?>"></script>
	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td>设备名称</td>
				<td colspan="8">
					<input type="text" name="name" id="name" class="validate input-text" size="60" validtip="required" value="<?=isset($view['name'])?$view['name']:'';?>" />
				</td>
			</tr>
			<tr>
				<td>远程桌面IP地址</td>
				<td colspan="8">
					<input type="text" name="ip" id="ip" class="validate input-text" size="60" validtip="required" value="<?=isset($view['ip'])?$view['ip']:'';?>"/>
				</td>
			</tr>
			<tr>
				<td>密码</td>
				<td colspan="8">
					<input type="text" name="pass" id="pass" class="validate input-text" size="60" validtip="required" value="<?=isset($view['pass'])?$view['pass']:'';?>"/>
				</td>
			</tr>
			<tr>
				<td>使用者</td>
				<td colspan="8">
					<input type="text" name="user" id="user" class="input-text" size="60" value="<?=isset($view['user'])?$view['user']:'';?>"/>
				</td>
			</tr>
			<tr>
				<td>状态</td>
				<td colspan="3"><?=lang('dev_status1')?>
					<input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> />
					<?=lang('dev_status0')?>
					<input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?> id="free" />
				</td>
			</tr>
			<tr>
				<td>选择文章</td>
				<td colspan="2">
					<select name="category" id="category" class="validate" validtip="required">
					<?php foreach($categoryarr as $category):?>
					<option value="<?=$category['id']?>"><?=$category['content']?></option>
					<?php endforeach;?>
					</select>
				</td>
				<td colspan="4">
					<select name="article" id="article">
					<option value=""></option>
					</select>
				</td>
				<td>文章ID</td>
				<td>
					<input type="text" name="article_id" id="article_id" class="input-text" size="10" value="<?=isset($view['article_id'])?$view['article_id']:'';?>" />
				</td>
			</tr>
		</table>
		</div>
	</form>
<?php endif;?>