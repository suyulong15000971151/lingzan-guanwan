<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_controller {

	public function __construct() {

		$this->_class = 'ajax';
		parent::__construct();

		$this->load->model('ajax_model');

	}

	/**
	 * 发送手机验证码
	 */
	public function login_send_verifical_mobile() {

		$mobile = $this->input->post('mobile', true);

		$res = array();
		if(!$mobile) {

			$res['errcode'] = 301;
			$res['errmsg'] = "手机号为空.";

		} else {

			$code = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
			$msg = "【瓴赞网】您的验证码是{$code}，请于30分钟内正确输入。";

			$redis_key = 'ver_'.$mobile;
			$this->ci_redis->select(5);
			$this->ci_redis->set($redis_key, $code);

			$this->load->library('SendSMS');
			$res2 = $this->sendsms->send($mobile, $msg);

			$res['errcode'] = $res2->status_code;
			$res['errmsg'] = "发送成功.";

		}

		echo json_encode($res);

	}

	/**
	 * 评论内容
	 */
	public function source_comment() {

		$sourcetype = $this->input->post('sourcetype', true);
		$sourceid = $this->input->post('sourceid', true);
		$userid2 = $this->input->post('userid2', true);
		$comment = $this->input->post('comment', true);

		if(!$sourcetype ||!$sourceid || !$comment) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			// 入库
			$data = array(
				'sourcetype' => $sourcetype,
				'sourceid' => $sourceid,
				'userid' => $this->user->userid,
				'userid2' => $userid2,
				'comment' => $comment,
				'addtime' => date('Y-m-d H:i:s')
			);
			$comid = $this->ajax_model->add_comment($data);

			// 发送通知
			$own = $this->ajax_model->get_product_owner($sourcetype, $sourceid);
			switch($sourcetype) {
				case 1: $action_stype = 2; break;
				case 2: $action_stype = 1; break;
				case 3: $action_stype = 3; break;
			}
			$data = array(
				'userid' => $own['userid'],
				'action' => 4,
				'action_detail' => 41,
				'action_userid' => $this->user->userid,
				'action_stype' => $action_stype,
				'action_sid' => $sourceid,
				'isread' => 0,
				'addtime' => date('Y-m-d H:i:s')
			);
			$this->ajax_model->send_msg($data);

			if($sourcetype == 1) {

				// 评论+1
				$this->ajax_model->incr_data('lz_product', array('proid' => $sourceid), 'commentcount');
				$this->redis_model->set_product($sourceid);

				// 积分+5
				if(mb_strlen($comment) >= 6 && $this->ajax_model->check_user_point($sourcetype) <= 25) {

					$point = 5;
					$this->ajax_model->set_user_point($sourcetype, $sourceid, $point);
					$this->redis_model->set_user($this->user->userid);

				}

				// 积分日志
				$data = array(
					'userid' => $this->user->userid,
					'action' => '评论采集',
					'point' => 5,
					'addtime' => date('Y-m-d H:i:s')
				);
				$this->ajax_model->set_msg_log($data);

			} elseif($sourcetype == 2) {

				// 评论+1
				$this->ajax_model->incr_data('lz_project', array('proid' => $sourceid), 'commentcount');
				$this->redis_model->set_project($sourceid);

				// 积分+2
				if(mb_strlen($comment) >= 6 && $this->ajax_model->check_user_point($sourcetype) <= 25) {

					$point = 2;
					$this->ajax_model->set_user_point($sourcetype, $sourceid, $point);
					$this->redis_model->set_user($this->user->userid);

				}

				// 积分日志
				$data = array(
					'userid' => $this->user->userid,
					'action' => '评论项目',
					'point' => 2,
					'addtime' => date('Y-m-d H:i:s')
				);
				$this->ajax_model->set_msg_log($data);

			} elseif($sourcetype == 3) {

				// 评论+1
				$this->ajax_model->incr_data('lz_note', array('noteid' => $sourceid), 'commentcount');
				$this->redis_model->set_note($sourceid);

			}

			if($comid) {

				$res['errcode'] = 200;
				$res['errmsg'] = "修改成功.";

			} else {

				$res['errcode'] = 304;
				$res['errmsg'] = "修改失败.";

			}

		}

		echo json_encode($res);

	}

	/**
	 * 设置用户标签
	 */
	public function set_user_tag1() {

		$tag = $this->input->post('tag', true);
		$tag = implode(',', $tag);

		if(!$tag) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$userid = $this->user->userid;

			// 入库
			$data = array('tag1' => $tag);
			$this->ajax_model->set_user($userid, $data);
			$this->redis_model->set_user($userid);

			$res['errcode'] = 200;
			$res['errmsg'] = "修改成功.";

		}

		echo json_encode($res);

	}

	/**
	 * 设置用户标签
	 */
	public function set_user_tag2() {

		$tag = $this->input->post('tag', true);
		$tag = implode(',', $tag);

		if(!$tag) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$userid = $this->user->userid;

			// 入库
			$data = array('tag2' => $tag);
			$this->ajax_model->set_user($userid, $data);
			$this->redis_model->set_user($userid);

			$res['errcode'] = 200;
			$res['errmsg'] = "修改成功.";

		}

		echo json_encode($res);

	}

	/**
	 * @name 邮箱发送验证码
	 */
	public function send_verifical_email() {

		$email = $this->input->post('email', true);
		$userid = $this->user->userid;
		$res = array();
		if(!$email) {

			$res['errcode'] = 301;
			$res['errmsg'] = "邮箱为空.";

		} elseif(!$this->ajax_model->check_email_format($email)) {

			$res['errcode'] = 302;
			$res['errmsg'] = "邮箱格式错误.";

		} elseif($this->ajax_model->check_email_unique($email,$userid)) {

			$res['errcode'] = 303;
			$res['errmsg'] = "该邮箱已经存在.";

		} else {

			$code = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
			$msg = "【瓴赞网】您的验证码是{$code}，请于30分钟内正确输入。";

			$redis_key = 'ver_'.$email;
			$this->ci_redis->getinstance(5)->set($redis_key, $code);

			$this->load->library('email');
			$this->load->config('email');
			$this->email->initialize($this->config->item('email'));

			$this->email->from('hw19860611@163.com', '瓴赞网');
			$this->email->to($email);

			$this->email->subject('瓴赞网用户绑定邮箱/取消邮箱绑定');
			$this->email->message($msg);

			$result = $this->email->send();

			if($result) {

				$res['errcode'] = 200;
				$res['errmsg'] = "发送成功.";

			} else {

				$res['errcode'] = 304;
				$res['errmsg'] = "发送失败.";

			}
		}

		echo json_encode($res);

	}

	/**
	 * 添加项目产品清单
	 */
	public function add_pro_pro() {

		$proid = $this->input->post('proid', true);
		$proid2 = $this->input->post('proid2', true);
		$sid = $this->input->post('sid', true);
		$count = rand(1, 9);

		if(!$proid || !$proid2 || !$sid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "邮箱为空.";

		} else {

			// 入库
			$data = array('fid' => $sid, 'proid' => $proid2, 'proid2' => $proid, 'count' => $count, 'addtime' => date('Y-m-d H:i:s'));
			$sid = $this->ajax_model->add_pro($data);

			if($sid) {

				$res['errcode'] = 200;
				$res['errmsg'] = "添加成功.";

			} else {

				$res['errcode'] = 304;
				$res['errmsg'] = "添加失败.";

			}

		}

		echo json_encode($res);

	}

	/**
	 * 获取材思库
	 */
	public function get_library() {

		$libid = $this->input->post('libid', true);

		if(!$libid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->get_library($libid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 获取单品
	 */
	public function get_product() {

		$proid = $this->input->post('proid', true);

		if(!$proid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->get_product($proid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品编号（自动编号）
	 */
	public function project_product_ppcode_auto() {

		$proid = $this->input->post('proid', true);

		if(!$proid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->set_project_product_ppcode_auto($proid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品状态
	 */
	public function project_product_status() {

		$sid = $this->input->post('sid', true);
		$status = $this->input->post('status', true);

		if(!$sid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			if($status == 0 || $status == 1) {

				$data = $this->ajax_model->set_project_product_status($sid, $status);

			} else {

				$data = $this->ajax_model->del_project_product($sid);

			}

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品（选中、修改、移除）
	 */
	public function project_product_edit() {

		$text = $this->input->post('text', true);
		$sid1 = $this->input->post('sid1', true);
		$sid2 = $this->input->post('sid2', true);

		if(!$text || !$sid1 || !$sid2) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} elseif($text == '选中') {

			$data = $this->ajax_model->project_product_change($sid1, $sid2);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		} elseif($text == '移除') {

			$data = $this->ajax_model->del_project_product($sid2);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品数据
	 */
	public function project_product_reset() {

		$sid = $this->input->post('sid', true);
		$pp = $this->input->post('pp', true);
		$mid = $this->input->post('mid', true);

		if(!$sid || !$pp || !$mid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			if($mid == 1) {
				$dt = array('ppcode' => $pp[0], 'ppname' => $pp[1], 'ppdesc' => $pp[2], 'ppprice' => $pp[3], 'ppfloat' => $pp[4]);
			} elseif($mid == 2) {
				$dt = array('ppprice' => $pp[0], 'ppfloat' => $pp[1]);
			}
			$data = $this->ajax_model->set_project_product($sid, $dt);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品数据
	 */
	public function project_product_reset2() {

		$sid = $this->input->post('sid', true);
		$field = $this->input->post('field', true);
		$text = $this->input->post('text', true);

		if(!$sid || !$field || !$text) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			if($field == 'ppcode') $text = substr($text, -3);

			$dt = array($field => $text);
			$data = $this->ajax_model->set_project_product($sid, $dt);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目产品数据
	 */
	public function project_product_reset3() {

		$sid = $this->input->post('sid', true);
		$field = $this->input->post('field', true);
		$text = $this->input->post('text', true);

		if(!$sid || !$field || !$text) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$dt = array($field => $text);
			$data = $this->ajax_model->set_project_product2($sid, $dt);
			$this->redis_model->set_product($sid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	public function project_product_reset4() {

		$sid = $this->input->post('sid', true);
		$field = $this->input->post('field', true);
		$text = $this->input->post('text', true);

		if(!$sid || !$field || !$text) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$where = array('sid' => $sid);
			$data = $this->ajax_model->get_project_product($where);

			$where = array('proid' => $data['proid'], 'ppcode' => substr($text, strpos($text, '-')-3, 3), 'isdel' => 0);
			$data = $this->ajax_model->get_project_product($where);

			$dt = array('fid' => $data['sid'], 'tyid' => 2, $field => substr($text, strpos($text, '-')+1));
			$data = $this->ajax_model->set_project_product($sid, $dt);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 方案替换
	 */
	public function project_product_change() {

		$sid = $this->input->post('sid', true);

		if(!$sid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->project_product_change2($sid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 材料使用
	 */
	public function project_product_use() {

		

	}

	/**
	 * 生成项目订单
	 */
	public function project_product_setorder() {

		$proid = $this->input->post('proid', true);
		$sid = $this->input->post('sid', true);

		if(!$proid || !$sid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			// 生成订单编号
			$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
			$orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));

			// 项目详情
			$this->load->model('library_model');
			$project = $this->library_model->get_project($proid);

			// 产品清单
			$prolist = $this->ajax_model->get_project_product_checkorder(implode($sid, ','));

			foreach ($prolist as $key => $value) {

				if($value['tyid'] == 1) {

					$father = $this->ajax_model->get_project_product(array('sid' => $value['fid']));
					$value['sid'] = $father['sid'];
					$value['fid'] = 0;
					$value['tyid'] = 0;

				}

				$data = array('orderid' => $orderSn, 'ordername' => $project['area'].$project['proname'], 'orderuserid' => $this->user->userid, 'desc' => '', 'addtime' => date('Y-m-d H:i:s'));
				$data = array_merge($data, $value);

				$this->library_model->set_project_product_order($data);


			}

			$res['errcode'] = 200;
			$res['errmsg'] = array('orderid' => $orderSn);

		}

		echo json_encode($res);

	}

	/**
	 * 批量修改项目产品（拷贝、移除、删除）
	 */
	public function muti_project_product_edit() {

		$type = $this->input->post('type', true);
		$proid = $this->input->post('proid', true);

		if($type == 3) {

			foreach ($proid as $key => $value) {

				$data = $this->ajax_model->del_project_product($value);

				$res['errcode'] = 200;
				$res['errmsg'] = $data;

			}

		}

		echo json_encode($res);

	}

	/**
	 * 删除项目文档
	 */
	public function del_project_doc() {

		$id = $this->input->post('id', true);

		if(!$id) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->del_project_doc($id);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 删除项目留言
	 */
	public function del_project_comment() {

		$id = $this->input->post('id', true);

		if(!$id) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->del_project_comment($id);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 删除通知
	 */
	public function del_msg() {

		$id = $this->input->post('id', true);

		if(!$id) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->del_msg($id);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 单个分类已读
	 */
	public function read_tye_msg() {

		$index = $this->input->post('index', true);
		$userid = $this->user->userid;

		if(!$index) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->read_tye_msg($userid, $index);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 全部标记已读
	 */
	public function read_all_msg() {

		$userid = $this->user->userid;

		$data = $this->ajax_model->read_all_msg($userid);

		$res['errcode'] = 200;
		$res['errmsg'] = $data;

		echo json_encode($res);

	}

	/**
	 * 用户聊天记录
	 */
	public function user_chat() {

		$userid2 = $this->input->post('userid2', true);

		if(!$userid2) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$userid1 = $this->user->userid;
			$data = $this->ajax_model->get_dialog_list($userid1, $userid2);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 发送聊天内容
	 */
	public function send_chat() {

		$userid2 = $this->input->post('userid2', true);
		$content = $this->input->post('content', true);

		if(!$userid2 || !$content) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$userid1 = $this->user->userid;
			$data = $this->ajax_model->send_chat($userid1, $userid2, $content);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 用户签到
	 */
	public function user_sign() {

		$userid = $this->user->userid;

		// 判断今天是否已经签到
		$this->load->model('user_model');
		$check = $this->user_model->check_user_sign($userid);

		if(!$check) {

			$res['errcode'] = 302;
			$res['errmsg'] = "已经签到.";

		} else {

			$usersign = $this->user_model->get_user_sign($userid);

			switch($usersign['signcount']) {
				case 0: $point = 5; break;
				case 1: $point = 10; break;
				case 2: $point = 15; break;
				case 3: $point = 20; break;
				default: $point = 25;
			}

			// 用户签到
			$this->user_model->set_user_sign($userid, $point);

			// 积分日志
			$data = array(
				'userid' => $this->user->userid,
				'action' => '每天签到',
				'point' => $point,
				'addtime' => date('Y-m-d H:i:s')
			);
			$this->ajax_model->set_msg_log($data);

			// 获取用户积分
			$usersign = $this->user_model->get_user_sign($userid);

			$res['errcode'] = 200;
			$res['errmsg'] = $usersign;

		}

		echo json_encode($res);

	}

	/**
	 * 用户积分日志
	 */
	public function point_log() {

		$date = $this->input->post('date', true);

		if(!$date) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$this->load->model('user_model');
			$data = $this->user_model->get_point_log($date);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 邀请项目用户
	 */
	public function muti_project_member_invite() {

		$proid = $this->input->post('proid', true);
		$userid = $this->input->post('uid', true);

		if(empty($userid)) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			foreach ($userid as $key => $value) {

				$flag = $this->ajax_model->check_friend($this->user->userid, $value);

				if($flag) {

					$this->ajax_model->add_project_member1($proid, $value);

				} else {

					$data = array(
						'userid' => $value,
						'action' => 5,
						'action_detail' => 53,
						'action_userid' => $this->user->userid,
						'action_stype' => 1,
						'action_sid' => $proid,
						'isread' => 0,
						'addtime' => date('Y-m-d H:i:s')
					);

					$this->ajax_model->send_msg($data);

				}

			}

			$res['errcode'] = 200;
			$res['errmsg'] = 'success';

		}

		echo json_encode($res);

	}

	/**
	 * 删除项目用户
	 */
	public function del_project_member() {

		$userid = $this->input->post('uid', true);
		$proid = $this->input->post('pid', true);

		if(!$userid || !$proid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->del_project_member($userid, $proid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 删除项目封面
	 */
	public function del_project_cover() {

		$proid = $this->input->post('proid', true);
		$index = $this->input->post('index', true);

		if(!$proid || !$index) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			// 获取项目封面
			$this->load->model('library_model');
			$project = $this->library_model->get_project($proid);
			$cover = explode(',', $project['cover']);
			unset($cover[$index-1]);
			$cover = implode(',', $cover);
			$data = array('cover' => $cover);

			$data = $this->library_model->upload_cover($proid, $data);
			$this->redis_model->set_project($proid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 首页瀑布流获取
	 */
	public function get_home_content() {

		$p = $this->input->post('p', true);

		if(!$p) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$this->load->model('home_model');
			$list = $this->home_model->get_recommend($p, $this->user->x_index, $this->user->y_index);

			$res['errcode'] = 200;
			$res['errmsg'] = $list;

		}

		echo json_encode($res);

	}

	/**
	 * 产品页瀑布流获取
	 */
	public function get_collection_content() {

		// $key = $this->input->post('key', true);
		$p = $this->input->post('p', true);
		$type = (int) $this->input->post('type', true);
		$seachWord = $this->input->post('seachWord', true);

		if(!$p) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$this->load->model('collection_model');
			$list = $this->collection_model->get_recommend($p, $type, $seachWord, $this->user->x_index, $this->user->y_index);

			$res['errcode'] = 200;
			$res['errmsg'] = $list;

		}

		echo json_encode($res);

	}

	/**
	 * 项目页瀑布流获取
	 */
	public function get_library_content() {

		$p = $this->input->post('p', true);
		$type = (int) $this->input->post('type', true);
		$seachWord = $this->input->post('seachWord', true);

		if(!$p) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$this->load->model('library_model');
			$list = $this->library_model->get_recommend($p, $type, $seachWord, $this->user->x_index, $this->user->y_index);

			$res['errcode'] = 200;
			$res['errmsg'] = $list;

		}

		echo json_encode($res);

	}

	/**
	 * 同意（拒绝）加入项目
	 */
	public function examineProject() {

		$msgid = $this->input->post('msgId', true);
		$ress = $this->input->post('res', true);

		if(!$msgid || !$ress) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			if($ress == 1) {

				$this->ajax_model->add_project_member($msgid);

			}

			$this->ajax_model->del_msg($msgid);

			$res['errcode'] = 200;
			$res['errmsg'] = $ress;

		}

		echo json_encode($res);

	}

	/**
	 * 修改项目成员权限
	 */
	public function set_member_permissions() {

		$proid = $this->input->post('proid', true);
		$uid = $this->input->post('uid', true);
		$permissions = implode(',', $this->input->post('permissions', true));
		$group = $this->input->post('group', true);

		if(!$proid || !$uid || !$permissions || !$group) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->set_member_permissions($proid, $uid, $permissions, $group);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}

	/**
	 * 获取项目成员权限
	 */
	public function get_member_permissions() {

		$proid = $this->input->post('proid', true);
		$uid = $this->input->post('uid', true);

		if(!$proid || !$uid) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";

		} else {

			$data = $this->ajax_model->get_member_permissions($proid, $uid);

			$res['errcode'] = 200;
			$res['errmsg'] = $data;

		}

		echo json_encode($res);

	}
}