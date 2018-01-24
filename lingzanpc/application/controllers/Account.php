<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('account_model');
		$this->load->model('redis_model');

	}

	public function index() {

		$error_msg = '';
		$userid = $this->user->userid;
		$where = array('userid'=>$userid);
		if($this->input->post('frames') == 'yes') {

			$nickname = $this->input->post('nickname');
			$signature = $this->input->post('signature');
			$sex = $this->input->post('sex');
			$occupation = $this->input->post('occupation');

			//获取城市
			$province = $this->input->post('province');
			$area = $this->input->post('area');
			$county = $this->input->post('county');

			if(empty($nickname) || strlen($nickname) > 50) {
				$error_msg = "昵称不能为空,且不能超过50个字符";
				goto end;
			}

			if(!empty($area) && empty($county)) {
				$error_msg = "请选择正确的城市";
				goto end;
			}

			
			if(!empty($county)){
				$city = $county;
			}

			if(empty($county) && empty($area)){
				$city = $province;
			}

			$data = array(
				'nickname'=>$nickname,
				'signature'=>$signature,
				'city'=>$city,
				'occupation'=>$occupation,
				'sex'=>$sex
			);

			if(!empty($_POST['avatar'])) {

				$base64_url = $_POST['avatar'];
				$res = $this->vailImg($base64_url);
				if($res['sign'] != 200){
					$error_msg = $res['msg'];
					goto end;

				}

				$data['avatar'] = $res['msg'];
			}

			$row = $this->account_model->editData('lz_user', $where, $data);
			if(empty($row)) {
				$error_msg = "修改失败";
				goto end;
			}

			//修改缓存
			$row = $this->redis_model->set_user($userid);
			if(empty($row)) {

				$error_msg = "修改redis失败,请联系管理员";
				goto end;
			}

			$error_msg = "修改成功";

		}

		end:
		//获取用户数据
		$data = $this->account_model->getRowData('lz_user', 'groupid,nickname,avatar,sex,occupation,signature,city,mobile,email,receivemsg', $where);
		//获取城市数据
		$where = array('flg'=>1);//查找省列表
		$city = $this->account_model->getCityData('lz_city', 'code,name', $where, 'code asc');

		//查找出用户的具体地址
		$cityCode = '';
		$areayCode = '';
		$countyCode = '';

		$countyId = $data['city'];
		$where = array('code'=>$countyId);
		$myCounty = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
		$areaId = $myCounty['parentid'];
		if(!empty($areaId)) {

			$where = array('code'=>$areaId);
			$myArea = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
			$cityId = $myArea['parentid'];
			$areayCode = $myArea['code'];

			if(!empty($cityId)) {

				$where = array('code'=>$cityId);
				$myCity = $this->account_model->getRowData('lz_city', 'code,name,parentid,flg', $where);
				$cityCode = $myCity['code'];
			}

			$countyCode = $myCounty['code'];

		}else{

			$cityCode = $myCounty['code'];
		}

		//获取是否提交设计师认证或品牌认证的情况
		$where = array('userid'=>$userid);
		$authCompany = $this->account_model->getRowData('lz_user_auth_company', '*', $where);
		// $authDesigner1 = $this->account_model->getRowData('lz_user_auth_designer', '*', $where);

		$this->assign('data', $data);
		$this->assign('city', $city);
		$this->assign('cityCode', $cityCode);
		$this->assign('areayCode', $areayCode);
		$this->assign('countyCode', $countyCode);
		$this->assign('error_msg', $error_msg);
		$this->assign('authCompany', $authCompany);
		// $this->assign('authDesigner1', $authDesigner1);
		$this->display('account/account.index.html');

	}

	//获取城市
	public function getCityData() {

		$flg = $this->input->post('flg');
		$parentid = $this->input->post('parentid');
		$where = array('flg'=>$flg, 'parentid'=>$parentid);//查找省列表
		$city = $this->account_model->getCityData('lz_city', 'code,name', $where, 'code asc');

		echo json_encode(array('code'=>'200','city'=>$city));

	}

	//修改手机号
	public function editMobile() {

		$error_msg = "";

		if($this->input->post('frames') == 'yes') {

			$this->form_validation->set_rules('oldMobile', '原手机号', 'trim|required');
			$this->form_validation->set_rules('veryCode', '验证码', 'trim|required');
			$this->form_validation->set_rules('mobile', '新手机号', 'trim|required');

			if ($this->form_validation->run() === false) {

				$error_msg = validation_errors();
				goto end;

			}

			//验证手机号
			$oldMobile = $this->input->post('oldMobile', true);
			$patrn = "/^((13[0-9])|(14[5-7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/";
			if(!preg_match($patrn, $oldMobile)){
				$error_msg = "请填写正确的旧手机号";
				goto end;
			}

			$mobile = $this->input->post('mobile', true);
			if(!preg_match($patrn, $mobile)){
				$error_msg = "请填写正确的新手机号";
				goto end;
			}

			$verifical = $this->input->post('veryCode', true);

			$redis_key = 'ver_'.$oldMobile;
			$vercode = $this->ci_redis->getinstance(5)->get($redis_key);
			if($verifical != $vercode) {

				$error_msg = "验证码不正确.";
				goto end;

			}

			$check = $this->user_model->get_user(array('mobile' => $mobile));
			if(!empty($check)) {

				$error_msg = "该手机号已被注册.";
				goto end;

			}

			$userid = $this->user->userid;
			$where = array('userid'=>$userid);
			$data = array('mobile'=>$mobile);
			$row = $this->account_model->editData('lz_user', $where, $data);
			if(empty($row)) {
				$error_msg = "修改失败";
				goto end;
			}

			$row = $this->redis_model->set_user($userid);
			if(empty($row)) {

				$error_msg = "修改redis失败,请联系管理员";
				goto end;
			}

			$error_msg = "修改成功";

		}

		end:
		echo $error_msg;

	}

	//修改密码
	public function editPsw() {

		$error_msg = "";

		if($this->input->post('frames1') == 'yes') {

			$this->form_validation->set_rules('oldPsw', '原密码', 'trim|required');
			$this->form_validation->set_rules('password', '新密码', 'trim|required');
			$this->form_validation->set_rules('againPsw', '确认密码', 'trim|required');

			if ($this->form_validation->run() === false) {

				$error_msg = validation_errors();
				goto end;

			}

			//验证手机号
			$oldPsw = $this->input->post('oldPsw', true);
			$password = $this->input->post('password', true);
			$againPsw = $this->input->post('againPsw', true);
			$userid = $this->user->userid;
			$where = array('userid'=>$userid);
			$user = $this->user_model->get_user($where);
			$oldPassword = $user['password'];
			$oldPsw = md5(md5($oldPsw.'lingzan2017'));
			if($oldPassword != $oldPsw) {

				$error_msg = "原密码输入错误";
				goto end;

			}

			if($password != $againPsw) {

				$error_msg = "新密码和确认密码输入不一致";
				goto end;

			}

			$password = md5(md5($password.'lingzan2017'));
			$data = array('password'=>$password);
			$row = $this->account_model->editData('lz_user', $where, $data);
			if(empty($row)) {
				$error_msg = "修改失败";
				goto end;
			}

			$row = $this->redis_model->set_user($userid);
			if(empty($row)) {

				$error_msg = "修改redis失败,请联系管理员";
				goto end;
			}

			$error_msg = "修改成功";

		}

		end:
		echo $error_msg;

	}

	//绑定邮箱
	public function editEmail() {

		$error_msg = "";

		if($this->input->post('frames2') == 1 || $this->input->post('frames2') == 2) {

			$this->form_validation->set_rules('email', '邮箱', 'trim|required');
			$this->form_validation->set_rules('veryCode', '验证码', 'trim|required');

			if ($this->form_validation->run() === false) {

				$error_msg = validation_errors();
				goto end;

			}

			//验证手机号
			$email = $this->input->post('email', true);
			$verifical = $this->input->post('veryCode', true);

			$redis_key = 'ver_'.$email;
			$vercode = $this->ci_redis->getinstance(5)->get($redis_key);
			if($verifical != $vercode) {

				$error_msg = "验证码不正确.";
				goto end;

			}

			$userid = $this->user->userid;
			$where = array('userid'=>$userid);
			if($this->input->post('frames2') == 2){
				$email = '';
			}
			$data = array('email'=>$email);
			$row = $this->account_model->editData('lz_user', $where, $data);
			if(empty($row)) {
				$error_msg = "操作失败";
				goto end;
			}

			$row = $this->redis_model->set_user($userid);
			if(empty($row)) {

				$error_msg = "修改redis失败,请联系管理员";
				goto end;
			}

			$error_msg = "操作成功";

		}

		end:
		echo $error_msg;

	}

	//是否接受消息通知
	public function receivemsg() {

		$error_msg = '';
		$userid = $this->user->userid;
		$where = array('userid'=>$userid);
		$receivemsg = $this->input->post('receivemsg');
		$data = array('receivemsg'=>$receivemsg);
		$row = $this->account_model->editData('lz_user', $where, $data);
		if(empty($row)) {
			$error_msg = "操作失败";
			goto end;
		}

		$row = $this->redis_model->set_user($userid);
		if(empty($row)) {

			$error_msg = "修改redis失败,请联系管理员";
			goto end;
		}

		$error_msg = "操作成功";

		end:
		echo $error_msg;

	}


		private function vailImg($base64_url) {

			if(!preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_url, $result)){
				// echo '文件错误';
				return array('sign'=>2002,'msg'=>'文件错误');
			}
			$type = $result[2];
			if(!in_array($type,array('pjpeg','jpeg','jpg','gif','bmp','png'))){

				//文件类型错误
				// echo '图片上传类型错误';
				return array('sign'=>2002,'msg'=>'图片上传类型错误');
			}

			$head_file = 'static/upload/head';
			$fileurl = $head_file.'/'.date('Ymd');
			if(!is_dir($fileurl)) mkdir($fileurl, 0777, true);
			$file_name = date('YmdHis', time()).rand(10000, 99999).'.'.$type;
			$full_path = $fileurl.'/'.$file_name;

			if(!file_put_contents($full_path, base64_decode(str_replace($result[1], '', $base64_url)))){

				return array('sign'=>2003,'msg'=>'图片上传失败');

			}

		// $head_file = 'static/upload/head';
		// $fileurl = $head_file.'/'.date('Ymd');
		// if(!is_dir($fileurl)) mkdir($fileurl, 0777, true);

		// $base64_body = substr(strstr($base64_url,','),1);
		// $data= base64_decode($base64_body);

		// $file_name = date('YmdHis', time()).rand(10000, 99999).'.jpg';
		// $full_path = $fileurl.'/'.$file_name;
		// file_put_contents($full_path,$data);
		// var_dump($full_path);die();//static/upload/head/20170822/2017082217415041107.jpg

		// 上传OSS
		$this->load->library('CI_OSS');
		$bucket = 'lingzan';
		$object = 'picture/'.$file_name;
		$res = $this->ci_oss->uploadFile($bucket, $object, $full_path);
		$avatar = $res['oss-request-url'];
		return array('sign'=>200,'msg'=>$avatar);

	}


}