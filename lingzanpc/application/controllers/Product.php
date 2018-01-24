<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('product_model');

	}

	//获取个人材思库列表
	public function getLibraryData() {
		$userid = $this->user->userid;
		$where = array('userid'=>$userid,'isdel'=>0);
		$library = $this->product_model->getLibraryData('lz_library', 'libid,libname', $where , 'libid desc');
		echo json_encode(array('code'=>200,'library'=>$library));

	}


	//新增材思库
	public function addLibrary() {

		$libflg = $this->input->post('libflg');
		$libname = $this->input->post('libname');

		if(empty($libname) || !in_array($libflg, array(1,2))) {
			echo json_encode(array('code'=>2001,'msg'=>'参数错误'));
			return false;
		}

		$userid = $this->user->userid;
		$where = array('userid'=>$userid,'libname'=>$libname,'isdel'=>0);
		$res = $this->product_model->getLibraryData('lz_library', 'libid', $where, 'libid desc');
		if(!empty($res)){
			// echo json_encode(array('code'=>-2002,'msg'=>'该材思库已存在,添加失败'));
			return;
		}

		$data = array(
		'libflg' =>$libflg,
		'userid'=>$userid,//session的用户id
		'libname' =>$libname,
		'procount2'=>1,
		'status'=>1,
		'createtime'=>date('Y-m-d H:i:s')
		);
		$this->db->trans_begin();
		$insertId = $this->product_model->addData('lz_library', $data);
		if(empty($insertId)) {

			echo json_encode(array('code'=>2002,'msg'=>'添加失败'));
			return;

		}

		//每生成一个项目，就会生成一个默认的区域：项目总览
		$data = array(
			'userid'=>$this->user->userid,
			'libid'=>$insertId, 
			'proname'=>'项目总览',
			'status'=>1,
			'addtime'=>date('Y-m-d H:i:s'),
			'updatetime'=>date('Y-m-d H:i:s')
		);
		$proid = $this->product_model->addData('lz_project',$data);
		if(empty($proid)){
			$this->db->trans_rollback();
			echo json_encode(array('code'=>2003,'msg'=>'添加失败'));
			return false;

		}

		$data = array(
			'proid'=>$proid,
			'userid'=>$this->user->userid,
			'groupid'=>10,
			'permissions'=>'1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',
			'addtime'=>date('Y-m-d H:i:s')
		);
		$projectMemberId = $this->product_model->addData('lz_project_member', $data);
		if(empty($projectMemberId)){
			$this->db->trans_rollback();
			echo json_encode(array('code'=>2004,'msg'=>'添加失败'));
			return false;

		}

		//修改用户的画册数
		$where = array('userid'=>$userid);//当前session的用户
		$fieldArr = array('librarycount'=>' + 1');
		//每日添加的前5个材思库可以获得5个积分
		$res = $this->product_model->getAddCountByToDay('lz_library', 'createtime', $where);
		if($res['count'] <= 5) {

			$fieldArr = array('librarycount'=>' + 1','point'=>' + 5');
			//添加积分明细记录
			$data = array('userid'=>$userid, 'action'=>'添加项目', 'point'=>5, 'addtime'=>date('Y-m-d H:i:s'));
			$pointLogId = $this->product_model->addData('lz_point_log', $data);
			if(empty($pointLogId)) {
				$this->db->trans_rollback();
				echo json_encode(array('code'=>2005,'msg'=>'添加失败'));
				return;

			}

		}

		$row = $this->product_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)) {

			$this->db->trans_rollback();
			echo json_encode(array('code'=>2006,'msg'=>'添加失败'));
			return;

		}

		$this->db->trans_commit();

		//操作redis
		$row = $this->redis_model->set_user($userid);
		if(empty($row)) {

			echo json_encode(array('code'=>2007,'msg'=>'操作redis失败,请联系管理员'));
			return;

		}

		echo json_encode(array('code'=>200,'msg'=>$insertId,'proid'=>$proid));

	}

	//点赞单品
	public function fabulous() {

		$proid = $this->input->post('proid');
		$puserid = $this->input->post('puserid');

		if(!is_numeric($proid)) {
			echo json_encode(array('code'=>-2001,'msg'=>'参数错误'));
			return false;
		}

		//判断是否重复点赞
		$data = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $proid);
		if(!$this->product_model->check_msg($data)) {

			echo json_encode(array('code'=>-2004,'msg'=>'重复点赞'));
			return;

		}

		$where = array('proid'=>$proid);
		$fieldArr = array('zancount'=>' + 1');
		$row = $this->product_model->changeField('lz_product', $fieldArr, $where);
		if(empty($row)){

			echo json_encode(array('code'=>-2002,'msg'=>'点赞失败'));
			return;
		}

		$row = $this->redis_model->set_product($proid);
		if(empty($row)) {

			echo json_encode(array('code'=>-2003,'msg'=>'操作redis失败,请联系管理员'));
			return;

		}

		// 通知用户
		$msg = array('userid' => $puserid, 'action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 2, 'action_sid' => $proid, 'isread' => 0, 'addtime' => date('Y-m-d H:i:s'));
		$this->product_model->set_msg($msg);

		echo json_encode(array('code'=>200,'msg'=>'点赞成功'));


	}

	//关注弹窗数据查询
	public function getUserData() {

		$userid = $this->input->post('userid');
		if(!is_numeric($userid)) {
			echo json_encode(array('code'=>-2001,'msg'=>'参数错误'));
			return false;
		}
		$where = array('userid'=>$userid);
		$select = 'userid,nickname,avatar,librarycount,productcount';
		$user = $this->product_model->getTable('lz_user', $select, $where);

		$select = 'proid,proname,smallpic';
		$where = array('userid'=>$userid,'isdel'=>0);
		$product = $this->product_model->getTable('lz_product', $select, $where, 'proid desc', 0, 3);
		$user['product'] = $product;

		echo json_encode(array('code'=>200,'msg'=>$user));

	}


	//关注人、品牌
	public function follow() {

		$userid = $this->input->post('userid');
		if(!is_numeric($userid)) {

			echo json_encode(array('code'=>-2001,'msg'=>'参数错误'));
			return false;

		}

		if($userid == $this->user->userid) {
			echo json_encode(array('code'=>-2002,'msg'=>'不能关注自己'));
			return false;
		}
		$own = $this->user->userid;
		$where = array('followid'=>$userid,'userid'=>$own,'followtype'=>4);
		$res = $this->product_model->getTable('lz_user_follow', 'id', $where, 'id desc', 0, 1);
		if(!empty($res)) {

			echo json_encode(array('code'=>-2003,'msg'=>'该用户或品牌已被关注'));
			return false;
		}

		$this->db->trans_begin();
		
		$data = array(
			'userid'=>$own,
			'followtype' =>4, //品牌也是用户类型
			'followid'=>$userid,
			'followtime'=>date('Y-m-d H:i:s')
		);

		$insertId = $this->product_model->addData('lz_user_follow', $data);
		if(empty($insertId)) {

			echo json_encode(array('code'=>-2004,'msg'=>'关注失败'));
			return false;

		}

		//该用户的关注数增加1
		$where = array('userid'=>$own);//当前session的用户
		$fieldArr = array('followcount'=>' + 1');
		$row = $this->product_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>-2005,'msg'=>'关注失败'));
			return;

		}

		//被关在的人粉丝数加1
		$where = array('userid'=>$userid);
		$fieldArr = array('fanscount'=>' + 1');
		$row = $this->product_model->changeField('lz_user', $fieldArr, $where);
		if(empty($row)){

			$this->db->trans_rollback();
			echo json_encode(array('code'=>-2006,'msg'=>'关注失败'));
			return;

		}

		$this->db->trans_commit();

		//操作redis
		$row = $this->redis_model->set_user($own);
		if(empty($row)) {

			echo json_encode(array('code'=>-2007,'msg'=>'操作redis失败,请联系管理员'));
			return false;

		}

		//操作redis
		$row = $this->redis_model->set_user($userid);
		if(empty($row)) {

			echo json_encode(array('code'=>-2008,'msg'=>'操作redis失败,请联系管理员'));
			return false;

		}

		echo json_encode(array('code'=>200,'msg'=>'关注成功'));

	}

	//调整产品上浮
	public function adjustProductFloat() {

		$val = $this->input->post('val', true);
		$proid = $this->input->post('proid', true);
		$sidStr = implode(',', $proid);
		$res = $this->product_model->setProductFloat($val,$sidStr);

		if(empty($res)) {
			echo json_encode(array('code'=>2001,'msg'=>'调整失败'));
			return false;
		}
		echo json_encode(array('code'=>200,'msg'=>'调整成功'));

	}


}