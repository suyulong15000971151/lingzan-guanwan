<?php
/* Smarty version 3.1.30, created on 2017-11-16 14:52:34
  from "D:\lingzanpc\application\views\templates\home\home.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0d35b21ae0e7_59413335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48712edf2a2c6be2b807a9273496e480ac55d60e' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\home\\home.index.html',
      1 => 1510815142,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a0d35b21ae0e7_59413335 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/index.css" />
	<body>
		<!--这里是商家采集弹窗-->
		<div id="caiji">
			<div class="caiji-box">
				<div class="caiji-content">
					<div class="caiji-title">
						<span>采集</span>
						<i></i>
					</div>
					<!-- <form id="colPro1" class="form-one" method="post" action="member/add_product"> -->
					<div class="caiji-show">
						<div class="caiji-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
							<input type="text" placeholder="输入项目产品名称" name="ppname" id="ppname"/>
						</div>
						<div class="caiji-right">
							
							
								<!--<p>选择已创建的项目</p>-->
							<div class="output">
								<input type="text" placeholder="创建新的项目" class="libname" name="libname"/>
							</div>
							<div class="select">
								<div class="select-show">
									<p>选择已创建的项目</p>
									<div class="select-box">
									</div>
								</div>
							</div>
							<div class="creat">
								<div class="creat-box" onClick="addProjectProduct()">
									<span>创建项目</span>
									<i></i>
								</div>
							</div>
							<div class="label">
								<input type="hidden" name="productId" id="productId"/>
								<input type="hidden" name="libid" id="libid"/>
								<input type="hidden" name="proid" id="proid"/>
								
							</div>
							
							<div class="submit">
								<button onClick="collectProduct1()"> 确认添加</button>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
		<!--这里是关注弹窗-->
		<div id="interset">
			<div class="interset-box">
				<div class="interset-content">
					<div class="interset-title">
						<span>关注</span>
						<i></i>
					</div>
					<div class="interset-mid">
						<div class="interset-item">
							<div class="middle">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
								<h2>亚里士多德</h2>
							</div>
							<p>21 项目 324 产品</p>
							<div class="bottom">
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/i16.jpg" alt="" />
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect2.jpg" alt="" />
								<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect3.jpg" alt="" / style="margin-right: 0;">
							</div>
						</div>
					</div>

					<div class="confirm">
						<button class="guanzhu">确认关注</button>
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
		<!--这是海报-->
		<div id="wrapper">
			<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
					<ul>
						<li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/1.jpg" alt="" />
						</li>
						<li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/2.jpg" alt="" />
						</li>
						<li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/3.jpg" alt="" />
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!--这是标题-->
		<div class="middle">
			<div class="title">
				<!-- <h1>精选推荐</h1> -->
				<h1></h1>
			</div>
		</div>
		
		<!--这里是产品加载的详情页面-->
		<div id="load-pro"></div>

		<!--这是瀑布流-->

		<div class="container" id="container">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['flag'] == 1) {?>
			<div class="box product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 product_">
				<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<div class="img-out">
						<div class="load"></div>
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
						</div>
						<i onclick="getLibraryList(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style="display:block">采集</i>
						<!-- <div class="col-tow" style="display:none">采集</div> -->
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
						<em>产品</em>
						<textarea style="display:none;"><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
</textarea>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<div class="praise">
							<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyZan'] == 0) {?>
								<span onclick="fabulous(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"></span>
								<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" />
								<i class="zan_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
								<?php } else { ?>
								<div class="yizan"></div>
								<i><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
								<?php }?>
							<?php } else { ?>
								<span></span>
								<i><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
							<?php }?>
						</div>
					</div>
				</a>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['flag'] == 2) {?>
			<div class="box">
				<a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<div class="img-out">
							<div class="load"></div>
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
						</div>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
						<em>项目</em>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
							<div class="rate" onClick="followProject(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">关注</div>
							<?php } else { ?>
							<div class="rate1">已关注</div>
							<?php }?>
						<?php }?>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow1'] == 0) {?>
							<div class="praise praise-tan peson_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
								<strong>+</strong>
								<em>关注</em>
							</div>
							<?php } else { ?>
							<div class="praise">
								<strong></strong>
								<em>已关注</em>
							</div>
							<?php }?>
						<?php }?>
					</div>
				</a>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['flag'] == 3) {?>
			<div class="box">
				<a href="/note/info/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="note_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<div class="img-out">
							<div class="load"></div>
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
						</div>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
						<em>笔记</em>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
							<div class="rate" onClick="followNote(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">收藏</div>
							<?php } else { ?>
							<div class="rate1">已收藏</div>
							<?php }?>
						<?php }?>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow1'] == 0) {?>
							<div class="praise praise-tan peson_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
								<strong>+</strong>
								<em>关注</em>
							</div>
							<?php } else { ?>
							<div class="praise">
								<strong></strong>
								<em>已关注</em>
							</div>
							<?php }?>
						<?php }?>
					</div>
				</a>
			</div>
			<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</div>
		<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
> -->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/index.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
>
		//阻止瀑布流产品默认跳转
//		$('.container .product_ a').click(function(evt){
//			evt.preventDefault();
//			var url=$(this).attr("href");
//			console.log(url)
//			
//		})
			/*
			 * 瀑布流的原理：
			 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
			 *
			 * */
			function pickclick(){
		$(".container .box .boximg i").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#caiji").css('display','block');
	    var productId = $(this).attr('proid');
	    getLibraryList(productId);

//	    var src=$(this).prev().attr("src");
//	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
	
	})
	$(".container .box .boximg .col-tow").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');
//	    var src=$(this).prev().attr("src");
//	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
	
	})
	
//	$(".praise-tan").click(function(event) {
//		event.preventDefault();
//		event.cancelBubble
//		event.stopPropagation();
//		$(window).scrollTop(0);
//		$('body').css("overflow", 'hidden')
//		$("#interset").css('display', 'block');
//
//	})
	$(".praise").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		if($(this).hasClass('praise-tan')){
			$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#interset").css('display', 'block');
		}else{
			if($(this).find('span')){
				
			// $(window).scrollTop(0);
		 //  $('body').css("overflow", 'hidden')
			// $('#win').css('display',"block").addClass('anima');
			// $('#win').find('span').text('已经关注').css({position:'absolute',top:'75px',left:'90px'})
			
			}else{
				
			}
		}
        
	})
	
	
			}
			
			
			pickclick()
		
				
			
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
//			var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
				imgsize()
				waterfull();
				setTimeout(function(){
										$('.container .box .boximg .img-out .load').css('display','none')
									},3000);
			
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
				var boxs = document.getElementsByClassName("box");
				//var boxHeight = boxs[boxs.length - 1].offsetTop;
//				var btn = document.getElementsByClassName("add-btn").item(0);
//				var boxHeight = btn.offsetTop + 49;
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
				
				$(window).resize(function(){
                  
				 waterfull();
  
			})
				
				
				$(document).scroll(function(){
					imgsize();
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
						var str = '';
						$.ajax({
							url: '/ajax/get_home_content',
							type: 'POST',
							async: true,
							data: {
								p: p
							},
							timeout: 3000,
							dataType: 'json',
							success: function(data){
								//console.log(data);
								//location.reload();
								if(!isEmptyObject(data.errmsg)) {
									$.each(data.errmsg, function(i, n) {
										if(n.flag == 1) {
											str += '<div class="box product_'+n.id+'" onmouseover="showCollection('+n.id+')" onmouseout="hideCollection('+n.id+')"><a href="/collection/product/'+n.id+'"><div class="boximg"><div class="img-out"><div class="load"></div><img src="'+n.pic+'" alt="'+n.name+'"></div><i proid='+n.id+' style="display:block">采集</i><div class="col-tow" style="display:none">采集</div><p>'+n.name+'</p><em>产品</em><textarea style="display:none;">'+n.desc+'</textarea></div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'" /><span>'+n.nickname+'</span></div><div class="praise">';
											if(<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
 !=  n.userid) {
												if(n.alreadyZan == 0) {
													str += '<span onclick="fabulous('+n.id+')"></span><input type="hidden" id="puserid" value="'+n.userid+'" /><i class="zan_'+n.id+'">'+n.zancount+'</i>';
												}else{
													str += '<div class="yizan"></div><i>'+n.zancount+'</i>';
												}
											}else{
												str += '<span></span><i>'+n.zancount+'</i>';
											}
											str += '</div></div></a></div>';
										} else if(n.flag == 2) {
											str += '<div class="box"><a href="/library/project/'+n.id+'" class="project_'+n.id+'"><div class="boximg"><div class="img-out"><div class="load"></div><img src="'+n.pic+'" alt="'+n.name+'"></div><p>'+n.name+'</p><em>项目</em>';

											if(<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
 !=  n.userid) {

												if(n.alreadyFollow == 0) {
													str += '<div class="rate" onClick="followProject('+n.id+','+n.userid+')">关注</div>';
												}else{
													str += '<div class="rate1">已关注</div>';
												}
											}

											str += '</div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'" /><span>'+n.nickname+'</span></div>';
											if(<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
 !=  n.userid) {

												if(n.alreadyFollow1 == 0) {
													str += '<div class="praise praise-tan peson_'+n.userid+'" onclick="followWindowOpen('+n.userid+','+n.id+')"><strong>+</strong><em>关注</em></div>';
												}else{
													str += '<div class="praise"><strong></strong><em>已关注</em></div>';
												}

											}

											str += '</div></a></div>';
										} else if(n.flag == 3) {
											str += '<div class="box"><a href="/note/info/'+n.id+'" class="note_'+n.id+'"><div class="boximg"><div class="img-out"><div class="load"></div><img src="'+n.pic+'" alt="'+n.name+'"></div><p>'+n.name+'</p><em>笔记</em>';

											if(<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
 !=  n.userid) {

												if(n.alreadyFollow == 0) {
													str += '<div class="rate" onClick="followNote('+n.id+','+n.userid+')">收藏</div>';
												}else{
													str += '<div class="rate1">已收藏</div>';
												}
											}

											str += '</div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'" /><span>'+n.nickname+'</span></div>';
											if(<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
 !=  n.userid) {

												if(n.alreadyFollow1 == 0) {
													str += '<div class="praise praise-tan peson_'+n.userid+'" onclick="followWindowOpen('+n.userid+','+n.id+')"><strong>+</strong><em>关注</em></div>';
												}else{
													str += '<div class="praise"><strong></strong><em>已关注</em></div>';
												}

											}

											str += '</div></a></div>';
										}
									});
									$('#container').append(str);
									
									imgsize();
									waterfull();
									pickclick()
									setTimeout(function(){
										$('.container .box .boximg .img-out .load').css('display','none')
									},3000)
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
			$("#EntTime").click(function() {
				$(".calendar").css({
					zIndex: "999999999",
					left: "60%",
					top: "17%"
				})
			})
		<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
