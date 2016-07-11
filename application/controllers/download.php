<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		show_404();
	}
	
	public function article(){
		$article_id = $this->uri->segment(3);
		if(!is_numeric($article_id)){
			show_404();
		}
		$this->load->model('Data_model');
		$article = $this->Data_model->getSingle(array('id' => $article_id), 'article');
		if(!empty($article) && !empty($article['attachfile'])){
			$file_path = './'.$article['attachfile'];
			echo $file_path;
			if(!file_exists($file_path)){
				echo 'file not exist!';
				exit;
			}
			$temp_arr = explode('/', $article['attachfile']);
			$file_name = array_pop($temp_arr);
			$temp_arr = explode('.', $file_name);
			$file_ext = array_pop($temp_arr);
			$file_ext = trim($file_ext);
			$file_ext = strtolower($file_ext);
			$file_name = $article['title'].'.'.$file_ext;	

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
   		 	header('Content-Disposition: attachment; filename="'.$file_name.'"');
    		header('Cache-Control: must-revalidate');
    		header('Content-Length: ' . filesize($file_path));
    		ob_clean();//清空输出缓冲区,下载文件必须
    		flush();
    		readfile($file_path);
		}else{
			show_404();
		}
	}
	
	public function report(){
		$report_id = $this->uri->segment(3);
		if(!is_numeric($report_id)){
			show_404();
		}
		
		$this->load->model('Data_model');
		$report = $this->Data_model->getSingle(array('id' => $report_id), 'report');
		$file_path = './report/'.$report['path'];
		if(! file_exists($file_path)){
			echo 'file not exist!';
			exit;
		}
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$report['file_name'].'"');
		header('Cache-Control: must-revalidate');
		header('Content-Length: ' . filesize($file_path));
		ob_clean();//清空输出缓冲区,下载文件必须
		flush();
		readfile($file_path);
	}
	
	//下载整个报告文件夹
	public function reports()
	{
		$exp_id = $this->uri->segment(3);
		if(!is_numeric($exp_id)){
			show_404();
		}
		$dir_path = './report/'.$exp_id.'/';
		if(!file_exists($dir_path)){
			echo 'files not exits';
			exit;
		}
		$this->db->where('exp_id', $exp_id);
		$reports = $this->db->get('report')->result_array();
		if(!empty($reports)){
			$this->load->library('zip');
			foreach ($reports as $report){
				$file_path = './report/'.$report['path'];
				if(!file_exists($file_path)){
					continue;
				}
				$this->zip->read_file($file_path, FALSE);
			}
			$this->db->where('id', $exp_id);
			$exp = $this->db->get('experiment')->row_array();
			$this->zip->download($exp['name']);
		}else{
			echo 'no reports';
			exit;
		}
	}
}