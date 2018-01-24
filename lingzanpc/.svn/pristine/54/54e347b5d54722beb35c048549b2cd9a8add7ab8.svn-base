<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getServiceData($searchWord = '') {

		// $recommend = $this->select_data('lz_service_centre', 'id,title,isrecommend', array('isdel'=>0,'isrecommend'=>1), 'id desc', 0, 1000);
		$field = 'id,title,isrecommend';
		$where = array('isdel'=>0,'isrecommend'=>1);
		$recommend = $this->getList('lz_service_centre', $field, $where, 'id desc', 0, 1000);
		$condition = '';
		if($searchWord != '') {
			$condition = ' and title like "%'.$searchWord.'%" ';
		}
		$sql = " SELECT id,type,title,content,isrecommend FROM lz_service_centre WHERE 1 = 1 and isdel = 0 ".$condition." ORDER BY id desc LIMIT 0, 1000 ";
		$query = $this->db->query($sql);
		$list = $query->result_array();

		$result = array('recommend'=>$recommend,'list'=>$list);
		return $result;

	}

	public function getInfo($table, $select = '*', $where){
		return $this->select_data_row($table, $select, $where);
	}

	public function addData($table, $data) {
		return $this->insert_data($table, $data);
	}

	public function getList($data, $field, $where, $order, $offset = 0, $limit = 1) {

		return $this->select_data($data, $field, $where, $order, $offset, $limit);
	}

}