<?php
/* Smarty version 3.1.30, created on 2017-11-23 16:32:08
  from "D:\lingzanpc\application\views\templates\authentication\authentication.designer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a168788732a98_60344461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4c6f050bcfece031ff4c9379703aa7dc9353abd' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\authentication\\authentication.designer.html',
      1 => 1504679133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a168788732a98_60344461 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
	.imgBoxs1,.imgBoxs2 {
    display: inline-block;
    width: 100px;
    height: 100px;
}
</style>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/designer .css" />
		<div id="Authentication">
			<div class="authen-box">
				<div class="authen-content">
					<div class="title">
						<span>设计师认证</span>
						<i></i>
					</div>
					<div class="content">
						<span></span>
						<p>我们将在三个工作日内处理</p>
						<p>审核通过后领赞网会在网站消息中通知提醒</p>
					</div>
				</div>
			</div>
		</div>
		<!--这是项目标题-->
		<div class="sub-nav">
			<h1>设计社认证</h1>
			<span>&nbsp;&nbsp;填写以下表单，工作人员审核通过后，即可成为瓴赞认证品牌。带 * 为必填内容</span>
			<!--<i>返回</i>-->
		</div>
		<!--这里是里面的内容-->
		<div class="content">
			<form action="/authentication/designer" method="post" enctype="multipart/form-data" id="tijiao">
				<input name="frames" type="hidden" value="yes"/>
				<div class="content-box">
					<h4>* 您的品牌信息将仅用于领赞管理员审核之用，相关涉密信息完全保密</h4>
					<div class="lebe">
						<span>* </span><label for=""> 真实姓名：</label>
					</div>
					<input type="text" placeholder="输入姓名" class="realname" name="realname" /><br />
					<div class="lebe">
						<span>* </span><label for="">设计领域：</label>
					</div><input type="text" placeholder="输入设计领域" class="designfield" name="designfield"/><br />
					<div class="lebe"><span>* </span><label for="">公司/工作室：</label> </div><input type="text" placeholder="" class="company" name="company"/><br />
					<div class="lebe"><span>* </span><label for="">办公室：</label> </div><input type="text" placeholder="" class="address" name="address"/><br />
					
					<div class="lebe">
						<span >* </span><label for="" >个人介绍：</label></div> <textarea class="personalintroduction" name="personalintroduction" rows="" cols="" placeholder="将公开显示于品牌主页认证信息中，限 100 字"></textarea><br />
					<div class="lebe"><span>* </span><label for="" >工作材料：</label> </div>
					<div class="up-pro">
						<input type="file" id="btn" onchange="uploads(this)" name="workmaterial">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/zhengming_03.png" alt="" />
						<em>上传你的名片后者工作牌</em>
					</div>
					<br />
					<div class="lebe"><span>* </span><label for="" >个人材料：</label> </div>
					<div class="up-pro1" style="display: inline-block; overflow: hidden; width: 480px; position: relative; ">

						<!-- <div class="up up-just"><p>身份证正面</p><input type="file" multiple="true" id="btn" onchange="uploadjust(this)" name="selfJust"></div> -->
						<!-- <div class="up up-back"><p>身份证反面</p><input type="file" multiple="true" id="btn" onchange="uploadback(this)" name="selfBack"></div> -->

						<input type="file" id="btn" onchange="uploadjust(this)" name="selfJust" style="display: inline-block; width: 100px; height: 100px; outline: none; border: none; position: absolute; left: 0; top: -10px; opacity: 0;">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/zhengming_03.png" alt="" style=" width: 100px; height: 100px; display: inline-block; margin-right: 10px;"/>

						<input type="file" id="btn" onchange="uploadback(this)" name="selfBack" style="display: inline-block; width: 100px; height: 100px; outline: none; border: none; position: absolute; left: 224px; top: -10px; opacity: 0;">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/zhengming_03.png" alt="" style="width: 100px; height: 100px; display: inline-block; margin:0 10px;"/><br />
						<em>上传你的身份证正反面</em>
					</div>
					<br />
					<div class="lebe"><span> </span><label for="">个人邮箱：</label></div> <input type="text" class="mailbox" placeholder="" name="mailbox"/><br />
					<div class="lebe"><span> </span><label for="">个人网站：</label> </div><input type="text"  class="website" placeholder="" name="website"/><br />
					<!--<div class="lebe"><span>* </span><label for="">企业网站：</label> </div><input type="text" placeholder="" /><br />-->
	                 <!--这里是保证-->
	                 <div class="promise">
	                 	<input type="checkbox" class="isTure" name="isTure" value="1"/>
	                 	<p>我保证品牌的真实性，上传的资料没有法律纠纷，我对因虚假资料及品牌版权引起的法律纠纷负全部责任。</p>
	                 </div>
	                 <button class="praise-tan">提交审核</button>
				</div>
			</form>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>

		//如果查到已经提交审核的数据则直接赋值输入框
		var authDesigner = <?php echo $_smarty_tpl->tpl_vars['authDesigner']->value;?>
;
		if(authDesigner != null) {
			// alert(authDesigner.realname);
			$('.realname').val(authDesigner.realname);
			$('.designfield').val(authDesigner.designfield);
			$('.company').val(authDesigner.company);
			$('.address').val(authDesigner.address);
			$('.personalintroduction').text(authDesigner.personalintroduction);
			var image1 = '<div class="imgBoxs"><div class="bg" style="background:url('+authDesigner.workmaterial+') no-repeat center;background-size:100% 100%"></div></div>';
			$('.content .content-box .up-pro img').after(image1);

			var individualmaterial = authDesigner.individualmaterial;
			var images = individualmaterial.split(',');
			var image2 = '<div class="imgBoxs1"><div class="bg" style="background:url('+images[0]+') no-repeat center;background-size:100% 100%"></div></div>';
			$('.content .content-box .up-pro1 img').eq(0).after(image2);

			var image3 = '<div class="imgBoxs2"><div class="bg" style="background:url('+images[1]+') no-repeat center;background-size:100% 100%"></div></div>';
			$('.content .content-box .up-pro1 img').eq(1).after(image3);

			$('.mailbox').val(authDesigner.mailbox);
			$('.website').val(authDesigner.website);
			$('.isTure').prop('checked','true');

		}

		$(".praise-tan").click(function(event) {

				$(this).attr("disabled","true"); //设置变灰按钮
				$("#tijiao").ajaxSubmit({
			    success:function(ret){
			      $('.error').remove();
			      if(ret != ''){
			        setTimeout("$('.praise-tan').removeAttr('disabled')",3000);
			         $('.praise-tan').before('<p class="error">'+ret+'</p>');
			         event.preventDefault()
					 event.stopPropagation();
					$('body').css("overflow", 'scroll')
			         return false;

			      }
			      contirm(event);
			     
			    },   
			    error:function(){  
				    $(this).before('<p>网络异常，请稍后再试</p>');
				    return false;
			  }
			})

		})

		function contirm(event) {
			event.preventDefault();
			event.cancelBubble
			event.stopPropagation();
			$(window).scrollTop(0);
			$('body').css("overflow", 'hidden')
			$("#Authentication").css('display', 'block');
		}
//	$(".container .box a").click(function(event) {
//		//		event.preventDefault()
//		event.stopPropagation();
//	})
	$("#Authentication .authen-box .authen-content .title i").click(function(event) {
		event.preventDefault()
		event.stopPropagation();
		//		$(window).scrollTop(0);
		$('body').css("overflow", 'scroll')
		$("#Authentication").css('display', 'none')
		location.reload()
	})
	$("#Authentication .authen-box").click(function(event) {
		//		event.preventDefault()
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#Authentication").css('display', 'none')

	})
	$("#Authentication .authen-box .authen-content").click(function(event) {
		//		event.preventDefault()
		event.stopPropagation();

	});
		<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
			var n = 0;

			function uploads(obj) {
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
						html += `<div class='imgBoxs'>
			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
			</div>
			</div>`;
					}
					$(".imgBoxs").remove();
//					$(".newUpload").remove();
					$(".content .content-box .up-pro img").after(html);
				}
			}
			
			
			//这里是上传正面
			
			
			function uploadjust(obj) {
				//alert(obj.files.length);
// 				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
// 					alert("请选择图片文件！");
// 				} else {
// 					n = obj.files.length;
// 					var html = "";
// 					for(var i = 0; i < n; i++) {
// 						var url = window.URL.createObjectURL(obj.files[i]);
// 						var txt = obj.files[i].name.split(judge(obj.files[i]));
// 						//txt = txt.split("")
// 						console.log(url);
// 						html += `<div class='imgBox'>
// 			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
// 			</div>
// 			</div>`;
// 					}
// 					$(".content .content-box .up-pro .up-just").children().hide();
// //					$(".newUpload").remove();
// 					$(".content .content-box .up-pro .up-just").append(html);
// 				}

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
							html += `<div class='imgBoxs1'>
							<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
							</div>
							</div>`;
						}
						$(".imgBoxs1").remove();
	//					$(".newUpload").remove();
						$(".content .content-box .up-pro1 img").eq(0).after(html);
					}
		
				}
			
			//这是反面
			function uploadback(obj) {
				//alert(obj.files.length);
// 				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
// 					alert("请选择图片文件！");
// 				} else {
// 					n = obj.files.length;
// 					var html = "";
// 					for(var i = 0; i < n; i++) {
// 						var url = window.URL.createObjectURL(obj.files[i]);
// 						var txt = obj.files[i].name.split(judge(obj.files[i]));
// 						//txt = txt.split("")
// 						console.log(url);
// 						html += `<div class='imgBox'>
// 			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
// 			</div>
// 			</div>`;
// 					}
// 					$(".content .content-box .up-pro .up-back").children().hide();
// //					$(".newUpload").remove();
// 					$(".content .content-box .up-pro .up-back").append(html);
// 				}

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
						html += `<div class='imgBoxs2'>
						<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:100% 100%'>
						</div>
						</div>`;
					}
					$(".imgBoxs2").remove();
//					$(".newUpload").remove();
					$(".content .content-box .up-pro1 img").eq(1).after(html);
				}
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
