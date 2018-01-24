<?php
/* Smarty version 3.1.30, created on 2017-12-28 17:08:55
  from "D:\lingzanpc\application\views\templates\account\account.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a44b4a70510e8_57884166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86565390421a544f8c3957fa6f69783ae9c32b83' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\account\\account.index.html',
      1 => 1508840113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a44b4a70510e8_57884166 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/account.css" />
<?php echo '<script'; ?>
 src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/cropbox.js"><?php echo '</script'; ?>
>
	<body>

		<!--这里是账户管理弹窗-->

		<div id="account">
			<div class="account-box">
				<div class="account-content">
					<div class="title">
						<h2>账户编辑管理</h2>
						<i onClick="back()"></i>
					</div>
					<div class="case">
						<div class="case-left">
							<ul>
								<li class="admin">个人信息</li>
								<li>账户管理</li>
								<li>系统设置</li>
							</ul>
						</div>
						<div class="case-right">
							<!--这里是第一个内容个人信息-->
							<div class="information">
								<div class="info-box info">
									<form action="account" method="post" enctype="multipart/form-data">
										<input name="frames" type="hidden" value="yes"/>
									<label for="">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;昵称：</label><input type="text" name="nickname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['nickname'];?>
"/> <br />
									<div class="portrait">
										<label for="" class="tou">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;头像：</label>
										<div class="peson-img">
											<div class="containerpto">

												<div class="imageBox">

													<div class="thumbBox"></div>

													<div class="spinner" style="display: none"></div>

												</div>

												<div class="action">

													<!-- <input type="file" id="file" style=" width: 200px">-->

													<div class="new-contentarea tc">
														<a href="javascript:void(0)" class="upload-img">

															<label for="upload-file">修改头像...</label>

														</a>

														<input type="file" class="" name="upload-file" id="upload-file" />

													</div>

													<input type="button" class="Btnsty_peyton" id="caiqie" value="OK">

													<input type="button" id="btnZoomIn" class="Btnsty_peyton" value="+">

													<input type="button" id="btnZoomOut" class="Btnsty_peyton" value="-">

													<input type="text" id="avatar" class="fil" name="avatar" style="display:none;"/>

												</div>

												<div class="cropped"></div>

											</div>
										</div>
										<div class="por-text">
											<!--<input type="file" multiple="true" id="btn" onchange="uploads(this)">-->
											<!--<div class="modify">修改头像</div>-->
											<span>账户类型：<?php if ($_smarty_tpl->tpl_vars['data']->value['groupid'] == 0) {?> 普通用户 <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['groupid'] == 10) {?> 设计师 <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['groupid'] == 20) {?> 品牌商 <?php }?></span>

											<?php if ($_smarty_tpl->tpl_vars['authCompany']->value == array() && $_smarty_tpl->tpl_vars['authDesigner1']->value == array()) {?>
											<a href="authentication/designer">
												<p>设计师认证</p>
											</a>
											<a href="authentication/brand">
												<p>品牌认证</p>
											</a>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['authCompany']->value != array()) {?>
												<?php if ($_smarty_tpl->tpl_vars['authCompany']->value['ispass'] == 0) {?>
													<p>品牌认证审核中...</p>
												<?php } elseif ($_smarty_tpl->tpl_vars['authCompany']->value['ispass'] == 2) {?>
													<a href="authentication/brand">
														<p>品牌认证不通过，</p>
														<p>点击重新编辑</p>
													</a>
												<?php }?>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['authDesigner1']->value != array()) {?>
												<?php if ($_smarty_tpl->tpl_vars['authDesigner1']->value['ispass'] == 0) {?>
													<p>设计师认证审核中...</p>
												<?php } elseif ($_smarty_tpl->tpl_vars['authDesigner1']->value['ispass'] == 2) {?>
													<a href="authentication/designer">
														<p>设计师认证不通过,</p>
														<p>点击重新编辑</p>
													</a>
												<?php }?>
											<?php }?>

										</div>
									</div>
									<div class="autograph">
										<label for="" class="qian">个性签名：</label>  <textarea name="signature" rows="" cols=""><?php echo $_smarty_tpl->tpl_vars['data']->value['signature'];?>
</textarea>
									</div>
									<input type="hidden" id="sex" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sex'];?>
" />
									<div class="sex">
										<label for="">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 性别：</label>
										<input type="radio" name="sexChecked" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 0) {?> checked <?php }?>/> 保密 <input type="radio" name="sexChecked" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 1) {?> checked <?php }?>/> 男<input type="radio" name="sexChecked" value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 2) {?> checked <?php }?> /> 女
									</div>
									<div class="city">
										<label for="">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 城市：</label>
										<!-- <select id="s_province" name="s_province"></select>
										<select id="s_city" name="s_city"></select> -->
										<input type="hidden" class="areayCode" name="areayCode" value="<?php echo $_smarty_tpl->tpl_vars['areayCode']->value;?>
"/>
										<input type="hidden" class="countyCode" name="countyCode" value="<?php echo $_smarty_tpl->tpl_vars['countyCode']->value;?>
"/>
										<select name="province" class="province" onChange="selectCity(2)">
											<option value="0">请选择省/市</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['city']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['code'] == $_smarty_tpl->tpl_vars['cityCode']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

										</select>
										<select name="area" class="area" onChange="selectCity(3)">
											<option value="0">请选择市/区/县</option>
										</select>
										<select name="county" class="county">
											<option value="0">请选择区/县</option>
										</select>
									</div>
									<div class="Occupation">
										<label for="">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 职业：</label>
										<input type="text" name="occupation" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['occupation'];?>
"/>
									</div>
									<?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

									<div class="safe">
										<button class="cancle">取消</button>
										<button class="save">保存</button>
									</div>
									</form>
								</div>
								<!--这是第二个内容-->
								<div class="info-tow info">
									<div class="target">
										<span>当前账户：</span>
										<i><?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
</i>
									</div>
									<div class="phone-modi">
										<span>修改手机号</span>
										<i>修改密码</i>
									</div>
									<div class="target">
										<span>当前账户：</span>
										<i class="email-bang" style="background:url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/mobile_06.png) no-repeat left center;"><?php if ($_smarty_tpl->tpl_vars['data']->value['email'] == '') {?> 未绑定 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
 <?php }?></i>
									</div>
									<div class="phone-modi" style="margin-right:75px">
										<span><?php if ($_smarty_tpl->tpl_vars['data']->value['email'] == '') {?>绑定邮箱<?php } else { ?>解除绑定<?php }?></span>

									</div>
								</div>
								<!--这是第三个内容-->
								<div class="info-stree info">
									<div class="title">
										<?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

										<p>打开消息通知：</p>
										<input type="hidden" name="receivemsg" class="receivemsg" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['receivemsg'];?>
"/>
										<?php if ($_smarty_tpl->tpl_vars['data']->value['receivemsg'] == 1) {?>
										<div class="switch" style="background: rgb(5, 92, 252);">
											<span style="left: 40px; background: rgb(255, 255, 255);"></span>
										</div>
										<?php } else { ?>
										<div class="switch">
											<span></span>
										</div>
										<?php }?>
									</div>
									<div class="content">
										<span>关于领赞：</span>
										<div class="biaoti">
											<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/selfset_03.png" alt="" />
										</div>
										<p>瓴赞是基于共享精神的互联网软装设计、制造、安装等服务一体化平台，致力于为软装项目提供最全面的产品库、设计师和供应商的一站式操作体验</p>
										<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/selfset_07.png" alt="" class="bot-img"/>
									</div>
								</div>
								<!--这里是修改手机号-->
								<div class="modify-phone">
									<input name="frames" type="hidden" class="frames" value="yes"/>
									<label for="">新手机号</label> <input type="text" name="oldMobile" id="oldMobile"/><br />
									<label for="">验证码</label>
									<div class="yanzheng">
										<input type="text" name="veryCode" id="veryCode"/>
										<button id="send_verifical_mobile">发送验证码</button>
									</div><br />
									<label for="">新手机号</label> <input type="text" name="mobile" id="mobile"/><br />
									<div class="set">
										<span class="self-back">返回上层</span> <i  class="editMobile">确认保存</i>
									</div>

								</div>
								<!--这里是修改密码-->
								<div class="psd-phone">
									<input name="frames1" type="hidden" class="frames1" value="yes"/>
									<label for="">原密码</label>  <input type="text" name="oldPsw" id="oldPsw"/><br />
									<label for="">新密码</label>
									<input type="text" name="password" id="password"/>

									<br />
									<label for="">确认密码</label> <input type="text" name="againPsw" id="againPsw"/><br />
									<div class="set">
										<span class="self-back">返回上层</span> <i class="editPsw">确认保存</i>
									</div>

								</div>

								<!--这里是绑定邮箱-->
								<!-- <div class="bind-email">
									<label for="">填写邮箱</label> <input type="text" /><button>发送验证</button><br />
									<span class="self-back">返回上层</span>
								</div>
								这里是绑定邮箱
								<div class="unbind-email">
									<label for="">已绑定邮箱</label> <input type="text" /><button>发送验证解除绑定</button><br />
									<span class="self-back">返回上层</span>
								</div> -->
								<!--这里是绑定邮箱-->
								<div class="bind-email">
									<input name="frames2" type="hidden" class="frames2" value="1"/>
									<label for="">填写邮箱</label> <input type="text" name="email" class="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
"/><button class="send_verifical_email">发送验证</button><br />
									<label for="" style="margin:20px 0;">验证码</label> <input type="text" name="veryCode" class="veryCode" style="margin:20px 0"/><br />
									<div class="set">
										<span class="self-back">返回上层</span> <i class="editEmail" style="display: inline-block;width: 120px; height: 40px; background: #055cfc; text-align: center; line-height: 40px; color: #fff;">确认保存</i>
									</div>
								</div>
								<!--这里是绑定邮箱-->
								<div class="unbind-email">
									<input name="frames2" type="hidden" class="frames2 frames3" value="2"/>
									<input name="email" type="hidden" class="email delEmail" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
"/>
									<label for="">验证码</label> <input type="text" name="veryCode" class="veryCode delVeryCode"/> <button class="send_verifical_email">发送验证解除绑定</button><br />
									<div class="set">
										<span class="self-back">返回上层</span> <i class="upDateEmail" style="display: inline-block;width: 120px; height: 40px; background: #055cfc; text-align: center; line-height: 40px; color: #fff;">确认保存</i>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<?php echo '<script'; ?>
 src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 class="resources library" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/area.js" type="text/javascript"><?php echo '</script'; ?>
>
		<!--<?php echo '<script'; ?>
 type="text/javascript">_init_area();<?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			_init_area();
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		$(document).ready(function(){
			selectCity(2);

			//提交修改手机号码
			$('.editMobile').click(function(){

			var oldMobile = $.trim($("#oldMobile").val());
			var veryCode = $('#veryCode').val();
			var mobile = $.trim($("#mobile").val());

			var frames = $('.frames').val();
			$.ajax({
					url:'/account/editMobile',
					type:"post",
					data:{oldMobile:oldMobile,veryCode:veryCode,mobile:mobile,frames:frames},
					success:function(ret){

						$('.modify-phone .error').remove();
						if(ret != ''){
						 	$('.modify-phone .set').before('<div class="error">'+ret+'</div>');
						 }

					},
					error:function(){
						alert('网络异常，请稍后再试');
						return false;
					}

				})

			})

			//发送手机验证码
			$('#send_verifical_mobile').click(function() {
				var oldMobile = $('#oldMobile').val();
				if(oldMobile == '') {
					$('.modify-phone .error').remove();
					$('.modify-phone .set').before('<div class="error">旧手机号必须填写</div>');
				}
				$.ajax({
					url: '/ajax/login_send_verifical_mobile',
					type: 'POST',
					async: true,
					data: {
						mobile: oldMobile
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						console.log(data);
					}
				});
			});

			//修改密码
			$('.editPsw').click(function(){

				var oldPsw = $("#oldPsw").val();
				var password = $("#password").val();
				var againPsw = $("#againPsw").val();
				var frames1 = $(".frames1").val();
				$.ajax({
					url:'/account/editPsw',
					type:"post",
					data:{oldPsw:oldPsw,password:password,againPsw:againPsw,frames1:frames1},
					success:function(ret){

						$('.psd-phone .error').remove();
					 if(ret != ''){
					 	$('.psd-phone .set').before('<div class="error">'+ret+'</div>');
					 }

					},	 
					error:function(){	
						alert('网络异常，请稍后再试');
						return false;
					}

				})

			})

			//发送邮箱验证码
			$('.send_verifical_email').click(function(){
				// alert(1);
				var email = $('.email').val();
				$.ajax({
					url: '/ajax/send_verifical_email',
					type: 'POST',
					async: true,
					data: {
						email: email
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						console.log(data);
					}
				});
			})

			//绑定邮箱
			$('.editEmail').click(function(){
				var email = $('.email').val();
				var veryCode = $('.veryCode').val();
				var frames2 = $('.frames2').val();
				$.ajax({
					url:'/account/editEmail',
					type:"post",
					data:{email:email,veryCode:veryCode,frames2:frames2},
					success:function(ret){
	
					$('.bind-email .error').remove();
					if(ret != ''){
						$('.bind-email .set').before('<div class="error">'+ret+'</div>');
					}
	
					},
					error:function(){	
						alert('网络异常，请稍后再试');
						return false;
					}
	
				})

		})


		//解除邮箱绑定
		$('.upDateEmail').click(function(){
			var delEmail = $('.delEmail').val();
			var delVeryCode = $('.delVeryCode').val();
			var frames3 = $('.frames3').val();
			$.ajax({
				url:'/account/editEmail',
				type:"post",
				data:{email:delEmail,veryCode:delVeryCode,frames2:frames3},
				success:function(ret){

				$('.unbind-email .error').remove();
				if(ret != ''){
					$('.unbind-email .set').before('<div class="error">'+ret+'</div>');
				}

				},
				error:function(){	
					alert('网络异常，请稍后再试');
					return false;
				}

				})

		})

		$('.switch').click(function(){

			var receivemsg = $('.receivemsg').val();

			if(receivemsg == 0){
				receivemsg = 1;
			}else{
				receivemsg = 0;
			}

			$.ajax({
				url:'/account/receivemsg',
				type:"post",
				data:{receivemsg:receivemsg},
				success:function(ret){
					if(ret == '操作成功'){
						$('.receivemsg').val(receivemsg);
					}
				},
				error:function(){	
					alert('网络异常，请稍后再试');
					return false;
				}

			})

		})


		})


		function selectCity(flg) {
			// alert(2);
			if(flg != 2 && flg != 3){
				alert('参数错误');
				return false;
			}
			if(flg == 2) {

				var html = '<option value="0">请选择市/区/县</option>';
				var parentid = $('.province option:selected').val();
				$('.county').empty();

			}
			
			if(flg == 3) {

				var html = '<option value="0">请选择区/县</option>';
				var parentid = $('.area option:selected').val();
				$('.county').empty();
			}

			if(parentid == 0){
				return false;
			}

			$.ajax({
					url:'/account/getCityData',
					type:"post",
					data:{flg:flg,parentid:parentid},
					success:function(ret){

						if(ret != ''){

							var jsonarray = eval('('+ret+')');
							var city = jsonarray.city;
							var code = jsonarray.code;
							var count = city.length;
							for (var i = 0; i <count; i++) {

							var areayCode = $('.areayCode').val();
							var countyCode = $('.countyCode').val();

								if(flg == 3 && city[i].name == '市辖区') {
									continue;
								}
								html += '<option value="'+city[i].code+'" >'+city[i].name+'</option>';

							};

							if(flg == 2){

								$('.area').html(html);
								$(".area option[value='"+areayCode+"']").attr("selected",true);
								selectCity(3);

							}

							if(flg == 3){

								$('.county').html(html);
								$(".county option[value='"+countyCode+"']").attr("selected",true);

							}

						}

					},
					error:function(){	
						alert('网络异常，请稍后再试');
						return false;
					}
				})
		}
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			_init_area();
		<?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
>

			//如果头像不为空,刚进入页面时,隐藏缩放与裁切按钮
			var avatar = "<?php echo $_smarty_tpl->tpl_vars['data']->value['avatar'];?>
";
			if(avatar != '') {
				$('.Btnsty_peyton').css('display','none');
			}

			var Gid = document.getElementById;
			var showArea = function() {
					Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
						Gid('s_city').value + " - 县/区"
						//					Gid('s_county').value + "</h3>"
				}
				//			Gid('s_county').setAttribute('onchange', 'showArea()');

//			var n = 0;
//
//			function uploads(obj) {
//				//alert(obj.files.length);
//				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
//					alert("请选择图片文件！");
//				} else {
//					n = obj.files.length;
//					var html = "";
//					for(var i = 0; i < n; i++) {
//						var url = window.URL.createObjectURL(obj.files[i]);
//						var txt = obj.files[i].name.split(judge(obj.files[i]));
//						//txt = txt.split("")
//						console.log(url);
//						html += `<div class='imgBox'>
//			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
//			</div>
//			</div>`;
//					}
//					$(".imgBox").remove();
//					//					$(".newUpload").remove();
//					$("#account .portrait .peson-img").append(html);
//				}
//			}
//
//			function judge(obj) {
//				var str = '';
//				if(obj.name.match(/.jpg/i)) {
//					str = ".jpg";
//				} else if(obj.name.match(/.png/i)) {
//					str = ".png";
//				} else if(obj.name.match(/.gif/i)) {
//					str = ".gif";
//				} else if(obj.name.match(/.bmp/i)) {
//					str = ".bmp";
//				}
//				return str;
//			}
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(window).load(function() {
				var options =

					{

						thumbBox: '.thumbBox',

						spinner: '.spinner',

						imgSrc: "<?php echo $_smarty_tpl->tpl_vars['data']->value['avatar'];?>
"
						// imgSrc: "http://www.baidu.com/img/bd_logo1.png"

					}

				var cropper = $('.imageBox').cropbox(options);

				var img = "";

				$('#upload-file').on('change', function() {

					var reader = new FileReader();

					reader.onload = function(e) {

						options.imgSrc = e.target.result;

						cropper = $('.imageBox').cropbox(options);

						getImg();
						$('.Btnsty_peyton').css('display','block');

					}

					reader.readAsDataURL(this.files[0]);

					this.files = [];
					//getImg();

				})

				$('#btnCrop').on('click', function() {

					alert("图片上传喽");

				})

				function getImg() {

					img = cropper.getDataURL();

					$('.cropped').html('');

					$('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');

					$('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');

					$('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');

				}

				$(".imageBox").on("mouseup", function() {

					getImg();

				});
				// $(".Btnsty_peyton").on("mouseup", function() {

				// 	getImg();

				// });
				$(".Btnsty_peyton").on("mouseup", function() {

					getImg();
                    var srcc=$('.cropped img').eq(0).attr("src");
                    console.log(srcc)
                    $(".fil").attr("value",srcc)
                    
				});

				$('#btnZoomIn').on('click', function() {

					cropper.zoomIn();

				})

				$('#btnZoomOut').on('click', function() {

					cropper.zoomOut();

				})

				$('#caiqie').on('click',function(){
					alert('头像已裁切，请点击保存完成头像修改');
				})

			});
		function back() {
			window.location.href = "/member/library"; 
		}
		<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
