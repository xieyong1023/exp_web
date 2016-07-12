<?php 
				if($login){
					echo '
				<div class="box">
					<div class="cell">
						<table width="100%">
							<tbody>
								<tr>
									<td width="48">
										<a href="'.site_url('member/p').'/'.$user_detail['username'].'">
											<img class="middle" src="'.$user_detail['avatar'].'"/>
										</a>
									</td>
									<td width="10"></td>
									<td align="left">
										<a href="'.site_url('member/p').'/'.$user_detail['username'].'">
											<p class="bigger">'.$user_detail['username'].'</p>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="sep5"></div>
						<table width="100%">
							<tbody>
								<tr>
									<td width="25%" align="center">
										<a class="nounderline">
											<span class="big">'.$countMyArticle.'</span>
											<div class="sep3"></div>
											<a class="fade nounderline" href="'.site_url('member/p/'.$user_detail['username'].'/topics').'">我的文章</a>
										</a>
									</td>
									<td width="25%" align="center" style="border-left: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);">
										<a class="nounderline">
											<span class="big">'.$countFavorite.'</span>
											<div class="sep3"></div>
											<a class="fade nounderline" href="'.site_url('member/showFavorite').'">我的收藏</a>
										</a>
									</td>
									<td width="25%" align="center" style="border-right: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);">
										<a class="nounderline" href="'.site_url('member/experiment').'">
											<span class="big">'.$countMyExp.'</span>
											<div class="sep3"></div>
											<span class="fade">我的实验</span>
										</a>
									</td>
									<td width="25%" align="center">
										<a class="nounderline" href="'.site_url('member/report').'">
											<span class="big">'.$countMyReports.'</span>
											<div class="sep3"></div>
											<span class="fade">实验报告</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="cell" style="padding: 5px;">
						<table width="100%">
							<tbody>
								<tr>
									<td width="32">
										<img class="small" src="'. $config['site_templateurl'].'/images/flat_compose.png'.'"/>
									</td>
									<td width="10"></td>
									<td><a href="'.site_url('member/edit').'">发表新主题</a></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="cell">
						<a href="'.site_url('member/upload').'">上传实验报告</a>
					</div>
				</div>
				<div class="sep20"></div>';
				}
				?>