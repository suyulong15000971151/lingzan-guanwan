<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends MY_controller {

	public function __construct() {

		$this->_class = 'note';
		parent::__construct();

		$this->load->model('note_model');

	}

	/**
	 * 单品列表页
	 */
	public function info() {

		$noteid = (int) $this->uri->segment(3) ? $this->uri->segment(3) : redirect('/home');
		//查询这个文章的内容
		$redis_key = "noteid_".$noteid;
		$arr = array('noteid','userid','notename','content','cover','commentcount','zancount','isshowcover','addtime');
		$data = $this->note_model->getRedisData(9, $redis_key, 'set_note', $noteid, $arr);

		//获取文章的点赞
		$where = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 3, 'action_sid' => $noteid);
		$msg = $this->note_model->getData('lz_msg', 'id', $where);
		$data['alreadyZan'] = 0;
		if(!empty($msg)) {
			$data['alreadyZan'] = 1;
		}

		//查询这个文章的评论
		$where = array('sourcetype'=>3,'sourceid'=>$noteid);
		$comment = $this->note_model->getTableData('lz_comment', $select = 'userid,comment,addtime', $where, 'id desc');
		$arr = array('nickname','avatar');
		foreach ($comment as $k => $v) {
			$userid = $v['userid'];
			$redis_key = 'userid_'.$userid;
			$user = $this->note_model->getRedisData(5, $redis_key, 'set_user', $userid, $arr);
			$comment[$k]['nickname'] = $user['nickname'];
			$comment[$k]['avatar'] = $user['avatar'];
		}

		//查询这个文章的作者的头像昵称
		$userid = $data['userid'];
		$redis_key = 'userid_'.$userid;
		$userInfo = $this->note_model->getRedisData(5, $redis_key, 'set_user', $userid, $arr);

		// var_dump($data);
		$content = json_decode($data['content'],true);
		$this->assign('data', $data);
		$this->assign('content', $content);
		$this->assign('comment', $comment);
		$this->assign('userInfo', $userInfo);
		$this->display('note/note.info.html');

	}

	//点赞笔记
	public function fabulous() {

		$noteid = $this->input->post('noteid');
		$puserid = $this->input->post('puserid');

		if(!is_numeric($noteid)) {
			echo json_encode(array('code'=>-2001,'msg'=>'参数错误'));
			return false;
		}

		//判断是否重复点赞
		$data = array('action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 3, 'action_sid' => $noteid);
		if(!$this->note_model->check_msg($data)) {

			echo json_encode(array('code'=>-2002,'msg'=>'重复点赞'));
			return;

		}

		$where = array('noteid'=>$noteid);
		$row = $this->note_model->changeField('lz_note',array( 'zancount'=>'+ 1'), $where);
		if(empty($row)){

			echo json_encode(array('code'=>-2003,'msg'=>'点赞失败'));
			return;
		}

		$row = $this->redis_model->set_note($noteid);
		if(empty($row)) {

			echo json_encode(array('code'=>-2004,'msg'=>'操作redis失败,请联系管理员'));
			return;

		}

		// 通知用户
		$msg = array('userid' => $puserid, 'action' => 3, 'action_detail' => 31, 'action_userid' => $this->user->userid, 'action_stype' => 3, 'action_sid' => $noteid, 'isread' => 0, 'addtime' => date('Y-m-d H:i:s'));
		$msgId = $this->note_model->addData('lz_msg', $msg);
		if(empty($msgId)) {
			echo json_encode(array('code'=>-2005,'msg'=>'点赞失败'));
			return;
		}

		echo json_encode(array('code'=>200,'msg'=>'点赞成功'));


	}

}