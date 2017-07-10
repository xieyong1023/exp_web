<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function show_message($message,$actionurl=array(),$target='_self'){
	$CI =& get_instance();
	$CI->load->vars('message',$message);
	$CI->load->vars('actionurl',$actionurl);
	$CI->load->vars('target',$target);
	$message = $CI->load->view('message.php','',true);
	echo $message;exit;
}

function top_redirect($url){
	header("Content-Type: text/html; charset=utf-8");
	$str = '<script type="text/javascript">';
	$str .= 'top.location.href="'.$url.'"';
	$str .= '</script>';
	echo $str;exit;
}

function show_jsonmsg($data){
	if(is_array($data)){
		$return = $data;
		if(! isset($return['status'])) {
		    $return['status'] = 200;
        }
	}else{
		$return = array('status'=>$data);
	}
	echo json_encode($return);exit;
}

function md5pass($pass,$salt){
	return md5(substr(md5($pass),0,10).$salt);
}

function get_image_url($url){
	if(substr($url,0,4)=='http'){
		return $url;	
	}else{
		return base_url($url);
	}
}

function get_full_url($url){
	if(substr($url,0,4)=='http'){
		return $url;
	}else{
		return site_url($url);
	}
}

function show_page($pagearr,$search=array()){
	$pagearr['pagenum']=isset($pagearr['pagenum'])&&$pagearr['pagenum']?$pagearr['pagenum']:20;
	$pagearr['currentpage']=$pagearr['currentpage']?$pagearr['currentpage']:1;
	$pagearr['numlinks']=isset($pagearr['numlinks'])&&$pagearr['numlinks']>0?$pagearr['numlinks']:5;
	$pagestr = '';
	$totalpage = ceil($pagearr['totalnum']/$pagearr['pagenum']);
	if($totalpage<2){
		return $pagestr;
	}
	if($pagearr['currentpage']>$pagearr['numlinks']){
		$pagestr .= '<a href="javascript:gotopage(1)">'.lang('first_page').'</a>';
	}
	if($pagearr['currentpage']>1){
		$pagestr .= '<a href="javascript:gotopage('.($pagearr['currentpage']-1).')">'.lang('pre_page').'</a>';
	}
	$prestart = $pagearr['currentpage']-$pagearr['numlinks'];
	$start = $prestart>1?$prestart:1;
	$end = $pagearr['currentpage']+$pagearr['numlinks'];
	$end = $end>$totalpage?$totalpage:$end;
	for($i=$start;$i<$pagearr['currentpage'];$i++){
		$pagestr .= '<a href="javascript:gotopage('.$i.')">'.$i.'</a>';
	}
	$pagestr .= '<strong>'.$i.'</strong>';
	for($i=$pagearr['currentpage'];$i<$end;$i++){
		$pagestr .= '<a href="javascript:gotopage('.($i+1).')">'.($i+1).'</a>';
	}
	if($pagearr['currentpage']<$totalpage){
		$pagestr .= '<a href="javascript:gotopage('.($pagearr['currentpage']+1).')">'.lang('next_page').'</a>';
	}
	if($end<$totalpage){
		$pagestr .= '<a href="javascript:gotopage('.$totalpage.')">'.lang('last_page').'</a>';
	}
	$pagestr .= '<form name="formpage" id="formpage" action="" method="post">';
	$pagestr .= '<input type="hidden" name="currentpage" id="currentpage" value="'.$pagearr['currentpage'].'">';
	foreach($search as $key=>$item){
		$pagestr .= '<input type="hidden" name="'.$key.'" value="'.$item.'">';
	}
	$pagestr .= '</form>';
	return $pagestr;
}

function replacekeyword($keywods,$urls,$content){
	$content = preg_replace("#(<a(.*))(>)(.*)(<)(\/a>)#isU", '\\1-]-\\4-[-\\6', $content);
	$content = @preg_replace("#(^|>)([^<]+)(?=<|$)#sUe", "highlight('\\2', \$keywods, \$urls, '\\1')", $content);
	$content = preg_replace("#(<a(.*))-\]-(.*)-\[-(\/a>)#isU", '\\1>\\3<\\4', $content);
	return $content;
}

function highlight($string, $words, $result, $pre){
	global $replaced;
	$string = str_replace('\"', '"', $string);
		foreach ($words as $key => $word){
			if($replaced[$word] == 1){
				continue;
			}
			$string = preg_replace("#".preg_quote($word)."#", $result[$key], $string,1);
			if(strpos($string, $word) !== FALSE){
				$replaced[$word] = 1;
			}
		}
	return $pre.$string;
}
/*
 * $type:1、文件夹 2、文件
 * $path:1、路径
 */
function dirfile_check($dirfile_items) {
	foreach($dirfile_items as $key => $item) {
		$item_path = $item['path'];
		if($item['type'] == 'dir') {
			if(!dir_writeable(FCPATH.$item_path)) {
				if(is_dir(FCPATH.$item_path)) {
					$dirfile_items[$key]['status'] = 0;
					$dirfile_items[$key]['current'] = '+r';
				} else {
					$dirfile_items[$key]['status'] = -1;
					$dirfile_items[$key]['current'] = 'nodir';
				}
			}else {
				$dirfile_items[$key]['status'] = 1;
				$dirfile_items[$key]['current'] = '+r+w';
			}
		} else {
			if(file_exists(FCPATH.$item_path)) {
				if(is_writable(FCPATH.$item_path)) {
					$dirfile_items[$key]['status'] = 1;
					$dirfile_items[$key]['current'] = '+r+w';
				} else {
					$dirfile_items[$key]['status'] = 0;
					$dirfile_items[$key]['current'] = '+r';
				}
			} else {
				if(dir_writeable(dirname(FCPATH.$item_path))) {
					$dirfile_items[$key]['status'] = 1;
					$dirfile_items[$key]['current'] = '+r+w';
				} else {
					$dirfile_items[$key]['status'] = -1;
					$dirfile_items[$key]['current'] = 'nofile';
				}
			}
		}
	}
	return $dirfile_items;
}

function dir_writeable($dir) {
	$writeable = 0;
	if(!is_dir($dir)) {
		@mkdir($dir, 0777);
	}
	if(is_dir($dir)) {
		if($fp = @fopen("$dir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}
	return $writeable;
}

//获得后缀名
function get_suffix($str){
	$arr = explode('.',$str);
	$num = count($arr);
	if($num>0){
		$res = $arr[$num-1];
		return $res;
	}else{
		return false;
	}
}

function splitsql($sql) {
	$sql = str_replace("\r", "\n", $sql);
	$ret = array();
	$num = 0;
	$queriesarray = explode(";\n", trim($sql));
	unset($sql);
	foreach($queriesarray as $query) {
		$queries = explode("\n", trim($query));
		$ret[$num] = '';
		foreach($queries as $query) {
			$ret[$num] .= $query[0] == "#" ? NULL : $query;
		}
		$num++;
	}
	return($ret);
}

function mult_to_single($arr,$key='id'){
	$newarr = array();
	foreach($arr as $item){
		$newarr[$item[$key]] = $item;
	}
	return $newarr;
}

function mult_to_idarr($arr,$key='id'){
	$newarr = array();
	foreach($arr as $item){
		$newarr[] = $item[$key];
	}
	return $newarr;
}

//用于给文件信息数组排序
//目录在前,文件在后; 小的在前，大的在后;
function cmp_func($a, $b) {
	global $order;
	if ($a['is_dir'] && !$b['is_dir']) {
		return -1;
	} else if (!$a['is_dir'] && $b['is_dir']) {
		return 1;
	} else {
		if ($order == 'size') {
			if ($a['filesize'] > $b['filesize']) {
				return 1;
			} else if ($a['filesize'] < $b['filesize']) {
				return -1;
			} else {
				return 0;
			}
		} else if ($order == 'type') {
			return strcmp($a['filetype'], $b['filetype']);
		} else {
			return strcmp($a['filename'], $b['filename']);
		}
	}
}



function subString($str, $start, $length) {
    $i = 0;
    //完整排除之前的UTF8字符
    while($i < $start) {
        $ord = ord($str{$i});
        if($ord < 192) {
            $i++;
        } elseif($ord <224) {
            $i += 2;
        } else {
            $i += 3;
        }
    }
    //开始截取
    $result = '';
    while($i < $start + $length && $i < strlen($str)) {
        $ord = ord($str{$i});
        if($ord < 192) {
            $result .= $str{$i};
            $i++;
        } elseif($ord <224) {
            $result .= $str{$i}.$str{$i+1};
            $i += 2;
        } else {
            $result .= $str{$i}.$str{$i+1}.$str{$i+2};
            $i += 3;
        }
    }
    if($i < strlen($str)) {
        $result .= '...';
    }
    return $result;
}



//$sourcestr 是要处理的字符串
//$cutlength 为截取的长度(即字数)
function cut_str($sourcestr,$cutlength)
{
$returnstr='';
$i=0;
$n=0;
$str_length=strlen($sourcestr);//字符串的字节数
while (($n<$cutlength) and ($i<=$str_length))
{
$temp_str=substr($sourcestr,$i,1);
$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
if ($ascnum>=224) //如果ASCII位高与224，
{
$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
$i=$i+3; //实际Byte计为3
$n++; //字串长度计1
}
elseif ($ascnum>=192) //如果ASCII位高与192，
{
$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
$i=$i+2; //实际Byte计为2
$n++; //字串长度计1
}
elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
{
$returnstr=$returnstr.substr($sourcestr,$i,1);
$i=$i+1; //实际的Byte数仍计1个
$n++; //但考虑整体美观，大写字母计成一个高位字符
}
else //其他情况下，包括小写字母和半角标点符号，
{
$returnstr=$returnstr.substr($sourcestr,$i,1);
$i=$i+1; //实际的Byte数计1个
$n=$n+0.5; //小写字母和半角标点等与半个高位字符宽...
}
}
if ($str_length>$cutlength){
$returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
}
return $returnstr;

}

/**
 * 中文字符串的截取
 *
 * @access: public
 * @author: linyong
 * @param: string，$str，原字符串
 * @param: int，$len ，截取的长度
 * @return: string
 */
function utf_substr($str,$len){
    for($i=0;$i<$len;$i++){
        $temp_str=substr($str,0,1);
        if(ord($temp_str) > 127){
            $i++;
            if($i<$len){
                $new_str[]=substr($str,0,3);
                $str=substr($str,3);
            }
        }else{
            $new_str[]=substr($str,0,1);
            $str=substr($str,1);
        }
    }
    return join($new_str);
}


/* 
 ============================================
	 函数名称：cn_DelAllHTML
	 函数功能：过滤所有的html格式
	 传入参数：
	    1、$content：指定要过滤的字符串
     返回结果：字符串 
 ============================================
*/
function clearHTML($content)
{
$searchaborative = array(
	"/\\<[\\/\\!]*?[^\\<\\>]*?\\>/si", 
	"/\t/", 
	"/[\r\n]+/", 
	"/(^[\r\n]|[\r\n]\$)+/", 
	"/&(quot|#34);/i", 
	"/&(amp|#38);/i", 
	"/&(lt|#60);/i", 
	"/&(gt|#62);/i", 
	"/&(nbsp|#160|\t);/i", 
	"/&(iexcl|#161);/i", 
	"/&(cent|#162);/i", 
	"/&(pound|#163);/i", 
	"/&(copy|#169);/i", 
	"/&#(\\d+);/e");
$replaceaborative = array("", "", "\r\n", "", "\"", "&", "<", ">", " ", chr(161), chr(162), chr(163), chr(169), "chr(\\1)");


	return preg_replace($searchaborative, $replaceaborative, $content);

}

/*
 *字符串重组,批量上传图片
 */
function getfilepath($filepath)
{
    if($filepath!='')
    {
        $arr_path=explode(",",$filepath);
        foreach($arr_path as $file)
        {
            if($file!='')
            {
                $files.=",".$file;
            }
        }
        return str_replace(",,","",",".$files);
    }
}
