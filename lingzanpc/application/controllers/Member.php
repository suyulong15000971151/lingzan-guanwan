<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_controller {

	public function __construct() {

		$this->_class = 'member';
		parent::__construct();

		$this->load->model('member_model');

	}

	/**
	 * 用户创建的项目
	 */
	public function library() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$library = $this->member_model->get_library($userid, $p, $seachWord);
		$this->getUserInfoData($userid);
		$userId = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		//获取城市数据
		$this->load->model('account_model');
		$where = array('flg'=>1);//查找省列表
		$city = $this->account_model->getCityData('lz_city', 'code,name', $where, 'code asc');

		$p++;
		$this->assign('p', $p);
		$this->assign('city', $city);
		$this->assign('userId', $userId);
		$this->assign('seachWord', $seachWord);
		$this->assign('library', $library);
		$this->assign('cityCode', '');
		$this->assign('areayCode', '');
		$this->assign('countyCode', '');
		$this->display('member/member.library.html');

	}

	//用户参与的区域
	public function partInProject() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$project = $this->member_model->get_partin_project($userid, $p, $seachWord);
		$this->getUserInfoData($userid);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('project', $project);
		$this->display('member/member.partinproject.html');

	}


	//我关注的区域
	public function follproject() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$project = $this->member_model->get_follow_project($userid, $p, $seachWord);
		$this->getUserInfoData($userid);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('project', $project);
		$this->display('member/member.follproject.html');

	}


	/**
	 * 添加材思库
	 */
	public function addLibrary() {

		$error_msg = '';
		$this->form_validation->set_rules('libname', '名称', 'trim|required');
		$this->form_validation->set_rules('type1', '分类', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		$libname = $this->input->post('libname', true);
		$desc = $this->input->post('desc', true);
		$address = $this->input->post('address', true);
		$isshow = $this->input->post('isshow', true);
		$status = $this->input->post('status', true);
		if($status == '设计中') {
			$status = 1;
		}else if($status == '生产中') {
			$status = 2;
		}else if($status == '已完成'){
			$status = 3;
		}

		//获取城市
		$province = $this->input->post('province', true);
		$quyu = $this->input->post('quyu', true);
		$county = $this->input->post('county', true);
		// if(!empty($quyu) && empty($county)) {
		// 	echo json_encode(array('code'=>2002,'msg'=>'<p>请选择完整的地点</p>'));
		// 	return false;
		// }

		if(!empty($county)){
			$city = $county;
		}

		if(!empty($province) && !empty($quyu) && empty($county)){
			$city = $quyu;
		}

		if(!empty($province) && empty($county) && empty($quyu)){
			$city = $province;
		}


		//名称不能重复
		$arr = $this->member_model->select_fieldVal_exit('lz_library',array(), array('userid'=>$this->user->userid,'libname'=>$libname,'isdel'=>0));
		if(!empty($arr)) {

			echo json_encode(array('code'=>2003,'msg'=>'<p>该项目名称已存在，请重新添加</p>'));
			return false;
		}

		$type1 = $this->input->post('type1', true);
		// $tag = $this->input->post('tag');

		// 上传产品图片
		$res = $this->uploadImage('pic');
		if($res['code'] != 200) {
			echo json_encode($res);
			return false;
		}
		$cover = $res['msg'];

		$typeArr1 = $this->config->item('library_type');
		$type1 = array_search($type1, $typeArr1);

		// 入库
		$this->db->trans_begin();
		$data = array(
			'libflg' => 1,
			'userid' => $this->user->userid,
			'libname' => $libname,
			'procount2'=>1,
			'address'=>$address,
			'city'=>$city,
			'desc' => $desc,
			'cover' => $cover,
			'type1' => $type1,
			'isshow' => $isshow,
			// 'tag' => $tag,
			'status' => $status,
			'createtime' => date('Y-m-d H:i:s')
		);
		$libid = $this->member_model->addData('lz_library',$data);
		if(empty($libid)){

			echo json_encode(array('code'=>2005,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		$where = array('isdel'=>0,'userid'=>$this->user->userid);
		$res = $this->member_model->getOneData('lz_project', 'area', $where, 'proid DESC', 0, 1);
		$area = $res['0']['area'];

		//查找最后添加的该项目的产品的编号
		$newArea = 'IF01';
		if($area != '') {

			$str = str_replace('IF',"",$area);
			$str++;

			if(strlen($str) == 1){
				$str = '0'.$str;
			}else{

			}
			$newArea = 'IF'.$str;
		}

		//每生成一个项目，就会生成一个默认的区域：项目总览
		$data = array(
			'userid'=>$this->user->userid,
			'libid'=>$libid, 
			'area'=>$newArea,
			'cover'=>$cover,
			'proname'=>'项目总览',
			'status'=>1,
			'addtime'=>date('Y-m-d H:i:s'),
			'updatetime'=>date('Y-m-d H:i:s')
		);
		$proid = $this->member_model->addData('lz_project',$data);
		if(empty($proid)){
			$this->db->trans_rollback();
			echo json_encode(array('code'=>2006,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		$data = array(
			'proid'=>$proid,
			'userid'=>$this->user->userid,
			'groupid'=>10,
			'permissions'=>'1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',
			'addtime'=>date('Y-m-d H:i:s')
		);
		$projectMemberId = $this->member_model->addData('lz_project_member', $data);
		if(empty($projectMemberId)){
			$this->db->trans_rollback();
			echo json_encode(array('code'=>2007,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		//修改我的材思库数量
		$where = array('userid'=>$this->user->userid);
		$fieldArr = array('librarycount'=>' + 1');
		//每日添加的前5个材思库都可以获得5个积分
		$res = $this->member_model->getAddCountByToDay('lz_library', 'createtime', $where);
		if($res['count'] <= 5) {
			$fieldArr = array('librarycount'=>' + 1','point'=>' + 5');
			//添加积分明细记录
			$data = array('userid'=>$this->user->userid, 'action'=>'添加项目', 'point'=>5, 'addtime'=>date('Y-m-d H:i:s'));
			$pointLogId = $this->member_model->addData('lz_point_log', $data);
			if(empty($pointLogId)) {
				$this->db->trans_rollback();
				echo json_encode(array('code'=>2008,'msg'=>'<p>添加失败</p>'));
				return false;

			}
		}
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2009,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		$this->db->trans_commit();
		$row = $this->redis_model->set_library($libid);
		if(empty($row)){

			echo json_encode(array('code'=>2010,'msg'=>'<p>添加redis失败, 请联系管理员</p>'));
			return false;

		}

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2011,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'添加成功'));

	}
	/**
	 * 产品
	 */
	public function collection() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$where = array('userid' => $userid, 'isdel'=>0);
		$library = $this->member_model->getTableData('lz_library', 'libid, libname', $where, 'libid desc');
		$collection = $this->member_model->get_product($userid, $p, $seachWord);
		$this->getUserInfoData($userid);
		$userId = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$p++;
		$this->assign('p', $p);
		$this->assign('userId', $userId);
		$this->assign('seachWord', $seachWord);
		$this->assign('library', $library);
		$this->assign('collection', $collection);
		$this->display('member/member.collection.html');

	}

	//我收藏的产品（关注的产品）
	public function storeup() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$collection = $this->member_model->get_storeup($userid, $p, $seachWord);
		$this->getUserInfoData($userid);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('collection', $collection);
		$this->display('member/member.storeup.html');

	}

	/**
	 * 添加产品
	 */
	public function addProduct() {

		$this->form_validation->set_rules('proname', '品名', 'trim|required');
		$this->form_validation->set_rules('type1', '分类', 'trim|required');
		$this->form_validation->set_rules('type2', '功能', 'trim|required');
		// $this->form_validation->set_rules('color', '颜色', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		$link = $this->input->post('link', true);
		if(!empty($link)) {

			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link)) {

				echo json_encode(array('code'=>2003,'msg'=>'<p>请填写正确的链接</p>'));
				return false;
			}

		}

		$proname = $this->input->post('proname', true);
		$type1 = $this->input->post('type1', true);
		$type2 = $this->input->post('type2', true);
		// $type3 = $this->input->post('type3', true);
		$color = $this->input->post('color', true);
		$colors = $this->input->post('colors', true);
		$price = $this->input->post('price', true);
		$material = $this->input->post('material', true);
		$size = $this->input->post('size', true);
		$model = $this->input->post('model', true);
		$desc = $this->input->post('desc', true);
		$libid = $this->input->post('libid', true); // 项目id
		$proid = $this->input->post('proid', true); // 子项目id
		$x_word = trim($this->input->post('x_word', true)); 
		$y_word = trim($this->input->post('y_word', true)); 
		if(empty($x_word) && empty($y_word)) {
			echo json_encode(array('code'=>2003,'msg'=>'<p>简洁、繁复、抽象、具象至少选择一项</p>'));
			return false;
		}

		// 上传产品图片
		$image = trim($this->input->post('image', true));
		if(empty($image)) {
			$res = $this->uploadImage('fileUpload');
			if($res['code'] != 200) {
				echo json_encode($res);
				return false;
			}
			$image = $res['msg'];
		}

		$typeArr1 = $this->config->item('product_type');
		$type1 = array_search($type1, $typeArr1);
		$typeArr2 = $this->config->item('product_function_'.$type1);
		$type2 = array_search($type2, $typeArr2);

		$x_index = '0';
		if($x_word == '简洁') {
			$x_index = '-5';
		}
		if($x_word == '繁复') {
			$x_index = '5';
		}

		$y_index = '0';
		if($y_word == '具象') {
			$y_index = '-5';
		}
		if($y_word == '抽象') {
			$y_index = '5';
		}

		// 入库
		$this->db->trans_begin();
		$data = array(
			'userid' => $this->user->userid,
			'libid' => $libid,
			'proname' => $proname,
			'smallpic' => $image,
			'bigpic' => $image,
			'type1' => $type1,
			'type2' => $type2,
			'x_index' => $x_index,
			'y_index' => $y_index,
			'color' => $color,
			'colors' => $colors,
			'price' => $price,
			'link' => $link,
			'material' => $material,
			'size' => $size,
			'model' => $model,
			'desc'=>$desc,
			'addtime' => date('Y-m-d H:i:s')
		);

		$proid2 = $this->member_model->addData('lz_product', $data);
		if(empty($proid2)){

			echo json_encode(array('code'=>2005,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		if(!empty($proid)) {

			//添加lz_project_product
			$sid = $this->addProjectProduct($proid,$proid2);
			if(empty($sid)){
				$this->db->trans_rollback();
				echo json_encode(array('code'=>2006,'msg'=>'<p>添加失败</p>'));
				return false;

			}

		}

		//修改我的产品数量
		$where = array('userid'=>$this->user->userid,'oproid'=>0);
		$fieldArr = array('productcount'=>' + 1');
		//每日添加的前5个采集可以获得5个积分
		$res = $this->member_model->getAddCountByToDay('lz_product', 'addtime', $where);
		if($res['count'] <= 5) {

			$fieldArr = array('productcount'=>' + 1','point'=>' + 5');
			//添加积分明细记录
			$data = array('userid'=>$this->user->userid, 'action'=>'添加产品', 'point'=>5,'addtime' => date('Y-m-d H:i:s'));
			$pointLogId = $this->member_model->addData('lz_point_log', $data);
			if(empty($pointLogId)) {
				$this->db->trans_rollback();
				echo json_encode(array('code'=>2007,'msg'=>'<p>添加失败</p>'));
				return false;

			}

		}

		$row = $this->member_model->changeField('lz_user', $fieldArr, array('userid'=>$this->user->userid));
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2008,'msg'=>'<p>添加失败</p>'));
			return false;

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_product($proid2);
		if(empty($row)){

			echo json_encode(array('code'=>2009,'msg'=>'<p>添加redis失败, 请联系管理员</p>'));
			return false;

		}

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2010,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'添加成功','proid'=>$proid2));


	}

	/**
	 * 笔记
	 */
	public function note() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$note = $this->member_model->get_note($userid, $p, $seachWord);
		$this->getUserInfoData($userid);
		$userId = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$p++;
		$this->assign('p', $p);
		$this->assign('userId', $userId);
		$this->assign('seachWord', $seachWord);
		$this->assign('note', $note);
		$this->display('member/member.note.html');

	}

	/**
	 * 收藏的笔记
	*/
	public function follownote() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$note = $this->member_model->get_follow_note($userid, $p, $seachWord);
		$this->getUserInfoData($userid);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('note', $note);
		$this->display('member/member.follownote.html');

	}

	/**
	 * 关注的人
	 */
	public function follow() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$follow = $this->member_model->get_follow($userid, $p, $seachWord);
		$this->getUserInfoData($userid);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('follow', $follow);
		$this->display('member/member.follow.html');

	}

	/**
	 * 粉丝
	 */
	public function fans() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$fans = $this->member_model->get_fans($userid, $p, $seachWord);
		$this->getUserInfoData($userid);
		// var_dump($fans);

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('fans', $fans);
		$this->display('member/member.fans.html');

	}

	/**
	 * 设置用户风格1
	 */
	public function settag1() {

		$this->display('member/member.settag1.html');

	}

	/**
	 * 设置用户风格2
	 */
	public function settag2() {

		$this->display('member/member.settag2.html');

	}


	/**
	 * 查询用户地址
	*/
	private function getUserAddress($countyId) {
		//查找出用户的具体地址
		$city = '';
		$area = '';
		$county = '';
		$address = '';

		$this->load->model('account_model');
		$where = array('code'=>$countyId);
		$myCounty = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
		$areaId = $myCounty['parentid'];
		if(!empty($areaId)) {

			$where = array('code'=>$areaId);
			$myArea = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
			$cityId = $myArea['parentid'];
			$area = $myArea['name'];

			if(!empty($cityId)) {

				$where = array('code'=>$cityId);
				$myCity = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
				$city = $myCity['name'];
			}

			$county = $myCounty['name'];

		}else{

			$city = $myCounty['name'];
		}

		$address = $city.$county;
		return $address;

	}

	/**
	 * 查询当前操作的项目
	*/
	public function getlibraryInfo() {

		$libid = (int) $this->input->post('libid');

		if(empty($libid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array('libid'=>$libid);
		$data = $this->member_model->getData('lz_library','*', $where);

		$type1 = '';
		$typeArr1 = $this->config->item('library_type');
		if(array_key_exists($data['type1'],$typeArr1)) {

			$type1 = $typeArr1[$data['type1']];
		}

		$result = $data;
		$result['type1'] = $type1;

		//查找出用户的具体地址
		$cityCode = '';
		$areayCode = '';
		$countyCode = '';
		$this->load->model('account_model');

		$countyId = $data['city'];
		$where = array('code'=>$countyId);
		$myCounty = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
		$areaId = $myCounty['parentid'];
		if(!empty($areaId)) {

			$where = array('code'=>$areaId);
			$myadd = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
			$addId = $myadd['parentid'];
			$addCode = $myadd['code'];

			if(!empty($addId)) {

			$where = array('code'=>$addId);
			$myadd2 = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
			$addId2 = $myadd2['parentid'];
			$addCode2 = $myadd2['code'];

			$cityCode = $addId;
			$areayCode = $areaId;
			$countyCode = $countyId;

			}else{

				$cityCode = $addCode;
				$areayCode = $countyId;
			}

		}else{

			$cityCode = $myCounty['code'];//shanghai

		}

		$result['cityCode'] = $cityCode;
		$result['areayCode'] = $areayCode;
		$result['countyCode'] = $countyCode;
		// var_dump($result);
		echo json_encode(array('code'=>200,'msg'=>$result));

	}

	/**
	 *  编辑材思库
	 */
	public function editLibrary() {

			$this->form_validation->set_rules('libname', '名称', 'trim|required');
			$this->form_validation->set_rules('type1', '分类', 'trim|required');

			if ($this->form_validation->run() === false) {

				$error_msg = validation_errors();
				echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
				return;

			}

			//判断是否重复命名
			$libname = $this->input->post('libname', true);
			$libid = $this->input->post('libid', true);
			// $noWhere = array('libid'=>$libid);
			// $where = array('libname'=>$libname,'userid'=>$this->user->userid,'isdel'=>0);
			// $res = $this->member_model->select_fieldVal_exit('lz_library',$noWhere,$where);
			// if(!empty($res)) {
			// 	$error_msg = '<p>该名称的项目已存在，请重新修改</p>';
			// 	echo json_encode(array('code'=>2002,'msg'=>$error_msg));
			// 	return;
			// }

			$address = $this->input->post('address', true);
			$type1 = $this->input->post('type1', true);
			$status = $this->input->post('status', true);
			$isshow = $this->input->post('isshow', true);
			$desc = $this->input->post('desc', true);

			$typeArr1 = $this->config->item('library_type');
			$type1 = array_search($type1, $typeArr1);

			if($status == '设计中') {
				$status = 1;
			}else if($status == '生产中') {
				$status = 2;
			}else if($status == '已完成'){
				$status = 3;
			}

			//获取城市
			$province = $this->input->post('province', true);
			$quyu = $this->input->post('quyu', true);
			$county = $this->input->post('county', true);
			// if(!empty($quyu) && empty($county)) {
			// 	echo json_encode(array('code'=>2002,'msg'=>'<p>请选择完整的地点</p>'));
			// 	return false;
			// }
			$city = '';
			if(!empty($county)){
				$city = $county;
			}

			if(!empty($province) && !empty($quyu) && empty($county)){
				$city = $quyu;
			}

			if(!empty($province) && empty($county) && empty($quyu)){
				$city = $province;
			}

			// 入库
			$data = array(
				'libname' => $libname,
				'type1' => $type1,
				'address' => $address,
				'city' => $city,
				'status' => $status,
				'isshow' => $isshow,
				'desc' => $desc
			);

			// 上传产品图片
			if(!empty($_FILES['pic']['name'])) {

				$res = $this->uploadImage('pic');
				if($res['code'] != 200) {
					echo json_encode($res);
					return false;
				}
				$data['cover'] = $res['msg'];

			}

			$where = array('libid'=>$libid);
			$row = $this->member_model->edit_table('lz_library', $where, $data);
			if(empty($row)){

				echo json_encode(array('code'=>2003,'msg'=>'<p>修改失败</p>'));
				return;

			}

			$row = $this->redis_model->set_library($libid);
			if(empty($row)){

				echo json_encode(array('code'=>2004,'msg'=>'<p>修改redis失败,请联系管理员</p>'));
				return;
			}

			echo json_encode(array('code'=>200,'msg'=>'修改成功'));


	}

	/**
	 * 删除材思库
	 */
	public function delLibrary() {

		$libid = (int) $this->input->post('libid');
		if(empty($libid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array('libid'=>$libid);
		$data = array('isdel'=>1);
		$row = $this->member_model->edit_table('lz_library', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2002,'msg'=>'删除失败'));
			return;

		}

		$where = array('libid'=>$libid,'isdel'=>0);
		//查询材思库里的项目数量
		$res = $this->member_model->getTableCount('lz_project', $where);
		$count = $res['count'];
		//删除材思库里的项目
		if(!empty($count)){

			$row = $this->member_model->edit_table('lz_project', $where, $data);
			if ($row != $count) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2004,'msg'=>'删除失败'));
				return;

			}

		}

		//删除子项目下的产品(暂时无需删除)

		//修改用户的材思库数量和产品采集数量
		$userid = $this->user->userid;
		$where = array('userid' => $userid);
		$fieldArr = array('librarycount'=>' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'删除失败'));
			return;

		}

		$this->db->trans_commit();

		//修改缓存或删除缓存
		$row = $this->redis_model->set_user($userid);
		if($row != 200) {
			echo json_encode(array('code'=>'2006','msg'=>'修改缓存失败，请联系管理员'));
			return;
		}

		$redis_key = 'libid_'.$libid;
		$res = $this->redis_model->clearCache($redis_key,6);
		if($res['code'] != 200) {
			echo json_encode($res);
			return;
		}


		//删除产品的缓存，删除多个产品的缓存
		$where = array('libid' => $libid);
		$res = $this->batchDelCache('lz_project',$where,8);
		echo json_encode($res);

	}

	//批量删除redis
	private function batchDelCache($table,$where,$slice) {

		$res = array('code'=>200);
		$arr = $this->member_model->getTableData($table, 'proid', $where, 'proid asc');
		foreach ($arr as $k => $v) {
			$proid = $v['proid'];
			$redis_key = 'proid_'.$proid;
			$res = $this->redis_model->clearCache($redis_key, $slice);
			if($res['code'] != 200) {

				break;
			}

		}

		return $res;

	}



	/**
	 * 用户创建的区域列表页
	*/
	public function selflibrarytow() {

		$p = 0;
		$create = $this->input->get('create');
		$libid = (int)$this->uri->segment(3) ? $this->uri->segment(3) : redirect('/home'); // 产品id
		$userid = $this->uri->segment(4) ? $this->uri->segment(4) : $this->user->userid;

		$where = array('libid'=>$libid,'isdel'=>0);
		$data = $this->member_model->getData('lz_library','libid,libname,procount2,desc', $where);

		//分别查找20个子项目
		$library = $this->member_model->selflibrarytow($libid, $userid, $p);

		$where = array('userid'=>$userid);
		$userInfo = $this->member_model->getData('lz_user', '*', $where);

		$where['isdel'] = 0;
		$libraryList = $this->member_model->getTableData('lz_library', 'libid, libname', $where, 'libid desc');

		$p++;
		$this->assign('p',$p);
		$this->assign('create',$create);
		$this->assign('data',$data);
		$this->assign('library',$library);
		$this->assign('libraryList',$libraryList);
		$this->assign('userInfo',$userInfo);
		$this->assign('userid',$this->user->userid);
		$this->display('member/member.selflibrarytow.html');

	}

	//添加区域
	public function addProject() {

		$error_msg = '';
		$this->form_validation->set_rules('proname', '名称', 'trim|required');
		// $this->form_validation->set_rules('area', '编号', 'trim|required');
		$this->form_validation->set_rules('type1', '分类', 'trim|required');
		$this->form_validation->set_rules('type3', '功能', 'trim|required');
		$this->form_validation->set_rules('type2', '风格', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		$libid = $this->input->post('libid', true);
		$proname = $this->input->post('proname', true);
		// $where = array('libid'=>$libid,'proname'=>$proname);
		// $res = $this->member_model->select_fieldVal_exit('lz_project',array(),$where);
		// if(!empty($res)) {

		// 	echo json_encode(array('code'=>2002,'msg'=>'<p>该项目的子项目名称已存在，请重新添加</p>'));
		// 	return false;
		// }

		// $area = $this->input->post('area', true);
		// $where = array('libid'=>$libid,'area'=>$area);
		// $res = $this->member_model->select_fieldVal_exit('lz_project', array(), $where);
		// if(!empty($res)) {

		// 	echo json_encode(array('code'=>2002,'msg'=>'<p>该项目的区域名称已存在，请重新添加</p>'));
		// 	return false;
		// }

		// $res = $this->member_model->getData('lz_project', '*', $where);

		$where = array('isdel'=>0,'userid'=>$this->user->userid);
		$res = $this->member_model->getOneData('lz_project', 'area', $where, 'proid DESC', 0, 1);
		$area = $res['0']['area'];

		//查找最后添加的该项目的产品的编号
		$newArea = 'IF01';
		if($area != '') {

			$str = str_replace('IF',"",$area);
			$str++;

			if(strlen($str) == 1){
				$str = '0'.$str;
			}else{

			}
			$newArea = 'IF'.$str;
		}

		$type1 = $this->input->post('type1', true);
		$type2 = $this->input->post('type2', true);
		$type3 = $this->input->post('type3', true);
		$tag = $this->input->post('tag');
		$desc = $this->input->post('desc');

		// 上传产品图片
		$res = $this->uploadImage('cover');
		if($res['code'] != 200) {
			echo json_encode($res);
			return false;
		}
		$cover = $res['msg'];

		$typeArr1 = $this->config->item('library_type');
		$type1 = array_search($type1, $typeArr1);

		$typeArr2 = $this->config->item('style_type');
		$typeCoordinate = $typeArr2[$type2];
		$typeArr = explode(',', $typeCoordinate);
		$x_index = $typeArr[0];
		$y_index = $typeArr[1];

		$typeArr3 = $this->config->item('project_function_'.$type1);
		$type3 = array_search($type3, $typeArr3);

		// 入库
		$data = array(
			'oproid' => 0,
			'userid' => $this->user->userid,
			'libid' =>$libid,
			'proname' => $proname,
			// 'area' => $area,
			'area'=> $newArea,
			'cover' => $cover,
			'type1' => $type1,
			'x_index' => $x_index,
			'y_index' => $y_index,
			'type3' => $type3,
			'tag' => $tag,
			'desc'=> $desc,
			'status' => 1,
			'addtime' => date('Y-m-d H:i:s')
		);

		$res = $this->addProjectData($data,$libid);
		echo json_encode(array('code'=>$res['code'],'msg'=>'<p>'.$res['msg'].'</p>'));

	}

	//点击编辑子项目时，获取子项目详情
	public function getProjectInfo() {

		$proid = (int) $this->input->post('proid');
		if(empty($proid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array('proid'=>$proid);
		$data = $this->member_model->getData('lz_project','*', $where);

		$type1 = '';
		$type2 = '';
		$type3 = '';

		$typeArr1 = $this->config->item('library_type');

		if(array_key_exists($data['type1'],$typeArr1)) {

			$type1 = $typeArr1[$data['type1']];
		}

		// $typeArr2 = $this->config->item('collect_type2');
		// if(array_key_exists($data['type2'],$typeArr2)) {
		// 	$type2 = $typeArr2[$data['type2']];
		// }
		$typeArr2 = $this->config->item('style_type');
		$style = $data['x_index'].','.$data['y_index'];
		$type2 = array_search($style, $typeArr2);

		$typeArr3 = $this->config->item('project_function_'.$data['type1']);
		if(is_array($typeArr3)){
			if(array_key_exists($data['type3'],$typeArr3)) {

				$type3 = $typeArr3[$data['type3']];
			}

		}

		$result = $data;
		$result['type1'] = $type1;
		$result['type2'] = $type2;
		$result['type3'] = $type3;
		echo json_encode(array('code'=>200,'msg'=>$result));

	}


	//编辑区域
	public function editProject() {

		$this->form_validation->set_rules('proname', '子项目名称', 'trim|required');
		// $this->form_validation->set_rules('area', '编号', 'trim|required');
		$this->form_validation->set_rules('type1', '分类', 'trim|required');
		// $this->form_validation->set_rules('type2', '风格', 'trim|required');
		$this->form_validation->set_rules('type3', '功能', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return;

		}

		$proid = $this->input->post('proid', true);
		$proname = $this->input->post('proname', true);
		$res = $this->member_model->getData('lz_project', 'libid', array('proid'=>$proid));

		// $libid = $this->input->post('libid', true);
		// $where = array('libid'=>$res['libid'],'proname'=>$proname);
		// $res = $this->member_model->select_fieldVal_exit('lz_project', array('proid'=>$proid), $where);
		// if(!empty($res)) {

		// 	echo json_encode(array('code'=>2002,'msg'=>'<p>该项目的子项目名称已存在，请重新修改</p>'));
		// 	return false;
		// }

		// $area = $this->input->post('area', true);
		// $where = array('libid'=>$res['libid'],'area'=>$area,'isdel'=>0);
		// $res = $this->member_model->select_fieldVal_exit('lz_project', array('proid'=>$proid), $where);
		// if(!empty($res)) {

		// 	echo json_encode(array('code'=>2002,'msg'=>'<p>该项目的区域编号已存在，请重新修改</p>'));
		// 	return false;
		// }

		$type1 = $this->input->post('type1', true);
		// $type2 = $this->input->post('type2', true);
		$type3 = $this->input->post('type3', true);
		$status = $this->input->post('status', true);
		$isshow = $this->input->post('isshow', true);
		$desc = $this->input->post('desc', true);

		$typeArr1 = $this->config->item('library_type');
		$type1 = array_search($type1, $typeArr1);

		// $typeArr2 = $this->config->item('style_type');
		// $typeCoordinate = $typeArr2[$type2];
		// $typeArr = explode(',', $typeCoordinate);
		// $x_index = $typeArr[0];
		// $y_index = $typeArr[1];

		$typeArr3 = $this->config->item('project_function_'.$type1);
		$type3 = array_search($type3, $typeArr3);

		if($status == '设计中') {
			$status = 1;
		}else if($status == '生产中') {
			$status = 2;
		}else if($status == '已完成'){
			$status = 3;
		}

		// 入库
		$data = array(
			'proname'=>$proname,
			// 'area'=>$area,
			'type1' => $type1,
			// 'x_index' => $x_index,
			// 'y_index' => $y_index,
			// 'type2' => $type2,
			'type3' => $type3,
			'status' => $status,
			'isshow' => $isshow,
			'desc' => $desc
		);

		if(!empty($_FILES['pic']['name'])) {

			// 上传产品图片
			$res = $this->uploadImage('pic');
			if($res['code'] != 200) {
				echo json_encode($res);
				return false;
			}
			$data['cover'] = $res['msg'];
		}

		$where = array('proid'=>$proid);
		$row = $this->member_model->edit_table('lz_project', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2003,'msg'=>'<p>修改失败</p>'));
			return;

		}

		$row = $this->redis_model->set_project($proid);
		if(empty($row)){

			echo json_encode(array('code'=>2004,'msg'=>'<p>修改redis失败,请联系管理员</p>'));
			return;
		}

		echo json_encode(array('code'=>200,'msg'=>'修改成功'));

	}


	/**
	 * 删除区域
	 */
	public function delProject() {

		$proid = (int) $this->input->post('proid');
		$libid = (int) $this->input->post('libid');
		if(empty($proid) || empty($libid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array('proid'=>$proid);
		$data = array('isdel'=>1);
		$row = $this->member_model->edit_table('lz_project', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2002,'msg'=>'删除失败'));
			return;

		}

		//查询子项目里的产品，如果没删除，则把它删除
		// $productcount = 0;
		// $where = array('proid'=>$proid, 'isdel'=>0);
		// $res = $this->member_model->getTableCount('lz_project_product', $where);
		// $productcount = $res['count'];
		// if(!empty($productcount)) {

		// 	$count = $this->member_model->edit_table('lz_project_product', $where, $data);
		// 	if($count != $productcount) {

		// 		$this->db->trans_rollback();
		// 		echo json_encode(array('code'=>2003,'msg'=>'删除失败'));
		// 		return;

		// 	}

		// }

		//修改项目里的区域数量 -1
		$where = array('libid' => $libid);
		$fieldArr = array('procount2'=>' - 1 ');
		$row = $this->member_model->changeField('lz_library', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2006,'msg'=>'删除失败'));
			return;

		}

		$this->db->trans_commit();

		//删除缓存
		$redis_key = 'proid_'.$proid;
		$res = $this->redis_model->clearCache($redis_key,8);
		if($res['code'] != 200) {
			echo json_encode($res);
			return;
		}

		//修改材思库的redis
		$row = $this->redis_model->set_library($libid);
		if(empty($row)){

			echo json_encode(array('code'=>2006,'msg'=>'修改redis失败,请联系管理员'));
			return;
		}

		echo json_encode(array('code'=>200,'msg'=>'删除成功'));

	}

	//获取产品详情
	public function getProductInfo() {

		$proid = (int) $this->input->post('proid');
		if(empty($proid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array('proid'=>$proid);
		$data = $this->member_model->getData('lz_product','*', $where);

		$type1 = '';
		$type2 = '';
		$type3 = '';
		$typeArr1 = $this->config->item('product_type');
		if(array_key_exists($data['type1'],$typeArr1)) {

			$type1 = $typeArr1[$data['type1']];
		}

		$typeArr2 = $this->config->item('product_function_'.$data['type1']);
		if(is_array($typeArr2)){
			if(array_key_exists($data['type2'],$typeArr2)) {

				$type2 = $typeArr2[$data['type2']];
			}

		}

		$typeArr3 = $this->config->item('style_type');
		$style = $data['x_index'].','.$data['y_index'];
		$type3 = array_search($style, $typeArr3);

		$result = $data;
		$result['type1'] = $type1;
		$result['type2'] = $type2;
		$result['type3'] = $type3;
		$where = array('proid2'=>$proid);
		$project = $this->member_model->getData('lz_project_product','sid,proid', $where);
		$result['projectId'] = $project['proid'];
		$result['sid'] = $project['sid'];
		echo json_encode(array('code'=>200,'msg'=>$result));

	}

	//修改产品
	public function editProduct() {

		$this->form_validation->set_rules('proname', '品名', 'trim|required');
		$this->form_validation->set_rules('type1', '分类', 'trim|required');
		$this->form_validation->set_rules('type2', '功能', 'trim|required');
		// $this->form_validation->set_rules('type3', '风格', 'trim|required');
		// $this->form_validation->set_rules('proid', '项目', 'trim|required');
		$this->form_validation->set_rules('color', '颜色', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		$proname = $this->input->post('proname', true);
		$type1 = $this->input->post('type1', true);
		$type2 = $this->input->post('type2', true);
		// $type3 = $this->input->post('type3', true);
		$color = $this->input->post('color', true);
		$price = $this->input->post('price', true);
		$link = $this->input->post('link', true);
		$material = $this->input->post('material', true);
		$size = $this->input->post('size', true);
		$model = $this->input->post('model', true);
		$desc = $this->input->post('desc', true);
		$oldLibid = (int) $this->input->post('oldLibid', true); // 项目id
		$oldProid = (int) $this->input->post('oldProid', true); // 子项目id
		$libid = $this->input->post('libid', true); // 项目id
		$proid = $this->input->post('proid', true); // 子项目id
		$colors = $this->input->post('colors', true);

		if(!empty($link)) {

			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link)) {

				echo json_encode(array('code'=>2003,'msg'=>'<p>请填写正确的链接</p>'));
				return;

			}

		}

		if(!empty($_FILES)) {

			// 上传产品图片
			$res = $this->uploadImage('fileUpload');
			if($res['code'] != 200) {
				echo json_encode($res);
				return false;
			}
			$image = $res['msg'];
		}

		$typeArr1 = $this->config->item('product_type');
		$type1 = array_search($type1, $typeArr1);
		$typeArr2 = $this->config->item('product_function_'.$type1);
		$type2 = array_search($type2, $typeArr2);

		// $typeArr3 = $this->config->item('style_type');
		// $typeCoordinate = $typeArr3[$type3];
		// $typeArr = explode(',', $typeCoordinate);
		// $x_index = $typeArr[0];
		// $y_index = $typeArr[1];

		// 入库
		$productId = $this->input->post('productId');
		$data = array(
			'proid'=>$productId,
			'oproid'=>0,
			'libid' => $libid,
			'proname' => $proname,
			'type1' => $type1,
			'type2' => $type2,
			// 'x_index' => $x_index,
			// 'y_index' => $y_index,
			'color' => $color,
			'colors' => $colors,
			'price' => $price,
			'link' => $link,
			'material' => $material,
			'size' => $size,
			'model' => $model,
			'desc'=>$desc
		);

		if(!empty($_FILES)){
			$data['smallpic'] = $image;
			$data['bigpic'] = $image;
		}

		$res = $this->member_model->getData('lz_product', '*', $data);

		$this->db->trans_begin();
		if(empty($res)) { //说明修改了其他的东西

			$where = array('proid'=>$productId);
			unset($data['proid']);
			$row = $this->member_model->edit_table('lz_product', $where, $data);
			if(empty($row)){

				echo json_encode(array('code'=>2005,'msg'=>'<p>修改失败</p>'));
				return false;

			}

		}

		if($oldProid != $proid) {

			$sid = $this->input->post('sid');
			$where = array('sid'=>$sid);
			$pPdata = $this->member_model->select_fieldVal_exit('lz_project_product',array(),$where,0,1,'sid desc');
			if(!empty($pPdata)) {
				$row = $this->member_model->edit_table('lz_project_product', $where, array('proid'=>$proid));
			}else{

				// $project = $this->member_model->select_fieldVal_exit('lz_project',array(),array('proid'=>$proid),0,1);
				// $area = $project['area'];
				// $newPpcode = '';
				// if($area != '') {

				// 	$projectProdut = $this->member_model->select_fieldVal_exit('lz_project_product',array(),array('proid'=>$proid),0,1,'sid desc');
				// 	if(!empty($projectProdut)) {

				// 		$newPpcode = $area.'001';
				// 		if($projectProdut['ppcode'] != '') {

				// 			$ppcode = $projectProdut['ppcode'];
				// 			$str = str_replace($area,"",$ppcode);
				// 			$str++;

				// 			if(strlen($str) == 1){
				// 				$str = '00'.$str;
				// 			}elseif(strlen($str) == 2){
				// 				$str = '0'.$str;
				// 			}else{

				// 			}
				// 			$newPpcode = $area.$str;
				// 		}

				// 	}
				// }
				// $data = array('fid'=>0,'proid'=>$proid,'proid2'=>$productId, 'ppcode'=>$newPpcode,'addtime'=>date('Y-m-d H:i:s'));
				// $row = $this->member_model->addData('lz_project_product', $data);

				$row = $this->addProjectProduct($proid,$productId);

			}

			if(empty($row)){

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2006,'msg'=>'<p>修改失败</p>'));
				return false;

			}

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_product($productId);
		if(empty($row)){

			echo json_encode(array('code'=>2008,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'<p>修改成功</p>'));

	}

	//删除产品
	function deleteProduct() {

		$proid = (int) $this->input->post('proid');
		if(empty($proid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array('proid'=>$proid);
		$data = array('isdel'=>1);
		$row = $this->member_model->edit_table('lz_product', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2002,'msg'=>'修改失败'));
			return false;

		}

		//修改lz_project_product的状态
		$where1 = array('proid2'=>$proid,'isdel'=>0);
		$res = $this->member_model->getTableCount('lz_project_product', $where1);
		$sidCount = $res['count'];
		if(!empty($sidCount)) {

			$count = $this->member_model->edit_table('lz_project_product', $where1, $data);
			if($count != $sidCount) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2003,'msg'=>'删除失败'));
				return false;

			}

		}

		//修改用户的产品采集数量
		$where = array('userid' => $this->user->userid);
		$fieldArr = array('productcount'=>' -1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'删除失败'));
			return false;

		}

		$this->db->trans_commit();

		//修改缓存或删除缓存
		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)) {
			echo json_encode(array('code'=>'2006','修改redis失败，请联系管理员'));
			return false;
		}

		$redis_key = 'proid_'.$proid;
		$res = $this->redis_model->clearCache($redis_key,7);
		echo json_encode($res);

	}

	//取消关注人、品牌
	public function cancelFollow() {

		$userid = (int) $this->input->post('userid');
		if(empty($userid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array(
			'userid'=>$this->user->userid,
			'followtype'=>4,
			'followid'=>$userid
		);

		$row = $this->member_model->deleteData('lz_user_follow', $where);
		if(empty($row)) {

			echo json_encode(array('code'=>2002,'msg'=>'取消关注失败'));
			return false;

		}

		//我的关注数减1
		$where = array('userid'=>$this->user->userid);
		$fieldArr = array('followcount'=>' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2003,'msg'=>'取消关注失败'));
			return false;

		}

		//别人的粉丝数减1
		$where = array('userid'=>$userid);//当前session的用户
		$fieldArr = array('fanscount'=>' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2004,'msg'=>'取消关注失败'));
			return false;

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2005,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		$row = $this->redis_model->set_user($userid);
		if(empty($row)){

			echo json_encode(array('code'=>2006,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'取消关注成功'));

	}

	//关注人、品牌
	public function addFollow() {

		$userid = (int) $this->input->post('userid');
		if(empty($userid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$data = array(
			'userid'=>$this->user->userid,
			'followtype' =>4,
			'followid'=>$userid
		);

		//查询是否已关注该粉丝
		$res = $this->member_model->getData('lz_user_follow','*', $data);
		if(!empty($res)) {

			echo json_encode(array('code'=>2002,'msg'=>'已关注该用户，请不要重复关注'));
			return false;

		}

		$data['followtime'] = date('Y-m-d H:i:s');
		$insertId = $this->member_model->addData('lz_user_follow', $data);
		if(empty($insertId)) {

			echo json_encode(array('code'=>2003,'msg'=>'关注失败'));
			return false;

		}

		//该用户的关注数增加1
		$where = array('userid'=>$this->user->userid);//当前session的用户
		$fieldArr = array('followcount'=>' + 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2004,'msg'=>'关注失败'));
			return false;
		}

		$where = array('userid'=>$userid);//当前session的用户
		$fieldArr = array('fanscount'=>' + 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'关注失败'));
			return false;
		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2006,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		$row = $this->redis_model->set_user($userid);
		if(empty($row)){

			echo json_encode(array('code'=>2007,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'关注成功'));

	}


	//移除粉丝
	public function cancelFan() {

		$userid = (int) $this->input->post('userid');
		if(empty($userid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array(
			'userid'=>$userid,
			'followtype'=>4,
			'followid'=>$this->user->userid
		);

		$row = $this->member_model->deleteData('lz_user_follow', $where);
		if(empty($row)) {

			echo json_encode(array('code'=>2002,'msg'=>'删除粉丝失败'));
			return false;

		}

		//别人的关注数减1
		$where = array('userid'=>$userid);//当前session的用户
		$fieldArr = array('followcount' => ' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2003,'msg'=>'删除粉丝失败'));
			return false;

		}

		//我的粉丝数减1
		$where = array('userid'=>$this->user->userid);//当前session的用户
		$fieldArr = array('fanscount' => ' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2004,'msg'=>'删除粉丝失败'));
			return false;

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2005,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		$row = $this->redis_model->set_user($userid);
		if(empty($row)){

			echo json_encode(array('code'=>2006,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'删除粉丝成功'));

	}

	//发布笔记 正文文字的name为text_1, text_2... 正文图片的name为image_1, image_2...
	public function addNote() {

		$this->form_validation->set_rules('notename', '标题', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		//上传封面代码
		if(empty($_FILES)) {

			echo json_encode(array('code'=>2002,'msg'=>'<p>请上传封面</p>'));
			return false;

		}

		$res = $this->uploadImage('cover');
		if($res['code'] != 200) {
			echo json_encode($res);
			return false;
		}
		$cover = $res['msg'];

		//重组内容
		$content = '';
		$shortdesc = '';
		$keyArr = array_keys($_POST);
		foreach ($keyArr as $k => $v) {

			$keyArr1 = explode('_', $v);
			if($keyArr1['0'] == 'text') {

				if($keyArr1['1'] == 1) {
					$shortdesc = $_POST[$v];
				}
				$content[$keyArr1['1']] = $_POST[$v];

			}

			continue;

		}

		$keyArr = array_keys($_FILES);
		foreach ($keyArr as $k => $v) {
			$keyArr1 = explode('_', $v);
			if($keyArr1['0'] == 'image') {

				//上传图片，返回图片路径$images
				$res = $this->uploadImage($v);
				if($res['code'] != 200) {
					echo json_encode($res);
					return false;
				}

				$images = '<img src="'.$res['msg'].'">';
				$content[$keyArr1['1']] = $images;

			}

			continue;

		}

		if(empty($content)) {

			echo json_encode(array('code'=>2003,'msg'=>'<p>请添加内容</p>'));
			return false;

		}

		$this->db->trans_begin();
		$notename = $this->input->post('notename',true);
		ksort($content);
		$content = json_encode($content);
		$isshowcover = $this->input->post('isshowcover') ? $this->input->post('isshowcover') : 0;
		$data = array(
			'userid'=>$this->user->userid,
			'notename'=>$notename,
			'shortdesc'=>$shortdesc,
			'content'=>$content,
			'cover'=>$cover,
			'isshowcover'=>$isshowcover,
			'addtime'=>date('Y-m-d H:i:s')
		);
		$noteid = $this->member_model->addData('lz_note', $data);
		if(empty($noteid)) {

			echo json_encode(array('code'=>2004,'msg'=>'<p>发布笔记失败</p>'));
			return false;

		}

		//修改我的笔记数
		$where = array('userid'=>$this->user->userid, 'stype'=>3);
		$fieldArr = array('notecount'=>' + 1');
		//每日添加的前5篇笔记可以获得5个积分
		$res = $this->member_model->getAddCountByToDay('lz_log_point', 'addtime', $where);
		if($res['count'] < 5) {
			$fieldArr = array('notecount'=>' + 1','point'=>' + 5');
			//添加积分明细记录
			$data = array('userid'=>$this->user->userid, 'action'=>'添加笔记', 'point'=>5, 'addtime'=>date('Y-m-d H:i:s'));
			$pointLogId = $this->member_model->addData('lz_point_log', $data);
			if(empty($pointLogId)) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2005,'msg'=>'<p>发布笔记失败</p>'));
				return false;

			}

			//添加lz_log_point
			$data = array('userid'=>$this->user->userid, 'stype'=>3, 'sid'=>$noteid, 'point'=>5,'addtime'=>date('Y-m-d H:i:s'));
			$pointLogId = $this->member_model->addData('lz_log_point', $data);
			if(empty($pointLogId)) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2006,'msg'=>'<p>发布笔记失败</p>'));
				return false;

			}

		}
		$where = array('userid'=>$this->user->userid);
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2007,'msg'=>'<p>发布笔记失败</p>'));
			return false;

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_note($noteid);
		if(empty($row)){

			echo json_encode(array('code'=>2006,'msg'=>'<p>添加redis失败, 请联系管理员</p>'));
			return false;

		}

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2007,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'<p>发布笔记成功</p>'));

	}

	/**
	 * 查询当前操作的笔记
	*/
	public function getNoteInfo() {

		$noteid = (int) $this->input->post('noteid');

		if(empty($noteid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array('noteid'=>$noteid);
		$data = $this->member_model->getData('lz_note','*', $where);

		echo json_encode(array('code'=>200,'msg'=>$data));

	}

	/**
	 *  修改笔记
	 */
	public function editNote() {

		$this->form_validation->set_rules('notename', '标题', 'trim|required');

		if ($this->form_validation->run() === false) {

			$error_msg = validation_errors();
			echo json_encode(array('code'=>2001,'msg'=>'<p>'.$error_msg.'</p>'));
			return false;

		}

		$isshowcover = $this->input->post('isshowcover') ? $this->input->post('isshowcover') : 0;

		//上传封面代码
		if($this->input->post('coverBg') != 1) {
			echo json_encode(array('code'=>2002,'msg'=>'<p>请上传封面图</p>'));
			return false;
		}
		if(!empty($_FILES['cover'])) {
			$res = $this->uploadImage('cover');
			if($res['code'] != 200) {
				echo json_encode($res);
				return false;
			}
			$cover = $res['msg'];
		}

		//重组内容
		$content = '';
		$keyArr = array_keys($_POST);
		$shortdesc = '';
		foreach ($keyArr as $k => $v) {

			$keyArr1 = explode('_', $v);
			if($keyArr1['0'] == 'text') {

				$content[$keyArr1['1']] = $_POST[$v];

				if($keyArr1['1'] == 1) {
					$shortdesc = $_POST[$v];
				}

			}

			if($keyArr1['0'] == 'image') {
				$content[$keyArr1['1']] = '<img src="'.$_POST[$v].'">';
			}

			continue;

		}


		$keyArr = array_keys($_FILES);
		foreach ($keyArr as $k => $v) {

			$keyArr1 = explode('_', $v);
			if($keyArr1['0'] == 'image') {

				//上传图片，返回图片路径$images
				$res = $this->uploadImage($v);
				if($res['code'] != 200) {
					echo json_encode($res);
					return false;
				}

				$images = $res['msg'];
				$content[$keyArr1['1']] = '<img src="'.$images.'">';

			}

			continue;

		}

		if(empty($content)) {

			echo json_encode(array('code'=>2003,'msg'=>'<p>请添加内容</p>'));
			return false;

		}

		// 入库
		$noteid = $this->input->post('noteid',true);
		$notename = $this->input->post('notename',true);
		ksort($content);
		$content = json_encode($content);
		$data = array(
			'notename'=>$notename,
			'shortdesc'=>$shortdesc,
			'content'=>$content,
			'isshowcover'=>$isshowcover
		);
		if(!empty($_FILES['cover'])) {
			$data['cover'] = $cover;
		}
		$where = array('noteid'=>$noteid);
		$row = $this->member_model->edit_table('lz_note', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2002,'msg'=>'<p>修改失败</p>'));
			return;

		}

		$row = $this->redis_model->set_note($noteid);
		if(empty($row)){

			echo json_encode(array('code'=>2003,'msg'=>'<p>修改redis失败,请联系管理员</p>'));
			return;
		}

		echo json_encode(array('code'=>200,'msg'=>'修改成功'));

	}


	//删除笔记
	public function delNote() {

		$noteid = (int) $this->input->post('noteid');
		if(empty($noteid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$this->db->trans_begin();
		$where = array('noteid'=>$noteid);
		$data = array('isdel'=>1);
		$row = $this->member_model->edit_table('lz_note', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2002,'msg'=>'删除失败'));
			return false;

		}

		//修改用户的材思库数量和产品采集数量
		$userid = $this->user->userid;
		$where = array('userid' => $userid);
		$fieldArr = array('notecount'=>' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'删除失败'));
			return false;

		}

		$this->db->trans_commit();

		//修改缓存或删除缓存
		$row = $this->redis_model->set_user($userid);
		if(empty($row)) {

			echo json_encode(array('code'=>'2006','修改redis失败，请联系管理员'));
			return false;

		}

		$redis_key = 'noteid_'.$noteid;
		$res = $this->redis_model->clearCache($redis_key,9);
		echo json_encode($res);

	}


	//上传图片并验证
	public function uploadImage($field) {

		// 上传产品图片
		$dir = 'static/upload/temp/'.date('Ymd').'/';
		if(!is_dir($dir)) mkdir($dir, 0777, true);

		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($field)) {

			$error_msg = $this->upload->display_errors();
			return array('code'=>2002,'msg'=>$error_msg);

		} else {

			// 上传成功 && 上传OSS
			$pic = $this->upload->data();
			$this->load->library('CI_OSS');
			$bucket = 'lingzan';
			$object = 'picture/'.date('Ymd').'/'.md5(uniqid(rand())).$pic['file_ext'];
			$file = $pic['full_path'];
			$res = $this->ci_oss->uploadFile($bucket, $object, $file);
			$pic_url = $res['oss-request-url'];

			try {

				$this->load->library('CI_Scan');
				$data = $this->ci_scan->imageSyncScan($pic_url);
				foreach ($data->data as $key => $value) {

					foreach ($value->results as $k => $v) {

						if($v->suggestion != 'pass') {

							return array('code'=>2003,'msg'=>'<p>图片违规</p>');

						}

					}

				}

			} catch (Exception $e) {

				return array('code'=>2004,'msg'=>'<p>系统错误</p>');

			}

		}

		return array('code'=>200,'msg'=>$pic_url);

	}

	//点赞文章
	public function fabulous() {

		$noteid = (int) $this->input->post('noteid');
		if(empty($noteid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array('noteid' => $noteid);
		$fieldArr = array('zancount'=>' + 1 ');
		$row = $this->member_model->changeField('lz_note', $fieldArr, $where);
		if (empty($row)) {

			echo json_encode(array('code'=>2005,'msg'=>'点赞失败'));
			return false;

		}

		$row = $this->redis_model->set_note($noteid);
		if(empty($row)){

			echo json_encode(array('code'=>2003,'msg'=>'修改redis失败,请联系管理员'));
			return false;
		}

		echo json_encode(array('code'=>200,'msg'=>'点赞成功'));

	}

	//采集产品时添加子项目
	function add_project() {

		$proname = trim($this->input->post('proname'));
		$libid = (int) $this->input->post('libid');
		if(empty($libid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;
		}
		if(empty($proname)) {

			echo json_encode(array('code'=>2002,'msg'=>'请填写区域名称'));
			return false;
		}

		$where = array('libid'=>$libid,'proname'=>$proname);
		$project = $this->member_model->getData('lz_project', 'proid', $where);
		if(!empty($project)) {

			echo json_encode(array('code'=>2003,'msg'=>'请区域名称已存在，请勿重复添加'));
			return false;
		}

		$where = array('isdel'=>0,'userid'=>$this->user->userid);
		$res = $this->member_model->getOneData('lz_project', 'area', $where, 'proid DESC', 0, 1);
		$area = $res['0']['area'];

		//查找最后添加的该项目的产品的编号
		$newArea = 'IF01';
		if($area != '') {

			$str = str_replace('IF',"",$area);
			$str++;

			if(strlen($str) == 1){
				$str = '0'.$str;
			}else{

			}
			$newArea = 'IF'.$str;
		}

		$data = array(
			'oproid'=>0,
			'userid'=>$this->user->userid,
			'libid'=>$libid,
			'area'=>$newArea,
			'proname'=>$proname,
			'status'=>1,
			'addtime'=>date('Y-m-d H:i:s')
		);

		echo json_encode($this->addProjectData($data,$libid));

	}

	//添加区域
	function addProjectData($data,$libid) {

		$this->db->trans_begin();
		$proid = $this->member_model->addData('lz_project',$data);
		if(empty($proid)){

			return array('code'=>2005,'msg'=>'添加失败');

		}

		//修改项目的区域数量 +1
		$where = array('libid'=>$libid);
		$fieldArr = array('procount2'=> ' +1 ');
		$row = $this->member_model->changeField('lz_library', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			return array('code'=>2006,'msg'=>'添加失败');

		}

		$data = array(
			'proid' => $proid,
			'userid' => $this->user->userid,
			'groupid' =>10,
			'permissions'=>'1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',
			'addtime' => date('Y-m-d H:i:s')
		);
		$row = $this->member_model->addData('lz_project_member', $data);
		if(empty($row)){

			$this->db->trans_rollback();
			return array('code'=>2007,'msg'=>'添加失败');

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_project($proid);
		if(empty($row)){

			return array('code'=>2008,'msg'=>'添加redis失败, 请联系管理员');

		}

		$row = $this->redis_model->set_library($libid);
		if(empty($row)){

			return array('code'=>2009,'msg'=>'修改redis失败, 请联系管理员');

		}

		return array('code'=>200,'msg'=>$proid);

	}

	//采集产品到子项目
	public function add_product() {

		$libid = (int) $this->input->post('libid');
		$proid = (int) $this->input->post('proid');
		$productId = (int) $this->input->post('productId');
		$ppname = trim($this->input->post('ppname'));

		if(empty($libid) || empty($proid)) {
			echo json_encode(array('code'=>2001,'msg'=>'<p>请选择项目</p>'));
			return;
		}

		//获取采集数据的其他相关信息
		$where = array('userid'=>$this->user->userid);
		$user = $this->member_model->getData('lz_user', 'x_index,y_index,productcount', $where);
		$x_index1 = $user['x_index'];
		$y_index1 = $user['y_index'];
		$productcount = $user['productcount'] + 1;

		$where = array('proid'=>$productId);
		$product = $this->member_model->getData('lz_product', '*', $where);
		$x_index0 = $product['x_index'];
		$y_index0 = $product['y_index'];

		// Xb'=Xb+INT((Xa-Xb)*100)/100/(Nb+5); Yb'=Yb+INT((Ya-Yb)*100)/100/(Nb+5);
		$x_index2 = $x_index0 + floor(($x_index1-$x_index0)*100)/100/($productcount+1);
		$y_index2 = $y_index0 + floor(($y_index1-$y_index0)*100)/100/($productcount+1);
		$result = array(
			'x_index'=>$x_index2,
			'y_index'=>$y_index2
		);

		$row = $this->member_model->edit_table('lz_product', $where, $result);
		// if(empty($row)){

			// echo json_encode(array('code'=>2002,'msg'=>'<p>采集失败</p>'));
			// return false;

		// }

		$data = $product;
		unset($data['proid']);
		$data['oproid'] = $product['proid'];
		$data['userid'] = $this->user->userid;
		$data['libid'] = $libid;
		$data['commentcount'] = 0;
		$data['zancount'] = 0;
		$data['addtime'] = date('Y-m-d H:i:s');
		$data['updatetime'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();
		$proid2 = $this->member_model->addData('lz_product', $data);
		if(empty($proid2)){

			echo json_encode(array('code'=>2003,'msg'=>'<p>采集失败</p>'));
			return;

		}

		$data = array(
			'proid'=>$proid,
			'proid2'=>$proid2,
			'ppname'=>$ppname,
			'addtime'=>date('Y-m-d H:i:s')
		);
		$sid = $this->member_model->addData('lz_project_product', $data);
		if(empty($sid)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2004,'msg'=>'<p>采集失败</p>'));
			return;

		}

		//修改用户产品数量 +1
		// Xa'=Xa+INT((Xb-Xa)*100)/100/(N+1); Ya'=Ya+INT((Yb-Ya)*100)/100/(N+1);
		$x_index2 = $x_index1 + floor(($x_index0-$x_index1)*100)/100/($productcount+1);
		$y_index2 = $y_index1 + floor(($y_index0-$y_index1)*100)/100/($productcount+1);
		$row = $this->member_model->changeData($x_index2, $y_index2);
		// if (empty($row)) {

		// 	$this->db->trans_rollback();
		// 	echo json_encode(array('code'=>2005,'msg'=>'<p>采集失败</p>'));
		// 	return;

		// }

		//发送采集消息给别人(如果是采集自己的产品就不用发送消息)
		if($this->user->userid != $product['userid']) {

			$data = array(
			'userid'=>$product['userid'], 
			'action'=>2, 
			'action_detail'=>21,
			'action_userid'=>$this->user->userid, 
			'action_stype'=>2, 
			'action_sid'=> $productId, 
			'isread'=>0,
			'addtime'=>date('Y-m-d H:i:s'));
			$insertId = $this->member_model->addData('lz_msg', $data);
			if (empty($insertId)) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2006,'msg'=>'<p>采集失败</p>'));
				return;

			}

		}

		$this->db->trans_commit();
		$row = $this->redis_model->set_product($proid2);
		if(empty($row)){

			echo json_encode(array('code'=>2007,'msg'=>'<p>添加redis失败, 请联系管理员</p>'));
			return;

		}

		$row = $this->redis_model->set_product($productId);
		if(empty($row)){

			echo json_encode(array('code'=>2008,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return;

		}

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2009,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return;

		}

		//把已选择的区域保存到cookied
		$this->load->helper('cookie');
		set_cookie("projectId",$proid,time()+3600*24);

		echo json_encode(array('code'=>200,'msg'=>'<p>采集成功</p>'));

	}

	//关注材思库的子项目
	public function followProject() {

		$proid = (int) $this->input->post('proid');
		$userid = (int) $this->input->post('userid');

		if(empty($proid) || empty($userid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return;
		}

		// $this->db->trans_begin();
		$own = $this->user->userid;
		$data = array(
			'userid'=>$own,
			'followtype' =>2, //品牌也是用户类型
			'followid'=>$proid,
			'followtime'=>date('Y-m-d H:i:s')
		);

		$insertId = $this->member_model->addData('lz_user_follow', $data);
		if(empty($insertId)) {

			echo json_encode(array('code'=>2002,'msg'=>'关注失败'));
			return false;

		}

		$followCount = $this->member_model->followProjectCount($userid);

		//计算会员坐标与对象坐标
		$where = array('proid'=>$proid);
		$project = $this->member_model->getData('lz_project', '*', $where);
		$x_index0 = $project['x_index'];
		$y_index0 = $project['y_index'];

		$where1 = array('userid'=>$this->user->userid);
		$user = $this->member_model->getData('lz_user', 'x_index,y_index', $where1);
		$x_index1 = $user['x_index'];
		$y_index1 = $user['y_index'];

		// Xb'=Xb+INT((Xa-Xb)*100)/100/(Nb+5); Yb'=Yb+INT((Ya-Yb)*100)/100/(Nb+5);
		$x_index2 = $x_index0 + floor(($x_index1-$x_index0)*100)/100/($followCount+1);
		$y_index2 = $y_index0 + floor(($y_index1-$y_index0)*100)/100/($followCount+1);
		$data = array(
			'x_index'=>$x_index2,
			'y_index'=>$y_index2
		);

		$row = $this->member_model->edit_table('lz_project', $where, $data);
		// if(empty($row)){
		// 	$this->db->trans_rollback();
		// 	echo json_encode(array('code'=>2005,'msg'=>'关注失败'));
		// 	return false;

		// }

		//修改用户产品数量 +1
		// Xa'=Xa+INT((Xb-Xa)*100)/100/(N+1); Ya'=Ya+INT((Yb-Ya)*100)/100/(N+1);
		$x_index2 = $x_index1 + floor(($x_index0-$x_index1)*100)/100/($followCount+1);
		$y_index2 = $y_index1 + floor(($y_index0-$y_index1)*100)/100/($followCount+1);
		$data = array(
			'x_index'=>$x_index2,
			'y_index'=>$y_index2
		);
		$row = $this->member_model->edit_table('lz_user', $where1, $data);
		// if (empty($row)) {

		// 	$this->db->trans_rollback();
		// 	echo json_encode(array('code'=>2006,'msg'=>'关注失败'));
		// 	return;

		// }

		// $this->db->trans_commit();

		$row = $this->redis_model->set_project($proid);
		if(empty($row)){

			echo json_encode(array('code'=>2003,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return;

		}

		$row = $this->redis_model->set_user($this->user->userid);
		if(empty($row)){

			echo json_encode(array('code'=>2004,'msg'=>'<p>修改redis失败, 请联系管理员</p>'));
			return;

		}
		echo json_encode(array('code'=>200,'msg'=>'关注成功'));

	}


	//收藏文章
	public function followNotes() {

		$noteid = (int) $this->input->post('noteid');
		$userid = (int) $this->input->post('userid');

		if(empty($noteid) || empty($userid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return;
		}

		if($userid == $this->user->userid) {
			echo json_encode(array('code'=>2002,'msg'=>'不能收藏自己的文章'));
			return false;
		}

		$own = $this->user->userid;
		$where = array('followid'=>$noteid,'userid'=>$own,'followtype'=>3);
		$res = $this->member_model->getData('lz_user_follow', 'id', $where);
		if(!empty($res)) {

			echo json_encode(array('code'=>-2003,'msg'=>'已收藏该文章，请勿重复收藏'));
			return false;
		}

		$data = array(
			'userid'=>$own,
			'followtype' =>3, //品牌也是用户类型
			'followid'=>$noteid,
			'followtime'=>date('Y-m-d H:i:s')
		);

		$insertId = $this->member_model->addData('lz_user_follow', $data);
		if(empty($insertId)) {

			echo json_encode(array('code'=>-2004,'msg'=>'收藏失败'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'收藏成功'));

	}

	//拷贝产品
	public function copyProductS() {

		$proid = (int) $this->input->post('proid');
		$libid = (int) $this->input->post('libid');
		$productS = $this->input->post('productS');

		if(empty($libid) || empty($proid)) {
			echo json_encode(array('code'=>2001,'msg'=>'<p>请选择项目</p>'));
			return;
		}

		$arr = explode(',',$productS);
		foreach ($arr as $v) {
			//获取采集数据的其他相关信息
			$where = array('sid'=>$v);
			$projectProduct = $this->member_model->getData('lz_project_product', 'proid2', $where);
			$proid2 = $projectProduct['proid2'];

			$data = array(
			'proid'=>$proid,
			'proid2'=>$proid2,
			'addtime'=>date('Y-m-d H:i:s')
			);
			$sid = $this->member_model->addData('lz_project_product', $data);
			if(empty($sid)){

				echo json_encode(array('code'=>2003,'msg'=>'<p>拷贝失败</p>'));
				return;

			}


		}

		echo json_encode(array('code'=>200,'msg'=>'<p>拷贝成功</p>'));

	}

	//拷贝产品
	public function moveProductS() {

		$proid = (int) $this->input->post('proid');
		$libid = (int) $this->input->post('libid');
		$productS = $this->input->post('productS');

		if(empty($libid) || empty($proid)) {
			echo json_encode(array('code'=>2001,'msg'=>'<p>请选择项目</p>'));
			return;
		}

		$this->db->trans_begin();
		$arr = explode(',',$productS);
		foreach ($arr as $v) {
			//获取采集数据的其他相关信息
			$where = array('sid'=>$v);
			$projectProduct= $this->member_model->getData('lz_project_product', 'proid2', $where);
			$proid2 = $projectProduct['proid2'];

			$data = array(
			'proid'=>$proid,
			'proid2'=>$proid2,
			'addtime'=>date('Y-m-d H:i:s')
			);
			$sid = $this->member_model->addData('lz_project_product', $data);
			if(empty($sid)){

				echo json_encode(array('code'=>2003,'msg'=>'<p>移除失败</p>'));
				return;

			}

			//移除它自己
			$data = array('isdel'=>1);
			$row = $this->member_model->edit_table('lz_project_product', $where, $data);
			if(empty($row)){
				$this->db->trans_rollback();
				echo json_encode(array('code'=>2005,'msg'=>'<p>移除失败</p>'));
				return;
			}

		}

		$this->db->trans_commit();

		echo json_encode(array('code'=>200,'msg'=>'<p>移除成功</p>'));

	}

	//好友
	public function friend() {

		$p = 0;
		$userid = $this->uri->segment(3) ? $this->uri->segment(3) : $this->user->userid;
		$seachWord = $this->input->get('seachWord');
		$friend = $this->member_model->get_friend($userid, $p, $seachWord);
		$this->getUserInfoData($userid);
		$invite_url = $this->config->item('base_url')."/login/invite?proid=0";

		$p++;
		$this->assign('p', $p);
		$this->assign('seachWord', $seachWord);
		$this->assign('friend', $friend);
		$this->assign('invite_url', $invite_url);
		$this->display('member/member.friend.html');

	}

	//查找相关手机号或用户名的用户
	public function userData() {

		$userinfo = trim($this->input->post('userinfo'));
		$userid = $this->user->userid;
		$data = $this->member_model->getUserData($userinfo,$userid);
		foreach ($data as $k => $v) {
			$city = $v['city'];
			$address = $this->getUserAddress($city);
			$data[$k]['city'] = $address;
			$data[$k]['sex'] = ($v['sex'] == 0 ? '保密' : ($v['sex'] == 1 ? '男' : '女'));
			$data[$k]['groupid'] = ($v['groupid'] == 0 ? '普通用户' : ($v['groupid'] == 10 ? '设计师' : '品牌商'));
		}

		$count = count($data);
		echo json_encode(array('count'=>$count,'data'=>$data));

	}

	//申请成为好友
	public function addApplyMsg() {

		$content = $this->input->post('content');
		$userid = (int) $this->input->post('userid');
		$myuserid = $this->user->userid;
		if(empty($userid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;
		}

		//判断是否已成为好友
		$where = array('userid1'=>$myuserid, 'userid2'=>$userid);
		$res = $this->member_model->select_fieldVal_exit('lz_friend', array(), $where);
		if(!empty($res)) {

			echo json_encode(array('code'=>2004,'msg'=>'您与该用户已成为好友,请勿再次提交'));
			return false;

		}

		$this->db->trans_begin();
		$data = array('userid1'=>$myuserid, 'userid2'=>$userid, 'content'=>$content, 'addtime'=>date('Y-m-d H:i:s'), 'res'=>0);
		$msgId = $this->member_model->addData('lz_msg_apply',$data);
		if(empty($msgId)){

			echo json_encode(array('code'=>2005,'msg'=>'发送请求失败'));
			return false;

		}

		$data = array('userid'=>$userid, 'action'=>5, 'action_detail'=>52, 'action_userid'=>$myuserid,'action_sid'=>$msgId, 'isread'=>0, 'addtime'=>date('Y-m-d H:i:s'));
		$msgId = $this->member_model->addData('lz_msg',$data);
		if(empty($msgId)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2006,'msg'=>'发送请求失败'));
			return false;

		}

		$this->db->trans_commit();
		echo json_encode(array('code'=>200,'msg'=>'发送请求成功'));

	}

	//同意或拒绝成为好友
	public function examineFriend() {

		$msgId = (int) $this->input->post('msgId');
		$action_sid = (int) $this->input->post('action_sid');
		$res = (int) $this->input->post('res');
		if(empty($msgId) || empty($action_sid) || empty($res)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return;

		}

		$where = array('id'=>$msgId);
		$data1 = $this->member_model->getData('lz_msg', 'action_userid', $where);
		$action_userid = $data1['action_userid'];

		//判断是否已成为好友
		$where = array('userid1'=>$this->user->userid, 'userid2'=>$action_userid);
		$result = $this->member_model->select_fieldVal_exit('lz_friend', array(), $where);
		if(!empty($result)) {

			echo json_encode(array('code'=>2003,'msg'=>'您与该用户已成为好友,请勿再次提交'));
			return false;

		}

		$this->db->trans_begin();
		$where = array('id'=>$msgId);
		$data = array('isread'=>1);
		$row = $this->member_model->edit_table('lz_msg', $where, $data);
		if(empty($row)){

			echo json_encode(array('code'=>2004,'msg'=>'操作失败'));
			return false;
		}

		$where = array('id'=>$action_sid);
		$data = array('res'=>$res,'restime'=>date('Y-m-d H:i:s'));
		$row = $this->member_model->edit_table('lz_msg_apply', $where, $data);
		if(empty($row)){
			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'操作失败'));
			return false;
		}

		if($res == 1) {//同意成为朋友

			$data = $this->member_model->getData('lz_msg_apply', 'userid1', $where);
			$userid = $data['userid1'];
			$data = array('userid1'=>$userid, 'userid2'=>$this->user->userid, 'addtime'=>date('Y-m-d H:i:s'));
			$msgId = $this->member_model->addData('lz_friend',$data);
			if(empty($msgId)){

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2006,'msg'=>'操作失败'));
				return false;

			}

			$data = array('userid2'=>$userid, 'userid1'=>$this->user->userid, 'addtime'=>date('Y-m-d H:i:s'));
			$msgId = $this->member_model->addData('lz_friend',$data);
			if(empty($msgId)){

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2007,'msg'=>'操作失败'));
				return false;

			}

			$where = array('userid'=>$userid);
			$fieldArr = array('friendcount' => ' + 1 ');
			$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
			if (empty($row)) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2007,'msg'=>'操作失败'));
				return;

			}

			$where = array('userid'=>$this->user->userid);
			$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
			if (empty($row)) {

				$this->db->trans_rollback();
				echo json_encode(array('code'=>2008,'msg'=>'操作失败'));
				return;

			}

			$row = $this->redis_model->set_user($userid);
			if(empty($row)){

				echo json_encode(array('code'=>2009,'msg'=>'修改redis失败, 请联系管理员'));
				return false;

			}

			$row = $this->redis_model->set_user($this->user->userid);
			if(empty($row)){

				echo json_encode(array('code'=>2010,'msg'=>'修改redis失败, 请联系管理员'));
				return false;

			}


		}

		$this->db->trans_commit();
		echo json_encode(array('code'=>200,'msg'=>'操作成功'));

	}

	//删除好友
	public function delFriend() {

		$userid = (int) $this->input->post('userid');
		$myuserid = $this->user->userid;
		if(empty($userid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return;
		}

		$this->db->trans_begin();
		$where = array('userid1'=>$myuserid,'userid2'=>$userid);
		$row = $this->member_model->deleteData('lz_friend', $where);
		if(empty($row)) {

			echo json_encode(array('code'=>2002,'msg'=>'删除好友失败'));
			return false;
		}

		$where = array('userid1'=>$userid,'userid2'=>$myuserid);
		$row = $this->member_model->deleteData('lz_friend', $where);
		if(empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2005,'msg'=>'删除好友失败'));
			return false;
		}

		$where = array('userid'=>$myuserid);
		$fieldArr = array('friendcount' => ' - 1 ');
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2006,'msg'=>'删除好友失败'));
			return;

		}

		$where = array('userid'=>$userid);
		$row = $this->member_model->changeField('lz_user', $fieldArr, $where);
		if (empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2007,'msg'=>'删除好友失败'));
			return;

		}

		$this->db->trans_commit();

		$row = $this->redis_model->set_user($myuserid);
		if(empty($row)){

			echo json_encode(array('code'=>2008,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		$row = $this->redis_model->set_user($userid);
		if(empty($row)){

			echo json_encode(array('code'=>2009,'msg'=>'修改redis失败, 请联系管理员'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'删除好友成功'));

	}

	/**
	 * 瀑布流获取数据列表
	 */
	public function getDataList() {

		$sign = (int) $this->input->post('sign', true);
		$p = (int) $this->input->post('p', true);
		$seachWord = $this->input->post('seachWord', true);
		$userid = (int) $this->input->post('userid', true);
		$libid = (int) $this->input->post('libid', true);

		$res['errcode'] = 301;
		$res['errmsg'] = "参数为空.";

		if(!$sign || !$p || !$userid) {
			echo json_encode($res);
			return false;
		}

		if($sign == 2 && !$libid) {
			echo json_encode($res);
			return false;
		}

		//项目列表瀑布流获取
		switch($sign) {
			case 1: $list = $this->member_model->get_library($userid, $p, $seachWord); break;
			case 2: $list = $this->member_model->selflibrarytow($libid, $userid, $p); break;
			case 3: $list = $this->member_model->get_partin_project($userid, $p, $seachWord); break;
			case 4: $list = $this->member_model->get_follow_project($userid, $p, $seachWord); break;
			case 5: $list = $this->member_model->get_product($userid, $p, $seachWord); break;
			case 6: $list = $this->member_model->get_storeup($userid, $p, $seachWord); break;
			case 7: $list = $this->member_model->get_note($userid, $p, $seachWord); break;
			case 8: $list = $this->member_model->get_follow_note($userid, $p, $seachWord); break;
			case 9: $list = $this->member_model->get_friend($userid, $p, $seachWord); break;
			case 10: $list = $this->member_model->get_follow($userid, $p, $seachWord); break;
			case 11: $list = $this->member_model->get_fans($userid, $p, $seachWord); break;
			default: break;
		}

		$res['errcode'] = 200;
		$res['errmsg'] = $list;
		echo json_encode($res);

	}


	//删除我收藏的笔记
	public function cancelFollowNote() {

		$noteid = (int) $this->input->post('noteid');
		if(empty($noteid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array(
			'userid'=>$this->user->userid,
			'followtype'=>3,
			'followid'=>$noteid
		);

		$row = $this->member_model->deleteData('lz_user_follow', $where);
		if(empty($row)) {

			echo json_encode(array('code'=>2002,'msg'=>'删除收藏失败'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'删除收藏成功'));

	}


	//取消我关注的项目
	public function cancelFollowProject() {

		$proid = (int) $this->input->post('proid');
		if(empty($proid)) {

			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;

		}

		$where = array(
			'userid'=>$this->user->userid,
			'followtype'=>2,
			'followid'=>$proid
		);

		$row = $this->member_model->deleteData('lz_user_follow', $where);
		if(empty($row)) {

			echo json_encode(array('code'=>2002,'msg'=>'删除关注失败'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'删除关注成功'));

	}

	//获取区域的功能标签
	public function projectFunctionTag() {

		$type1 = $this->input->post('type');
		$typeArr1 = $this->config->item('library_type');
		$type1 = array_search($type1, $typeArr1);

		$type3 = $this->config->item('project_function_'.$type1);
		echo json_encode($type3);

	}

	//获取产品的标签
	public function productFunctionTag() {

		$type1 = $this->input->post('type');
		$typeArr1 = $this->config->item('product_type');
		$type1 = array_search($type1, $typeArr1);

		$type2 = $this->config->item('product_function_'.$type1);
		echo json_encode($type2);

	}

	private function getUserInfoData($userid) {

		//查找用户信息
		$where = array('userid'=>$userid);
		$userInfo = $this->member_model->getData('lz_user', '*', $where);

		//查找用户具体地址
		$countyId = $userInfo['city'];
		$address = $this->getUserAddress($countyId);

		//获取数量
		$count = $this->member_model->getCount($userid);

		$this->assign('userInfo', $userInfo);
		$this->assign('userid', $this->user->userid);
		$this->assign('address', $address);
		$this->assign('count', $count);

	}

	private function addProjectProduct($proid,$proid2) {
		$project = $this->member_model->select_fieldVal_exit('lz_project',array(),array('proid'=>$proid),0,1);
		$area = $project['area'];
		$newPpcode = '';
		if($area != '') {

			//查找最后添加的该项目的产品的编号
			$projectProdut = $this->member_model->select_fieldVal_exit('lz_project_product',array(),array('proid'=>$proid),0,1,'sid desc');
			if(!empty($projectProdut)) {

				$newPpcode = $area.'001';
				if($projectProdut['ppcode'] != '') {

					$ppcode = $projectProdut['ppcode'];
					$str = str_replace($area,"",$ppcode);
					$str++;

					if(strlen($str) == 1){
						$str = '00'.$str;
					}elseif(strlen($str) == 2){
						$str = '0'.$str;
					}else{

					}
					$newPpcode = $area.$str;
				}

			}

		}

		//入库lz_project_product
		$data = array('fid'=>0,'proid'=>$proid,'proid2'=>$proid2, 'ppcode'=>$newPpcode,'addtime'=>date('Y-m-d H:i:s'));
		return $this->member_model->addData('lz_project_product', $data);

	}

	function copyProject() {

		$projectId = (int) $this->input->post('projectId');
		$libid = (int) $this->input->post('libid');
		$projectName = $this->input->post('projectName');
		if(empty($projectId) || empty($libid)) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;
		}

		$where = array('proid'=>$projectId);
		$project = $this->member_model->getData('lz_project', '*', $where);

		//第几次复制副本
		$where = array('oproid'=>$projectId,'libid'=>$libid);
		$count = $this->member_model->getTableCount('lz_project', $where);

		$project['oproid'] = $project['proid'];

		if(!empty($count['count'])) {

			++$count['count'];
			$project['proname'] = $project['proname'].'副本'.$count['count'];

		}else{

			$project['proname'] = $project['proname'].'副本1';

		}

		// $this->db->trans_begin();

		$project['commentcount'] = 0;
		$project['addtime'] = date('Y-m-d H:i:s');
		$project['updatetime'] = date('Y-m-d H:i:s');
		unset($project['proid']);
		//复制项目表
		$insertId = $this->member_model->addData('lz_project', $project);
		// if(empty($insertId)){

			// echo json_encode(array('code'=>2002,'msg'=>'复制失败'));
			// return false;

		// }

		//复制文档表
		$where = array('proid'=>$projectId);
		$projectDoc = $this->member_model->getOneData('lz_project_doc', '*', $where, 'id desc', 0, 1000);

		if(!empty($projectDoc)) {

			$fields = "(proid, userid, docname, docpath, docsize, addtime)";
			$values = '';
			foreach ($projectDoc as $k => $v) {
				$values .= "(".$insertId.",".$v['userid'].", '".$v['docname']."', '".$v['docpath']."', '".$v['docsize']."', '".date('Y-m-d H:i:s')."'),";
			}
			$values = substr($values,0,-1);
			// echo $values;
			$row = $this->member_model->batchAddData('lz_project_doc', $fields, $values);
			// if(empty($row)){

				// 	$this->db->trans_rollback();
				// echo json_encode(array('code'=>2003,'msg'=>'复制失败'));
				// return false;

			// }

		}

		//复制人员
		$projectMember = $this->member_model->getOneData('lz_project_member', '*', $where, 'id desc', 0, 1000);

		if(!empty($projectMember)) {

			$fields = "(proid, userid, groupid, `group`, company, permissions, addtime)";
			$values = '';
			foreach ($projectMember as $k => $v) {

				$values .= "(".$insertId.", ".$v['userid'].", '".$v['groupid']."', '".$v['group']."', '".$v['company']."', '".$v['permissions']."', '".date('Y-m-d H:i:s')."'),";


				//添加系统通知
				if($this->user->userid != $v['userid']) {

					$content = $this->user->nickname.'复制了<a href="/library/project/'.$insertId.'" style="color:#055cfc;">'.$projectName.'</a>的项目副本，请到您的我参与的项目中查看';
					$data1 = array(
					'userid'=>$v['userid'], 
					'content'=>$content, 
					'addtime'=>date('Y-m-d H:i:s'));
					$msgSystemId = $this->member_model->addData('lz_msg_system', $data1);
					// if (empty($msgSystemId)) {

					// 	$this->db->trans_rollback();
					// 	echo json_encode(array('code'=>2004,'msg'=>'复制失败'));
					// 	return false;

					// }
					//发送消息
					$data2 = array(
						'userid' => $v['userid'],
						'action' => 5,
						'action_detail' => 51,
						'action_userid' => $this->user->userid,
						'action_stype' => 5,
						'action_sid' => $msgSystemId,
						'isread' => 0,
						'addtime' => date('Y-m-d H:i:s')
					);
					$row = $this->member_model->addData('lz_msg', $data2);
					// if(empty($row)){

					// $this->db->trans_rollback();
					// echo json_encode(array('code'=>2005,'msg'=>'复制失败'));
					// return false;

				// }

				}

			}

			$values = substr($values,0,-1);
			// echo $values;
			$row = $this->member_model->batchAddData('lz_project_member', $fields, $values);
			// if(empty($row)){

				// $this->db->trans_rollback();
				// echo json_encode(array('code'=>2006,'msg'=>'复制失败'));
				// return false;

			// }
		}

		//复制产品
		// $where = array('proid'=>$projectId);
		$projectProduct = $this->member_model->getOneData('lz_project_product', '*', $where, '', 0, 1000);

		if(!empty($projectProduct)) {

			$fields = "(fid, tyid, proid, proid2, ppcode, ppname, ppdesc, ppprice, ppfloat, count, average, `desc`, param1, param2, param3, `status`, isuse, isdel, addtime)";
			$values = '';
			foreach ($projectProduct as $k => $v) {
				$values .= "(".$v['fid'].",".$v['tyid'].",".$insertId.",".$v['proid2'].",'".$v['ppcode']."','";
				$values .= $v['ppname']."', '".$v['ppdesc']."','".$v['ppprice']."','".$v['ppfloat']."','".$v['count']."','";
				$values .= $v['average']."','".$v['desc']."','".$v['param1']."','".$v['param2']."','".$v['param3']."','";
				$values .= $v['status']."','".$v['isuse']."','".$v['isdel']."','".date('Y-m-d H:i:s')."'),";
			}
			$values = substr($values,0,-1);
			// echo $values;
			$row = $this->member_model->batchAddData('lz_project_product', $fields, $values);
			// if(empty($row)){

				// $this->db->trans_rollback();
				// echo json_encode(array('code'=>2007,'msg'=>'复制失败'));
				// return false;

			// }

		}

		//修改项目的区域数
		$where = array('libid'=>$libid);
		$fieldArr = array('procount2'=> ' +1 ');
		$row = $this->member_model->changeField('lz_library', $fieldArr, $where);
		// if (empty($row)) {

		// 	$this->db->trans_rollback();
		// 	echo json_encode(array('code'=>2008,'msg'=>'复制失败'));
		//  return false;

		// }

		// $this->db->trans_commit();

		$row = $this->redis_model->set_library($libid);
		// if(empty($row)){

		// echo json_encode(array('code'=>2009,'msg'=>'修改redis失败, 请联系管理员'));
		// return false;

		// }

		echo json_encode(array('code'=>200,'msg'=>'复制成功'));


	}

}