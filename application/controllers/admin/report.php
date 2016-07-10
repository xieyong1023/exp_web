<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	var $tablefunc = 'report';
	var $fields = array('uid', 'file_name', 'exp_name', 'path', 'createtime', 'exp_id', 'user_name');
	var $funcarr = array('del');
	function __construct(){
		parent::__construct();
		$this->Lang_model->loadLang('admin');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->model('Purview_model');
		$this->Data_model->setTable($this->tablefunc);
	}
	
	public function index(){
		$this->Purview_model->checkPurview($this->tablefunc);
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['user'] = trim($post['user']);
		$search['exp'] = trim($post['exp']);
		$search['user_select'] = trim($post['user_select']);
		$search['exp_select'] = trim($post['exp_select']);
		if(!empty($search['user'])){
			if($search['user_select'] == 'username'){
				$user = $this->Data_model->getSingle(array('username' => $search['user']), 'member');
			}else{
				$user = $this->Data_model->getSingle(array('studentID' => $search['user']), 'member');
			}
			$getwhere['uid'] = $user['id'];
		}
		if(!empty($search['exp'])){
			if($search['exp_select'] == 'exp_name'){
				$getwhere['exp_name'] = $search['exp'];
			}else{
				$getwhere['exp_id'] = $search['exp'];
			}
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
				'funcstr'=>$this->Purview_model->getFunc($this->tablefunc,$this->funcarr),
		);
		$this->load->view($this->tablefunc,$res);
	}
	
	public function del(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'del');
		$ids = $this->input->post('optid',true);
		if($ids){
			$this->Data_model->delData($ids);
			$this->Cache_model->deleteSome($this->tablefunc.'_'.$this->editlang);
			$this->Cache_model->deleteSome('recommend_'.$this->editlang.'_'.$this->tablefunc);
			show_jsonmsg(array('status'=>200,'remsg'=>lang('delok'),'ids'=>$ids));
		}else{
			show_jsonmsg(array('status'=>203));
		}
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
			$item['func'] = '';
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'del')){
				$item['func'] .=  $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/del/'.$item['id']),'sdel',$item['id']);	
			}
			$user = $this->Data_model->getSingle(array('id' => $item['uid']), 'member');
			$newstr.='<tr id="tid_'.$item['id'].'">
			<td width=30><input type=checkbox name="optid[]" value='.$item['id'].'></td>
			<td width=50>'.$item['exp_id'].'</td>
			<td>'.$item['exp_name'].'</td>
			<td width=100>'.$user['username'].'</td>
			<td width=200>'.$user['studentID'].'</td>
			<td width=150>'.date("Y-m-d H:i:s", $item['createtime']).'</td>
			<td width=80><a href="'.base_url('download/report/'.$item['id']).'">下载</a></td>
			<td width=50>'.$item['func'].'</td></tr>';
		}
		return $newstr;
	}
}