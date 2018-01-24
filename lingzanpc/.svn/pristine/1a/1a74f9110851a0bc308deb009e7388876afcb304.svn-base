<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {

	private $_user = array();
	private $_CI;
	public $userid;
	public $nickname;
	public $avatar;
	public $groupid;
	public $tag1;
	public $tag2;
	public $x_index;
	public $y_index;

	public function __construct() {
		$this->_CI =& get_instance();
		$this->_user = unserialize($this->_CI->session->userdata('user'));
		$this->_CI->load->model('user_model');
		$this->_CI->load->model('member_model');

		if(!empty($this->_user)) {

			$this->userid = $this->_user['userid'];
			$this->nickname = $this->_user['nickname'];
			$this->avatar = $this->_user['avatar'];
			$this->groupid = $this->_user['groupid'];
			$this->tag1 = $this->_user['tag1'];
			$this->tag2 = $this->_user['tag2'];
			$this->x_index = $this->_user['x_index'];
			$this->y_index = $this->_user['y_index'];

		}
	}
}