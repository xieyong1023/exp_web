<?php $this->load->view('platform/head');?>
<body>
	
	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div class="cell">
						<table width="100%">
							<tbody>
								<tr>
									<td width="72" valign="top" align="center">
										<img class="large" src="<?php echo $user_detail['avatar']?>" />
										<div class="sep10"></div>
										<?php
										if($login){
											echo '<strong class="online">online</strong>';
										}
										?>										
									</td>
									<td width="10"></td>
									<td valign="top">
										<span class="bold"><?php echo $user_detail['username'];?></span>
										<div class="sep10"></div>
										<span>加入于    <?php echo $user_detail['createtime']?></span>
										<div class="sep10"></div>
										<span><?php echo $user_detail['signature']?></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="cell"></div>
				</div>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell"><?php echo $user_detail['username']?>最近发表的主题</div>
					<?php 
					if(! empty($list_data)){
						$abc = '';
						foreach ($list_data as $value){
							$abc .= '
					<div class="cell leftList">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<span class="title"><a href="'.base_url($value['category']['model'].'/'.$value['id']).'">'.$value['title'].'</a></span>
										<div class="sep5"></div>
										<span class="node"><a href="'.base_url('category/'.$value['category']['dir']).'">'.$value['category']['name'].'</a></span>
										<span class="dot">•</span>
										<span class="fade">来自于</span>
										<strong class="highLight"><a href="'.base_url('member/p/'.$value['username']).'">'.$value['username'].'</a></strong>
										<span class="dot">•</span>
										<span class="fade">'.$value['puttime'].'</span>';										
										if($value['lastreply'] != ''){
											$abc .= '
										<span class="dot">•</span>
										<span class="fade">最后回复来自</span>
										<strong class="highLight"><a href="'.base_url('member/p/'.$value['lastreply']).'">'.$value['lastreply'].'</a></strong>';
										}
										
									$abc .= 
									'</td>
									<td width="10"></td>
									<td width="50">
										<a class="reply_count">'.$value['comments'].'</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>';
						}
						echo $abc;
						unset($abc);
					}
					?>
					<div class="cell">
						<span class="chevron">»</span>
						<a href="<?php echo base_url('/member/p/'.$user_detail['username'].'/topics')?>"><?php echo $user_detail['username']?>创建的所有主题</a>
					</div>
				</div>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell"><?php echo $user_detail['username']?>最近的回复</div>
					
					<?php 
					if(! empty($comments)){
						$str = '';
						foreach ($comments as $value){
							$str .= 
					'<div class="blue">
						<span class="replyto">回复了 '.$value['replytouser'].' 创建的主题 › <a href="'.base_url('/article/'.$value['articleID']).'">'.$value['title'].'</a></span>
						<span class="replytime">'.$value['createtime'].'</span>
					</div>
					<div class="arrow">
							<img src="'.$config['site_templateurl'].'/images/arrow.png'.'"/>
						</div>
					<div class="cell">
						<span class="replycontent">'.$value['content'].'</span>
					</div>'
							;
						}
						echo $str;
						unset($str);
					}
					?>					
					<div class="cell">
						<span class="chevron">»</span>
						<a href="<?php echo base_url('member/p/'.$user_detail['username'].'/replies')?>"><?php echo $user_detail['username']?>的所有回复</a>
					</div>
				</div>
			</div>
			<div id="RightBox">
				<div class="box">
				</div>
			</div>
		</div>
		<div class="sep20 clear"></div>
	</div>
	
	<?php $this->load->view($config['site_template'].'/foot');?>
</body>
</html>