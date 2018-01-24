<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_controller {

	public function __construct() {

		$this->_class = 'home';
		parent::__construct();

		$this->load->model('home_model');

	}

	public function index() {

		$p = 1;
		$list = $this->home_model->get_recommend($p, $this->user->x_index, $this->user->y_index);
		$myInfo = $this->home_model->getData('lz_user', 'groupid,userid', array('userid'=>$this->user->userid));
		$p++;

		$this->assign('p', $p);
		$this->assign('list', $list);
		$this->assign('myInfo', $myInfo);
		$this->display('home/home.index.html');

	}
}