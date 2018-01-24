<?php
/* Smarty version 3.1.30, created on 2017-12-21 09:33:57
  from "D:\lingzanpc\application\views\templates\member\member.note.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3b0f859d81f5_42570780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8998fddfaf947d5831efc06a3b474b0cc78bd8d' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.note.html',
      1 => 1513667643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a3b0f859d81f5_42570780 (Smarty_Internal_Template $_smarty_tpl) {
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
.container .box .behavior .gaile .yizan{display: inline-block;width:20px;height:20px;background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/yizan.png) no-repeat;float:left;margin-top:15px;margin-right:10px;background-size: 100% 100%;}
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
		<!--这里是发布笔记弹窗-->
		<div id="note">
			<div class="note-box">
				<div class="note-content">
					<div class="title"><span>发布笔记</span><i></i></div>
					<div class="container">
						<form action="/member/addNote" method="post" id="addNote">
							<div class="uptitle">
								<input type="text" placeholder="请输入文章名称，12字以内" class="notename" name="notename"/>
							</div>
							<div class="fixed">
								<div class="add">
									<input type="file"  id="btn" onchange="uploads(this)">

									<span>文字</span> <i></i>
								</div>
							</div>

							<div class="bg">
								<div class="backg">
									<input type="file"  id="btn" onchange="uploadbg(this)" class="cover" name="cover">

								</div>
								<input type="checkbox" class="isshowcover" name="isshowcover" value="1"/> <span>同意封面显示在详情页第一张</span>
							</div>
						</form>
						<div class="bot">
							<button class="addNote" onClick="addNote()">确认上传</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--这里是编辑笔记弹窗-->

		<div id="edit">
			<div class="edit-box">
				<div class="edit-content">
					<div class="title"><span>编辑笔记</span><i></i></div>
					<div class="container">
						<form action="/member/editNote" method="post" id="editNote">
							<input type="hidden" id="noteid" name="noteid" value=""/>
							<input type="hidden" class="coverBg" name="coverBg" value="0"/>
						<div class="uptitle">
							<input type="text" placeholder="请输入文章名称，12字以内" id="notename" name="notename" value=""/>
						</div>
						<div class="fixed">
							<div class="add">
								<input type="file"  id="btn" onchange="uploade(this)">
								<span>文字</span> <i></i>
							</div>
						</div>

						<div class="bg">
							<div class="backg">
								<input type="file"  id="btn" onchange="uploadbge(this)" name="cover">
							</div>
							<input type="checkbox" name="isshowcover" value="1" id="isshowcover"/>
							<span>同意封面显示在详情页第一张</span>
						</div>
						</form>
						<div class="bot">
							<button onClick="editNote()" class="editNote">确认上传</button>
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
        			<div class="title">您确定要删除吗?</div>
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
			<a href="/member/note" class="actv">我的笔记</a>
			<?php } else { ?>
			<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的笔记</a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/follownote/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的收藏</a>
			<?php } else { ?>
			<a href="/member/follownote/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的收藏</a>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<form action="/member/note" method="get">
			<?php } else { ?>
			<form action="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
			<?php }?>
			<div class="sub-sear">
				<button></button>
				<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
				
			</div>
			</form>
	    </div>
		<!--这是瀑布流-->
		<div class="container" id="container">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<div class="box">
				<a href="javascript:void(0)" class="upload-box" onClick="addWindowOpen()">
					<div class="uploads-pro">发布笔记</div>
				</a>
			</div>
			<?php }?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['note']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="box">
				<a href="/note/info/<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
">
					<div class="boximg">
						<div class="img-out">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['notename'];?>
">
						</div>
						
						<!--<i>采集</i>-->
						<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['notename'];?>
</h3>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['shortdesc'];?>
</p>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/note_03.png" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['commentcount'];?>
</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['userid']->value != $_smarty_tpl->tpl_vars['userInfo']->value['userid']) {?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyZan'] == 0) {?>
							<div class="praise praise-tan">
								<span  onclick="fabulous2(<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
)" ></span>
								<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" />
								<em><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</em>
						<?php } else { ?>
							<div class="gaile"><div class="yizan"></div><em><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</em>
						<?php }?>
						<?php } else { ?>
							<div class="gaile"><span></span><em><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</em>
						<?php }?>
					</div>
					</div>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<div class="delete" onClick="delNote(<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
)">删除</div>
				<div class="edit" onClick="getNoteINfo(<?php echo $_smarty_tpl->tpl_vars['item']->value['noteid'];?>
)">编辑</div>
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
		//发布笔记弹窗
		function addWindowOpen() {

			$('.notename').val('');
			$('.note-content .container .fixed .inputtext').remove();
			$('.note-content .container .fixed .imgBox').prev('.add').remove();
			$('.note-content .container .fixed .imgBox').remove();
			$('.isshowcover').prop('checked',false);
			$('.addNote').parent('.bot').prev('p').remove();
			$('.addNote').text('确认上传');
		}

		//点赞文章
		function fabulous2(noteid) {

			var puserid = $('#puserid').val();

			$.ajax({
		      url:'/note/fabulous',
		      type:"post",
		      data:{noteid:noteid, puserid:puserid},
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

		$('.isshowcover').prop('checked',false);

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
				var userId = "<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
";
				var myUserId = "<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
";
				if(userId == myUserId) {
					$(window).scrollTop(0);
					$('body').css("overflow", 'hidden');
					$("#note").css('display', 'block');
					addWindowOpen();
				}

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
							// url: '/member/getNoteContent',
							url: '/member/getDataList',
							type: 'POST',
							async: true,
							data: {
								sign: 7,//表示获取类型为用户上传的笔记
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
										str += '<p>'+n.shortdesc+'</p></div>';
										str += '<div class="behavior"><div class="peson"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/note_03.png" alt="" />';
										str += '<span>'+n.commentcount+'</span></div>';

										if(<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
 != <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
) {
											if(n.alreadyZan == 0){
												str += '<div class="praise praise-tan"><span onclick="fabulous2('+n.noteid+')" ></span><input type="hidden" id="puserid" value="'+n.userid+'" /><em>'+n.zancount+'</em>';
											}else{
												str += '<div class="gaile"><div class="yizan"></div><em>'+n.zancount+'</em>';
											}

										}else{
											str += '<div class="gaile"><span></span><em>'+n.zancount+'</em>';
										}

										str += '</div></div></a>';

										if(<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
 == <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
){

											str += '<div class="delete" onClick="delNote('+n.noteid+')">删除</div>';
											str += '<div class="edit" onClick="editNoteWinOpen('+n.noteid+')">编辑</div>';

										}

										str += '</div>';

									});
									$('#container').append(str);
									
                                    imgsize()
									waterfull();
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
			//点击发布笔记，初始化内容
			$('.uploads-pro').click(function(){
				$('#addNote .text').remove();
				$('#addNote .picture').remove();
				$('#addNote .imgBoxbg').remove();

			})

			//添加笔记
			function addNote() {

				$('.addNote').text("正在上传中。。。").attr("disabled","true"); 

				$('.bot').prev('p').remove();
				$('#addNote').ajaxSubmit({

			        success:function(ret){

			            setTimeout("$('.addNote').removeAttr('disabled').text('确认上传')",2000);

			            var jsonarray = eval('('+ret+')');
			            var msg = jsonarray.msg;
			            var code = jsonarray.code;
			            if(code != 200){

			            	$('.bot').prev('p').remove();
			            	$('.bot').before(msg);
			              	return false;

			            }

			            $('#win').css('display',"block").addClass('anima');
                   		$('#win').find('span').text('发布成功').css({position:'absolute',top:'75px',left:'90px'});
                   		window.location.href = "/member/note"; 

			        },   
			        error:function(){  
			          // alert('网络异常，请稍后再试');
			          setTimeout("$('.addNote').removeAttr('disabled').text('确认上传')",2000);
					  $('.bot').prev('p').remove();
					  $('.bot').before('<p>网络异常，请稍后再试</p>');
			          return false;
			        }

			    })

			}

			//删除笔记
			function delNote(noteid){

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
				deleteNote(noteid);

			})

			}

			//删除笔记
			function deleteNote(noteid) {

				$.ajax({
		          url:'/member/delNote',
		          type:"post",
		          data:{noteid:noteid},//添加的是单片类型的才思库，所以libflg为1
		          success:function(ret){

		              if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {
							$('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
								$('#win').css('display',"block").addClass('anima');
		                      	window.location.reload();

						}else{

							$('#win .win-box .com span').html('删除成功').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
								$('#win').css('display',"block").addClass('anima');
					            window.location.reload();

						}

                   }

		          },   
		          error:function(){  
		              $('#win .win-box .com span').html('网络异常，请稍后再试').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display',"block").addClass('anima');
		            window.location.reload();
		          }

		      })

			}

			//瀑布流编辑笔记弹框
			function editNoteWinOpen(noteid) {
				$(window).scrollTop(0);
				$('body').css("overflow", 'hidden')
				$("#edit").css('display', 'block');
				getNoteINfo(noteid);
			}

			//编辑笔记，弹窗赋值
			function getNoteINfo(noteid) {

				$('#isshowcover').prop('checked',false);
				$('.coverBg').val('');
				$('#editNote .text').remove();
				$('#editNote .picture').remove();
				$('#editNote .imgBoxbg').remove();
				$('.editNote').text('确认上传');
				$('.editNote').parent('.bot').prev('p').remove();

				$.ajax({
			          url:'/member/getNoteInfo',
			          type:"post",
			          data:{noteid:noteid},//添加的是单片类型的才思库，所以libflg为1
			          success:function(ret){

			              if(ret != ''){

	                      var jsonarray = eval('('+ret+')');
	                      var msg = jsonarray.msg;
	                      var code = jsonarray.code;
	                      if(code != 200) {
	                      	alert(msg);
	                      	return false;
	                      }

	                      $('#noteid').val(msg.noteid);
	                      $('#notename').val(msg.notename);
	                      if(msg.isshowcover == 1) {
 								$('#isshowcover').prop('checked',true);
	                      }

	                      if(msg.cover != '') {
	                      	$('.coverBg').val(1);
	                      }

	                      //展示内容
		                    var html = '';
		                    JSON.parse(msg.content, function (k, v) {
								    // console.log(k); // 输出当前的属性名，从而得知遍历顺序是从内向外的，
								                    // 最后一个属性名会是个空字符串。
								    // return v;       // 返回原始属性值，相当于没有传递 reviver 参数。
							    if(k != '') {

							    	if(v.indexOf("<img src") != -1){
										// alert('是图片');

										var imgStr = v.replace('<img src="','');
										var imgStr = imgStr.replace('">','');
										// html += '<div class="picture picture_'+k+'"><input type="hidden" class="imgBox" offset="'+k+'" name="image_'+k+'" value="'+imgStr+'"/><div class="pic-item">'+v+'<i onClick="delImg('+k+')"></i></div></div>';
										html += '<div class="picture picture_'+k+'"><input type="hidden" class="imgBox" offset="'+k+'" name="image_'+k+'" value="'+imgStr+'"/><div class="pic-item" style="background:url('+imgStr+') no-repeat center;background-size:cover"><i onClick="delImg('+k+')"></i></div></div>';

									}else{//是文字

										html += '<div class="text text_'+k+'"><i onClick="delText('+k+')"></i><textarea name="text_'+k+'" class="inputtextarea" offset="'+k+'" rows="" cols="">'+v+'</textarea></div>';

									}

							    }

							}); 

							$('.fixed').before(html);

		                    //展示封面
		                    if(msg.cover != '') {
		                    	var cover = '<div class="imgBoxbg imgBg_500"><div class="bgb" style="background:url('+msg.cover+') no-repeat center;background-size:cover"><i onClick="delImgBg(500)"></i></div></div>';

		                    	$('.backg').after(cover);

		                    }

	                   }

			          },   
			          error:function(){  
			              alert('网络异常，请稍后再试');
			              return false;
			          }
			      })
			}

			//修改笔记
			function editNote() {

				$('.editNote').text('正在上传中。。。').attr("disabled","true"); 
				$('.bot').prev('p').remove();
				$('#editNote').ajaxSubmit({

			        success:function(ret){

			            setTimeout("$('.editNote').removeAttr('disabled').text('确认上传')",2000);
			            
			            var jsonarray = eval('('+ret+')');
			            var msg = jsonarray.msg;
			            var code = jsonarray.code;
			            if(code != 200){
							$('.bot').prev('p').remove();
			            	$('.bot').before(msg);
			              	return false;

			            }

	                   $('#win').css('display',"block").addClass('anima');
	                   $('#win').find('span').text('操作成功').css({position:'absolute',top:'75px',left:'90px'});
	                   window.location.reload();

			        },   
			        error:function(){  
			           setTimeout("$('.editNote').removeAttr('disabled').text('确认上传')",2000);
					  $('.bot').prev('p').remove();
					  $('.bot').before('<p>网络异常，请稍后再试</p>');
			          return false;
			        }

			   })

			}

			function delImg(k) {
				$('.picture_'+k).remove();
			}

			function delText(k) {
				$('.text_'+k).remove();
			}

			function delImgBg(k) {
				$('.imgBg_'+k).remove();
				$('.coverBg').val('');
			}
			//这里是发布笔记
			var n = 0;

			function uploads(obj) {
				//alert(obj.files.length);
				var length = $()
				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {

					var textSum = $('.inputtext:last').attr('offset');
					var imgSum = $('.imgBox:last').attr('offset');

					var text = $('.inputtext').length;
					if(text == 0) {
						textSum = 1;
					}else{
						textSum = parseInt(textSum)+1;
					}
					var img = $('.imgBox').length;
					if(img == 0) {
						imgSum = 1;
					}else{
						imgSum = parseInt(imgSum)+1;
					}

					var offset = parseInt(textSum)+1;
					if(imgSum > textSum) {
						offset = parseInt(imgSum)+1;
					}
					var prev = 0;
					if(offset > 1) {
						var prev = parseInt(offset)-1;
					}

					n = obj.files.length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));
						//txt = txt.split("")
						console.log(url);
						html += `<div class='imgBox ct imgBox_`+prev+`' offset='`+prev+`'>
			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:cover'>
			<i></i>
			</div>
			</div><div class="add"><input type="file"  id="btn" onchange="uploads(this)" name="image_`+offset+`"><span>文字</span> <i></i></div>`;
						var load = '<div class="add"><input type="file"  id="btn" onchange="uploads(this)"><span>文字</span> <i></i></div>'
					}
					$("#note .note-box .note-content .container .add").hide();
					$("#note .note-box .note-content .container .fixed").append(html);
//					$("#note .note-box .note-content .container .fixed").append(load)
					$('.imgBox_'+prev).prev('.add').find('input').attr('name','image_'+prev);
				}

				$(".imgBox .bg i").click(function(event) {

					$(this).parent().parent().prev().remove()
					$(this).parent().parent().remove()
			
				});

				//这里是发布笔记的添加 输入框效果
				$("#note .container .add span").click(function() {

					var textSum = $('.inputtext:last').attr('offset');
					var imgSum = $('.imgBox:last').attr('offset');

					var text = $('.inputtext').length;
					if(text == 0) {
						textSum = 1;
					}else{
						textSum = parseInt(textSum)+1;
					}
					var img = $('.imgBox').length;
					if(img == 0) {
						imgSum = 1;
					}else{
						imgSum = parseInt(imgSum)+1;
					}

					var offset = textSum;
					if(imgSum > textSum) {
						offset = imgSum;
					}

					$(this).parent().before('<div class="inputtext" offset="'+offset+'"><textarea name="text_'+offset+'" rows="" cols=""></textarea><i></i></div>');
					//这里是点击删除 对应的输入框
					$(".inputtext i").click(function() {
						$(this).parent().remove()

					})
				})
				console.log($("input[type='file']").eq(0))
			}
			//这里是换背景封面照片
			function uploadbg(obj) {
				//alert(obj.files.length);
				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {
					n = obj.files.length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));
						//txt = txt.split("")
						console.log(url);
						html += `<div class='imgBoxbg'>
			<div class='bgb' style='background:url(` + url + `) no-repeat center;background-size:cover'>
			<i></i>
			</div>
			</div>`;
					}
					$("#note .container .bg").find(".imgBoxbg").remove()
					$("#note .container .backg").after(html);
					$('#note .note-box .note-content .container .backg').hide()
				}

				$(".imgBoxbg .bgb i").click(function(event) {
					$(this).offsetParent().remove()
					$('#note .note-box .note-content .container .backg').show()
					
				})
			}

			//这里是编写笔记修改照片
			function uploade(obj) {
				//alert(obj.files.length);
				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {

					var textSum1 = $('.inputtextarea:last').attr('offset');
					var textSum2 = $('.inputtext:last').attr('offset');
					var imgSum = $('.imgBox:last').attr('offset');

					var text1 = $('.inputtextarea').length;
					var text2 = $('.inputtext').length;
					var text = parseInt(text1) + parseInt(text2);
					if(text == 0) {
						textSum = 1;
					}else{
						// textSum = parseInt(textSum1)+parseInt(textSum1)+1;
						textSum = parseInt(textSum1)+1;
						if(textSum2 > textSum1) {
							textSum = parseInt(textSum2)+1;
						}
					}
					var img = $('.imgBox').length;
					if(img == 0) {
						imgSum = 1;
					}else{
						imgSum = parseInt(imgSum)+1;
					}

					var offset = parseInt(textSum)+1;
					if(imgSum > textSum) {
						offset = parseInt(imgSum)+1;
					}
					var prev = 0;
					if(offset > 1) {
						var prev = parseInt(offset)-1;
					}

					n = obj.files.length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));
						//txt = txt.split("")
						console.log(url);
						html += `<div class='imgBox ct imgBox_`+prev+`' offset='`+prev+`'>
			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:cover'>
			<i></i>
			</div>
			</div></div><div class="add"><input type="file"  id="btn" onchange="uploade(this)" ><span>文字</span> <i></i></div>`
					}
					$("#edit .container .add").hide()
					$("#edit .container .fixed").append(html);
//					$("#edit .container .fixed").append(load);
					$('.imgBox_'+prev).prev('.add').find('input').attr('name','image_'+prev);
				}

				//这里是编辑笔记的添加 输入框效果
				$("#edit .add span").click(function() {

					var textSum1 = $('.inputtextarea:last').attr('offset');
					var textSum2 = $('.inputtext:last').attr('offset');
					var imgSum = $('.imgBox:last').attr('offset');

					var text1 = $('.inputtextarea').length;
					var text2 = $('.inputtext').length;
					var text = parseInt(text1) + parseInt(text2);
					if(text == 0) {
						textSum = 1;
					}else{
						// textSum = parseInt(textSum1)+parseInt(textSum1)+1;
						textSum = parseInt(textSum1)+1;
						if(textSum2 > textSum1) {
							textSum = parseInt(textSum2)+1;
						}
					}
					var img = $('.imgBox').length;
					if(img == 0) {
						imgSum = 1;
					}else{
						imgSum = parseInt(imgSum)+1;
					}

					var offset = textSum;
					if(imgSum > textSum) {
						offset = imgSum;
					}

					$(this).parent().before('<div class="inputtext" offset="'+offset+'"><textarea name="text_'+offset+'" rows="" cols=""></textarea><i></i></div>');
					//这里是点击删除 对应的输入框
					$(".inputtext i").click(function() {
						$(this).parent().remove()

					})
				})

				$("#edit .imgBox .bg i").click(function(event) {
					$(this).parent().parent().prev().remove()
					$(this).parent().parent().remove()
				})
			}
			//这里是编辑笔记背景
			function uploadbge(obj) {
				//alert(obj.files.length);
				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {
					n = obj.files.length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));
						//txt = txt.split("")
						console.log(url);
						html += `<div class='imgBoxbg'>
			<div class='bgb' style='background:url(` + url + `) no-repeat center;background-size:cover'>
			<i></i>
			</div>
			</div>`;
					}
					$("#edit .container .bg").find(".imgBoxbg").remove()
					$("#edit .container .backg").after(html);
					$('.coverBg').val(1);
				}

				$(".imgBoxbg .bgb i").click(function(event) {
					$(this).offsetParent().remove()
				})
			}

			function judge(obj) {
				var str = '';
				if(obj.name.match(/.jpg/i)) {
					str = ".jpg";
				} else if(obj.name.match(/.png/i)) {
					str = ".png";
				} else if(obj.name.match(/.gif/i)) {
					str = ".gif";
				} else if(obj.name.match(/.bmp/i)) {
					str = ".bmp";
				}
				return str;
			}

		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
