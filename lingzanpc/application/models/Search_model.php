<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getProjectData($seachWord, $p, $x_index, $y_index) {

		$p = $p * 18;
		$table = 'lz_project';
		$select = '`proid`, `userid`, `proname`, `libid`, `cover`, `tag`';
		$like = array();
		$order = 'RAND()';
		$pageSize = 18;
		$condition = ' AND isshow = 1 AND isdel = 0';

		if(!empty($seachWord)) {

			$typeArr4 = $this->config->item('style_type1');

			$like = explode(',', $seachWord);
			foreach ($like as $v) {

				if(array_key_exists($v, $typeArr4)) {

					$coordinateRange = $typeArr4[$v];
					$coordinateArr = explode(',', $coordinateRange);
					$x_coordinate1 = $coordinateArr[0];
					$y_coordinate1 = $coordinateArr[1];
					$x_coordinate2 = $coordinateArr[2];
					$y_coordinate2 = $coordinateArr[3];

					if($x_coordinate2 == 7) {
						$con = ' and x_index <= '.$x_coordinate2;
					}else{
						$con = ' and x_index < '.$x_coordinate2;
					}

					if($y_coordinate1 == 5) {
						$con1 = ' and y_index <= '.$y_coordinate1;
					}else{
						$con1 = ' and y_index < '.$y_coordinate1;
					}
					$condition .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%" or (x_index >= '.$x_coordinate1.' '.$con.' and y_index >= '.$y_coordinate2.' '.$con1.' )) ';

				}else{

					$condition .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%") ';
				}

			}

		}

		// $sql = 'select '.$select.' from '.$table.' where 1 = 1 '.$condition.' order by '.$order.' limit '.$p.','.$pageSize;
		$sql = "SELECT ".$select.",SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM ".$table." WHERE 1 = 1 ".$condition." ORDER BY `range` LIMIT ".$p.",".$pageSize;
		$query = $this->db->query($sql);
		$product = $query->result_array();
		// echo $this->db->last_query();

		$list2 = array();
		foreach ($product as $key => $value) {

			$list2[$key]['id'] = $value['proid'];
			$list2[$key]['name'] = $value['proname'];
			$cover = explode(',', $value['cover']);
			$list2[$key]['pic'] = $cover[0];
			$list2[$key]['tag'] = $value['tag'];
			$list2[$key]['userid'] = $value['userid'];
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

			$where = array('libid'=>$value['libid']);
			$library = $this->getData('lz_library', 'libname', $where);
			$list2[$key]['libname'] = $library['libname'];

			$list2[$key] = array_merge($list2[$key], $this->get_simple_user($value['userid']));

		}

		//获取总数
		$row = $this->getCount($table,$condition);
		$result = array('row'=>$row,'list'=>$list2);
		return $result;

	}

	public function getCollectionData($seachWord, $p, $x_index, $y_index) {

		$p = $p * 18;
		$table = 'lz_product';
		$select = '`proid`, `userid`, `proname`, `smallpic`, `zancount`, `desc`';
		$like = array();
		$order = 'RAND()';

		$pageSize = 18;
		$condition = ' and isdel = 0 ';

		if(!empty($seachWord)) {

			$typeArr3 = $this->config->item('style_type1');

			$like = explode(',', $seachWord);
			foreach ($like as $v) {

				if(array_key_exists($v, $typeArr3)) {

					$coordinateRange = $typeArr3[$v];
					$coordinateArr = explode(',', $coordinateRange);
					$x_coordinate1 = $coordinateArr[0];
					$y_coordinate1 = $coordinateArr[1];
					$x_coordinate2 = $coordinateArr[2];
					$y_coordinate2 = $coordinateArr[3];

					if($x_coordinate2 == 7) {
						$con1 = ' x_index <= '.$x_coordinate2;
					}else{
						$con1 = ' x_index < '.$x_coordinate2;
					}

					if($y_coordinate1 == 5) {

						$con2 = ' y_index <= '.$y_coordinate1;
					}else{

						$con2 = ' y_index < '.$y_coordinate1;
					}

					$condition .= ' and (proname like "%'.$v.'%" or (x_index >= '.$x_coordinate1.' and '.$con1.' and y_index >= '.$y_coordinate2.' and '.$con2.' )) ';

				}else{

					$condition .= ' and (proname like "%'.$v.'%") ';
				}

			}

		}

		// $sql = 'select '.$select.' from '.$table.' where 1 = 1 '.$condition.' order by '.$order.' limit '.$p.','.$pageSize;
		$sql = "SELECT ".$select.",SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM ".$table." WHERE 1 = 1 ".$condition." ORDER BY `range` LIMIT ".$p.",".$pageSize;
		$query = $this->db->query($sql);
		$product = $query->result_array();
		// echo $this->db->last_query();

		$list1 = array();
		foreach ($product as $key => $value) {

			$list1[$key]['id'] = $value['proid'];
			$list1[$key]['name'] = $value['proname'];
			$list1[$key]['pic'] = $value['smallpic'];
			$list1[$key]['zancount'] = $value['zancount'];
			$list1[$key]['userid'] = $value['userid'];
			$list1[$key]['desc'] = $value['desc'];
			$list1[$key]['flag'] = 1;

			$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $value['proid']);
			$msg = $this->select_data_row('lz_msg', 'id', $where);
			$list1[$key]['alreadyZan'] = 0;
			if(!empty($msg)) {

				$list1[$key]['alreadyZan'] = 1;
			}
			$list1[$key] = array_merge($list1[$key], $this->get_simple_user($value['userid']));

		}

		//获取总数
		$row = $this->getCount($table,$condition);
		$result = array('row'=>$row,'list'=>$list1);
		return $result;

	}

	public function getUserData($seachWord ,$whereOr, $p) {

		$p = $p * 18;
		$select = 'userid,nickname,avatar,librarycount,productcount';
		$order = 'userid desc';
		$where = '';
		$pageSize = 18;
		$result = array();
		if(!empty($seachWord)) {

			$like = explode(',', $seachWord);
			foreach ($like as $v) {
				$where .= ' and nickname like "%'.$v.'%" ';
			}

		}

		if(!empty($whereOr)) {
			$where .= ' and ';
			$end = count($whereOr)-1;
			if($end != 0) {
				foreach ($whereOr as $k1 => $v1) {
					if($k1 == 0){
						$where .= ' (groupid = '.$v1.' or ';
					}else if($k1 == $end) {
						$where .= ' groupid = '.$v1.' ) ';
					}else{
						$where .= ' groupid = '.$v1.' or ';
					}
					
				}
			}else{
				$where .= ' groupid = '.$whereOr['0'];
			}
			

		}

		$sql = 'select '.$select.' from lz_user  where 1 = 1 '.$where.' order by '.$order.' limit '.$p.','.$pageSize;
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$list = $query->result_array();
		$result['list'] = $list;

		//获取总数
		$row = $this->getCount('lz_user',$where);

		foreach ($result['list'] as $k => $v) {

			$userid = $v['userid'];
			$where = array('userid'=>$userid,'isdel'=>0);
			$select = 'proid,proname,smallpic';
			$order = 'proid desc';
			$product = $this->select_data('lz_product', $select, $where, $order, 0, 3);

			$result['list'][$k]['product'] = $product;
			$result['list'][$k]['flag'] = 4;

			$where = array('followid'=>$v['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$result['list'][$k]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$result['list'][$k]['alreadyFollow'] = 1;
			}

		}
		$result['row'] = $row;
		return $result;

	}

    public function getCount($table, $where) {

		$sql = 'select count(*) as count from '.$table.' where 1 = 1 '.$where;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['count'];

    }

    //获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}


	public function getNoteData($seachWord, $p) {

		$p = $p * 18;
		$table = 'lz_note';
		$select = '`noteid`, `userid`, `notename`, `cover`';
		$like = array();
		$order = 'RAND()';

		$pageSize = 18;
		$condition = 'and isdel = 0 ';

		if(!empty($seachWord)) {

			$like = explode(',', $seachWord);
			foreach ($like as $v) {
				$condition .= ' and (notename like "%'.$v.'%") ';
			}

		}

		$sql = 'select '.$select.' from '.$table.' where 1 = 1 '.$condition.' order by '.$order.' limit '.$p.','.$pageSize;
		$query = $this->db->query($sql);
		$note = $query->result_array();

		$list1 = array();
		foreach ($note as $key => $value) {

			$list1[$key]['id'] = $value['noteid'];
			$list1[$key]['name'] = $value['notename'];
			$list1[$key]['pic'] = $value['cover'];
			$list1[$key]['userid'] = $value['userid'];
			$list1[$key]['flag'] = 3;

			$where = array('followid'=>$value['noteid'],'userid'=>$this->user->userid,'followtype'=>3);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list1[$key]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$list1[$key]['alreadyFollow'] = 1;
			}

			$where = array('followid'=>$value['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$list1[$key]['alreadyFollow1'] = 0;
			if(!empty($res)) {

				$list1[$key]['alreadyFollow1'] = 1;
			}

			$list1[$key] = array_merge($list1[$key], $this->get_simple_user($value['userid']));

		}

		//获取总数
		$row = $this->getCount($table,$condition);
		$result = array('row'=>$row,'list'=>$list1);
		return $result;

	}

	//获取关键字
	public function getKeyWorkList($offset) {

		$offset = $offset*7;
		$type0 = $this->config->item('style_type');
		$type1 = array_flip($type0);

		$count = count($type1);
		$pages = ceil($count/7);

		$type1 = array_slice($type1, $offset, 7);

		$result = array('list'=>$type1,'pages'=>$pages);
		return $result;

	}



}