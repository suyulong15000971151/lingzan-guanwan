<?php
/* Smarty version 3.1.30, created on 2018-01-15 14:34:49
  from "D:\lingzanpc\application\views\templates\general\general.header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5c4b89bb7ae6_89329289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2fb20f6182d1e7ed4b558ab388247307dcfb2fa' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\general\\general.header.html',
      1 => 1515998039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5c4b89bb7ae6_89329289 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>瓴赞网 - 让好设计走进我们的生活</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/bgstyle.css" media="screen" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/calendar.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />

		<!--<?php echo '<script'; ?>
 type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.banner.revolution.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/banner.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar-zh.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar-setup.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
>
	</head>

	<body>
		<!--每天签到-->
		<div id="day">
			<div class="day-box">
				<div class="content">
					<div class="title">
						<h2>每天累计签到</h2><i></i>
					</div>
					<div class="every">
						<div class="day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] <= 5) {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
							<p>连续签到领赞积分递增 最高为25分</p>
							<ul>
								<li>
									<div class="every-day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 1) {?>style="background:rgb(5, 92, 252);"<?php }?>>第一天</div>
									<span <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 1) {?>style="color:rgb(5, 92, 252);background:url('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/acfen_03.png') 46px 50% / 15px no-repeat;"<?php }?>>+5</span>
								</li>
								<li>
									<div class="every-day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 2) {?>style="background:rgb(5, 92, 252);"<?php }?>>第二天</div>
									<span <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 2) {?>style="color:rgb(5, 92, 252);background:url('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/acfen_03.png') 46px 50% / 15px no-repeat;"<?php }?>>+10</span>
								</li>
								<li>
									<div class="every-day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 3) {?>style="background:rgb(5, 92, 252);"<?php }?>>第三天</div>
									<span <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 3) {?>style="color:rgb(5, 92, 252);background:url('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/acfen_03.png') 46px 50% / 15px no-repeat;"<?php }?>>+15</span>
								</li>
								<li>
									<div class="every-day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 4) {?>style="background:rgb(5, 92, 252);"<?php }?>>第四天</div>
									<span <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 4) {?>style="color:rgb(5, 92, 252);background:url('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/acfen_03.png') 46px 50% / 15px no-repeat;"<?php }?>>+20</span>
								</li>
								<li>
									<div class="every-day" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 5) {?>style="background:rgb(5, 92, 252);"<?php }?>>第五天</div>
									<span <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] >= 5) {?>style="color:rgb(5, 92, 252);background:url('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/acfen_03.png') 46px 50% / 15px no-repeat;"<?php }?>>+25</span>
								</li>
							</ul>
						</div>
						<div class="prompt" <?php if ($_smarty_tpl->tpl_vars['user']->value['signcount'] > 5) {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/laught_03.png" alt="" />
							<p><i>你连续签到</i><span><?php echo $_smarty_tpl->tpl_vars['user']->value['signcount'];?>
</span><i>天啦！保持签到每天可以继续领取</i><span>25</span><i>积分</i></p>
						</div>
						<div class="coin">
							<?php if ($_smarty_tpl->tpl_vars['signflg']->value) {?><div class="report">今日签到</div><?php } else { ?><div class="report" style="background:#82adfd;">已经签到</div><?php }?>
							<div class="explain">
								<div class="tian">
									<span><?php echo $_smarty_tpl->tpl_vars['user']->value['totalsigncount'];?>
天</span>
									<p>共累计签到</p>
								</div>
								<div class="shu">
									<span><?php echo $_smarty_tpl->tpl_vars['user']->value['totalsignpoint'];?>
分</span>
									<p>共累计获得</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--这里是积分弹窗-->
		<div id="integral">
			<div class="integral-box">
				<div class="content">
					<div class="title">
						<span>我的积分</span><i></i>
					</div>
					<div class="left">
						<ul>
							<li class="active">领赞积分</li>
							<li>赚取积分</li>
							<li>积分明细</li>
							<li>积分规则</li>
						</ul>
					</div>
					<div class="right">
						<!--一这里是领赞积分-->
						<div class="current points">
							<p>当前积分</p>
							<h1><?php echo $_smarty_tpl->tpl_vars['user']->value['point'];?>
</h1>
							<div class="beat"><span>打败了</span><i><?php echo $_smarty_tpl->tpl_vars['user']->value['pointpot'];?>
%</i><span>的领赞会员</span></div>
							<div class="day">
								<span></span><i>每天签到</i>
							</div>
						</div>
						<!--二这里是赚取积分相对内容-->
						<div class="earn points">
							<ul>
								<li>
									<div class="symbol">
										<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/earn_03.png" alt="" />
									</div>
									<div class="symbol-con">
										<h2>设计师认证</h2>
										<div class="info"><span>申请领赞认证设计师，审核通过即可获得</span><i>500</i><span>积分</span></div>
										<a href="/authentication/designer">即刻申请</a>
									</div>
								</li>
								<li>
									<div class="symbol">
										<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/earn_06.png" alt="" />
									</div>
									<div class="symbol-con">
										<h2>发布笔记,产品,项目</h2>
										<div class="info"><span>上传你最得意，最喜欢的作品，获取丰厚的积分回报</span></div>
										<a href="/member/library">我要发布</a>
									</div>
								</li>
								<li>
									<div class="symbol">
										<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/earn_08.png" alt="" />
									</div>
									<div class="symbol-con">
										<h2>撰写评论及留言</h2>
										<div class="info"><span>动动手指，尽享优惠惊喜</span></div>
										<a href="/library/project/78">我要评论</a>
									</div>
								</li>
							</ul>
						</div>
						<!--第三个积分明细-->
						<div class="detail points">
							<div class="detail-box">
								<div class="top">
									<div class="get">
										<span>积分获得</span><i id="positive">+<?php echo $_smarty_tpl->tpl_vars['pointlog2']->value['positive'];?>
</i>
									</div>
									<div class="expend">
										<span>积分支出</span><em id="negative"><?php echo $_smarty_tpl->tpl_vars['pointlog2']->value['negative'];?>
</em>
									</div>
									<div class="date">
										<input type="text" id="EntTime" name="EntTime" placeholder="<?php echo $_smarty_tpl->tpl_vars['logtime']->value;?>
" onclick="return showCalendar('EntTime', 'y-mm-dd');" onblur="return showSignLog('EntTime')" />
									</div>
								</div>
								<div class="sub-com">
									<ul>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pointlog']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
										<li><span><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</span> <i><?php if ($_smarty_tpl->tpl_vars['item']->value['point'] > 0) {?>+<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['point'] < 0) {
}
echo $_smarty_tpl->tpl_vars['item']->value['point'];?>
</i></li>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</ul>
								</div>
							</div>
						</div>
						<!--第四积分规则-->
						<!--<table border="" cellspacing="" cellpadding="">
							<tr><th>Header</th></tr>
							<tr><td>Data</td></tr>
						</table>-->
						<div class="rule points">
							<h1>积分获取规则</h1>
							<table cellpadding="3px" cellspacing="0">
								<thead>
									<tr>
										<th>类别</th>
										<th>项目</th>
										<th>评分内容</th>
										<th>单次数量</th>
										<th>日上限</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>注册行为</td>
										<td>个人用户注册</td>
										<td>手机认证，邮箱认证</td>
										<td class="blu">500</td>
									</tr>
									<tr>
										<td></td>
										<td>设计社认证(审核通过)</td>
										<td></td>
										<td class="blu">500</td>
									</tr>
									<tr>
										<td class="line"></td>
										<td class="line">商家认证(审核通过)</td>
										<td class="line"></td>
										<td class="line blu">0</td>
										<td class="line">0</td>
									</tr>

									<tr>
										<td>发布行为</td>
										<td>发布笔记</td>
										<td></td>
										<td class="blu">5</td>
										<td>25</td>
									</tr>
									<tr>
										<td></td>
										<td>发布产品</td>
										<td></td>
										<td class="blu">5</td>
										<td>25</td>
									</tr>
									<tr>
										<td class="line"></td>
										<td class="line">发布项目</td>
										<td class="line"></td>
										<td class="line blu">5</td>
										<td class="line">25</td>
									</tr>

									<tr>
										<td>评价</td>
										<td>对产品评价</td>
										<td>六字以上</td>
										<td class="blu">5</td>
										<td>25</td>
									</tr>
									<tr>
										<td></td>
										<td>对项目的评价</td>
										<td>六字以上</td>
										<td class="blu">2</td>
										<td>25</td>
									</tr>
									<tr>
										<td class="line"></td>
										<td class="line">对(商家)商品评价</td>
										<td class="line">六字以上</td>
										<td class="line blu">2</td>
										<td class="line">25</td>
									</tr>

									<tr>
										<td>签到</td>
										<td>每天签到</td>
										<td>连续签到积分递增</td>
										<td class="blu">5、10、15</td>
										<td>25</td>
									</tr>
									<tr>
										<td class="line"></td>
										<td class="line"></td>
										<td class="line">最高为25分</td>
										<td class="blu line">20、25</td>
										<td class="line">25</td>
									</tr>
								</tbody>
							</table>
							<h2>积分消费规则</h2>
							<div class="buckle"><span>转采他人项目时</span><i>(项目)</i></div>
							<div class="buckle"><span>转采普通会员项目</span><i>扣除250积分</i></div>
							<div class="buckle"><span>转采设计师项目</span><i>扣除500积分</i></div>
							<div class="buckle"><span>积分商城兑</span><i>(二期)</i></div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--这里是私信弹窗-->
		<div id="letter">
			<div class="letter-box">
				<div class="content">
					<div class="title">
						<span>私信</span><em id="chat_uname">造物社</em><i></i>
					</div>
					<div id="chat_container" class="containerh">

					</div>

					<!--这里是发表说说-->
					<div class="publish">
						<div class="say">
							<img src="<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" alt="" />
							<input type="text" id="chat_content" />
						</div>
						<input type="hidden" id="chat_userid2" value="" />
						<button id="send_chat">发送</button>
					</div>
				</div>
			</div>
		</div>

		<!--这是头部-->
		<header>
			<div class="log">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/log.png" alt="" />
			</div>
			<div class="nav">
				<a href="/" <?php if ($_smarty_tpl->tpl_vars['clas']->value == 'home') {?>class="active"<?php }?>>发现</a>
				<!-- <a href="/find" <?php if ($_smarty_tpl->tpl_vars['clas']->value == 'find') {?>class="active"<?php }?>>发现</a> -->
				<a href="/collection" <?php if ($_smarty_tpl->tpl_vars['clas']->value == 'collection') {?>class="active"<?php }?>>产品</a>
				<a href="/library" <?php if ($_smarty_tpl->tpl_vars['clas']->value == 'library') {?>class="active"<?php }?>>项目</a>
				<a href="/search" <?php if ($_smarty_tpl->tpl_vars['clas']->value == 'search') {?>class="active"<?php }?> style="padding:0;"><span></span></a>
			</div>
			<div class="right">
				<!--这里是签到-->
				<!--<div class="sign">
					<p>签到</p>
					<strong></strong>
				</div>-->
				<!--这里是创作-->
				<div class="addmin">
					<p><em>创作</em></p>
					<!--<span>1</span>-->
					<!--这是导航项目管理下面的下拉-->
					<div class="library">
						<div class="libra-box">
							<strong></strong>
							<ul>
								<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
">
								<!-- <a href="javascript:void(0)" onClick="jumpPopup(1)"> -->
									<li class="creater">创建项目</li>
								</a>
								<a href="/member/collection/<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
">
								<!-- <a href="javascript:void(0)" onClick="jumpPopup(2)"> -->
									<li class="product">上传产品</li>
								</a>
								<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
">
								<!-- <a href="javascript:void(0)" onClick="jumpPopup(3)"> -->
									<li class="Release">发布笔记</li>
								</a>
							</ul>
						</div>
					</div>
				</div>
				<!--这里是导航栏消息-->
				<div class="item">
					<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/item_03.png" alt="" />
					<span id="ctt"><?php echo $_smarty_tpl->tpl_vars['msg']->value['totalcount'];?>
</span>
					<!--这里是消息的下拉和里面内容效果-->
					<div id="new">
						<div class="new-box">
							<div class="square"></div>
							<!--这是消息主菜单-->
							<div class="new-nav">
								<div class="new-title">
									<div class="navs message act">
										<p>消息</p><i></i></div>
									<div class="navs letter">
										<p>私信</p><i></i></div>
								</div>
								<div class="new-content">
									<ul class="first">
										<li>
											<i style="display: inline;position: absolute;width:22px;height:21px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/itemcaisi_03.png) no-repeat;background-size: 100% 100%;margin:14px 15px 0"></i>
											<p>项目</p>
											<em><?php echo $_smarty_tpl->tpl_vars['msg']->value['librarycount'];?>
</em>
										</li>
										<li>
											<i style="display: inline;position: absolute;width:22px;height:21px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/itemcaiji.png) no-repeat;background-size: 100% 100%;margin:14px 15px 0"></i>
											<p>产品</p>
											<em><?php echo $_smarty_tpl->tpl_vars['msg']->value['productcount'];?>
</em>
										</li>
										<li>
											<i style="display: inline;position: absolute;width:22px;height:21px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/itemzan.png) no-repeat;background-size: 100% 100%;margin:14px 15px 0"></i>
											<p>点赞</p>
											<em><?php echo $_smarty_tpl->tpl_vars['msg']->value['zancount'];?>
</em>
										</li>
										<li>
											<i style="display: inline;position: absolute;width:22px;height:21px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/itemping_03.png) no-repeat;background-size: 100% 100%;margin:14px 15px 0"></i>
											<p>评论</p>
											<em><?php echo $_smarty_tpl->tpl_vars['msg']->value['commentcount'];?>
</em>
										</li>
										<li>
											<i style="display: inline;position: absolute;width:22px;height:21px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/itemtong_03.png) no-repeat;background-size: 100% 100%;margin:14px 15px 0"></i>
											<p>通知</p>
											<em><?php echo $_smarty_tpl->tpl_vars['msg']->value['noticecount'];?>
</em>
										</li>
										<strong>全部标记为已读</strong>
									</ul>
									<!--这里是消息主菜单私信-->
									<div class="letter-box">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chat']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
										<div class="letter-item">
											<div class="letter-title">
												<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
												<i><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</i>
											</div>
											<div class="letter-new" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid2'];?>
" data-uname="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
">
												<p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
												<i><?php echo $_smarty_tpl->tpl_vars['item']->value['sendtime'];?>
</i>
												<em>回复</em>
											</div>
										</div>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</div>
								</div>
							</div>
							<!--这是消息子菜单项目-->
							<div class="newsub-mater">
								<div class="mater-title">
									<i class="new-back"></i>
									<p>项目</p>
								</div>
								<div class="mater-content">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value['library'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
									<div class="mater-item">
										<div class="peson-box">
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_avatar'];?>
" alt="" />
											<i></i>
										</div>
										<div class="text-box">
											<p title="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];
echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];?>
</em><i><?php echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的</i><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</em></p>
											<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</strong>
										</div>
										<b data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></b>
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</div>
							</div>
							<!--这是消息子菜蛋采集-->
							<div class="newsub-mater">
								<div class="mater-title">
									<i class="new-back"></i>
									<p>产品</p>
								</div>
								<div class="mater-content">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value['product'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
									<div class="mater-item">
										<div class="peson-box">
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_avatar'];?>
" alt="" />
											<i></i>
										</div>
										<div class="text-box">
											<p title="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];
echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];?>
</em><i><?php echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的</i><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</em></p>
											<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</strong>
										</div>
										<b data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></b>
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</div>
							</div>
							<!--这是消息子菜单点赞-->
							<div class="newsub-mater">
								<div class="mater-title">
									<i class="new-back"></i>
									<p>点赞</p>
								</div>
								<div class="mater-content">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value['zan'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
									<div class="mater-item">
										<div class="peson-box">
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_avatar'];?>
" alt="" />
											<i></i>
										</div>
										<div class="text-box">
											<p title="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];
echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];?>
</em><i><?php echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的</i><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</em></p>
											<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</strong>
										</div>
										<b data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></b>
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</div>
							</div>
							<!--这是消息子菜单评论-->
							<div class="newsub-mater">
								<div class="mater-title">
									<i class="new-back"></i>
									<p>评论</p>
								</div>
								<div class="mater-content">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value['comment'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
									<div class="mater-item">
										<div class="peson-box">
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_avatar'];?>
" alt="" />
											<i></i>
										</div>
										<div class="text-box">
											<p title="<?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];
echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_username'];?>
</em><i><?php echo $_smarty_tpl->tpl_vars['item']->value['action_detail_name'];?>
了你的</i><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</em></p>
											<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</strong>
										</div>
										<b data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></b>
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</div>
							</div>
							<!--这是消息子菜单通知-->
							<div class="newsub-mater tongzhi">
								<div class="mater-title">
									<i class="new-back"></i>
									<p>通知</p>
								</div>
								<div class="out-box">
									<div class="letter-box">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msg']->value['notice'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
										<?php if ($_smarty_tpl->tpl_vars['item']->value['action_detail'] == 51) {?>
										<div class="letter-item">
											<div class="letter-title">
												<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/chuanwen_03.png" alt="" />
												<i>瓴点传媒</i>
											</div>
											<div class="letter-new">
												<p><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</p>
												<i><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</i>
											</div>
										</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['action_detail'] == 52) {?>
										<div class="mater-item">
											<div class="peson-box">
												<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
												<i></i>
											</div>
											<div class="text-box">
												<p class="result_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
想要添加你为好友"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</em><i>想要添加你为好友</i></p>
												<?php if ($_smarty_tpl->tpl_vars['item']->value['res'] == 0) {?>
												<a href="javascript:void(0)" class="examine" onClick="examineFriend(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sid'];?>
,2)">拒绝</a>
												<a href="javascript:void(0)" class="examine" onClick="examineFriend(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sid'];?>
,1)">接受</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['res'] == 1) {?>
												<a href="javascript:void(0)" class="accept">已接受</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['res'] == 2) {?>
												<a href="javascript:void(0)" class="reject">已拒绝</a>
												<?php }?>
											</div>
											<b></b>
										</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['action_detail'] == 53) {?>
										<div class="mater-item">
											<div class="peson-box">
												<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
												<i></i>
											</div>
											<div class="text-box">
												<p class="result_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
想要邀请你加入项目<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
"><em><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</em><i>想要邀请你加入项目</i><em><?php echo $_smarty_tpl->tpl_vars['item']->value['action_sname'];?>
</em></p>
												<a href="javascript:void(0)" class="examine" onClick="examineProject(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sid'];?>
,2)">拒绝</a>
												<a href="javascript:void(0)" class="examine" onClick="examineProject(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['action_sid'];?>
,1)">接受</a>
											</div>
											<b></b>
										</div>
										<?php }?>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!--这里是导航栏个人-->
				<div class="person">
					<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" alt="" />
					<span></span>
					<!--这是下面下拉的效果按钮-->
					<div id="person">
						<div class="title">
							<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" alt="" style="float:left;"/>
							<em class="text" style="float:left;"><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</em>
							<b style="font-size:15px;font-weight:normal;float:left;line-height: 100px;">(<?php echo $_smarty_tpl->tpl_vars['user']->value['x_index'];?>
,<?php echo $_smarty_tpl->tpl_vars['user']->value['y_index'];?>
)</b>
							<?php if ($_smarty_tpl->tpl_vars['user']->value['groupid'] == 0 && $_smarty_tpl->tpl_vars['authDesigner1']->value == array()) {?>
							<i><a href="/authentication/designer">认证？</a></i>
							<?php }?>
						</div>
						<div class="pson-sub">
							<a href="/member/library">
								<div class="colect">
									<p><?php echo $_smarty_tpl->tpl_vars['count1']->value['sLibCount']+$_smarty_tpl->tpl_vars['count1']->value['pLibCount']+$_smarty_tpl->tpl_vars['count1']->value['fLibCount'];?>
</p>
									<em>项目</em>
								</div>
							</a>
							<a href="/member/collection">
								<div class="colect">
									<p><?php echo $_smarty_tpl->tpl_vars['user']->value['productcount'];?>
</p>
									<em>产品</em>
								</div>
							</a>
							<a href="/member/note">
								<div class="colect">
									<p><?php echo $_smarty_tpl->tpl_vars['user']->value['notecount']+$_smarty_tpl->tpl_vars['count1']->value['fNotCount'];?>
</p>
									<em>笔记</em>
								</div>
							</a>
							<a href="/member/friend">
								<div class="colect">
									<p><?php echo $_smarty_tpl->tpl_vars['user']->value['followcount']+$_smarty_tpl->tpl_vars['user']->value['fanscount']+$_smarty_tpl->tpl_vars['user']->value['friendcount'];?>
</p>
									<em>人脉</em>
								</div>
							</a>
						</div>
						<div class="list">
							<a href="javascript:;" class="sig">我的积分</a>
							<a href="/account">账户管理</a>
							<a href="/member/settag1">兴趣设置</a>
							<a href="/service">新手教程</a>
							<a href="/login/logout">注销</a>
						</div>
					</div>
				</div>
			</div>
		</header>
	<?php echo '<script'; ?>
>
	function examineFriend(msgId,action_sid,res) {
		$.ajax({
			url:'/member/examineFriend',
			type:"post",
			data:{msgId:msgId,action_sid:action_sid,res:res},
			success:function(ret){
				if(ret != ''){
					var jsonarray = eval('('+ret+')');
					var msg = jsonarray.msg;
					var code = jsonarray.code;
					// alert(msg);
					if(code == 200) {
						$('.result_'+msgId).next('a').remove();
						$('.result_'+msgId).next('a').remove();
						if(res == 1) {
							var html = '<a href="javascript:void(0)">已接受</a>';
							$('.result_'+msgId).after(html);
						}else{
							var html = '<a href="javascript:void(0)">已拒绝</a>';
							$('.result_'+msgId).after(html);
						}
					}else{
						alert(msg);
					}
				}
			}, 
			error:function(){
				alert('网络异常，请稍后再试');
				return false;
			}
		})
	}
	function examineProject(msgId,action_sid,res) {
		$.ajax({
			url:'/ajax/examineProject',
			type:"post",
			async: false,
			data:{msgId:msgId,action_sid:action_sid,res:res},
			timeout: 5000,
			dataType: 'json',
			success:function(ret){
				if(ret != ''){
					var code = ret.errcode;
					var msg = ret.errmsg;
					// alert(msg);
					if(code == 200) {
						$('.result_'+msgId).next('a').remove();
						$('.result_'+msgId).next('a').remove();
						if(res == 1) {
							var html = '<a href="javascript:void(0)">已接受</a>';
							$('.result_'+msgId).after(html);
						}else{
							var html = '<a href="javascript:void(0)">已拒绝</a>';
							$('.result_'+msgId).after(html);
						}
					}else{
						alert(msg);
					}
				}
			}, 
			error:function(){
				alert('网络异常，请稍后再试');
				return false;
			}
		})
	}
	function isEmptyObject(e) {
		var t;
		for (t in e)
			return !1;
		return !0;
	}

	//点击页面跳转并弹窗
	// function jumpPopup(sign){
	// 	if(sign == 1){
			// $('html').load("/member/library", function(){
				// $(window).scrollTop(0);
				// $('body').css("overflow", 'hidden');
				// $("#pick").css('display', 'block');
				// createWindowOpen();

			// });
		// }else if(sign == 2){
			// $('html').load("/member/collection", function(){
				// $(window).scrollTop(0);
				// $('body').css("overflow",'hidden');
				// $("#pick").css('display','block');
				// addProductPopup();
			// });
		// }else{
			// $('html').load("/member/note", function(){
				// $(window).scrollTop(0);
				// $('body').css("overflow", 'hidden');
				// $("#note").css('display', 'block');
				// addWindowOpen();
			// });
		// }

	// }

	<?php echo '</script'; ?>
><?php }
}
