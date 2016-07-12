<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userecord extends CI_Controller 
{
	var $tablefunc = 'userecord';
	var $fields = array('id','username','starttime','endtime','experiment_id');
	var $funcarr = array('del');
	var $categoryarr,$editlang,$langurl;
	function __construct(){
		parent::__construct();
		$this->Lang_model->loadLang('admin');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->model('Purview_model');
		$this->load->model('Tags_model');
		$this->Data_model->setTable($this->tablefunc);
		$this->editlang=$this->Lang_model->getEditLang();
		$this->langurl = $this->Lang_model->loadLangUrl($this->editlang);
	}
	
	public function index(){
		$this->Purview_model->checkPurview($this->tablefunc);
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['username'] = trim($post['username']);
		$search['experiment_id'] = trim($post['experiment_id']);
		if(!empty($search['username'])){
			$getwhere['username'] = $search['username'];
		}
		if(!empty($search['experiment_id'])){
			$getwhere['experiment_id'] = $search['experiment_id'];
		}
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>20
		);
		$data = $this->Data_model->getData($getwhere,'starttime desc, endtime desc',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
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
			$experiment = $this->Data_model->getSingle(array('id' => $item['experiment_id']), 'experiment');
			if(empty($experiment)){
				$experiment['name'] = '设备已失效';
			}
			$span = dateSpan($item['endtime'] - $item['starttime']);
			if(is_numeric($item['endtime'])){				
				$endtime = date("Y-m-d H:i:s", $item['endtime']);
			}else{
			    $endtime = '使用中...';
			}	
			if(is_numeric($item['starttime'])){
			    $starttime = date("Y-m-d H:i:s", $item['starttime']);
			}else{
			    $starttime = '无数据';
			}
			$newstr.='<tr id="tid_'.$item['id'].'">
			<td width="30"><input type=checkbox name="optid[]" value='.$item['id'].'></td>
			<td width="40">'.$item['id'].'</td>
			<td width="100">'.$item['username'].'</td>
			<td width="40">'.$item['experiment_id'].'</td>
			<td>'.$experiment['name'].'</td>
			<td width="150">'.$starttime.'</td>
			<td width="150">'.$endtime.'</td>
			<td width="80">'.$span.'</td>
			<td width="50">'.$item['func'].'</td></tr>';
		}
		return $newstr;
	}
	
	public function get_articles_by_category()
	{
		$post = $this->input->post(NULL, TRUE);
		$category = $post['category'];
		$this->load->model('Article_model');
		$articles = $this->Article_model->getByCategoryId($category);
		echo json_encode($articles);
	}
}