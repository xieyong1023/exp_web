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
							<option value="username" <?php if ($search['searchtype'] == 'username'): ?>selected<?php endif; ?>>用户名</option>
							<option value="studentID" <?php if ($search['searchtype'] == 'studentID'): ?>selected<?php endif; ?>>学号</option>
							<option value="realname" <?php if ($search['searchtype'] == 'realname'): ?>selected<?php endif; ?>>真实姓名</option>
							<option value="school" <?php if ($search['searchtype'] == 'school'): ?>selected<?php endif; ?>>学校</option>
							<option value="college" <?php if ($search['searchtype'] == 'college'): ?>selected<?php endif; ?>>院系</option>
							<option value="department" <?php if ($search['searchtype'] == 'department'): ?>selected<?php endif; ?>>专业</option>
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
					<th width=40  align="left">id</th>
					<th width=32  align="left">头像</th>
					<th width=100 align="left">用户名</th>
					<th width=100  align="left">真实姓名</th>
					<th width=100  align="left">学号</th>
					<th width=150  align="left">学校</th>
					<th width=150  align="left">院系</th>
					<th align="left">专业</th>
					<th width=100  align="left">是否在线</th>
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
			<input type="hidden" name="salt" value="<?php echo $view['salt']?>" />
			<tr>
				<td>用户名</td>
				<td colspan="8">
					<input type="text" name="username" value="<?php echo $view['username']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>重置密码</td>
				<td>
					<input type="text" name="password" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>真实姓名</td>
				<td colspan="8">
					<input type="text" name="realname" value="<?php echo $view['realname']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>学号</td>
				<td colspan="8">
					<input type="text" name="studentID" value="<?php echo $view['studentID']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>学校</td>
				<td colspan="8">
					<input type="text" name="school" value="<?php echo $view['school']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>院系</td>
				<td colspan="8">
					<input type="text" name="college" value="<?php echo $view['college']?>" class="input-text" size="60"/>
				</td>
			</tr>
			<tr>
				<td>专业</td>
				<td colspan="8">
					<input type="text" name="department" value="<?php echo $view['department']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>email</td>
				<td colspan="8">
					<input type="text" name="email" value="<?php echo $view['email']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>联系电话</td>
				<td colspan="8">
					<input type="text" name="tel" value="<?php echo $view['tel']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>个性签名</td>
				<td colspan="8">
					<input type="text" name="signature" value="<?php echo $view['signature']?>" class="input-text" size="60" />
				</td>
			</tr>
			<tr>
				<td>注册时间</td>
				<td><?php echo date('Y-m-d H:i:s', $view['createtime'])?>
					<input type="hidden" name="createtime" value="<?php echo $view['createtime']?>" />
				</td>
			</tr>
			<tr>
				<td>注册IP</td>
				<td><?php echo $view['regip']?>
					<input type="hidden" name="regip" value="<?php echo $view['regip']?>" />
				</td>
			</tr>
			<tr>
				<td>上次登录时间</td>
				<td><?php echo date('Y-m-d H:i:s', $view['lasttime'])?>
					<input type="hidden" name="lasttime" value="<?php echo $view['lasttime']?>" />
				</td>
			</tr>
			<tr>
				<td>上次登录IP</td>
				<td><?php echo $view['lastip'];?>
					<input type="hidden" name="lastip" value="<?php echo $view['lastip']?>" />
				</td>
			</tr>
			<tr>
				<td>登录次数</td>
				<td><?php echo $view['logincount']?>
					<input type="hidden" name="logincount" value="<?php echo $view['logincount']?>" />
				</td>
			</tr>
			<tr>
				<td>是否在线</td>
				<td>
				<?php if($view['logined'] == 0){
					echo '<span style="	background-color: grey;	color: white;padding: 2px 8px;border-radius: 3px;">离线</span>';
				}else{
					echo '<span style="background-color: green;	color: white;padding: 2px 8px;border-radius: 3px;">在线</span>';
				}?>
				<input type="hidden" name="logined" value="<?php echo $view['logined']?>" />
				</td>
			</tr>
		</table>
	</form>
<?php endif;?>