<?php $this->load->view('platform/head');?>
<body>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/topics.js';?>"></script>
	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<a href="<?php echo site_url('member/p/'.$user_detail['username']);?>"><?php echo $user_detail['username']?></a>
						<span class="chevron"> › </span>
						<span class="black"><?php echo $category?></span>
						<input id="Category" type="hidden" value="<?php echo $category?>" />
					</div>
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
										<span class="title"><a href="'.site_url($value['category']['model'].'/'.$value['id']).'">'.$value['title'].'</a></span>
										<div class="sep5"></div>
										<span class="node"><a href="'.site_url('category/'.$value['category']['dir']).'">'.$value['category']['name'].'</a></span>
										<span class="dot">•</span>
										<span class="fade">来自于</span>
										<strong class="highLight"><a href="'.site_url('member/p/'.$value['username']).'">'.$value['username'].'</a></strong>
										<span class="dot">•</span>
										<span class="fade">'.$value['puttime'].'</span>';										
										if($value['lastreply'] != ''){
											$abc .= '
										<span class="dot">•</span>
										<span class="fade">最后回复来自</span>
										<strong class="highLight"><a href="'.site_url('member/p/'.$value['lastreply']).'">'.$value['lastreply'].'</a></strong>';
										}
										
									$abc .= 
									'</td>
									<td width="10"></td>
									<td width="50">
										<a href="'.site_url($value['category']['model'].'/'.$value['id']).'" class="reply_count">'.$value['comments'].'</a>
									</td>
									<td width="10"></td>';
									if(($login == true) && strcasecmp($user_detail['user_name'], $this->session->userdata('user_name'))){
									    $abc .=	'<td width="25"><a class="delete">删除</a></td>';
									}
									$abc .=
								'</tr>
							</tbody>
						</table>
					</div>';
						}
						echo $abc;
						unset($abc);
					}
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
		</div>
		<div class="sep20 clear"></div>
	</div>
</body>
</html>