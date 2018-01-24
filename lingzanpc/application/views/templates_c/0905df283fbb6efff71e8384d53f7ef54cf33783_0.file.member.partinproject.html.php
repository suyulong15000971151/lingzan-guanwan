<?php
/* Smarty version 3.1.30, created on 2017-12-01 10:36:16
  from "D:\lingzanpc\application\views\templates\member\member.partinproject.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a20c0200388a6_61321512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0905df283fbb6efff71e8384d53f7ef54cf33783' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.partinproject.html',
      1 => 1511860367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a20c0200388a6_61321512 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/selflibrary.css" />
<style>
#edit .edit-box .edit-content .edit-container .form-one .img-load i{display: inline-block; width: 12px; height: 12px; position: absolute; right: 5px; top: 5px; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/delete_03.png) no-repeat; background-size: 100% 100%;}
.man-sub{width:100%;height:60px;overflow: hidden;text-align: center;line-height: 60px;font-size: 16px;}
.man-sub a{display: inline-block;padding:0 10px;color:#afafaf}
.man-sub a.actv{color:#000}
#man-box{margin:0 auto 0}
</style>
	<body>
		<!--这里是个人简介-->
		<div class="manpeople">
			<div class="man-box">
				<div class="potato">
					<img src="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
" />
				</div>
				<div class="explain">
					<h2><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
</h2>
					<p><?php if ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 10 || $_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 20) {?><i></i><?php }?><span><?php if ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 1) {?> 男 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 2) {?> 女 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 0) {?> 保密 <?php }?> <?php echo $_smarty_tpl->tpl_vars['address']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 0) {?> 普通用户 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 10) {?> 设计师 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 20) {?> 品牌 <?php }?></span></p>
					<strong><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['signature'];?>
</strong>
				</div>
			</div>
		</div>
		<!--这里是个人内容导航-->
		<div class="man-nav">
			<div class="navigation">
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/library" class="man-act">
				<?php } else { ?>
				<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="man-act">
				<?php }?>
				<span><?php echo $_smarty_tpl->tpl_vars['count']->value['sLibCount']+$_smarty_tpl->tpl_vars['count']->value['pLibCount']+$_smarty_tpl->tpl_vars['count']->value['fLibCount'];?>
</span>
					<p>项目</p>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/collection">
				<?php } else { ?>
				<a href="/member/collection/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
				<?php }?>
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['productcount'];?>
</span>
					<p>产品</p>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/note">
				<?php } else { ?>
				<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
				<?php }?>
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['notecount']+$_smarty_tpl->tpl_vars['count']->value['fNotCount'];?>
</span>
					<p>笔记</p>
				</a>
				<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" >
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['followcount']+$_smarty_tpl->tpl_vars['userInfo']->value['fanscount']+$_smarty_tpl->tpl_vars['userInfo']->value['friendcount'];?>
</span>
					<p>人脉</p>
				</a>
			</div>
		</div>
		<div class="man-sub">
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/library">我的项目</a>
			<?php } else { ?>
			<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的项目</a>
			<?php }?>
			<a href="/member/partInProject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">参与项目</a>
			<a href="/member/follproject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">关注项目</a>

			<form action="/member/partInProject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
				<div class="sub-sear">
					<button></button>
					<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
					
				</div>
			</form>
		</div>
		<div id="man-box">
		<div class="man-show" id="man-show">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
"/>
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<div class="man-item">
				<div class="item-box">
					<a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h4>
						<div class="big-img"><?php if ($_smarty_tpl->tpl_vars['item']->value['pic'] != '') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="" /><?php } else { ?> <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="" /> <?php }?></div>
						<div class="small">
							<?php if ($_smarty_tpl->tpl_vars['item']->value['list'] != array()) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['list'], 'item1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->value) {
?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['item1']->value['smallpic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item1']->value['proname'];?>
" />
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							<?php }?>
						</div>
					</a>
				</div>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		</div>
        </div>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selflibrary.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		/*
		 * 瀑布流的原理：
		 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
		 *
		 * */
	
		function imgsize(){

			$('img').css('opacity','1')

		}

		var container = document.getElementById("man-show");
		// var btn = document.getElementsByClassName("add-btn").item(0);
		var index = 0;
		window.onload = function() {
			imgsize()

		};

		//过滤的形式
		function getIndex(boxArr, minIndex) {
			for(var i = 0; i < boxArr.length; i++) {
				if(boxArr[i] == minIndex) {
					return i;
				}
			}
		}

		function isEmptyObject(e) {
			var t;
			for (t in e)
				return !1;
			return !0;
		}

		$(function(){
			$(document).scroll(function(){

				imgsize()

				//滚动条滑动的时候获取滚动条距离顶部的距离
				var scroll=$(document).scrollTop();
				//屏幕的高度
				var client=$(window).height();
				var h=$(document).height();
				var flag=true;
				if (h<=scroll+client) { // 到达底部时,加载新内容
					if(flag==false){
						return;
					}
					var p = $('#p').val();
					var seachWord = $('#seachWord').val();
					var str = '';
					$.ajax({
						// url: '/member/getPartInProjectContent',
						url: '/member/getDataList',
						type: 'POST',
						async: true,
						data: {
							sign: 3,//表示获取类型为用户参与的项目
							p: p,
							seachWord: seachWord,
							userid:"<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
"
						},
						timeout: 3000,
						dataType: 'json',
						success: function(data){
							//console.log(data);
							//location.reload();
							if(!isEmptyObject(data.errmsg)) {
								$.each(data.errmsg, function(i, n) {

									str += '<div class="man-item"><div class="item-box"><a href="/library/project/'+n.id+'"><h4>'+n.name+'</h4><div class="big-img">';
									
									if(n.pic != ''){ 
										str += '<img src="'+n.pic+'" alt="" />';
									}else{ 
										str += '<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="" />';
									}
									str += '</div><div class="small">';

									if(n.list != []){
										var list = n.list;
										var count = list.length;

										for (var i = 0; i < count; i++) {
											str += '<img src="'+list[i].smallpic+'" alt="'+list[i].proname+'" />';
										};

									}
									str += '</div></a></div></div>';

								});

								$('#man-show').append(str);

								imgsize()

								$('#p').val(Number(p)+1);

							}
						}
					});
				}
			});
		});

		<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
