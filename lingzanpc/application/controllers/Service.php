<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_controller {

	public function __construct() {

		$this->_class = 'service';
		parent::__construct();

		$this->load->model('service_model');

	}

	public function index() {

		$searchWord = $this->input->get('searchWord');
		$data = $this->service_model->getServiceData($searchWord);
		$this->assign('data', $data);
		$this->assign('searchWord', $searchWord);
		$this->display('service/service.index.html');

	}

	public function addFeedback() {

		$way = $this->input->post('way');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$data = array(
			'way' =>$way,
			'title' =>$title,
			'content' =>$content,
			'userid' =>$this->user->userid,
			'addtime' =>date('Y-m-d H:i:s')
		);
		$row = $this->service_model->addData('lz_feedback', $data);
		if(empty($row)) {
			echo json_encode(array('code'=>2001,'msg'=>'提交失败'));
			return false;
		}

		echo json_encode(array('code'=>200,'msg'=>'提交成功'));

	}

	public function solve() {

		$serviceId = $this->uri->segment(3) ? $this->uri->segment(3) : redirect('/service');
		$where = array('id'=>$serviceId);
		$data = $this->service_model->getInfo('lz_service_centre','*', $where);
		$where = array('userid'=>$data['userid']);
		$sendServiceUser = $this->service_model->getInfo('lz_user','nickname,avatar', $where);

		$field = 'id,title,isrecommend';
		$where = array('isdel'=>0,'isrecommend'=>1);
		$recommend = $this->service_model->getList('lz_service_centre', $field, $where, 'id desc', 0, 1000);

		$this->assign('data', $data);
		$this->assign('recommend', $recommend);
		$this->assign('sendServiceUser', $sendServiceUser);
		$this->display('service/service.solve.html');

	}


}