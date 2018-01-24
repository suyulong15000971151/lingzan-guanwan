<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function get_recommend($p, $type, $seachWord, $x_index, $y_index) {

		$p = $p * 20;
		$where = ' AND isshow=1 AND isdel=0 ';
		if(!empty($type)) {
			$where .= ' and type1 = '.$type;
		}

		if(!empty($seachWord)) {

			$typeArr3 = $this->config->item('project_function_'.$type);
			$typeArr4 = $this->config->item('style_type1');

			$like = explode(',', $seachWord);
			foreach ($like as $v) {
				$type3 = 0;
				if(is_array($typeArr3)) {
					$type3 = array_search($v, $typeArr3);
				}
				if(!empty($type3) && $type != 0) {
					$where .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%" or type3 = '.$type3.') ';
				}else{

					if($type == 0) {//2. $type3='',$type==0  3. $type3!='',$type==0

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
							$where .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%" or (x_index >= '.$x_coordinate1.' '.$con.' and y_index >= '.$y_coordinate2.' '.$con1.' )) ';

						}else{

							$where .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%") ';
						}

					}else{

						$where .= ' and (proname like "%'.$v.'%" or tag like "%'.$v.'%") ';//1. $type3='',$type!=0  

					}
				}
			}

		}

		// $sql = "SELECT proid, userid, proname, cover, libid FROM lz_project WHERE 1 = 1 ".$where."  ORDER BY RAND() LIMIT {$p}, 20";
		$field = 'proid, userid, proname, cover, libid';
		$sql = "SELECT ".$field.",SQRT(POW((x_index-{$x_index}),2)+POW((y_index-{$y_index}),2)) AS `range` FROM lz_project WHERE 1 = 1 ".$where." ORDER BY `range` LIMIT {$p}, 20";
		$query = $this->db->query($sql);
		$product = $query->result_array();
		// echo $this->db->last_query();

		$data = array('list'=>'','count'=>'');

		$sql = 'select count(*) as count from lz_project where 1 = 1 '.$where;
		$query = $this->db->query($sql);
		$res = $query->row_array();
		$data['count'] = $res['count'];

		foreach ($product as $key => $value) {

			$data['list'][$key]['id'] = $value['proid'];
			$data['list'][$key]['userid'] = $value['userid'];
			$data['list'][$key]['name'] = $value['proname'];
			$cover = explode(',', $value['cover']);
			$data['list'][$key]['pic'] = !empty($value['cover']) ? $cover['0'] : $this->config->item('static_url')."/image/li_image.jpg";
			$data['list'][$key]['zancount'] = 0;
			$data['list'][$key]['flag'] = 2;

			$where = array('followid'=>$value['proid'],'userid'=>$this->user->userid,'followtype'=>2);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$data['list'][$key]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$data['list'][$key]['alreadyFollow'] = 1;
			}

			$where = array('followid'=>$value['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$data['list'][$key]['alreadyFollow1'] = 0;
			if(!empty($res)) {

				$data['list'][$key]['alreadyFollow1'] = 1;
			}
			$data['list'][$key] = array_merge($data['list'][$key], $this->get_simple_library($value['libid']), $this->get_simple_user($value['userid']));

		}

		return $data;

	}

	public function get_project($proid) {

		$redis_key = 'proid_'.$proid;
		$field = array('proid', 'userid', 'libid', 'area', 'proname', 'cover', 'type1', 'type2', 'desc', 'status', 'commentcount','x_index','y_index');
		$project = $this->getRedis(8, $redis_key, 'set_project', $proid, $field);

		$project = array_merge($this->get_simple_library($project['libid']), $project, $this->get_simple_user($project['userid']));

		return $project;

	}

	public function get_product($proid) {

		$redis_key = 'proid_'.$proid;
		$field = array('proid', 'proname', 'price');
		$product = $this->getRedis(7, $redis_key, 'set_product', $proid, $field);

		return $product;

	}

	public function get_cover_all($libid) {

		$table = 'lz_project';
		$select = 'cover';
		$where = array('libid' => $libid, 'isdel' => 0);
		$order = 'proid ASC';

		$data = $this->select_data($table, $select, $where, $order, 0, 1000);

		$cover = array();
		foreach ($data as $key => $value) {

			$cover[] = $value['cover'];

		}
		$cover = implode(',', array_filter($cover));

		return $cover;

	}

	public function get_proarea($libid) {

		$table = 'lz_project';
		$select = 'proid, proname';
		$where = array('libid' => $libid, 'isdel' => 0);
		$order = 'proid ASC';

		$data = $this->select_data($table, $select, $where, $order, 0, 1000);

		return $data;

	}

	public function get_prolist($proid) {

		$table = 'lz_project_product';
		$select = '*';
		$where = array('proid' => $proid, 'isdel' => 0);
		$order = 'ppcode ASC';

		$list = $this->select_data($table, $select, $where, $order, 0, 1000);

		$list1 = array();
		$list2 = array();
		foreach ($list as $key => $value) {

			$redis_key = 'proid_'.$value['proid2'];
			$field = array('userid', 'proname', 'type1', 'size', 'material', 'model', 'smallpic', 'price', 'zancount');
			$product = $this->getRedis(7, $redis_key, 'set_product', $value['proid2'], $field);
			$list1[$value['fid']][] = array_merge($value, $product, $this->get_simple_user($product['userid']));

		}

		if(!empty($list1[0])) {

			foreach ($list1[0] as $key => $value) {

				$list2[$key]['sp1'] = $value;
				$price = $value['ppprice'] * (100 + $value['ppfloat']) / 100;
				$list2[$key]['sp1']['totalprice'] = $price * $value['count'];

				if(!empty($list1[$value['sid']])) {

					foreach ($list1[$value['sid']] as $k => $v) {

						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k] = $v;
						//$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['average'] = @round($v['count'] / $value['count'], 2);
						$price = $v['ppprice'] * (100 + $v['ppfloat']) / 100;
						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['totalprice'] = $price * $v['count'];

					}

				}

			}
		}

		return $list2;

	}

	public function get_prolist_all($libid) {

		$table = 'lz_project';
		$select = 'proid';
		$where = array('libid' => $libid, 'isdel' => 0);
		$order = 'proid ASC';
		$proidarr = $this->select_data($table, $select, $where, $order, 0, 1000);
		$proids = array();
		foreach ($proidarr as $key => $value) $proids[] = $value['proid'];
		$proids = implode(',', $proids);

//		$table = 'lz_project_product';
//		$select = '*';
//		$where_in = array('proid' => $proids, 'isdel' => 0);
//		$order = 'ppcode ASC';
//
//		$list = $this->select_data4($table, $select, $where_in, $order, 0, 1000);
//		echo $this->db->last_query();die;
//		var_dump($list);die;
		$sql = "SELECT * FROM lz_project_product WHERE proid in ({$proids}) AND isdel=0 ORDER BY ppcode ASC LIMIT 1000";
		$query = $this->db->query($sql);
		$list = $query->result_array();

		$list1 = array();
		$list2 = array();
		foreach ($list as $key => $value) {

			$redis_key = 'proid_'.$value['proid2'];
			$field = array('userid', 'proname', 'type1', 'size', 'material', 'model', 'smallpic', 'price', 'zancount');
			$product = $this->getRedis(7, $redis_key, 'set_product', $value['proid2'], $field);
			$list1[$value['fid']][] = array_merge($value, $product, $this->get_simple_user($product['userid']));

		}

		if(!empty($list1[0])) {

			foreach ($list1[0] as $key => $value) {

				$list2[$key]['sp1'] = $value;
				$price = $value['ppprice'] * (100 + $value['ppfloat']) / 100;
				$list2[$key]['sp1']['totalprice'] = $price * $value['count'];

				if(!empty($list1[$value['sid']])) {

					foreach ($list1[$value['sid']] as $k => $v) {

						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k] = $v;
						//$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['average'] = @round($v['count'] / $value['count'], 2);
						$price = $v['ppprice'] * (100 + $v['ppfloat']) / 100;
						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['totalprice'] = $price * $v['count'];

					}

				}

			}
		}

		return $list2;

	}

	public function get_prolist1($proid) {

		$table = 'lz_project_product';
		$select = '*';
		$where = array('proid' => $proid, 'isdel' => 0);
		$order = 'ppcode ASC';

		$list = $this->select_data($table, $select, $where, $order, 0, 1000);

		$list1 = array();
		$list2 = array();
		foreach ($list as $key => $value) {

			$redis_key = 'proid_'.$value['proid2'];
			$field = array('userid', 'proname', 'type1', 'size', 'material', 'model', 'smallpic', 'price', 'zancount');
			$product = $this->getRedis(7, $redis_key, 'set_product', $value['proid2'], $field);
			$list1[$value['fid']][] = array_merge($value, $product, $this->get_simple_user($product['userid']));

		}

		if(!empty($list1[0])) {

			foreach ($list1[0] as $key => $value) {

				$list2['type_'.$value['type1']][$key]['sp1'] = $value;
				$price = $value['ppprice'] * (100 + $value['ppfloat']) / 100;
				$list2['type_'.$value['type1']][$key]['sp1']['totalprice'] = $price * $value['count'];

				if(!empty($list1[$value['sid']])) {

					foreach ($list1[$value['sid']] as $k => $v) {

						$list2['type_'.$value['type1']][$key]['sp2']['tyid_'.$v['tyid']][$k] = $v;
						//$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['average'] = @round($v['count'] / $value['count'], 2);
						$price = $v['ppprice'] * (100 + $v['ppfloat']) / 100;
						$list2['type_'.$value['type1']][$key]['sp2']['tyid_'.$v['tyid']][$k]['totalprice'] = $price * $v['count'];

					}

				}

			}
		}

		return $list2;

	}

	public function get_friend($userid) {

		$table = 'lz_friend';
		$select = 'userid2';
		$where = array('userid1' => $userid);
		$order = 'id ASC';

		$friend = $this->select_data($table, $select, $where, $order, 0, 1000);

		foreach ($friend as $key => $value) {

			$friend[$key] = array_merge($value, $this->get_simple_user($value['userid2']));

		}

		return $friend;

	}

	public function get_follow_user($userid) {

		$table = 'lz_user_follow';
		$select = 'followid';
		$where = array('followtype' => 4, 'userid' => $userid);
		$order = '';

		$follow = $this->select_data($table, $select, $where, $order, 0, 1000);

		foreach ($follow as $key => $value) {

			$follow[$key] = array_merge($value, $this->get_simple_user($value['followid']));

		}

		return $follow;

	}

	public function add_project_member($data) {

		$table = 'lz_project_member';
		return $this->insert_data($table, $data);

	}

	public function get_user_group1($proid, $userid) {

		$table = 'lz_project_member';
		$select = 'groupid';
		$where = array('proid' => $proid, 'userid' => $userid);

		$user = $this->select_data_row($table, $select, $where);

		return empty($user) ? 0 : $user['groupid'];

	}

	public function get_user_group($proid, $userid) {

		$table = 'lz_project_member';
		$select = 'group,permissions';
		$where = array('proid' => $proid, 'userid' => $userid);

		$user = $this->select_data_row($table, $select, $where);

		return empty($user) ? 0 : $user;

	}

	public function get_project_member($proid) {

		$table = 'lz_project_member';
		$select = '*';
		$where = array('proid' => $proid);
		$order = '';

		$member = $this->select_data($table, $select, $where, $order, 0, 100);

		foreach ($member as $key => $value) {

			$redis_key = 'userid_'.$value['userid'];
			$redis_res = $this->ci_redis->getinstance(5)->hMGet($redis_key, array('avatar', 'nickname', 'mobile', 'email'));
			$member[$key]['permissions'] = explode(',', $member[$key]['permissions']);
			$member[$key] = array_merge($member[$key], $redis_res);

		}

		return $member;

	}

	public function get_project_member_all($libid) {

		$table = 'lz_project';
		$select = 'proid';
		$where = array('libid' => $libid, 'isdel' => 0);
		$order = 'proid ASC';
		$proidarr = $this->select_data($table, $select, $where, $order, 0, 1000);
		$proids = array();
		foreach ($proidarr as $key => $value) $proids[] = $value['proid'];
		$proids = implode(',', $proids);

		$sql = "SELECT * FROM lz_project_member WHERE proid IN ({$proids}) GROUP BY userid LIMIT 100";
		$query = $this->db->query($sql);
		$member = $query->result_array();

		foreach ($member as $key => $value) {

			$redis_key = 'userid_'.$value['userid'];
			$redis_res = $this->ci_redis->getinstance(5)->hMGet($redis_key, array('avatar', 'nickname', 'mobile', 'email'));
			$member[$key]['permissions'] = explode(',', $member[$key]['permissions']);
			$member[$key] = array_merge($member[$key], $redis_res);

		}

		return $member;

	}

	public function get_project_doc($proid) {

		$table = 'lz_project_doc';
		$select = '*';
		$where = array('proid' => $proid, 'isdel' => 0);
		$order = 'addtime DESC';

		$doc = $this->select_data($table, $select, $where, $order, 0, 100);

		foreach ($doc as $key => $value) {

			$doc[$key] = array_merge($doc[$key], $this->get_simple_user($value['userid']));
			$doc[$key]['addtime'] = date('Y.m.d', strtotime($value['addtime']));

		}

		return $doc;

	}

	public function get_product_list($userid,$sign='',$p=0) {

		$table = 'lz_product';
		$select = 'proid, oproid, userid, proname, smallpic, price, zancount';
		$order = 'proid desc';
		
		if(!empty($sign)) {
			$p = $p * 18;
			if($sign == 1) {

				$where = array('userid' => $userid,'isdel'=>0,'oproid'=>0);
				$product = $this->select_data($table, $select, $where, $order, $p, 18);
				foreach ($product as $key => $value) {

					$product[$key] = array_merge($product[$key], $this->get_simple_user($value['userid']));

				}
			}else{

				$sql = "select ".$select." from ".$table." where userid = ".$userid." and oproid != 0 and isdel = 0 order by ".$order." limit ".$p.", 18";
				$query = $this->db->query($sql);
				$product = $query->result_array();
				// echo $this->db->last_query();
				foreach ($product as $key => $value) {

					$res = $this->select_data_row('lz_product','userid', array('proid'=>$value['oproid']));
					$product[$key] = array_merge($product[$key], $this->get_simple_user($res['userid']));

				}

			}

		}else{

			$where = array('userid' => $userid,'isdel'=>0);
			$product = $this->select_data($table, $select, $where, $order, 0, 1000);
			foreach ($product as $key => $value) {

					$product[$key] = array_merge($product[$key], $this->get_simple_user($value['userid']));

				}

		}

		return $product;

	}

	public function get_project_code($proid) {

		$table = 'lz_project';
		$select = 'area';
		$where = array('proid' => $proid);

		$project = $this->select_data_row($table, $select, $where);

		return $project['area'];

	}

	public function get_project_product_code($proid) {

		$table = 'lz_project_product';
		$select = 'ppcode';
		$where = array('proid' => $proid, 'isdel' => 0, 'fid' => 0);
		$order = 'sid desc';

		$product = $this->select_data($table, $select, $where, $order, 0, 1);

		return $product[0]['ppcode'];

	}

	public function get_project_product_code2($sid) {

		$table = 'lz_project_product';
		$select = 'ppcode';
		$where = array('fid' => $sid, 'tyid' => 2);
		$order = 'sid desc';

		$product = $this->select_data($table, $select, $where, $order, 0, 1);

		return $product[0]['ppcode'];

	}

	public function add_project_product($data) {

		$table = 'lz_project_product';
		return $this->insert_data($table, $data);

	}

	public function get_project_product_checkorder($proid) {

		$table = 'lz_project_product';
		$select = 'sid,fid,tyid,proid,proid2,ppcode,ppname,ppdesc,ppprice,ppfloat,count';
		$where = array('proid' => $proid, 'fid' => 0, 'isdel' => 0);
		$order = 'sid asc';
		$list1 = $this->select_data($table, $select, $where, $order, 0, 1000);

		$table = 'lz_project_product';
		$select = 'sid,fid,tyid,proid,proid2,ppcode,ppname,ppdesc,ppprice,ppfloat,count';
		$where = array('proid' => $proid, 'tyid' => 2, 'isuse' => 1, 'isdel' => 0);
		$order = 'sid asc';
		$list2 = $this->select_data($table, $select, $where, $order, 0, 1000);

		$list = array_merge($list1, $list2);

		return $list;

	}

	public function get_project_product_order_datas($proid) {

		$sql = "SELECT orderid,ordername,orderuserid,`desc`,addtime FROM lz_project_product_order WHERE proid='{$proid}' GROUP BY orderid ORDER BY addtime DESC";
		$query = $this->db->query($sql);
		$res = $query->result_array();

		foreach ($res as $key => $value) {

			$res[$key] = array_merge($value, $this->get_simple_user($value['orderuserid']));
			$res[$key]['addtime'] = date('Y.m.d', strtotime($value['addtime']));

		}

		return $res;

	}

	public function get_project_product_order_data($proid, $type) {

		$sql = "SELECT ordername,orderuserid,`desc`,addtime,count(1) AS count FROM lz_project_product_order WHERE orderid='{$type}' AND fid=0 GROUP BY orderid";
		$query = $this->db->query($sql);
		$res = $query->row_array();

		$res = array_merge($res, $this->get_simple_user($res['orderuserid']));
		$res['addtime'] = date('Y.m.d', strtotime($res['addtime']));

		return $res;

	}

	public function get_project_product_order_list($proid, $type) {

//		$table = 'lz_project_product_order';
//		$select = '*';
//		$where = array('orderid' => $type);
//		$order = 'ppcode ASC';
//
//		$list = $this->select_data($table, $select, $where, $order, 0, 1000);
//
//		foreach ($list as $key => $value) {
//
//			$redis_key = 'proid_'.$value['proid2'];
//			$field = array('userid', 'proname', 'smallpic', 'price', 'zancount');
//			$product = $this->getRedis(7, $redis_key, 'set_product', $value['proid2'], $field);
//			$list[$key] = array_merge($value, $product, $this->get_simple_user($product['userid']));
//
//		}
//
//		$list1 = array();
//		$list2 = array();
//
//		foreach ($list as $key => $value) {
//
//			if($value['fid'] == 0) {
//
//				$list1[] = $value;
//
//			} else {
//
//				$list2[$value['fid']][] = $value;
//
//			}
//
//		}
//
//		foreach ($list1 as $key => $value) {
//
//			if(isset($list2[$value['sid']])) {
//
//				$price = 0;
//
//				foreach ($list2[$value['sid']] as $k => $v) {
//
//					$price1 = $v['ppprice'] !== '0.00' ? $v['ppprice'] : $v['price'] * (100 + $v['ppfloat']) / 100;
//					$price += $price1;
//
//				}
//
//				$price2 = $value['ppprice'] !== '0.00' ? $value['ppprice'] : $value['price'] * (100 + $value['ppfloat']) / 100;
//				$list1[$key]['realprice'] = $price2 + $price;
//
//			} else {
//
//				$price2 = $value['ppprice'] !== '0.00' ? $value['ppprice'] : $value['price'] * (100 + $value['ppfloat']) / 100;
//				$list1[$key]['realprice'] = $price2;
//
//			}
//
//		}
//
//		return $list1;

		$table = 'lz_project_product_order';
		$select = '*';
		$where = array('orderid' => $type);
		$order = 'ppcode ASC';

		$list = $this->select_data($table, $select, $where, $order, 0, 1000);

		$list1 = array();
		$list2 = array();
		foreach ($list as $key => $value) {

			$redis_key = 'proid_'.$value['proid2'];
			$field = array('userid', 'proname', 'type1', 'size', 'material', 'model', 'smallpic', 'price', 'zancount');
			$product = $this->getRedis(7, $redis_key, 'set_product', $value['proid2'], $field);
			$list1[$value['fid']][] = array_merge($value, $product, $this->get_simple_user($product['userid']));

		}

		if(!empty($list1[0])) {
			foreach ($list1[0] as $key => $value) {

				$list2[$key]['sp1'] = $value;
				$price = $value['ppprice'] * (100 + $value['ppfloat']) / 100;
				$list2[$key]['sp1']['totalprice'] = $price * $value['count'];

				if(!empty($list1[$value['sid']])) {

					foreach ($list1[$value['sid']] as $k => $v) {
	
						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k] = $v;
						//$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['average'] = @round($v['count'] / $value['count'], 2);
						$price = $v['ppprice'] * (100 + $v['ppfloat']) / 100;
						$list2[$key]['sp2']['tyid_'.$v['tyid']][$k]['totalprice'] = $price * $v['average'];
	
					}

				}

			}
		}

		return $list2;

	}

	public function set_project_product_order($data) {

		$table = 'lz_project_product_order';

		return $this->insert_data($table, $data);

	}

	public function get_comment($sourcetype, $sourceid) {

		$table = 'lz_comment';
		$select = 'userid, comment, addtime';
		$where = array('sourcetype' => $sourcetype, 'sourceid' => $sourceid, 'isdel' => 0);
		$order = 'addtime DESC';

		$comment = $this->select_data($table, $select, $where, $order, 0, 3);

		foreach ($comment as $key => $value) {

			$comment[$key] = array_merge($value, $this->get_simple_user($value['userid']));

		}

		return $comment;

	}

	public function get_comment_all($sourcetype, $sourceid) {

		$table = 'lz_comment';
		$select = '*';
		$where = array('sourcetype' => $sourcetype, 'sourceid' => $sourceid, 'isdel' => 0);
		$order = 'addtime DESC';

		$comment = $this->select_data($table, $select, $where, $order, 0, 1000);

		foreach ($comment as $key => $value) {

			$comment[$key] = array_merge($value, $this->get_simple_user($value['userid']));

			if($value['userid2']) {

				$user2 = $this->get_simple_user($value['userid2']);
				$comment[$key]['nickname2'] = $user2['nickname'];
				$comment[$key]['comment'] = substr($value['comment'], strpos($value['comment'], '：') + 3);

			}
		}

		return $comment;

	}

	public function upload_doc($data) {

		$table = 'lz_project_doc';
		return $this->insert_data($table, $data);

	}

	public function upload_cover($proid, $data) {

		$table = 'lz_project';
		$where = array('proid' => $proid);

		return $this->update_data($table, $where, $data);

	}

//	public function get_prolist_real($proid) {
//
//		$table = 'lz_project_product';
//		$select = '*';
//		$where = array('proid' => $proid, 'fid' => 0);
//		$order = 'sid ASC';
//
//		$list = $this->select_data($table, $select, $where, $order, 0, 1000);
//
//		return $list;
//
//	}

	public function getLibraryData($userid) {

		$where = array('userid'=>$userid,'isdel'=>0);
		$library = $this->select_data('lz_library', 'libid,libname', $where , 'libid desc', 0, 1000);

		foreach ($library as $k => $v) {
			$library[$k]['project'] = array();
			$libid = $v['libid'];
			$where = array('libid'=>$libid, 'isdel'=>0);
			$project = $this->select_data('lz_project', 'proid,proname', $where , 'proid desc', 0, 1000);
			$library[$k]['project'] = $project;
		}

		return $library;

	}

	//获取数据详情
	public function getOneData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}

	//获取redis
	public function getRedisData($slice, $redis_key, $method, $field1, $field2) {
		return $this->getRedis($slice, $redis_key, $method, $field1, $field2);
	}

	//获取表的数据量
	public function getDataCount($table, $where = array(), $like = array()) {

		return $this->get_one_table_count($table, $where, $like);
	}

	//添加数据入库
	public function insertData($table, $data = array()) {
		return $this->insert_data($table, $data);
	}

	//货物一个表的列表
	public function getData($table, $select, $where, $order, $offset = 0, $limit = 1000) {

		return $this->select_data($table, $select, $where, $order, $offset, $limit);

	}

	//增加数量
	// public function field_increase($table, $where, $field) {

	// 	return $this->incr_data($table, $where, $field);

	// }
	public function field_change($table, $fieldArr, $where) {

		return $this->field_edit($table, $fieldArr, $where);

	}

	//修改数据
	public function edit_table($table, $where, $data = array()) {

		return $this->update_data($table, $where, $data);

	}

	//获取关键字
	public function getKeyWorkList($type,$offset) {

		if($type == 0) {

			$offset = $offset*7;
			$type0 = $this->config->item('style_type');
			$type1 = array_flip($type0);

			$count = count($type1);
			$pages = ceil($count/7);

			$type1 = array_slice($type1, $offset, 7);

		}else{

			$offset = $offset*10;
			$type1 = $this->config->item('project_function_'.$type);

			$count = count($type1);
			$pages = ceil($count/10);

			$type1 = array_slice($type1, $offset, 10);

		}
		
		$result = array('list'=>$type1,'pages'=>$pages);
		return $result;

	}


}