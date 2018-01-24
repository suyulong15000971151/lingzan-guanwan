<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find extends MY_controller {

	public function __construct() {

		$this->_class = 'find';
		parent::__construct();

		$this->load->model('find_model');

	}

	public function index() {

		// 发现精选
		$type1 = explode(',', $this->user->tag1);
		$type2 = explode(',', $this->user->tag2);
		$list = $this->find_model->get_recommend($type1, $type2);

		// 达人推荐
		$talent = $this->find_model->get_talent();

		// 项目推荐
		$collect_type2 = $this->config->item('collect_type2');
		$type2 = array_rand($collect_type2, 3);
		$project = array();
		foreach ($type2 as $key => $value) {

			$project[$key]['type_name'] = $collect_type2[$value];
			$project[$key]['list'] = $this->find_model->get_project($value);

		}

		// 产品推荐
		$product = $this->find_model->get_product();

		$myInfo = $this->find_model->getData('lz_user', 'groupid', array('userid'=>$this->user->userid));

		$this->assign('list', $list);
		$this->assign('talent', $talent);
		$this->assign('project', $project);
		$this->assign('product', $product);
		$this->assign('myInfo', $myInfo);
		$this->display('find/find.index.html');

	}

	//换一批达人
	public function changeMemberData() {
		$talent = $this->find_model->get_talent();
		echo json_encode(array('code'=>200,'msg'=>$talent));
	}
}