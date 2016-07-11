<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	var $tablefunc = 'member';
	var $fields = array('id', 'username', 'password', 'salt', 'studentID', 'email', 'realname', 'tel', 'signature', 'department', 'createtime', 'lasttime', 'regip', 'lastip', 'logincount', 'logined', 'school', 'college');
	var $funcarr = array('del');
	var $editlang,$langurl;
	function __construct(){
		parent::__construct();
		$this->Lang_model->loadLang('admin');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->model('Purview_model');
		$this->Data_model->setTable($this->tablefunc);
		$this->editlang=$this->Lang_model->getEditLang();
		$this->langurl = $this->Lang_model->loadLangUrl($this->editlang);
	}
	
	public function index(){
		$this->Purview_model->checkPurview($this->tablefunc);
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
				'funcstr'=>$this->Purview_model->getFunc($this->tablefunc,$this->funcarr),
		);
		$this->load->view($this->tablefunc,$res);
	}
	
	public function add(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'add');
		$post = $this->input->post(NULL,TRUE);
		if($post['action']==site_aurl($this->tablefunc)){
			$data = elements($this->fields,$post);
			$time = time();
			$data['createtime'] = $time;
			$data['updatetime'] = $time;
			$data['puttime'] = human_to_unix($post['puttime']);
			$data['uid'] = $this->session->userdata('uid');
			$data['lang'] = $this->editlang;
			$id=$this->Data_model->addData($data);
			$this->Cache_model->deleteSome($this->tablefunc.'_'.$this->editlang);
			$this->Cache_model->deleteSome('recommend_'.$this->editlang.'_'.$this->tablefunc);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->_setlist($this->Data_model->getSingle(array('id'=>$id)),false)));
		}else{
			$res = array(
				'tpl'=>'view',
				'tablefunc'=>$this->tablefunc,
				'categoryarr'=>$this->categoryarr,
				'recommendarr'=>$this->recommendarr,
				'recommends'=>array(),
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->tablefunc,$res,true)));
		}
	}

	public function edit(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'edit');
		$post = $this->input->post(NULL,TRUE);
		if($post['id']&&$post['action']==site_aurl($this->tablefunc)){
			$data = elements($this->fields,$post);
			if(trim($data['password']) != ''){
				$data['password'] = md5pass($data['password'], $data['salt']);
			}else {
				unset($data['password']);
			}			
			$this->Data_model->editData(array('id'=>$post['id']),$data);
			show_jsonmsg(array('status'=>200,'id'=>$post['id'],'remsg'=>$this->_setlist($this->Data_model->getSingle(array('id'=>$post['id'])),false)));
		}else{
			$id = $this->uri->segment(4);
			if($id > 0 && $view = $this->Data_model->getSingle(array('id'=>$id))){
				$res = array(
						'tpl'=>'view',
						'tablefunc'=>$this->tablefunc,
						'view'=>$view,
				);
				show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->tablefunc,$res,true)));
			}else{
				show_jsonmsg(array('status'=>203));
			}
		}
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
		$config = $this->Cache_model->loadConfig();
		foreach($newdata as $key=>$item){
			$item['func'] = '';
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'edit')){
				$item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/edit/'.$item['id']),'edit');
			}
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'del')){
				$item['func'] .=  $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/del/'.$item['id']),'sdel',$item['id']);	
			}
			if($item['logined'] == 0){
				$logined = '<span class="login_n">离线</span>';
			}else{
				$logined = '<span class="login_y">在线</span>';
			}
			
			$newstr.='<tr id="tid_'.$item['id'].'">
			<td width="30"><input type=checkbox name="optid[]" value='.$item['id'].' /></td>
			<td width="40">'.$item['id'].'</td>
			<td width="32"><img width="32" heigth="32" src="'.$config['site_templateurl'].$item['avatar'].'"></img></td>
			<td width="100">'.$item['username'].'</td>
			<td width="100">'.$item['realname'].'</td>
			<td width="100">'.$item['studentID'].'</td>
			<td width="150">'.$item['school'].'</td>
			<td width="150">'.$item['college'].'</td>
			<td>'.$item['department'].'</td>
			<td width="100">'.$logined.'</td>
			<td width="50">'.$item['func'].'</td></tr>';
		}
		return $newstr;
	}
	
	public function upload_file()
	{
		if($_FILES['file']['error'] == UPLOAD_ERR_OK && $_FILES['file']['size'] > 0){
			$file_name = $_FILES['file']['name'];
			$temp_arr = explode(".", $file_name);
			$file_ext = array_pop($temp_arr);
			$file_ext = trim($file_ext);
			$file_ext = strtolower($file_ext);
				
			$file_path = 'data/attachment/file/'.date('Ymd');
			if(! file_exists($file_path)){
				mkdir($file_path);
			}
			$save_name = $file_path.'/'.getRandChar(20).'.'.$file_ext;
			if(! move_uploaded_file($_FILES['file']['tmp_name'], $save_name)){
				echo json_encode(array('status' => '201', 'remsg' => '保存文件失败'));
			}
			echo json_encode(array('status' => '200', 'remsg' => $save_name));
		}else{
			echo json_encode(array('status' => '201', 'remsg' => '文件不能为空'));
		}
	}
}