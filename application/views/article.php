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
						<select name="category">
							<option value="0"><?=lang('category_pselect')?></option>
							<?php foreach($categoryarr as $category):?>
							<option value="<?=$category['id']?>"<?php if ($search['category']==$category['id']): ?>selected<?php endif; ?>><?=$category['content']?></option>
							<?php endforeach;?>
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
					<th width=150 align="left"><?php echo '栏目'?></th>
					<th align="left"><?=lang('title')?></th>
					<th width=80  align="left"><?php echo '附件'?></th>
					<th width=150 align="left"><?php echo '发布时间'?></th>
					<th width=100 align="left">作者</th>
					<th width=50   align="left"><?=lang('hits')?></th>
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
	<script type="text/javascript" src="<?=base_url('js/admin.article.js')?>"></script>
	<form name="formview" id="formview" action="" method="post">
		<input type="hidden" name="action" id="action" value="<?=site_aurl($tablefunc)?>">
		<input type="hidden" name="id" value="<?=isset($view['id'])?$view['id']:'';?>">
		<div id="main_view" class="main_view">
		<table cellSpacing=0 width="100%" class="content_view">
		<tr>
			<td>
				<?=lang('category_pselect')?>
			</td>
			<td colspan="4">
				<select name="category" id="category" class="validate" validtip="required">
				<?php foreach($categoryarr as $category):?>
				<option value="<?=$category['id']?>"<?php if (isset($view['category'])&&$view['category']==$category['id']): ?>selected<?php endif; ?>><?=$category['content']?></option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<?=lang('title')?>
			</td>
			<td colspan="4">
				<input type="text" name="title" id="title" size="60" style="color:<?=isset($view['color'])?$view['color']:'';?>" class="validate input-text" validtip="required"  value="<?=isset($view['title'])?$view['title']:'';?>">
				<a  class="selectcolor colorpicker" onclick="colorpicker(this,'color','title')">&nbsp;</a>
				<input type="hidden" name="color" id="color"  value="<?=isset($view['color'])?$view['color']:'';?>">
				<input type="checkbox" id="isbold" name="isbold" <?=isset($view['isbold'])&&$view['isbold']==1?'checked':'';?> value="1"><?=lang('isbold')?>
			</td>
		</tr>
   		<tr>
			<td>
				<?=lang('content')?>
			</td>
			<td colspan="5">
				<textarea style="width:668px;height:300px;" name="content" id="content" class="editor"><?=isset($view['content'])?htmlspecialchars($view['content']):'';?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<?=lang('hits')?>
			</td>
			<td>
				<input type="text" name="hits" id="hits"  class="input-text" value="<?=isset($view['hits'])?$view['hits']:0?>">
			</td>
			<td>
				<?=lang('puttime')?>
				<input type="text" name="puttime" id="puttime"  readOnly onClick="WdatePicker({doubleCalendar:true,dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="input-text Wdate" value="<?=isset($view['puttime'])?date('Y-m-d H:i:s',$view['puttime']):date('Y-m-d H:i:s')?>">
			</td>
		</tr>
		<tr>
			<td>
				作者
			</td>
			<td>
				<input type="text" name="author" id="author"  class="input-text" value="<?=isset($view['author'])?$view['author']:'admin'?>" />
			</td>
		</tr>
		<tr>
			<td>
				<?=lang('order')?>
			</td>
			<td>
				<input type="text" name="listorder" id="listorder" value="<?php if(isset($view['listorder'])){echo $view['listorder'];}else{echo '999';} ?>" class="input-text">
			</td>
			<td>
				<?=lang('status')?>
				<?=lang('status1')?>
				<input type="radio" name="status" value="1" <?php if(!isset($view['status'])||$view['status']==1){echo 'checked';} ?> />
				<?=lang('status0')?>
				<input type="radio" name="status" value="0" <?php if(isset($view['status'])&&$view['status']==0){echo 'checked';} ?>  />
			</td>
		</tr>
		<tr>
			<td>附件</td>
			<?php if(isset($view['attachfile'])):?>
			<td><a href="<?php echo site_url('download/article/').$view['id']; ?>">点击下载</a></td>
			<?php else:?>
			<td>无</td>
			<?php endif;?>
		</tr>
		<input type="hidden" name="attachfile" id="attachfile" value="<?php if(isset($view['attachfile'])){echo $view['attachfile'];}?>" />
		</table>
		</div>
	</form>
	<form enctype="multipart/form-data" method="post" id="upload_file">
		<table cellSpacing=0 width="100%" class="content_view">
			<tr>
				<td>上传文件</td>
				<td>
					<input type="file" id="file" class="input-text" name="file" />
					<input type="button" id="btn" class="btn" value="上传" />
					<span id="message" style="display:none"></span>
					<span style="float:right;"><font color="red">请在提交表单前上传文件</font></span>
				</td>
			</tr>
		</table>
	</form>
<?php endif;?>