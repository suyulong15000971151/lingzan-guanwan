<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	//添加用户时设置的字段验证规则
    'mine/nickname' => array(
        array(
            'field' => 'nickname',
            'label' => '昵称',
            'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]/u]|min_length[2]|max_length[20]|is_unique[lz_user.nickname]'
        )
        // array(
        //     'field' => 'password',
        //     'label' => '密码',
        //     'rules' => 'trim|required|alpha_dash|min_length[6]|max_length[12]'
        // ),
        // array(
        //     'field' => 'passconf',
        //     'label' => '确认密码',
        //     'rules' => 'trim|required|matches[password]'
        // ),
        // array(
        //     'field' => 'email',
        //     'label' => '邮箱',
        //     'rules' => 'trim|required|valid_email|is_unique[users.email]'
        // )
    ),
    'mine/autograph' => array(
        array(
            'field' => 'signature',
            'label' => '个性签名',
            'rules' => 'trim|required'
        )
    ),
    'mine/password' => array(
        array(
            'field' => 'oldPsw',
            'label' => '旧密码',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|required|alpha_dash|min_length[6]|max_length[12]'
        ),
        array(
            'field' => 'againPsw',
            'label' => '确认密码',
            'rules' => 'trim|required|matches[password]'
        )
    ),
    'mine/feedback' => array(
        array(
            'field' => 'content',
            'label' => '反馈内容',
            'rules' => 'trim|required'
        )
    )
);

//更改错误定界符
$config['error_prefix'] = '';
$config['error_suffix'] = '';