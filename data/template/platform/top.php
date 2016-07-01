	<div id="Top">
		<div id="MiniNav">
			<div id="Logo">
<!-- 				<a title="首页" href="/"> -->
<!--  				<img src="<?php echo $config['site_templateurl'].'/images/cs_logo.jpg';?>" />-->	
<!-- 				</a> -->
			</div>
			<div id="Search">
<!-- 				<input id="search" /> -->
			</div>
			<div id="UserNav">				
				<?php 
					$user_name = $this->session->userdata("user_name");
					$topButton = '';
					if($user_name === false){
						$topButton .= '<div class="topButton"><a href="'.base_url('member/login').'">登陆</a></div>';
						$topButton .= '<div class="topButton"><a href="'.base_url('member/signup').'">注册</a></div>';
						echo $topButton;
						
					}else{
						$topButton .= '<div class="topButton"><a href="'.base_url('member/logout').'">登出</a></div>';
						$topButton .= '<div class="topButton"><a href="'.base_url('member/settings').'">设置</a></div>';
						$topButton .= '<div class="topButton"><a href="'.base_url('member/p/'.$user_name).'">'.$user_name.'</a></div>';
						echo $topButton;
					}
					unset($needLogin);
				?>
				<div class="topButton"><a href="/">首页</a></div>
			</div>
		</div><!-- end MiniNav -->
	</div><!-- end Top -->	