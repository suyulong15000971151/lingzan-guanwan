<?php
/* Smarty version 3.1.30, created on 2018-01-17 15:29:18
  from "D:\lingzanpc\application\views\templates\member\member.friend.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5efb4e1fbf62_64283889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1dd3f479ec85a92464dbde727287a6a3dd59e2dd' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.friend.html',
      1 => 1516174137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a5efb4e1fbf62_64283889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/selffriends.css" />
<style>
	#edit .edit-box .edit-content .edit-container .form-one .img-load i {
		display: inline-block;
		width: 12px;
		height: 12px;
		position: absolute;
		right: 5px;
		top: 5px;
		background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/delete_03.png) no-repeat;
		background-size: 100% 100%;
	}
	
	.man-sub {
		width: 100%;
		height: 60px;
		overflow: hidden;
		text-align: center;
		line-height: 60px;
		font-size: 16px;
	}
	
	.man-sub a {
		display: inline-block;
		padding: 0 10px;
		color: #afafaf
	}
	
	.man-sub a.actv {
		color: #000
	}
	
	#man-box {
		margin: 0 auto 0
	}
</style>

<body>
	<!--这里是添加成员-->
	<div id="custom">
		<div class="custom-box">
			<div class="content">
				<div class="title">
					<span>添加成员</span>
					<div class="go-back" style="display: none;">返回</div>
					<i></i>
				</div>
				<div class="container">
					<div class="caption">
						<a href="javascript:void(0)" class="mid cutv">快速站内好友</a>
						<a href="javascript:void(0)" class="mid">添加站外成员</a>
						<a href="javascript:void(0)" class="mid">通过邮件邀请</a>
						<a href="javascript:void(0)">通过链接注册</a>
					</div>

					<div class="package">
						<!--这是第一个-->
						<div class="first-befor mode">
							<div class="friend-con">
								<div class="box-one">
									<div class="look">
										<i>*</i><span>好友用户名或手机号</span><input type="text" name="userinfo" class="userinfo" /><button onClick="selectUser()">查找</button>
									</div>
									<div class="look-end">
										<div class="looktext">搜索结果0个</div>
									</div>
								</div>

								<div class="box-tow">
									<div class="sub-peson">
										<img src="img/person.png" alt="" />
										<div class="text">
											<h3>李某某</h3>
											<p>上海市 男 设计师</p>
										</div>

									</div>

									<div class="send">
										<i>*</i><span>输入留言信息</span><input type="text" placeholder="我是...." name="content" id="msg_apply" /><button>发送</button>
									</div>
								</div>

							</div>

						</div>
						<!--这里是第二个内容-->
						<div class="first mode">
								<input name="frames" type="hidden" value="yes" />
								<input type="hidden" name="proid" value="" />
								<div class="first-box">
									<div class="firstput">
										<p>* 快速添加成员账户，设置默认密码，首次登陆时需要修改默认密码</p>
										<div class="item">
											<label for="">姓名</label> <input type="text" name="nickname" id="nickname"/>
										</div>
										<div class="item">
											<label for="">手机号</label> <input type="text" name="mobile" id="mobile"/>
										</div>
										<div class="item">
											<label for="">默认密码</label> <input type="text" name="password" id="password"/>
										</div>
									</div>
									<div class="sub">
										<button>添加成员</button>
									</div>
								</div>
						</div>
						<!--这是第三个内容-->
						<div class="second mode">
							<div class="second-box">
								<p>* 通过邮箱给项目成员发送注册当前项目的邀请链接。</p>
								<div class="item">
									<label for="">邮箱</label><input type="text" name="email" id="email"/>
								</div>
							</div>
							<div class="sub">
								<button>添加成员</button>
							</div>
						</div>
						<!--这里是第四个内容-->
						<div class="third mode">
							<div class="third-box">
								<p>* 发送网站注册链接地址给你需要邀请的项目组成员，他们可通过该地址直接注册账号。</p>
								<div class="item">
									<label for="">邮箱</label><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['invite_url']->value;?>
" id="email_3"/>
								</div>
								<button class="dynamic" data-clipboard-target="#email_3" onClick="copyUrl2()">点击复制该链接</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--成功弹窗-->
	<div id="win" class="">
		<div class="win-box">
			<div class="com">
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/laught_03.png" alt="" style="position:relative;" />
				<span></span>
				<i></i>
			</div>
		</div>
	</div>
	<!--这里是确认弹窗-->
    <div id="config">
    	<div  class="config-box">
    		<div class="content">
    			<div class="title">确定删除该好友吗?</div>
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
			<a href="/member/library">
				<?php } else { ?>
				<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
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
" class="man-act">
							<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['followcount']+$_smarty_tpl->tpl_vars['userInfo']->value['fanscount']+$_smarty_tpl->tpl_vars['userInfo']->value['friendcount'];?>
</span>
							<p>人脉</p>
						</a>
		</div>

	</div>
	<div class="man-sub">
		<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
		<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">我的好友</a>
		<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的关注</a>
		<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的粉丝</a>
		<?php } else { ?>
		<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的好友</a>
		<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的关注</a>
		<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的粉丝</a>
		<?php }?>
		<form action="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
		<div class="sub-sear">
			<button></button>
			<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>

		</div>
		</form>
	</div>
	<!-- <div id="man-box"> -->

		<!--<div class="man-sub">
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">我的好友</a>
			<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的关注</a>
			<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的粉丝</a>
			<?php } else { ?>
			<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的好友</a>
			<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的关注</a>
			<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的粉丝</a>
			<?php }?>

			<form action="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
			<div class="sub-sear">
				<button></button>
				<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
				
			</div>
			</form>
	    </div>-->
	<div id="man-box" style="position: relative;">

		<div class="man-show" id="man-show">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>

			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<div class="man-item plus">
				<p>添加好友</p>
			</div>
			<?php }?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friend']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="man-item friend_<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
">
				<div class="item-box">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['user']['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
					<a href="/member/library">
						<?php } else { ?>
						<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
">
							<?php }?>
							<div class="big-img">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['nickname'];?>
" />
								<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['user']['nickname'];?>
</h4>
							</div>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['user']['librarycount'];?>
 项目 &nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['productcount'];?>
 产品</p>
							<div class="small">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['pro'], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['smallpic'];?>
" alt="" /> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</div>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
						<div class="edit" onClick="pLCirform(<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
)">私信</div>
						<div class="remove" onClick="delFriend(<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
)">删除好友</div>
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
/js/index.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selffriend.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/clipboard.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
			//这里是个人中心项目盒子居中
		 //盒子居中
   function boxCenter(){
   	  var clientWid=document.body.clientWidth;
    var boxnum=Math.floor(clientWid/275)
    console.log(boxnum)
    var boxwid=document.getElementById('man-show')
    boxwid.style.width=(boxnum*275)+'px'
    document.getElementById('man-box').style.width=(boxnum*275-20)+'px'
   }
 
   window.onresize=function(){
   	boxCenter()
   }
  boxCenter()

		function selectUser() {

			var userinfo = $('.userinfo').val();
			if(userinfo == '') {
				return false;
			}

			$('.look-pson').remove();
			$.ajax({
				url: '/member/userData',
				type: "post",
				data: {
					userinfo: userinfo
				},
				success: function(ret) {

					if(ret != '') {

						var jsonarray = eval('(' + ret + ')');
						var count = jsonarray.count;
						var data = jsonarray.data;

						var html = '';
						for(var i = 0; i < count; i++) {
							// alert(i);
							html += '<div class="look-pson user_' + data[i].userid + '">';
							html += '<img src="' + data[i].avatar + '" alt="' + data[i].nickname + '" />';
							html += '<div class="text">';
							html += '<h3>' + data[i].nickname + '</h3>';
							html += '<p>' + data[i].sex + ' ' + data[i].city + ' ' + data[i].groupid + '</p>';
							html += '<span onClick="changeConfirm(' + data[i].userid + ')"> + 好友</span>';
							html += '</div>';
							html += '</div>';

						}

						$('.looktext').after(html);
						$('.looktext').text('搜索结果' + count + '个');
						return false;

					}

					$('.looktext').text('搜索结果0个');

				},
				error: function() {
					alert('网络异常，请稍后再试');
					return false;
				}

			})
		}

		//切换添加好友窗口
		function changeConfirm(userid) {
			$('#custom .friend-con .box-one').css('display', 'none');
			$('#custom .container .caption').css('display', 'none');
			$('#custom .title span').css('display', 'none');
			$('#custom .title .go-back').css('display', 'block');
			$('#custom .friend-con .box-tow').css('display', 'block');
			var img = $('.user_' + userid).find('img').attr('src');
			var nickname = $('.user_' + userid).find('img').attr('alt');
			var info = $('#custom  .look-end .user_'+userid+' .text p').text();
			$('.box-tow .sub-peson img').attr({
				'src': img,
				'alt': nickname
			});
			console.log(info)
			$('.box-tow .sub-peson .text h3').text(nickname);
			$('.box-tow .sub-peson .text p').text(info);
			$('.box-tow .send button').attr('onClick', "addApplyMsg(" + userid + ")");
		}

		//发送认证消息
		function addApplyMsg(userid) {

			var content = $.trim($('#msg_apply').val());
			$.ajax({
				url: '/member/addApplyMsg',
				type: "post",
				data: {
					userid: userid,
					content: content
				},
				success: function(ret) {

					if(ret != '') {

						var jsonarray = eval('(' + ret + ')');
						var msg = jsonarray.msg;
						var code = jsonarray.code;
						// alert(msg);

						$('#win .win-box .com span').html(msg).attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
						$('#win').css('display', "block").addClass('anima');
						window.location.reload()

					}

				},
				error: function() {
					// alert('网络异常，请稍后再试');
					$('#win .win-box .com span').html('网络异常，请稍后再试').attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display', "block").addClass('anima');
					window.location.reload()
				}

			})

		}

		//删除好友
		function delFriend(userid) {

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
				deleteFriend(userid);

			})

		}

		function deleteFriend(userid) {

			$.ajax({
				url: '/member/delFriend',
				type: "post",
				data: {
					userid: userid
				},
				success: function(ret) {

					if(ret != '') {

						var jsonarray = eval('(' + ret + ')');
						var msg = jsonarray.msg;
						var code = jsonarray.code;
						$('#win .win-box .com span').html(msg).attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
						$('#win').css('display', "block").addClass('anima');
						window.location.reload()

					}

				},
				error: function() {
					$('#win .win-box .com span').html('网络异常，请稍后再试').attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display', "block").addClass('anima');
					window.location.reload()
				}

			})

		}

		//私信弹窗
		function pLCirform(userid) {

			$(window).scrollTop(0);

			var uname = $('.friend_' + userid).find('.item-box').find('.big-img').find('h4').text();

			$('#chat_userid2').val(userid);
			$('#chat_uname').html(uname);

			var str = '';
			$.ajax({
				url: '/ajax/user_chat',
				type: 'POST',
				async: false,
				data: {
					userid2: userid
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data) {
					$.each(data.errmsg, function(i, n) {
						if(n.sendtype == 2) {
							str += '<div class="item"><div class="people"><img src="' + n.avatar2 + '" alt="" /></div><div class="text"><p>' + n.content + '</p><span>' + n.sendtime + '</span><em></em></div></div>';
						} else {
							str += '<div class="item host"><div class="text"><p>' + n.content + '</p><span>' + n.sendtime + '</span><em></em></div><div class="people"><img src="' + n.avatar1 + '" alt="" /></div></div>';
						}
					});
					$('#chat_container').html(str);
					lct = document.getElementById('chat_container');
					lct.scrollTop = Math.max(0, lct.scrollHeight - lct.offsetHeight);
				}
			});

			$('body').css("overflow", 'hidden')
			$("#letter").css("display", "block")

		}
	<?php echo '</script'; ?>
>


	<?php echo '<script'; ?>
>
		$(".man-show .plus").click(function() {
			$(window).scrollTop(0);
			$('body').css("overflow", 'hidden')
			$("#custom").css("display", "block")
		})
		$("#custom .custom-box").click(function(event) {
			event.stopPropagation()
			$('body').css("overflow", 'scroll')
			$("#custom").css("display", "none")
		})
		$("#custom .custom-box .content").click(function(event) {
			event.stopPropagation()
		})
		$("#custom .custom-box .content .title i").click(function(event) {
				event.stopPropagation();
				$('body').css("overflow", 'scroll')
				$("#custom").css("display", "none")
			})
			//项目添加好友
		$('#custom li .choics').click(function() {
			$(this).toggleClass("checkeds")
		})

		<?php echo '</script'; ?>
>

		<?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 type="text/javascript">
		/*
		 * 瀑布流的原理：
		 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
		 *
		 * */
	  
		function imgsize(){

			$('img').css('opacity','1')
			// var imgleng = $('.container .box .boximg img').get().length;
			// var imgobj = $('.container .box .boximg img').get();
			// var imgout = $('.container .box .boximg .img-out').get()

			var imgleng = $('#man-box .man-show .man-item .item-box .big-img img').get().length;
			var imgobj = $('#man-box .man-show .man-item .item-box .big-img img').get();

			var imgWid = []
			var imgHid = []
			for(var i = 0; i < imgleng; i++) {
				imgobj[i].style.height = Number(imgobj[i].offsetWidth * 255 / imgobj[i].offsetHeight)
				// imgobj[i].style.width = '255px'
				// imgout[i].style.cssText = 'Max-height:400px;overflow:hidden'

			}

		}

		var container = document.getElementById("man-box");
		// var btn = document.getElementsByClassName("add-btn").item(0);
		var index = 0;
		window.onload = function() {
			imgsize()
			waterfull();
		};

		function waterfull() {
			// var box = document.getElementsByClassName("box");
			var box = document.getElementsByClassName("man-item");

			//计算一排中的能排放的数量
			var containerWidth = document.documentElement.clientWidth;
			if(containerWidth >= 1600) {
				containerWidth = 1600;
			}
			var boxWidth = box[0].offsetWidth;
			var num = Math.floor(containerWidth / boxWidth);
			//居中操作
			// container.style.width = num * (boxWidth + 20) + "px";
			//摆放位置
			var boxheight = [];
			for(var i = 0; i < box.length; i++) {
				if(i < num) { // 第一排中的元素
					boxheight.push(box[i].offsetHeight);
				} else {
					//非第一排中的内容
					box[i].style.position = "absolute";
					//设置位置之前。必须知道当前要放在哪个盒子下面
					var minBoxHeight = Math.min.apply(null, boxheight);
					//根据最小值得到位置
					//               var index = boxheight.indexOf(minBoxHeight);
					var index = getIndex(boxheight, minBoxHeight);
					// box[i].style.top = (minBoxHeight + 20) + "px";
					// box[i].style.left = (box[index].offsetLeft - 10) + "px";

					box[i].style.top = (minBoxHeight + 50) + "px";
					box[i].style.left = (box[index].offsetLeft) + "px";
					//把盒子的高度加回去
					boxheight[index] = boxheight[index] + box[i].offsetHeight + 20;
				}
			}

			// btn.style.top = (box[box.length - 1].offsetTop + box[box.length - 1].offsetHeight + 20) + "px";

		}

		//过滤的形式
		function getIndex(boxArr, minIndex) {
			for(var i = 0; i < boxArr.length; i++) {
				if(boxArr[i] == minIndex) {
					return i;
				}
			}
		}

		function loadFlag() {
			//获取页面高度
			var pageHeight = document.documentElement.clientHeight;
			//滚动的高度
			var scrollHeight = document.documentElement.scrollTop || document.body.scrollTop;
			//最后一张图片距离顶部的高度
			// var boxs = document.getElementsByClassName("box");
			var boxs = document.getElementsByClassName("man-item");
			//        var boxHeight = boxs[boxs.length - 1].offsetTop;
			// var btn = document.getElementsByClassName("add-btn").item(0);
			// var boxHeight = btn.offsetTop + 49;
			/* console.log("页面高度:"+pageHeight);
			 console.log("滚动高度:"+scrollHeight);
			 console.log("元素高度:"+boxHeight);*/
			return pageHeight + scrollHeight > boxHeight ? true : false;
		}

		function isEmptyObject(e) {
			var t;
			for (t in e)
				return !1;
			return !0;
		}

		$(function(){
			$(document).scroll(function(){
				// heightsize()

				waterfull();
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
						// url: '/member/getProductContent1',
						url: '/member/getDataList',
						type: 'POST',
						async: true,
						data: {
							sign: 9,//表示获取类型为用户采集的产品
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

									// var u = data[i];
									// alert(u);
									var user = n.user;
									str += '<div class="man-item friend_'+user.userid+'"><div class="item-box">';
									if(user.userid == <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
) {
										str += '<a href="/member/library">';
									}else{
										str += '<a href="/member/library/'+user.userid+'">';
									}
									str += '<div class="big-img"><img src="'+user.avatar+'" alt="'+user.nickname+'" /><h4>'+user.nickname+'</h4></div><p>'+user.librarycount+' 项目 &nbsp;'+user.productcount+' 产品</p><div class="small">';

									if(n.pro != []){
										var list = n.pro;
										var count = list.length;

										for (var i = 0; i < count; i++) {
											str += '<img src="'+list[i].smallpic+'" />';
										};

									}
									str += '</div></a>';

									if(user.userid != <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
) {
										// str += '<a href="/member/library">';
										str += '<div class="edit" onClick="pLCirform('+user.userid+')">私信</div>';
										str += '<div class="remove" onClick="delFriend('+user.userid+')">删除好友</div>';
									}

									str += '</div></div>';

								});
								$('#man-box .man-show').append(str);
								// heightsize()
								imgsize()
								waterfull();
								
									$('#p').val(Number(p)+1);
								
								
//									window.onload = function() {
			                        	                        
			                        
//			                               };
							}
						}
					});
				}
			});
		});
	<?php echo '</script'; ?>
>

     <?php echo '<script'; ?>
>

		//这里是添加人物时候的弹窗 导航切换效果
		$("#custom .caption a").click(function() {
			$('.info').remove();
			index = $("#custom .caption a").index(this);
			$(this).addClass("cutv").siblings().removeClass("cutv");
			console.log(index)
			$("#custom .custom-box .content .container .mode").eq(index).css("display", "block").siblings().css("display", "none")
		});

		//站外添加好友
		$('.first-box .sub button').click(function() {
			var nickname = $('#nickname').val();
			var mobile = $('#mobile').val();
			var password = $('#password').val();
			if(nickname == '' || mobile == '' || password == ''){
				$('.info').remove();
				$('.first-box .sub').before('<p class="info">请填写完整的信息</p>');
				return false;
			}
			$.ajax({
			          url:'/library/project_member_add',
			          type:"post",
			          data:{nickname:nickname,mobile:mobile,password:password,frames:'yes'},//添加的是单片类型的才思库，所以libflg为1
			          success:function(ret){

			              if(ret != ''){

			    			// var jsonarray = eval('(' + ret + ')');
							// var msg = jsonarray.msg;
							// var code = jsonarray.code;
							$('#win .win-box .com span').html(ret).attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
							$('#win').css('display', "block").addClass('anima');
							// 
							if(ret == '添加成员成功') {
								window.location.reload();
							}else{
								setTimeout(function () {
						        $('#win').css('display','none');
						        $('body').css('overflow','scroll');
						    	}, 1000);
							}

	                   }

			          },   
			          error:function(){  
			          	return false;
			             	$('#win .win-box .com span').html('网络异常，请稍后再试').attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
							$('#win').css('display', "block").addClass('anima');
							setTimeout(function () {
						        $('#win').css('display','none');
						        $('body').css('overflow','scroll');
						    }, 1000);
			          }
			      })
		})

		//邮箱邀请注册
		$('.second .sub button').click(function(){

			var email = $('#email').val();
			if(email == ''){
				$('.info').remove();
				$('.second-box').append('<p class="info">请填写邮箱</p>');
				return false;
			}
			$.ajax({
			          url:'/library/project_member_add2',
			          type:"post",
			          data:{email:email,proid:0,frames:'yes'},//添加的是单片类型的才思库，所以libflg为1
			          success:function(ret){

			              if(ret != ''){

			    			// var jsonarray = eval('(' + ret + ')');
							// var msg = jsonarray.msg;
							// var code = jsonarray.code;
							$('#win .win-box .com span').html(ret).attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
							$('#win').css('display', "block").addClass('anima');

							if(ret == '发送成功！') {
								window.location.reload();
							}else{
								setTimeout(function () {
						        $('#win').css('display','none');
						        $('body').css('overflow','scroll');
						    	}, 1000);
							}

	                   }

			          },   
			          error:function(){  
			          	return false;
			             	$('#win .win-box .com span').html('网络异常，请稍后再试').attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
							$('#win').css('display', "block").addClass('anima');
							setTimeout(function () {
						        $('#win').css('display','none');
						        $('body').css('overflow','scroll');
						    }, 1000);
			          }
			})
		})

var clipboard = new Clipboard('.dynamic');
  
    clipboard.on('success', function(e) {

        if(e.text == ''){
          // alert('复制失败');
          $('.third-box button').before('<p class="info">复制失败</p>');
          return false;
        }
        // alert('复制成功');
        $('#win .win-box .com span').html('复制成功').attr('style', "position:absolute; top:73px; left:50%;transform:translateX(-50%)");
		$('#win').css('display', "block").addClass('anima');
		window.location.reload();

    });

    clipboard.on('error', function(e) {
        // alert('复制失败');
        $('.third-box button').before('<p class="info">复制失败</p>');
        return false;
    });
    
    //这里是复制链接
    function copyUrl2() {
				var Url2 = document.getElementById("email_3");
				Url2.select(); // 选择对象 
				document.execCommand("Copy"); // 执行浏览器复制命令 
//				alert("已复制好，可贴粘。");
			}
    
    
	<?php echo '</script'; ?>
>
</body>

</html><?php }
}