<?php
/* Smarty version 3.1.30, created on 2017-11-20 13:45:43
  from "D:\lingzanpc\application\views\templates\login\login.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a126c0705d596_38357883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '691f30322a240305bcb5fb16a082783a828facaa' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\login\\login.index.html',
      1 => 1511156725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a126c0705d596_38357883 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>登录</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/log.css" />
	</head>

	<body>
		<div class="log">
			<div class="log-box">
				<div class="content">
					<div class="log-img">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/denglulog.png" alt="" />
					</div>
					
					<div class="user">
						<div class="error"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>
						<form method="post" action="/login">
							<input name="frames" type="hidden" value="yes" />
							<input type="hidden" name="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
							<div class="user-phone">
								<input type="text" name="mobile" placeholder="请输入手机号" class="mobile" />
								<i></i>
							</div>
							<div class="user-phone user-psd">
								<input type="password" name="password" placeholder="请输入密码" class="password"/>
								<i></i>
							</div>
							<div class="expain">
								<a href="/login/forget" class="forget">忘记密码？</a>
								<a href="/login/register" class="resigin">免费注册</a>
							</div>
							<button type="submit" class="regit">登录</button>
						</form>
						<p style="position: relative;height:70px;line-height: 115px;">欢迎回来</p>
						<!--这里是第三方登录-->
						<div class="third-log">
							<a href="/login/login_qq"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/qq.png" alt="" /></a>
							<a href="/login/login_sina"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/weibo.png" alt="" /></a>
							<a href="/login/login_wechat"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/weixin.png" alt="" /></a>
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
/js/log.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			//这是密码验证	
			function pss(str) {
				if(str == '') {
//					alert("密码不能为空")
					$(".error").text("密码不能为空")
					return false
				} else {
					var reg = /^[\w]{6,12}$/
						//						以1开始后面加10位数字
					if(reg.test(str)) {
					return true
						
						
					} else {
					$(".error").text("密码格式错误！")
					return false
						
					}
				}
			}

			$('button.regit').click(function() {
//				event.preventDefault()
					$(".error").text("")
				
				var val = $('.mobile').val();
				if(val == "") {
//					alert('手机不能为空');
					$(".error").text("手机不能为空")
					return false
					
				} else {
//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
					var res = /^1\d{10}$/
					var reg = /^[\w]{6,12}$/
					
					if(res.test(val)) {
						var ps = $('.password').val();
						pss(ps)
					
						if($(".error").text()==""){
							return true
						}else{
							return false
						}

					} else {
					$(".error").text("手机格式错误！")
					return false
						
					}
				}

			})
			
			$('.praise_btn status_origin ').css({marginLeft:'110px',marginTop:'10px'})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
