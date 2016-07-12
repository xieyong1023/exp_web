<?php $this->load->view('platform/head');?>

<body>
<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/home.js';?>"></script>
	<?php $this->load->view('platform/top')?>

	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">					
			<div id="MainBox">
				<div class="box">
					<div id="Nav_A">
						<?php
						$content = '';
						foreach ($menu['top'] as $value){
							$content .= '<a class="';
							if($value['dir'] == $menu['dir']){
								$content .= 'nav_a_Current"';
							}else{
								$content .= 'nav_a"';
							}
							$content .= ' href='.site_url('category/'.$value['dir']);
							$content .= ' target='.$value['target'].'>';
							$content .= $value['name'].'</a>';
						}
						echo $content;
						?>
					</div>
					<div id="Nav_B">
						<?php 
						$content = '';
						foreach ($menu['tree'][$menu['dir']] as $value){
							$content .= '<a class="nav_b"';
							$content .= ' href='.site_url('category/'.$value['dir']);
							$content .= ' target='.$value['target'].'>';
							$content .= $value['name'].'</a>';
						}
						echo $content;
						?>
					</div>
					
					<?php 
// 					$content = '';
// 					foreach ($list['listData'] as $value){
// 						$content .= '<div class="leftList">';
// 						$content .= '<a href='.base_url($value['category']['model'].'/'.$value['id']);
// 						$content .= ' class="title">'.$value['title'].'</a>';
// 						$content .= '<div class="attr">';
// 						$content .= '<a class="node" href='.base_url('category/'.$value['category']['dir']).'>';
// 						$content .= $value['category']['name'].'</a>';
// 						$content .= '<p class="dot">•</p>';
// 						$content .= '<p>来自于    </p><strong><a>'.$value['nickname'].'</a></strong>';
// 						$content .= '<p class="dot">•<p>';
// 						$content .= '<p>'.$value['puttime'].'</p>';
// 						$content .= '</div></div>';
// 					}
// 					echo $content;
// 					?>

					<?php 
						$abc = '';
						foreach ($list['listData'] as $value){
							$abc .= '
					<div class="cell leftList">
						<table width="100%">
							<tbody>
								<tr>
									<td width="48">
										<img class="middle" src="'.$value['avatar'].'"/>
									</td>
									<td width="10"></td>
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
								</tr>
							</tbody>
						</table>
					</div>';
						}
					echo $abc;
					unset($abc);
					?>

					
				
					<div id="Paging">
						<div id="Total">共有主题数<?php echo ' '.$list['listSum']?></div>
						<?php
						$setPage = setPaging($menu['controller'].$paging['dir'], $paging['pageIndex'], $paging['pageSum'], $paging['pageSize']);
						echo $setPage['content'];
						?>
						<input id="SkipNum" type="text" />
						<div id="SkipBt" class="button">跳转</div>
							<script type="text/javascript">
							$(document).ready(function(){
								$("#Paging"+<?php echo $paging['pageIndex'];?>).addClass("button_curent");
																
								$("#SkipBt").click(function(){
									var index = $(this).prev().val();
									if(index < 1){
										index = 1;
									}
									if(index > <?php echo $setPage['pageNum'];?>){
										index = <?php echo $setPage['pageNum'];?>;
									}
									location.href = 'http://' + location.hostname + '/index.php/' + '<?php echo $menu['controller'].$paging['dir'];?>'+"/"+index;
								});

								$("#SkipNum").keypress(function(event){
									if(event.which == 13)
										$(this).next().trigger("click");
								});
							});
							</script>						
						<?php echo $paging['pageIndex'].'/'.$setPage['pageNum'];?>
					</div>
				</div>
			</div>
			<div id="RightBox">
				<?php $this->load->view('platform/personbox')?>
				<div class="box rightList">
					<div class = "head">点击排行榜</div>
					<?php $this->load->view('platform/orderlist')?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="sep20"></div>
	</div>
	<?php $this->load->view($config['site_template'].'/foot');?>
</body>
</html>
