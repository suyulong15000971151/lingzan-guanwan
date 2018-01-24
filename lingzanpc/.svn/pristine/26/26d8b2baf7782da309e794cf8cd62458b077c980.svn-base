<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function get_note($userid, $p, $seachWord = '') {

		$p = $p * 17;
		$select = 'noteid, userid, notename, cover, content, shortdesc, commentcount, zancount';
		$where = " and userid = ".$userid." and isdel = 0 ";
		if(!empty($seachWord)) {

			$where .= ' and notename like "%'.$seachWord.'%" ';
		}

		$sql = "SELECT ".$select." FROM lz_note WHERE 1 = 1 ".$where." ORDER BY noteid DESC LIMIT {$p},17";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$note = $query->result_array();
		foreach ($note as $key => $value) {

			if($userid != $this->user->userid) {

				$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 3, 'action_sid' => $value['noteid']);
				$msg = $this->select_data_row('lz_msg', 'id', $where);
				$note[$key]['alreadyZan'] = 0;
				if(!empty($msg)) {

					$note[$key]['alreadyZan'] = 1;
				}

			}

			$note[$key]['shortdesc'] = htmlspecialchars_decode(substr($value['shortdesc'],0,126));

		}
		return $note;

	}

	public function get_follow($userid, $p, $seachWord = '') {

		// $where = array('userid' => $userid, 'followtype' => 4);
		// $followids = $this->select_data('lz_user_follow', 'followid', $where, 'id desc', 0, 10);
		$p = $p * 18;
		$where = " and userid = ".$userid." and followtype = 4 ";
		if(!empty($seachWord)) {

			$where .= ' and followid in ( select userid from lz_user where nickname like "%'.$seachWord.'%" ) ';
		}

		$sql = "SELECT followid FROM lz_user_follow WHERE 1 = 1 ".$where." ORDER BY id DESC LIMIT {$p},18";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$followids = $query->result_array();

		$follow = array();
		foreach ($followids as $key => $value) {

			$redis_key = 'userid_'.$value['followid'];
			$field = array('userid', 'avatar', 'nickname', 'productcount', 'librarycount');
			$follow[$key]['user'] = $this->getRedis(5, $redis_key, 'set_user', $userid, $field);

			$where = array('userid' => $value['followid'],'isdel'=>0);
			$follow[$key]['pro'] = $this->select_data('lz_product', 'proid, smallpic', $where, 'proid desc', 0, 3);

		}

		return $follow;

	}

	public function get_fans($userid, $p, $seachWord = '') {

		$p = $p * 18;
		$where = " and followid = ".$userid." and followtype = 4 ";
		if(!empty($seachWord)) {

			$where .= ' and userid in ( select userid from lz_user where nickname like "%'.$seachWord.'%" ) ';
		}

		$sql = "SELECT userid FROM lz_user_follow WHERE 1 = 1 ".$where." ORDER BY id DESC LIMIT {$p},18";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$fanids = $query->result_array();

		$fans = array();
		foreach ($fanids as $key => $value) {

			$redis_key = 'userid_'.$value['userid'];
			$field = array('userid', 'avatar', 'nickname', 'productcount', 'librarycount');
			$fans[$key]['user'] = $this->getRedis(5, $redis_key, 'set_user', $userid, $field);

			$where = array('userid' => $value['userid'],'isdel'=>0);
			$fans[$key]['pro'] = $this->select_data('lz_product', 'proid, smallpic', $where, 'proid desc', 0, 3);

			$where = array('followid'=>$value['userid'],'userid'=>$this->user->userid,'followtype'=>4);
			$res = $this->select_data_row('lz_user_follow', 'id', $where);
			$fans[$key]['alreadyFollow'] = 0;
			if(!empty($res)) {

				$fans[$key]['alreadyFollow'] = 1;
			}

		}

		return $fans;

	}

	public function get_friend($userid, $p, $seachWord = '') {

		// $where = array('userid1' => $userid);
		// $fanids = $this->select_data('lz_friend', 'userid2', $where, 'id desc', 0, 10);

		$p = $p * 18;
		$where = " and userid1 = ".$userid;
		if(!empty($seachWord)) {
			$where .= ' and userid2 in (select userid from lz_user where nickname like "%'.$seachWord.'%" ) ';
		}

		$sql = "SELECT userid2 FROM lz_friend WHERE 1 = 1 ".$where." ORDER BY id DESC LIMIT {$p},18";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$fanids = $query->result_array();

		$friend = array();
		foreach ($fanids as $key => $value) {

			$redis_key = 'userid_'.$value['userid2'];
			$field = array('userid', 'avatar', 'nickname', 'productcount', 'librarycount');
			$friend[$key]['user'] = $this->getRedis(5, $redis_key, 'set_user', $userid, $field);


			$where = array('userid' => $value['userid2'],'isdel'=>0);
			$friend[$key]['pro'] = $this->select_data('lz_product', 'proid, smallpic', $where, 'proid desc', 0, 3);

		}

		// var_dump($friend);
		return $friend;

	}


	//获取数据详情
	public function getData($table, $select = '*', $where) {

		return $this->select_data_row($table, $select, $where);
	}

	//修改数据
	public function edit_table($table, $where, $data = array()) {

		return $this->update_data($table, $where, $data);

	}

	//查询数量
	public function getTableCount($table, $where = array()) {

		return $this->get_one_table_count($table, $where);
	}

	//获取一个表的数据
	public function getTableData($table, $select = '*', $where, $order = ''){

		return $this->select_data3($table, $select, $where, $order);

	}

	//删除数据
	public function deleteData($table, $where) {

		$this->db->delete($table, $where);
		return $this->db->affected_rows();

	}

	//添加数据
	public function addData($table, $data) {

		return $this->insert_data($table, $data);

	}


	//查询某个值是否存在
	public function select_fieldVal_exit($table,$noWhere=array(),$where=array(),$offset=0,$pageSize=1,$order='') {

		$condition = '';
		if(!empty($noWhere)){

			foreach ($noWhere as $k1 => $v1) {
				$condition .= ' and '.$k1.' != "'.$v1.'"' ;
			}

		}
		if(!empty($where)){

			foreach ($where as $k2 => $v2) {
				$condition .= ' and '.$k2.' = "'.$v2.'"' ;
			}

		}
		
		$limit = '';
		if(!empty($pageSize)) {
			$limit = ' limit '.$offset.','.$pageSize;
		}

		$orders = '';
		if(!empty($order)) {
			$orders = ' order by '.$order;
		}
		$sql = " select * from ".$table." where 1 = 1 ".$condition." ".$orders." ".$limit;
		$query = $this->db->query($sql);
		if($pageSize == 1) {
			$result = $query->row_array();
		}else{
			$result = $query->result_array();
		}
		// echo $this->db->last_query();
		return $result;

	}

	//获取项目下的区域列表
	public function selflibrarytow($libid, $userid, $p) {

		//除了自己创建的材思库，还要查询自己参与的材思库
		$where1 = array('libid'=>$libid,'isdel'=>0);
		$library = array('list'=>array(),'count'=>0);
		// if($userid != $this->user->userid) {

		// 	$where1['isshow']=1;
		// }

		if($p == 0) {
			$p = $p * 19;
			$sum = 19;
		}else{
			$p = $p * 20;
			$sum = 20;
		}

		$field = 'area, proname, cover, proid, isshow';
		//查找“项目总览”
		$project0 = $this->select_data('lz_project',$field, $where1, 'proid asc', 0, 1);

		if(empty($project0)) {
			return $library;
		}
		if($userid != $this->user->userid) {
			$sql= " select ".$field." from lz_project where libid = ".$libid." and isdel = 0 and isshow = 1 and proid != ".$project0[0]['proid']." order by proid desc limit ".$p.",".$sum;
		}else{
			$sql= " select ".$field." from lz_project where libid = ".$libid." and isdel = 0 and proid != ".$project0[0]['proid']." order by proid desc limit ".$p.",".$sum;
		}
		$query = $this->db->query($sql);
		$project = $query->result_array();


		//“项目总览”放第一位
		if($p == 0) {

			if($userid == $this->user->userid) {

				array_unshift($project,$project0[0]);

			}else{

				if($project0[0]['isshow'] == 1) {
					array_unshift($project,$project0[0]);
				}

			}

		}

		foreach ($project as $key => $value) {

			$where = array('proid'=>$value['proid']);
			$member = $this->select_data_row('lz_project_member','groupid', $where);
			if(empty($member)) {

				$library['list'][$key]['groupid'] = 10;
			}else{
				$library['list'][$key]['groupid'] = $member['groupid'];
			}
			$library['list'][$key]['area'] = $value['area'];
			$library['list'][$key]['id'] = $value['proid'];
			$library['list'][$key]['name'] = $value['proname'];
			$cover = explode(',', $value['cover']);
			$library['list'][$key]['pic'] = $cover['0'];

			//查找这个子项目的三个清单
			$where = array('proid'=>$value['proid'],'fid'=>0,'isdel'=>0);
			$projectProduct = $this->select_data('lz_project_product', 'proid2', $where, 'sid desc', 0, 3);
			$library['list'][$key]['list'] = array();
			foreach ($projectProduct as $k => $v) {

				$where = array('proid'=>$v['proid2'],'isdel'=>0);
				$productList = $this->select_data_row('lz_product','proid, proname, smallpic', $where);
				if($productList['smallpic'] != ''){
					$library['list'][$key]['list'][] = $productList; 
				}

			}

		}

		//获取区域数量
		$where1 = array('libid'=>$libid,'isdel'=>0);
		if($userid != $this->user->userid) {

			$where1 = array('libid'=>$libid,'isdel'=>0,'isshow'=>1);
		}
		$res = $this->getTableCount('lz_project', $where1);
		$library['count'] = $res['count'];
		return $library;

	}

	//改变字段
	public function changeField($table, $fieldArr, $where = array()) {

		return $this->field_edit($table, $fieldArr, $where);
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

	//获取参与的项目列表
	public function get_partin_project($userid, $p, $seachWord = '') {

		$p = $p * 20;
		$noWhere = array('groupid'=>10);
		$where = array('userid'=>$userid);
		$project = $this->select_fieldVal_exit('lz_project_member',$noWhere,$where,$p,20,'id desc');
		$list = array();

		foreach ($project as $key => $value) {

			$proid = $value['proid'];
			$where = " and proid = ".$proid." and isdel = 0 ";
			if($userid != $this->user->userid) {

				$where = " and proid = ".$proid." and isdel = 0 and isshow = 1 ";
			}

			if(!empty($seachWord)) {

				$where .= ' and (proname like "%'.$seachWord.'%" or tag like "%'.$seachWord.'%") ';
			}

			$sql = "SELECT proname, cover FROM lz_project WHERE 1 = 1 {$where} LIMIT 0,1";
			$query = $this->db->query($sql);
			$product = $query->row_array();

			if(empty($product)) {
				continue;
			}
			$list[$key]['id'] = $proid;
			$list[$key]['name'] = $product['proname'];
			$cover = explode(',', $product['cover']);
			$list[$key]['pic'] = $cover['0'];
			$list[$key]['groupid'] = $value['groupid'];

			//查找这个子项目的三个清单
			$where = array('proid'=>$proid,'fid'=>0,'isdel'=>0);
			$projectProduct = $this->select_data('lz_project_product', 'proid2', $where, 'sid desc', 0, 3);
			$list[$key]['list'] = array();
			foreach ($projectProduct as $k => $v) {
				$where = array('proid'=>$v['proid2'],'isdel'=>0);
				$productList = $this->select_data_row('lz_product','proid, proname, smallpic', $where);
				if($productList['smallpic'] != ''){
					$list[$key]['list'][] = $productList; 
				}

			}

		}

		return $list;

	}

	//查找相关手机号或用户名的用户
	public function getUserData($userinfo,$userid) {

		$sql = 'select userid,groupid,nickname,avatar,sex,city from lz_user where userid != '.$userid.' and nickname = "'.$userinfo.'" or mobile = "'.$userinfo.'"' ;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;

	}

	//获取产品
	public function get_product($userid, $p, $seachWord = '') {

		$p = $p * 20;

		$where = " and userid = ".$userid." and isdel = 0 and oproid = 0 ";
		if(!empty($seachWord)) {

			$where .= ' and proname like "%'.$seachWord.'%" ';
		}

		$sql = "SELECT * FROM lz_product WHERE 1 = 1 ".$where." ORDER BY proid DESC LIMIT {$p},20";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$product = $query->result_array();

		foreach ($product as $key => $value) {

			if($userid != $this->user->userid) {

				$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $value['proid']);
				$msg = $this->select_data_row('lz_msg', 'id', $where);
				$product[$key]['alreadyZan'] = 0;
				if(!empty($msg)) {

					$product[$key]['alreadyZan'] = 1;
				}

			}

			$product[$key] = array_merge($product[$key], $this->get_simple_user($value['userid']));

		}

		return $product;

	}

	public function get_library($userid, $p, $seachWord = '') {

		$p = $p * 18;
		$where = " and userid = ".$userid." and isdel = 0 ";
		if($userid != $this->user->userid) {

			$where = " and userid = ".$userid." and isdel = 0 and isshow = 1 ";
		}

		if(!empty($seachWord)) {

			$where .= ' and (libname like "%'.$seachWord.'%" or tag like "%'.$seachWord.'%") ';
		}

		$sql = "SELECT * FROM lz_library WHERE 1 = 1 {$where} ORDER BY libid DESC LIMIT {$p},18";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$library['list'] = $query->result_array();

		return $library;

	}

	//获取我关注的子项目
	public function get_follow_project($userid, $p, $seachWord = '') {

		$p = $p * 20;
		$where = array('userid'=>$userid,'followtype'=>2);
		$follow = $this->select_data('lz_user_follow', 'followid', $where, 'id desc', $p, 20);

		$list = array();
		foreach ($follow as $key => $value) {

			$proid = $value['followid'];
			$where = ' and proid = '.$proid.' and isdel = 0 ';
			if(!empty($seachWord)) {

				$where .= ' and (proname like "%'.$seachWord.'%" or tag like "%'.$seachWord.'%") ';
			}

			$sql = "SELECT proname, cover FROM lz_project WHERE 1 = 1 {$where}  LIMIT 0,1";
			$query = $this->db->query($sql);
			$project = $query->row_array();
			if(empty($project)) {
				continue;
			}
			$list[$key]['id'] = $proid;
			$list[$key]['name'] = $project['proname'];
			$cover = explode(',', $project['cover']);
			$list[$key]['pic'] = $cover['0'];

			//查找这个子项目的三个清单
			$where = array('proid'=>$proid,'fid'=>0,'isdel'=>0);
			$projectProduct = $this->select_data('lz_project_product', 'proid2', $where, 'sid desc', 0, 3);
			$list[$key]['list'] = array();
			foreach ($projectProduct as $k => $v) {
				$where = array('proid'=>$v['proid2'],'isdel'=>0);
				$productList = $this->select_data_row('lz_product','proid, proname, smallpic', $where);
				if($productList['smallpic'] != ''){
					$list[$key]['list'][] = $productList; 
				}

			}

		}

		return $list;
	}

	//获取关注的产品
	public function get_storeup($userid, $p, $seachWord = '') {

		$p = $p * 20;

		$where = " and userid = ".$userid." and isdel = 0 and oproid != 0 ";
		if(!empty($seachWord)) {

			$where .= ' and proname like "%'.$seachWord.'%" ';
		}

		$sql = "SELECT * FROM lz_product WHERE 1 = 1 ".$where." ORDER BY proid DESC LIMIT {$p},20";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		$product = $query->result_array();

		foreach ($product as $key => $value) {

			if($userid != $this->user->userid) {

				$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $value['proid']);
				$msg = $this->select_data_row('lz_msg', 'id', $where);
				$product[$key]['alreadyZan'] = 0;
				if(!empty($msg)) {

					$product[$key]['alreadyZan'] = 1;
				}

			}

			//获取采集的源用户信息
			$where = array('proid'=>$value['oproid']);
			$project = $this->select_data_row('lz_product','userid', $where);
			$product[$key] = array_merge($product[$key], $this->get_simple_user($project['userid']));
			// $product[$key] = array_merge($product[$key], $this->get_simple_user($value['userid']));

		}

		return $product;

	}


	public function get_follow_note($userid, $p, $seachWord = '') {

		$p = $p * 18;

		$select = 'noteid, userid, notename, cover, content, shortdesc, commentcount, zancount';
		$where = array('userid'=>$userid,'followtype'=>3);
		$follow = $this->select_data('lz_user_follow', 'followid', $where, 'id desc', $p, 18);

		$list = array();
		foreach ($follow as $key => $value) {
			$noteid = $value['followid'];

			$where = " and noteid = ".$noteid." and isdel = 0 ";
			if(!empty($seachWord)) {

				$where .= ' and notename like "%'.$seachWord.'%" ';
			}

			$sql = "SELECT {$select} FROM lz_note WHERE 1 = 1 ".$where." LIMIT 0,1";
			$query = $this->db->query($sql);
			// echo $this->db->last_query();
			$note = $query->row_array();

			if(empty($note)) {
				continue;
			}
			$list[] = $note;

		}
		return $list;

	}

	//获取用户创建的项目数量
	public function setUpLibraryCount($userid) {

		$where = " and userid = ".$userid." and isdel = 0 ";
		if($userid != $this->user->userid) {
			$where = " and userid = ".$userid." and isdel = 0 and isshow = 1 ";
		}

		$sql = 'select count(*) as count from lz_library where 1 = 1 '.$where;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['count'];
	}


	//获取用户参与的区域数量
	public function partInProjectCount($userid) {

		$where = " isdel = 0 ";
		if($userid != $this->user->userid) {
			$where = " isdel = 0 and isshow = 1 ";
		}

		$sql = 'select count(*) as count from lz_project_member where userid = '.$userid.' and groupid != 10 and proid in (select proid from lz_project where '.$where.')';
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['count'];
	}

	//获取用户关注的区域数量
	public function followProjectCount($userid) {

		$sql = 'select count(*) as count from lz_user_follow where userid = '.$userid.' and followtype = 2 and followid in (select proid from lz_project where isdel = 0)';
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['count'];

	}


	//获取关注的笔记个数
	public function followNoteCount($userid) {

		$sql = 'select count(*) as count from lz_user_follow where userid = '.$userid.' and followtype = 3 and followid in (select noteid from lz_note where isdel = 0)';
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result['count'];

	}


	//获取数量
	public function getCount($userid) {

		//获取用户创建的项目数量
		$sLibCount = $this->setUpLibraryCount($userid);

		//获取用户参与的区域数量
		$pLibCount = $this->partInProjectCount($userid);

		//获取关注的区域数量
		$fLibCount = $this->followProjectCount($userid);

		//获取用户收藏的笔记数量
		$fNotCount = $this->followNoteCount($userid);

		$count = array(
			'sLibCount'=>$sLibCount,
			'pLibCount'=>$pLibCount,
			'fLibCount'=>$fLibCount,
			'fNotCount'=>$fNotCount
		);

		return $count;

	}

	//修改坐标
	public function changeData($x_index2, $y_index2) {

		$userid = $this->user->userid;
		$sql = " update lz_user set productcount = productcount + 1, x_index = ".$x_index2.", y_index = ".$y_index2." where userid = ".$userid;
		$this->db->query($sql);
		return $this->db->affected_rows();

	}

	//获取多条数据
	public function getOneData($table, $select = '*', $where, $order = '', $offset = 0, $limit = 1) {

		return $this->select_data($table, $select, $where, $order, $offset, $limit);

	}

	//批量添加数据
	public function batchAddData($table, $fields, $values) {

		$sql = " INSERT INTO ".$table."  ".$fields." values ".$values;
		$this->db->query($sql);
		return $this->db->affected_rows();
	}


}