<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	//修改数据
	public function editData($table, $where, $data) {

		return $this->update_data($table, $where, $data);

	}

	//获取单条数据
	public function getRowData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);

	}

	//获取城市列表
	public function getCityData($table, $select, $where, $order) {

		return $this->select_data3($table, $select, $where, $order);

	}


}