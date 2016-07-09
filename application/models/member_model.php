<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 会员模板
 */
class Member_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	
	/*
	 * 根据用户id获取其头像的路径
	 */
	function getAvatarPath($user_id){
		$this->db->select('avatar');
		$this->db->where('id', $user_id);
		$path =  $this->db->get('member')->row_array();
		
		return $path['avatar'];
	}
	
	/*
	 * 注册会员
	 * $user: 要填入表单的信息
	 * return: databaseError数据库写入错误
	 *         success成功
	 */
	function register($user){
		$return = $this->Data_model->addData($user, 'member');
		if($return === false)
			return 'databaseError';
		else
			return 'success';
	}
	
	/*
	 * 检查某一项是否存在
	* $check: 待检查的项
	* $value: 值
	*/
	function isExist($check, $value){
		$this->db->select($check);
		$this->db->from('member');
		$this->db->where($check, $value);
		$result = $this->db->count_all_results();
		if($result == 1){
			return true;
		}else{
			return false;
		}
	}
	
	/*
	 * 处理登陆
	 * return: 返回其id号供cookie使用
	 */
	function login($username, $password){
		$where = array('username' => $username);
		$user = $this->Data_model->getSingle($where, 'member');
		if(empty($user)){
			return false;
		}
		if($user['password'] == md5pass($password, $user['salt'])){
			$this->Data_model->editData(array('id'=>$user['id']),array('logincount'=>$user['logincount']+1,'lasttime'=>time()), 'member');
			
			$session = array(
				'id' => $user['id'],
				'user_name' => $user['username'],
				'login' => true,
			);
			$this->session->set_userdata($session);
			
			//更新登陆状态
			$this->db->where('username', $username);
			$this->db->update('member', array(
					'logined' => 1,
			));
			
			return $user['id'];
		}else{
			return false;
		}
	}
	
	/*
	 * 处理注销
	 */
	function logout(){
		$user_name = $this->session->userdata('user_name');
		
		$session = array(
			'id' => '',
			'user_name' => '',
			'login' => '',
		);
		$this->session->unset_userdata($session);

		//注销登陆状态
		$this->db->where('username', $user_name);
		$this->db->update('member', array(
				'logined' => 0,
		));
		
		delete_cookie('autoLogin');
	}
	
	/*
	 * 保存上传上来的头像
	 * @$id: 当前用户的id
	 */
	function saveAvatar($user_id){
		//设置上传文件的参数
		$config['upload_path'] = './data/template/platform/images/avatar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['max_filename'] = 256;
		$config['encrypt_name'] = TRUE;
			
		$this->load->library('upload', $config);
		$this->upload->do_upload();
	
		//若上传成功则先删除原来的头像，然后保存当前头像路径，否则返回错误
		$data = $this->upload->data();
		if($data['file_size'] != 0){
			$this->db->select('avatar');
			$this->db->where('id', $user_id);
			$tmp = $this->db->get('member')->row_array();
			$file_path = $tmp['avatar'];
			$file_path = './data/template/platform'.$file_path;
			@unlink($file_path);
			
			$this->db->where('id', $user_id);
			$this->db->update('member', array('avatar' => '/images/avatar/'.$data['file_name']));
			return '头像成功保存';
		}else{
			return $this->upload->display_errors();
		}
	}
	
	/*
	 * 保存上传的报告
	 * @$exp_id:实验id , $user_name: 当前用户的名字
	 */
	function saveReport($exp_id, $user_name){	
		$user = $this->getUserDetail($user_name);
	
		//报告存放的根目录
		$root_folder = './report';
		if(! file_exists($root_folder)){
			mkdir('./report');
		}
		
		//某个实验的单独目录
		$exp_folder = $root_folder.'/'.$exp_id;
		if(! file_exists($exp_folder)){
			mkdir($exp_folder);
		}
		
		//在该实验下某个学生的报告文件名
		$file_name = $user['studentID'];
		
		//设置上传文件的参数
		$config['upload_path'] = $exp_folder;
		$config['allowed_types'] = 'doc|docx|pdf';
		$config['max_size'] = '10240';
		$config['max_filename'] = 256;
		$config['file_name'] = $file_name;
		$config['overwrite'] = true;
			
		$this->load->library('upload', $config);
		$this->upload->do_upload();
	
		//若上传成功则先删除原来的记录，然后保存当前记录，否则返回错误
		$data = $this->upload->data();
		if($data['file_size'] != 0){
			$this->db->where(array(
					'uid' => $user['id'],
					'exp_id' => $exp_id,
			));
			$this->db->delete('report');
			
			$this->db->where('id', $exp_id);
			$exp = $this->db->get('experiment')->row_array();
			$report = array(
					'uid' => $user['id'],
					'file_name' => $data['file_name'],
					'exp_id' => iconv('gbk', 'utf-8', $exp_id),//为写入数据库不出现乱码，此处需要转换字符集为utf-8
					'path' => iconv('gbk', 'utf-8', $exp_id.'/'.$data['file_name']),
					'createtime' => time(),
					'exp_name' => $exp['name'],
					'user_name' => $this->session->userdata('user_name'),
			);
			
			$this->db->insert('report', $report);
			
			return '上传成功!';
		}else{
			return $this->upload->display_errors();
		}
	}
	
	/*
	 * 设置自动登陆Cookie
	 * 输入： 用户id
	 */
	function setAutoLogin($id){
		delete_cookie('autoLogin');
		
		$cookiePass = md5Cookie($id);
		$this->db->where("id", $id);
		$this->db->update("member", array("cookie" => $cookiePass));
		
		$cookie = array(
			'name' => 'autoLogin',
			'value' => $cookiePass,
			'expire' => '605500',   //一周
		);
		set_cookie($cookie);
	}
	
	/*
	 * cookie登陆
	 * 输入名字为autoLogin的cookie的值
	 */
	function cookieLogin($cookie){
		$explode = explode("&", $cookie);        //将cookie分割为id和校验值
		$this->db->select('id, username, cookie');
		$this->db->where("id", $explode[0]);
		$result = $this->db->get("member")->row_array();
		if(empty($result)){
			return false;
		}
		if($result['cookie'] != $cookie){
			return false;
		}
		
		$session = array(
			'id' => $result['id'],
			'user_name' => $result['username'],
			'login' => true,
		);
		$this->session->set_userdata($session);
		$this->db->where('id', $result['id']);
		$this->db->update('member', array(
				'logined' => 1,
		));
		
		return true;
	}
	
	/*
	 * 检测登陆状态，如果未登陆，则检测是否有自动登陆cookie
	 * 返回登录状态ture, false
	*/
	function loginCheck(){
		$getSession = $this->session->userdata('user_name');
		if($getSession === false){
			$getCookie = get_cookie("autoLogin");
			if($getCookie !== false){
				return $this->cookieLogin($getCookie);
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	/*
	 * 更改密码
	 * $user_id 用户id, $password 原密码, $new_pass 新密码
	 */
	function changePass($user_id, $password, $new_pass){
		$this->db->select('password, salt');
		$this->db->where('id', $user_id);
		$data = $this->db->get('member')->row_array();
		
		$password = md5pass($password, $data['salt']);
		if($password == $data['password']){
			//原密码正确才允许更改
			$new_pass = md5pass($new_pass, $data['salt']);
			$this->db->where('id', $user_id);
			$this->db->update('member', array('password' => $new_pass));
			
			return true;
		}else{
			return false;
		}
	}
	
	/*
	 * 获得某个用户的个人信息用于展示
	 */
	function getUserDetail($user_name){
		$this->db->where('username', $user_name);
		$data = $this->db->get('member')->row_array();
		
		return $data;
	}
	
	/*
	 * 查看某个用户的登陆状态
	 */
	function loginStatus($user_name){
		$this->db->select('logined');
		$this->db->where('username', $user_name);
		$data = $this->db->get('member')->row_array();
		
		if($data['logined'] == 0){
			return false;
		}else{
			return true;
		}
	}
	
	/*
	 * 查看某个用户的最近10天的评论
	 * $user_name
	 */
	function getUserComments($user_name){
		$this->db->select('replytouser, articleID, comments.createtime, comments.content, article.title');
		$this->db->from('comments');
		$this->db->join('article', 'article.id = comments.articleID');
		
		$this->db->limit(10);
		$this->db->where(array(
			'author' => $user_name,
		));		
		$data = $this->db->get()->result_array();
		
		foreach ($data as $key => $value){
			$data[$key]['createtime'] = dateFormat($value['createtime']);
		}
		
		return $data;
	}
	
	/*
	 * 查看某个用户所有的评论
	 * $user_name
	 */
	function loadAllUserComments($user_name){
		$this->db->select('replytouser, articleID, comments.createtime, comments.content, article.title');
		$this->db->from('comments');
		$this->db->join('article', 'article.id = comments.articleID');

		$this->db->where(array(
				'author' => $user_name,
		));
		$data = $this->db->get()->result_array();
		
		foreach ($data as $key => $value){
			$data[$key]['createtime'] = dateFormat($value['createtime']);
		}
		
		return $data;
	}
	
	/*
	 * 处理来自试验段的身份验证请求
	 */
	function exp_apply($user_name, $user_pass){
		$where = array('username' => $user_name);
		$user = $this->Data_model->getSingle($where, 'member');
		if(empty($user)){
			return false;
		}
		if($user['password'] == md5pass($user_pass, $user['salt'])){			
			return true;
		}else{
			return false;
		}
	}
	
	/*
	 * 添加收藏
	 * 输入: $article_id 文章id, $uid 用户id
	 */
	function addFavorite($article_id, $uid){
		$data = array(
				'article_id' => $article_id,
				'uid' => $uid,
		);
		
		$this->db->insert('favorite', $data);
	}
	
	/*
	 * 检查是否已经收藏过
	 * 输入: $article_id 文章id, $uid 用户id
	 * 返回：ture,已经收藏, false,未收藏
	 */
	function checkFavorite($article_id, $uid){
		$this->db->where(array(
				'article_id' => $article_id,
				'uid' => $uid,
		));
		$data = $this->db->get('favorite')->row_array();
		
		if(empty($data)){
			return false;
		}else{
			return true;
		}
	}
	
	/*
	 * 统计收藏文章数目
	 * 输入: $uid,用户id
	 */
	function countFavorite($uid){
		$this->db->where('uid', $uid);
		return count($this->db->get('favorite')->result_array());
	}
	
	/*
	 * 读取上传的实验报告信息
	 * @$uid: 用户id
	 */
	function loadReport($uid){
		$this->db->select('report.id as exp_id, exp_name, file_name, path, report.createtime, article.id as article_id');
		$this->db->where('report.uid', $uid);
		$this->db->join('article', 'article.title = exp_name');
		$this->db->order_by('createtime', ' desc');
		$data = $this->db->get('report')->result_array();
		
		foreach($data as $key => $value){
			$data[$key]['createtime'] = dateFormat($value['createtime']);
		}
		
		return $data;
	}
	
	/*
	 * 统计上传的实验报告数目
	 * $uid: 用户id
	 */
	function countMyReports($uid){
		$this->db->where('uid', $uid);
		return count($this->db->get('report')->result_array());
	}
	
	/*
	 * 删除报告
	 * $id: 报告记录的id
	 */
	function deleteReport($id){
		$this->db->where('id', $id);
		$data = $this->db->get('report')->row_array();
		
		//删除文件
		$file_path = './report/'.$data['path'];
		unlink(iconv('utf-8', 'gbk', $file_path));
		
		$this->db->delete('report', array('id' => $id));
	}
}