<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model{
	var $menu;
	
	function __construct(){
  		parent::__construct();
	}
	
	/*
	 * 根据一级菜单名获得文章列表，选取所有子菜单中的内容，按照创建时间的降序排列输出
	 * $dir, 一级菜单; $subDir, 二级菜单; $page, 第几页
	 * $menu, 传递进来的菜单数组
	 */
	function loadListByDir($dir, $subDir, $page, $menu){
		$listNum = $menu['top'][$dir]['pagesize'];
		$listExNum = $listNum * ($page - 1);
		
		//如果只有父级菜单，则从子菜单中选择最近更新的条目
		if($subDir == ''){
			$table = $menu['top'][$dir]['model'];
			$subMenuId = array();
			$subMenuId[] = $menu['top'][$dir]['id'];
			reset($menu['tree'][$dir]);
			foreach ($menu['tree'][$dir] as $value){
				$subMenuId[] = $value['id'];
			}
			$this->db->where_in('category', $subMenuId);
		}else{
			$table = $menu['tree'][$dir][$dir.'/'.$subDir]['model'];
			$category = $menu['tree'][$dir][$dir.'/'.$subDir]['id'];
			$this->db->where('category', $category);
		}
		$this->db->select($table.'.id, category, title, comments, lastreply, member.username, member.avatar, puttime');
		$this->db->where('status', 1);
		$this->db->join('member', 'member.id = '.$table.'.uid');
		$this->db->order_by('puttime', 'desc');
		$this->db->limit($listNum, $listExNum);
		$listData = $this->db->get($table)->result_array();
	
		//查总数
		if($subDir == ''){
			$this->db->where_in('category', $subMenuId);
			$this->db->where('status', 1);
			$listSum = $this->db->count_all_results($table);
		}else{			
			$this->db->where(array(
				'category' => $category,
				'status' => 1,
			));
			$listSum = $this->db->count_all_results($table);
		}
		
		return array(
			'listData' => $listData,
			'listSum' => $listSum,
			'pagesize' => $listNum,
		);
	}
	
	/*
	 * 处理时间参数
	 * $time, 输入unix时间戳
	 * return, 在网页上显示的时间格式
	 */
	function convertPutTime($time){
		$time = intval($time);
		$currentTime = time();
		$timeDif = $currentTime - $time;
		
		if($timeDif <= 60){
			return '几秒前';
		}else if($timeDif <= 3600){
			return floor($timeDif / 60).'分钟前';
		}else if($timeDif <= 86400){
			return floor($timeDif / 3600).'小时'.floor(($timeDif % 3600) / 60).'分钟前';
		}else if($timeDif <= 1728000){
			return floor($timeDif / 86400).'天前';
		}else{
			return date('Y-m-d', $time);
		}
	}
	
	/*
	 * 载入首页列表
	 * $pagesize: 页面大小
	 * $page第几页
	 */
	function loadHomeList($pageSize, $page){
		$listExNum = $pageSize * ($page - 1);
		
		$this->db->select('article.id, category, title, comments, lastreply, member.username, member.avatar, puttime');
		
		$this->db->join('member', 'member.id = article.uid');
		$this->db->where('status', 1);
		$this->db->order_by('puttime', 'desc');
		$this->db->limit($pageSize, $listExNum);
		$listData = $this->db->get('article')->result_array();
		
		$this->db->where('status', 1);
		$listSum = $this->db->count_all_results('article');
		
		return array(
			'listData' => $listData,
			'listSum' => $listSum,
			'pageSize' => $pageSize,
		);
	}
	
	/*
	 * 根据文章id查询其详细信息
	 * $id: 文章id;
	 * $menu: 菜单数组，用于查询其分类信息
	 */
	function loadArticleById($id, $menu){
		$this->db->select('category, title, uid, description, content, hits, puttime, updatetime, comments, attachfile');
		$this->db->where('id', $id);
		$data = $this->db->get('article')->row_array();
		if(empty($data)){
			return array();
		}
		
		$this->db->select('username');
		$this->db->where('id', $data['uid']);
		$author = $this->db->get('member')->row_array();
		$data['uid'] = $author['username'];
		
		$category = $menu['id'][$data['category']]['dir'];
		$categoryArr = explode('/', $category);
		if(count($categoryArr) == 1){
			$categoryArr['subDir'] = '';
		}else{
			$categoryArr['subDir'] = $menu['tree'][$categoryArr[0]][$category]['name'];
		}
		$categoryArr['dir'] = $menu['top'][$categoryArr[0]]['name'];
		$data['category'] = $categoryArr;
		
		$data['puttime'] = $this->convertPutTime($data['puttime']);
		$data['updatetime'] = date("Y-m-d H:i", $data['updatetime']);
		
		return $data;
	}
	
	/*
	 * 根据传入文章id增加点击数
	 */
	function addHits($id){
		$this->db->where('id', $id);
		$this->db->set('hits', 'hits + 1', false);
		$this->db->update('article');
	}
	
	/*
	 * 热门列表
	 * $num: 要显示的个数
	 */
	function loadMostHits($num = 10){
		$this->db->select('article.id, title, member.username, member.avatar');
		$this->db->where('status', 1);
		$this->db->join('member', 'article.uid = member.id');
		$this->db->order_by('hits', 'desc');
		$this->db->limit($num);
		$data = $this->db->get('article')->result_array();
		
		return $data;
	}
	
	/*
	 * 根据文章的id号获得评论数据
	 * $articleID: 文章id 
	 * $config: 网站配置
	 */
	function loadComments($articleID, $config){
		$this->db->select('comments.id, author, content, comments.createtime, member.avatar');
		$this->db->join('member', 'comments.uid = member.id');
		$this->db->from('comments');
		$this->db->where(array(
				'articleID' => $articleID,
				'category' => 1,
		));
		$this->db->order_by('createtime', 'asc');  //按回复时间的顺序排列
		$data = $this->db->get()->result_array();
		
		if(! empty($data)){
			foreach ($data as $key_a => $value_a){
				$data[$key_a]['createtime'] = date("Y-m-d H:i", $value_a['createtime']);
				$data[$key_a]['avatar'] = $config['site_templateurl'].$value_a['avatar'];
				
				//添加该条回复的附加评论
				$this->db->select('comments.id, author, content, comments.createtime, member.avatar');
				$this->db->join('member', 'comments.uid = member.id');
				$this->db->from('comments');
				$this->db->where(array(
						'articleID' => $articleID,
						'category' => 2,        //附加评论的类型为2
						'replytoID' => $value_a['id'],
				));
				$this->db->order_by('createtime', 'asc');
				$attach_data = $this->db->get()->result_array();
				if(! empty($attach_data)){
					foreach ($attach_data as $key_b => $value_b){
						$attach_data[$key_b]['createtime'] = date("Y-m-d H:i", $value_b['createtime']);
						$attach_data[$key_b]['avatar'] = $config['site_templateurl'].$value_b['avatar'];
					}
				}
				$data[$key_a]['attach'] = $attach_data;
			}
		}
		
		return $data;
	}
	
	/*
	 * 获取某一个用户发表的所有文章
	 * 输入：$user_name 用户名
	 */
	function loadListByUsername($user_name){
		$this->db->select('article.id, category, title, comments, lastreply, member.username, puttime');
		$this->db->join('member', 'member.id = article.uid');
		
		//最多显示10条
		$this->db->limit(10);
		$this->db->where(array(
				'status' => 1,
				'member.username' => $user_name,
		));
		$this->db->order_by('puttime', 'desc');
		$listData = $this->db->get('article')->result_array();
		
		return $listData;
	}
	
	//获取该用户的全部文章
	function loadAllListByUsername($username){
		$this->db->select('article.id, category, title, comments, lastreply, member.username, puttime');
		$this->db->join('member', 'member.id = article.uid');

		$this->db->where(array(
				'status' => 1,
				'member.username' => $username,
		));
		$this->db->order_by('puttime', 'desc');
		$listData = $this->db->get('article')->result_array();
		
		return $listData;
	}
	
	//统计发表文章的数目
	function countMyArticle($id){
		$this->db->where('uid', $id);
		return count($this->db->get('article')->result_array());
	}
	
	//获取该用户收藏的文章
	function loadFavorite($user_name){
		$uid = $this->session->userdata('id');
		
		//获取所以该用户收藏的文章的id
		$this->db->where('uid', $uid);
		$article_id = $this->db->get('favorite')->result_array();
		
		if(empty($article_id)){
			return array();
		}
		
		foreach ($article_id as $key => $value){
			$article_id[$key] = $value['article_id'];
		}
		
		$this->db->select('article.id, category, title, comments, lastreply, member.username, puttime');
		$this->db->join('member', 'member.id = article.uid');

		$this->db->where(array(
				'status' => 1,
		));
		$this->db->where_in('article.id', $article_id);
		$this->db->order_by('puttime', 'desc');
		$listData = $this->db->get('article')->result_array();
		
		return $listData;
	}
	
	function getByCategoryId($category)
	{
		$this->db->where(array(
				'status' => 1,
				'category' => $category,
		));
		$this->db->order_by('puttime', 'desc');
		return $this->db->get('article')->result_array();
	}
}