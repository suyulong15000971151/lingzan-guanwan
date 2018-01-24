<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}


	//获取单条数据
	public function getRowData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);

	}

	//添加数据
	public function addData($table, $data) {

		return $this->insert_data($table, $data);
	}

	//修改数据
	public function edit_table($table, $where, $data = array()) {

		return $this->update_data($table, $where, $data);

	}

	//获取缓存
	public function getRedisData($slice, $redis_key, $method, $field1, $field2) {

		return $this->getRedis($slice, $redis_key, $method, $field1, $field2);
	}

}