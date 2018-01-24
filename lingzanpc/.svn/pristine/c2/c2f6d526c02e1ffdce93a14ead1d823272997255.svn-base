<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat {

	private $_CI;
	private $config;

	public function __construct() {

		$this->_CI =& get_instance();
		$this->_CI->load->config('wechat');
		$this->config = $this->_CI->config->item('wechat_open');

	}

	public function redirect_to_login() {

		$redirect_uri = "http://test2.lingzan.net/login/login_wechat";
		$redirect = "https://open.weixin.qq.com/connect/qrconnect?appid={$this->config['appid']}&redirect_uri=".urlencode($redirect_uri)."&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect";
		redirect($redirect);

	}

	public function access_token($code) {

		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->config['appid']}&secret={$this->config['appsecret']}&code={$code}&grant_type=authorization_code";
		return file_get_contents($url);

	}

	public function get_user($access_token) {

		$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token['access_token']}&openid={$access_token['openid']}";
		return file_get_contents($url);

	}
}