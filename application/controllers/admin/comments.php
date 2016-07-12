<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
	var $tablefunc = 'comments';
	var $fields = array('category','title','description','content','listorder','status');
	var $funcarr = array('del');
	var $categoryarr,$recommendarr,$editlang;
	function __construct(){
		parent::__construct();
		$this->Lang_model->loadLang('admin');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->model('Purview_model');
		$this->load->model('Tags_model');
		$this->Data_model->setTable($this->tablefunc);
		$this->editlang=$this->Lang_model->getEditLang();
		$this->categoryarr = mult_to_single($this->Data_model->getData(array('isdisabled'=>0,'lang'=>$this->editlang,'model'=>$this->tablefunc),'parent,listorder',0,0,'category'));
		$this->recommendarr = $this->Data_model->getData(array('status'=>1,'lang'=>$this->editlang),'listorder',0,0,'recommend');
	}
	
	public function index(){
		$this->Purview_model->checkPurview($this->tablefunc);
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['articleID'] = trim($post['articleID']);
		$search['author'] = trim($post['author']);
		$search['replytouser'] = trim($post['replytouser']);

		if($search['articleID'] != ''){
			$getwhere['articleID'] = $search['articleID'];
		}
		if($search['author'] != ''){
			$getwhere['author'] = $search['author'];
		}
		if($search['replytouser'] != ''){
			$getwhere['replytouser'] = $search['replytouser'];
		}
		$getwhere['lang'] = $this->editlang;
		$pagearr=array(
			'currentpage'=>	isset($post['currentpage'])&&$post['currentpage']>0?$post['currentpage']:1,
			'totalnum'=>$this->Data_model->getDataNum($getwhere),
			'pagenum'=>20
		);
		$data = $this->Data_model->getData($getwhere,'createtime desc',$pagearr['pagenum'],($pagearr['currentpage']-1)*$pagearr['pagenum']);
		$res = array(
				'tpl'=>'list',
				'tablefunc'=>$this->tablefunc,
				'search'=>$search,
				'categoryarr'=>$this->categoryarr,
				'liststr'=>$this->_setlist($data,true),
				'pagestr'=>show_page($pagearr,$search),
				'funcstr'=>$this->Purview_model->getFunc($this->tablefunc,$this->funcarr),
		);
		$this->load->view($this->tablefunc,$res);
	}

	public function edit(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'edit');
		$post = $this->input->post(NULL,TRUE);
		if($post['id']&&$post['action']==site_aurl($this->tablefunc)){
			$data = elements($this->fields,$post);
			$data['createtime'] = human_to_unix($post['createtime']);
			$data['uid'] = $this->session->userdata('uid');
			$data['replyuid'] = $this->session->userdata('uid');
			$data['content'] = $post['content'];
			$this->Data_model->editData(array('id'=>$post['id']),$data);
			show_jsonmsg(array('status'=>200,'id'=>$post['id'],'remsg'=>$this->_setlist($this->Data_model->getSingle(array('id'=>$post['id'])),false)));
		}else{
			$id = $this->uri->segment(4);
			if($id>0&&$view = $this->Data_model->getSingle(array('id'=>$id))){
				$res = array(
						'tpl'=>'view',
						'tablefunc'=>$this->tablefunc,
						'view'=>$view,
						'categoryarr'=>$this->categoryarr
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
			$article = $this->Data_model->getSingle(array('id' => $item['articleID']), 'article');
			if(empty($article['title'])){
			    $article['title'] = '';
			}
			$content = $item['content'];
			if(strlen($content) > 60){
				$content = subString($content, 0, 60).'...';
			}
			$item['func'] = '';
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'edit')){
				$item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/edit/'.$item['id']),'edit');
			}
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'del')){
				$item['func'] .=  $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/del/'.$item['id']),'sdel',$item['id']);	
			}

			$newstr.='<tr id="tid_'.$item['id'].'">
			<td width=30><input type=checkbox name="optid[]" value='.$item['id'].'></td>
			<td width=40>'.$item['id'].'</td>
			<td width=50>'.$item['articleID'].'</td>
			<td width=200>'.$article['title'].'</td>
			<td>'.$content.'</td>
			<td width=50>'.$item['author'].'</td>
			<td width=50>'.$item['replytouser'].'</td>
			<td width=150>'.date('Y-m-d H:i:s',$item['createtime']).'</td>
			<td width=50 >'.lang('guestbook_status'.$item['status']).'</td>
			<td width=50>'.$item['func'].'</td></tr>';
		}
		return $newstr;
	}
}