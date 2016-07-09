<?php if($tpl=='list'):?>
	<?php $this->load->view('admin_head.php');?>
	<div id="main_head" class="main_head">
		<form name="formsearch" id="formsearch" action="<?=site_aurl($tablefunc)?>" method="post">
			<table class="menu">
				<tr>
					<td>
						<a href="<?=site_aurl($tablefunc)?>" class="current"><?=lang('func_'.$tablefunc)?></a>
						<span>文章ID</span><input type="text" name="articleID" class="input-text" value="<?php if(isset($search['articleID'])) echo $search['articleID'];?>" />
						<span>作者</span><input type="text" name="author" class="input-text" value="<?php if(isset($search['author'])) echo $search['author'];?>" />
						<span>回复给</span><input type="text" name="replytouser" class="input-text" value="<?php if(isset($search['replytouser'])) echo $search['replytouser'];?>" />
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
					<th width=50  align="left"><?php echo '文章ID'?></th>
					<th width=200 align=left><?='文章标题'?></th>
					<th align="left"><?='内容'?></th>
					<th width=50  align="left"><?php echo '作者'?></th>
					<th width=50  align="left"><?php echo '回复给'?></th>
					<th width=150 align="left"><?php echo '时间'?></th>
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
   	    <input type="hidden" name="category" value="<?=isset($view['category'])?$view['category']:'0';?>">
		<div id="main_view" class="main_view">
			<table cellSpacing=0 width="100%" class="content_view">
				<tr>
					<td><?php echo '内容'?></td>
					<td colspan="5">
						<textarea type="text" name="content" id="title" class="validate input-text" validtip="required" cols="100" rows="5"><?=isset($view['content'])?$view['content']:'';?></textarea>
					</td>
				</tr>
				<tr>
					<td><?='时间'?></td>
					<td>
						<input type="text" name="createtime" id="replytime" readOnly onClick="WdatePicker({doubleCalendar:true,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="input-text Wdate" value="<?=isset($view['createtime'])&&$view['createtime']>0?date('Y-m-d H:i:s',$view['createtime']):date('Y-m-d H:i:s')?>">
					</td>
				</tr>
				<tr>
					<td><?=lang('status')?></td>
					<td colspan="3"><?=lang('comments_status1')?><input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> /><?=lang('comments_status0')?><input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?>  /></td>
				</tr>
			</table>
		</div>
	</form>
<?php endif;?>