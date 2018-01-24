<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	/**
	 * 获取用户
	 */
	public function get_user($data) {

		$table = 'lz_user';
		$select = '*';
		$where = $data;
		$order = '';

		$user = $this->select_data_row($table, $select, $where);
		return $user;

	}

	/**
	 * 获取用户消息列表
	 */
	public function get_user_msg($userid, $user_action, $user_action_detail) {

		$msg = array();
		$msg['totalcount'] = 0;

		foreach ($user_action as $key => $value) {

			$table = 'lz_msg';
			$select = '*';
			$where = array('userid' => $userid, 'action' => $key, 'isread' => 0);
			$order = 'addtime DESC';

			$msg[$value] = $this->select_data($table, $select, $where, $order, 0, 100);
			$msg[$value.'count'] = count($msg[$value]);
			$msg['totalcount'] += count($msg[$value]);

			foreach ($msg[$value] as $k => $v) {

				$msg[$value][$k]['action_detail_name'] = $user_action_detail[$v['action_detail']];

				$msg[$value][$k]['date'] = date('m月d日', strtotime($v['addtime']));

				$user2 = $this->get_simple_user($v['action_userid']);
				$msg[$value][$k]['action_username'] = $user2['nickname'];
				$msg[$value][$k]['action_avatar'] = $user2['avatar'];

				switch ($v['action_stype']) {
					case 1: $source = $this->get_simple_project($v['action_sid']); $msg[$value][$k]['action_sname'] = $source['proname']; break;
					case 2: $source = $this->get_simple_product($v['action_sid']); $msg[$value][$k]['action_sname'] = $source['proname']; break;
					case 3: $source = $this->get_simple_note($v['action_sid']); $msg[$value][$k]['action_sname'] = $source['notename']; break;
					case 5: $source = $this->get_simple_notice($v['action_sid']); $msg[$value][$k]['action_sname'] = $source['content']; break;
					case 0: $source = $this->get_simple_apply($v['action_sid']); $msg[$value][$k]['action_sname'] = $source['content']; $msg[$value][$k]['res'] = $source['res']; $msg[$value][$k]['nickname'] = $source['nickname']; $msg[$value][$k]['avatar'] = $source['avatar']; break;
				}

				switch ($v['action_detail']) {
					case 53: $source = $this->get_simple_project($v['action_sid']); $source2 = $this->get_simple_user($v['action_userid']); $msg[$value][$k]['action_sname'] = $source['proname']; $msg[$value][$k]['nickname'] = $source2['nickname']; $msg[$value][$k]['avatar'] = $source2['avatar']; break;
				}

			}

		}
		//var_dump($msg);die;

		return $msg;

	}

	/**
	 * 获取用户对话列表
	 */
	public function get_user_chat($userid) {

		$sql = "SELECT userid2,content,sendtime FROM lz_chat WHERE id IN (SELECT MAX(id) FROM lz_chat WHERE userid1='{$userid}' GROUP BY userid2) ORDER BY id DESC";
		$query = $this->db->query($sql);
		$chat = $query->result_array();

		foreach ($chat as $k => $v) {

			$chat[$k]['sendtime'] = date('m月d日', strtotime($v['sendtime']));
			$chat[$k] = array_merge($chat[$k], $this->get_simple_user($v['userid2']));

		}

		return $chat;

	}

	/**
	 * 检查用户签到信息
	 */
	public function check_user_sign($userid) {

		$table = 'lz_sign';
		$select = '*';
		$where = array('userid' => $userid, 'date' => date('Y-m-d', strtotime('-1 day')));

		$data1 = $this->select_data_row($table, $select, $where);

		$table = 'lz_sign';
		$select = '*';
		$where = array('userid' => $userid, 'date' => date('Y-m-d'));

		$data2 = $this->select_data_row($table, $select, $where);

		if(empty($data1) && empty($data2)) {

			$table = 'lz_user';
			$where = array('userid' => $userid);
			$data = array('signcount' => 0);
			$this->update_data($table, $where, $data);

			$this->redis_model->set_user($userid);

		}

		if(empty($data2)) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	/**
	 * 从redis获取用户全部信息
	 */
	public function get_user_redis($userid) {

		$redis_key = 'userid_'.$userid;
		$redis_res = $this->ci_redis->getinstance(5)->hGetAll($redis_key);

		return $redis_res;

	}
	

	/**
	 * 获取用户签到信息
	 */
	public function get_user_sign($userid) {

		$redis_key = 'userid_'.$userid;
		$redis_res = $this->ci_redis->getinstance(5)->hmGet($redis_key, array('signcount', 'totalsigncount', 'totalsignpoint', 'point'));

		return $redis_res;

	}

	/**
	 * 用户签到
	 */
	public function set_user_sign($userid, $point) {

		// 计算用户积分排名
		$sql = "SELECT count(1) AS count FROM lz_user WHERE point>(SELECT point FROM lz_user WHERE userid={$userid})";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		$count1 = $res['count'];

		$sql = "SELECT count(1) AS count FROM lz_user";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		$count2 = $res['count'];

		$pot = ($count2-$count1) / $count2;
		$pot = sprintf("%.2f", $pot) * 100;

		// 签到
		$sql = "UPDATE lz_user SET signcount=signcount+1,totalsigncount=totalsigncount+1,totalsignpoint=totalsignpoint+{$point},point=point+{$point},pointpot={$pot} WHERE userid={$userid}";
		$res1 = $this->db->query($sql);

		// 入redis
		$this->redis_model->set_user($userid);

		// 签到记录
		$table = 'lz_sign';
		$data = array('userid' => $userid, 'date' => date('Y-m-d'), 'addtime' => date('Y-m-d H:i:s'));
		$res2 = $this->insert_data($table, $data);

		if($res1 && $res2) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	/**
	 * 获取用户积分日志
	 */
	public function get_point_log($date) {

		$sql = "SELECT * FROM lz_point_log WHERE addtime BETWEEN '{$date} 00:00:00' AND '{$date} 23:59:59'";
		$query = $this->db->query($sql);
		$res = $query->result_array();

		return $res;

	}

	/**
	 * 注册用户
	 */
	public function reg_user($data = array()) {

		return $this->insert_data('lz_user', $data);

	}

	/**
	 * 修改密码
	 */
	public function set_password($mobile, $password) {

		$table = 'lz_user';
		$where = array('mobile' => $mobile);
		$data = array('password' => $password);

		return $this->update_data($table, $where, $data);

	}
}