<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/aliyuncs/aliyun-php-sdk-core/Config.php';
use Green\Request\V20170112 as Green;

class CI_Scan {

	private $_CI;
	private $_scan;

	public function __construct() {

		$this->_CI =& get_instance();
		$this->_CI->load->config('oss');
		$config = $this->_CI->config->item('oss');

		if(empty($this->_scan)) {

			$iClientProfile = DefaultProfile::getProfile("cn-shanghai", $config['accessKeyId'], $config['accessKeySecret']);
			DefaultProfile::addEndpoint("cn-shanghai", "cn-shanghai", "Green", "green.cn-shanghai.aliyuncs.com");
			$this->_scan = new DefaultAcsClient($iClientProfile);

		}

		return $this->_scan;
	}

	public function textScan($text) {

		$request = new Green\TextScanRequest();
		$request->setMethod("POST");
		$request->setAcceptFormat("JSON");

		$task1 = array('dataId' => uniqid(), 'content' => $text);
		$request->setContent(json_encode(array("tasks" => array($task1), "scenes" => array("antispam"))));

		$response = $this->_scan->getAcsResponse($request);

		return $response;
	}

	public function imageSyncScan($image) {

		$request = new Green\ImageSyncScanRequest();
		$request->setMethod("POST");
		$request->setAcceptFormat("JSON");

		$task1 = array('dataId' => uniqid(), 'url' => $image, 'time' => round(microtime(true)*1000));
		$request->setContent(json_encode(array("tasks" => array($task1), "scenes" => array("porn"))));

		$response = $this->_scan->getAcsResponse($request);

		return $response;

	}
}