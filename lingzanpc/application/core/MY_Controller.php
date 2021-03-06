<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	public $_class = '';

	public function __construct() {

		parent::__construct();

		// 检查登录
		if(!in_array($this->_class, array('login', 'ajax')) && !$this->auth->hasLogin()) {
			redirect('/login');
		}

		if(!in_array($this->_class, array('login', 'ajax'))) {
			// 获取来源地址
			$refresh = empty($_SERVER['HTTP_REFERER']) ? '' : $_SERVER['HTTP_REFERER'];

			$this->assign('refresh', $refresh);
			$this->assign('userid', $this->user->userid);
			$this->assign('nickname', $this->user->nickname);
			$this->assign('avatar', $this->user->avatar);

			// 公共头部
			//$user = unserialize($this->session->userdata('user'));
			$user = $this->user_model->get_user_redis($this->user->userid);

			// 消息列表
			$msg = $this->user_model->get_user_msg($this->user->userid, $this->config->item('user_action'), $this->config->item('user_action_detail'));

			// 对话列表
			$chat = $this->user_model->get_user_chat($this->user->userid);

			// 用户签到
			$signflg = $this->user_model->check_user_sign($this->user->userid);
			//$sign = $this->user_model->get_user_sign($this->user->userid);

			// 积分日志
			$pointlog = $this->user_model->get_point_log(date('Y-m-d'));
			$pointlog2 = array('positive' => 0, 'negative' => 0);
			foreach ($pointlog as $key => $value) {

				if($value['point'] > 0) $pointlog2['positive'] += $value['point'];
				elseif($value['point'] < 0) $pointlog2['negative'] += $value['point'];

			}
			// var_dump($msg['notice']);

			$this->assign('clas', $this->_class);
			$this->assign('user', $user);
			$this->assign('msg', $msg);
			$this->assign('chat', $chat);
			$this->assign('signflg', $signflg);
			$this->assign('logtime', date('Y-m-d'));
			$this->assign('pointlog', $pointlog);
			$this->assign('pointlog2', $pointlog2);
			//$this->assign('sign', $sign);

			$count1 = $this->member_model->getCount($this->user->userid);
			$this->assign('count1', $count1);

			$where = array('userid'=>$this->user->userid);
			$authDesigner1 = $this->member_model->getData('lz_user_auth_designer', '*', $where);
			$this->assign('authDesigner1', $authDesigner1);

			//记录当前点击的页面
			$controller = $this->uri->segment(1);
			$action = $this->uri->segment(2);
			//把已选择的区域保存到cookied
			$this->load->helper('cookie');
			if($controller == '' || $controller == 'home' || $controller == 'library' || $controller == 'collection' ) {

				if($action == 'index' || $action == '') {

					if($controller == '') {
						$controller = 'home';
					}
					set_cookie("preSee",$controller,time()+3600*24);

				}
			}elseif($controller == 'search'){

			}else{
				delete_cookie('preSee');
			}

		}

		$this->assign('static_url', $this->config->item('static_url'));

	}

	public function assign($key, $val) {
		$this->ci_smarty->assign($key, $val);
	}

	public function display($html) {
		$this->ci_smarty->display($html);
	}
}