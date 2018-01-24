<?php
/* Smarty version 3.1.30, created on 2018-01-17 15:34:18
  from "D:\lingzanpc\application\views\templates\member\member.fans.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5efc7a4c38f5_08535568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba090e64e837f2eec216546f68c9734bd00d4bc' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.fans.html',
      1 => 1516174453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a5efc7a4c38f5_08535568 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<?php $_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/selffan.css" />
		<style>
        #edit .edit-box .edit-content .edit-container .form-one .img-load i{display: inline-block; width: 12px; height: 12px; position: absolute; right: 5px; top: 5px; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/delete_03.png) no-repeat; background-size: 100% 100%;}
        .man-sub{width:100%;height:60px;overflow: hidden;text-align: center;line-height: 60px;font-size: 16px;}
        .man-sub a{display: inline-block;padding:0 10px;color:#afafaf}
        .man-sub a.actv{color:#000}
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
	    			<div class="title">确定移除该粉丝吗?</div>
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
" class="man-act" >
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['followcount']+$_smarty_tpl->tpl_vars['userInfo']->value['fanscount']+$_smarty_tpl->tpl_vars['userInfo']->value['friendcount'];?>
</span>
					<p>人脉</p>
				</a>
			</div>
		</div>
		<div class="man-sub">
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的好友</a>
			<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">我的关注</a>
			<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">我的粉丝</a>
			<?php } else { ?>
			<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的好友</a>
			<a href="/member/follow/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">他的关注</a>
			<a href="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的粉丝</a>
			<?php }?>

			<form action="/member/fans/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
			<div class="sub-sear">
				<button></button>
				<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
				
			</div>
			</form>
	    </div>
	    <div id="man-box" style="position: relative;">
		<div class="man-show" id="man-show">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fans']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="man-item">
				<div class="item-box">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['user']['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
					<a href="/member/library">
					<?php } else { ?>
					<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
">
					<?php }?>
						<div class="big-img">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['avatar'];?>
" alt="" />
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
" alt="" />
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</div>
					</a>
					<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
					<div class="edit" onClick="addFollow(<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
)">添加关注</div>
					<?php } else { ?>
					<div class="edit">已关注</div>
					<?php }?>
					<div class="remove" onClick="cancelFan(<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['userid'];?>
)">移除粉丝</div>
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
		<?php echo '</script'; ?>
>
	</body>

</html>
<?php echo '<script'; ?>
>
	//添加关注
	function addFollow(userid) {

		$.ajax({
          url:'/member/addFollow',
          type:"post",
          data:{userid:userid},
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

	//移除粉丝
	function cancelFan(userid) {

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
			deleteFan(userid);

		})

	}

	function deleteFan(userid) {

		$.ajax({
          url:'/member/cancelFan',
          type:"post",
          data:{userid:userid},
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
							sign: 11,//表示获取类型为用户采集的产品
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

									var user = n.user;
									str += '<div class="man-item"><div class="item-box">';
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

										if (n.alreadyFollow == 0){
											str += '<div class="edit" onClick="addFollow('+user.userid+')">添加关注</div>';
										}else{
											str += '<div class="edit">已关注</div>';
										}

										str += '<div class="remove" onClick="cancelFan('+user.userid+')">移除粉丝</div>';
									}

									str += '</div></div>';

								});
								$('#man-box .man-show').append(str);

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
><?php }
}
