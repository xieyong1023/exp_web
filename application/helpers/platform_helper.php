<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 生成随机字符串
 * $length: 字符串的长度
 */
function getRandChar($length){
	$str = null;
	$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	$max = strlen($strPol)-1;

	for($i=0;$i<$length;$i++){
		$str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
	}

	return $str;
}

//生成cookie密钥
//输入用户id
function md5Cookie($id){
	return $id.'&'.md5($id.getRandChar(10));
}

/*
 * 函数功能: 生成分页条
 * @$dir: 当前目录
 * @$current: 当前页
 * @$sum: 总的条目数;
 * @$pageSize: 每一页的条目数;
 */
function setPaging($dir, $current, $sum, $pageSize){
	$pageNum = ceil($sum / $pageSize);
	if($pageNum == 0){
		$pageNum = 1;
	}
	if($current < 3){
		$pre = 1;
		$min = 1;
		if($pageNum == 1){
			$max = 1;
		}else if($pageNum < 5){
			$max = $pageNum;
		}else{
			$max = 5;
		}
		if(($current + 1) < $pageNum){
			$next = $current + 1;
		}else {
			$next = $pageNum;
		}
	}else if(($current + 2) <= $pageNum){
		$pre = $current - 1;
		$min = $current - 2;
		$max = $current + 2;
		$next = $current + 1;
	}else{
		$pre = $current - 1;
		if(($pageNum - 4) > 1){
			$min = $pageNum - 4;
		}else{
			$min = 1;
		}
		$max = $pageNum;
		if(($current + 1) < $pageNum){
			$next = $current + 1;
		}else {
			$next = $pageNum;
		}
	}
	
	$content = '';
	$content .= creatPagingButton('首页', base_url($dir));
	$content .= creatPagingButton('上一页', base_url($dir.'/'.$pre));
	for($i = $min; $i <= $max; $i++){
		$content .= creatPagingButton($i, base_url($dir.'/'.$i), true);
	}
	$content .= creatPagingButton('下一页', base_url($dir.'/'.$next));
	$content .= creatPagingButton('尾页', base_url($dir.'/'.$pageNum));

	return array(
		'content' => $content,
		'pageNum' => $pageNum,
	);
}

/*
 * 函数功能: 创建一个分页按钮
 * $num: 按钮的值;
 * $url: 按钮的链接值;
 * $id: 是否加上id
 * $current: 当前页
 */
function creatPagingButton($data, $url, $id = false){
	$content = '';
	$content .= '<a class="button"';
	if($id){
		$content .= ' id="'.'Paging'.$data.'"';
	}
	$content .= ' href="'.$url.'" >';
	$content .= $data.'</a>';
	return  $content;
}

/*
 * 将时间格式化为 aaaa-bb-cc dd:ee
 */
function dateFormat($time){
	return date("Y-m-d H:i", $time);
}

/*
 * 将时间间隔(单位秒)转为直观的字符串
 */
function dateSpan($span){
	if(!is_numeric($span) || $span < 0){
		return '';
	}
	if($span < 60){
		return $span.'秒';
	}else if($span < 3600){
		return ($span / 60).'分'.($span % 60).'秒';
	}else if($span < 86400){
		return ($span / 3600).'小时'.(($span % 3600) /60).'分';
	}else{
		return '大于1天';
	}
}