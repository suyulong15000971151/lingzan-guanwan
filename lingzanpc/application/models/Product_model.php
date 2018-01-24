<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	//获取个人材思库列表
	public function getLibraryData($table, $select = '*', $where , $order) {

		return $this->select_data3($table, $select, $where , $order);
	}


	//添加材思库\采集单品,关注人
	public function addData($table, $data) {

		return $this->insert_data($table, $data);

	}


	//获取数据
	public function getTable($table, $select, $where, $order = array(), $offset = 0, $limit = 1) {

		return $this->select_data($table, $select, $where, $order, $offset, $limit);
	}

	public function check_msg($data) {

		$table = 'lz_msg';
		$select = '*';
		$where = $data;
		$order = '';

		$msg = $this->select_data_row($table, $select, $where);

		if(empty($msg)) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	public function set_msg($data) {

		$table = 'lz_msg';
		return $this->insert_data($table, $data);

	}

	//获取今天添加数据的数量
	public function getAddCountByToDay($table, $field, $where=array()) {
		$startTime = strtotime(date('Y-m-d'));
		$endTime = strtotime(date('Y-m-d',strtotime('+1 day')));
		$condiction = 'and unix_timestamp(`'.$field.'`) >= '.$startTime.' and unix_timestamp(`'.$field.'`) < '.$endTime ;

		if(!empty($where)) {
			foreach ($where as $k => $v) {
				$condiction .= ' and '.$k.' = '.$v;
			}

		}
		$sql = 'select count(*) as count from '.$table.' where 1 = 1 '.$condiction;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		// echo $this->db->last_query();
		return $result;


	}

	//改变字段
	public function changeField($table, $fieldArr, $where = array()) {

		return $this->field_edit($table, $fieldArr, $where);
	}

	//设置产品的上浮
	public function setProductFloat($val,$sidStr) {

		$sql = 'update lz_project_product set ppprice = ppprice*(100+'.$val.')/100,ppfloat = '.$val.' where sid in ('.$sidStr.')';
		$this->db->query($sql);
		// echo $this->db->last_query();
		return $this->db->affected_rows();

	}

}