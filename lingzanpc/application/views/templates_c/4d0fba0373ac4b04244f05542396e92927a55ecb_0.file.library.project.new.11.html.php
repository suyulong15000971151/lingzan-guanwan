<?php
/* Smarty version 3.1.30, created on 2018-01-23 17:08:33
  from "D:\lingzanpc\application\views\templates\library\library.project.new.11.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a66fb91c11984_88230910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d0fba0373ac4b04244f05542396e92927a55ecb' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\library\\library.project.new.11.html',
      1 => 1516606719,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a66fb91c11984_88230910 (Smarty_Internal_Template $_smarty_tpl) {
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
/js/procoll.js"><?php echo '</script'; ?>
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
		<style>
			#pick .pick-box .pick-content .pick-show .pick-right .select-box i {
				display: inline-block;
				position: absolute;
				right: 15px;
				top: 10px;
				width: 15px;
				height: 10px;
				background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/tbarror_03.png) no-repeat;
				background-size: 100% 100%;
			}
			#pick .pick-box .pick-content .pick-show .pick-right .select-box .sub-add {
				height: 30px;
				box-sizing: border-box;
				background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/caiadd_03.png) no-repeat left center;
				background-size: 15px 15px;
			}
			canvas{display:none;}
		</style>
		
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
        <!--这里是确认弹窗-->
        <div id="config">
        	<div  class="config-box">
        		<div class="content">
        			<button type="submit">确认上传</button>
        			<span>取消</span>
        		</div>
        	</div>
        </div>
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
						<tr><th>文件</th><th>更新时间</th><th>大小</th><th>上传者</th><th>操作</th></tr>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project_doc']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
						<tr data-docid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<td class="y"><?php echo $_smarty_tpl->tpl_vars['item']->value['docname'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['item']->value['docsize'];?>
MB</td>
							<td><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</td>
							<td class="u">
								<span onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['item']->value['docpath'];?>
'" title="下载"></span>
								<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[11] != 0 && $_smarty_tpl->tpl_vars['item']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
								<i class="del" title="删除"></i>
								<?php }?>
							</td>
						</tr>
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
		
		<!--添加产品-->
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
						<!-- <input type="hidden" name="productId" id="productId" /> -->
						<input type="hidden" name="proid" class="proid" />
						<input type="hidden" name="libid" class="libid" />
						<!-- <input type="hidden" name="oldLibid" id="oldLibid" /> -->
						<!-- <input type="hidden" name="oldProid" id="oldProid" /> -->
						<!-- <input type="hidden" name="sid" id="sid" /> -->
						<!-- <input type="hidden" name="tag" id="tag" /> -->
						<input type="hidden" name="image" id="image" value="" />
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
							<input type="hidden" id="touserid2" value="0" />
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
								<?php if ($_smarty_tpl->tpl_vars['item']->value['userid2'] == 0) {?>
								<li data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
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
										<?php if ($_smarty_tpl->tpl_vars['permissions']->value[16] != 0 && $_smarty_tpl->tpl_vars['item']->value['userid'] != $_smarty_tpl->tpl_vars['userid']->value) {?><a href="javascript:;" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">回复</a><?php }?>
										<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[17] != 0 && $_smarty_tpl->tpl_vars['item']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><label for="">删除</label><?php }?>
									</div>
								</li>
								<?php } else { ?>
								<li data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
									<div class="liimg">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
									</div>
									<div class="litext">
										<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span><em>回复了</em><strong><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname2'];?>
</strong>
										<p><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</p>
										<i><?php echo $_smarty_tpl->tpl_vars['item']->value['addtime'];?>
</i>
										<?php if ($_smarty_tpl->tpl_vars['permissions']->value[16] != 0 && $_smarty_tpl->tpl_vars['item']->value['userid'] != $_smarty_tpl->tpl_vars['userid']->value) {?><a href="javascript:;" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">回复</a><?php }?>
										<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[17] != 0 && $_smarty_tpl->tpl_vars['item']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><label for="">删除</label><?php }?>
									</div>
								</li>
								<?php }?>
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
							<a href="javascript:void(0)" class="mid">添加关注成员</a>
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
							<!--这是第二个-->
							<div class="first-befor tow mode">
								<div class="select-pso">
									<ul>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['follow']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
										<li class="friends" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['followid'];?>
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
								<form action="/library/project_member_add" method="post">
								<input name="frames" type="hidden" value="yes"/>
								<input type="hidden" name="proid" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
								<div class="first-box">
									<div class="firstput">
										<p>* 快速添加成员账户，设置默认密码，首次登陆时需要修改默认密码</p>
										<div class="item">
											<label for="">姓名</label> <input type="text" name="nickname" />
										</div>
										<div class="item">
											<label for="">登录用户名</label> <input type="text" />
										</div>
										<div class="item">
											<label for="">手机号</label> <input type="text" name="mobile" />
										</div>
										<div class="item">
											<label for="">默认密码</label> <input type="text" name="password" />
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
								</form>
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
		<div id="pick-else">
			<div class="pick-box">
				<div class="pick-content" style="height:610px;">
					<div class="pick-title">
						<span>转换成我的项目</span>
						<i></i>
					</div>
					<div class="pick-show">
						<div class="pick-left">
							<!-- <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/images/addcai_03.jpg" alt="" /> -->
							<img src="<?php echo $_smarty_tpl->tpl_vars['cover']->value[0];?>
" alt="" />
							<p>星期天沙发</p>
						</div>
						<div class="pick-right"  style="height:550px;">
							<input type="hidden" class="proid" name="proid" value="" />
							<input type="hidden" class="selectLib" name="selectLib" value="" />
							<div class="output">
								<input type="text" value="创建新的项目" id="libname" name="libname"/>
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
								<div class="creat-box" onClick="addLibraryProduct()">
									<span>创建材思库</span>
									<i></i>
								</div>

							</div>
							<!--<div class="label">
								<input type="text" value="项目标题" class="libtitle" name="libtitle" style="margin-bottom:10px;"/>
								<input type="text" value="输入文字按空格或回撤以生成标签" class="tag" name="tag" />
							</div>-->
							<div class="submit">
								<button  onClick="changeMyProject()">确认转换</button>
							</div>

						</div>
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
						<div class="plan" data-tyid="1" data-proid="">一· 补充材料</div>
						<p>如果你有更好的产品，可以添加至该方案对比投标</p>
					</div>
					<div class="help-item">
						<div class="plan" data-tyid="2" data-proid="">二· 补充面料</div>
						<p>如果你有该产品更好的材质、面料之类，可以补充投标</p>
					</div>
				</div>
				<div class="sub">
					<button>确认</button>
				</div>
			</div>
		</div>
		
		<div id="Number">
			<div class="number-box">
				<div class="content">
					<p>编号成功</p>
				</div>
			</div>
		</div>

		<!--这是项目标题-->
		<div class="sub-nav">
			<div class="sub-box">
				<!--<div class="sub-box-title" style="position: absolute;line-height: 80px;font-size: 15px;"><b style="font-size: 17px;"><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
</b>(<?php echo $_smarty_tpl->tpl_vars['project']->value['x_index'];?>
,<?php echo $_smarty_tpl->tpl_vars['project']->value['y_index'];?>
)</div>-->
				
				<!--<select id="proarea" name="" value="">
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

				</select>-->
				<div class="caption"><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
</div>
				
				<div class="pro-explain">
					<p><?php echo $_smarty_tpl->tpl_vars['project']->value['desc'];?>
</p>
					<!--<em>全文》</em>-->
				</div>
				
				
				<i onclick="javascript:window.location.href='/member/selflibrarytow/<?php echo $_smarty_tpl->tpl_vars['project']->value['libid'];?>
/<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
'" title="返回"></i>
				<span title="分享"></span>
				<?php if ($_smarty_tpl->tpl_vars['permissions']->value[10] != 0) {?>
				<div class="files">
					<a href="javascript:;" class="add"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/up.png" title="上传文件" alt="" /></a><p><a href="javascript:;" title="项目文件"></a> <em title="项目文件"><?php echo count($_smarty_tpl->tpl_vars['project_doc']->value);?>
</em></p>
					<a href="javascript:;" class="load"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/lo.png" title="下载文件" alt="" /></a>
				</div>
				<?php }?>
			</div>
		</div>

		<!--这是下面的产品-->
		<div class="product">
			<input type="hidden" id="proid1" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
			<input type="hidden" id="area" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['area'];?>
" />
			<div class="left">
				<div class="item">
					<form action="/library/uploadCover" method="post" enctype="multipart/form-data">
					<input name="frames" type="hidden" value="yes"/>
					<input type="hidden" name="proid" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
" />
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[12] != 0) {?><li class="increase" id="upload"><input type="file" class="upcov" name="cover_0" onchange="uploads(this)"></li><?php }?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cover']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<li><div class="bg" style="background:url(<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
) no-repeat center center;background-size: cover;"></div><?php if ($_smarty_tpl->tpl_vars['permissions']->value[12] != 0) {?><i></i><?php }?></li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</ul>
					<!--<button type="submit">确认上传</button>-->
					</form>
				</div>
				<div class="show" style="background:url('<?php echo $_smarty_tpl->tpl_vars['cover']->value[0];?>
') no-repeat center center;background-size: contain;">
					<!--<a href="" class="arror-l"></a>
					<a href="" class="arror-r"></a>-->
					<div class="trun" onClick="addImages()">转为产品</div>
					<!--<a href="javascript:;" contenteditable="true">酒店大堂</a>-->
				</div>
			</div>
			<div class="right rights">
				<!--<div class="title">
					<h1><?php echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
</h1>
					<span>分享</span>
					<p><?php echo $_smarty_tpl->tpl_vars['project']->value['desc'];?>
</p>
					<div class="pso"><img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['avatar'];?>
" alt="" /><em><?php echo $_smarty_tpl->tpl_vars['project']->value['nickname'];?>
</em></div>
				</div>-->
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
				<!--留言-->
				<div class="message">
					<div class="leave">
						<span>项目留言</span><i><?php echo $_smarty_tpl->tpl_vars['project']->value['commentcount'];?>
个</i>
						<a href="javascript:void(0)">我要留言</a>
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
			<!--这里是项目成员-->
			<div class="members">
				
				<div class="member">
					<div class="arror arror-left"><a href="javascript:;"></a></div>
			     	<div class="arror arror-right"><a href="javascript:;"></a></div>
					<!--<h4>公共区--域大堂吧</h4>-->
					<div class="member-add">
						<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if ($_smarty_tpl->tpl_vars['permissions']->value[14] != 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/memberadd.png" alt=""  title="添加项目成员"/><?php }
}?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['project_member']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value['userid'] != $_smarty_tpl->tpl_vars['project']->value['userid']) {?>
						<div class="peon-item" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
							<i><?php if ($_smarty_tpl->tpl_vars['item']->value['group']) {
echo $_smarty_tpl->tpl_vars['item']->value['group'];
} else { ?>访客<?php }?></i>
							<div class="people-id">
								<div class="rol">
									<div class="left">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="" />
										<p><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
									</div>
									<div class="right">
										<label for="">&nbsp;角色</label> <input class="group group_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" type="text" value='<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
' disabled='disabled' /><br />
										<label for="">&nbsp;手机</label> <span><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</span><br />
										<label for="" style="margin-top:0px">&nbsp;邮箱</label> <span><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</span><br />
										
										<?php if ($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?><strong></strong><?php }?>
										<!--<div class="Jurisdiction-else">
											<div class="explain">
												<label>权限</label>
											</div>
											<div class="rules rul rules_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">
												<p class="judje" <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][0] != 1) {?>style="display: none;"<?php }?>><em>新增产品</em></p>
												<p <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][1] != 1) {?>style="display: none;"<?php }?>><em>添加文档</em></p>
												<p <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][2] != 1) {?>style="display: none;"<?php }?>><em>生成订单</em></p>
												<p <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][3] != 1) {?>style="display: none;"<?php }?>><em>批量编辑</em></p>
												<p <?php if ($_smarty_tpl->tpl_vars['item']->value['permissions'][4] != 1) {?>style="display: none;"<?php }?>><em>邀请成员</em></p>
											</div>
										</div>-->
										<!--<div class="Jurisdiction">
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
										</div>-->
										<div class="set" data-uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" data-uname="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" data-avatar="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
">
											<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?><i class="tg">移除</i><?php }?>
											<!--<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?><span class="tg">编辑</span><?php }?>-->
											<em class="tg">私信</em>
											<?php if ($_smarty_tpl->tpl_vars['userid']->value == $_smarty_tpl->tpl_vars['project']->value['userid']) {?>
											<!--<a href="javascript:void(0)" class="cancle">取消</a>
											<a href="javascript:void(0)" class="confirm">确认</a>-->
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

						<!--这里是权限设置弹窗-->
						<div id="power">
							<div class="power-box" data-uid="0">
								<div class="title">
									<span>角色</span>
									<i></i>
								</div>
								<div class="power_nav">
									<a href="javascript:;" class="tv">设计师<em></em></a>
									<a href="javascript:;">采购</a>
									<a href="javascript:;">供应商</a>
									<a href="javascript:;">访客</a>
								</div>
								<div class="pdcu">
									<div class="col">
										<div class="sum_check">
											<i class=""></i>产品
										</div>
									</div>
									<div class="col-sub">
										<div class="sub_check bgm">
											<i class="auths auths_1" data-authid="1"></i>
											添加产品
											<em></em>
											<div class="explain">
												这里是说明
											</div>
										</div>
										<div class="sub_check">
											<i class="auths auths_2" data-authid="2"></i>
											产品属性修改
										</div>
										<div class="sub_check">
											<i class="auths auths_3" data-authid="3"></i>
											删除产品
										</div>
										<div class="sub_check">
											<i class="auths auths_4" data-authid="4"></i>
											产品批量删除
										</div>
										<div class="sub_check">
											<i class="auths auths_5" data-authid="5"></i>
											补充调整产品
										</div>
										<div class="sub_check">
											<i class="auths auths_6" data-authid="6"></i>
											补充调整材料
										</div>
									</div>
								</div>
								<!--清单-->
								<div class="pdcu ord">
									<div class="col">
										<div class="sum_check">
											<i class=""></i>清单
										</div>
									</div>
									<div class="col-sub">
										<div class="sub_check">
											<i class="auths auths_7" data-authid="7"></i>
											生成清单
										</div>
										<div class="sub_check">
											<i class="auths auths_8" data-authid="8"></i>
											清单记录查看
										</div>
										<div class="sub_check">
											<i class="auths auths_9" data-authid="9"></i>
											清单导出
										</div>
										<div class="sub_check">
											<i class="auths auths_10" data-authid="10"></i>
											清单打印
										</div>
									</div>
								</div>
								<!--项目-->
								<div class="pdcu ord">
									<div class="col">
										<div class="sum_check">
											<i class=""></i>项目
										</div>
									</div>
									<div class="col-sub">
										<div class="sub_check">
											<i class="auths auths_11" data-authid="11"></i>
											上传下载文档
										</div>
										<div class="sub_check">
											<i class="auths auths_12" data-authid="12"></i>
											文档删除
										</div>
										<div class="sub_check">
											<i class="auths auths_13" data-authid="13"></i>
											项目封面上传删除
										</div>
										<div class="sub_check">
											<i class="auths auths_14" data-authid="14"></i>
											项目属性修改
										</div>
									</div>
								</div>
								
								<!--人员-->
								<div class="pdcu peo">
									<div class="col">
										<div class="sum_check">
											<i class=""></i>人员
										</div>
									</div>
									<div class="col-sub">
										<div class="sub_check">
											<i class="auths auths_15" data-authid="15"></i>
											邀请加入项目
										</div>
										<div class="sub_check">
											<i class="auths auths_16" data-authid="16"></i>
											移除项目
										</div>
										
									</div>
								</div>
								
								<!--留言-->
								<div class="pdcu peo">
									<div class="col">
										<div class="sum_check">
											<i class=""></i>留言
										</div>
									</div>
									<div class="col-sub">
										<div class="sub_check">
											<i class="auths auths_17" data-authid="17"></i>
											项目留言回复
										</div>
										<div class="sub_check">
											<i class="auths auths_18" data-authid="18"></i>
											留言回复删除
										</div>
										
									</div>
								</div>
								
								<div class="confirm">
									<a href="javascript:;" style="background:#eee;color:#000" class="cancel">取消</a>
									<a href="javascript:;" style="background:#055cfc;color:#fff" class="determine">确认</a>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="detail">
			<div class="detail-box">
				<input type="hidden" id="showtype" value="<?php echo $_smarty_tpl->tpl_vars['issee']->value;?>
" />
				<!--<h2>项目产品清单</h2>-->
				<div class="detail-title">
					<div class="pro">
						<!--<h1>项目产品清单--</h1>-->
						<span><!--<?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];
echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
-->产品清单</span>
						
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
					</div>
					<!--这里是搜索-->
					<div class="detail-sear">
						<!--<span>搜索</span>-->
						<input type="text" id="proseachword" />
						<button id="proseach"></button>
						
					</div>
					<!--这里是条纹切换-->
					<div class="stripe"></div>
					<!--这里是切换-->
					<div class="trade" title="切换"></div>
					
					
					
					<!--这里是初始值-->
					<div id="right-edit">
						<div class="change">
							<i title="切换"></i>
							<!--<?php if ($_smarty_tpl->tpl_vars['permissions']->value[3] != 0) {?><div class="batch" title="批量编辑"></div><?php }?>-->
							<!--<div class="turn"><div class="turn-box" onClick="getLib(<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
,<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
,<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['groupid'];?>
)">转换成我的项目</div></div>-->
							<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0 && $_smarty_tpl->tpl_vars['istop']->value != 1) {?><span class="addProduct" onclick="window.location.href='/library/project_product_add/<?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
?issee=<?php echo $_smarty_tpl->tpl_vars['issee']->value;?>
'" title="添加产品">添加产品</span><?php }?>
							<!--<?php if ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0) {?><em>添加文档</em><?php }?>-->
						</div>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[7] != 0) {?><div class="notes" title="订单记录">订单记录</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[6] != 0 && $_smarty_tpl->tpl_vars['istop']->value != 1) {?><div class="out_red generate-order">生成订单
							
							<!--<div class="inset">
								<div class="print" onClick=" a()" title="打印"></div>
						        <div class="export" title="导出"></div>
							</div>-->
							
						</div><?php }?>
						
					</div>
					<!--这里是改变样式-->
					<div class="change-edit">
						<a href="javascript:void(0)" onClick="getProjectData()" class="all_check" style="display: none;"><span>全选</span> &nbsp;<i></i></a>
						<!--<a href="javascript:void(0)" class="win">完成</a>-->
						<!--<a href="javascript:void(0)" onClick="getProjectData()">复制</a>-->
						<!--<a href="javascript:void(0)" onClick="getProjectData()">全选</a>-->
						<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?><a href="javascript:void(0)" class="dt">删除</a><?php }?>
						<a href="javascript:void(0)" class="win">完成</a>
					</div>
				    
					<div class="check_all"><span>全选</span> &nbsp;<i></i></div>
					<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?><div class="delete">删除</div><?php }?>
				</div>
				<div class="disnone" style="clear: both;"></div>
				
				<div class="detail-fixed"></div>
				<!--这里是展示内容以-->
				<div class="detail-item" id='ddd'>
					<div class="thead">
						<div class="all-select">全选<br />
						<i></i>
						</div>
						<div class="number">项目编号名称<br /><?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?><span>重新编号</span><?php }?>
						</div>
						<!--<div class="name">名称</div>-->
						<div class="pros"><label for="">产品编号名称</label>
							<span>分类显示</span>
							<div class="cla-sub">
								<a href="javascript:;">全部</a>
								<a href="javascript:;">家具类</a>
								<a href="javascript:;">配饰类</a>
								<a href="javascript:;">灯饰类</a>
								<a href="javascript:;">卫浴类</a>
								<a href="javascript:;">厨房类</a>
								<a href="javascript:;">材料类</a>
							</div>
						</div>
						<div class="parameter">规格参数</div>
						<div class="unit">单价<br />
						<span>价格调整</span>
						
						<div class="flo-sub">
							<p>选中的产品价格上浮</p>
							<input type="text" id="allfloat" onblur="confirmFloat()" /> %
							<i>确定</i>
						</div>
						</div>
						<div class="adjust">数量<br />
						<span>共<?php echo $_smarty_tpl->tpl_vars['total']->value['count'];?>
件</span>
						</div>
						<div class="offer">总价<br />
						<span>￥<?php echo $_smarty_tpl->tpl_vars['total']->value['price'];?>
</span>
						</div>
						<div class="count">备注说明<br />
						
						
						</div>
						<!--<div class="subtotal">金额</div>-->
						<div class="operation">
							操作<br />
							<!--<span>显示修改</span>
							<div class="show-sub">
							<a href="javascript:;">可修改</a>
							<a href="javascript:;">不可修改</a>
						    </div>-->
						</div>
					</div>
					<ul class="prolist">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prolist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
						<li data-proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
" data-type1="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['type1'];?>
" data-status="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['status'];?>
">
							<div class="author same">
								<div class="all-select same-select">
									<em><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</em>
									<i data-sid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
"></i>
								</div>
								<div class="remark">
									<div style="position: relative;height:25px">
										<div class="item">
											<p class="number"><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
</p>
											<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
" />
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppcode"></div><?php }
}?>
									</div>
									<div style="position: relative;height:25px">
										<div class="item">
											<p class=""><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
</p>
											<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
" />
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppname"></div><?php }
}?>
									</div>
									
									<!--<p class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</p>-->
									<p class="notes"><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppdesc'];?>
</p>
									<!--<input type="text" class="number" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
" />
									<input type="text" class="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
" />
									<input type="text" class="notes" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppdesc'];?>
" />-->
								</div>
								<div class="pros" data-proid2=<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proid2'];?>
>
									<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proid2'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['smallpic'];?>
" alt="" /></a>
									<div class="model">
										<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['model'];?>
</p>
										<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['model'];?>
" />
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="model"></div><?php }
}?>
									</div>
									<div class="model mode-dow">
										<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</p>
										<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
" />
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="proname"></div><?php }
}?>
									</div>

								</div>
								<div class="param">
									<div style="position: relative;height:25px;margin-top:15px">
										<div class="item">
										<p>规格:<?php if ($_smarty_tpl->tpl_vars['item']->value['sp1']['param1']) {
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['param1'];
} else {
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['size'];
}?></p>
										<input type="text" placeholder="规格"/>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param1"></div><?php }
}?>
									</div>
									
									<!--<div class="item"><p>涂装:天然木油 </p></div>-->
									<div style="position: relative;height:25px">
										<div class="item">
										<p>材质:<?php if ($_smarty_tpl->tpl_vars['item']->value['sp1']['param2']) {
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['param2'];
} else {
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['material'];
}?></p>
										<input type="text" placeholder="材质"/>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param2"></div><?php }
}?>
									</div>
									<!--<div style="position: relative;height:25px"> 
										<div class="item">
										<p>选择面料:<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['param3'];?>
</p>
										<input type="text" placeholder="选择面料"/>
									</div>
									<div class="togg-no" data-field="param3"></div>
									</div>-->
									
									<!--<p>涂装:天然木油 </p>
									<p>选择材质:北美胡桃木</p>
									<p>选择面料:进口亚麻布</p>-->
								</div>
								<div class="unpric unpric-man">
									<div class="pri-item">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppprice']*(1+$_smarty_tpl->tpl_vars['item']->value['sp1']['ppfloat']/100);?>
</p>
										<input type="text" onkeyup="value=value.replace(/[^\d\.]/g,'') " ng-pattern="/[^a-zA-Z]/" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppprice']*(1+$_smarty_tpl->tpl_vars['item']->value['sp1']['ppfloat']/100);?>
">
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppprice"></div><?php }
}?>
								</div>
								<div class="adjust jia jia-man">
									<div class="jia-item">
									<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
件</p>
									<input type="text" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
">
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="count"></div><?php }
}?>
								</div>
								<div class="adjust flo">
									￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['totalprice'];?>

								</div>
								<div class="count">
									<figure class="count-item togg-yes">
										<!--<p></p>-->
										<textarea name="" rows="" cols="" placeholder="备注"><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['desc'];?>
</textarea>
									</figure>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
									<div class="togg-no" data-field="desc">
										<!--<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['desc'];?>
-->
									</div>
									<?php }?>
									<?php }?>
									<!--<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
-->
								</div>
								<div class="release">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['avatar'];?>
" alt="" />
								</div>
								
								<div class="operation">
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[4] != 0) {?><a href="javascript:;" class="a1 supp-pro">添加比对</a><?php } else { ?><a href="javascript:;" class="supp-pro" style="background:#ccc;">添加比对</a><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[5] != 0) {?><a href="javascript:;" class="a1 supp-mac Material">添加材料</a><?php } else { ?><a href="javascript:;" class="supp-mac" style="background:#ccc;">添加材料</a><?php }?>
									<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[2] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><a href="javascript:;" class="a1 li-del">删除产品</a><?php } else { ?><a href="javascript:;" class="li-del" style="background:#ccc;">删除产品</a><?php }?>
									<?php }?>
								</div>
								<!--<div class="substro">
									￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['totalprice'];?>

								</div>-->
								
								
								<!--<div class="set">
									
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0) {?>
									<div class="set-sect">
										<p>操作</p><i></i>
									</div>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['permissions']->value[0] != 0) {?>
									<div class="selct-box" data-proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['permissions']->value[4] != 0) {?><a href="javascript:void(0)">补充备选产品</a><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['permissions']->value[5] != 0) {?><a href="javascript:void(0)" class="Material">补充包含材料</a><?php }?>
										<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[2] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><a href="javascript:void(0)">删除</a><?php }?>
									</div>
									<?php }?>
								</div>-->
								
								<!--<div class="sure">确认</div>-->
							</div>
							<!--这里是替换的内容-->
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_1'])) {?>
							<div class="replace">
								<div class="replace-title">
									<p>备选产品</p><em></em>
								</div>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_1'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
								<div class="replace-item same" data-sid="<?php echo $_smarty_tpl->tpl_vars['item2']->value['sid'];?>
" data-proid2="<?php echo $_smarty_tpl->tpl_vars['item2']->value['proid2'];?>
">
									<div class="replace-check replace-bak same-select">
										<i data-sid="<?php echo $_smarty_tpl->tpl_vars['item2']->value['sid'];?>
"></i>
									</div>

									<!--<div class="head">
										<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['avatar'];?>
" />
									</div>-->
									<div class="subNumber">
										<div style="position: relative;">
											<div class="item">
												<p><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
</p>
												<input type="text" />
											</div>
										</div>
										
									</div>
									<div class="pros pros-sub">
										<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['smallpic'];?>
" />
										<div class="models">
											<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['model'];?>
</p>
											<input type="text" />
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="model"></div><?php }
}?>
										</div>
										<div class="models model-dows">
											<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['proname'];?>
</p>
											<input type="text" />
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="proname"></div><?php }
}?>
										</div>
										
									</div>
									<div class="param">
										<!--<p>选择规格:W:740 D: 660 H:720</p>-->
										<div style="position: relative;">
											<div class="item">
												<p>规格:<?php echo $_smarty_tpl->tpl_vars['item2']->value['param1'];?>
</p>
												<input type="text" placeholder="规格"/>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param1"></div><?php }
}?>
										</div>
										
										<div style="position: relative;">
											<div class="item">
												<p>材质:<?php echo $_smarty_tpl->tpl_vars['item2']->value['param2'];?>
 </p>
												<input type="text" placeholder="材质"/>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param2"></div><?php }
}?>
										</div>
										<!--<p>选择面料:进口亚麻布</p>-->
									</div>
									<div class="unpric unpric-man">
										<!--<p>￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['price'];?>
</p>-->
										<div class="pri-item">
											<p>￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['ppprice'];?>
</p>
											<input type="text" onkeyup="value=value.replace(/[^\d\.]/g,'') " ng-pattern="/[^a-zA-Z]/" >
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppprice"></div><?php }
}?>
									</div>
									<div class="adjust jia jia-pro">
										<!--<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>
件</p>-->
										<div class="jia-item">
										<p><?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>
件</p>
										<input type="text" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="count"></div><?php }
}?>
									</div>
									<div class="adjust flo">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item2']->value['totalprice'];?>
</p>
									</div>
									<div class="count">
										<figure>
											<textarea name="" rows="" cols="" placeholder="备注"><?php echo $_smarty_tpl->tpl_vars['item2']->value['desc'];?>
</textarea>
										</figure>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?>
										<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
										<div class="togg-no" data-field="desc"></div>
										<?php }?>
										<?php }?>
									</div>
									<div class="head">
										<img alt="" src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['avatar'];?>
" />
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?>
									<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item2']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
									<div class="cre">
										<div class="cre-box">
											<a href="javascript:;" class="use">选定</a>
											<p>删除</p>
											<!--<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>-->
										</div>
									</div>
									<?php } else { ?>
									<div class="cre2">
										<div class="cre-box">
											<p>删除</p>
											<!--<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>-->
										</div>
									</div>
									<?php }?>
									<?php }?>
									<!--<div class="sure">确认</div>
									<div class="use">使用该方案</div>-->
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
									<p>包含材料</p><em></em>
								</div>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_2'], 'item3', false, NULL, 'item3', array (
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item3']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_item3']->value['index']++;
?>
								<div class="replace-item" data-sid="<?php echo $_smarty_tpl->tpl_vars['item3']->value['sid'];?>
" data-proid2="<?php echo $_smarty_tpl->tpl_vars['item3']->value['proid2'];?>
">
									<div class="replace-check replace-fab">
										<i data-sid="<?php echo $_smarty_tpl->tpl_vars['item3']->value['sid'];?>
"></i>
									</div>
									<!--<div class="head Fabric">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item3']->value['avatar'];?>
" alt="" />
										<!--<p>面料<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_item3']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_item3']->value['index'] : null)+1;?>
</p>-->
									<!--</div>-->
									<div class="subNumber">
										<div style="position: relative;">
											<div class="item">
												<p><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppcode'];?>
</p>
												<input type="text" />
											</div>
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppcode"></div><?php }
}?>
										</div>
									</div>
									<div class="pros pros-sub">
										<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item3']->value['proid2'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item3']->value['smallpic'];?>
" alt="" /></a>
										<div class="models">
											<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['model'];?>
</p>
											<input type="text" />
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="model"></div><?php }
}?>
										</div>
										<div class="models model-dows">
											<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['proname'];?>
</p>
											<input type="text" />
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="proname"></div><?php }
}?>
										</div>
										<!--<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['model'];?>
</p>
										<div><?php echo $_smarty_tpl->tpl_vars['item3']->value['proname'];?>
</div>-->
									</div>
									<div class="param">
										<!--<p>规格:<?php if ($_smarty_tpl->tpl_vars['item3']->value['param1']) {
echo $_smarty_tpl->tpl_vars['item3']->value['param1'];
} else {
echo $_smarty_tpl->tpl_vars['item3']->value['size'];
}?></p>
										<p>材质:<?php if ($_smarty_tpl->tpl_vars['item3']->value['param2']) {
echo $_smarty_tpl->tpl_vars['item3']->value['param2'];
} else {
echo $_smarty_tpl->tpl_vars['item3']->value['material'];
}?></p>-->
										<!--<p>选择材质:北美胡桃木</p>
										<p>选择面料:进口亚麻布</p>-->
										
										<div style="position: relative;">
											<div class="item">
												<p>规格:<?php echo $_smarty_tpl->tpl_vars['item3']->value['proname'];?>
</p>
												<input type="text" placeholder="规格"/>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param1"></div><?php }
}?>
										</div>
										
										<div style="position: relative;">
											<div class="item">
												<p>材质:<?php echo $_smarty_tpl->tpl_vars['item3']->value['param2'];?>
</p>
												<input type="text" placeholder="材质"/>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="param2"></div><?php }
}?>
										</div>
									</div>
									<div class="unpric unpric-sub">
										<!--<p>￥<?php echo $_smarty_tpl->tpl_vars['item3']->value['price'];?>
</p>-->
										<div class="pri-item">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppprice'];?>
</p>
										<input type="text" onkeyup="value=value.replace(/[^\d\.]/g,'') " ng-pattern="/[^a-zA-Z]/" >
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="ppprice"></div><?php }
}?>
									</div>
									<div class="adjust jia jia_sub">
										<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['average']*$_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
米</p>
										<div class="jia-box" style="position: relative;overflow: hidden;">
											<div class="meters">
											<span><?php echo $_smarty_tpl->tpl_vars['item3']->value['average'];?>
米/件</span>
											<input type="text" onkeyup="value=value.replace(/[^\d\.]/g,'') " ng-pattern="/[^a-zA-Z]/"/ placeholder="<?php echo $_smarty_tpl->tpl_vars['item3']->value['average'];?>
米/件">
										</div>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {
if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><div class="togg-no" data-field="average"></div><?php }
}?>
										</div>
									</div>
									<div class="adjust flo">
										<p>￥<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppprice']*$_smarty_tpl->tpl_vars['item3']->value['average']*$_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
</p>
									</div>
									<div class="count">
										<!--<p>备注</p>-->
										<!--<img src="<?php echo $_smarty_tpl->tpl_vars['item3']->value['avatar'];?>
" alt="" />-->
										<figure>
											<textarea name="" rows="" cols="" placeholder="备注"><?php echo $_smarty_tpl->tpl_vars['item3']->value['desc'];?>
</textarea>
										</figure>
										<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?>
										<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
										<div class="togg-no" data-field="desc"></div>
										<?php }?>
										<?php }?>
									</div>
									<div class="head Fabric">
										<img src="<?php echo $_smarty_tpl->tpl_vars['item3']->value['avatar'];?>
" alt="" />
										<!--<p>面料<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_item3']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_item3']->value['index'] : null)+1;?>
</p>-->
									</div>
									<?php if ($_smarty_tpl->tpl_vars['istop']->value != 1) {?>
									<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[1] != 0 && $_smarty_tpl->tpl_vars['item3']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?>
									<div class="cre">
										<div class="cre-box cre-con">
											<p>删除</p>
											<!--<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>-->
										</div>
									</div>
									<?php } else { ?>
									<div class="cre2">
										<div class="cre-box">
											<p>删除</p>
											<!--<div class="cre-sub">
												<a href="javascript:;">修改</a>
												<a href="javascript:;">删除</a>
											</div>-->
										</div>
									</div>
									<?php }?>
									<?php }?>
									<!--<div class="sure">确认</div>
									<div class="use">使用该方案</div>-->
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
					<!--<div class="bottom-total">
						<div class="all">
							<i></i><span>全选</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[3] != 0) {?><div class="remove">删除选中的产品</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[8] != 0) {?>
						<div class="expot">
							<i></i>
							<span>导出时隐藏价格</span>
						</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[8] != 0) {?><div class="export-order">导出清单</div><?php } else { ?><div class="export-order2">导出清单</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['permissions']->value[6] != 0) {?><div class="generate-order">生成清单</div><?php } else { ?><div class="generate-order2">生成清单</div><?php }?>
						<div class="pieces">已选择0件产品</div>
						
					</div>-->
				
				</div>
				<!--这里是展示的内容二-->
				<div class="containerp" id="containerp">
					<div class="con-out" style="position: relative;">
						
					
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prolist']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
					<div class="box" data-proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['sid'];?>
">
						<a href="javascript:void(0)">
							<div class="boximg">
								<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proid2'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['smallpic'];?>
" alt="" style="height:180px"></a>
								<?php if (($_smarty_tpl->tpl_vars['project']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) || ($_smarty_tpl->tpl_vars['permissions']->value[2] != 0 && $_smarty_tpl->tpl_vars['item']->value['sp1']['userid'] == $_smarty_tpl->tpl_vars['userid']->value)) {?><label></label><?php }?>
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</p>
								<div class="sequence">
									<span><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
</span>
									<i><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
</i>
								</div>
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
		</div>

		<!--<?php echo '<script'; ?>
 type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.4.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		<!--这里是图片处理-->
		<!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/color-thief.js"><?php echo '</script'; ?>
>-->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/procoll.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<!--<scrip src="http://www.17sucai.com/preview/365714/2015-06-26/Sortabledemo1/js/jquery.sortable.js"></scrip>-->
        <?php echo '<script'; ?>
>
        
        var projectId = <?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
;
        $(".product .left .show a").keyup(function(evt){
          var text=$(this).text()
        	if(evt.keyCode==13){
        		$(this).text(text)
        		$(this).blur()
        	}
        })

             $('.detail .detail-box .detail-title .change .turn').click(function(){
             	$(window).scrollTop(0);
             	$('body').css("overflow",'hidden')
             	$('#pick-else').show()
             })
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
        
        $(".product .left .show .trun").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');
	})
        
        
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
		var fsg = true;
		$("#pick .pick-box .pick-content .pick-show .pick-right .creat .kend-box").on("click", function() {

			fsg = false;
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

				// alert("已创建这个项目");
				// return false;
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

					$('#pick .sub-item .sub-add').parent().find("input").on("keyup", function(event) {

						if(event.keyCode == 13) {

							var value = $(this).val();
							$(this).before('<div class="sub-icon">' + value + '</div>');
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
		$("#pick .pick-box .class-item a").click(function(event) {
			event.stopPropagation()
			var text = $(this).text();
			$(this).parent().prev().prev().val(text)
				$(this).siblings().find('div.class-item').slideUp()
				$(this).parent().slideUp()
		});
		
		$("#pick .pick-box .class-item").click(function(event) {
			event.stopPropagation()
			
		});
		$("#pick .pick-box .color-box a").click(function() {
			var color = $(this).css('background-color');
			$(this).parent().prev().prev().attr('style', 'background-color: ' + color + ';');
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
			$('.submit').prev('p').remove();
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
			$('.type2').val(type2);
			$('.gn_'+i).parent().prev().text(type2);
			$('.gn_'+i).parent().slideUp();

		}

		//提交表单
		$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").click(function() {

			var proid = $(".addselect").attr('proid');
			var libid = $(".addselect").attr('libid');
			$(".proid").val(proid);
			$(".libid").val(libid);

			// var tag = $('.tag1').val();
			// $('#tag').val(tag);

			//赋值颜色
			var color = $('.input-color').css('background-color');
			$('.color').val(color);

			//赋值可多选的颜色
			var colors = '';
			$('.hasColor').each(function() {
				var color = $(this).css('background-color');
				colors += color + '|';
			})
			colors = colors.substring(0, colors.length - 1);
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

			$(this).attr("disabled", "true"); //设置变灰按钮

			// var productId = $('#productId').val();
			// if(productId != '') {

			// 	$('#addPro').attr('action', '/member/editProduct');

			// } else {

				$('#addPro').attr('action', '/member/addProduct');

			// }

			$('.submit').prev('p').remove();
			$('#addPro').ajaxSubmit({

				success: function(ret) {

					setTimeout("$('.submit button').removeAttr('disabled')", 3000);

					var jsonarray = eval('(' + ret + ')');
					var msg = jsonarray.msg;
					var code = jsonarray.code;
					var proid2 = jsonarray.proid;
					if(code != 200) {

						$('.submit').prev('p').remove();
						$('.submit').before(msg);
						return false;

					}

					if(proid != projectId) {
        				window.location.href='/library/project_product_add/'+projectId+'/'+proid2+'?issee='+<?php echo $_smarty_tpl->tpl_vars['issee']->value;?>
;
        			}else{
        				window.location.reload();
        			}
				},
				error: function() {
					setTimeout("$('.submit button').removeAttr('disabled')", 3000);
					$('.submit').prev('p').remove();
					$('.submit').before('<p>网络异常，请稍后再试</p>');
					return false;
				}

			})

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
			var n = 0;

			function uploads(obj) {
				//alert(obj.files.length);
				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {
					n = obj.files.length;
					k = $(".upcov").length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));
						//txt = txt.split("")
//						console.log(url);
						html += '<li class="tu"><div class="bg" style="background:url(' + url + ') no-repeat center;background-size:cover"></div><i></i><em></em></li>';
					}
					
					$('#config').addClass('big')
					$('#config .config-box .content span').click(function(){
						$('#config').removeClass('big');
						obj.outerHTML = obj.outerHTML;
//						obj.parentNode.outerHTML = obj.parentNode.outerHTML;
//						$(obj).parent().find('input').remove()
//                       $('.product .left .item ul li').eq(0).append("<input type='file' class='upcov' name='cover_"+(k+1)+"' onchange='uploads(this)'>")
					})
					$('#config .config-box .content button').click(function(){
						var lengs=$('.product .left .item ul li.increase').size()
						if(lengs>1){
							$('.product .left .item ul li.increase').eq(0).remove()
							$('#config').removeClass('big');
						$(obj).parent().hide();
					   $(".product .left .item ul li:first").before("<li class='increase' id='upload'><input type='file' class='upcov' name='cover_"+k+"' onchange='uploads(this)'></li>")
					   $(".product .left .item ul").append(html);
					   $(".product .left .item ul li").eq(-2).remove()
					   $('.product .left .item ul li em').animate({width:'100%'},1000)
					   $('.product .left .item form').submit()
						}else{
							$('#config').removeClass('big');
						$(obj).parent().hide();
					   $(".product .left .item ul li:first").before("<li class='increase' id='upload'><input type='file' class='upcov' name='cover_"+k+"' onchange='uploads(this)'></li>")
					   $(".product .left .item ul").append(html);
					   $('.product .left .item ul li em').animate({width:'100%'},1000)
					   $('.product .left .item form').submit()
						}
						
					   
					})
					
				}
				
				$('.product .left .item ul li .bg').click(function(){
					var url=$(this).get(0).style.background
//					console.log(url);
					$('.product .left .show').css('background',url)
					$('.product .left .show').css('backgroundSize','contain')
				})
				//这里是删除图片
				$('.product .left .item ul li i').click(function(){
					var index=$(this).parent().index()
					var total=$('.product .left .item ul li').size()
					var length=$('.product .left .item ul li.increase').size()
//					console.log(index)
					if(length>1){
						if(total==(index+1)){	
						$(this).parent().remove();
					$('.product .left .item ul li.increase').eq(total-index).remove()
					$('.product .left .item ul li.increase').eq(0).css('display','block')
						}else{
						$(this).parent().remove();
					    $('.product .left .item ul li.increase').eq(total-index).remove()
						}
						
					}else{
						$(this).parent().remove();
					}
					
				})
				
				$('.product .left .item button').click(function(){
					  $('.product .left .item ul li em').animate({width:'100%'},1000)
				})
				
				
			}
			
			
			$('.product .left .item ul li .bg').click(function(){
					var url=$(this).get(0).style.background
//					console.log(url);
					$('.product .left .show').css('background',url)
					$('.product .left .show').css('backgroundSize','contain')
				})
				//这里是删除图片
				$('.product .left .item ul li i').click(function(){
					var index=$(this).parent().index()
					var total=$('.product .left .item ul li').size()
					var length=$('.product .left .item ul li.increase').size()
//					console.log(index)

					var proid = $('#proid1').val();
					$.ajax({
						url: '/ajax/del_project_cover',
						type: 'POST',
						async: true,
						data: {
							proid: proid,
							index: index
						},
						timeout: 5000,
						dataType: 'json',
						success: function(data){
							//console.log(data);
							//location.reload();
						}
					});

					if(length>1){
						
						if(total==(index+1)){	
						$(this).parent().remove();
					$('.product .left .item ul li.increase').eq(total-index).remove()
					$('.product .left .item ul li.increase').eq(0).css('display','block')
						}else{
						$(this).parent().remove();
					$('.product .left .item ul li.increase').eq(total-index).remove()
						}
						
					}else{
						$(this).parent().remove();
					}
					
				})
				

//				$('.product .left .item ul li .bg').click(function(){
//					var url=$(this).get(0).style.background.split('"')[1]
//					console.log(url);
//					$('.product .left .show img').attr('src',url)
//				})
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
			 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
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
						//               var index = boxheight.indexOf(minBoxHeight);
						var index = getIndex(boxheight, minBoxHeight);
						box[i].style.top = (minBoxHeight + 20) + "px";
						box[i].style.left = (box[index].offsetLeft - 10) + "px";
						//把盒子的高度加回去
						boxheight[index] = boxheight[index] + box[i].offsetHeight + 20;
					}
				}

				btn.style.top=(box[box.length - 1].offsetTop + box[box.length - 1].offsetHeight + 20)+"px";

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
	                  // alert(msg);
	                  $('#win').css('display',"block").addClass('anima');
        			  $('#win').find('span').text(msg).css({position:'absolute',top:'75px',left:'90px'});
	                  if(code == 200) {
	                 	 window.location.reload();
	              	  }

               		}

				}

			});

		}
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
	
		window.onload=function(){
			
		    var piece=0
		    var moneytotal=0
			 var lasttotal= $('.containerp .box').size()
		      var lstatop=$('.containerp .box').eq(lasttotal-1).get(0).offsetTop;
		      $('.containerp .con-out').css("height",(lstatop+350)+"px")
		      
		      //计算一共多少件
		      
//		    var litotal=$('.detail .detail-box .detail-item ul li').size()
//		    for (var i=0;i<litotal;i++) {
//		    	
//		    	 piece+=parseInt($('.detail .detail-box .detail-item ul li .jia-item p').eq(i).text())
//		    	 moneytotal+=parseInt($('.detail .detail-box .detail-item ul li .author .flo').get(i).innerText.replace(/\s+\￥/g,""))
//		    }
//		    
//		    console.log(moneytotal)
//		   $('.detail .detail-box .detail-item .thead .adjust span').text("共"+piece+"件")
//		   $('.detail .detail-box .detail-item .thead .offer span').text("￥"+moneytotal)
		    
		   }
		
		<?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
>
			$("#moveleave .litext a").click(function(){
				var id = $(this).parent().parent().attr('data-id');
				var reply=$(this).parent().find('span').text();
				var uid = $(this).attr('data-uid');
				$(this).parents(".moveleave").find('#comment').val("回复 "+reply+"：")
				$('#touserid2').val(uid);
			})
			$("#moveleave .litext label").click(function(){
				var id = $(this).parent().parent().attr('data-id');
				$.ajax({
					url: '/ajax/del_project_comment',
					type: 'POST',
					async: true,
					data: {
						id: id
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
						$(this).parents("li").remove();
					}
				});
			})
			
			$(".detail .detail-box .detail-item .bottom-total .remove").click(function(){
					$('#config').addClass('big')
			})
			$("#config .config-box .content span").click(function(){
					$('#config').removeClass('big')
			})
			
		<?php echo '</script'; ?>
>
		
		<?php echo '<script'; ?>
 type="text/javascript">
		//			$(function() {
		//				DesignLibrary.Init();
		//			});

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
			
			var selectedFile=''
			var imgtag = document.getElementById("upImage");
			var selectedFile = event.target.files[0];
			var reader = new FileReader();
			imgtag.title = selectedFile.name;
			reader.onload = function(event) {
				imgtag.src = event.target.result;
			};
			reader.readAsDataURL(selectedFile);
			imgtag.style.display = "block";

		 var m=setTimeout(function() {
				var imgwidth = imgtag.offsetWidth;
				var imgheight = imgtag.offsetHeight;

				if(imgwidth >= imgheight) {
					imgtag.style.height = (imgheight * 230 / imgwidth) + 'px';
					document.getElementById("upImage").style.width = '230px'
				} else {
					imgtag.style.height = (imgheight * 230 / imgwidth) + 'px';
					document.getElementById("upImage").style.width = '230px'
				}
//				console.log(imgwidth)
			}, 500);
			
			
			$('#pick .pick-box .pick-content .pick-title i').click(function(){
				$('#pick .chooseImage img').css('display','none')
			})

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

		//添加产品
		function addImages() {

			var images = $('.product .left .show').attr('style');
			// console.log(images);
		    var bgimg=images.slice((images.indexOf("(")+2),(images.indexOf(")")-1))
		    $('#image').val(bgimg);
		    	// console.log(bgimg)
		    	$('#pick .pick-box .pick-content .pick-show .pick-left .back-one .img-load .chooseImage img').attr('src',bgimg);

		    	$('.submit').prev('p').remove();
  //搜索所有的材思库，并赋值
  $('#pick .pick-box .pick-content .pick-show .pick-right .submit').prev('p').remove();
  
     var imgtag=document.getElementById("upImage")
//    imgtag.style.display = "block";

		 var m=setTimeout(function() {
				var imgwidth = imgtag.offsetWidth;
				var imgheight = imgtag.offsetHeight;

				if(imgwidth >= imgheight) {
					imgtag.style.height = (imgheight * 230 / imgwidth) + 'px';
					document.getElementById("upImage").style.width = '230px'
				} else {
					imgtag.style.height = (imgheight * 230 / imgwidth) + 'px';
					document.getElementById("upImage").style.width = '230px'
				}
//				console.log(imgwidth)
			}, 500);
			
  
  
  
  $.ajax({
          url:'/library/getLibraryList',
          type:"post",
          success:function(ret){

            $('.select-box').empty();

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var library = jsonarray.library;
                  var html = '';
                  var count = library.length;
                  for(var i=0; i<count; i++){

                    var libid = library[i].libid;
                    var libname = library[i].libname;
                    var project = library[i].project;
                    var sum = project.length;

                    html += '<div class="item library_'+libid+'"><p>'+libname+'</p><i onClick="showHide('+libid+')"></i>';
                    html += '<div class="sub-item">';
                        for(var n=0; n<sum; n++){
                     html += '<div class="project_'+project[n].proid+' sub-icon project" proid="'+project[n].proid+'" libid="'+libid+'" onClick="changeProject('+project[n].proid+')">'+project[n].proname+'</div>';
                     }

                     // <div class='item'><p>" + values + "</p><i></i><div class='sub-item'><div class='sub-add'>添加区域</div></div></div>
                    html += '<div class="sub-add addProject_'+libid+'" onClick="addProject('+libid+')">添加区域</div>';
                    html += '</div>';
                    html += '</div>';
                }

               $('.select-box').html(html);
                var proid = <?php echo $_smarty_tpl->tpl_vars['project']->value['proid'];?>
;
				$('.project_'+proid).addClass('addselect');

            }

          },   
          error:function(){  

              $('.submit').before('<p>网络异常，请稍后再试</p>');
              return false;

          }
      })
			
		}
	<?php echo '</script'; ?>
>
	
	</body>

</html><?php }
}
