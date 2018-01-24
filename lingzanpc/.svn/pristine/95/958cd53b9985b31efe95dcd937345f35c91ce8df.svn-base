<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_controller {

	public function __construct() {

		parent::__construct();

		$this->load->model('authentication_model');

	}

	public function designer() {

		$userid = $this->user->userid;
		$where = array('userid'=>$userid);
		$designerAuth = $this->authentication_model->getRowData('lz_user_auth_designer', '*', $where);

		if($this->input->post('frames') == 'yes') {

			if($designerAuth['ispass'] == 1) {
				// echo "您的认证信息已提交，请勿重复提交";
				echo "您已通过申请设计师认证的审核，请勿重复申请";
				return;
			}

			$realname = $this->input->post('realname',true);
			$designfield = $this->input->post('designfield',true);
			$company = $this->input->post('company',true);
			$address = $this->input->post('address',true);
			$personalintroduction = $this->input->post('personalintroduction',true);
			$mailbox = $this->input->post('mailbox',true);
			$website = $this->input->post('website',true);
			$isTure = $this->input->post('isTure',true);

			if(empty($realname) || empty($designfield) || empty($company) || empty($address) || empty($personalintroduction) || empty($isTure) ) {
				echo "请务必补全必要资料";
				return;
			}

			//验证邮箱
			$patrn = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/";
			if(!preg_match($patrn, $mailbox)){
				echo "请填写正确的邮箱";
				return;
			}

			if(!empty($website)) {

				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {

					echo "请填写正确的网站地址";
					return;

				}

			}

			$data= array(
				'userid'=>$this->user->userid,//session的用户id
				'realname'=>$realname,//session的用户id
				'designfield'=>$designfield,
				'company'=>$company,
				'address'=>$address,
				'personalintroduction'=>$personalintroduction,
				// 'workmaterial'=>$workmaterial,
				// 'individualmaterial'=>$individualmaterial,
				'mailbox'=>$mailbox,
				'website'=>$website

			);

			if(empty($designerAuth)) {//添加设计师认证

				$res = $this->addDesignerAuth($data);
				echo $res;
				return;

			}
			//修改设计师认证
			$res = $this->editDesignerAuth($designerAuth, $data);
			echo $res;
			return;

		}

		$authDesigner = json_encode($designerAuth);
		$this->assign('authDesigner', $authDesigner);
		$this->display('authentication/authentication.designer.html');

	}

	//添加设计师认证
	public function addDesignerAuth($data) {

		if(empty($_FILES['workmaterial']) || empty($_FILES['selfJust']) || empty($_FILES['selfBack'])) {

			return "请上传完整的个人材料与工作材料信息";

		}

		$res = $this->vailImg('workmaterial');
		if($res['sign'] != 200){

			return $res['msg'];

		}
		$data['workmaterial'] = $res['msg'];

		$res = $this->vailImg('selfJust');
		if($res['sign'] != 200){

			return $res['msg'];

		}
		$selfJust = $res['msg'];

		$res = $this->vailImg('selfBack');
		if($res['sign'] != 200){

			return $res['msg'];

		}
		$selfBack = $res['msg'];
		$data['individualmaterial'] = $selfJust.','.$selfBack;
		$data['addtime'] = date('Y-m-d H:i:s');

		$insertId = $this->authentication_model->addData('lz_user_auth_designer', $data);
		if(empty($insertId)) {

			return '提交失败';

		}

		return '';

	}


	//修改设计师认证
	public function editDesignerAuth($designerAuth, $data) {

		//判断是否重复提交设计师认证
		if($designerAuth['ispass'] == 0) {

			return "您提交的认证信息正在审核中，请勿重复提交";
		}

		$designerAuthId = $designerAuth['id'];
		$arr = explode(',', $designerAuth['individualmaterial']);
		$selfJust = $arr['0'];
		$selfBack = $arr['1'];

		if(!empty($_FILES['workmaterial'])) {

			$res = $this->vailImg('workmaterial');
			if($res['sign'] != 200){

				return $res['msg'];

			}
			$workmaterial = $res['msg'];
			$data['workmaterial'] = $workmaterial;

		}

		if(!empty($_FILES['selfJust'])) {

			$res = $this->vailImg('selfJust');
			if($res['sign'] != 200){

				return $res['msg'];

			}
			$selfJust = $res['msg'];

		}

		if(!empty($_FILES['selfBack'])) {
			
			$res = $this->vailImg('selfBack');
			if($res['sign'] != 200){

				return $res['msg'];

			}
			$selfBack = $res['msg'];

		}

		$data['individualmaterial'] = $selfJust.','.$selfBack;
		$data['ispass'] = 0;

		$where = array('id'=>$designerAuthId);
		$row = $this->authentication_model->edit_table('lz_user_auth_designer', $where, $data);
		if(empty($row)) {

			return '提交失败';

		}

		return '';

	}

	public function brand() {

		$userid = $this->user->userid;
		$res = $this->authentication_model->getRedisData(5,  "userid_".$userid, 'set_user', $userid, array('mobile'));
		$mobile = $res['mobile'];

		$where = array('userid'=>$userid);
		$companyAuth = $this->authentication_model->getRowData('lz_user_auth_company', '*', $where);

		if($this->input->post('frames') == 'yes') {

			if($companyAuth['ispass'] == 1) {
				// echo "您的认证信息已提交，请勿重复提交";
				echo "您已通过申请品牌认证的审核，请勿重复申请";
				return;
			}
			$brandname = $this->input->post('brandname',true);
			$brandfield = $this->input->post('brandfield',true);
			$brandintroduction = $this->input->post('brandintroduction',true);
			$linkman = $this->input->post('linkman',true);
			$phone = $this->input->post('linkphone',true);
			$mailbox = $this->input->post('mailbox',true);
			$website = $this->input->post('website',true);
			$isTure = $this->input->post('isTure',true);

			if(empty($brandname) || empty($brandfield) || empty($brandintroduction) || empty($linkman) ||  empty($mailbox) || empty($isTure)) {
				echo "请务必补全必要资料";
				return;
			}

			$linkphone = $mobile;
			if(!empty($phone)) {
				//验证手机号
				$patrn = "/^((13[0-9])|(14[5-7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/";
				if(!preg_match($patrn, $phone)){
					echo "请填写正确的手机号";
					return;
				}
				$linkphone = $phone;
			}

			//验证邮箱
			$patrn = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/";
			if(!preg_match($patrn, $mailbox)){
				echo "请填写正确的邮箱";
				return;
			}

			if(!empty($website)) {

				if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {

					echo "请填写正确的网站地址";
					return;

				}

			}

			$data= array(
				'userid'=>$userid,//session的用户id
				'brandname'=>$brandname,//session的用户id
				'brandfield'=>$brandfield,
				'brandintroduction'=>$brandintroduction,
				'linkman'=>$linkman,
				'linkphone'=>$linkphone,
				'mailbox'=>$mailbox,
				'website'=>$website
			);

			if(empty($companyAuth)) {//添加企业认证

				$res = $this->addCompanyAuth($data);
				echo $res;
				return;

			}

			//修改企业认证
			$res = $this->editCompanyAuth($companyAuth,$data);
			echo $res;
			return;

		}

		end:
		$authCompany = json_encode($companyAuth);
		$this->assign('authCompany', $authCompany);
		$this->assign('mobile', $mobile);
		$this->display('authentication/authentication.brand.html');

	}

	//添加品牌认证
	public function addCompanyAuth($data) {

		if(empty($_FILES['license'])) {

			return '请上传材料证明';

		}
		$res = $this->vailImg('license');
		if($res['sign'] != 200){

			return $res['msg'];

		}
		$data['license'] = $res['msg'];
		$data['addtime'] = date('Y-m-d H:i:s');

		$insertId = $this->authentication_model->addData('lz_user_auth_company', $data);
		if(empty($insertId)) {

			return '提交失败';

		}

		return '';

	}

	//修改品牌认证
	public function editCompanyAuth($companyAuth,$data) {

		//判断是否重复提交设计师认证
		if($companyAuth['ispass'] == 0) {

			return '您提交的认证信息正在审核中，请勿重复提交';
		}

		if(!empty($_FILES['license'])) {

			$res = $this->vailImg('license');
			if($res['sign'] != 200){

				return $res['msg'];

			}

			$data['license'] = $res['msg'];

		}

		$data['ispass'] = 0;

		$where = array('id'=>$companyAuth['id']);
		$row = $this->authentication_model->edit_table('lz_user_auth_company', $where, $data);
		if(empty($row)) {

			return '提交失败';

		}

		return '';

	}

	//获取城市
	public function getCityData() {

		$flg = $this->input->post('flg');
		$parentid = $this->input->post('parentid');
		$where = array('flg'=>$flg, 'parentid'=>$parentid);//查找省列表
		$city = $this->account_model->getCityData('lz_city', 'code,name', $where, 'code asc');

		echo json_encode(array('code'=>'200','city'=>$city));

	}


	private function vailImg($key) {

		$head_file = 'static/upload/auth';
		$fileurl = $head_file.'/'.date('Ymd').'/';
		if(!is_dir($fileurl)) mkdir($fileurl, 0777, true);
		$config['upload_path'] = $fileurl;//注意：此路劲是相对于CI框架中的根目录下的目录
		$config['allowed_types'] = 'gif|jpg|png|jpeg';    //设置上传的图片格式
		$config['max_size'] = '1024';              //设置上传图片的文件最大值1M
		$config['file_name'] = date('YmdHis', time()).rand(10000, 99999);
		$this->load->library('upload', $config);   //加载CI中的图片上传类，并递交设置的各参数值

		//上传图片失败
		if (!$this->upload->do_upload($key)) {

			$error = $this->upload->display_errors();
			//正则去掉错误提示的p标签
			$error = str_replace("<p>","",$error);
			$error = str_replace("</p>","",$error);
			return array('sign'=>10,'msg'=>$error);

		}

		// 上传OSS
		$pic = $this->upload->data();
		$this->load->library('CI_OSS');
		$bucket = 'lingzan';
		$object = 'auth/'.$pic['file_name'];
		$file = $pic['full_path'];
		$res = $this->ci_oss->uploadFile($bucket, $object, $file);
		$data = $res['oss-request-url'];
		return array('sign'=>200,'msg'=>$data);

	}


}