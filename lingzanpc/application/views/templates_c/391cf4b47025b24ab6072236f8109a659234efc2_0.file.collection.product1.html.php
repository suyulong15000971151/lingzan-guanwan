<?php
/* Smarty version 3.1.30, created on 2018-01-19 16:30:27
  from "D:\lingzanpc\application\views\templates\collection\collection.product1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a61aca3bd3cd3_21345008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '391cf4b47025b24ab6072236f8109a659234efc2' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\collection\\collection.product1.html',
      1 => 1516350622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a61aca3bd3cd3_21345008 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/product_detail.css" />
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.slider.min.js"><?php echo '</script'; ?>
>

		<!--这里是分享-->
		<div id="share">
			<div class="play-share">
				<div class="share-content">
					<div class="share-title">
						<span>分享</span><i></i>
					</div>
					<div class="share-item">
						<div class="bdsharebuttonbox">
							<ul class="gb_resItms">
								<li>
									<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>微信好友 </li>
								<li>
									<a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a>QQ好友 </li>
								<li>
									<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>QQ空间 </li>
								<li>
									<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>腾讯微博 </li>
								<li>
									<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>新浪微博 </li>
								<li>
									<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>人人网 </li>

							</ul>
						</div>
					</div>
					<button>确认分享</button>
				</div>

			</div>
		</div>

		<!--这里是点击采集弹窗-->
		<div id="pick">
			<div class="pick-box">
				<div class="pick-content">
					<div class="pick-title">
						<span>采集</span>
						<i></i>
					</div>
					<div class="pick-show">
						<div class="pick-left">
							<img src="img/cai1.jpg" alt="" />
							<p>星期天沙发</p>
						</div>
						<div class="pick-right">
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
								<button> 确认采集</button>
							</div>
						</div>
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
							<img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['smallpic'];?>
" alt="" />
							<h2><?php echo $_smarty_tpl->tpl_vars['product']->value['proname'];?>
</h2>
							<p><?php echo $_smarty_tpl->tpl_vars['product']->value['desc'];?>
</p>
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
							<p>21 材思库 324 采集</p>
							<div class="bottom">
								<img src="img/i16.jpg" alt="" />
								<img src="img/progect2.jpg" alt="" />
								<img src="img/progect3.jpg" alt="" / style="margin-right: 0;">
							</div>
						</div>
					</div>

					<div class="confirm">
						<button>确认关注</button>
					</div>

				</div>
			</div>
		</div>
        <!--这里是返回按钮-->
        <div class="back"></div>
        
		<div id="article">
			<div class="article-title">
				<div class="left">
					<!-- <i>26</i> -->
					<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['product']->value['userid']) {?>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['alreadyZan'] == 0) {?>
					<i onclick="fabulous1(<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
)"><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</i>
					<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['userid'];?>
" />
					<?php } else { ?>
					<div class="yizan"><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</div>
					<?php }?>
					<?php } else { ?>
					<i><?php echo $_smarty_tpl->tpl_vars['product']->value['zancount'];?>
</i>
					<?php }?>

					<em onclick="getLibList1(<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
)">采集</em>
				</div>
				<!-- <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['proname'];?>
(<?php echo $_smarty_tpl->tpl_vars['product']->value['x_index'];?>
,<?php echo $_smarty_tpl->tpl_vars['product']->value['y_index'];?>
)</h3> -->
				<div class="sub-box-title" style="display: inline-block;line-height: 70px;position: absolute;left: 50%;transform: translateX(-50%);font-size: 14px;"><b style="font-size: 16px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['proname'];?>
</b>(<?php echo $_smarty_tpl->tpl_vars['product']->value['x_index'];?>
,<?php echo $_smarty_tpl->tpl_vars['product']->value['y_index'];?>
)</div>
				<span title="分享"></span>
				
			</div>
			
			<!--这里是产品展示和轮播-->
			<div class="Carousel">
				<div class="img-show">
					<img src="" alt="" />
					<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['nearproid']->value['proid1'];?>
" class="pre"></a>
					<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['nearproid']->value['proid2'];?>
" class="next"></a>
				</div>
				<!--这里是产品价钱风格-->
				<div class="introduce">
					<span class="money">￥<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span><span class="mall">查看来源</span>
					<div class="detail"><?php echo $_smarty_tpl->tpl_vars['product']->value['desc'];?>
</div>
				</div>
				<!--这里是产品规格-->
				<div class="Specifications">
					<label for="">尺寸：</label><span class="size"><?php echo $_smarty_tpl->tpl_vars['product']->value['size'];?>
</span>
					<label for="">材质：</label><span><?php echo $_smarty_tpl->tpl_vars['product']->value['material'];?>
 </span><br />
					<label for="">色调：</label><i style="background:<?php echo $_smarty_tpl->tpl_vars['product']->value['color'];?>
"></i>
				</div>
				<!--这里是相关产品-->
				<div class="Relevant">
					<span>相关产品</span>
					<a href="javascript:;" class="pre"></a>
					<a href="javascript:;" class="next"></a>
					<div class="man-somebox" style="overflow: hidden;">
					<div class="man-some" >
						<div class="man-somehid">
						<ul>
							<!-- <li><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['bigpic'];?>
" alt="" /></li> -->
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['smallpic'];?>
" alt="" /></li>
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
			<!--这里是留言-->
			<div class="publileave">
				<div class="moveleave">
					<div class="publi">
						<input type="hidden" id="sourcetype" value="1" />
						<input type="hidden" id="sourceid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['proid'];?>
" />
						<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" alt="" />
						<input type="text" id="comment" /><br />
						<label>验证：</label>
						<div id="slider1" class="slider"></div>
						<button id="send_comment" class="winleave">留言</button>
						<span style="display: none;"></span>
					</div>
					<?php if (count($_smarty_tpl->tpl_vars['comment']->value) != 0) {?>
					<div class="mess">
						<div class="mess-title"><span>评论留言</span><i><?php echo $_smarty_tpl->tpl_vars['product']->value['commentcount'];?>
个</i></div>
						<ul>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comment']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<li>
								<div class="liimg">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
								</div>
								<div class="litext">
									<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
									<p><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</p>
									<i><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</i>
								</div>
							</li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/myajax.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			window.onload=function(){
				
				//这里是图片处理
				function imgSize(){
					$('.Carousel .img-show img').get(0).style.width="auto"
					$('.Carousel .img-show img').get(0).style.height="auto"
					var imgWidth=$('.Carousel .img-show img').get(0).offsetWidth
					var imgHeight=$('.Carousel .img-show img').get(0).offsetHeight;
					if(imgWidth>600){
						$('.Carousel .img-show img').css({width:"710px",height:(710*imgHeight/imgWidth)+"px"})
					}else{
						$('.Carousel .img-show img').css({width:"500px",height:(500*imgHeight/imgWidth)+"px"})
						
					}
				}
				
				
				var acIndex=0
				num=$('.Carousel .Relevant .man-some ul li').size();
				ulWidth=$('.Carousel .Relevant .man-some ul').css('width',(120*num)+'px');
				var src=$('.Carousel .Relevant .man-some ul li').eq(acIndex).find('img').attr('src');
				console.log(src)
				$('.Carousel .img-show img').attr('src',src);
				
				imgSize()
				//这里是点击左右切换
				
				$('.Carousel .img-show a.next').click(function(){
					acIndex>=(num-1)?acIndex=0:acIndex++
					
					var src=$('.Carousel .Relevant .man-some ul li').eq(acIndex).find('img').attr('src');
				console.log(src)
//				$('.Carousel .img-show').css({'background':'url('+src+') no-repeat center center','backgroundSize':'contain'});
                 $('.Carousel .img-show img').attr('src',src);
                 imgSize()
				})
				
				
				$('.Carousel .img-show a.pre').click(function(){
					acIndex<=0?acIndex=(num-1):acIndex--
					
					var src=$('.Carousel .Relevant .man-some ul li').eq(acIndex).find('img').attr('src');
				console.log(src)
//				$('.Carousel .img-show').css({'background':'url('+src+') no-repeat center center','backgroundSize':'contain'});
                 $('.Carousel .img-show img').attr('src',src);
                 imgSize()
				})
				
				
				//这里是相关产品
				
				$('.Carousel .Relevant a.pre').click(function(){
				var marginRight=$('.Carousel .Relevant .man-some ul').css('marginLeft');
				console.log(marginRight)
				$('.Carousel .Relevant .man-some ul').animate({marginLeft:(parseInt(marginRight)-120)+"px"},200)	
				})
				
				$('.Carousel .Relevant a.next').click(function(){	
					var marginRight=$('.Carousel .Relevant .man-some ul').css('marginLeft');
				if(parseInt(marginRight)<=-120){
					console.log(marginRight)
				$('.Carousel .Relevant .man-some ul').animate({marginLeft:(parseInt(marginRight)+120)+"px"},200)
				}
					
				})
				
				//这里是点击小图切换大图
				$('.Carousel .Relevant .man-some ul li').click(function(){
					var index=$(this).index();
					var src=$(this).find('img').attr('src');
//					$('.Carousel .img-show').css({'background':'url('+src+') no-repeat center center','backgroundSize':'contain'});
                     $('.Carousel .img-show img').attr('src',src);
                     imgSize()
					acIndex=index
				})
				
				
			}
			
			
			
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		
		$(".Carousel .Relevant .man-somehid").css({"width":"710px","overflow":"hidden","height":"100px"})
		//这里是点击返回；
		$("body .back").click(function(){
			window.history.go(-1)
		})
		
		
		
		   //这是留言滑动验证 
		   $('.winleave').attr('disabled',true)
			$('.winleave').css({cursor:"not-allowed"})

			$("#slider1").slider({
				callback: function(result) {
					var vale=$('.moveleave .publi input').val()
					$("#result1").text(result);
					$(".moveleave .publi span").text(result);
				   
					if(vale!=''){
						$('.winleave').attr('disabled',false)
						$('.winleave').css({cursor:"pointer"})
						
					}else{
						alert('输入框不能为空')
					}
					
				}
			});
//			$(".winleave").click(function() {
//				$("#slider1").slider("restore");
//			})
			
			$('.moveleave .publi input').on('keyup',function(){
				var text=$(".moveleave .publi span").text();
					var vale=$('.moveleave .publi input').val()
				
				if(text!=''&&vale!=''){
					$('.winleave').attr('disabled',false)
					$('.winleave').css({cursor:"default"})
				}
			})
//			
			
			$("#EntTime").click(function() {
				$(".calendar").css({
					zIndex: "999999999",
					left: "60%",
					top: "17%"
				})
			})
			$("#article .article-title span").click(function(event) {
				event.preventDefault();
				event.cancelBubble
				event.stopPropagation();
				$(window).scrollTop(0);
				$('body').css("overflow", 'hidden')
				$("#share").css('display', 'block');

			})
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
			//全局变量，动态的文章ID
			var ShareURL = "";
			//绑定所有分享按钮所在A标签的鼠标移入事件，从而获取动态ID
			$(function() {
				$("bdsharebuttonbox a").mouseover(function() {
					ShareURL = $(this).attr("data-url");

				});
			});
			/* 
			 * 动态设置百度分享URL的函数,具体参数
			 * cmd为分享目标id,此id指的是插件中分析按钮的ID
			 *，我们自己的文章ID要通过全局变量获取
			 * config为当前设置，返回值为更新后的设置。
			 */
			function SetShareUrl(cmd, config) {
				if(ShareURL) {
					config.bdUrl = ShareURL;
				}
				return config;
			}

			//插件的配置部分，注意要记得设置onBeforeClick事件，主要用于获取动态的文章ID
			window._bd_share_config = {
				"common": {
					onBeforeClick: SetShareUrl,
					"bdSnsKey": {},
					"bdText": "",
					"bdMini": "2",
					"bdMiniList": false,
					"bdPic": "http://assets.jq22.com/plugin/2017-05-24-18-14-49.png",
					"bdStyle": "0",
					"bdSize": "24"
				},
				"share": {}
			};
			//插件的JS加载部分
			with(document) 0[(getElementsByTagName('head')[0] || body)
				.appendChild(createElement('script'))
				.src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' +
				~(-new Date() / 36e5)];
				
				$("#share .bds_weixin").click(function(){
					$(".bd_weixin_popup").css({"top":"300px","left":"600px"})
					console.log(0)
				})
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
		$("#article .article-title .left em").click(function(event) {
			event.preventDefault();
			event.cancelBubble
			event.stopPropagation();
			$(window).scrollTop(0);
			$('body').css("overflow", 'hidden')
			$("#caiji").css('display', 'block');

	})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
