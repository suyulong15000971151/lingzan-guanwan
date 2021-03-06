<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_controller {

	public function __construct() {

		$this->_class = 'search';
		parent::__construct();

		$this->load->model('search_model');

	}

	public function index() {

		$p1 = 0;
		$p2 = 0;
		$seachWord = $this->input->get('seachWord');
		$preSee = get_cookie('preSee');
		$offset = (int) $this->input->get('pages') ? (int) $this->input->get('pages') : 0;

		if($preSee == 'library') {
			$stype = '项目';
		}elseif($preSee == 'collection'){
			$stype = '产品';
		}else{
			$stype = '全部';
		}
		$type = $this->input->get('type') ? $this->input->get('type') : $stype;
		$data = array('row'=>'0','list'=>'');
		$user1 = array('row'=>'0','list'=>'');
		$keyWork = array();
		//type = 1是项目，2是采集，3是个人，4是品牌

		if($type == '全部') {

			$data1 = $this->search_model->getProjectData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$data2 = $this->search_model->getCollectionData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$data3 = $this->search_model->getNoteData($seachWord, $p1);
			$res = array_merge($data1['list'], $data2['list'], $data3['list']);
			shuffle($res);
			$data['row'] = $data1['row']+$data2['row']+$data3['row'];
			$data['list'] = $res;

		}
		if($type == '项目') { //搜索lz_library的单品与项目

			$data = $this->search_model->getProjectData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$keyWork = $this->search_model->getKeyWorkList($offset);

		}

		if($type == '产品') { //搜索lz_product

			$data = $this->search_model->getCollectionData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$keyWork = $this->search_model->getKeyWorkList($offset);

		}

		if($type == '笔记') { //搜索lz_note

			$data = $this->search_model->getNoteData($seachWord, $p1);

		}

		// if($type == '个人' || $type == '品牌'){//搜索lz_user
		if($type == '个人'){//搜索lz_user

			$whereOr = array();
			// if($type == '个人'){ //搜索普通用户、设计师
			// 	$whereOr = array(0,10);
			// }
			// if($type == '品牌'){ //搜索品牌商
			// 	$whereOr = array(20);
			// }
			$user1 = $this->search_model->getUserData($seachWord, $whereOr,$p2);

		}


		$myInfo = $this->search_model->getData('lz_user', 'groupid,userid', array('userid'=>$this->user->userid));

		$p1++;
		$p2++;
		$this->assign('p1', $p1);
		$this->assign('p2', $p2);
		$this->assign('myInfo', $myInfo);
		$this->assign('data', $data);
		$this->assign('user1', $user1);
		$this->assign('seachWord', $seachWord);
		$this->assign('type', $type);
		$this->assign('offset', $offset);
		$this->assign('keyWork', $keyWork);
		$this->display('search/search.index.html');

	}

	public function getData() {

		$seachWord = $this->input->post('seachWord');
		$type = $this->input->post('type') ? $this->input->post('type') : '项目';
		$p1 = $this->input->post('p1');
		$p2 = $this->input->post('p2');

		if(!$p1 && !$p2) {

			$res['errcode'] = 301;
			$res['errmsg'] = "参数为空.";
			echo json_encode($res);
			return false;

		}

		$data = array('row'=>'0','list'=>'');
		$user1 = array('row'=>'0','list'=>'');
		//type = 1是项目，2是采集，3是个人，4是品牌

		if($type == '全部') {
			$data1 = $this->search_model->getProjectData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$data2 = $this->search_model->getCollectionData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$data3 = $this->search_model->getNoteData($seachWord, $p1);
			$res = array_merge($data1['list'], $data2['list'], $data3['list']);
			shuffle($res);
			$data['row'] = $data1['row']+$data2['row']+$data3['row'];
			$data['list'] = $res;
			$res['errmsg'] = $data;

		}
		if($type == '项目') { //搜索lz_library的单品与项目
			// echo 111;
			$data = $this->search_model->getProjectData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$res['errmsg'] = $data;

		}

		if($type == '产品') { //搜索lz_product
			// echo 222;
			$data = $this->search_model->getCollectionData($seachWord, $p1, $this->user->x_index, $this->user->y_index);
			$res['errmsg'] = $data;

		}

		if($type == '笔记') { //搜索lz_note

			$data = $this->search_model->getNoteData($seachWord, $p1);
			$res['errmsg'] = $data;
		}

		// if($type == '个人' || $type == '品牌'){//搜索lz_user
		if($type == '个人'){//搜索lz_user

			$whereOr = array();
			// if($type == '个人'){ //搜索普通用户、设计师
			// 	$whereOr = array(0,10);
			// }
			// if($type == '品牌'){ //搜索品牌商
			// 	$whereOr = array(20);
			// }

			$user1 = $this->search_model->getUserData($seachWord, $whereOr,$p2);
			$res['errmsg'] = $user1;

		}

		$res['errcode'] = 200;

		echo json_encode($res);

	}

	//刷新获取新一批关键词
	public function getKeyWorkList() {

		$offset = $this->input->post('offset');
		$keyWork = $this->search_model->getKeyWorkList($offset);
		echo json_encode($keyWork);

	}


}