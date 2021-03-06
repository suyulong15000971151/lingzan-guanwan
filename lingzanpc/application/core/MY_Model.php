<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getRedis($slice, $redis_key, $method, $field1, $field2) {

		if(!$this->ci_redis->getinstance($slice)->exists($redis_key)) {
			$this->load->model('redis_model');
			$this->redis_model->$method($field1);
		}

		return $this->ci_redis->getinstance($slice)->hMget($redis_key, $field2);

	}

	public function select_data($table, $select = '*', $where, $order = array(), $offset = 0, $limit = 1) {

		$query = $this->db->select($select)->where($where)->order_by($order)->limit($limit, $offset)->get($table);
		$result = $query->result_array();

		return $result;

	}

	public function select_data_row($table, $select = '*', $where) {

		$query = $this->db->select($select)->where($where)->get($table);
		$result = $query->row_array();

		return $result;

	}

	public function select_data2($table, $select = '*', $like , $order = array(), $offset = 0, $limit = 1) {

		$query = $this->db->select($select)->like($like)->order_by($order)->limit($limit, $offset)->get($table);
		$result = $query->result_array();
		return $result;

	}

	public function select_data4($table, $select = '*', $where_in , $order = array(), $offset = 0, $limit = 1) {

		$query = $this->db->select($select)->where_in($where_in)->order_by($order)->limit($limit, $offset)->get($table);
		$result = $query->result_array();
		return $result;

	}

	public function insert_data($table, $data = array()) {

		$this->db->insert($table, $data);

		return $this->db->insert_id();

	}

	public function update_data($table, $where, $data = array()) {

		$this->db->where($where);
		$this->db->update($table, $data);

		return $this->db->affected_rows();

	}

	/**
	 * 操作数据库字段增长
	 * 
	 * @param string $table
	 * @param array $where
	 * @param string $field
	 * @return int
	 */
	public function incr_data($table, $where, $field) {

		$this->db->set($field, $field.'+1', FALSE);
		$this->db->where($where);
		$this->db->update($table);

		return $this->db->affected_rows();

	}

	/**
	 * 获取用户信息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_user($userid) {

		$redis_key = 'userid_'.$userid;
		$field = array('avatar', 'nickname', 'fanscount');
		$user = $this->getRedis(5, $redis_key, 'set_user', $userid, $field);

		return $user;

	}

	/**
	 * 获取材思库信息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_library($libid) {

		$redis_key = 'libid_'.$libid;
		$field = array('libname', 'cover');
		$user = $this->getRedis(6, $redis_key, 'set_library', $libid, $field);

		return $user;

	}

	/**
	 * 获取单品信息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_product($proid) {

		$redis_key = 'proid_'.$proid;
		$field = array('proname', 'smallpic');
		$user = $this->getRedis(7, $redis_key, 'set_product', $proid, $field);

		return $user;

	}

	/**
	 * 获取项目信息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_project($proid) {

		$redis_key = 'proid_'.$proid;
		$field = array('proname', 'cover');
		$user = $this->getRedis(8, $redis_key, 'set_project', $proid, $field);

		return $user;

	}

	/**
	 * 获取笔记
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_note($noteid) {

		$redis_key = 'noteid_'.$noteid;
		$field = array('notename', 'cover');
		$user = $this->getRedis(9, $redis_key, 'set_note', $noteid, $field);

		return $user;

	}

	/**
	 * 获取系统消息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_notice($id) {

		$redis_key = 'noticeid_'.$id;
		$field = array('content');
		$user = $this->getRedis(15, $redis_key, 'set_notice', $id, $field);

		return $user;

	}

	/**
	 * 获取系统消息
	 * 
	 * @param int userid
	 * @return array
	 */
	public function get_simple_apply($id) {

		$sql = 'select content,res,userid1 from lz_msg_apply where id = '.$id;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$userid = $result['userid1'];
		$userInfo = $this->get_simple_user($userid);
		$result['nickname'] = $userInfo['nickname'];
		$result['avatar'] = $userInfo['avatar'];
		return $result;

	}


	//获取一个库里的列表
	public function select_data3($table, $select = '*', $where , $order = '') {

		$query = $this->db->select($select)->where($where)->order_by($order)->get($table);
		$result = $query->result_array();
		// echo $this->db->last_query();
		return $result;

	}


	//根据条件获取表的数量
	public function get_one_table_count($table, $where = array(), $like = array()) {

		$condition = '';
		if(!empty($where)){
			foreach ($where as $k => $v) {
				$condition .= ' and '.$k.' = "'.$v.'"';
			}
		}

		if(!empty($like)){

			foreach ($like as $k => $v) {

				$condition .= ' and `'.$k.'` like "%'.$v.'%"';

			}
		}
		
		$sql = " select count(*) as count from ".$table." where 1 = 1 ".$condition;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;

	}

	//减少数量
	public function field_decr($table, $fieldArr, $where = array()) {

		$condition = '';
		if(!empty($where)){
			foreach ($where as $k => $v) {
				$condition .= ' and '.$k.' = "'.$v.'"';
			}
			
		}

		$setStr = '';
		foreach ($fieldArr as $k => $v) {
			$setStr .= $k.' = '.$k.' - '.$v.', ';
		}
		$str = substr($setStr,0,-2);
		$sql = 'update '.$table.' set '.$str.' where 1 = 1 '.$condition;
		$this->db->query($sql);
		// echo $this->db->last_query();
		return $this->db->affected_rows();

	}


	public function field_edit($table, $fieldArr, $where = array()) {

		$condition = '';
		if(!empty($where)){
			foreach ($where as $k => $v) {
				$condition .= ' and '.$k.' = "'.$v.'"';
			}
			
		}

		$setStr = '';
		foreach ($fieldArr as $k => $v) {
			$setStr .= $k.' = '.$k.'  '.$v.', ';
		}
		$str = substr($setStr,0,-2);
		$sql = 'update '.$table.' set '.$str.' where 1 = 1 '.$condition;
		$this->db->query($sql);
		return $this->db->affected_rows();

	}

	/**
	 * 简单对称加密算法之加密
	 * @param String $string 需要加密的字串
	 * @param String $skey 加密EKY
	 * @author Anyon Zou <zoujingli@qq.com>
	 * @date 2013-08-13 19:30
	 * @update 2014-10-10 10:10
	 * @return String
	 */
	function encode($string = '', $skey = 'cxphp') {
		$strArr = str_split(base64_encode($string));
		$strCount = count($strArr);
		foreach (str_split($skey) as $key => $value)
			$key < $strCount && $strArr[$key].=$value;
		return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
	}
	/**
	 * 简单对称加密算法之解密
	 * @param String $string 需要解密的字串
	 * @param String $skey 解密KEY
	 * @author Anyon Zou <zoujingli@qq.com>
	 * @date 2013-08-13 19:30
	 * @update 2014-10-10 10:10
	 * @return String
	 */
	function decode($string = '', $skey = 'cxphp') {
		$strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
		$strCount = count($strArr);
		foreach (str_split($skey) as $key => $value)
			$key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
		return base64_decode(join('', $strArr));
	}

	public function set_msg_log($data) {

		$table = 'lz_point_log';
		return $this->insert_data($table, $data);

	}

}