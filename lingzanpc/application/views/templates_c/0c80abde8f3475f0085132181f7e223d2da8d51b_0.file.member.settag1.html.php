<?php
/* Smarty version 3.1.30, created on 2017-11-16 15:33:42
  from "D:\lingzanpc\application\views\templates\member\member.settag1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0d3f567269f8_07004721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c80abde8f3475f0085132181f7e223d2da8d51b' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.settag1.html',
      1 => 1508840113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d3f567269f8_07004721 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/interset.css" />
		<title>登录</title>
	</head>

	<body>
		<div class="log">
			<div class="log-box">
				<div class="content">
					<div class="log-img">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/denglulog.png" alt="" />
					</div>
					<p>选择五个你最感兴趣的类别</p>
					<div class="select">
						<ul>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog1.png" alt="" />
								<p data-id="1">门厅</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog2.png" alt="" />
								<p data-id="2">客厅</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog3.png" alt="" />
								<p data-id="3">餐厅</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog4.png" alt="" />
								<p data-id="4">卧室</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog5.png" alt="" />
								<p data-id="5">儿童房</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog6.png" alt="" />
								<p data-id="6">书房</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog7.png" alt="" />
								<p data-id="7">卫浴</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog8.png" alt="" />
								<p data-id="8">厨房</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog9.png" alt="" />
								<p data-id="9">办公</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog10.png" alt="" />
								<p data-id="10">餐饮</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog11.png" alt="" />
								<p data-id="11">会所</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog12.png" alt="" />
								<p data-id="12">酒店</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog13.png" alt="" />
								<p data-id="13">民宿</p>
							</li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/intersetlog14.png" alt="" />
								<p data-id="14">公共</p>
							</li>
						</ul>
					</div>
					<div class="set">
						<a href="javascript:history.go(-1)"><div class="back">返回</div></a>
						<div class="next">下一步</div>
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
>
			$(".log .log-box .content .select ul li").click(function() {
				var length = $(this).find("span").size();
				total = $(".log .log-box .content .select ul li").find("span").size()
				if(length == 0) {
					if(total >= 5) {
						alert("最多可选5个")
					} else {
						$(this).append("<span></span>");
					}

					//alert(1)
				} else {
					$(this).find("span").remove()
				}

			})
			$(".log .log-box .content .set .next").click(function() {
				total = $(".log .log-box .content .select ul li").find("span").size();
				if(total <= 0) {
					alert("请选择感兴趣的类别")
				} else {
					var tag=[];
					for (i=0;i<total;i++) {
						tag.push($(".log .log-box .content .select ul li span").eq(i).prev().attr('data-id'));
					}

					$.ajax({
						url: '/ajax/set_user_tag1',
						type: 'POST',
						async: true,
						data: {
							tag: tag,
						},
						timeout: 5000,
						dataType: 'json',
						success: function(data){
							window.location.href = "/member/settag2";
						}
					});
				}

			})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
