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
		$test = new \Test();
	}
}
?>
