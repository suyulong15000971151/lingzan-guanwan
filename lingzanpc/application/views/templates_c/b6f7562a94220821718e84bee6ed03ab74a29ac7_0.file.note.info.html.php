<?php
/* Smarty version 3.1.30, created on 2018-01-03 14:32:27
  from "D:\lingzanpc\application\views\templates\note\note.info.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4c78fb21b5f2_17561765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6f7562a94220821718e84bee6ed03ab74a29ac7' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\note\\note.info.html',
      1 => 1514961142,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a4c78fb21b5f2_17561765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/article.css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.slider.min.js"><?php echo '</script'; ?>
>

	<body>

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

		<!--这里是认证通过获取积分-->
		<div id="adopt">
			<div class="adopt-box">
				<div class="content">
					<div class="title">
						<span>设计师认证</span><i></i>
					</div>
					<div class="adocon">
						<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/vipda_03.png" alt="" />
						<p><i>你申请的</i><span>"李某某"室内设计师</span><i>认证已通过审核</i></p>
						<div class="fenadd">
							<div class="symb"></div>
							<div class="text">
								<p>认证通过</p>
								<p>恭喜你获得500积分</p>
							</div>
						</div>
						<a href="index.html">查看个人主页></a>
					</div>
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
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
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
					<div class="caiji-show">
						<div class="caiji-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
						</div>
						<div class="caiji-right">
							<div class="output">
								<input type="text" placeholder="搜索或创建新的材思库" />
							</div>
							<div class="select">
								<div class="select-show">
									<p>选择已创建的材思库</p>
									<div class="select-box">
										<div class="item">
											<p>卧房</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div>
										<div class="item">
											<p>沙发家具</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div>
										<div class="item">
											<p>厨房卫浴</p><i></i>
											<div class="sub-item">
												<div class="sub-icon">F10酒店大堂</div>
												<div class="sub-add">添加区域</div>
											</div>
										</div>
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
						<button>确认关注</button>
					</div>

				</div>
			</div>
		</div>

		<!--这是头部-->
		<div id="article">
			<div class="article-title">
				<div class="left">
					<img src="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
" />
					<h3><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
</h3><br>
					<p>于<?php echo $_smarty_tpl->tpl_vars['data']->value['addtime'];?>
分享</p>
				</div>
				<span>分享</span>
				<!-- <i><?php echo $_smarty_tpl->tpl_vars['data']->value['zancount'];?>
</i> -->
				<?php if ($_smarty_tpl->tpl_vars['user']->value['userid'] != $_smarty_tpl->tpl_vars['data']->value['userid']) {?>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['alreadyZan'] == 0) {?>
				<i onclick="fabulous2(<?php echo $_smarty_tpl->tpl_vars['data']->value['noteid'];?>
)"><?php echo $_smarty_tpl->tpl_vars['data']->value['zancount'];?>
</i>
				<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['userid'];?>
" />
				<?php } else { ?>
				<div class="yizan"><?php echo $_smarty_tpl->tpl_vars['data']->value['zancount'];?>
</div>
				<?php }?>
				<?php } else { ?>
					<i><?php echo $_smarty_tpl->tpl_vars['data']->value['zancount'];?>
</i>
				<?php }?>
				<em><?php echo $_smarty_tpl->tpl_vars['data']->value['commentcount'];?>
</em>
			</div>
			<div class="textures">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['isshowcover'] == 1) {?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['cover'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['notename'];?>
" />
				<!--<div class="noneimg" style='background:url(<?php echo $_smarty_tpl->tpl_vars['data']->value['cover'];?>
) no-repeat center center;background-size: cover;'></div>-->
				
				<?php }?>
				<!-- <p>民宿坐落在半山腰上。很原始的地方，丛林中一条窄窄的小路，途中还遇到窜出来的野兔。位置是优势也是缺点，很不好找，所以建议大家联系管家帮忙叫车，上下山时间最好是在白天而不是夜里。这里没有电视，没有Wi-Fi， 房间很大，公寓型，两个房间共用一个客厅，一个独栋带阁楼的小房子里有一柜子的书，比客厅还宽敞的浴室里有一个壁挂式的CD机，拉动小绳子，整个房间都被西城男孩的歌声灌满。晚餐的意大利料理很正宗，免费的早餐也超级喜欢。</p>
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/4.jpg" alt="" />
				<p>民宿坐落在半山腰上。很原始的地方，丛林中一条窄窄的小路，途中还遇到窜出来的野兔。位置是优势也是缺点，很不好找，所以建议大家联系管家帮忙叫车，上下山时间最好是在白天而不是夜里。这里没有电视，没有Wi-Fi， 房间很大，公寓型，两个房间共用一个客厅，一个独栋带阁楼的小房子里有一柜子的书，比客厅还宽敞的浴室里有一个壁挂式的CD机，拉动小绳子，整个房间都被西城男孩的歌声灌满。晚餐的意大利料理很正宗，免费的早餐也超级喜欢。</p>
				<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/riji_03.jpg" alt="" /> -->
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<?php if (stripos($_smarty_tpl->tpl_vars['item']->value,"<") == 0 && stripos($_smarty_tpl->tpl_vars['item']->value,"img") == 1) {?>
				<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

				<?php } else { ?>
				<p><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</p>
				<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


			</div>
			<div class="publileave">
				<div class="moveleave">
					<div class="publi">
						<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" alt="" />
						<!-- <input type="text" /><br /> -->
						<input type="hidden" id="sourcetype" value="3" />
						<input type="hidden" id="sourceid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['noteid'];?>
" />
						<input type="text" id="comment" /><br />
						<label>验证：</label>
						<div id="slider1" class="slider"></div>
						<button class="winleave" id="send_comment">留言</button>

					</div>
					<div class="mess">
						<div class="mess-title"><span>评论留言</span><i><?php echo $_smarty_tpl->tpl_vars['data']->value['commentcount'];?>
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
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
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
				</div>
			</div>
		</div>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/myajax.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		$('.winleave').attr('disabled',true)
		$('.winleave').css({cursor:"not-allowed"})

		$("#slider1").slider({
			callback: function(result) {
				var vale=$('.moveleave .publi input').val()
				$("#result1").text(result);
				console.log(1)
				if(vale!=''){
					$('.winleave').attr('disabled',false)
		            $('.winleave').css({cursor:"pointer"})
				}
				
			}
		});
		$(".winleave").click(function() {
			$("#slider1").slider("restore");
		})
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
			
			
			$('#article .article-title em').click(function(){
				var tops=$('.moveleave .publi').offset().top;
				console.log(tops)
				$('html,body').animate({scrollTop:tops},1000)
			})

			//点赞笔记
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
			              // alert(msg);
			              $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
						  $('#win').css('display',"block").addClass('anima');
			              window.location.reload();

			          }

			      },   
			      error:function(){  
			        $('#win .win-box .com span').html('网络异常，请稍后再试').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display',"block").addClass('anima');
					window.location.reload();
			      }
			  })

			}
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
>
			$(function(){
				function imgsize(){

//			$('img').css('opacity','1')
			var imgleng = $('#article .textures img').get().length;
			var imgobj = $('#article .textures img').get();
			var imgout = $('#article .textures').get()

			var imgWid = []
			var imgHid = []
			for(var i = 0; i < imgleng; i++) {
				imgobj[i].style.height = Number(imgobj[i].offsetHeight * 520 / imgobj[i].offsetWidth)
				imgobj[i].style.width = '520px'
//				imgout[i].style.cssText = 'Max-height:400px;overflow:hidden'

			}

		}
				imgsize()
			})
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
