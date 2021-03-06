<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	var $tablefunc = 'article';
	var $fields = array('category','title','keywords','description','content','copyfrom','fromlink','thumb','alt','color','isbold','hits','tpl','listorder','status', 'attachfile');
	var $funcarr = array('add','order','del');
	var $categoryarr,$recommendarr,$editlang,$langurl;
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
		$this->categoryarr = mult_to_single($this->Data_model->getData(array('isdisabled'=>0,'lang'=>$this->editlang,'model'=>$this->tablefunc),'parent,listorder',0,0,'category'));
	}
	
	public function index(){
		$this->Purview_model->checkPurview($this->tablefunc);
		$post = $this->input->post(NULL,TRUE);
		$getwhere = array();
		$search['category'] = trim($post['category']);
		$search['keyword'] = trim($post['keyword']);
		$search['searchtype'] = trim($post['searchtype']);
		if($search['category']>0){
			$getwhere['category']=$search['category'];
		}
		if($search['searchtype']=='id'){
			if($search['keyword']!=''){
				$getwhere[$search['searchtype']]=$search['keyword'];
			}
		}else{
			if($search['keyword']!=''){
				$getwhere[$search['searchtype'].' like']='%'.$search['keyword'].'%';
			}
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
	
	public function add(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'add');
		$post = $this->input->post(NULL,TRUE);
		if($post['action']==site_aurl($this->tablefunc)){
			$data = elements($this->fields,$post);
			$time = time();
			$data['createtime'] = $time;
			$data['updatetime'] = $time;
			$data['puttime'] = human_to_unix($post['puttime']);
			$user = $this->Data_model->getSingle(array('username' => trim($post['author'])), 'member');
			$data['uid'] = $user['id'];
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
				'recommends'=>array()
			);
			show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->tablefunc,$res,true)));
		}
	}

	public function edit(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'edit');
		$post = $this->input->post(NULL,TRUE);
		if($post['id']&&$post['action']==site_aurl($this->tablefunc)){
			$data = elements($this->fields,$post);
			$data['updatetime'] = time();
			$data['puttime'] = human_to_unix($post['puttime']);
			$user = $this->Data_model->getSingle(array('username' => trim($post['author'])), 'member');
			$data['uid'] = $user['id'];
			$this->Data_model->editData(array('id'=>$post['id']),$data);
			$category = $this->Data_model->getSingle(array('id'=>$data['category']),'category');
			$cachefile = $category['model'].'/detail_'.$this->editlang.'_'.$category['dir'].'_'.$post['id'];
			if(file_exists('data/cache/'.$cachefile)){
				$this->Cache_model->delete($cachefile);
			}
			show_jsonmsg(array('status'=>200,'id'=>$post['id'],'remsg'=>$this->_setlist($this->Data_model->getSingle(array('id'=>$post['id'])),false)));
		}else{
			$id = $this->uri->segment(4);
			if($id > 0 && $view = $this->Data_model->getSingle(array('id'=>$id))){
			    $member = $this->Data_model->getSingle(array('id' => $view['uid']), 'member');
			    $view['author'] = $member['username'];
				$res = array(
						'tpl'=>'view',
						'tablefunc'=>$this->tablefunc,
						'view'=>$view,
						'categoryarr'=>$this->categoryarr,
				);
				show_jsonmsg(array('status'=>200,'remsg'=>$this->load->view($this->tablefunc,$res,true)));
			}else{
				show_jsonmsg(array('status'=>203));
			}
		}
	}
	
	public function order(){
		$this->Purview_model->checkPurviewAjax($this->tablefunc,'order');
		$data = $this->Data_model->listorder($this->input->post('ids',true),$this->input->post('listorder',true),'listorder');
		$this->Cache_model->deleteSome($this->tablefunc.'_'.$this->editlang);
		$this->Cache_model->deleteSome('recommend_'.$this->editlang.'_'.$this->tablefunc);
		show_jsonmsg(array('status'=>200,'remsg'=>$this->_setlist($data,true)));
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
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'edit')){
				$item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/edit/'.$item['id']),'edit');
			}
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'order')){
				$item['func'] .= $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/order'),'order');
			}
			if($this->Purview_model->checkPurviewFunc($this->tablefunc,'del')){
				$item['func'] .=  $this->Purview_model->getSingleFunc(site_aurl($this->tablefunc.'/del/'.$item['id']),'sdel',$item['id']);	
			}
			if($item['attachfile'] == ''){
				$file = '无';
			}else{
				$file = '<a href='.site_url('download/article/'.$item['id']).'>点击下载</a>';
			}
			$user = $this->Data_model->getSingle(array('id' => $item['uid']), 'member');
			if(empty($user)){
			    $user['username'] = '用户不存在';
			}
			$categorystr = isset($this->categoryarr[$item['category']])?'[<a href="'.site_url('category/'.$this->categoryarr[$item['category']]['dir']).$this->langurl.'" target="_blank"><font color="green">'.$this->categoryarr[$item['category']]['content'].'</font></a>]':'';
			$newstr.='<tr id="tid_'.$item['id'].'">
			<td width=30><input type=checkbox name="optid[]" value='.$item['id'].'></td>
			<td width=50><input type="hidden" name="ids[]" value="'.$item['id'].'"><input type="text" name="listorder[]" class="input-order" size="3" value="'.$item['listorder'].'"></td>
			<td width=40>'.$item['id'].'</td>
			<td width=150>'.$categorystr.'</td>
			<td><a href="'.site_url('article/'.$item['id']).'" target="_blank" style="color:'.$item['color'].'">'.$item['title'].'</a></td>
			<td width=80>'.$file.'</td>
			<td width=150>'.date("Y-m-d H:i:s", $item['puttime']).'</td>
			<td width=100>'.$user['username'].'</td>
			<td width=50>'.$item['hits'].'</td>
			<td width=50 >'.lang('status'.$item['status']).'</td>
			<td width=50>'.$item['func'].'</td></tr>';
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