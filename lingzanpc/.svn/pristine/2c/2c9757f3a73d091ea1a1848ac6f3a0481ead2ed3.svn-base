<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Redis {

	private $_CI;
	private $_redis;

	public function __construct() {
		$this->_CI =& get_instance();
		$this->_CI->load->model('redis_model');
		$this->_CI->load->config('redis');
		$config = $this->_CI->config->item('redis_default');

		if(empty($this->_redis)) {
			$this->_redis = new Redis();
			$this->_redis->connect($config['host'], $config['port'], $config['timeout']);
			$this->_redis->auth($config['auth']);
		}
		return $this->_redis;
	}

	/**
	 * @name 选择数据库标号
	 */
	public function getinstance($slice) {
		$this->_redis->select($slice);
		return $this->_redis;
	}

	/**
	 * @name 使用魔术方法捕获所有未注册方法
	 */
	public function __call($method, $arg_array) {
		return call_user_func_array(array($this->_redis, $method), $arg_array);
	}
}