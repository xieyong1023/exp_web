<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Experiment_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//所有实验项目
	function loadAll(){
		$this->db->select('experiment.id, article_id, user, experiment.status, ip, pass, article.title');
		$this->db->from('experiment');
		$this->db->join('article', 'article.id = experiment.article_id');
		
		return $this->db->get()->result_array();
	}
	
	/*
	 * 用过的实验
	 */
	function loadUse($user_name){
		$this->db->select('experiment_id');
		$this->db->where('username', $user_name);
		$exp_array = $this->db->get('use')->result_array();
		foreach ($exp_array as $key => $value){
			$exp_array[$key] = array_flip($value);
		}
		
		$exp = array();
		foreach ($exp_array as $value){
			foreach ($value as $key => $data){
				$exp[$key] = $data;
			}
		}
		$exp_id = array_keys($exp);
		
		if(empty($exp_id)){
			return array(
					'use' => array(),
					'count' => 0,
			);
		}
		
		$this->db->select('experiment.id, article_id, user, experiment.status, ip, pass, article.title');
		$this->db->from('experiment');
		$this->db->join('article', 'article.id = experiment.article_id');
		$this->db->where_in('experiment.id', $exp_id);
		
		$use = $this->db->get()->result_array();
		$return = array(
				'use' => $use,
				'count' => count($exp),
		);
		
		return $return;
	}
	
	function countMyExp($user_name){
		$this->db->select('experiment_id');
		$this->db->where('username', $user_name);
		$exp_array = $this->db->get('use')->result_array();
		foreach ($exp_array as $key => $value){
			$exp_array[$key] = array_flip($value);
		}
		
		$exp = array();
		foreach ($exp_array as $value){
			foreach ($value as $key => $data){
				$exp[$key] = $data;
			}
		}
		$exp_id = array_keys($exp);
		
		return count($exp_id);
	}
}
?>