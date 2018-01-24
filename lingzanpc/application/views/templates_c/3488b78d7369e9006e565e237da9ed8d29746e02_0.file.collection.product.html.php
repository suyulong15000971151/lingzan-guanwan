<?php
/* Smarty version 3.1.30, created on 2017-10-27 15:03:54
  from "D:\lingzanpc\application\views\templates\collection\collection.product.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59f2da5a925d52_50091327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3488b78d7369e9006e565e237da9ed8d29746e02' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\collection\\collection.product.html',
      1 => 1509087831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_59f2da5a925d52_50091327 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/product.css" />

	<body>

		<!--这里是点击添加材思库-->
		<div id="library">
			<div class="library-box">
				<div class="library-content">
					<div class="library-title">
						<span>添加至材思库</span>
						<i></i>
					</div>
					<div class="library-show">
						<div class="library-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/images/addcai_03.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
						</div>
						<div class="library-right">
							<div class="output">
								<input type="text" placeholder="搜索或创建新的材思库" />
							</div>
							<div class="select">
								<div class="select-show">
									<p>选择已创建的材思库</p>
									<div class="select-box">
										<div class="item addselect">卧房</div>
										<div class="item">沙发家具</div>
										<div class="item">厨房卫浴</div>
									</div>
								</div>
							</div>
							<div class="creat">
								<div class="creat-box">
									<span>创建材思库</span>
									<i></i>
								</div>

							</div>
							<div class="label">
								<input type="text" placeholder="输入文字按空格或回撤以生成标签" />
							</div>
							<div class="submit">
								<button> 确认添加</button>
							</div>

						</div>
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
								<img src="img/cai1.jpg" alt="" />
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

					<!-- <form id="colPro1" class="form-one" method="post" action="../../member/add_product"> -->
					<div class="caiji-show">
						<div class="caiji-left">
							<img src="img/images/addcai_03.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
							<input type="text" placeholder="输入项目产品名称" name="ppname" id="ppname"/>
						</div>
						<div class="caiji-right">
							
								<div class="output">
									<input type="text" placeholder="创建新的项目" class="libname" name="libname"/>
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
									<!-- <input type="text" placeholder="输入文字按空格或回撤以生成标签" name="tag"/> -->
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

		<!--这是下面的产品-->
		<div class="product">
			<div class="left">
				<div class="left-box">
					<div class="item">
						<!-- <ul>
							<li class="opa"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect2.jpg" alt="" /></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect4.jpg" alt="" /></li>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/progect6.jpg" alt="" /></li>
						</ul> --> 
					</div>
					<div class="show">
						<!-- <ul>
							<li><img src="img/cai1.jpg" alt="" /></li>
							<li><img src="img/i12.jpg" alt="" /></li>
							<li><img src="img/i16.jpg" alt="" /></li>
							<li><img src="img/cai1.jpg" alt="" /></li>-->
						<!-- </ul> --> 
						<ul style="">
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['bigpic'];?>
" alt="" class="productImage"/></li>
						</ul>

					</div>
					<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['nearproid']->value['proid1'];?>
" class="arror-l"></a>
					<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['nearproid']->value['proid2'];?>
" class="arror-r"></a>
				</div>

			</div>
			<div class="lefts" style="width:60%;display: inline-block;float:left;height:800px"></div>
			<div class="right">
				<div class="title productInfo">
					<h1><?php echo $_smarty_tpl->tpl_vars['product']->value['proname'];?>
</h1>
					<p><?php echo $_smarty_tpl->tpl_vars['product']->value['desc'];?>
</p>
					<!-- <div class="collect" onclick="getLibList(<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
)">
						<em></em>
						<i>采集</i>
						<?php if ($_smarty_tpl->tpl_vars['proid2']->value) {?>
						<button id="add_pro">加入项目</button>
						<input type="hidden" id="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
						<input type="hidden" id="proid2" value="<?php echo $_smarty_tpl->tpl_vars['proid2']->value;?>
" />
						<input type="hidden" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
" />
						<?php }?>
					</div> -->
					<div class="collect" style="display:block" onclick="getLibList(<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
)">
						<em></em>
						<i>采集</i>
						<?php if ($_smarty_tpl->tpl_vars['proid2']->value) {?>
						<button id="add_pro">加入项目</button>
						<input type="hidden" id="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
						<input type="hidden" id="proid2" value="<?php echo $_smarty_tpl->tpl_vars['proid2']->value;?>
" />
						<input type="hidden" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
" />
						<?php }?>
					</div>
					<div class="collect-pub" style="display:none">
						<em></em>
						<i>采集</i>
						<?php if ($_smarty_tpl->tpl_vars['proid2']->value) {?>
						<button id="add_pro">加入项目</button>
						<input type="hidden" id="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
						<input type="hidden" id="proid2" value="<?php echo $_smarty_tpl->tpl_vars['proid2']->value;?>
" />
						<input type="hidden" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
" />
						<?php }?>
					</div>
					<div class="zans">
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['product']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['product']->value['alreadyZan'] == 0) {?>
							<em onclick="fabulous(<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
)"></em>
							<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['userid'];?>
" />
							<i class="zan_<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</i>
							<?php } else { ?>
							<div class="yizan"></div>
							<i><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</i>
							<?php }?>
						<?php } else { ?>
							<span></span>
							<i><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</i>
						<?php }?>
					</div>
				</div>

				<div class="Physics">
					<div class="color">
						<span>颜色：</span>
						<span style="width:30px;height:30px;background:<?php echo $_smarty_tpl->tpl_vars['product']->value['color'];?>
;margin-top:10px;margin-right:70px"></span>
					</div>
					<div class="color">
						<span>材质：</span>
						<span style="width:100px;white-space: normal;overflow: hidden;"><?php echo $_smarty_tpl->tpl_vars['product']->value['material'];?>
</span>
					</div>
					<br/>
					<div class="color">
						<span>尺寸：</span>
						<span style="width:100px;white-space: normal;overflow: hidden;"><?php echo $_smarty_tpl->tpl_vars['product']->value['size'];?>
</span>
					</div>
					<div class="color style">
						<span>型号：</span>
						<span style="width:100px;white-space: normal;overflow: hidden;"><?php echo $_smarty_tpl->tpl_vars['product']->value['model'];?>
</span>
					</div>
				</div>
				<!--这是价钱-->
				<div class="price">
					<span>￥<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
					<div class="add" style="display:none;"></div>
					<div class="count" style="display: none;">
						<i class="left">+</i>
						<span>1</span>
						<i class="right">-</i>
					</div>
				</div>
				<!--关注-->
				<div class="follow">
					<div class="follow-l">
						<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['avatar'];?>
" alt="" />
						<span><?php echo $_smarty_tpl->tpl_vars['product']->value['nickname'];?>
</span>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['product']->value['userid']) {?>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['alreadyFollow1'] == 0) {?>
					<div class="follow-r" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['product']->value['userid'];?>
)">
						<strong>+</strong>
						<i>关注</i>
					</div>
					<?php } else { ?>
					<div class="praise">
						<strong></strong>
						<em>已关注</em>
					</div>
					<?php }?>
					<?php }?>
				</div>
				<!--相关产品-->
				<div class="relevant">
					<div class="title">
						<span>相关产品</span>
						<i onClick="changeProductData(<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
)"></i>
					</div>
					<div class="content">
						<ul class="productList">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'item');
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
				<!--最近浏览-->
				<div class="relevant">
					<div class="title">
						<span>最近浏览</span>
					</div>
					<div class="content">
						<ul>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['history']->value, 'item');
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

				<div class="message">
					<div class="leave">
						<span>评论留言</span><i><?php echo $_smarty_tpl->tpl_vars['product']->value['commentcount'];?>
个</i>
					</div>
					<div class="ping">
						<input type="hidden" id="sourcetype" value="1" />
						<input type="hidden" id="sourceid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
" />
						<input type="text" id="comment" />
						<button id="send_comment"></button>
					</div>
					<div class="person">
						<ul>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comment']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<li>
								<div class="pson">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
								</div>

								<div class="text">
									<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h3>
									<p><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</p>
									<span><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</span>
								</div>
							</li>
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
		<!-- // <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
> -->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/product.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/myajax.js"><?php echo '</script'; ?>
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
		setTimeout(function(){
			$('.product .lefts').css('opacity',0)
		},5000)
		setTimeout(function(){
			$('.product .left img').css('opacity',1)
			$('.product .left').css('z-index',999999)
		},3000)
		
		//这里是里面弹窗里面的 输入效果
	var inputVal = $('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .output input') /*这里是弹出窗上面的输入框*/
	inputVal.on("keyup", function() {
		var values = inputVal.val();
		if(values == "") {
			// alert(1);
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select .select-show").css("display", 'block');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .creat-box").css("display", 'none');
		} else {
			// alert(2);
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select .select-show").css("display", 'none');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .creat-box").css("display", 'block');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .creat-box i").text(values);
		}
	})
		
		
			window.onload=function(){
				
//				$('.product .left .show ul').css('width','800px')
//				setTimeout(function(){
					
					imgwidth=$('.product .left .show img').get(0).offsetWidth
					imgheight=$('.product .left .show img').get(0).offsetHeight
					console.log(imgwidth)
					$('.product .left .show img').css('opacity','1')
					$('.product .left').css('z-index','9999999999999')
					if (imgwidth<=500){
						$('.product .left .show img').css({width:'400px',height:imgheight*400/imgwidth,marginTop:'100px'})
						
					}else if(500<imgwidth<=700){
						$('.product .left .show img').css({width:'700px',height:imgheight*700/imgwidth})
					}else{
						$('.product .left .show img').css({width:'800px',height:imgheight*700/imgwidth})
						
					}
//				})
			}


		//换一批产品
		function changeProductData(proid) {

			$.ajax({
				url: '/collection/changeProductData',
				type: "post",
				data: {
					proid: proid
				},
				success: function(ret) {

					if(ret != '') {

						var jsonarray = eval('(' + ret + ')');
						var msg = jsonarray.msg;
						var code = jsonarray.code;
						if(code != 200) {
							alert(msg);
							return false;
						}

						var html = '';
						var count = msg.length;
						for (var i = 0; i < count; i++) {

							html += '<li><a href="/collection/product/'+msg[i].proid+'"><img src="'+msg[i].smallpic+'" alt="" /></a></li>';

						};

						$('.productList').html(html);

					}

				},
				error: function() {
					alert('网络异常，请稍后再试');
					return false;
				}
			})
		}
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
