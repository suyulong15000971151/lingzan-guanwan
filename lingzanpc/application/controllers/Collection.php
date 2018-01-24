<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends MY_controller {

	public function __construct() {

		$this->_class = 'collection';
		parent::__construct();

		$this->load->model('collection_model');

	}

	/**
	 * 单品列表页
	 */
	public function index() {

		$p = 0;
		$type = (int) $this->input->get('type');
		$seachWord = $this->input->get('seachWord');
		$offset = (int) $this->input->get('pages') ? (int) $this->input->get('pages') : 0;
		$data = $this->collection_model->get_recommend($p, $type, $seachWord, $this->user->x_index, $this->user->y_index);
		$myInfo = $this->collection_model->getData('lz_user', 'groupid,userid', array('userid'=>$this->user->userid));
		$keyWork = $this->collection_model->getKeyWorkList($type,$offset);

		$p++;
		// var_dump($data);
		$this->assign('p', $p);
		$this->assign('type', $type);
		$this->assign('seachWord', $seachWord);
		$this->assign('offset', $offset);
		$this->assign('data', $data);
		$this->assign('myInfo', $myInfo);
		$this->assign('keyWork', $keyWork);
		$this->display('collection/collection.index.html');

	}

	/**
	 * 单品详情页
	 */
	public function product() {

		$proid = (int)$this->uri->segment(3) ? $this->uri->segment(3) : redirect('/home'); // 产品id
		$proid2 = (int)$this->uri->segment(4); // 项目id
		$sid = (int)$this->uri->segment(5); // 产品清单id

		// 获取上/下一个
		$nearproid = $this->collection_model->get_nearproid($proid);

		// 添加浏览记录
		$data = array('userid' => $this->user->userid, 'sourcetype' => 1, 'sourceid' => $proid);
		$id = $this->collection_model->add_look_history($data);

		// 产品信息
		$product = $this->collection_model->get_product($proid);

		// 相关产品
		$type2 = $product['type2'];
		$products = $this->collection_model->get_type_product($type2);

		// 最近浏览
		$history = $this->collection_model->get_look_history($this->user->userid);

		// 评论留言
		$comment = $this->collection_model->get_comment(1, $proid);

		$myInfo = $this->collection_model->getData('lz_user', 'groupid,userid', array('userid'=>$this->user->userid));

		$this->assign('proid', $proid);
		$this->assign('proid2', $proid2);
		$this->assign('sid', $sid);
		$this->assign('nearproid', $nearproid);
		$this->assign('product', $product);
		$this->assign('products', $products);
		$this->assign('history', $history);
		$this->assign('comment', $comment);
		$this->assign('myInfo', $myInfo);
		$this->display('collection/collection.product1.html');

	}

	//换一批相关产品
	public function changeProductData() {

		$proid = (int) $this->input->post('proid');
		if(empty($proid)) {
			echo json_encode(array('code'=>'2001','msg'=>'参数错误'));
			return false;
		}
		// 产品信息
		$product = $this->collection_model->get_product($proid);

		// 相关产品
		$type2 = $product['type2'];
		$products = $this->collection_model->get_type_product($type2);
		// var_dump($products);die();
		echo json_encode(array('code'=>'200','msg'=>$products));

	}

	//刷新获取新一批关键词
	public function getKeyWorkList() {

		$type = $this->input->post('type');
		$offset = $this->input->post('offset');
		$keyWork = $this->collection_model->getKeyWorkList($type,$offset);
		echo json_encode($keyWork);

	}

}