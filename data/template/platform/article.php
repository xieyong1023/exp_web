<?php $this->load->view('platform/head')?>

<script type="text/javascript" src="<?php echo $config['site_templateurl'].'/js/article.js';?>"></script>

<body>
	<?php $this->load->view('platform/top')?>

	<input type="hidden" id="ArticleID" value="<?php echo $articleID?>" />
	
	<div id="Wrapper">
		<div class="sep20"></div>
		<div id="Content">		
			<div id="MainBox">
				<div class="box">
					<div id="Header">
						<a href="<?php echo base_url();?>">首页</a>
						<span class="chevron"> › </span>
						<?php 
						$content = '';
						$content .= '<a href="'.base_url('category/'.$article['category'][0]).'">';
						$content .= $article['category']['dir'].'</a>';
						if($article['category']['subDir'] != ''){
							$content .= '<span class="chevron"> › </span>';
							$content .= '<a href="'.base_url('category/'.$article['category'][0].'/'.$article['category'][1]).'">';
							$content .= $article['category']['subDir'].'</a>';							
						}
						echo $content;
 						?>
					</div>
					<div id="Article">
						<div class="headline"><?php echo $article['title'];?></div>
						<div id="Attr">
							<div class="attr ">来自于  <a href="<?php echo base_url('member/p/'.$article['uid']);?>" id="ArticleAuthor"><?php echo $article['uid'];?></a></div>
							<div class="dot">•</div>
							<div class="attr"><?php echo $article['puttime'];?></div>
							<div class="dot">•</div>
							<div class="attr"><?php echo $article['hits'];?>次点击</div>
						</div>
						<div class="text"><?php echo $article['content'];?></div>
						<?php if(!empty($article['attachfile'])):?>
						<div id="attachfile">
							<span>附件: </span>
							<a href="<?php echo base_url('download/article/'.$article['id'])?>">点我下载附件</a>
						</div>
						<?php endif;?>
						<div class="buttonBar">
							<a id="Favorite">加入收藏</a>
						</div>
					</div>
				</div>
				<?php if(!empty($exps) && $login):?>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell"><span>实验设备</span>(<?php echo count($exps)?>)</div>
					<?php foreach ($exps as $exp):?>
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
				<?php endif;?>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell"><span id="ReplyCount"><?php echo count($comments);?></span> 回复  | 直到   <span id="UpdateTime"><?php echo $article['updatetime']?></span></div>		
					
					<div class="cell reply reply_model hide">
						<table width="100%">
							<tbody>
								<tr>
									<td width="48" valign="top">
										<a class="reply_person"><img class="middle"/></a>
									</td>
									<td width="10"></td>
									<td class="replyContent">															
										<span class="replyText"></span>
										<div class="sep5"></div>
										<div class="replyAttr">	
											<span class="fade order"></span>
											<span><a class="highLight reply_person"><span class="reply_person_name"></span></a></span>
											<span class="fade reply_time"></span>
											<span class="highLight reply_button">回复(0)</span>
										</div>										
										<div class="attachReply cell hide attachReplyInput">
											<textarea class="newAttachReply" name="newAttachReply" maxlength="500"></textarea>
											<span class="attachReply_remaining">0/500</span>
											<span class="cancel">↑</span>
											<span class="attachReply_submit">回复</span>
										</div>					
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="attachReply attachReply_model cell hide">
						<table width="100%">
							<tbody>
								<tr>
									<td width="32" valign="top">
										<a class="reply_person"><img class="small" src="" /></a>
									</td>
									<td width="10"></td>
									<td>
										<span>
											<span><a class="highLight reply_person reply_person_name">abc</a></span>
											<span>: </span>
											<span class="replyText"></span>
										</span>
										<div class="replyAttr">																
											<span class="fade reply_time"></span>
											<span class="highLight attachReply_button">回复</span>
										</div>
									</td>
								</tr>
							</tbody>
						</table>										
					</div>
				<?php 
				if(! empty($comments)){
					$str = '';
					foreach ($comments as $key => $value){
						$str .= 
					'<div class="cell reply" id="reply_'.$value['id'].'">
						<table width="100%">
							<tbody>
								<tr>
									<td width="48" valign="top">
										<a class="reply_person" href="'.base_url('member/p/'.$value['author']).'"><img class="middle" src="'.$value['avatar'].'"/></a>
									</td>
									<td width="10"></td>
									<td class="replyContent">															
										<span class="replyText">'.$value['content'].'</span>
										<div class="sep5"></div>
										<div class="replyAttr">	
											<span class="fade order">'.($key + 1).'楼</span>
											<span><a class="highLight reply_person" href="'.base_url('member/p/'.$value['author']).'"><span class="reply_person_name">'.$value['author'].'</span></a></span>
											<span class="fade reply_time">'.$value['createtime'].'</span>
											<span class="highLight reply_button">回复('.count($value['attach']).')</span>
										</div>';
									
										//添加附加的回复
										if(! empty($value['attach'])){
											foreach ($value['attach'] as $reply){
												$str .= 
										'<div class="attachReply cell" id="'.$reply['id'].'">
											<table width="100%">
												<tbody>
													<tr>
														<td width="32" valign="top">
															<a class="reply_person" href="'.base_url('member/p/'.$reply['author']).'"><img class="small" src="'.$reply['avatar'].'" /></a>
														</td>
														<td width="10"></td>
														<td>
															<span>
																<span><a class="highLight reply_person reply_person_name" href="'.base_url('member/p/'.$reply['author']).'">'.$reply['author'].'</a></span>
																<span>: </span>
																<span class="replyText">'.$reply['content'].'</span>
															</span>
															<div class="replyAttr">																
																<span class="fade reply_time">'.$reply['createtime'].'</span>
																<span class="highLight attachReply_button">回复</span>
															</div>
														</td>
													</tr>
												</tbody>
											</table>										
										</div>';
											}
										}
									
										$str .=
										'<div class="attachReply cell hide attachReplyInput">
											<textarea class="newAttachReply" name="newAttachReply" maxlength="500"></textarea>
											<span class="attachReply_remaining">0/500</span>
											<span class="cancel">↑</span>
											<span class="attachReply_submit">回复</span>
										</div>					
									</td>
								</tr>
							</tbody>
						</table>		
					</div>';	
					}
				echo $str;
				unset($str);
				}	
				?>
				</div>
				<div class="sep20"></div>
				<div class="box">
					<div class="cell">
						<span>添加回复</span>
						<span class="remaining" id="NewReplyRemain">0/500</span>
					</div>
					<div class="form">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<textarea id="NewReply" maxlength="500" name="newReply" <?php 
										if(! $login){
											echo 'disabled="true"';
										}?>><?php if(! $login){echo '需要登录才能评论';}?></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<input id="SubmitReply" type="button" value="回复" <?php 
										if(! $login){
											echo 'disabled="disabled"';
										}
										?>/>
									</td>
									<td class="msgTip"></td>
								</tr>
							</tbody>
						</table>
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
			<div class="sep20 clear"></div>
		</div>
	</div>		
	<?php $this->load->view($config['site_template'].'/foot');?>
</body>
</html>