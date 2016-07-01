 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('string');
	}
	
	public function index(){
		show_404();
	}
	
	public function ajaxLogin(){
		$post = $this->input->post(NULL,TRUE);
		if($post['opt'] == 'ajax'){
				
			//记录此次登陆尝试
			$loginAttempTimes = get_cookie("attemptLogin");
			if($loginAttempTimes === false){
				$cookie = array(
					'name' => 'attemptLogin',
					'value' => '1',
					'expire' => '86500',
				);
				set_cookie($cookie);
			}else{
				$loginAttempTimes += 1;
				$cookie = array(
					'name' => 'attemptLogin',
					'value' => $loginAttempTimes,
					'expire' => '86500',
				);
				set_cookie($cookie);
			}
				
			$res = $this->Member_model->login($post['user_name'], $post['user_pass']);
			if($res !== false){
				$result = "success";
				if($post['autoLogin'] == "true"){
					$this->Member_model->setAutoLogin($res); //传入id值
				}
				delete_cookie("attemptLogin");
			}else{
				$result = "failed";
			}
			echo json_encode($result);
		}
	}
	
	//处理登陆请求
	public function login($tip = false){
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$this->load->setPath();
		$config['site_name'] = "登陆";
		
		$res = array(
				'config' => $config,
				'tip' => $tip,
		);
		
		$this->load->view('platform/login', $res);
	}
	
	//处理注册请求
	public function register(){
		$post = $this->input->post(NULL,TRUE);
		if($post['opt'] == 'ajax'){			
			$user = array();
			$user['username'] = $post['userName'];
			$user['salt'] = random_string('alnum', 6);
			$user['password'] = md5pass($post['userPass'], $user['salt']);
			$user['createtime'] = time();
			$user['lasttime'] = time();
			$user['regip'] = $_SERVER["REMOTE_ADDR"];
			$user['lastip'] = $_SERVER["REMOTE_ADDR"];
			$user['logincount'] = 0;
			$user['studentID'] = $post['studentID'];
				
			$result = $this->Member_model->register($user);
			echo json_encode($result);
		}else{
			header('Location: '.base_url().'member/signup');
		}
	}
	
	//判断某项是否已经存在
	public function isExist(){
		$post = $this->input->post(NULL,TRUE);
		if($post['opt'] == "ajax"){
			$return = $this->Member_model->isExist($post['item'], $post['value']);
			if($return){
				echo json_encode("yes");
			}else{
				echo json_encode("no");
			}
		}else{
			show_404();
		}
	}
	
	/*
	 * 用户发表内容
	 */
	public function edit(){
		//检查登陆状态
		if(($user_name = $this->session->userdata('user_name')) === false){
			$this->login(true);
			return;
		}
		
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$this->load->setPath();
		$config['site_name'] = "编辑";
		
		//详细信息
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//点击排行
		$hitsList = $this->Article_model->loadMostHits();
		
		//文章数
		$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
		//实验数
		$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
		//收藏数
		$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
		//报告数
		$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
		
		$login = true;
		
		//菜单
		$menu = $this->Cache_model->loadMenu();
		$menu_filter = array();
		//只有admin才可以发布所以的主题(简单地处理了一下权限问题，以后改进！)
		if($user_name != 'admin'){
			$menu_filter['top']['hjzp'] = $menu['top']['hjzp'];
			$menu_filter['top']['zl'] = $menu['top']['zl'];
			$menu_filter['top']['qa'] = $menu['top']['qa'];
			$menu_filter['id'] = $menu['id'];
			$menu_filter['tree']['hjzp'] = $menu['tree']['hjzp'];
			$menu_filter['tree']['zl'] = $menu['tree']['zl'];
			$menu_filter['tree']['qa'] = $menu['tree']['qa'];			
		}else{
			$menu_filter = $menu;
		}
		
		$res = array(
				'config' => $config,
				'user_detail' => $user_detail,
				'menu' => $menu_filter,
				'hitsList' => $hitsList,
				'countMyArticle' => $countMyArticle,
				'countMyExp' => $countMyExp,
				'countFavorite' => $countFavorite,
				'countMyReports' => $countMyReports,
				'login' => $login,
		);
		
		$this->load->view($config['site_template'].'/edit', $res);
	}
	
	//保存设置的信息
	public function saveSettings(){
		$post = $this->input->post(NULL, TRUE);
		if($post['opt'] == 'ajax'){
			$data = array(
					'realname' => $post['real_name'],
					'studentID' => $post['studentID'],
					'department' => $post['department'],
					'email' => $post['email'],
					'tel' => $post['tel'],
					'signature' => $post['signature'],
			);
			$this->db->where('username', $post['user_name']);
			$this->db->update('member', $data);
			echo json_encode("success");
		}else{
			show_404();
		}
	}
	
	//显示设置页面
	public function settings(){
		//判断用户是否已登录
		$user_id = $this->session->userdata('id');
		if($user_id === false){
			$this->login(true);
		}else{
			$this->Cache_model->setLang();
			$config = $this->Cache_model->loadConfig();
			$this->load->setPath();
			
			$request = $this->uri->segment(3, 'default');
			
			switch ($request){
				case 'default':{
					$config['site_name'] = "设置";
					$detail = $this->Data_model->getSingle(array('id'=>$user_id), 'member');
					
					$user_name = $this->session->userdata('user_name');
					//个人信息
					$user_detail = $this->Member_model->getUserDetail($user_name);
					$user_detail['createtime'] = dateFormat($user_detail['createtime']);
					$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
					
					//点击排行
					$hitsList = $this->Article_model->loadMostHits();
		
					//文章数
					$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
					//实验数
					$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
					//收藏数
					$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
					//报告数
					$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
					
					$login = true;
					
					$res = array(
							'config' => $config,
							'detail' => $detail,
							'user_detail' => $user_detail,
							'hitsList' => $hitsList,
							'countMyArticle' => $countMyArticle,
							'countMyExp' => $countMyExp,
							'countFavorite' => $countFavorite,
							'countMyReports' => $countMyReports,
							'login' => $login,
					);
					$this->load->view($config['site_template'].'/settings', $res);
				}break;
				case 'avatar':{
					//表单中的隐藏字段，用来判断是否有文件上传
					$file = $this->input->post("file");
					$status = '';
					if($file == 'image'){
						$status = $this->Member_model->saveAvatar($user_id);
					}
					//读出头像文件的路径
					$path = $this->Member_model->getAvatarPath($user_id);
					$avatar_path = $config['site_templateurl'].$path;
					
					$config['site_name'] = "更换头像";
					$res = array(
							'config' => $config,
							'status' => $status,
							'avatar_path' => $avatar_path,
					);
					$this->load->view($config['site_template'].'/avatar', $res);
				}break;
				case 'newpass':{
					$post = $this->input->post(NULL, TRUE);
					if($post['opt'] == 'ajax'){
						if($this->Member_model->changePass($user_id, $post['current_pass'], $post['new_pass'])){
							echo json_encode("success");
						}else{
							echo json_encode("failed");
						}
					}
				}break;
			}		
		}
	}
	
	//显示注册页面
	public function signup(){
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$config['site_name'] = "注册";
		
		$res = array(
				'config'=>$config,
		);
		
		$this->load->setPath();
		$this->load->view($config['site_template'].'/register', $res);
	}
	
	/*
	 * 传送验证码
	 */
	public function generateVcode(){
		$post = $this->input->post("vcode");
		if(isset($post) && $post == "vcode"){
			echo json_encode(getRandChar(4));
		}else{
			show_404();
		}
	}
	
	/*
	 * 注销操作
	 */
	public function logout(){
		$this->Member_model->logout();
		
		redirect(base_url());
	}
	
	/*
	 * 找回密码
	 */
	public function getPass(){
		//加载配置变量
		$config = $this->Cache_model->loadConfig();
		$config['seo_title'] = $config['site_title'];
		$config['site_name'] = "找回密码";
		$config['seo_keywords'] = $config['site_keywords'];
		$config['seo_description'] = $config['site_description'];
		//设置视图路径
		$this->load->setPath();
		$res = array(
				'config'=>$config,
				'currentLang'=>$this->Cache_model->currentLang,
				'langurl'=>$this->Cache_model->langurl
		);
		
		$this->load->view('platform/getPass', $res);
	}
	
	/*
	 * 显示个人中心
	 */
	public function p(){
		$user_name = $this->uri->segment(3);
		if(! $user_name){
			show_404();
		}
		
		//验证用户是否已经登陆。
		$login = false;		
		if($this->Member_model->loginStatus($user_name)){
			$login = true;
		}
		
		//配置以及菜单项
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$menu = $this->Cache_model->loadMenu();
		
		//获得该用户的个人资料
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//判断浏览器的请求
		$request = $this->uri->segment(4, 'default');
		
		$this->load->setPath();
		
		switch ($request){
			case 'default':{
				//获得该用户最近10天发表的主题信息
				$list_data = $this->Article_model->loadListByUsername($user_name);
				foreach ($list_data as $key => $value){
					$list_data[$key]['puttime'] = $this->Article_model->convertPutTime($value['puttime']);
					$list_data[$key]['category'] = $menu['id'][$value['category']];
				}
				//最近10天的回复
				$comments = $this->Member_model->getUserComments($user_name);
				
				$config['site_name'] = "个人资料";
				
				$res = array(
						"config" => $config,
						'list_data' => $list_data,
						'login' => $login,
						'user_detail' => $user_detail,
						'comments' => $comments,
				);
				
				$this->load->view('platform/person', $res);
			}break;
			case 'replies':{
				$comments = $this->Member_model->loadAllUserComments($user_name);
				
				$config['site_name'] = "回复";
				$res = array(
						'config' => $config,
						'login' => $login,
						'user_detail' => $user_detail,
						'comments' => $comments,
				);
				
				$this->load->view('platform/replies', $res);
			}break;
			case 'topics':{
				$list_data = $this->Article_model->loadAllListByUsername($user_name);
				
				if(! empty($list_data)){
					foreach ($list_data as $key => $value){
						$list_data[$key]['puttime'] = $this->Article_model->convertPutTime($value['puttime']);
						$list_data[$key]['category'] = $menu['id'][$value['category']];
					}
				}
				
				$config['site_name'] = "我的文章";
				
				//点击排行
				$hitsList = $this->Article_model->loadMostHits();
		
				//文章数
				$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
				//实验数
				$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
				//收藏数
				$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
				//报告数
				$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
				
				$res = array(
						'config' => $config,
						'list_data' => $list_data,
						'login' => $login,
						'user_detail' => $user_detail,
						'category' => "全部主题",
						'hitsList' => $hitsList,
						'countMyArticle' => $countMyArticle,
						'countMyExp' => $countMyExp,
						'countFavorite' => $countFavorite,
						'countMyReports' => $countMyReports,
				);
				
				$this->load->view('platform/topics', $res);
			}break;
		}
	}
	
	/*发表新文章*/
	function newArticle(){
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$user_detail = $this->Member_model->getUserDetail($user_name);
		
		$post = $this->input->post(NULL, TRUE);
		$article = array(
				'title' => $post['newTitle'],
				'content' => $post['newContent'],
				'category' => $post['category'],
				'uid' => $user_detail['id'],
				'createtime' => time(),
				'updatetime' => time(),
				'puttime' => time(),
		);
		$this->db->insert('article', $article);
		
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$config['site_name'] = "提示信息";
		$this->load->setPath();
		$res = array(
				'config' => $config,
				'message' => "提交成功，请等待管理员审核!"
		);
		
		$this->load->view('platform/message', $res);
	}
	
	/*
	 * 添加收藏
	 */
	function addFavorite(){
		$post = $this->input->post(NULL, TRUE);
		
		$uid = $this->session->userdata('id');
		if($uid == false){
			echo json_encode("needLogin");
			return;
		}
		
		if($this->Member_model->checkFavorite($post['articleID'], $uid)){
			echo json_encode("exist");
			return;
		}
		
		$this->Member_model->addFavorite($post['articleID'], $uid);
		
		echo json_encode('success');
	}
	
	/*
	 * 显示收藏文章列表
	 */
	function showFavorite(){
		$user_name = $this->session->userdata('user_name');
		$login = true;
		if($user_name === false){
			$this->login(true);
			return;
		}		
		
		//配置以及菜单项
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$menu = $this->Cache_model->loadMenu();
		$config['site_name'] = "我的收藏";
		
		//获得该用户的个人资料
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//点击排行
		$hitsList = $this->Article_model->loadMostHits();
		
		//文章数
		$countMyArticle = $this->Article_model->countMyArticle($this->session->userdata('id'));
		
		//实验数
		$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
		//收藏数
		$countFavorite = $this->Member_model->countFavorite($this->session->userdata('id'));
		
		//报告数
		$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
		
		$list_data = $this->Article_model->loadFavorite($user_name);
		
		if(! empty($list_data)){
			foreach ($list_data as $key => $value){
				$list_data[$key]['puttime'] = $this->Article_model->convertPutTime($value['puttime']);
				$list_data[$key]['category'] = $menu['id'][$value['category']];
			}
		}
		
		$res = array(
				'config' => $config,
				'list_data' => $list_data,
				'login' => $login,
				'user_detail' => $user_detail,
				'category' => "收藏列表",
				'login' => $login,
				'hitsList' => $hitsList,
				'countMyArticle' => $countMyArticle,
				'countMyExp' => $countMyExp,
				'countFavorite' => $countFavorite,
				'countMyReports' => $countMyReports,
		);
		$this->load->setPath();
		$this->load->view('platform/topics', $res);
	}
	
	//显示我的实验
	function experiment(){
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$config['site_name'] = "我的实验";
		$this->load->setPath();
		
		$experiment = $this->Experiment_model->loadAll();
		
		$use = $this->Experiment_model->loadUse($user_name);
		
		//个人信息
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//点击排行
		$hitsList = $this->Article_model->loadMostHits();
		
		//文章数
		$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
		//实验数
		$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
		//收藏数
		$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
		//报告数
		$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
		
		$login = true;
		
		$res = array(
				'config' => $config,
				'experiment' => $experiment,
				'use' => $use['use'],
				'usecount' => $use['count'],
				'hitsList' => $hitsList,
				'countMyArticle' => $countMyArticle,
				'countMyExp' => $countMyExp,
				'countFavorite' => $countFavorite,
				'login' => $login,
				'user_detail' => $user_detail,
				'countMyReports' => $countMyReports,
		);
		
		$this->load->view($config['site_template'].'/experiment', $res);
	}
	
	//申请实验设备
	function applyExp()
	{
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$post = $this->input->post(NULL, TRUE);
		
		$this->db->where('id', $post['id']);
		$this->db->update('experiment', array(
				'status' => 1,
				'user' => $user_name,
		));
		
		//记录使用时间
		$use = array(
				'username' => $user_name,
				'starttime' => time(),
				'experiment_id' => $post['id'],
		);
		
		$this->db->where('username', $user_name);
		$this->db->insert('use', $use);
		
		$res = array(
				'status' => 'success',
				'user' => $user_name,
		);
		
		echo json_encode($res);
	}
	
	//释放实验设备
	function releaseExp()
	{
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
	
		$post = $this->input->post(NULL, TRUE);
	
		$this->db->where('id', $post['id']);
		$this->db->update('experiment', array(
				'status' => 0,
				'user' => '',
		));
		
		$this->db->select_max('starttime');
		$this->db->where(array(
				'username' => $user_name,
				'experiment_id' => $post['id'],
		));
		$time = $this->db->get('use')->row_array();
		
		$this->db->where(array(
				'username' => $user_name,
				'starttime =' => $time['starttime'],
				'experiment_id' => $post['id'],
		));
		$this->db->update('use', array('endtime' => time()));
	
		echo json_encode("success");
	}
	
	/*
	 * 接受来自试验端的身份验证请求
	 */
	function exp_login(){
		$post = $this->input->post(NULL, TRUE);
		if(empty($post)){
			echo "empty";
			return;
		}
		
		if($this->Member_model->exp_apply($post['user_name'], $post['user_pass'])){
			$this->db->where('id', $post['id']);
			$this->db->update('experiment', array(
					'status' => 1,
					'user' => $post['user_name'],
			));
			
			echo "success";
			return;
		}else{
			echo "false";
			return;
		}
	}
	
	/*
	 * 接受来自试验段的释放占用请求
	 */
	function exp_logout(){
		$post = $this->input->post(NULL, TRUE);
		if(empty($post)){
			echo "empty";
			return;
		}
		
		$this->db->where('id', $post['id']);
		$this->db->update('experiment', array(
				'status' => 0,
				'user' => '',
		));
		
		$user_name = $this->session->userdata('user_name');
		$this->db->select_max('starttime');
		$this->db->where(array(
				'username' => $user_name,
				'experiment_id' => $post['id'],
		));
		$time = $this->db->get('use')->row_array();
		
		$this->db->where(array(
				'username' => $user_name,
				'starttime =' => $time['starttime'],
				'experiment_id' => $post['id'],
		));
		$this->db->update('use', array('endtime' => time()));
		
		echo "success";
	}
	
	function deleteArticle(){
		$post = $this->input->post(NULL, TRUE);
		if(empty($post['id'])){
			echo json_encode('fail');
			return;
		}
		
		//删除文章
		$this->db->delete('article', array('id' => $post['id']));
		
		//删除所有与之相关的收藏
		$this->db->delete('favorite', array('article_id' => $post['id']));
		
		echo json_encode('success');
	}
	
	//删除收藏
	function deleteFavorite(){
		$post = $this->input->post(NULL, TRUE);
		if(empty($post['id'])){
			echo json_encode('fail');
			return;
		}
		
		$uid = $this->session->userdata('id');
		
		$this->db->delete('favorite', array(
				'article_id' => $post['id'],
				'uid' => $uid,
		));
		
		echo json_encode("success");
	}
	
	/*
	 * 显示上传实验报告页面
	 * $status: 提示信息
	 */
	function upload($status = ''){
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$config['site_name'] = "上传";
		$this->load->setPath();
		
		//个人信息
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//点击排行
		$hitsList = $this->Article_model->loadMostHits();
		
		//文章数
		$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
		//实验数
		$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
		//收藏数
		$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
		//报告数
		$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
		
		$login = true;
		
		//所有实验
		$exp = $this->Experiment_model->loadAll();
		
		$res = array(
				'config' => $config,
				'user_detail' => $user_detail,
				'hitsList' => $hitsList,
				'countMyArticle' => $countMyArticle,
				'countMyExp' => $countMyExp,
				'countFavorite' => $countFavorite,
				'countMyReports' => $countMyReports,
				'login' => $login,
				'exp' => $exp,
				'status' => $status,
		);
		
		$this->load->view('platform/upload', $res);
	}
	
	//保存实验报告
	function saveReport(){
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$post = $this->input->post(NULL, TRUE);
		$status = $this->Member_model->saveReport($post['exp_name'], $user_name);
		
		$this->upload($status);
	}
	
	//显示实验报告
	function report(){
		$user_name = $this->session->userdata('user_name');
		if($user_name == false){
			$this->login(true);
			return;
		}
		
		$this->Cache_model->setLang();
		$config = $this->Cache_model->loadConfig();
		$config['site_name'] = "实验报告";
		$this->load->setPath();
		
		//个人信息
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $config['site_templateurl'].$user_detail['avatar'];
		
		//点击排行
		$hitsList = $this->Article_model->loadMostHits();
		
		//文章数
		$countMyArticle = $this->Article_model->countMyArticle($user_detail['id']);
		
		//实验数
		$countMyExp = $this->Experiment_model->countMyExp($user_name);
		
		//收藏数
		$countFavorite = $this->Member_model->countFavorite($user_detail['id']);
		
		//报告数
		$countMyReports = $this->Member_model->countMyReports($user_detail['id']);
		
		$login = true;
		
		//所有实验
		$report = $this->Member_model->loadReport($user_detail['id']);
		
		$res = array(
				'config' => $config,
				'user_detail' => $user_detail,
				'hitsList' => $hitsList,
				'countMyArticle' => $countMyArticle,
				'countMyExp' => $countMyExp,
				'countFavorite' => $countFavorite,
				'countMyReports' => $countMyReports,
				'login' => $login,
				'report' => $report,
		);
		
		$this->load->view('platform/report', $res);
	}
	
	/*
	 * 删除实验报告
	 */
	function deleteReport(){	
		$post = $this->input->post(NULL, TRUE);
		if(empty($post['id'])){
			echo json_encode('faild');
			return;
		}
		
		$this->Member_model->deleteReport($post['id']);
		
		echo json_encode('success');
	}
}
?>