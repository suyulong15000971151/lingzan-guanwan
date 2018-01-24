<?php
/* Smarty version 3.1.30, created on 2018-01-17 15:35:43
  from "D:\lingzanpc\application\views\templates\member\member.follownote.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5efccfeb5107_04918915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1f16e510cd94fe478b836756bc6ee631928338a' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.follownote.html',
      1 => 1513667643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a5efccfeb5107_04918915 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/selfnote.css" />
<style>
#edit .edit-box .edit-content .edit-container .form-one .img-load i{display: inline-block; width: 12px; height: 12px; position: absolute; right: 5px; top: 5px; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/delete_03.png) no-repeat; background-size: 100% 100%;}
.man-sub{width:100%;height:60px;overflow: hidden;text-align: center;line-height: 60px;font-size: 16px;}
.man-sub a{display: inline-block;padding:0 10px;color:#afafaf}
.man-sub a.actv{color:#000}
.container .box .behavior .gaile {
	    display: inline-block;
	    overflow: hidden;
	    float: right;
	}
.container .box .behavior .gaile span {
    display: inline-block;
    width: 20px;
    height: 20px;
    background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/zan.png) no-repeat;
    float: left;
    margin-top: 15px;
    margin-right: 10px;
    background-size: 100% 100%;
}
.container .box .behavior .gaile em {
    display: inline-block;
    height: 20px;
    font-size: 15px;
    line-height: 20px;
    color: #000;
    float: left;
    margin-top: 15px;
}
</style>

	<body>
		<!--这里是个人简介-->
		<div class="manpeople">
			<div class="man-box">
				<div class="potato">
					<img src="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
"/>
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
        			<div class="title">确定删除该收藏吗?</div>
        			<span>取消</span>
        			<button type="submit">确定</button>
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
				<a href="/member/note" class="man-act">
				<?php } else { ?>
				<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="man-act">
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
			<a href="/member/note">我的笔记</a>
			<?php } else { ?>
			<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的笔记</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/follownote/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">我的收藏</a>
			<?php } else { ?>
			<a href="/member/follownote/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的收藏</a>
			<?php }?>

			<form action="/member/follownote/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
			<div class="sub-sear">
				<button></button>
				<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
" />
				
			</div>
			</form>
	    </div>
		<!--这是瀑布流-->
		<div class="container" id="container">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['note']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="box">
				<a href="/note/info/<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
">
					<div class="boximg">
						<div class="img-out" style="max-height: 400px;">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['notename'];?>
">
						</div>
						
						<!--<i>采集</i>-->
						<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['notename'];?>
</h3>
						<p><?php echo htmlspecialchars_decode(substr($_smarty_tpl->tpl_vars['item']->value['shortdesc'],0,126));?>
</p>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/note_03.png" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['commentcount'];?>
</span>
						</div>
						<div class="gaile"><span></span><em><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</em></div>
					</div>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<div class="delete" onClick="cancelFollow(<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
)">删除</div>
				<?php }?>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<div class="add-btn">
				加载更多
			</div>
		</div>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selfcoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selfnote.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>

//		console.log($("input[type='file']").get(0).files)
			/*
			 * 瀑布流的原理：
			 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
			 *
			 * */
			function imgsize(){

			$('img').css('opacity','1')
			var imgleng = $('.container .box .boximg img').get().length;
			var imgobj = $('.container .box .boximg img').get();
			var imgout = $('.container .box .boximg .img-out').get()

			var imgWid = []
			var imgHid = []
			for(var i = 0; i < imgleng; i++) {
				imgobj[i].style.height = Number(imgobj[i].offsetHeight * 255 / imgobj[i].offsetWidth)
				imgobj[i].style.width = '255px'
				imgout[i].style.cssText = 'Max-height:400px;overflow:hidden'

			}

		}


			var container = document.getElementById("container");
			var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
				imgsize()
				waterfull();
				
			};

			function waterfull() {
				
				var box = document.getElementsByClassName("box");

				//计算一排中的能排放的数量
				var containerWidth = document.documentElement.clientWidth;
				if(containerWidth >= 1600) {
					containerWidth = 1600;
				}
				var boxWidth = box[0].offsetWidth;
				var num = Math.floor(containerWidth / boxWidth);
				//居中操作
				container.style.width = num * (boxWidth + 20) + "px";
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
						box[i].style.top = (minBoxHeight + 20) + "px";
						box[i].style.left = (box[index].offsetLeft - 10) + "px";
						//把盒子的高度加回去
						boxheight[index] = boxheight[index] + box[i].offsetHeight + 20;
					}
				}

				btn.style.top = (box[box.length - 1].offsetTop + box[box.length - 1].offsetHeight + 20) + "px";

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
				var boxs = document.getElementsByClassName("box");
				//        var boxHeight = boxs[boxs.length - 1].offsetTop;
				var btn = document.getElementsByClassName("add-btn").item(0);
				var boxHeight = btn.offsetTop + 49;
				/* console.log("页面高度:"+pageHeight);
				 console.log("滚动高度:"+scrollHeight);
				 console.log("元素高度:"+boxHeight);*/
				return pageHeight + scrollHeight > boxHeight ? true : false;
			}

			$(function(){  
				$(document).scroll(function(){
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
						var key = $('#key').val();
						var p = $('#p').val();
						var seachWord = $('#seachWord').val();
						var str = '';
						$.ajax({
							// url: '/member/getNoteContent1',
							url: '/member/getDataList',
							type: 'POST',
							async: true,
							data: {
								sign: 8,//表示获取类型为用户上关注的笔记
								userid: "<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
",
								p: p,
								seachWord: seachWord
							},
							timeout: 5000,
							dataType: 'json',
							success: function(data){
								//console.log(data);
								//location.reload();
								if(!isEmptyObject(data.errmsg)) {
									$.each(data.errmsg, function(i, n) {
                                       
										str += '<div class="box"><a href="/note/info/'+n.noteid+'"><div class="boximg">';
										str += '<div class="img-out" style="max-height:400px"><img src="'+n.cover+'" alt="'+n.notename+'"></div><h3>'+n.notename+'</h3>';
										str += '<p><?php echo htmlspecialchars_decode(substr('+n.shortdesc+',0,126));?>
</p></div>';
										str += '<div class="behavior"><div class="peson"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/note_03.png" alt="" />';
										str += '<span>'+n.commentcount+'</span></div>';
										str += '<div class="gaile"><span></span><em>'+n.zancount+'</em>';
										str += '</div></div></a>';
										
										if(<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
 == <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
){

											str += '<div class="delete" onClick="cancelFollow('+n.noteid+')">删除</div>';

										}

										str += '</div>';

									});
									$('#container').append(str);
									

									waterfull();
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

		<?php echo '<script'; ?>
>

			//删除收藏（也就是取消关注）
			function cancelFollow(noteid) {

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
					deleteFollow(noteid);

				})

			}

			function deleteFollow(noteid) {

				$.ajax({
		          url:'/member/cancelFollowNote',
		          type:"post",
		          data:{noteid:noteid},
		          success:function(ret){

		              if(ret != ''){

		                  var jsonarray = eval('('+ret+')');
		                  var msg = jsonarray.msg;
		                  var code = jsonarray.code;
		                 $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
						$('#win').css('display',"block").addClass('anima');
						window.location.reload()
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
	</body>

</html><?php }
}
