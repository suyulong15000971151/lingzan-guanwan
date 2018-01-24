<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends MY_controller {

	public function __construct() {

		$this->_class = 'general';
		parent::__construct();

		//$this->load->model('general_model');

	}

	public function header() {

		$this->display('general/general.header.html');

	}
}