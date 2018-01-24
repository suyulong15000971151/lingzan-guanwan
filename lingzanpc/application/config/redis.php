<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default connection group
$config['redis_default']['host'] = '106.14.252.75';
$config['redis_default']['port'] = '6386';
$config['redis_default']['auth'] = 'Lingzan2017';
$config['redis_default']['timeout'] = 10;

$config['redis_slave']['host'] = '';
$config['redis_slave']['port'] = '6379';
$config['redis_slave']['auth'] = '';