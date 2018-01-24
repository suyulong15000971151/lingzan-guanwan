<?php
/* Smarty version 3.1.30, created on 2017-11-30 15:50:40
  from "D:\lingzanpc\application\views\templates\login\login.invite.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1fb850146bb3_52252136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b74fd8ec513ae375053b90515a93960bfbde0213' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\login\\login.invite.html',
      1 => 1512027620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1fb850146bb3_52252136 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>邀请</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/invitation.css"/>
	</head>
	<body>
		<div class="request">
			<div class="request-box">
				<div class="title">
					<span><?php if ($_smarty_tpl->tpl_vars['proid']->value == 0) {?> 好友邀请 <?php } else { ?> 项目邀请 <?php }?></span><i>拒绝</i>
				</div>
				<div class="request-con">
					<div class="prompt">
						<?php if ($_smarty_tpl->tpl_vars['proid']->value == 0) {?>
						<em>" 某某 "室内设计师</em><span>邀请你注册</span><em>瓴赞网</em><span></span>
						<?php } else { ?>
						<em>" 某某 "室内设计师</em><span>邀请你参与</span><em>“西溪酒店-IF01VIP套房”</em><span>项目的调整</span>
						<?php }?>
					</div>
					<p>点击下方按钮，赶紧加入吧！</p>
						<div class="subs">
							<button onclick="window.location.href='/login/index?proid=<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
'">已有账户登录</button>
							<button onclick="window.location.href='/login/register?proid=<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
'">新账号注册</button>
						</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
