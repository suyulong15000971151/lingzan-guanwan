<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function get_recommend($p, $type, $seachWord, $x_index, $y_index) {

		$p = $p * 20;
		// $where = ' and oproid=0 AND isdel=0 ';
		$where = ' and isdel=0 ';
		if(!empty($type)) {
			$where .= ' and type1 = '.$type;
		}

		if(!empty($seachWord)) {

			$typeArr2 = $this->config->item('product_function_'.$type);
			$typeArr3 = $this->config->item('style_type1');

			$like = explode(',', $seachWord);
			foreach ($like as $v) {
				$type2 = 0;
				if(is_array($typeArr2)) {
					$type2 = array_search($v, $typeArr2);
				}

				if(!empty($type2) && $type != 0) { 
					$where .= ' and (proname like "%'.$v.'%" or type2 = '.$type2.') ';
				}else{//1. $type2='',$type!=0  2. $type2='',$type==0  3. $type2!='',$type==0

					if($type == 0) {//2. $type2='',$type==0  3. $type2!='',$type==0

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
							// $where .= ' and (proname like "%'.$v.'%" or (x_index >= '.$x_coordinate1.' and '.$con1.' and y_index >= '.$y_coordinate2.' and '.$con2.' )) ';
							$where .= ' and (proname like "%'.$v.'%" or (x_index >= '.$x_coordinate1.' and '.$con1.' and y_index >= '.$y_coordinate2.' and '.$con2.' )) ';

						}else{

							$where .= ' and (proname like "%'.$v.'%") ';
						}

					}else{

						$where .= ' and (proname like "%'.$v.'%") ';//1. $type2='',$type!=0  

					}

				}

			}

		}

		$field = '`proid`, `userid`, `proname`, `desc`, `smallpic`, `zancount`';
		// $sql = "SELECT ".$field." FROM lz_product WHERE 1 = 1 ".$where." ORDER BY RAND() LIMIT {$p}, 20";
		$sql = "SELECT ".$field.",SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM lz_product WHERE 1 = 1 ".$where." ORDER BY `range` LIMIT {$p}, 20";
		$query = $this->db->query($sql);
		$product = $query->result_array();
		// echo $this->db->last_query();
		// var_dump($product);

		$data = array('list'=>'','count'=>'');

		$sql = 'select count(*) as count from lz_product where 1 = 1 '.$where;
		$query = $this->db->query($sql);
		$res = $query->row_array();
		// echo $this->db->last_query();
		$data['count'] = $res['count'];

		foreach ($product as $key => $value) {

			$data['list'][$key]['id'] = $value['proid'];
			$data['list'][$key]['userid'] = $value['userid'];
			$data['list'][$key]['name'] = $value['proname'];
			$data['list'][$key]['desc'] = $value['desc'];
			$data['list'][$key]['pic'] = $value['smallpic'];
			$data['list'][$key]['zancount'] = $value['zancount'];
			$data['list'][$key]['flag'] = 1;

			$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $value['proid']);
			$msg = $this->select_data_row('lz_msg', 'id', $where);
			$data['list'][$key]['alreadyZan'] = 0;
			if(!empty($msg)) {

				$data['list'][$key]['alreadyZan'] = 1;
			}

			$data['list'][$key] = array_merge($data['list'][$key], $this->get_simple_user($value['userid']));

		}

		return $data;

	}

	public function get_product($proid) {

		$redis_key = 'proid_'.$proid;
		$field = array('proid', 'userid', 'libid', 'proname', 'smallpic', 'bigpic', 'type1', 'type2', 'color', 'material', 'size', 'model', 'link', 'price', 'desc', 'commentcount', 'zancount','x_index','y_index');
		$product = $this->getRedis(7, $redis_key, 'set_product', $proid, $field);

		$product = array_merge($product, $this->get_simple_user($product['userid']));

		$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' =>$product['proid']);
		$msg = $this->select_data_row('lz_msg', 'id', $where);
		$product['alreadyZan'] = 0;
		if(!empty($msg)) {

			$product['alreadyZan'] = 1;
		}

		$where = array('followid'=>$product['userid'],'userid'=>$this->user->userid,'followtype'=>4);
		$res = $this->select_data_row('lz_user_follow', 'id', $where);
		$product['alreadyFollow1'] = 0;
		if(!empty($res)) {

			$product['alreadyFollow1'] = 1;
		}

		return $product;

	}

	public function get_type_product($type2) {

		$table = 'lz_product';
		$select = 'proid, smallpic';
		$where = array('type2' => $type2,'isdel'=>0);
		$order = 'RAND()';

		$product = $this->select_data($table, $select, $where, $order, 0, 10);

		return $product;

	}

	public function add_look_history($arr) {

		$table = 'lz_look_history';

		if(!$this->update_data($table, $arr, array('looktime' => date('Y-m-d H:i:s')))) {

			$arr['looktime'] = date('Y-m-d H:i:s');

			return $this->insert_data('lz_look_history', $arr);

		}

		return TRUE;

	}

	public function get_look_history($userid) {

		$table = 'lz_look_history';
		$select = 'sourceid';
		$where = array('userid' => $userid, 'sourcetype' => 1);
		$order = 'looktime DESC';

		$sourceids = $this->select_data($table, $select, $where, $order, 0, 8);

		$history = array();
		foreach ($sourceids as $key => $value) {

			$redis_key = 'proid_'.$value['sourceid'];
			$field = array('proid', 'smallpic');
			$history[$key] = $this->getRedis(7, $redis_key, 'set_product', $value['sourceid'], $field);

		}

		return $history;

	}

	public function get_comment($sourcetype, $sourceid) {

		$table = 'lz_comment';
		$select = 'userid, comment, addtime';
		$where = array('sourcetype' => $sourcetype, 'sourceid' => $sourceid);
		$order = 'addtime DESC';

		$comment = $this->select_data($table, $select, $where, $order, 0, 4);

		foreach ($comment as $key => $value) {

			$comment[$key] = array_merge($value, $this->get_simple_user($value['userid']));

		}

		return $comment;

	}

	public function get_nearproid($proid) {

		$table = 'lz_product';
		$select = 'proid';
		$where = array('proid <' => $proid);
		$order = 'proid DESC';

		$proid1 = $this->select_data($table, $select, $where, $order, 0, 1);

		$table = 'lz_product';
		$select = 'proid';
		$where = array('proid >' => $proid);
		$order = '';

		$proid2 = $this->select_data($table, $select, $where, $order, 0, 1);

		$res = array('proid1' => @$proid1[0]['proid'], 'proid2' => @$proid2[0]['proid']);

		return $res;

	}

	//获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}

	//获取关键字
	public function getKeyWorkList($type,$offset) {

		if($type == 0) {

			$offset = $offset*7;
			$parameter = 'style_type';
			$type0 = $this->config->item($parameter);
			$type1 = array_flip($type0);

			$count = count($type1);
			$pages = ceil($count/7);

			$type1 = array_slice($type1, $offset, 7);

		}else{

			$offset = $offset*10;
			$parameter = 'product_function_'.$type;
			$type1 = $this->config->item($parameter);

			$count = count($type1);
			$pages = ceil($count/10);

			$type1 = array_slice($type1, $offset, 10);

		}

		$result = array('list'=>$type1,'pages'=>$pages);
		return $result;

	}

}