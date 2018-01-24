<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	/**
	 * 添加评论
	 */
	public function add_comment($data = array()) {

		$table = 'lz_comment';
		return $this->insert_data($table, $data);

	}

	/**
	 * 设置用户
	 */
	public function set_user($userid, $data) {

		$table = 'lz_user';
		$where = array('userid' => $userid);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 检查邮箱合法性
	 */
	public function check_email_format($email) {

		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {

			return FALSE;

		} else {

			return TRUE;

		}

	}

	/**
	 * 检查邮箱唯一性
	 */
	public function check_email_unique($email,$userid) {

		$table = 'lz_user';
		$select = '1';
		$where = ' and email = "'.$email.'" and userid != '.$userid;
		$sql = 'select '.$select.' from '.$table.'  where 1 = 1 '.$where;
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;

	}

	/**
	 * 添加项目产品清单
	 */
	public function add_pro($data = array()) {

		$table = 'lz_project_product';
		return $this->insert_data($table, $data);

	}

	/**
	 * 获取材思库
	 */
	public function get_library($libid) {

		$redis_key = 'libid_'.$libid;
		$res = $this->ci_redis->getinstance(6)->hGetAll($redis_key);

		return $res;

	}

	/**
	 * 获取单品
	 */
	public function get_product($proid) {

		$redis_key = 'proid_'.$proid;
		$res = $this->ci_redis->getinstance(7)->hGetAll($redis_key);

		return $res;

	}

	/**
	 * 获取项目产品
	 */
	public function get_project_product($where) {

		$table = 'lz_project_product';

		return $this->select_data_row($table, '*', $where);

	}

	/**
	 * 修改项目产品数据
	 */
	public function set_project_product($sid, $data) {

		$table = 'lz_project_product';
		$where = array('sid' => $sid);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 修改项目产品数据
	 */
	public function set_project_product2($sid, $data) {

		$table = 'lz_product';
		$where = array('proid' => $sid);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 修改项目产品状态
	 */
	public function set_project_product_status($sid, $status) {

		$table = 'lz_project_product';
		$where = array('sid' => $sid);
		$data = array('status' => $status);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 自动编号
	 */
	public function set_project_product_ppcode_auto($proid) {

		$table = 'lz_project_product';
		$select  = 'sid';
		$where = array('proid' => $proid, 'fid' => 0, 'isdel' => 0);
		$order = 'ppcode ASC';

		$prolist = $this->select_data($table, $select, $where, $order, 0, 1000);
		$ppcode = 0;

		// 一级自动排序
		foreach ($prolist as $key => $value) {

			$ppcode = str_pad($ppcode + 1, 3, "0", STR_PAD_LEFT);

			$table = 'lz_project_product';
			$where = array('sid' => $value['sid']);
			$data = array('ppcode' => $ppcode);

			$this->update_data($table, $where, $data);

		}

		// 二级自动排序
		foreach ($prolist as $key => $value) {

			$table = 'lz_project_product';
			$select  = 'sid,tyid';
			$where = array('fid' => $value['sid'], 'isdel' => 0);
			$order = 'ppcode ASC';

			$prolist2 = $this->select_data($table, $select, $where, $order, 0, 1000);
			$ppcode2_num = 0;

			foreach ($prolist2 as $key2 => $value2) {

				if($value2['tyid'] == 1) $ppcode2 = "";
				if($value2['tyid'] == 2) { $ppcode2 = str_pad($ppcode2_num + 1, 2, "0", STR_PAD_LEFT); $ppcode2_num++; }

				$table = 'lz_project_product';
				$where = array('sid' => $value2['sid']);
				$data = array('ppcode' => $ppcode2);

				$this->update_data($table, $where, $data);

			}

		}

		return TRUE;

	}

	/**
	 * 删除项目文档
	 */
	public function del_project_doc($id) {

		$table = 'lz_project_doc';
		$where = array('id' => $id);
		$data = array('isdel' => 1);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 删除项目留言
	 */
	public function del_project_comment($id) {

		$table = 'lz_comment';
		$where = array('id' => $id);
		$data = array('isdel' => 1);

		return $this->update_data($table, $where, $data);
		
	}

	/**
	 * 删除项目产品
	 */
	public function del_project_product($sid) {

		$table = 'lz_project_product';
		$where = array('sid' => $sid);
		$data = array('isdel' => 1);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 替换项目产品
	 */
	public function project_product_change($sid1, $sid2) {

		$table = 'lz_project_product';
		$select = '*';
		$where = array('sid' => $sid2);

		$res = $this->select_data_row($table, $select, $where);

		$table = 'lz_project_product';
		$where = array('sid' => $sid1);
		$data = array('fid' => $res['fid'], 'proid' => $res['proid'], 'proid2' => $res['proid2'], 'count' => $res['count'], 'status' => $res['status'], 'isdel' => $res['isdel'], 'addtime' => $res['addtime']);

		return $this->update_data($table, $where, $data);

	}

	public function project_product_change2($sid) {

		$table = 'lz_project_product';
		$select = '*';
		$where = array('sid' => $sid);

		$data1 = $this->select_data_row($table, $select, $where);

		if($data1['tyid'] == 1) {

			$where = array('sid' => $data1['fid']);
			$data2 = $this->select_data_row($table, $select, $where);

			$sid1 = $data1['sid'];
			$sid2 = $data2['sid'];
			unset($data1['sid']);
			$data1['fid'] = 0;
			$data1['tyid'] = 0;
			unset($data2['sid']);
			$data2['fid'] = $sid2;
			$data2['tyid'] = 1;

			$where1 = array('sid' => $sid2);
			$res1 = $this->update_data($table, $where1, $data1);
			$where2 = array('sid' => $sid1);
			$res2 = $this->update_data($table, $where2, $data2);

			if($res1 && $res2) {

				return TRUE;

			} else {

				return FALSE;

			}

		} elseif($data1['tyid'] == 2) {

			$data = array('isuse' => 1);

			return $this->update_data($table, $where, $data);

		}

	}

	/**
	 * 检查是否好友
	 */
	public function check_friend($userid1, $userid2) {

		$table = 'lz_friend';
		$select = '*';
		$where = array('userid1' => $userid1, 'userid2' => $userid2);
		$data = $this->select_data_row($table, $select, $where);

		return !empty($data) ? 1 : 0;

	}

	/**
	 * 发送通知
	 */
	public function send_msg($data) {

		$table = 'lz_msg';
		return $this->insert_data($table, $data);

	}

	/**
	 * 删除通知
	 */
	public function del_msg($id) {

		$table = 'lz_msg';
		$where = array('id' => $id);
		$data = array('isread' => 1);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 删除分类通知
	 */
	public function read_tye_msg($userid, $index) {

		$table = 'lz_msg';
		$where = array('userid' => $userid, 'action' => $index);
		$data = array('isread' => 1);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 全部标记已读
	 */
	public function read_all_msg($userid) {

		$table = 'lz_msg';
		$where = array('userid' => $userid);
		$data = array('isread' => 1);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 用户对话
	 */
	public function get_dialog_list($userid1, $userid2) {

		$table = 'lz_chat';
		$select = 'userid1, userid2, content, sendtype, sendtime';
		$where = array('userid1' => $userid1, 'userid2' => $userid2);
		$order = 'sendtime DESC';

		$dislog = $this->select_data($table, $select, $where, $order, 0, 10);
		$dislog = array_reverse($dislog);

		foreach ($dislog as $k => $v) {

			$user1 = $this->get_simple_user($v['userid1']);
			$dislog[$k]['avatar1'] = $user1['avatar'];
			$user2 = $this->get_simple_user($v['userid2']);
			$dislog[$k]['avatar2'] = $user2['avatar'];

		}

		return $dislog;

	}

	/**
	 * 发送对话
	 */
	public function send_chat($userid1, $userid2, $content) {

		$table = 'lz_chat';

		$sendtime = date('Y-m-d H:i:s');

		$data = array(
			'userid1' => $userid1,
			'userid2' => $userid2,
			'sendtype' => 1,
			'content' => $content,
			'sendtime' => $sendtime,
		);
		$res1 = $this->insert_data($table, $data);

		$data = array(
			'userid1' => $userid2,
			'userid2' => $userid1,
			'sendtype' => 2,
			'content' => $content,
			'sendtime' => $sendtime,
		);
		$res2 = $this->insert_data($table, $data);

		if($res1 && $res2) {

			$user = $this->get_simple_user($userid1);
			$data = array('avatar' => $user['avatar'], 'content' => $content, 'sendtime' => $sendtime);
			return $data;

		} else {

			return FALSE;

		}

	}

	/**
	 * 查询用户积分操作
	 */
	public function check_user_point($sourcetype) {

		$userid = $this->user->userid;
		$date = date('Y-m-d');
		$sql = "SELECT SUM(point) AS sumpoint FROM lz_log_point WHERE userid='{$userid}' AND stype='{$sourcetype}' AND addtime BETWEEN '{$date} 00:00:00' AND '{$date} 23:59:59'";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		$sumpoint = $res['sumpoint'];

		return $sumpoint;

	}

	/**
	 * 修改用户积分
	 */
	public function set_user_point($sourcetype, $sourceid, $point) {

		$userid = $this->user->userid;
		$sql = "UPDATE lz_user SET point=point+{$point} WHERE userid='{$userid}'";
		$res1 = $this->db->query($sql);

		$table = 'lz_log_point';
		$data = array('userid' => $userid, 'stype' => $sourcetype, 'sid' => $sourceid, 'point' => $point, 'addtime' => date('Y-m-d H:i:s'));
		$res2 = $this->insert_data($table, $data);

		if($res1 && $res2) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	/**
	 * 查询产品用户
	 */
	public function get_product_owner($sourcetype, $sourceid) {

		switch ($sourcetype) {

			case 1: $redis_key = 'proid_'.$sourceid; $slice = 7; break;
			case 2: $redis_key = 'proid_'.$sourceid; $slice = 8; break;
			case 3: $redis_key = 'noteid_'.$sourceid; $slice = 9; break;

		}

		$redis_res = $this->ci_redis->getinstance($slice)->hMget($redis_key, array('userid'));
		return $redis_res;

	}

	/**
	 * 删除项目用户
	 */
	public function del_project_member($userid, $proid) {

		$table = 'lz_project_member';
		$where = array('userid' => $userid, 'proid' => $proid);
		return $this->db->delete($table, $where);

	}

	/**
	 * 加入项目用户
	 */
	public function add_project_member($msgid) {

		$table = 'lz_msg';
		$select  = '*';
		$where = array('id' => $msgid);

		$data1 = $this->select_data_row($table, $select, $where);

		$table = 'lz_project_member';
		$select  = '1';
		$where = array('userid' => $data1['userid'], 'proid' => $data1['action_sid']);

		$data2 = $this->select_data_row($table, $select, $where);

		if(empty($data2)) {

			$data = array(
				'proid' => $data1['action_sid'],
				'userid' => $data1['userid'],
				'groupid' => 30,
				'permissions' => '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0',
				'addtime' => date('Y-m-d H:i:s')
			);

			$this->insert_data($table, $data);

		}

		return TRUE;

	}
	public function add_project_member1($proid, $value) {

		$table = 'lz_project_member';
		$select  = '1';
		$where = array('userid' => $value, 'proid' => $proid);

		$data2 = $this->select_data_row($table, $select, $where);

		if(empty($data2)) {

			$data = array(
				'proid' => $proid,
				'userid' => $value,
				'groupid' => 30,
				'group' => '访客',
				'permissions' => '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0',
				'addtime' => date('Y-m-d H:i:s')
			);

			$this->insert_data($table, $data);

		}

		return TRUE;

	}

	/**
	 * 修改项目用户权限
	 */
	public function set_member_permissions($proid, $uid, $permissions, $group) {

		$table = 'lz_project_member';
		$where = array('proid' => $proid, 'userid' => $uid);
		$data = array('permissions' => $permissions, 'group' => $group);

		return $this->update_data($table, $where, $data);

	}

	/**
	 * 获取项目用户权限
	 */
	public function get_member_permissions($proid, $uid) {

		$table = 'lz_project_member';
		$select = 'permissions';
		$where = array('proid' => $proid, 'userid' => $uid);

		return $this->select_data_row($table, $select, $where);

	}

	/**
	 * 获取项目订单
	 */
	public function get_project_product_checkorder($sid) {

		$sql = "SELECT sid,fid,tyid,proid,proid2,ppcode,ppname,ppdesc,ppprice,ppfloat,count,average,param1,param2,param3 FROM lz_project_product WHERE sid IN ($sid)";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;

	}

}