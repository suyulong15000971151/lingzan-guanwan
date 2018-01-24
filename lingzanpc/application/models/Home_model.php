<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function get_recommend($p, $x_index, $y_index) {

		$p1 = ($p - 1) * 10;
		$p2 = $p * 10;

		// 产品
		$sql = "SELECT *,SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM lz_product WHERE oproid=0 AND isdel=0 ORDER BY `range` LIMIT {$p1},{$p2}";
		$query = $this->db->query($sql);
		$product = $query->result_array();

		$list1 = array();
		foreach ($product as $key => $value) {

			$list1[$key]['id'] = $value['proid'];
			$list1[$key]['userid'] = $value['userid'];
			$list1[$key]['name'] = $value['proname'];
			$list1[$key]['desc'] = $value['desc'];
			$list1[$key]['pic'] = $value['smallpic'];
			$list1[$key]['zancount'] = $value['zancount'];
			$list1[$key]['flag'] = 1;

			$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $value['proid']);
			$msg = $this->select_data_row('lz_msg', 'id', $where);
			$list1[$key]['alreadyZan'] = 0;
			if(!empty($msg)) {

				$list1[$key]['alreadyZan'] = 1;
			}

			$list1[$key] = array_merge($list1[$key], $this->get_simple_user($value['userid']));

		}

		// 项目
		$sql = "SELECT *,SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM lz_project WHERE oproid=0 AND isshow=1 AND isdel=0 ORDER BY `range` LIMIT {$p1},{$p2}";
		$query = $this->db->query($sql);
		$project = $query->result_array();

		$list2 = array();
		foreach ($project as $key => $value) {

			$list2[$key]['id'] = $value['proid'];
			$list2[$key]['userid'] = $value['userid'];
			$list2[$key]['name'] = $value['proname'];
			$cover = explode(',', $value['cover']);
			$list2[$key]['pic'] = !empty($value['cover']) ? $cover['0'] : $this->config->item('static_url')."/image/li_image.jpg";
			$list2[$key]['zancount'] = 0;
			$list2[$key]['flag'] = 2;

			$where = array('followid'=>$value['proid'],'userid'=>$this->user->userid,'followtype'=>2);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list2[$key]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$list2[$key]['alreadyFollow'] = 1;
			}

			$where = array('followid'=>$value['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list2[$key]['alreadyFollow1'] = 0;
			if(!empty($res)) {

				$list2[$key]['alreadyFollow1'] = 1;
			}

			$list2[$key] = array_merge($list2[$key], $this->get_simple_user($value['userid']));

		}

		// 文章
		$sql = "SELECT * FROM lz_note WHERE isdel=0 ORDER BY addtime DESC LIMIT {$p1},{$p2}";
		$query = $this->db->query($sql);
		$note = $query->result_array();

		$list3 = array();
		foreach ($note as $key => $value) {

			$list3[$key]['id'] = $value['noteid'];
			$list3[$key]['userid'] = $value['userid'];
			$list3[$key]['name'] = $value['notename'];
			$list3[$key]['pic'] = $value['cover'];
			$list3[$key]['zancount'] = $value['zancount'];
			$list3[$key]['flag'] = 3;

			$where = array('followid'=>$value['noteid'],'userid'=>$this->user->userid,'followtype'=>3);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list3[$key]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$list3[$key]['alreadyFollow'] = 1;
			}

			$where = array('followid'=>$value['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list3[$key]['alreadyFollow1'] = 0;
			if(!empty($res)) {

				$list3[$key]['alreadyFollow1'] = 1;
			}

			$list3[$key] = array_merge($list3[$key], $this->get_simple_user($value['userid']));

		}

		// 合并
		$list = array_merge($list1, $list2, $list3);
		shuffle($list);

		return $list;

	}

	//获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}

}