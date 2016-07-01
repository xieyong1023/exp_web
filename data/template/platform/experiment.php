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
					foreach ($use as $value){
						$a .= '
					<div class="cell exp_item" id="'.$value['id'].'">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<a class="exp_title" href="'.base_url('article/'.$value['article_id']).'">'.$value['title'].'</a>
									</td>
								</tr>
								<tr>
									<td style="padding: 5px 10px; font-size:14px;">
										<span>当前状态: </span>
										<span class="status';
						if($value['status']){
							$a .= ' red">使用中    </span><span class="user">当前用户'.$value['user'].'</span>';
						}else{
							$a .= '">空闲</span><span class="user"></span>';
						}
						$a .= '
									</td>
								</tr>
								<tr>
									<td>';
						if($value['status'] && $user_name == $value['user']){
							$a .= '<div class="key release">释放</div>';
						}else if($value['status'] && $user_name != $value['user']){
							$a .= "<span>请等待</span>";
						}else{
							$a .= '<div class="key apply">申请使用</div>';
						}
						$a .= 		'</td>
								</tr>
								<tr class="ip ';
						if($value['status'] && $user_name == $value['user']){
							$a .= '';
						}else{
							$a .= 'hide';
						}	
							$a .='">
									<td>
										<span>请用远程桌面访问</span>
										<span>IP地址: '.$value['ip'].'</span>
										<span>密码: '.$value['pass'].'</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>';
					} 
					echo $a;
					unset ($a);
					?>
				</div>
				<div class="sep20"></div>
				<div class="box" style="text-align: left;">
					<div class="cell">所有实验(<?php echo count($experiment)?>)</div>
					
					<?php
					$a = '';
					$user_name = $this->session->userdata('user_name');
					if(! empty($experiment)){
					foreach ($experiment as $value){
						$a .= '
					<div class="cell exp_item" id="'.$value['id'].'">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<a class="exp_title" href="'.base_url('article/'.$value['article_id']).'">'.$value['title'].'</a>
									</td>
								</tr>
								<tr>
									<td style="padding: 5px 10px; font-size:14px;">
										<span>当前状态: </span>
										<span class="status';
						if($value['status']){
							$a .= ' red">使用中    </span><span class="user">当前用户'.$value['user'].'</span>';
						}else{
							$a .= '">空闲</span><span class="user"></span>';
						}
						$a .= '
									</td>
								</tr>
								<tr>
									<td>';
						if($value['status'] && $user_name == $value['user']){
							$a .= '<div class="key release">释放</div>';
						}else if($value['status'] && $user_name != $value['user']){
							$a .= "<span>请等待</span>";
						}else{
							$a .= '<div class="key apply">申请使用</div>';
						}
						$a .= 		'</td>
								</tr>
								<tr class="ip ';
						if($value['status'] && $user_name == $value['user']){
							$a .= '';
						}else{
							$a .= 'hide';
						}	
							$a .='">
									<td>
										<span>请用远程桌面访问</span>
										<span>IP地址: '.$value['ip'].'</span>
										<span>密码: '.$value['pass'].'</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>';
					} 
					}
					echo $a;
					unset ($a);
					?>					
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