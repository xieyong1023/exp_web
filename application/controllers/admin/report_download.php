<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_download extends CI_Controller {
	var $tablefunc = 'report_download';
	function __construct(){
		parent::__construct();
		$this->Lang_model->loadLang('admin');
		$this->Data_model->setTable('experiment');
	}
	
	public function index(){
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['keyword'] = trim($post['keyword']);
		$search['searchtype'] = trim($post['searchtype']);
		if($search['keyword']!=''){
			$getwhere[$search['searchtype']]=$search['keyword'];
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>20
		);
		$data = $this->Data_model->getData($getwhere,'',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
		$res = array(
				'tpl'=>'list',
				'tablefunc'=>$this->tablefunc,
				'search'=>$search,
				'liststr'=>$this->_setlist($data,true),
				'pagestr'=>show_page($pagearr,$search),
		);
		$this->load->view($this->tablefunc,$res);
	}
	
	function _setlist($data,$ismultiple=true){
		$newdata = $ismultiple?$data:($newdata[0]=$data);
		if($ismultiple){
			$newdata = $data;
		}else{
			$newdata = array(0=>$data);
		}
		$newstr = '';

		foreach($newdata as $key=>$item){
			$this->db->where('exp_id', $item['id']);
			$reports = $this->db->get('report')->result_array();
			$num = count($reports);
			$newstr.='<tr>
			<td width=40>'.$item['id'].'</td>
			<td width=100>'.$item['id'].'</td>
			<td>'.$item['name'].'</td>
			<td width=100>'.$num.'</td>';
			if($num != 0){
				$newstr .= '<td width=100><a href="'.base_url('download/reports/'.$item['id']).'">点击下载</a></td></tr>';
			}else{
				$newstr .= '<td width=100></td></tr>';
			}
			
		}
		return $newstr;
	}
}