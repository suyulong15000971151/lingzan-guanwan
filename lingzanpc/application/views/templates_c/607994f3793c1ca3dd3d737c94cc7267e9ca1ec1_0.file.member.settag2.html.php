<?php
/* Smarty version 3.1.30, created on 2017-12-05 17:06:47
  from "D:\lingzanpc\application\views\templates\member\member.settag2.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a2661a7b238e9_29543667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '607994f3793c1ca3dd3d737c94cc7267e9ca1ec1' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.settag2.html',
      1 => 1508840113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2661a7b238e9_29543667 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/common.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/style.css" />
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
					<p>再选择五个你想要的风格</p>
					<div class="select">
						<ul>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style1.png" alt="" /><p data-id="1">简约</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style2.png" alt="" /><p data-id="2">前卫</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style3.png" alt="" /><p data-id="3">北欧</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style4.png" alt="" /><p data-id="4">工业</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style5.png" alt="" /><p data-id="5">新中式</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style6.png" alt="" /><p data-id="6">日式</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style7.png" alt="" /><p data-id="7">美式</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style8.png" alt="" /><p data-id="8">简欧</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style9.png" alt="" /><p data-id="9">田园</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style10.png" alt="" /><p data-id="10">地中海</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style11.png" alt="" /><p data-id="11">东南亚</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style12.png" alt="" /><p data-id="12">欧式古典</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style13.png" alt="" /><p data-id="13">传统中式</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style14.png" alt="" /><p data-id="14">新古典</p></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/style15.png" alt="" /><p data-id="15">法式</p></li>
						</ul>
					</div>
					<div class="set">
						<a href="javascript:history.go(-1)"><div class="back">上一步</div></a>
						<div class="next">确认提交</div>
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
            $(".log .log-box .content .select ul li").click(function(){
               var length=$(this).find("span").size();
               total=$(".log .log-box .content .select ul li").find("span").size()
		     if(length==0){
		     	if(total>=5){
		     		alert("最多可选5个")
		     	}else{
		     		$(this).append("<span></span>");
		     	}
//		     	alert(1)
		     }else{
		     	$(this).find("span").remove()
		     }
            	
            })
            $(".log .log-box .content .set .next").click(function() {
				total = $(".log .log-box .content .select ul li").find("span").size();
				if(total <= 0) {
					alert("请选择你想要的风格");
					return false;
				} else {
					var tag=[];
					for (i=0;i<total;i++) {
						tag.push($(".log .log-box .content .select ul li span").eq(i).prev().attr('data-id'));
					}

					$.ajax({
						url: '/ajax/set_user_tag2',
						type: 'POST',
						async: true,
						data: {
							tag: tag,
						},
						timeout: 5000,
						dataType: 'json',
						success: function(data){
							window.location.href = "/home";
						}
					});
				}

			})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
