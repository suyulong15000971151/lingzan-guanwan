<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	//添加材思库\采集单品,关注人
	public function addData($table, $data) {

		return $this->insert_data($table, $data);

	}

	//改变字段
	public function changeField($table, $fieldArr, $where = array()) {

		return $this->field_edit($table, $fieldArr, $where);
	}

	//获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}

	//获取redis
	public function getRedisData($slice, $redis_key, $method, $field1, $field2) {
		return $this->getRedis($slice, $redis_key, $method, $field1, $field2);
	}

	//获取一个表的数据
	public function getTableData($table, $select = '*', $where, $order = ''){

		return $this->select_data3($table, $select, $where, $order);

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

}