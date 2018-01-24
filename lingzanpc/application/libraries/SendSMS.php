<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendSMS {

	private $url = 'http://www.139000.com/send/gsend.asp';
	private $name = 'lingmedia';
	private $pwd = 'ling6468';
	private $_CI;

	public function __construct() {
		$this->_CI =& get_instance();
	}

	public function send($phone, $msg) {
		$msg = iconv('UTF-8', 'GBK', $msg);
		$url = $this->url."?name={$this->name}&pwd={$this->pwd}&dst={$phone}&msg={$msg}";
		$this->_CI->load->library('Curl');
		return $this->_CI->curl->get($url);
	}
}