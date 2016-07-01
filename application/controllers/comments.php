<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
	}
	
	//添加新的回复
	public function addNewComment(){
		if(! $this->Member_model->loginCheck()){
			show_404();
		}
		
		$uid = $this->session->userdata('id');
		$author = $this->session->userdata('user_name');
		
		$post = $this->input->post(NULL, TRUE);
		if($post['opt'] == 'ajax'){
			$newComment = array(
				'category' => 1,      //评论类型，1为文章的回复，2为对回复的评论
				'uid' => $uid,
				'author' => $author,
				'content' => $post['text'],
				'createtime' => time(),
				'status' => 0,        //需要审核
				'articleID' => $post['articleID'],
				'replytouser' => $post['to'],
			);
			
			$this->db->insert('comments', $newComment);
			
			//更新文章状态
			$this->db->select('comments');
			$this->db->where('id', $newComment['articleID']);
			$reply_count = $this->db->get('article')->row_array();
			$reply_count['comments'] = (int)$reply_count['comments'] + 1;
			
			$this->db->where('id', $newComment['articleID']);
			$this->db->update('article', array(
					'updatetime' => $newComment['createtime'],
					'comments' => $reply_count['comments'],
					'lastreply' => $author,
			));			 
			
			$avatar = $this->Member_model->getAvatarPath($uid);
			$this->Cache_model->setLang();
			$config = $this->Cache_model->loadConfig();
			$avatar = $config['site_templateurl'].$avatar;
			
			$return = array(
				'status' => 'success',
				'avatar' => $avatar,
				'user_name' => $author,	
				'time' => date("Y-m-d H:i", time()),		
			);
			
			echo json_encode($return);
		}else{
			show_404();
		}
	}
	
	public function addNewAttachReply(){
		if(! $this->Member_model->loginCheck()){
			show_404();
		}
		
		$uid = $this->session->userdata('id');
		$author = $this->session->userdata('user_name');
		
		$post = $this->input->post(NULL, TRUE);
		
		if($post['opt'] == 'ajax'){
			$newComment = array(
				'category' => 2,
				'uid' => $uid,
				'author' => $author,
				'content' => $post['text'],
				'createtime' => time(),
				'status' => 1,
				'articleID' => $post['articleID'],
				'replytoID' => $post['replytoID'],
				'replytouser' => $post['to'],
			);	
		
			$this->db->insert('comments', $newComment);
			
			//更新文章状态
			$this->db->select('comments');
			$this->db->where('id', $newComment['articleID']);
			$reply_count = $this->db->get('article')->row_array();
			$reply_count['comments'] = (int)$reply_count['comments'] + 1;
			
			$this->db->where('id', $newComment['articleID']);
			$this->db->update('article', array(
					'updatetime' => $newComment['createtime'],
					'comments' => $reply_count['comments'],
					'lastreply' => $author,
			));		 
			
			$avatar = $this->Member_model->getAvatarPath($uid);
			$this->Cache_model->setLang();
			$config = $this->Cache_model->loadConfig();
			$avatar = $config['site_templateurl'].$avatar;
			
			$return = array(
					'status' => 'success',
					'avatar' => $avatar,
					'user_name' => $author,
					'time' => date("Y-m-d H:i", time()),
			);
			
			echo json_encode($return);
		}else{
			show_404();
		}
	}
}
