<?php
/* Smarty version 3.1.30, created on 2017-12-04 10:35:12
  from "D:\lingzanpc\application\views\templates\library\library.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a24b460cf5b97_25724648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d2c76115e6e55e0168a6bda0e6fa93d66a1d5b8' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\library\\library.index.html',
      1 => 1512037475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a24b460cf5b97_25724648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/icon.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/library.css" />
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
		<div class="banner">
			<!--<h1>你所见到的灵感，可直接转换成真实项目</h1>-->
			<div class="project">
				<a href="library?type=1"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect1.jpg" alt="" />
					<p>会所</p>
				</a>
				<a href="library?type=2"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect2.jpg" alt="" />
					<p>餐饮</p>
				</a>
				<a href="library?type=3"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect3.jpg" alt="" />
					<p>宾馆</p>
				</a>
				<a href="library?type=4"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect4.jpg" alt="" />
					<p>公共</p>
				</a>
				<a href="library?type=5"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect5.jpg" alt="" />
					<p>商业</p>
				</a>
				<a href="library?type=6"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect6.jpg" alt="" />
					<p>私宅</p>
				</a>
			</div>
			<div class="search-box">
				<form action="library" method="get" id="tijiao" >
				<div class="search-nav">
					<div class="search-select">
					<p>项目</p>
						<i></i>
						<div class="search-option">
							<div class="search-item">全部</div>
							<div class="search-item">项目</div>
							<div class="search-item">产品</div>
							<div class="search-item">笔记</div>
							<div class="search-item">个人</div>
						</div>
					</div>
					<div class="easyui-panel" style="flex: 1;box-sizing: border-box;border-bottom: 1px solid #d5d5d5;">

						<input type="hidden" class="searchType" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" placeholder="点击输入关键词">
						<input class="easyui-tagbox" style="width:100%;text-indent: 10px" placeholder="点击输入关键词">

					</div>
					<a href="javascript:void(0)" class="subData" style="display:block; width:64px; height:48px; line-height:48px; text-align:center; background-color: #fff; float:left; color: #ffffff; font-size: 18px;"><span class="sct"></span></a>
				</div>
				</form>
				<div class="search-sub">
					<span>点选热词：</span>
					<div class="hot">
					</div>
					<div class="change"></div>
				</div>
			</div>
		</div>
        
		<!--这是标题-->
		<div class="middle" style="height:40px;">
			<h3>搜到你要的结果共<?php echo $_smarty_tpl->tpl_vars['data']->value['count'];?>
个</h3>
		</div>

		<!--这是瀑布流-->

		<div class="container" id="container">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
			<?php if ($_smarty_tpl->tpl_vars['data']->value['count'] != 0) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['list'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="box">
				<a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="" />
						<p>[<?php echo $_smarty_tpl->tpl_vars['item']->value['libname'];?>
] <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
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
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php }?>

			<div class="add-btn">
				加载更多
			</div>
		</div>
		<input type="hidden" class="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
" />
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selfcoll.js"><?php echo '</script'; ?>
>
		<!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/same.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.easyui.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/library.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		
		function followPeople1(){

			$(".container .box .behavior .praise").click(function(event){
	   event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#interset").css('display','block');
			})
		}
		

		$('.search .search-box .search-nav input').css({
			height: "50px",
			lineHeight: "50px",
			outline: "none",
			border: "none"
		})
		$('.panel-body').css({border:"none"});
		$('span.textbox').css({height:"50px",lineHeight:"50px"})
		$('.tagbox-label').css({height:"40px",lineHeight:"40px"})

	  var type = "<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
";
		var searchType = '项目';
		if(type == 1) {
			searchType = '会所';
		}
		if(type == 2) {
			searchType = '餐饮';
		}
		if(type == 3) {
			searchType = '宾馆';
		}
		if(type == 4) {
			searchType = '公共';
		}
		if(type == 5) {
			searchType = '商业';
		}
		if(type == 6) {
			searchType = '私宅';
		}
		$('.search-box #tijiao .search-nav .search-select p').text(searchType);

		$(document).ready(function(){

			$('.easyui-tagbox').attr({'name':"seachWord"}).val("<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
");//easyui-tagbox
			var seachWord = "<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
";
			if(seachWord != ''){
				var html1 = '';
				var html2 = '';
				var arr = seachWord.split(',');
				var count = arr.length;
				for (var i = 0; i < count; i++) {
					html1 += '<span class="tagbox-label" tagbox-index="'+i+'" style="height: 40px; line-height: 40px;">'+arr[i]+'<a href="javascript:;" class="tagbox-remove"></a></span>';
					html2 += '<input type="hidden" class="textbox-value"  name="" placeholder="点击输入关键词"  value="'+arr[i]+'">';
				};

				$('#_easyui_textbox_input1').before(html1);
				$('#_easyui_textbox_input1').after(html2);

			}

			//点击热门关键词，修改连接并跳转
			 $(".search-sub a").click(function(){
			 	var type = $('.searchType').val();
			 	var seachWord = $(this).text();
			 	$(this).attr('href',"library?seachWord="+seachWord+"&type="+type);
			 })

			 //点击搜索数据
			 $('.subData').click(function(){
			 	var seach = '';
			 	$('.textbox-value').each(function(){
			 		var tab = $(this).val();
			 		seach += tab+',';
			 	})
			 	var t = $("#_easyui_textbox_input1").val();
			 	if(t != '') {
			 		seach += t+',';
			 	}
			 	var count = seach.length-1;
			 	var word = seach.substring(0,count);
			 	$('.easyui-tagbox').val(word);
			 	$('#tijiao').submit();
			 })

		})

		changeKeyWork(<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
);

		//换一批关键词
		function changeKeyWork(i) {

			var html = '';
			$.ajax({
              url:'/library/getKeyWorkList',
              type:"post",
              data:{type:<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
,offset:i},
              success:function(ret){

                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var pages  = jsonarray.pages;
                     

                       if(jsonarray != null) {
				           $.each(jsonarray.list, function(k, n) {

				           	var sty = '';
				           	if(n == "<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
") {
				           		sty = 'style="text-decoration: underline;color:#C90000;"';
				           	}
				           		html += '<a href="library?type='+type+'&seachWord='+n+'&pages='+i+'" '+sty+'>'+n+'</a>';
				           	});
			       		}
 					  i++;
                      if(pages<=i) {
                      	i = 0;
                      }
					$('.search-box .search-sub .change').attr('onClick','changeKeyWork('+i+')');

                   }
                   $('.search-box .search-sub .hot').html(html);

              },   
              error:function(){
                  // alert('网络异常，请稍后再试');
                  return false;
              }

          	})

		}

			/*
			 * 瀑布流的原理：
			 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
			 *
			 * */
			var container = document.getElementById("container");
			var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
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

			/*
			 *
			 * 什么加载！
			 *    滚动到底部的时候加载
			 *        滚动
			 *        底部的判断
			 *        多动到底部加载
			 *
			 *    页面的高度+滚动的高度 > 最后一张图片距离页面顶部的高度： 加载
			 *臭小子 在干嘛  我在 */
			/*这里是滚动条
			 * 滚动到底部
			 *
			 * */
			function loadFlag() {
				//获取页面高度
				var pageHeight = document.documentElement.clientHeight;
				//滚动的高度
				var scrollHeight = document.documentElement.scrollTop || document.body.scrollTop;
				//最后一张图片距离顶部的高度
				var boxs = document.getElementsByClassName("box");
				var btn = document.getElementsByClassName("add-btn").item(0);
				var boxHeight = btn.offsetTop + 49;
				return pageHeight + scrollHeight > boxHeight ? true : false;
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
						var type = $('#type').val();
						var str = '';
						$.ajax({
							url: '/ajax/get_library_content',
							type: 'POST',
							async: true,
							data: {
								p: p,
								type: type,
								seachWord: $('.seachWord').val()
							},
							timeout: 5000,
							dataType: 'json',
							success: function(data){

								if(!isEmptyObject(data.errmsg)) {

										$.each(data.errmsg.list, function(i, n) {

											str += '<div class="box"><a href="/library/project/'+n.id+'" class="project_'+n.id+'"><div class="boximg"><img src="'+n.pic+'" alt="'+n.name+'"><p>['+n.libname+'] '+n.name+'</p><em>项目</em>';
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

										// 

										});

									$('#container').append(str);
									$('#p').val(Number(p)+1);
									$('.middle h3').text('搜到你要的结果共'+data.errmsg.count+'个');

										waterfull();
										followPeople1()

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
