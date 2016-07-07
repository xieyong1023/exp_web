<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Purview_model extends CI_Model
{
	function __construct(){
  		parent::__construct();
	}
	
	/*
	 * @$class: 待检测的模板名
	 * @$method: 方法名
	 * 
	 * 返回：
	 * 200： true;
	 * 201: 需要登陆
	 * 202: 显示没有权限
	 */
	function checkPurview($class, $method='index'){
		$status=$this->isPurview($class, $method);
		switch($status){
			case '200':
				return true;
				break;
			case '201':
				$actionurl[] = array('name'=>lang('user_login'),'url'=>site_aurl('login/lose/'));
				show_message(lang('login_lose'),$actionurl);
				break;
			case '202':
				show_message(lang('nopurview'));
				break;
			default:
				show_message(lang('nopurview'));
				break;
		}
	}
	
	function checkPurviewAjax($class,$method='index'){
		$status=$this->isPurview($class,$method);
		switch($status){
			case '200':
				return true;
				break;
			case '201':
				show_jsonmsg(array('status'=>201,'remsg'=>lang('login_lose')));
				break;
			case '202':
				show_jsonmsg(array('status'=>202,'remsg'=>lang('nopurview')));
				break;
			default:
				show_jsonmsg(array('status'=>202,'remsg'=>lang('nopurview')));
				break;
		}
	}
	
	function checkPurviewFunc($class,$method='index'){
		if($this->isPurview($class,$method)==200){
			return true;
		}else{
			return false;
		}
	}
	
	/*
	 * @$class: 模板名
	 * @$method: 方法名
	 * 
	 * 返回：
	 * 200: 检查通过
	 * 201: 未登陆
	 * 202: 该用户不具备相应权限
	 */
	function isPurview($class, $method){
		$CI =& get_instance();
		$CI->load->library('session');
		$usergroupid=$CI->session->userdata('usergroup');
		if($usergroupid==1){       //超级用户
			return 200;
		}
		if(!$usergroupid){         //未登陆
			return 201;
		}
		$purview = $this->getPurview($usergroupid);   //获取该用户组的权限
		if(!isset($purview[1][$class])){              //没有改模板的权限
			return 202;
		}
		if($method=='index'){
			return 200;
		}
		if(in_array($method,$purview[1][$class]['method'])){ //对该模板具有相应权限
			return 200;
		}
		return 202;
	}
	
	/*
	 * 功能： 获取相应用户组的权限信息
	 * 
	 * @$usergroupid: 用户组id
	 * 
	 * 返回：
	 * 权限数组
	 */
	function getPurview($usergroupid){
		$CI =& get_instance();
		$CI->load->model('Data_model');
		$row = $CI->Data_model->getSingle(array('id'=>$usergroupid),'usergroup');
		$purview = unserialize($row['purview']);
		if($row['isupdate']==1){
			if($purview[0]){
				$arr = $CI->Data_model->getData(array('status'=>1,'id'=>$purview[0]),'listorder',0,0,'purview');
				$newpurviewid = array();
				$newpurviewarr = array();
				foreach($arr as $key=>$item){
					$newpurviewid[] = $item['id'];
					$newpurviewarr[$item['class']]['id'] = $item['id'];
					$newpurviewarr[$item['class']]['class'] = $item['class'];
					$newpurviewarr[$item['class']]['method'] = $purview[1][$item['class']]['method'];
					$grouppurview[$item['parent']][] = $item;
					if($item['parent']==0){
						$parentpurview[$item['id']] = $item;
					}
				}
				$purview = array(0=>$newpurviewid,1=>$newpurviewarr,2=>$grouppurview,3=>$parentpurview);
				$data = array('purview'=>serialize($purview),'isupdate'=>0);
				$CI->Data_model->editData(array('id'=>$usergroupid),$data,'usergroup');
				return $purview;
			}else{
				return $purview;
			}
		}else{
			return $purview;
		}
	}
	
	//清空usergroup表中isupdate=1的项
	function resetPurview(){
		$CI =& get_instance();
		$CI->load->model('Data_model');
		$upgroupdata = array('isupdate'=>1);
		$CI->Data_model->editData('',$upgroupdata,'usergroup');
	}
	
	function getFunc($tablefunc,$funcarr=array()){
		$resstr = '';
		foreach($funcarr as $func){
			if($this->checkPurviewFunc($tablefunc,$func)){
				$resstr .= '<input type="button" class="btn" onclick="submitTo(\''.site_aurl($tablefunc.'/'.$func).'\',\''.$func.'\')" value="'.lang('btn_'.$func).'">';
			}
		}
		return $resstr;
	}
	
	function getSingleFunc($url,$func,$extra=false){
		$extra = $extra?',\''.$extra.'\'':'';
		$resstr='<a href="javascript:submitTo(\''.$url.'\',\''.$func.'\''.$extra.')" title=\''.lang('btn_'.$func).'\' class=\''.$func.'\'></a>';
		return $resstr;
	}
	
	function getOtherFunc($funcstr,$func){
		$resstr = '<input type="button" class="btn" onclick="'.$funcstr.'" value="'.lang('btn_'.$func).'">';
		return $resstr;
	}
}