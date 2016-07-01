<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function x6cms_lang(){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadLang();
	return $data;
}

function x6cms_path($path){
	if(substr($path,0,4)=='http'){
		return $path;
	}else{
		return base_url($path);
	}
}

function x6cms_location($category,$code=''){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadLocation($category,$code);
	return $data;
}

function x6cms_url($url){
	if(substr($url,0,4)=='http'){
		return $url;
	}else{
		return site_url($url);
	}
}

function x6cms_search($model='article',$ismult=true){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadSearch($model,$ismult);
	return $data;
}

function x6cms_navigation($type){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadNavigation($type);
	return $data;
}

function x6cms_keywords(){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadKeywords();
	return $data;
}

function x6cms_category($num=0){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadCategory($num);
	return $data;
}

function x6cms_slide($type){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadSlide($type);
	return $data;
}

function x6cms_modellist($model,$category,$order,$num,$recommend){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadModel($model,$category,$order,$num,$recommend);
	return $data;
}

function x6cms_recommend($recommendid,$order,$num){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadRecommend($recommendid,$order,$num);
	return $data;
}

function x6cms_fragment($varname){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadFragment($varname);
	return $data;
}

function x6cms_tags($num=0){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadTags($num);
	return $data;
}

function x6cms_tagsData($model,$tags,$num){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadTagsData($model,$tags,$num);
	return $data;
}

function x6cms_link($type=0,$id=0){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadLink($type,$id);
	return $data;
}

function x6cms_online($type=''){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadOnline($type);
	return $data;
}

function x6cms_thiscategory($category){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadThisCategory($category);
	return $data;
}

function x6cms_allcategory(){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadAllCategory();
	return $data;
}

function x6cms_singlecategory($getwhere="",$order='',$pagenum="0",$exnum="0",$table=''){
	$CI =& get_instance();
	$data=$CI->Data_model->getData($getwhere,$order,$pagenum,$exnum,$table);
	return $CI->Cache_model->handleCategoryData($data);
}

function x6cms_related($detail,$num=5){
	$CI =& get_instance();
	$data=$CI->Cache_model->loadRelated($detail,$num);
	return $data;
}


