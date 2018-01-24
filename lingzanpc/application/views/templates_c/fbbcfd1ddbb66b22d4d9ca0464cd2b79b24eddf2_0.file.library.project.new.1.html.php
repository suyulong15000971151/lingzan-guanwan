<?php
/* Smarty version 3.1.30, created on 2017-10-09 13:53:08
  from "D:\lingzanpc\application\views\templates\library\library.project.new.1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59db0ec44f5fa9_05660557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbbcfd1ddbb66b22d4d9ca0464cd2b79b24eddf2' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\library\\library.project.new.1.html',
      1 => 1506592834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_59db0ec44f5fa9_05660557 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/transform-c.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/component.css" />
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.jqprint-0.3.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/common.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/myajax.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/transform.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.slider.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			function a() {
				$("#ddd").jqprint();
			}
			(function(e, t, n) {
				var r = e.querySelectorAll("html")[0];
				r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
			})(document, window, 0);
		<?php echo '</script'; ?>
>
		
		<!--这里是上传项目文档-->
		<form action="/library/uploadDoc" method="post" enctype="multipart/form-data">
		<input name="frames" type="hidden" value="yes"/>
		<input type="hidden" name="proid" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
		<div id="file">
			<div class="file-box">
				<div class="content">
					<div class="title">
						<span>上传项目文档</span><i></i>
					</div>
					<div class="file-con">
						<div class="up-file">
							<h2><input type="file" name="pic" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
							<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label></h2>
						</div>
						<p>仅支持10M以内的WORD、JPEG、PNG及压缩包文件</p>
						<em>提示：请严格遵守保密法律法规，严禁在互联网上储存、处理、传输、发布泄密信息</em>
						<button>确定</button>
					</div>
				</div>
			</div>
		</div>
		</form>

		<!--这里是下载弹窗-->
		<div id="load">
			<div class="load-box">
				<div class="content">
					<div class="title">
					<span>下载项目文档</span><i></i>
				</div>
				<div class="load-con">
					<table border="0" cellspacing="10" cellpadding="5">
						<tbody>
						<tr><th>文件</th><th>更新时间</th><th>大小</th><th>上传</th></tr>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project_doc']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr><td class="y"><?php echo $_smarty_tpl->tpl_vars['item']->value['docname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['docsize'];?>
MB</td><td class="u" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['item']->value['docpath'];?>
'"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</td></tr>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</tbody>
					</table>
				</div>
				</div>
				
			</div>
		</div>

		<!--这里是移动至-->
		<div id="move">
			<div class="move-box">
				<div class="content">
					<div class="title">
						<span>移动至</span>
						<i></i>
					</div>
					<div class="move-content">
						<div class="crea-box">
							<div class="output">
								<input type="text" placeholder="搜索或创建新的材思库" />
							</div>
							<div class="select">
								<div class="select-show">
									<p>选择已创建的项目</p>
									<div class="select-box">
										<div class="item addselect">卧房</div>
										<div class="item">沙发家具</div>
										<div class="item">厨房卫浴</div>
									</div>
								</div>
							</div>
							<div class="creat">
								<div class="creat-box">
									<span>创建项目</span>
									<i></i>
								</div>
							</div>
							<!--<div class="label">
								<input type="text" value="输入文字按空格或回撤以生成标签" />
							</div>-->
						</div>
						<div class="tijiao">
							<button>确认移动</button>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--这里是修改后的移动窗口-->
		<div id="caiji">
			<div class="caiji-box">
				<div class="caiji-content" style="width:450px;">
					<div class="caiji-title">
						<span>拷贝至</span>
						<i></i>
					</div>
					<div class="caiji-show">
						<!-- <div class="caiji-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
							<h2>星期天沙发</h2>
							<p>2014年到2016年，造作用两年时间了解中国城市中产阶级用户，通过获取新知，2017年起，我们开始挑选已有产品进行设计改造，让其保持高品质和高性价比，融入日常生活。与Z-Inhouse设计不同，Zelect更强调材质、功能性与日用需求，如材料舒适度、空间尺寸、清洁保养等。</p>
						</div> -->
						<div class="caiji-right">
							<form id="colPro1" class="form-one" method="post" action="../../member/copyProductS">
							<div class="output">
								<input type="text" placeholder="搜索或创建新的材思库" class="libname" name="libname"/>
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
								<div class="gaile" onClick="addProjectProduct()" style="display: none;">
									<span>创建项目</span>
									<i></i>
								</div>

							</div>
							<div class="label">
								<input type="hidden" name="productS" id="productS"/>
								<input type="hidden" name="libid" id="libid"/>
								<input type="hidden" name="proid" id="proid"/>
								<!-- <input type="text" placeholder="输入文字按空格或回撤以生成标签" name="tag"/> -->
							</div>
							</form>
							<div class="submit">
								<button onClick="copyImageS()"> 确认拷贝</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!--这里是更多留言弹窗-->
		<div id="moveleave">
			<div class="moveleave-box">
				<div class="content">
					<div class="title">
						<span>更多留言</span>
						<i></i>
					</div>
					<div class="moveleave">
						<div class="publi">
							<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" alt="" />
							<input type="hidden" id="sourcetype" value="2" />
							<input type="hidden" id="sourceid" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
							<input type="text" id="comment" /><br />
							<label>验证：</label> <div id="slider1" class="slider"></div>
			
							<button class="winleave" id="send_comment">留言</button>
						</div>
						<div class="mess">
							<div class="mess-title"><span>评论留言</span><i><?php echo $_smarty_tpl->tpl_vars['project']->value['commentcount'];?>
个</i></div>
							<ul>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['commentall']->value, 'item');
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
					</div>
				</div>
			</div>
		</div>

		<!--这里是添加成员-->
		<div id="custom">
			<div class="custom-box">
				<div class="content">
					<div class="title">
						<span>添加成员</span><i></i>
					</div>
					<div class="container">
						<div class="caption">
							<a href="javascript:void(0)" class="mid cutv">快速添加好友</a>
							<a href="javascript:void(0)" class="mid">添加站外成员</a>
							<a href="javascript:void(0)" class="mid">通过邮件邀请</a>
							<a href="javascript:void(0)">通过连接注册</a>
						</div>

						<div class="package">
							<!--这是第一个-->
							<div class="first-befor mode">
								<div class="select-pso">
									<ul>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friend']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
										<li class="friends" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid2'];?>
">
											<div class="choics">
												<i></i>
											</div>
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
											<div class="text">
												<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h3>
												<p>软装设计师</p>
											</div>
										</li>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</ul>
									</div>
									<div class="Invitation">
										<button>发送邀请</button>
									</div>
								
							</div>
							
							<!--这里是第二个内容-->
							<div class="first mode">
								<div class="first-box">
									<div class="firstput">
										<p>* 快速添加成员账户，设置默认密码，首次登陆时需要修改默认密码</p>
										<div class="item">
											<label for="">姓名</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">登录用户名</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">邮箱或手机号</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">默认密码</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">项目角色</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">所属公司</label> <input type="text" />
										</div>
									</div>
									<div class="sub">
										<button>添加成员</button>
									</div>
								</div>
							</div>
							<!--这是第三个内容-->
							<div class="second mode">
								<div class="second-box">
									<p>* 通过邮箱给项目成员发送注册当前项目的邀请链接。</p>
									<div class="item">
										<label for="">邮箱</label><input type="text" />
									</div>
									<button>增加一行</button>
								</div>
								<div class="sub">
									<button>添加成员</button>
								</div>
							</div>
							<!--这里是第四个内容-->
							<div class="third mode">
								<div class="third-box">
									<p>* 发送网站注册链接地址给你需要邀请的项目组成员，他们可通过该地址直接注册账号。</p>
									<div class="item">
										<label for="">邮箱</label><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['invite_url']->value;?>
" />
									</div>
									<button>点击复制该链接</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--这里是移除弹窗-->
		<div class="member-dele">
			<div class="dele-box">
				<div class="content">
					<div class="title">
						<span>移除成员</span>
						<i></i>
					</div>
					<div class="containers">
						<div class="dele-boxs">
							<img id="yc_avatar" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
							<p id="yc_uname">造物社</p>
						</div>
					</div>
					<div class="sub">
						<input type="hidden" id="yc_proid" />
						<input type="hidden" id="yc_uid" />
						<button id="yc_btn">确认移除</button>
					</div>
				</div>
			</div>
		</div>

		<!--这里是转换成我的项目弹窗-->
		<div id="pick">
			<div class="pick-box">
				<div class="pick-content" style="height:610px;">
					<div class="pick-title">
						<span>转换成我的项目</span>
						<i></i>
					</div>
					<div class="pick-show">
						<div class="pick-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/images/addcai_03.jpg" alt="" />
							<p>星期天沙发</p>
						</div>
						<div class="pick-right"  style="height:550px;">
							<input type="hidden" class="proid" name="proid" value="" />
							<input type="hidden" class="selectLib" name="selectLib" value="" />
							<div class="output">
								<input type="text" value="搜索或创建新的材思库" id="libname" name="libname"/>
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
								<div class="creat-box" onClick="addLibraryProduct()">
									<span>创建材思库</span>
									<i></i>
								</div>

							</div>
							<div class="label">
								<input type="text" value="项目标题" class="libtitle" name="libtitle" style="margin-bottom:10px;"/>
								<input type="text" value="输入文字按空格或回撤以生成标签" class="tag" name="tag" />
							</div>
							<div class="submit">
								<button  onClick="changeMyProject()"> 确认采集</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

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
								<li><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>微信好友 </li>
								<li><a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a>QQ好友 </li>
								<li><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>QQ空间 </li>
								<li><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>腾讯微博 </li>
								<li><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>新浪微博 </li>
								<li><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>人人网 </li>
							</ul>
						</div>
					</div>
					<button>确认分享</button>
				</div>
			</div>
		</div>

		<!--这里是订单记录弹窗-->
		<div id="record">
			<div class="record-box">
				<div class="content">
					<div class="title"><span>订单记录</span><i></i></div>
					<div class="record-con">
						<div class="order-th">
							<div class="name">订单名称</div>
							<div class="time">生成时间</div>
							<div class="author">操作者</div>
						</div>
						<div class="order-con">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<div class="order-item">
								<div class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['ordername'];?>
</div>
								<div class="time"><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</div>
								<div class="author"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</div>
								<div class="look"><a href="/library/project_order/<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['orderid'];?>
">查看</a></div>
								<div class="Remark">备注 ：<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
</div>
							</div>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!--这里是帮他调整弹窗-->
		<div id="help">
			<div class="help-box">
				<div class="title">
					<span>帮他调整</span><i></i>
				</div>
				<div class="con">
					<div class="help-item">
						<div class="plan" data-tyid="1" data-proid="">一· 方案替换</div>
						<p>如果你有更好的产品，可以添加至该方案对比投标</p>
					</div>
					<div class="help-item">
						<div class="plan" data-tyid="2" data-proid="">二· 补充调整</div>
						<p>如果你有该产品更好的材质、面料之类，可以补充投标</p>
					</div>
				</div>
				<div class="sub">
					<button>确认</button>
				</div>
			</div>
		</div>

		<!--这是项目标题-->
		<div class="sub-nav">
			<h1><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
</h1>
			<select id="proarea" name="" value="">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['proarea']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['proid'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['proid'] == $_smarty_tpl->tpl_vars['project']->value['proid']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['proname'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</select>
			<i onclick="javascript:history.go(-1)">返回</i>
		</div>

		<!--这是下面的产品-->
		<div class="product">
			<input type="hidden" id="proid1" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
			<div class="left">
				<div class="item">
					<ul>
						<li><img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['cover'];?>
" alt="" /></li>
					</ul>
				</div>
				<div class="show">
					<img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['cover'];?>
" alt="" />
				</div>
				<!--<a href="" class="arror-l"></a>
				<a href="" class="arror-r"></a>-->
			</div>
			<div class="right">
				<div class="title">
					<h1><?php echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
</h1>
					<span>分享</span>
					<i>下载项目文档</i>
					<p><?php echo $_smarty_tpl->tpl_vars['project']->value['desc'];?>
</p>
				</div>
				<!--关注-->
				<div class="follow">
					<div class="follow-l">
						<img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['avatar'];?>
" alt="" />
						<span><?php echo $_smarty_tpl->tpl_vars['project']->value['nickname'];?>
</span>
					</div>
					<!--<div class="follow-r">
						<strong>+</strong>
						<i>关注</i>
					</div>-->
				</div>
				<!--这里是项目成员-->
				<div class="members">
					<div class="member">
						<h4>项目成员 0位</h4>
						<div class="member-add">
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[4] != 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/memberadd.png" alt="" /><?php }?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project_member']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['userid'] != $_smarty_tpl->tpl_vars['project']->value['userid']) {?>
							<div class="peon-item">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
								<div class="people-id">
									<div class="rol">
										<div class="left">
											<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
											<p><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
										</div>
										<div class="right">
											<label for="">角色</label> <input class="group_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" type="text" value='<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
' disabled='disabled' /><br />
											<label for="">手机</label> <span><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</span><br />
											<label for="">邮箱</label> <span><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</span><br />
											<div class="Jurisdiction">
												<div class="explain">
													<label>权限</label>
												</div>
												<div class="rules rules_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">
													<p class="judje"><i <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][0] == 1) {?>class="gou"<?php }?>></i><em>新增产品</em></p>
													<p><i <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][1] == 1) {?>class="gou"<?php }?>></i><em>添加文档</em></p>
													<p><i <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][2] == 1) {?>class="gou"<?php }?>></i><em>生成订单</em></p>
													<p><i <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][3] == 1) {?>class="gou"<?php }?>></i><em>批量编辑</em></p>
													<p><i <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][4] == 1) {?>class="gou"<?php }?>></i><em>邀请成员</em></p>
												</div>
											</div>
											<div class="set" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" data-uname="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" data-avatar="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
">
												<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?><i class="tg">移除</i><?php }?>
												<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?><span class="tg">编辑</span><?php }?>
												<em class="tg">私信</em>
												<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?>
												<a href="javascript:void(0)" class="cancle">取消</a>
												<a href="javascript:void(0)" class="confirm">确认</a>
												<?php }?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[4] != 0) {?><span>邀请项目成员进来吧</span><?php }?>
						</div>
					</div>
				</div>
				<!--留言-->
				<div class="message">
					<div class="leave">
						<span>项目留言</span><i><?php echo $_smarty_tpl->tpl_vars['project']->value['commentcount'];?>
个</i>
						<a href="javascript:void(0)">我要留言》</a>
					</div>
					<!--<div class="ping">
						<input type="text" />
						<button></button>
					</div>-->
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
						<strong>更多留言</strong>
					</div>
				</div>
			</div>
		</div>
		<div class="detail">
			<div class="detail-box">
				<div class="detail-title">
					<div class="pro">
						<h1>产品清单</h1>
						<span><?php echo $_smarty_tpl->tpl_vars['total']->value['numb'];?>
类产品 / 共<?php echo $_smarty_tpl->tpl_vars['total']->value['count'];?>
件</span>
					</div>
					<!--这里是初始值-->
					<div id="right-edit">
						<div class="change">
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0) {?><span onclick="window.location.href='/library/project_product_add/<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
'">添加产品</span><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0) {?><em>添加文档</em><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[3] != 0) {?><div class="batch">批量编辑</div><?php }?>
							<i>切换</i>
						</div>
						<div class="notes">订单记录</div>
						<div class="print" onClick=" a()">打印</div>
						<div class="export">导出</div>
					</div>
					<!--这里是改变样式-->
					<div class="change-edit">
						<a href="javascript:void(0)" class="win">完成</a>
						<a href="javascript:void(0)" onClick="getProjectData()">拷贝至</a>
						<a href="javascript:void(0)" onClick="getProjectData()">移除至</a>
						<a href="javascript:void(0)" class="dt">删除</a>
					</div>
				</div>
				<!--这里是展示内容以-->
				<div class="detail-item" id='ddd'>
					<div class="thead">
						<div class="all-select">全选</div>
						<div class="number">编号</div>
						<div class="name">名称</div>
						<div class="pros">产品</div>
						<div class="parameter">参数</div>
						<div class="unit">产品单价</div>
						<div class="adjust">单价调整</div>
						<div class="offer">报价上浮</div>
						<div class="count">数量</div>
						<div class="subtotal">小计</div>
						<div class="operation">操作</div>
					</div>
					<ul>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prolist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<li data-proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
">
							<div class="author">
								<div class="all-select"><i></i></div>
								<div class="remark">
									<input type="text" class="number" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
" />
									<input type="text" class="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
" />
									<input type="text" class="notes" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppdesc'];?>
" />
								</div>
								<div class="pros">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['smallpic'];?>
" alt="" />
									<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</p>
								</div>
								<div class="param">
									<p>选择规格:W:740 D: 660 H:720</p>
									<p>涂装:天然木油 </p>
									<p>选择材质:北美胡桃木</p>
									<p>选择面料:进口亚麻布</p>
								</div>
								<div class="unpric">
									<p>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['price'];?>
</p>
								</div>
								<div class="adjust jia">
									<input type="text" value="￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppprice'];?>
" />
								</div>
								<div class="adjust flo">
									<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppfloat'];?>
" /><span>%</span>
								</div>
								<div class="count">
									<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>

								</div>
								<div class="substro">
									￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['totalprice2'];?>

								</div>
								<div class="set">
									<div class="set-help">帮他调整</div>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0) {?>
									<div class="set-sect" <?php if ($_smarty_tpl->tpl_vars['item']->value['sp1']['status'] == 1) {?>style="background: #777"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['item']->value['sp1']['status'] == 0) {?>
										<p>可修改</p><i></i>
										<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sp1']['status'] == 1) {?>
										<p>锁定方案</p><i></i>
										<?php }?>
									</div>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0) {?>
									<div class="selct-box" data-proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
">
										<a href="javascript:void(0)" data-status="0">可修改</a>
										<a href="javascript:void(0)" data-status="1">锁定方案</a>
										<a href="javascript:void(0)">修改</a>
										<a href="javascript:void(0)" data-status="2">删除</a>
									</div>
									<?php }?>
								</div>
								<div class="sure">确认</div>
							</div>
							<!--这里是替换的内容-->
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_1'])) {?>
							<div class="replace">
								<div class="replace-title">
									<p>方案替换</p><em></em>
								</div>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_1'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
								<div class="replace-item" data-sid="<?php echo $_smarty_tpl->tpl_vars['item2']->value['sid'];?>
">
									<div class="replace-check">
										<i></i>
									</div>

									<div class="head">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['avatar'];?>
" alt="" />
									</div>
									<div class="pros">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['smallpic'];?>
" alt="" />
										<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['proname'];?>
</p>
									</div>
									<div class="param">
										<p>选择规格:W:740 D: 660 H:720</p>
										<p>涂装:天然木油 </p>
										<p>选择材质:北美胡桃木</p>
										<p>选择面料:进口亚麻布</p>
									</div>
									<div class="unpric">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['price'];?>
</p>
									</div>
									<div class="adjust jia">
										<input type="text" value="￥<?php if ($_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {
echo $_smarty_tpl->tpl_vars['item2']->value['ppprice'];
} else { ?>****.**<?php }?>" />
									</div>
									<div class="adjust flo">
										<input type="text" value="<?php if ($_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {
echo $_smarty_tpl->tpl_vars['item2']->value['ppfloat'];
} else { ?>**<?php }?>" /><span>%</span>
									</div>
									<div class="count">
										<?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>

									</div>
									<div class="substro">
										￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['totalprice2'];?>

									</div>

									<div class="cre">
										<div class="cre-box">
											<p>编辑</p>
											<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>
										</div>
									</div>
									<div class="sure">确认</div>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] == 1) {?><div class="use">使用该方案</div><?php }?>

								</div>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</div>
							<?php }?>
							
							<!--这里是补充调整的内容-->
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_2'])) {?>
							<div class="replace">
								<div class="replace-title">
									<p>补充调整</p><em></em>
								</div>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_2'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
								<div class="replace-item" data-sid="<?php echo $_smarty_tpl->tpl_vars['item2']->value['sid'];?>
">
									<div class="replace-check">
										<i></i>
									</div>

									<div class="head">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['avatar'];?>
" alt="" />
									</div>
									<div class="pros">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['smallpic'];?>
" alt="" />
										<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['proname'];?>
</p>
									</div>
									<div class="param">
										<p>选择规格:W:740 D: 660 H:720</p>
										<p>涂装:天然木油 </p>
										<p>选择材质:北美胡桃木</p>
										<p>选择面料:进口亚麻布</p>
									</div>
									<div class="unpric">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['price'];?>
</p>
									</div>
									<div class="adjust jia">
										<input type="text" value="￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['ppprice'];?>
" />
									</div>
									<div class="adjust flo">
										<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['ppfloat'];?>
" /><span>%</span>
									</div>
									<div class="count">
										<?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>

									</div>
									<div class="substro">
										￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['totalprice2'];?>

									</div>

									<div class="cre">
										<div class="cre-box">
											<p>编辑</p>
											<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>
										</div>
									</div>
									<div class="sure">确认</div>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] == 1) {?><div class="use">使用该方案</div><?php }?>

								</div>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</div>
							<?php }?>

						</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</ul>
					<div class="bottom-total">
						<div class="all">
							<i></i><span>全选</span>
						</div>
						<div class="float" style="width:300px;">
							<span>选中的产品上浮</span>
							<input id="allfloat" type="text" value="0" />
							<span>%</span>
							<button onClick="confirmFloat();" style=" width: 70px; height: 25px; margin-left:10px; line-height: 25px; text-align: center; background: #055cfc; color: #fff; outline: none; border: none; border-radius: 5px;">确定</button>
						</div>
						<div class="remak">
							<span>备注 </span> <input type="text" id="orderdesc" />
						</div>
						<div class="money">
							<span>合计<?php echo $_smarty_tpl->tpl_vars['total']->value['count'];?>
件产品  合计：</span> <em>￥<?php echo $_smarty_tpl->tpl_vars['total']->value['price1'];?>
</em>
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[2] != 0) {?><button id="checkorder">生成订单</button><?php }?>
						</div>
					</div>
				</div>
				<!--这里是展示的内容二-->
				<div class="containerp" id="containerp">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prolist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
					<div class="box" id="1">
						<a href="javascript:void(0)">
							<div class="boximg">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['smallpic'];?>
" alt="" style="height:220px">
								<label class="checked"></label>
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</p>
							</div>
							<div class="behavior">
								<div class="peson">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['avatar'];?>
" alt="" />
									<span><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['nickname'];?>
</span>
								</div>
								<div class="praise">
									<span></span>
									<i><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['zancount'];?>
</i>
								</div>
							</div>
						</a>
					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</div>

			</div>
		</div>

		<!--<?php echo '<script'; ?>
 type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.4.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">

		//调整上浮产品
		function confirmFloat() {

			var val = $('#allfloat').val();
			var arr = new Array();
			$(".detail-item ul li .author .all-select i").each(function(){
				// alert(1);
		        if($(this).hasClass('ck')){

		          // $(this).parent('.all-select').parent('.author').find('.flo').find('input').val(val);
		          var sid = $(this).parent('.all-select').parent('.author').parent('li').attr('data-proid');
		          arr.push(sid);

		        }

		    })

		    $(".detail-item ul li .replace .replace-item .replace-check i").each(function(){
		    	// alert(1);
		        if($(this).hasClass('ck')){

		          // $(this).parent('.replace-check').parent('.replace-item').find('.flo').find('input').val(val);
		          var sid = $(this).parent('.replace-check').parent('.replace-item').attr('data-sid');
		          arr.push(sid);

		        }

		    })

		    $.ajax({
				url: '/product/adjustProductFloat',
				type: 'POST',
				async: true,
				data: {
					val: val,
					proid: arr
				},
				// timeout: 5000,
				// dataType: 'json',
				success: function(ret){
					//console.log(data);
					// $(".detail .detail-box .detail-item ul .checked").parent().parent().remove();
					// $(".detail-item ul li .author .all-select .ck").parent().parent().parent().remove();
					if(ret != ''){

	                  var jsonarray = eval('('+ret+')');
	                  var msg = jsonarray.msg;
	                  var code = jsonarray.code;
	                  alert(msg);
	                  if(code == 200) {
	                 	 window.location.reload();
	              	  }

               		}

				}

			});

		}
	//添加到已创建的材思库
	var inputVal = $('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .output input') /*这里是弹出窗上面的输入框*/
	inputVal.on("keyup", function() {
		// var values = inputVal.val();
		var values = $('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .output input').val();
		if(values == "") {
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select .select-show").css("display", 'block');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .gaile").css("display", 'none');
		} else {
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select .select-show").css("display", 'none');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .gaile").css("display", 'block');
			$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .gaile i").text(values);
		}
	})
   var fsg=true
	$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .creat .gaile").on("click", function() {
		fsg=false
		var length = $('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box .item').length;
		var values = inputVal.val();
		var item = document.getElementsByClassName("item")
		var atr = []
		for(i = 0; i < length; i++) {
			if(atr.indexOf(item[i].firstChild.innerText) <= -1) {
				atr.push(item[i].firstChild.innerText)
			}
			//					return atr
		}

		var values = $('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .output input').val();
		if(atr.indexOf(values) >= 0) {
			alert("已创建这个材思库")
		} else {
			$('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-show').css("display", 'block')
				//				var div=document.createElement('<div class="item"></div>')

			$('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box').append("<div class='item'><p>" + values + "</p><i></i><div class='sub-item'><div class='sub-add'>添加区域</div></div></div>");

			$('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box .item').eq(length).insertBefore($('#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box .item').eq(0))

			clickTogtotal = $("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box .item p").size()

			$('#caiji .sub-item .sub-add').eq(0).click(function() {
				var input = `<input type="text" name="" id="" />`;
				$(this).before(input)
				$('#caiji .sub-item .sub-add').parent().find("input").on("keyup", function(event) {
					if(event.keyCode == 13) {

						var value = $(this).val();
						$(this).before(`<div class="sub-icon">` + value + `</div>`);
						$(this).remove()
					
						
			
					}
				})
			})

			for(var i = 0; i < (clickTogtotal - clickTognum); i++) {
				$("#caiji .caiji-box .caiji-content .caiji-show .caiji-right .select-box .item p").eq(i).on("click", function() {
					$(this).parent().find(".sub-item").slideToggle();
					$(this).next().toggleClass("rotates")
				})
			}
		}
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

			$("#share .bds_weixin").click(function() {
				$(".bd_weixin_popup").css({
					"top": "300px",
					"left": "600px"
				})
				console.log(0)
			})
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			//这是留言滑动验证 
			$('.winleave').attr('disabled', true)
			$('.winleave').css({
				cursor: "not-allowed"
			})

			$("#slider1").slider({
				callback: function(result) {
					var vale = $('.moveleave .publi input').val()
					$("#result1").text(result);
					$(".moveleave .publi span").text(result);

					if(vale != '') {
						$('.winleave').attr('disabled', false)
						$('.winleave').css({
							cursor: "default"
						})

					} else {
						alert('输入框不能为空')
					}

				}
			});
			//			$(".winleave").click(function() {
			//				$("#slider1").slider("restore");
			//			})

			$('.moveleave .publi input').on('keyup', function() {
				var text = $(".moveleave .publi span").text();
				var vale = $('.moveleave .publi input').val()

				if(text != '' && vale != '') {
					$('.winleave').attr('disabled', false)
					$('.winleave').css({
						cursor: "default"
					})
				}
			})
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			/*
			 * 瀑布流的原理：
			 * 寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
			 *
			 * */
			var container = document.getElementById("containerp");
			var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
				waterfull();
			};

			function waterfull() {
				var box = document.getElementsByClassName("box");

				//计算一排中的能排放的数量
				var containerWidth = $('#containerp').width();
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
						//				 var index = boxheight.indexOf(minBoxHeight);
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

			function loadFlag() {
				//获取页面高度
				var pageHeight = document.documentElement.clientHeight;
				//滚动的高度
				var scrollHeight = document.documentElement.scrollTop || document.body.scrollTop;
				//最后一张图片距离顶部的高度
				var boxs = document.getElementsByClassName("box");
				//var boxHeight = boxs[boxs.length - 1].offsetTop;
				var btn = document.getElementsByClassName("add-btn").item(0);
				var boxHeight = btn.offsetTop + 49;
				/* console.log("页面高度:"+pageHeight);
				 console.log("滚动高度:"+scrollHeight);
				 console.log("元素高度:"+boxHeight);*/
				return pageHeight + scrollHeight > boxHeight ? true : false;
			}
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
