<?php
/* Smarty version 3.1.30, created on 2017-12-19 10:21:05
  from "D:\lingzanpc\application\views\templates\library\library.project_product_add2.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a387791b73954_67742082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd90a7d9e6a6aaf498254e70b5cd60bc95e0c444' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\library\\library.project_product_add2.html',
      1 => 1513649538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a387791b73954_67742082 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/rotating.css" />
<style>
#pick .pick-box .pick-content .pick-show .pick-right .select-box .item{position: relative; overflow: hidden; background:#ffffff; line-height: 30px; height:auto;}
#pick .pick-box .pick-content .pick-show .pick-right .select-box p{width: 100%;background: #eee;height: 30px; line-height: 30px; border-radius: 5px;}
#pick .pick-box .pick-content .pick-show .pick-right .select-box i{display: inline-block; position: absolute; right: 15px; top: 10px; width: 15px; height: 10px; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/tbarror_03.png) no-repeat; background-size: 100% 100%;}
#pick .pick-box .pick-content .pick-show .pick-right .select-box .sub-item{width: 90%; overflow: hidden; float: right; margin-top: 5px;}
#pick .pick-box .pick-content .pick-show .pick-right .select-box .sub-icon{height: 30px; background: #e8e8e8; border: 1px solid #d5d5d5;box-sizing: border-box;margin: 5px 0 5px;border-radius: 5px;}
#pick .pick-box .pick-content .pick-show .pick-right .select-box .sub-add{height: 30px;box-sizing: border-box;background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/caiadd_03.png) no-repeat left center;background-size: 15px 15px;}
</style>
<!--这里是上传产品弹窗-->
		<div id="pick">
			<div class="pick-box">
				<div class="pick-content">
					<div class="pick-title">
						<div class="title-left">
							<span>产品信息编辑</span>
							<div class="change"><em>基本选项</em><strong></strong></div>
						</div>
						<div class="title-right">
							<label for="">添加到项目</label>
							<i></i>
						</div>
						
					</div>
					<div class="pick-show">
						<form id="addPro" class="form-one" enctype="multipart/form-data" method="post" action="">
							<!-- <form class="form-one"> -->
							<input type="hidden" name="productId" id="productId" />
							<input type="hidden" name="proid" id="proid" />
							<input type="hidden" name="libid" id="libid" />
							<input type="hidden" name="oldLibid" id="oldLibid" />
							<input type="hidden" name="oldProid" id="oldProid" />
							<input type="hidden" name="sid" id="sid" />
							<input type="hidden" name="tag" id="tag" />
							<div class="pick-left">
								<div class="back-one">
									<div class="img-load">
										<div class="chooseImage">
											<img id="upImage" />

										</div>
										<input type="file" name="fileUpload" id="fileUpload" onchange=" onFileSelected(event) ">
										<p id="chooseFile" class="btn pk">本地上传</p>
									</div>
									<div class="title-item">
										<span>*</span>
										<input type="text" placeholder="产品名称" name="proname" class="proname" style="width:100%;opacity: 1;" />
									</div>
									<div class="title-item">
										<span>*</span>
										<i></i>
										<div class="classif">
											<input type="text" name="type1" class="type1" />
											<p>产品分类</p>
											<div class="class-item fenLeiBox">
												<a href="javascript:void(0)">家具</a>
												<a href="javascript:void(0)">配饰</a>
												<a href="javascript:void(0)">灯具</a>
												<a href="javascript:void(0)">卫浴</a>
												<a href="javascript:void(0)">厨房</a>
												<a href="javascript:void(0)">材料</a>
											</div>
										</div>
									</div>
									<div class="title-item">
										<span>*</span>
										<i></i>
										<div class="classif">
											<input type="text" name="type2" class="type2" />

											<p>产品功能</p>
											<div class="class-item gongNengBox">
											</div>
										</div>
									</div>
									<!--<div class="title-item fenggeType">
										<span>*</span>
										<i></i>
										<div class="classif">
											<input type="text" name="type3" class="type3" />
											<p>风格</p>
											<div class="class-item">
												<a href="javascript:void(0)">斯堪地纳</a>
												<a href="javascript:void(0)">新中式</a>
												<a href="javascript:void(0)">简洁大气</a>
												<a href="javascript:void(0)">地中海</a>
												<a href="javascript:void(0)">殖民地</a>
												<a href="javascript:void(0)">伊斯兰</a>
												<a href="javascript:void(0)">日式禅意</a>
												<a href="javascript:void(0)">明式风雅</a>
												<a href="javascript:void(0)">实用舒适</a>
												<a href="javascript:void(0)">典雅主义</a>
												<a href="javascript:void(0)">维多利亚</a>
												<a href="javascript:void(0)">波斯</a>
												<a href="javascript:void(0)">意大利</a>
												<a href="javascript:void(0)">包豪斯</a>
												<a href="javascript:void(0)">温暖家</a>
												<a href="javascript:void(0)">新古典</a>
												<a href="javascript:void(0)">罗马风</a>
												<a href="javascript:void(0)">巴洛克</a>
												<a href="javascript:void(0)">极简主义</a>
												<a href="javascript:void(0)">后现代</a>
												<a href="javascript:void(0)">高大上</a>
												<a href="javascript:void(0)">现代主义</a>
												<a href="javascript:void(0)">国际风</a>
												<a href="javascript:void(0)">哥特</a>
												<a href="javascript:void(0)">德国工业</a>
												<a href="javascript:void(0)">LOFT</a>
												<a href="javascript:void(0)">小清馨</a>
												<a href="javascript:void(0)">新艺术</a>
												<a href="javascript:void(0)">法式浪漫</a>
												<a href="javascript:void(0)">洛可可</a>
											</div>
										</div>
									</div>-->
									<div class="title-item">
										<span>*</span>
										<i></i>
										<div class="classif">
											<input type="hidden" name="colors" class="colors" />
											<input type="text" placeholder="颜色" name="color" class="color" />
											<div class="input-color"></div>
											<p>颜色</p>
											<div class="class-item color-box row offset1" id="color-palette">
												<a class='color span1 colorPick colorPickActive' id="selected-color-1" href="javascript:void(0)"></a>
												<a class='color span1 colorPick' id="selected-color-2" href="javascript:void(0)"></a>
												<a class='color span1 colorPick' id="selected-color-3" href="javascript:void(0)"></a>
												<a class='color span1 colorPick' id="selected-color-4" href="javascript:void(0)"></a>
												<a class='color span1 colorPick' id="selected-color-5" href="javascript:void(0)"></a>
												<a class='color span1 colorPick' id="selected-color-6" href="javascript:void(0)"></a>
											</div>
										</div>
									</div>
									<div class="title-item simpleType">
										<!--<span>*</span>-->
										<!--<input type="text" placeholder="价格" style="width:100%;opacity: 1;" name="price" class="price" />-->
										<input type="hidden" name="x_word" class="x_word" />
										<input type="hidden" name="y_word" class="y_word" />
										<div class="check_one" style="display: inline-block;overflow: hidden;">
											<div class="coordinate brief"> <em class="blak"></em> 简洁</div>
										    <div class="coordinate Complex"> <em></em> 繁复</div>
										</div>
										<div class="check_tow" style="display: inline-block;overflow: hidden;">
											<div class="coordinate brief"> <em></em> 抽象</div>
										    <div class="coordinate brief"> <em></em> 具象</div>
										</div>
										
									</div>

								</div>
								<div class="back-two">
									<input type="text" placeholder="单价" style="opacity: 1;" name="price" class="price" />
									<!--<input type="text" placeholder="链接" name="link" class="link" />-->
									<input type="text" placeholder="材质" name="material" class="material" />
									<input type="text" placeholder="规格" name="size" class="size" />
									<input type="text" placeholder="产品型号" name="model" class="model" />
									<textarea name="desc" rows="" cols="" placeholder="产品描述" class="desc"></textarea>
									<input type="text" placeholder="链接" name="link" class="link" />
								</div>
								<!--<div class="change"><span>基本选项</span><i></i></div>-->
							</div>
						</form>
						<div class="pick-right">
							<div class="output">
								<a href="javascript:;" style="overflow:hidden;display: block;width:71%;margin-left:35px;margin-top:20px">
								<span></span>	
								<input type="text" placeholder="创建新的项目" class="libname" name="libname" style="margin-left:0;width:100%;margin:0;" />
								</a>
							</div>
							<div class="select" id="colPro1">
								<div class="select-show">
									<!--<p>选择已创建的项目</p>-->
									<div class="select-box">
									</div>
								</div>
							</div>
							<div class="creat">
								<div class="kend-box" onClick="addLibrary()" style="display:none;">
									<span style=" display: inline-block; font-size: 15px; line-height: 30px; text-indent: 25px; color: #8d8d8d; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/caiadd_03.png) no-repeat center left;">创建项目</span>
									<i style="display: inline-block; font-size: 15px; line-height: 30px; color: #000;"></i>
								</div>
							</div>
							<div class="label">
							</div>
							<div class="submit">
								<button>确认上传</button>
							</div>
		                     <div class="anima-lo">
		                     	<div class="k-ball-holder3">
			                	<div class="k-ball7a" ></div>
			                	<div class="k-ball7b" ></div>
			                	<div class="k-ball7c" ></div>
			                	<div class="k-ball7d" ></div>
			                	<p>正在上传中。。。</p>
			                </div>
		                     </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--这是项目标题-->
		<div class="sub-nav">
			<div class="sub-navs">
			<h1><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
</h1>
			<span class="spanle">/ &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
</span>
			<!-- <span>/ &nbsp;&nbsp;帮他调整</span> -->
			<!-- <span>/ &nbsp;&nbsp;我的采集</span> -->
			<?php if ($_smarty_tpl->tpl_vars['sign']->value == 1) {?> <span>/ &nbsp;&nbsp;我的产品</span> <?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sign']->value == 2) {?> <span>/ &nbsp;&nbsp;我的采集</span> <?php }?>
			<i onclick="window.location.href='/library/project/<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
'">返回</i>
			</div>
		</div>

		<!--这是标题-->
		<div class="middle">
			<div class="title">
				<a <?php if ($_smarty_tpl->tpl_vars['sign']->value == 1) {?> class="av" <?php }?> href="/library/project_product_add2/<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tyid']->value;?>
">我的产品</a>
				<a <?php if ($_smarty_tpl->tpl_vars['sign']->value == 2) {?> class="av" <?php }?> href="/library/project_product_add3/<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tyid']->value;?>
">我的采集</a>
				<!-- <span>已选关键词:无</span> -->
			</div>
			<!-- <div class="key">
				<span>热门关键词：</span>
				<a href="">中式、</a>
				<a href="">欧式、</a>
				<a href="">美式、</a>
				<a href="">东南亚、</a>
				<a href="">新艺术、</a>
				<a href="">新中式、</a>
				<a href="">意大利、</a>
				<a href="">法式、</a>
				<a href="">中式、</a>
				<i></i>
			</div> -->
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

		<!--这是瀑布流-->
		<div class="container" id="container">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="sign" value="<?php echo $_smarty_tpl->tpl_vars['sign']->value;?>
" />
			<?php if ($_smarty_tpl->tpl_vars['sign']->value == 1) {?>
			<div class="box">
				<a href="" class="upload-box" onClick="addProductPopup()">
					<div class="uploads-pro">上传产品</div>
				</a>
			</div>
			<?php }?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="box">
				<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['proid'];?>
">
					<div class="boximg">
						<div class="img-out">
						<div class="load"></div>
						<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['smallpic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['proname'];?>
">
						</div>
						<!--<i>采集</i>-->
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['proname'];?>
</p>
						<span>¥<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<div class="praise praise-tan">
							<span></span>
							<em><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</em>
						</div>
					</div>
				</a>
				<!--<div class="delete">删除</div>-->
				<div class="editorder" onclick="window.location.href='/library/project_product_add2/<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tyid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['proid'];?>
'; return false;">加入清单</div>
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
/js/color-thief.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selfcoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar-zh.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/calendar-setup.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		//这里是里面弹窗里面的 输入效果
		var inputVal = $('#pick .pick-box .pick-content .pick-show .pick-right .output input') /*这里是弹出窗上面的输入框*/
		inputVal.on("keyup", function() {
		var values = inputVal.val();

		if(values == "") {
			$("#pick .pick-box .pick-content .pick-show .pick-right .select .select-show").css("display", 'block');
			$("#pick .pick-box .pick-content .pick-show .pick-right .creat .kend-box").css("display", 'none');
		} else {
			$("#pick .pick-box .pick-content .pick-show .pick-right .select .select-show").css("display", 'none');
			$("#pick .pick-box .pick-content .pick-show .pick-right .creat .kend-box").css("display", 'block');
			$("#pick .pick-box .pick-content .pick-show .pick-right .creat .kend-box i").text(values);
		}

	})
	var tm = setTimeout(function() {
		clickTognum = $("#pick .pick-box .pick-content .pick-show .pick-right .select-box .item p").size()
		$("#pick .pick-box .pick-content .pick-show .pick-right .select-box .item p").on("click", function() {
			$(this).parent().find(".sub-item").slideToggle();
			$(this).next().toggleClass("rotates")
		})
	}, 200)
		var fsg=true;
		$("#pick .pick-box .pick-content .pick-show .pick-right .creat .kend-box").on("click", function() {

			fsg=false;
			var length = $('#pick .pick-box .pick-content .pick-show .pick-right .select-box .item').length;
			var values = inputVal.val();
			var item = document.getElementsByClassName("item")
			var atr = []
			for(i = 0; i < length; i++) {
				if(atr.indexOf(item[i].firstChild.innerText) <= -1) {
					atr.push(item[i].firstChild.innerText)
				}

			}

			if(atr.indexOf(values) >= 0) {

				$('.submit').prev('p').remove();
				$('.submit').before('<p>已创建这个项目</p>');
				return false;
			} else {

				$('#pick .pick-box .pick-content .pick-show .pick-right .select-show').css("display", 'block')
					//				var div=document.createElement('<div class="item"></div>')

				$('#pick .pick-box .pick-content .pick-show .pick-right .select-box').append("<div class='item'><p>" + values + "</p><i></i><div class='sub-item'><div class='sub-add'>添加区域</div></div></div>");

				$('#pick .pick-box .pick-content .pick-show .pick-right .select-box .item').eq(length).insertBefore($('#pick .pick-box .pick-content .pick-show .pick-right .select-box .item').eq(0))

				clickTogtotal = $("#pick .pick-box .pick-content .pick-show .pick-right .select-box .item p").size()

				$('#pick .sub-item .sub-add').eq(0).click(function() {
					// var input = `<input type="text" name="" id="" />`;
					// $(this).before(input)
					$('#pick .sub-item .sub-add').parent().find("input").on("keyup", function(event) {

						if(event.keyCode == 13) {

							var value = $(this).val();
							$(this).before(`<div class="sub-icon">` + value + `</div>`);
							$(this).remove()
						
							
				
						}
					})
				})

				for(var i = 0; i < (clickTogtotal - clickTognum); i++) {
					$("#pick .pick-box .pick-content .pick-show .pick-right .select-box .item p").eq(i).on("click", function() {
						$(this).parent().find(".sub-item").slideToggle();
						$(this).next().toggleClass("rotates")
					})
				}
			}

		})

			//下拉选择风格分类
			$("#pick .pick-box .class-item a").click(function() {
				var text = $(this).text();
				$(this).parent().prev().prev().val(text)
			});

			//下拉选择颜色
			$("#pick .pick-box .color-box a").click(function() {
				var color = $(this).css('background-color');
				$(this).parent().prev().prev().attr('style','background-color: '+color+';');
				$(this).parent().prev().prev().prev().val(color);
			});

			$("#pick .pick-box .pick-content .pick-show .pick-left .title-item").click(function(event) {
				event.stopPropagation()
				$(this).find('div.class-item').slideToggle()
				$(this).siblings().find('div.class-item').slideUp()
			})

			$('.fenLeiBox a').click(function(){
			var type = $(this).text();
			$('.gongNengBox').prev().text('产品功能');
			$('.gongNengBox').prev().prev().val('');
			changeFenLei(type);

		})

		function changeFenLei(type) {

			var html = '';
			$.ajax({
              url:'/member/productFunctionTag',
              type:"post",
              data:{type:type},
              success:function(ret){

                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                       if(jsonarray != null) {
				           $.each(jsonarray, function(i, n) {

				           		html += '<a href="javascript:void(0)" class="gn_'+i+'" onClick="checkedGongNeng('+i+')">'+n+'</a>';
				           	});
			       		}

                   }
                   $('.gongNengBox').html(html);

              },   
              error:function(){
                  // alert('网络异常，请稍后再试');
                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }

          	})

		}

		function checkedGongNeng(i){

			var type2 = $('.gn_'+i).text();
			// $('.gn_'+i).parent().prev().prev().val(type2);
			$('.type2').val(type2);
			$('.gn_'+i).parent().prev().text(type2);
			$('.gn_'+i).parent().slideUp();

		}

			//提交表单
			$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").click(function() {

				var proid = $(".addselect").attr('proid');
				var libid = $(".addselect").attr('libid');
				$("#proid").val(proid);
				$("#libid").val(libid);

				var tag = $('.tag1').val();
				$('#tag').val(tag);

				//赋值颜色
				var color = $('.input-color').css('background-color');
				$('.color').val(color);

				//赋值可多选的颜色
				var colors = '';
				$('.hasColor').each(function(){
					var color = $(this).css('background-color');
					colors += color+'|';
				})
				colors = colors.substring(0,colors.length-1);
				$('.colors').val(colors);

				//选择风格
				var x_word = '';
				$('#pick .title-item .check_one .coordinate').each(function(){

					if($(this).find("em").hasClass("blak")){
						x_word = $(this).text();

					}
				})

				var y_word = '';
				$('#pick .title-item .check_tow .coordinate').each(function(){
					if($(this).find("em").hasClass("blak")){
						y_word = $(this).text();
					}
				})

				$('.x_word').val(x_word);
				$('.y_word').val(y_word);

				$(this).attr("disabled","true"); //设置变灰按钮
				$('#addPro').attr('action', '/member/addProduct');
				$('.submit').prev('p').remove();
				$('#addPro').ajaxSubmit({

		        success:function(ret){

		            setTimeout("$('.submit button').removeAttr('disabled')",3000);
		            
		            var jsonarray = eval('('+ret+')');
		            var msg = jsonarray.msg;
		            var code = jsonarray.code;
		            if(code != 200){
						$('.submit').prev('p').remove();
		            	$('.submit').before(msg);
		              	return false;

		            }

		            $('#pick .pick-box .pick-right .anima-lo').css('display','block')
                    $('#pick .pick-right .select').css('visibility','hidden')

				   $('#pick').hide();
                   $('#win').css('display',"block").addClass('anima');
                   $('#win').find('span').text('添加成功').css({position:'absolute',top:'75px',left:'90px'});
                   window.location.reload();

		        },   
		        error:function(){  
		          	setTimeout("$('.submit button').removeAttr('disabled')", 3000);
					$('.submit').prev('p').remove();
					$('.submit').before('<p>网络异常，请稍后再试</p>');
					return false;
		        }

		      })

			})
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
			// var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
				imgsize()
				waterfull();
				setTimeout(function(){
										$('.container .box .boximg .img-out .load').css('display','none')
									},3000)
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
					imgsize()
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
						var sign = $('#sign').val();
						var str = '';
						$.ajax({
							url: '/library/getProductContent',
							type: 'POST',
							async: true,
							data: {
								p: p,
								sign:sign
							},
							timeout: 3000,
							dataType: 'json',
							success: function(data){
								//console.log(data);
								//location.reload();
								if(!isEmptyObject(data.errmsg)) {
									$.each(data.errmsg, function(i, n) {

										str += '<div class="box"><a href="/collection/product/'+n.proid+'"><div class="boximg"><div class="img-out"><div class="load"></div><img src="'+n.smallpic+'" alt="'+n.proname+'"></div><p>'+n.proname+'</p><span>¥'+n.price+'</span></div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'" /><span>'+n.nickname+'</span></div>';

										str += '<div class="praise praise-tan"><span></span><em>'+n.zancount+'</em>';

										str += '</div></div></a>';

										var src = "window.location.href='/library/project_product_add/<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
/"+n.proid+"'; return false;";
										str += '<div class="editorder" onclick="'+src+'">加入清单</div>';

										str += '</div>';

									});
									$('#container').append(str);
									// heightsize()
									imgsize()
									waterfull();
									setTimeout(function(){
										$('.container .box .boximg .img-out .load').css('display','none')
									},3000)
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
			var n = 0;

			function uploads(obj) {

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
						html += `<div class='imgBox'>
			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
			</div>
			</div><i></i>`;
					}
					$("#pick .pick-left .img-load .imgBox").remove()
					$("#pick .img-load p").hide();
					$("#pick .pick-left .img-load").append(html);
				}

				$("#pick .pick-left .img-load i").click(function(event) {

					$(".imgBox").remove();
					$("#pick .img-load p").show();
					$(this).remove()

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
		<?php echo '<script'; ?>
 type="text/javascript">
			// $(function() {
			// 	DesignLibrary.Init();
			// });

			//load the colors into the session

			//json encode the colors array so that the helper function can access them
			var fabArray = ["#11616b", "#1b3664", "#351a30", "#000000", "#6d5f4e", "#281700", "#372223", "#6f1318", "#7a321a", "#a93f48", "#dc5131", "#b07f09", "#c2bc30", "#989065", "#2c823f", "#445335", "#1e97c4", "#1058a6", "#8a6c92", "#303235", "#9f8d7d", "#5b3b01", "#5E3A43", "#ae1f27", "#ba4d26", "#ea8a7d", "#dc8133", "#d8b917", "#d9da82", "#bfb491", "#83c341", "#859a51", "#7cc5c8", "#7792ad", "#aa8f9e", "#666868", "#b1ac9e", "#896f4b", "#8b7077", "#c71e60", "#b96728", "#ddbb9c", "#f2d29a", "#e5c568", "#eef0a1", "#e1d6a0", "#c1da66", "#b0b992", "#ced5db", "#9ba0a3", "#dddbd5", "#c4bdb1", "#d2c2ab", "#f7efcf", "#d7d5b9", "#cdd3c7", "#FFFFFF"];
			var cArray = new Array();
			var bArray = new Array();
			var colorsPicked = new Array();
			var colorThief = new ColorThief();

			//helper function to get color string value
			function GetColorForWheel(position) {
				var ret = "transparent";
				try {
					ret = fabArray[position];
				} catch(e) {

				}
				if(ret == null) {
					ret = "white";
				}

				return ret;
			}

			$("#submitForm").click(function() {

				if(colorsPicked.length == 0 || colorsPicked.toString().indexOf('#') == -1) {
					alert("You must first choose some colors.");
					return;
				}

				var form = $("#CSForm");
				form.html('');
				for(var i = 0; i < colorsPicked.length; i++) {
					form.append('<input type="hidden" name="Colors[' + i + ']" value="' + colorsPicked[i] + '" />');
				}
				form.submit();
			});

			if(window.FileReader) {

			} else {
				var cm = $("#coolMode");
				var ucm = $("#uncoolMode");
				cm.hide();
				ucm.show();

				if($("#upImage").attr('src') != null) {
					Reset();
					colorsPicked = null;

					for(var i = 0; i < colorsPicked.length; i++) {
						SetColorSearchTile(colorsPicked[i]);
					}
				}
			}

			$("#chooseFile").click(function() {
				if(window.FileReader) {
					$("#fileUpload").click();
				} else {

				}
			});

			$("#upImage").on('load', function() {
				html5ScanImage(this);
			});

			function onFileSelected(event) {
				$('.color-box').slideDown()
				var imgtag = document.getElementById("upImage");
				var selectedFile = event.target.files[0];
				var reader = new FileReader();
				imgtag.title = selectedFile.name;
				reader.onload = function(event) {
					imgtag.src = event.target.result;
				};
				reader.readAsDataURL(selectedFile);
				imgtag.style.display = "block";
			}

			function html5ScanImage(sourceImage) {
				var colors = colorThief.getPalette(sourceImage, 6);
				Reset();

				colors.forEach(function(c) {
					var hex = rgbToHex(c[0], c[1], c[2]);

					SetColorSearchTile(hex);
				});
			}

			function componentToHex(c) {
				var hex = c.toString(16);
				return hex.length == 1 ? "0" + hex : hex;
			}

			function rgbToHex(r, g, b) {
				return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);

			}

			$(".colorPick").click(function() {
				$("#selected-color-1").removeClass("colorPickActive");
				$("#selected-color-2").removeClass("colorPickActive");
				$("#selected-color-3").removeClass("colorPickActive");
				$("#selected-color-4").removeClass("colorPickActive");
				$("#selected-color-5").removeClass("colorPickActive");
				$("#selected-color-6").removeClass("colorPickActive");
				$(this).addClass("colorPickActive");
				var selectColor = $(this).get(0).style.backgroundColor;
				$(this).parent().prev().prev().get(0).style.backgroundColor = selectColor;
			});

			$("#design-library").on('click', ".colorPick.hasColor i.icon-closex", function() {
				$("#selected-color-1").removeClass("colorPickActive");
				$("#selected-color-2").removeClass("colorPickActive");
				$("#selected-color-3").removeClass("colorPickActive");
				$("#selected-color-4").removeClass("colorPickActive");
				$("#selected-color-5").removeClass("colorPickActive");
				$("#selected-color-6").removeClass("colorPickActive");
				$(this).parent().addClass("colorPickActive");
				$(this).parent().removeClass("hasColor");
				SetColorSearchTile('');
			});

			function SetColorSearchTile(c) {
				$(".colorPickActive").css({
					backgroundColor: c.toString()
				});
				if(c == '') {
					$(".colorPickActive").removeClass('hasColor');
				}
				switch($(".colorPickActive").attr('id')) {
					case "selected-color-1":
						if(c != '') {
							$("#selected-color-1").removeClass("colorPickActive");
							$("#selected-color-1").addClass("hasColor");
							$("#selected-color-2").addClass("colorPickActive");
						}
						colorsPicked[0] = c.toString();
						break;
					case "selected-color-2":
						if(c != '') {
							$("#selected-color-2").removeClass("colorPickActive");
							$("#selected-color-2").addClass("hasColor");
							$("#selected-color-3").addClass("colorPickActive");
						}
						colorsPicked[1] = c.toString();
						break;
					case "selected-color-3":
						if(c != '') {
							$("#selected-color-3").removeClass("colorPickActive");
							$("#selected-color-3").addClass("hasColor");
							$("#selected-color-4").addClass("colorPickActive");
						}
						colorsPicked[2] = c.toString();
						break;
					case "selected-color-4":
						if(c != '') {
							$("#selected-color-4").removeClass("colorPickActive");
							$("#selected-color-4").addClass("hasColor");
							$("#selected-color-5").addClass("colorPickActive");
						}
						colorsPicked[3] = c.toString();
						break;
					case "selected-color-5":
						if(c != '') {
							$("#selected-color-5").removeClass("colorPickActive");
							$("#selected-color-5").addClass("hasColor");
							$("#selected-color-6").addClass("colorPickActive");
						}
						colorsPicked[4] = c.toString();
						break;
					case "selected-color-6":
						if(c != '') {
							$("#selected-color-6").removeClass("colorPickActive");
							$("#selected-color-6").addClass("hasColor");
							$("#selected-color-1").addClass("colorPickActive");
						}
						colorsPicked[5] = c.toString();
						break;
				}
			}

			function Reset() {
				$("#selected-color-1").removeClass("colorPickActive hasColor");
				$("#selected-color-2").removeClass("colorPickActive hasColor");
				$("#selected-color-3").removeClass("colorPickActive hasColor");
				$("#selected-color-4").removeClass("colorPickActive hasColor");
				$("#selected-color-5").removeClass("colorPickActive hasColor");
				$("#selected-color-6").removeClass("colorPickActive hasColor");
				$("#selected-color-1").addClass("colorPickActive");

				$("#selected-color-1").css({
					backgroundColor: ""
				});
				$("#selected-color-2").css({
					backgroundColor: ""
				});
				$("#selected-color-3").css({
					backgroundColor: ""
				});
				$("#selected-color-4").css({
					backgroundColor: ""
				});
				$("#selected-color-5").css({
					backgroundColor: ""
				});
				$("#selected-color-6").css({
					backgroundColor: ""
				});

				colorsPicked = new Array();
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
