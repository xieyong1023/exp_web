<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	var $menu,
		$siteConfig,
		$login;
	
	function __construct(){
		parent::__construct();
		
		if($this->uri->segment(4) && ! is_numeric($this->uri->segment(4))){
			show_404();
		}
		
		if($this->uri->segment(2) === false){
			redirect(base_url());
		}
		
		$this->Cache_model->setLang();		
		$this->siteConfig = $this->Cache_model->loadConfig();
		$this->menu = $this->Cache_model->loadMenu();
		//如果未登陆，检查是否存在自动登陆cookie
		$this->Member_model->loginCheck();
		$this->login = $this->Member_model->loginCheck();
	}
	
	public function index(){				
		$dir = $this->uri->segment(2);
		$subDir = $this->uri->segment(3);
		$page = $this->uri->segment(4);
		$this->menu['controller'] = 'category/';
		
		// eg: category/...
		if(! array_key_exists($dir, $this->menu['tree'])){
			show_404();
		}
		
		// eg: category/tz
		else if($subDir === false){
			$list = $this->Article_model->loadListByDir($dir, '', 1, $this->menu);
			$this->menu['dir'] = $dir;
			$this->menu['page'] = 1;
			$this->menu['current'] = $dir;
			$this->siteConfig['site_name'] = $this->menu['top'][$dir]['name'];
		}
		
		// eg: category/tz/1
		else if(is_numeric($subDir)){
			if($subDir < 1){
				show_404();
			}
			$list = $this->Article_model->loadListByDir($dir, '', $subDir, $this->menu);
			$this->menu['dir'] = $dir;
			$this->menu['page'] = $subDir;
			$this->menu['current'] = $dir;
			$this->siteConfig['site_name'] = $this->menu['top'][$dir]['name'];
		}
		
		// eg: category/tz/saishi
		else if($page === false && array_key_exists($dir.'/'.$subDir, $this->menu['tree'][$dir])){
			$list = $this->Article_model->loadListByDir($dir, $subDir, 1, $this->menu);
			$this->menu['dir'] = $dir;
			$this->menu['page'] = 1;
			$this->menu['current'] = $dir.'/'.$subDir;
			$this->siteConfig['site_name'] = $this->menu['top'][$dir]['name'].'/'.$this->menu['tree'][$dir][$dir.'/'.$subDir]['name'];
		}
		
		// eg: category/tz/saishi/1
		else if(array_key_exists($dir.'/'.$subDir, $this->menu['tree'][$dir])){
			if($page < 1){
				show_404();
			}
			$list = $this->Article_model->loadListByDir($dir, $subDir, $page, $this->menu);
			$this->menu['dir'] = $dir;
			$this->menu['page'] = $page;
			$this->menu['current'] = $dir.'/'.$subDir;
			$this->siteConfig['site_name'] = $this->menu['top'][$dir]['name'].'/'.$this->menu['tree'][$dir][$dir.'/'.$subDir]['name'];
		}
		
		else{
			show_404();
		}
		
		//转换需要显示的时间信息
		foreach ($list['listData'] as $key => $value){
			$list['listData'][$key]['puttime'] = $this->Article_model->convertPutTime($value['puttime']);
			$list['listData'][$key]['category'] = $this->menu['id'][$value['category']];
			$list['listData'][$key]['avatar'] = $this->siteConfig['site_templateurl'].$list['listData'][$key]['avatar'];
		}
		
		//个人信息
		$user_name = $this->session->userdata('user_name');
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
		
		//分页参数
		$paging = array(
			'dir' => $this->menu['current'],
			'pageIndex' => $this->menu['page'],
			'pageSum' => $list['listSum'],
			'pageSize' => $list['pagesize'],
		);
		
		//传给视图的参数
		$res = array(
			'config' => $this->siteConfig,
			'menu' => $this->menu,
			'list' => $list,
			'paging' => $paging,
			'login' => $this->login,
			'user_detail' => $user_detail,
			'hitsList' => $hitsList,
			'countMyArticle' => $countMyArticle,
			'countMyExp' => $countMyExp,
			'countFavorite' => $countFavorite,
			'countMyReports' => $countMyReports,
		);
		
		$this->load->setPath();
		$this->load->view('platform/home', $res);
	}
}