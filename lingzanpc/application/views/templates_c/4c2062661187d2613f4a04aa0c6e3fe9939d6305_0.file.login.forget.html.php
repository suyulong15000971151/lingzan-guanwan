<?php
/* Smarty version 3.1.30, created on 2017-11-16 16:19:22
  from "D:\lingzanpc\application\views\templates\login\login.forget.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0d4a0adca504_94934652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c2062661187d2613f4a04aa0c6e3fe9939d6305' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\login\\login.forget.html',
      1 => 1510119984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d4a0adca504_94934652 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>忘记密码</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/forget.css" />
	</head>

	<body>
		<div class="log">
			<div class="log-box">
				<div class="content">
					<div class="log-img">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/denglulog.png" alt="" />
					</div>
					<div class="reset-psd">
						<a href="/login"></a>
						<p>重置密码</p>
					</div>

					<div class="user">
						<div class="error"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>
						<form method="post" action="/login/forget">
							<input name="frames" type="hidden" value="yes" />
							<div class="user-name user-phone">
								<input type="number" placeholder="支持大陆手机号" class="mobile" name="mobile">
								<i></i>
							</div>
							<div class="verifical">
								<input type="text" name="verifical" /><button id="send_verifical_mobile">发送验证码</button>
							</div>
							<div class="user-name user-psd">
								<input type="password" name="password" placeholder="输入6-20位密码" class="password">
								<i></i>
								<!--<span></span>-->
							</div>
							<button type="submit" class="regit">立即体验</button>
						</form>
						<div class="tip">
							<span>没有账号？</span>
							<a href="/login/register">创建新账号</a>
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
/js/myajax.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			//这里是表单验证

			function countTime(num) {
				num--;
				$(".verifical button").text(num + "s");
				if(num <= 60) {
					$(".verifical button").attr("disabled", "disabled")
					var time = setTimeout(function() {
						countTime(num);
						//				$(".verifical button").attr("disabled","disabled")
					}, 1000)

				}
				if(num <= 0) {
					console.log(num)
					$(".verifical button").text("发送验证呀");
					$(".verifical button").attr("disabled", false)
					clearTimeout(time)

				}
			}

			$('.verifical button').click(function() {

				var val = $('.mobile').val();
				if(val == "") {
					//					alert('手机号不能为空')
					$(".error").text("手机号不能为空")
					return false

				} else {
					//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
					var res = /^1\d{10}$/
						//						以1开始后面加10位数字
						//						if(res.test(val) | re.test(val))
					if(res.test(val)) {
						num = 60;
						var time = setTimeout(countTime(num), 1000)

					} else {
						//						alert("手机格式错误！");
						$(".error").text("手机格式错误！")
						return false

					}
				}
			})

			function pss(str) {
				if(str == '') {
					//					alert("密码不能为空")
					$(".error").text("密码不能为空")
					return false

				} else {
					var reg = /^[\w]{6,12}$/
						//						以1开始后面加10位数字
					if(reg.test(str)) {
						//						console.log('正确')
					} else {
						//						alert("密码格式错误！");
						$(".error").text("密码格式错误，请输入6-12位密码！")
						return false

					}
				}
			}

			$('button.regit').click(function() {
				$(".error").text("")

				var vermes = $(".log .log-box .content .user .verifical input").val()
				var val = $('.mobile').val();
				
				if(val == "") {
					//					alert('手机号不能为空')
					$(".error").text("手机号不能为空")
					return false

				} else {
					//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
					var res = /^1\d{10}$/
						//						以1开始后面加10位数字
						//						if(res.test(val) | re.test(val))
					if(res.test(val)) {
					    if(vermes == "") {
					$(".error").text("验证码不能为空")
					return false

				} else {
					//					var re = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/
					var res = /^1\d{10}$/
					if(res.test(val)) {
						var ps = $('.password').val();
						pss(ps);
						if($(".error").text() == "") {
							return true
						} else {
							return false
						}

					} else {
						//						alert("手机格式错误！");
						$(".error").text("手机格式错误！")
						return false

					}
				}
					

					} else {
						//						alert("手机格式错误！");
						$(".error").text("手机格式错误！")
						return false

					}
				}
			

			})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
