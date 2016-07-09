<?php $this->load->view('platform/head');?>
<body>
	<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/experiment.js';?>"></script>

	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<span class="black">我的实验</span>
					</div>				
				</div>
				<div class="sep20"></div>
				<div class="box" style="text-align: left;">
					<div class="cell">做过的实验(<?php echo $usecount?>)</div>
					<?php
					$a = '';
					$user_name = $this->session->userdata('user_name');
					foreach ($use as $exp):?>
					<div class="cell device">
						<table cellspacing="5">
							<tbody>								
								<tr>
									<td>设备名称</td>
									<td width="20"></td>
									<td><?php echo $exp['name']?></td>
								</tr>
								<tr>
									<td>状态</td>
									<td width="20"></td>
									<td>
										<?php if($exp['status'] == 0):?>
										<span id="<?php echo 'exp_'.$exp['id']?>" class="status_green">设备空闲</span>
										<?php else:?>
										<span id="<?php echo 'exp_'.$exp['id']?>" class="status_red">占用中...</span>
										<?php endif;?>
									</td>
								</tr>
									<td></td>
									<td width="20"></td>
									<td>
										<input id="device_id" type="hidden" value="<?php echo $exp['id']?>" />
										<?php if($exp['status'] == 0):?>										
										<input type="button" value="申请使用"  class="btn apply_btn" />
										<?php elseif($exp['status'] == 1):?>
											<?php if($exp['user'] == $this->session->userdata('user_name')):?>
											<input type="button" value="释放设备" class="btn free_btn" />
											<span><?php echo '远程桌面IP地址:'.$exp['ip'].'  密码:'.$exp['pass']?></span>
											<?php else:?>
											<input type="button" value="申请使用"  class="btn apply_btn btn_disable" />
											<?php echo '当前使用者: '.$exp['user'];?>
											<?php endif;?>										
										<?php endif;?>
									</td>
								<tr></tr>								
							</tbody>
						</table>
					</div>
					<?php endforeach;?>
				</div>
				<div class="sep20"></div>
				<div class="box" style="text-align: left;">
					<div class="cell">所有实验(<?php echo count($experiment)?>)</div>
					<?php
					$a = '';
					$user_name = $this->session->userdata('user_name');
					if(! empty($experiment)):
					foreach ($experiment as $exp):?>
					<div class="cell device">
						<table cellspacing="5">
							<tbody>								
								<tr>
									<td>设备名称</td>
									<td width="20"></td>
									<td><?php echo $exp['name']?></td>
								</tr>
								<tr>
									<td>状态</td>
									<td width="20"></td>
									<td>
										<?php if($exp['status'] == 0):?>
										<span id="<?php echo 'exp_'.$exp['id']?>" class="status_green">设备空闲</span>
										<?php else:?>
										<span id="<?php echo 'exp_'.$exp['id']?>" class="status_red">占用中...</span>
										<?php endif;?>
									</td>
								</tr>
									<td></td>
									<td width="20"></td>
									<td>
										<input id="device_id" type="hidden" value="<?php echo $exp['id']?>" />
										<?php if($exp['status'] == 0):?>										
										<input type="button" value="申请使用"  class="btn apply_btn" />
										<?php elseif($exp['status'] == 1):?>
											<?php if($exp['user'] == $this->session->userdata('user_name')):?>
											<input type="button" value="释放设备" class="btn free_btn" />
											<span><?php echo '远程桌面IP地址:'.$exp['ip'].'  密码:'.$exp['pass']?></span>
											<?php else:?>
											<input type="button" value="申请使用"  class="btn apply_btn btn_disable" />
											<?php echo '当前使用者: '.$exp['user'];?>
											<?php endif;?>										
										<?php endif;?>
									</td>
								<tr></tr>								
							</tbody>
						</table>
					</div>
					<?php endforeach;?>
					<?php endif;?>
				</div>
			</div>
			<div id="RightBox">
				<?php $this->load->view('platform/personbox')?>
				<div class="box rightList">
					<div class = "head">点击排行榜</div>
					<?php $this->load->view('platform/orderlist')?>
				</div>
			</div>
			<div class="sep20 clear"></div>
		</div>
	</div>
	
	<?php $this->load->view($config['site_template'].'/foot')?>
</body>
</html>