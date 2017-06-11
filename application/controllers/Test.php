<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
	var $config, $menu;
	function __construct()
	{
		parent::__construct();
		$this->Cache_model->setLang($this->input->get());
		$this->Lang_model->loadLang('front',$this->Cache_model->currentLang);
		$this->load->helper("platform");
		$this->load->model("Member_model");
		$this->load->model("Purview_model");
		$this->load->model("Article_model");
	}
	
	
	public function index()
	{
		$config = $this->Cache_model->loadConfig();
		$config['seo_title'] = $config['site_title'];
		$config['site_name'] = 'test';
		$config['seo_keywords'] = $config['site_keywords'];
		$config['seo_description'] = $config['site_description'];
		//设置视图路径
		$this->load->setPath();
		
		$data = $this->input->post();
		
		$res = array(
				'data' => $data,
				'config'=>$config,
				'currentLang'=>$this->Cache_model->currentLang,
				'langurl'=>$this->Cache_model->langurl
		);
		$menu = $this->Cache_model->loadMenu();
		
		

		$this->load->view($config['site_template'].'/test', $res);
		$data = $this->Data_model->getSingle(array('username' => '谢勇'), 'member');
		print_r($config['site_templateurl']);
	}
}
?>