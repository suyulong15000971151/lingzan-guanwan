<?php
/* Smarty version 3.1.30, created on 2017-12-26 10:35:31
  from "D:\lingzanpc\application\views\templates\member\member.follproject.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a41b5731e0cd1_49547694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '366e44219390bc72612fdc301272f90a7e279d0b' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.follproject.html',
      1 => 1513667643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a41b5731e0cd1_49547694 (Smarty_Internal_Template $_smarty_tpl) {
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
.man-show .man-item{height:320px}
.man-show .man-item .cancel{height:30px;background:#f4f4f4;line-height: 30px;text-align: center;font-size: 14px;box-sizing: border-box;border:1px solid #dcdcdc;margin-top:10px}
#man-box{margin:0 auto 0}
</style>
	<body>
		<!--成功弹窗-->
	<div id="win" class="">
		<div class="win-box">
			<div class="com">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/laught_03.png" alt="" style="position:relative;"/>
				<span></span>
				<i></i>
			</div>
		</div>
	</div>
	<!--这里是确认弹窗-->
	    <div id="config">
	    	<div  class="config-box">
	    		<div class="content">
	    			<div class="title">确定取消该关注吗?</div>
	    			<span>取消</span>
	    			<button type="submit">确定</button>
	    		</div>
	    	</div>
	    </div>
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
">参与项目</a>
			<a href="/member/follproject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">关注项目</a>
			<form action="/member/follproject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
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
					<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
					<div class="cancel" onClick="cancelFollow(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">取消关注</div>
					<?php }?>
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

			//删除收藏（也就是取消关注）
			function cancelFollow(proid) {

				$('#config').addClass('big');
				$('#config .config-box .content button').remove();
				$("#config .config-box .content span").after('<button type="submit">确定</button>');

					$('#config .config-box .content span').click(function(){
						$('#config').removeClass('big');
						$('#config .config-box .content button').remove();
					})
					$('#config .config-box .content button').click(function(){
						$('#config').removeClass('big');
						$(this).remove();
						deleteFollow(proid);

				})

			}

			function deleteFollow(proid) {

				$.ajax({
		          url:'/member/cancelFollowProject',
		          type:"post",
		          data:{proid:proid},
		          success:function(ret){

		              if(ret != ''){

		                  var jsonarray = eval('('+ret+')');
		                  var msg = jsonarray.msg;
		                  var code = jsonarray.code;
		                  $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
						  $('#win').css('display',"block").addClass('anima');
						  window.location.reload();
		               }

		          },   
		          error:function(){  
		            $('#win .win-box .com span').html('网络异常，请稍后再试').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display',"block").addClass('anima');
					window.location.reload()
		          }

		      	})

			}
		<?php echo '</script'; ?>
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
						// url: '/member/getFollowProjectContent',
						url: '/member/getDataList',
						type: 'POST',
						async: true,
						data: {
							sign: 4,//表示获取类型为用户关注的项目
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
									if(<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
 == <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
) {
										str += '</div></a><div class="cancel" onClick="cancelFollow('+n.id+')">取消关注</div></div></div>';
									}

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
