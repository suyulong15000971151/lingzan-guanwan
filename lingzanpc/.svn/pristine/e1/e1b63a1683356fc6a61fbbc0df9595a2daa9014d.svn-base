<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/OSS/autoload.php';
use OSS\OssClient;
use OSS\Core\OssException;

class CI_OSS {

	private $_CI;
	private $_oss;

	public function __construct() {
		$this->_CI =& get_instance();
		$this->_CI->load->config('oss');
		$config = $this->_CI->config->item('oss');

		if(empty($this->_oss)) {
			$this->_oss = new OssClient($config['accessKeyId'], $config['accessKeySecret'], $config['endpoint']);
		}
		return $this->_oss;
	}

	/**
	 * @name 使用魔术方法捕获所有未注册方法
	 */
	public function __call($method, $arg_array) {
		return call_user_func_array(array($this->_oss, $method), $arg_array);
	}
}