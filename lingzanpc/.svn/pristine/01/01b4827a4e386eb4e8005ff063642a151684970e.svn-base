<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function get_recommend($type1, $type2) {

		// 产品
		$table = 'lz_product';
		$select = 'proid, userid, proname, desc, smallpic, zancount';
		$where = array('isdel'=>0);
		$order = 'RAND()';

		$query = $this->db->select($select)->where_in('type1', $type1)->or_where_in('type2', $type2)->order_by($order)->limit(0, 10)->get($table);
		$product = $query->result_array();
		if(empty($product)) $product = $this->select_data($table, $select, $where, $order, 0, 10);

		$list1 = array();
		foreach ($product as $key => $value) {

			$list1[$key]['id'] = $value['proid'];
			$list1[$key]['userid'] = $value['userid'];
			$list1[$key]['name'] = $value['proname'];
			$list1[$key]['desc'] = $value['desc'];
			$list1[$key]['pic'] = $value['smallpic'];
			$list1[$key]['zancount'] = $value['zancount'];
			$list1[$key]['flag'] = 1;

			$list1[$key] = array_merge($list1[$key], $this->get_simple_user($value['userid']));

		}

		// 项目
		$table = 'lz_project';
		$select = 'proid, userid, proname, cover';
		$where = array('isdel'=>0);
		$order = 'RAND()';

		$query = $this->db->select($select)->where_in('type1', $type1)->or_where_in('type2', $type2)->order_by($order)->limit(0, 10)->get($table);
		$project = $query->result_array();
		if(empty($project)) $project = $this->select_data($table, $select, $where, $order, 0, 10);

		$list2 = array();
		foreach ($project as $key => $value) {

			$list2[$key]['id'] = $value['proid'];
			$list2[$key]['userid'] = $value['userid'];
			$list2[$key]['name'] = $value['proname'];
			$list2[$key]['pic'] = $value['cover'];
			$list2[$key]['zancount'] = 0;
			$list2[$key]['flag'] = 2;

			$list2[$key] = array_merge($list2[$key], $this->get_simple_user($value['userid']));

		}

		// 文章
		$table = 'lz_note';
		$select = 'noteid, userid, notename, cover, zancount';
		$where = array('isdel'=>0);
		$order = 'RAND()';

		$note = $this->select_data($table, $select, $where, $order, 0, 10);

		$list3 = array();
		foreach ($note as $key => $value) {

			$list3[$key]['id'] = $value['noteid'];
			$list3[$key]['userid'] = $value['userid'];
			$list3[$key]['name'] = $value['notename'];
			$list3[$key]['pic'] = $value['cover'];
			$list3[$key]['zancount'] = $value['zancount'];
			$list3[$key]['flag'] = 3;

			$list3[$key] = array_merge($list3[$key], $this->get_simple_user($value['userid']));

		}

		// 合并
		$list = array_merge($list1, $list2, $list3);
		shuffle($list);

		return $list;

	}

	public function get_talent() {

		$table = 'lz_user';
		$select  = 'userid, nickname, avatar, occupation, groupid';
		$where = array();
		$order = 'RAND()';

		$user = $this->select_data($table, $select, $where, $order, 0, 3);

		return $user;

	}

	public function get_project($type2) {

		$table = 'lz_project';
		$select  = 'proid, proname, cover';
		$where = array('isdel'=>0);
		$order = 'RAND()';

		$project = $this->select_data($table, $select, $where, $order, 0, 4);

		return $project;

	}

	public function get_product() {

		$table = 'lz_product';
		$select  = 'proid, proname, smallpic';
		$where = array('isdel'=>0);
		$order = 'RAND()';

		$product = $this->select_data($table, $select, $where, $order, 0, 6);

		return $product;

	}

	//获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}
}