<?php
/* Smarty version 3.1.30, created on 2017-11-16 16:19:17
  from "D:\lingzanpc\application\views\templates\login\login.register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0d4a05e84b57_74625939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a56a7cd57f3856e825d25c6943815ea77e7b03d8' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\login\\login.register.html',
      1 => 1510119984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d4a05e84b57_74625939 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>注册</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/register.css" />
	</head>

	<body>
		<div class="log">
			<div class="log-box">
				<div class="content">
					<div class="log-img">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/denglulog.png" alt="" />
					</div>
					<p>创建新账号</p>
					<div class="user">
						<div class="error"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>
						<form method="post" action="">
							<input name="frames" type="hidden" value="yes" />
							<input type="hidden" name="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
							<input type="hidden" name="rtype" value="<?php echo $_smarty_tpl->tpl_vars['rtype']->value;?>
" />
							<input type="hidden" name="ruid" value="<?php echo $_smarty_tpl->tpl_vars['ruid']->value;?>
" />
							<input type="hidden" name="rname" value="<?php echo $_smarty_tpl->tpl_vars['rname']->value;?>
" />
							<input type="hidden" name="rimg" value="<?php echo $_smarty_tpl->tpl_vars['rimg']->value;?>
" />
							<div class="user-name">
								<input type="text" name="nickname" placeholder="输入一个闪亮的昵称" class="nick" value="<?php echo $_smarty_tpl->tpl_vars['rname']->value;?>
" />
								<i></i>
							</div>
							<div class="user-name user-psd">
								<input type="password" name="password" placeholder="输入6-20位密码" class="password" />
								<i></i>
								<span></span>
							</div>
							<div class="user-name user-phone">
								<input type="text" name="mobile" placeholder="支持大陆手机号" class="mobile" />
								<i></i>
							</div>
							<div class="verifical">
								<input type="text" name="verifical" /><button id="send_verifical_mobile" class="yanzheng">发送验证码</button>
							</div>
							<button type="submit" class="regit">立即体验</button>
						</form>
						<div class="tip">
							<span>已有账号？</span>
							<a href="/login">直接登录</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php echo '<script'; ?>
 src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/register.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/myajax.js"><?php echo '</script'; ?>
>
	</body>

</html><?php }
}
