<?php
/* Smarty version 3.1.30, created on 2017-10-09 13:31:54
  from "D:\lingzanpc\application\views\templates\find\find.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59db09ca0899d0_73014101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dcc301282adb08e3f09e759cc0821a912be2760' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\find\\find.index.html',
      1 => 1507526472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_59db09ca0899d0_73014101 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<?php $_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/find.css" />

	<body>
		<!--这里是私信弹窗-->
		<div id="letter">
			<div class="letter-box">
				<div class="content">
					<div class="title">
						<span>私信</span><em>造物社</em><i></i>
					</div>
					<div class="container">
						<div class="item">
							<div class="people">
								<img src="img/pingp.png" alt="" />
							</div>
							<div class="text">
								<p>我想成为你的品牌道理，需要什么样的条件？我有线下实体店30多家。</p>
								<span>6月28日</span>
								<em></em>
							</div>
						</div>
						<div class="item host">

							<div class="text">
								<p>我想成为你的品牌道理，需要什么样的条件？我有线下实体店30多家。</p>
								<span>6月28日</span>
								<em></em>
							</div>
							<div class="people">
								<img src="img/person.png" alt="" />
							</div>
						</div>

					</div>

					<!--这里是发表说说-->
					<div class="publish">
						<div class="say">
							<img src="img/person.png" alt="" />
							<input type="text" />
						</div>
						<button>发送</button>
					</div>

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
								<img src="img/i16.jpg" alt="" />
								<img src="img/progect2.jpg" alt="" />
								<img src="img/progect3.jpg" alt="" / style="margin-right: 0;">
							</div>
						</div>
					</div>

					<div class="confirm">
						<button class="guanzhu">确认关注</button>
					</div>

				</div>
			</div>
		</div>
         <!--这里是商家采集弹窗-->
		<div id="caiji">
			<div class="caiji-box">
				<div class="caiji-content">
					<div class="caiji-title">
						<span>采集</span>
						<i></i>
					</div>
					<div class="caiji-show">
						<div class="caiji-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
						</div>
						<div class="caiji-right">
							<form id="colPro1" class="form-one" method="post" action="member/add_product">
							<div class="output">
								<input type="text" placeholder="搜索或创建新的项目" class="libname" name="libname"/>
							</div>
							<div class="select">
								<div class="select-show">
									<p>选择已创建的项目</p>
									<div class="select-box">
										<!-- <div class="item"><p>卧房</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div>
										<div class="item"><p>沙发家具</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div>
										<div class="item"><p>厨房卫浴</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div> -->
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
								<input type="text" placeholder="输入文字按空格或回撤以生成标签" name="tag"/>
							</div>
							</form>
							<div class="submit">
								<button onClick="collectProduct1()"> 确认添加</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--这是海报-->
		<div class="banner">

		</div>

		<!--这是标题-->
		

		<!--这是瀑布流-->
        <div class="outside" style="overflow: hidden;">	 
        
		<div class="container" id="container">
			<div class="middle">
			<div class="title">
				<h1>发现精选</h1>
			</div>
			</div>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['flag'] == 1) {?>

			<div class="box product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
						<!-- <i>采集</i>
                        <div class="col-tow">采集</div> -->
						<i onclick="getLibraryList(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" style="display:block">采集</i>
                        <div class="col-tow" style="display:none">采集</div>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
						<textarea style="display:none;"><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
</textarea>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<div class="praise">
							<span onclick="fabulous(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"></span>
							<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" />
							<i class="zan_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
						</div>
					</div>
				</a>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['flag'] == 2) {?>
			
			<div class="box">
				<a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<img src="<?php if ($_smarty_tpl->tpl_vars['item']->value['pic']) {
echo $_smarty_tpl->tpl_vars['item']->value['pic'];
} else {
echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg<?php }?>" alt="" />
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
						<em>项目</em>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>

						</div>
						<div class="praise praise-tan" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">
							<strong>+</strong>
							<em>关注</em>
						</div>
					</div>
				</a>
			</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['flag'] == 3) {?>
			<div class="box">
				<a href="/note/info/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="">
						<!--<i>采集</i>-->
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
					</div>
					<div class="behavior-note">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<div class="praise praise-tan">
							<span onclick="fabulous(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"></span>
							<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" />
							<i class="zan_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
						</div>
					</div>
				</a>
				<!--<div class="delete">删除</div>
				<div class="edit">编辑</div>-->
			</div>
			<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


			<div class="add-btn">
				加载更多
			</div>
		</div>
		<!--<?php echo '<script'; ?>
 src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		<!--这里是右侧内容-->
		<div class="container-right">
			<!--达人推荐-->
			<div class="master">
				<div class="master-top">
					<span>达人推荐</span><i onClick="changeMemberData()">换一换</i>
				</div>
				<ul class="memberList">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['talent']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
					<li>
						<div class="master-peo">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
						</div>
						<div class="text">
							<h4 <?php if ($_smarty_tpl->tpl_vars['item']->value['groupid'] == 10 || $_smarty_tpl->tpl_vars['item']->value['groupid'] == 20) {?>class="vp" <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h4>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['occupation'];?>
</p>
						</div>
					</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ul>
			</div>
			<!--这里是项目推荐-->
			<div class="progect">
				<h2>项目推荐</h2>
				<!--北欧风-->
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<div class="progect-con">
					<div class="Nordic">
						<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['type_name'];?>
</h3>
						<div class="Ul-con">
						<ul>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['list'], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
							<li><a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item2']->value['proid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['cover'];?>
" alt="" /></a></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
						</div>
					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</div>
			
			<!--这是产品推荐-->
			<div class="progect">
				<h2>产品推荐</h2>
				<!--北欧风-->
				<div class="progect-con">
					<div class="Nordic">
						<div class="Ul-con">
						<ul>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<li><a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['proid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['smallpic'];?>
" alt="" /></a></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
			</div>
		<!-- // <?php echo '<script'; ?>
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

		//换一批产品
			function changeMemberData() {

				$.ajax({
					url: '/find/changeMemberData',
					type: "post",
					success: function(ret) {

						if(ret != '') {

							var jsonarray = eval('(' + ret + ')');
							var msg = jsonarray.msg;
							var code = jsonarray.code;

							var html = '';
							var count = msg.length;
							for (var i = 0; i < count; i++) {

								var vp = '';
								if(msg[i].groupid == 10 || msg[i].groupid == 20) {
									vp = 'class="vp"';
								}

								html += '<li><div class="master-peo"><img src="'+msg[i].avatar+'" alt=""></div><div class="text"><h4 '+vp+'>'+msg[i].nickname+'</h4><p></p></div></li>';

							};

							$('.memberList').html(html);

						}

					},
					error: function() {
						alert('网络异常，请稍后再试');
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
				var containerWidth = document.documentElement.clientWidth-300;
//				if(containerWidth >= 1600) {
//					containerWidth = 1600;
//				}
                console.log(containerWidth)
//              containerWidth.style.width="100%";
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
						box[i].style.top = (minBoxHeight + 120) + "px";
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
