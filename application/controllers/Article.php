<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller{
	var $menu,
		$siteConfig,
		$login;
	
	function __construct(){
		parent::__construct();
		if($this->uri->segment(2) && ! is_numeric($this->uri->segment(2))){
			show_404();
		}
		
		$this->Cache_model->setLang();
		$this->siteConfig = $this->Cache_model->loadConfig();
		$this->menu = $this->Cache_model->loadMenu();
		$this->load->setPath();
		$this->login = $this->Member_model->loginCheck();
	}
	
	function index(){
		$articleID = $this->uri->segment(2);
		if($articleID === false || $articleID < 1){
			show_404();
		}
		
		$article = $this->Article_model->loadArticleById($articleID, $this->menu);
		if(! empty($article)){
			$this->Article_model->addHits($articleID);
		}else{
			show_404();
		}
		
		$this->siteConfig['site_name'] = $article['title'];
		
		$comments = $this->Article_model->loadComments($articleID, $this->siteConfig);
		
		$user_name = $this->session->userdata('user_name');
		//个人信息
		$user_detail = $this->Member_model->getUserDetail($user_name);
		$user_detail['createtime'] = dateFormat($user_detail['createtime']);
		$user_detail['avatar'] = $this->siteConfig['site_templateurl'].$user_detail['avatar'];
		
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
		
		//与之相关的实验设备
		$exps = $this->Experiment_model->getExpsByArticleId($articleID);
		
		$res = array(
			'config' => $this->siteConfig,
			'menu' => $this->menu,
			'article' => $article,
			'articleID' => $articleID,
			'login' => $this->login,
			'comments' => $comments,
			'user_detail' => $user_detail,
			'hitsList' => $hitsList,
			'countMyArticle' => $countMyArticle,
			'countMyExp' => $countMyExp,
			'countFavorite' => $countFavorite,
			'countMyReports' => $countMyReports,
			'exps' => $exps,
		);
		
		$this->load->view('platform/article', $res);
	}
}
?>