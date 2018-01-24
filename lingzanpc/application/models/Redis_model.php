<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redis_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	/**
	 * Redis调整用户
	 * 
	 * @param int $userid
	 * @return array
	 */
	public function set_user($userid) {

		$sql = "SELECT * FROM lz_user WHERE userid='{$userid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "userid_".$userid;
		$res = $this->ci_redis->getinstance(5)->hMset($redis_key, $result);

		return $res;

	}

	/**
	 * Redis调整材思库
	 */
	public function set_library($libid) {

		$sql = "SELECT * FROM lz_library WHERE libid='{$libid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "libid_".$libid;
		$res = $this->ci_redis->getinstance(6)->hMset($redis_key, $result);

		return $res;

	}

	/**
	 * Redis调整单品
	 */
	public function set_product($proid) {

		$sql = "SELECT * FROM lz_product WHERE proid='{$proid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "proid_".$proid;
		$res = $this->ci_redis->getinstance(7)->hMset($redis_key, $result);

		return $res;

	}

	/**
	 * Redis调整项目
	 */
	public function set_project($proid) {

		$sql = "SELECT * FROM lz_project WHERE proid='{$proid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "proid_".$proid;
		$res = $this->ci_redis->getinstance(8)->hMset($redis_key, $result);

		return $res;

	}

	/**
	 * Redis调整笔记
	 */
	public function set_note($noteid) {

		$sql = "SELECT * FROM lz_note WHERE noteid='{$noteid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "noteid_".$noteid;
		$res = $this->ci_redis->getinstance(9)->hMset($redis_key, $result);

		return $res;

	}

	/**
	 * Redis调整笔记
	 */
	public function set_notice($id) {

		$sql = "SELECT * FROM lz_msg_system WHERE id='{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();

		$redis_key = "noticeid_".$id;
		$res = $this->ci_redis->getinstance(15)->hMset($redis_key, $result);

		return $res;

	}

	//清除redis的某个key
	public function clearCache($key, $slice){

		if($key == '' || !is_numeric($slice)) {

			return array('code'=>2003,'msg'=>'redis参数错误');

		}

		if($this->ci_redis->getinstance($slice)->exists($key)) {

			$ret = $this->ci_redis->getinstance($slice)->delete($key);
			if($ret == false) {

				return array('code'=>2004,'msg'=>'删除redis失败，请联系管理员');

			}

		}

		return array('code'=>200,'msg'=>'删除成功');

	}

	//清除前缀一样的redis
	public function clearAllTypeCache($key, $slice) {

		if($key == '' || !is_numeric($slice)) {

			return array('code'=>2002,'msg'=>'redis参数错误');

		}

		$imageSet = $this->ci_redis->getinstance($slice)->keys($key.'*'); 
		// var_dump($imageSet);
		if(empty($imageSet)){

			return array('code'=>2003,'msg'=>'缓存不存在');

		}

		$sign = 'true';
		foreach ( $imageSet as $value) { 
			$ret = $this->ci_redis->del($value);
			if($ret == false) {

				$sign = 'false';
				break;

			}

		}

		if($sign == 'false'){

			return array('code'=>2004,'msg'=>'删除redis失败,请联系管理员');

		}

		return array('code'=>200,'msg'=>'删除成功');

	}

}