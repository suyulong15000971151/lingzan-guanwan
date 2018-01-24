<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nim extends MY_controller {

	private $appKey = '18053082e76334b23ff9ae7d9008a21c';
	private $appSecret = 'f815132ece89';

	public function __construct() {

		parent::__construct();

	}

	public function server_test() {

		$action = $this->uri->segment(3);

		if($action == 'user_create') {

			$url = 'https://api.netease.im/nimserver/user/create.action';
			$data = array('accid' => 'hw0611', 'name' => '墨小慈丶0611', 'token' => '123456');

		} elseif($action == 'user_getUinfos') {

			$url = 'https://api.netease.im/nimserver/user/getUinfos.action';
			$data = array('accids' => json_encode(array('hwtest01')));

		} elseif($action == 'team_create') {

			$url = 'https://api.netease.im/nimserver/team/create.action';
			$data = array('tname' => '去死去死团', 'owner' => 'hwtest03', 'members' => json_encode(array('hwtest01', 'hwtest02')), 'msg' => '来嘛', 'magree' => 0, 'joinmode' => 0);

		} else {

			echo "action error";die;

		}

		$header = $this->getHeader();
		$res = $this->curl_post($url, $header, $data);
		var_dump($res);die;

	}

	public function web_test() {

		$this->display('nim/nim.web_test.html');

	}

	public function getHeader(){
		// 构建checksum
		$curtime=time();
		$nonce=rand();
		$checksum=strtolower(sha1($this->appSecret.$nonce.$curtime));
		// 构建header
		$header=array(
			'AppKey:'.$this->appKey,
			'CurTime:'.$curtime,
			'CheckSum:'.$checksum,
			'Nonce:'.$nonce,
			'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
		);
		return $header;
	}

	function curl_post($url, $header, $content){
		$ch = curl_init();
		if(substr($url,0,5)=='https'){
			// 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// 从证书中检查SSL加密算法是否存在
			// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		// 设置允许查看请求头信息
		// curl_setopt($ch,CURLINFO_HEADER_OUT,true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($content));
		$response = curl_exec($ch);
		// 查看请求头信息
		// dump(curl_getinfo($ch,CURLINFO_HEADER_OUT));
		if($error=curl_error($ch)){
			curl_close($ch);
			return $error;
		}else{
			curl_close($ch);
			return $response;
		}
	}
}