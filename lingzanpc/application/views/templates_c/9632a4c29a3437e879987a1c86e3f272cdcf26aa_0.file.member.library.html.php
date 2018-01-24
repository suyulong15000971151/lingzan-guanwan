<?php
/* Smarty version 3.1.30, created on 2018-01-19 16:24:01
  from "D:\lingzanpc\application\views\templates\member\member.library.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a61ab21027f92_45084836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9632a4c29a3437e879987a1c86e3f272cdcf26aa' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\member\\member.library.html',
      1 => 1516348067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a61ab21027f92_45084836 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/selflibrary.css" />
<!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/zcity.css" /> -->

<style>
#edit .edit-box .edit-content .edit-container .form-one .img-load i{display: inline-block; width: 12px; height: 12px; position: absolute; right: 5px; top: 5px; background: url(<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/delete_03.png) no-repeat; background-size: 100% 100%;}
.man-sub{width:100%;height:60px;overflow: hidden;text-align: center;line-height: 60px;font-size: 16px;}
.man-sub a{display: inline-block;padding:0 10px;color:#afafaf}
.man-sub a.actv{color:#000}
#man-box{margin:0 auto 0}
</style>

	<body>
		<!--这里是创建项目弹窗-->
		<div id="pick">
			<div class="pick-box">
				<div class="pick-content">
					<div class="pick-title">
						<span>创建项目</span>
						<i></i>
					</div>
					<div class="pick-show">
						<form class="form-one" id="addLib" enctype="multipart/form-data" method="post" action="/member/addLibrary">
							<!-- <input type="hidden" name="tag" id="tag"/> -->
							<input type="hidden" class="input libid" name="libid" />
							<input type="hidden" class="input libname1" name="libname" />
							<input type="hidden" class="input address" name="address" />
							<!-- <input type="hidden" class="input city1" name="city" /> -->
							<input type="hidden" class="areayCode" name="areayCode" value="<?php echo $_smarty_tpl->tpl_vars['areayCode']->value;?>
"/>
							<input type="hidden" class="countyCode" name="countyCode" value="<?php echo $_smarty_tpl->tpl_vars['countyCode']->value;?>
"/>
							<input type="hidden" id="province" name="province" value=""/>
							<input type="hidden" id="quyu" name="quyu" value=""/>
							<input type="hidden" id="county" name="county" value=""/>
							<input type="hidden" class="input type11" name="type1" />
							<input type="hidden" class="input status1" name="status" />
							<input type="hidden" class="input isshow1" name="isshow" />
							<div class="pick-left">
								<div class="img-load">
									<p>本地上传</p>
									<input type="file" multiple="true" id="btn" name="pic" onchange="uploads(this)">
								</div>
								<!--<div class="title-item">
									<span>*</span>
							
									<input type="text" placeholder="名称" id="libname" name="libname" style="width:100%;opacity: 1;" />
								</div>
								<div class="title-item">
									<span>*</span>
									<i></i>
									<div class="classif">
									
										<input type="hidden" id="type1" name="type1" />
										<p>分类</p>
										<div class="class-item">
										
											<a href="javascript:void(0)">会所</a>
											<a href="javascript:void(0)">餐饮</a>
											<a href="javascript:void(0)">宾馆</a>
											<a href="javascript:void(0)">公共</a>
											<a href="javascript:void(0)">商业</a>
											<a href="javascript:void(0)">私宅</a>
										</div>
									</div>
								</div>-->
								<textarea name="desc" rows="" cols="" placeholder="描述" class="desc" style="width:180px; height:120px; margin-left:35px;"></textarea>
							</div>
						</form>
						<div class="pick-right">
							<!--<div class="label">
								<input type="text" placeholder="输入文字按空格或回撤以生成标签" name="tag" class="tag1"/>
							</div>-->
							<div class="form-box">
								<div class="item">
									<label for="name">名称：</label>
									<input type="text" class="input" id="libname" name="libname" />
								</div>
								
								<div class="item">
									<!-- <input type="hidden" class="input" id="city" name="city"/> -->
									<label for="name">地区：</label>
									<div class="place">
										<!-- <select id="s_province" name="s_province"></select>  
                                        <select id="s_city" name="s_city" ></select>  
                                        <select id="s_county" name="s_county"></select> 
                                        <?php echo '<script'; ?>
 class="resources library" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/area.js" type="text/javascript"><?php echo '</script'; ?>
>
                                        
                                       <?php echo '<script'; ?>
 type="text/javascript">_init_area();<?php echo '</script'; ?>
>-->
										<select id="s_province"  name="province" class="province" onChange="selectCity(2)">
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
										<select id="s_city" name="quyu" class="quyu" onChange="selectCity(3)">
											<option value="0">请选择市/区/县</option>
										</select>
										<select id="s_county" name="county" class="county">
											<option value="0">请选择区/县</option>
										</select>
									</div>
								</div>
								<div class="item">
									<label for="name">地址：</label>
									<input type="text" class="input" id="address" name="address"/>
								</div>
								<div class="item">
									<label for="name">分类：</label>
									<div class="sort">
										<span>*</span>
									    <i></i>
									  <div class="classif">
										<!-- <input type="text" /> -->
										<input type="hidden" id="type1" name="type1" class="itemize" />
										<p class="fenleitype">分类</p>
										<div class="class-item">
											<!-- <a href="javascript:void(0)">房产公司</a>
											<a href="javascript:void(0)">酒店宾馆</a>
											<a href="javascript:void(0)">公共设施</a>
											<a href="javascript:void(0)">餐饮会所</a>
											<a href="javascript:void(0)">商业办公</a>
											<a href="javascript:void(0)">私人业主</a> -->
											<a href="javascript:void(0)">会所</a>
											<a href="javascript:void(0)">餐饮</a>
											<a href="javascript:void(0)">宾馆</a>
											<a href="javascript:void(0)">公共</a>
											<a href="javascript:void(0)">商业</a>
											<a href="javascript:void(0)">私宅</a>
										</div>
									  </div>
									</div>
								</div>
								<div class="item">
									<label for="name">状态：</label>
									<div class="sort states">
										<div class="radio-ck">
											<em class="ck"></em><b>设计中</b>
										</div>
										<div class="radio-ck">
											<em></em><b>生产中</b>
										</div>
										<div class="radio-ck">
											<em></em><b>已完成</b>
										</div>
									</div>
								</div>
								<div class="item">
									<label for="name">权限：</label>
									<div class="power">
										<div class="radio-ck">
											<em class="ck"></em><b>保密</b>
										</div>
										<div class="radio-ck">
											<em></em><b>开放</b>
										</div>
									</div>
								</div>
								
								
								
							</div>
							<div class="submit">
								<a class="deleteLib" href="javascript:;">删除项目</a>
								<button> 确认上传</button>
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

		<!--这里是编辑项目弹窗-->
		<div id="edit">
			<div class="edit-box">
				<div class="edit-content" style="height:750px;">
					<div class="title">
						<span>编辑项目</span>
						<i></i>
					</div>
					<div class="edit-container">
						<form class="form-one"  method="post" action="/member/editLibrary" id="editLib">
						<input name="frames" type="hidden" value="yes" />
						<input type="hidden"  class="libid" name="libid" value=""/>
						<div class="img-load" style=" width: 100%; height: 180px; margin: 5px auto 5px; overflow: hidden; position: relative;box-sizing: border-box;border:1px solid #ccc">
							<p style=" width: 100px; color: #fff; text-indent: 0; height: 40px; background: #055cfc; line-height: 40px; text-align: center; margin: 50px auto 0; font-size: 15px; font-weight: 400;">本地上传</p>
							<input type="file" multiple="true" id="btn" name="pic" onchange="uploadss(this)" style="width: 100%; height: 40px; outline: none; border: none; position: absolute; display: block; top: 50px; opacity: 0;">
						</div>
						<div class="edit-item">
							<!--<label for="">名称：</label>-->
							<div class="item-con"><input type="text"  class="libname" name="libname" placeholder="项目名称"/></div>
						</div>
						<div class="edit-item">
							<input type="hidden" name="type1" class="type1" placeholder="项目分类">
							<!--<label for="">分类：</label>-->
							<div class="item-con"><span>*</span><i></i>
								<div class="sort type1Selected">项目分类</div>
								<div class="sele-edit editType1">
									<!-- <a href="javascript:void(0)">房产公司</a>
									<a href="javascript:void(0)">酒店宾馆</a>
									<a href="javascript:void(0)">公共设施</a>
									<a href="javascript:void(0)">餐饮会所</a>
									<a href="javascript:void(0)">商业办公</a>
									<a href="javascript:void(0)">私人业主</a> -->
									<a href="javascript:void(0)">会所</a>
									<a href="javascript:void(0)">餐饮</a>
									<a href="javascript:void(0)">宾馆</a>
									<a href="javascript:void(0)">公共</a>
									<a href="javascript:void(0)">商业</a>
									<a href="javascript:void(0)">私宅</a>
								</div>
							</div>
						</div>
						
						<div class="edit-item">
							<input type="hidden" name="status" id="status" placeholder="项目状态"/>
							<!--<label for="">状态：</label>-->
							<div class="item-con"><span>*</span><i></i>
								<div class="sort status">项目状态</div>
								<div class="sele-edit editStatus">
									<a href="javascript:void(0)">设计中</a>
									<a href="javascript:void(0)">生产中</a>
									<a href="javascript:void(0)">已完成</a>
								</div>
							</div>
						</div>
						<div style="margin-top:10px;margin-bottom:10px">
							<!--<label for="" style="display:block;float:left;">描述：</label>-->
							<textarea name="desc" rows="" cols="" placeholder="项目简介" id="desc" style="width:100%; height:120px; float:left; margin-bottom:10px;"></textarea>
						</div>
						<div class="edit-item power">
							<!--<label for="">权限：</label>-->
							<div class="item-con"><input type="radio" class="isshow" name="isshow" value="1" /> 项目发布到公告栏 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="isshow" class="isshow" value="0"/> 不发布 </div>
						</div>
						</form>
						<div class="edit-item delete">
							<div class="item-con deleteLib"><em>删除项目</em></div>
						</div>

						<button class="saves">编辑保存</button>
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
		<!--这里是确认弹窗-->
        <div id="config">
        	<div  class="config-box">
        		<div class="content">
        			<div class="title">删除该项目，会把它的子项目一起删除，您确定要删除吗?</div>
        			<span>取消</span>
        			<button type="submit">确定</button>
        		</div>
        	</div>
        </div>
		<!--这里是个人简介-->
		<div class="manpeople">
			<div class="man-box">
				<div class="potato">
					<img src="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
" />
				</div>
				<div class="explain">
					<h2><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['nickname'];?>
</h2>
					<p><?php if ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 10 || $_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 20) {?><i></i><?php }?><span><?php if ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 1) {?> 男 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 2) {?> 女 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['sex'] == 0) {?> 保密 <?php }?> <?php echo $_smarty_tpl->tpl_vars['address']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 0) {?> 普通用户 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 10) {?> 设计师 <?php } elseif ($_smarty_tpl->tpl_vars['userInfo']->value['groupid'] == 20) {?> 品牌 <?php }?></span></p>
					<strong><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['signature'];?>
</strong>
				</div>
			</div>
		</div>
		<!--这里是个人内容导航-->
		<div class="man-nav">
			<div class="navigation">
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/library" class="man-act">
				<?php } else { ?>
				<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="man-act">
				<?php }?>
					<span><?php echo $_smarty_tpl->tpl_vars['count']->value['sLibCount']+$_smarty_tpl->tpl_vars['count']->value['pLibCount']+$_smarty_tpl->tpl_vars['count']->value['fLibCount'];?>
</span>
					<p>项目</p>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/collection">
				<?php } else { ?>
				<a href="/member/collection/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
				<?php }?>
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['productcount'];?>
</span>
					<p>产品</p>
				</a>
				<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
				<a href="/member/note">
				<?php } else { ?>
				<a href="/member/note/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
				<?php }?>
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['notecount']+$_smarty_tpl->tpl_vars['count']->value['fNotCount'];?>
</span>
					<p>笔记</p>
				</a>
				<a href="/member/friend/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" >
					<span><?php echo $_smarty_tpl->tpl_vars['userInfo']->value['followcount']+$_smarty_tpl->tpl_vars['userInfo']->value['fanscount']+$_smarty_tpl->tpl_vars['userInfo']->value['friendcount'];?>
</span>
					<p>人脉</p>
				</a>
			</div>
		</div>
		<div class="man-sub">
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<a href="/member/library" class="actv">我的项目</a>
			<?php } else { ?>
			<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" class="actv">他的项目</a>
			<?php }?>
			<a href="/member/partInProject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">参与项目</a>
			<a href="/member/follproject/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">关注项目</a>
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<form action="/member/library" method="get">
			<?php } else { ?>
			<form action="/member/library/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
" method="get">
			<?php }?>
				<div class="sub-sear">
					<button></button>
					<input type="text" placeholder="输入搜索" name="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
"/>
				</div>
			</form>
		</div>
		<div id="man-box">
		<div class="man-show" id="man-show">
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" />
			<input type="hidden" id="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
" />
			<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
			<div class="man-item create" onClick="createWindowOpen()">
				<p>创建项目</p>
			</div>
			<?php }?>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['library']->value['list'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="man-item">
				<div class="item-box">
					<a href="/member/selflibrarytow/<?php echo $_smarty_tpl->tpl_vars['item']->value['libid'];?>
/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
">
						<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['libname'];?>
</h4>
						<div class="big-img"><?php if ($_smarty_tpl->tpl_vars['item']->value['cover'] != '') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
" alt="" /><?php } else { ?> <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="" /> <?php }?></div>
						<!-- <div class="small">
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['pic'][0])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'][0];?>
" alt="" /><?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['pic'][1])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'][1];?>
" alt="" /><?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['item']->value['pic'][2])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'][2];?>
" alt="" /><?php }?>
						</div> -->
					</a>
					<?php if ($_smarty_tpl->tpl_vars['userInfo']->value['userid'] == $_smarty_tpl->tpl_vars['userid']->value) {?>
					<div class="edit" onClick="editLibrary(<?php echo $_smarty_tpl->tpl_vars['item']->value['libid'];?>
)">编辑</div>
					<div class="region"><a href="/member/selflibrarytow/<?php echo $_smarty_tpl->tpl_vars['item']->value['libid'];?>
/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
?create=1">创建区域</a></div>
					<?php }?>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
				<div class="state design">设计中</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status'] == 2) {?>
				<div class="state production">生产中</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status'] == 3) {?>
				<div class="state win">已完成</div>
				<?php }?>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		</div>
		</div>
       
		<!--<?php echo '<script'; ?>
 type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>-->
		 
		
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/selflibrary.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery-form.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			// var Gid  = document.getElementById ;
   //          var showArea = function(){
	  //       Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	
	  //       Gid('s_city').value + " - 县/区"
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			$("#pick .pick-right .form-box .item .sort").click(function(evt){
				evt.stopPropagation()
				$(this).find(".class-item").slideToggle()
			})
			$("#pick .pick-right .form-box .item .sort a").click(function(){
				var textt=$(this).text()
				$(this).parents('.classif').find("p").text(textt)
//				$(this).parent().slideUp()
			})
			
			$(document).on("click",function(evt){
				evt.stopPropagation()
				$('#pick .pick-right .form-box .item .sort .class-item').slideUp()
			}
			)
		<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		
		$("#pick .item .power .radio-ck").click(function(){
			$(this).find("em").addClass("ck")
			$(this).siblings().find("em").removeClass("ck")
			var isshow1  =  $(this).find("b").text();
			if(isshow1 == '开放') {
				$('.isshow1').val('1');
			}else{
				$('.isshow1').val('0');
			}

		})
		
		$("#pick .sort .radio-ck").click(function(){
			$(this).find("em").addClass("ck")
			$(this).siblings().find("em").removeClass("ck")
			var status1  =  $(this).find("b").text();
			$('#status').val(status1);

		})
		

			//创建项目弹窗
			function createWindowOpen() {

				$('.submit').prev('p').remove();
                $("#pick .pick-box .pick-content .pick-show .pick-right .submit button").text('确认上传');
                $("#pick .pick-box .pick-content .pick-show .pick-right .submit button").removeClass("put")
		        $("#pick .pick-box .pick-content .pick-show .pick-right .submit a").css("display", "none")
		        $("#pick .pick-box .pick-content .pick-title span").text("创建项目")
				$('.submit').prev('p').remove();
				$('.img-load p').attr('style','display:block;');
				$('.img-load .imgBox').remove();
				$('.img-load i').remove();
				$('#libname').val('');
				$('#address').val('');
				$('#type1').val('');
				$('#type1').next('p').text('分类');

				$('#pick .item .sort .radio-ck').find('em').removeClass('ck');
	            $('#pick .item .sort .radio-ck:eq(0)').find('em').addClass('ck');
	            $('#status').val('设计中');

	            $('#pick .item .power .radio-ck').find('em').removeClass('ck');
	            $('#pick .item .power .radio-ck:eq(0)').find('em').addClass('ck');
	            $('.isshow1').val('1');

				$('.desc').val('');
				$('.tag1').val('');
				$('.libid').val('');
				$(".province option").attr("selected",false);
	            $(".quyu option").attr("selected",false);
	            $(".county option").attr("selected",false);

			}

			//瀑布流点击编辑项目弹框
			function editLibWinOpen(libid) {
				$(window).scrollTop(0);
				var parent = $(this).offsetParent();
				$("body").css("overflow", "hidden");
				$('#pick').show();

				editLibrary(libid);
			}

			function editLibrary(libid) {

				$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").text('确认上传');
				$('.submit').prev('p').remove();
				$.ajax({
	              url:'/member/getlibraryInfo',
	              type:"post",
	              data:{libid:libid},
	              success:function(ret){

	                  if(ret != ''){

	                      var jsonarray = eval('('+ret+')');
	                      var msg = jsonarray.msg;
	                      var code = jsonarray.code;
	                      if(code != 200) {
	                      	alert(msg);
	                      	return false;
	                      }
	                      $("#pick .pick-box .pick-content .pick-show .pick-left .img-load .imgBox").remove();
	                      $("#pick .pick-box .pick-content .pick-show .pick-left .img-load i").remove();
	                      $("#pick .pick-box .pick-content .pick-show .pick-left .img-load p").show();
	                       if(msg.cover != '') {
	                       	 var html = "<div class='imgBox'><div class='bg' style='background:url(" + msg.cover + ") no-repeat center;background-size:cover'></div></div><i></i>";
	                       	$("#pick .pick-box .pick-content .pick-show .pick-left .img-load p").hide();
	                       	$('#pick .pick-box .pick-content .pick-show .pick-left .img-load').append(html);
	                       	$("#pick .pick-box .pick-content .pick-show .pick-left .img-load i").click(function(event) {
								//		event.stopPropagation()
								//		alert(0)
								$("#pick .pick-box .pick-content .pick-show .pick-left .img-load .imgBox").remove();
								$("#pick .pick-box .pick-content .pick-show .pick-left .img-load p").show();
								$(this).remove()

							})
	                       }

	                       $('.libid').val(libid);
	                       $('.desc').val(msg.desc);
	                       $('#libname').val(msg.libname);
	                       $('#address').val(msg.address);
	                       $('.fenleitype').text(msg.type1);

	                       // $('.type11').val(msg.type1);
	                       $('#type1').val(msg.type1);
	                       $('.isshow1').val(msg.isshow)

	                        $('#pick .item .sort .radio-ck').find('em').removeClass('ck');
	                       if(msg.status == 1) {

	                      	 $('#pick .item .sort .radio-ck:eq(0)').find('em').addClass('ck');
	                      	 $('#status').val('设计中');
	                      }
	                      if(msg.status == 2) {

	                      	  $('#pick .item .sort .radio-ck:eq(1)').find('em').addClass('ck');
	                      	  $('#status').val('生产中');
	                      }
	                      if(msg.status == 3) {

	                      	 $('#pick .item .sort .radio-ck:eq(2)').find('em').addClass('ck');
	                      	 $('#status').val('已完成');
	                      }

	                      $('#pick .item .power .radio-ck').find('em').removeClass('ck');
	                      if(msg.isshow == 1) {
	                      	$('#pick .item .power .radio-ck:eq(1)').find('em').addClass('ck');
	                      }else{
	                      	$('#pick .item .power .radio-ck:eq(0)').find('em').addClass('ck');
	                      }

	                     $(".province option").attr("selected",false);
	                     $(".quyu option").attr("selected",false);
	                     $(".county option").attr("selected",false);
	                     var areayCode = $('.areayCode').val(msg.areayCode);
						 var countyCode = $('.countyCode').val(msg.countyCode);

	                     $(".province option[value='"+msg.cityCode+"']").attr("selected",true);
	                     selectCity(2);

	                     $('.deleteLib').attr('onClick','deleteLib('+libid+')');

	                   }

	              },   
	              error:function(){  
	                  alert('网络异常，请稍后再试');
	                  return false;
	              }

	          	})

			}

			//添加材思库，选择空间风格
			$("#pick .pick-box .class-item a").click(function() {
				var text = $(this).text();
				$(this).parent().prev().prev().val(text)
			});


			//添加材思库，提交表单
			$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").click(function() {

				$(this).text("正在上传中。。。").attr("disabled","true"); //设置变灰按钮

				var libname = $('#libname').val();
				$('.libname1').val(libname);
				var address = $('#address').val();
				$('.address').val(address);
				var city = $('#city').val();
				$('.city1').val(city);
				var type1 = $('#type1').val();
				$('.type11').val(type1);
				var status = $('#status').val();
				$('.status1').val(status);

				var province = $('.province').val();
				var quyu = $('.quyu').val();
				var county = $('.county').val();
				$('#province').val(province);
				$('#quyu').val(quyu);
				$('#county').val(county);


				$('.submit').prev('p').remove();

				var libid = $('.libid').val();
				if(libid != '') {
					$('#addLib').attr('action','/member/editLibrary');
				}else{
					$('#addLib').attr('action','/member/addLibrary');

				}

				$('#addLib').ajaxSubmit({

		        success:function(ret){

		            setTimeout("$('.submit button').removeAttr('disabled')",3000);
		            var jsonarray = eval('('+ret+')');
		            var msg = jsonarray.msg;
		            var code = jsonarray.code;
		            if(code != 200){
		            	$('.submit').prev('p').remove();
		            	$('.submit').before(msg);
		            	$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").text("确认上传").attr("disabled","false"); //设置变灰按钮
		              	return false;

		            }

		            $('#pick .pick-box .pick-right .anima-lo').css('display','block');
		            $('#pick').hide();
	                $('#win').css('display',"block").addClass('anima');
	                $('#win').find('span').text('添加成功').css({position:'absolute',top:'75px',left:'90px'});
               		window.location.href = "/member/library"; 

		        },   
		        error:function(){  

		          setTimeout("$('.submit button').removeAttr('disabled')",3000);
		          $('.submit').prev('p').remove();
		          $('.submit').before('<p>网络异常，请稍后再试</p>');
		          return false;
		        }

		      })

			})

			//编辑材思库
			$('.saves').click(function(){

				$(this).text("正在上传中。。。").attr("disabled","true"); //设置变灰按钮
				$('.saves').prev('p').remove();
				$('#editLib').ajaxSubmit({

		        success:function(ret){

		            setTimeout("$('.saves').removeAttr('disabled').text('编辑保存')",3000);
		            var jsonarray = eval('('+ret+')');
		            var msg = jsonarray.msg;
		            var code = jsonarray.code;
		            if(code != 200){

		            	$('.saves').prev('p').remove();
		            	$('.saves').before(msg);
		              	return false;

		            }

		            $('#win .win-box .com span').html('编辑成功').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
					$('#win').css('display',"block").addClass('anima');
		            window.location.reload();

		        },   
		        error:function(){  

		          setTimeout("$('.saves').removeAttr('disabled').text('编辑保存')",3000);
		          $('.saves').prev('p').remove();
		          $('.saves').before('<p>网络异常，请稍后再试</p>');
		          return false;
		        }

		      })

			})

			//选择风格
			$('.editType1 a').click(function(){
				var type1 = $(this).text();
				$('.type1').val(type1);
			})

			//选择状态
			$('.editStatus a').click(function(){
				var status = $(this).text();
				$('#status').val(status);
			})

			//这里是上传照片		
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
			<div class='bg' style='background:url(` + url + `) no-repeat center;background-size:cover'>
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

			//这里是上传照片		
			var n = 0;
			function uploadss(obj) {

				if(!obj.value.match(/.jpg|.gif|.png|.bmp/i)) {
					alert("请选择图片文件！");
				} else {
					n = obj.files.length;
					var html = "";
					for(var i = 0; i < n; i++) {
						var url = window.URL.createObjectURL(obj.files[i]);
						var txt = obj.files[i].name.split(judge(obj.files[i]));

						console.log(url);
						html += "<div class='imgBox'><div class='bg' style='background:url(" + url + ") no-repeat center;background-size:cover'></div></div><i></i>";
					}

					$("#edit .edit-box .edit-content .edit-container .form-one .img-load .imgBox").remove()
					$("#edit .edit-box .edit-content .edit-container .form-one .img-load p").hide();
					$("#edit .edit-box .edit-content .edit-container .form-one .img-load").append(html);
				}

				$("#edit .edit-box .edit-content .edit-container .form-one .img-load i").click(function(event) {

					$("#edit .edit-box .edit-content .edit-container .form-one .img-load .imgBox").remove();
					$("#edit .edit-box .edit-content .edit-container .form-one .img-load p").show();
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

			//删除材思库
			function deleteLib(libid) {

				$('#config').addClass('big');
				$('#config .config-box .content button').remove();
				$("#config .config-box .content span").after('<button type="submit">确定</button>');

				$('#config .config-box .content span').click(function(){
					$('#config').removeClass('big');
					$('#config .config-box .content button').remove();
				})
				$('#config .config-box .content button').click(function(){
					$('#config').removeClass('big');
					$(this).remove();
					delLibrary(libid);

				})

			}

			function delLibrary(libid){
				$.ajax({
	              url:'/member/delLibrary',
	              type:"post",
	              data:{libid:libid},
	              success:function(ret){

	                  if(ret != ''){

	                      var jsonarray = eval('('+ret+')');
	                      var msg = jsonarray.msg;
	                      var code = jsonarray.code;
	                      if(code != 200) {

	                      	$('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
							$('#win').css('display',"block").addClass('anima');
	                      	window.location.reload();
	                      }else{

	                      	$('#win .win-box .com span').html('删除成功').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
								$('#win').css('display',"block").addClass('anima');
	                      	window.location.reload();
	                      }

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
		/*
		 * 瀑布流的原理：
		 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
		 *
		 * */
	
		function imgsize(){

			$('img').css('opacity','1')

		}

		var container = document.getElementById("man-show");
		// var btn = document.getElementsByClassName("add-btn").item(0);
		var index = 0;
		window.onload = function() {
			imgsize()

		};

		//过滤的形式
		function getIndex(boxArr, minIndex) {
			for(var i = 0; i < boxArr.length; i++) {
				if(boxArr[i] == minIndex) {
					return i;
				}
			}
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
					// waterfull();
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
						var seachWord = $('#seachWord').val();
						var str = '';
						$.ajax({
							// url: '/member/getLibraryContent',
							url: '/member/getDataList',
							type: 'POST',
							async: true,
							data: {
								sign: 1,//表示获取类型为用户创建的项目
								p: p,
								seachWord: seachWord,
								userid:"<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
"
							},
							timeout: 3000,
							dataType: 'json',
							success: function(data){
								//console.log(data);
								//location.reload();
								if(!isEmptyObject(data.errmsg)) {
									$.each(data.errmsg.list, function(i, n) {

											str += '<div class="man-item"><div class="item-box"><a href="/member/selflibrarytow/'+n.libid+'/<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
"><h4>'+n.libname+'</h4><div class="big-img">';

											if (n.cover != ''){ 
												str += '<img src="'+n.cover+'" alt="" />';
											}else{ 
												str += '<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="" />';
											}

											str += '</div></a>';

											if(<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['userid'];?>
 == <?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
) {
												str += '<div class="edit" onClick="editLibWinOpen('+n.libid+')">编辑</div>';
												str += '<div class="region"><a href="/member/selflibrarytow/'+n.libid+'/'+n.userid+'?create=1">创建区域</a></div>';
											}
											str += '</div>';
											if(n.status == 1){

											str += '<div class="state design">设计中</div>';

											}else if(n.status == 2){

											str += '<div class="state production">生产中</div>';

											}else if(n.status == 3){

											str += '<div class="state win">已完成</div>';

											}

											str += '</div>';

										

									});
									$('#man-show').append(str);

									imgsize()

									$('#p').val(Number(p)+1);

								}
							}
						});
					}
				});
			});

			window.onload = function(){ 
				var userId = "<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
";
				var myUserId = "<?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
";
				if(userId == myUserId) {
					$(window).scrollTop(0);
					$('body').css("overflow", 'hidden');
					$("#pick").css('display', 'block');
					createWindowOpen();
				}
			}

			selectCity(2);
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
				var parentid = $('.quyu option:selected').val();
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

								$('.quyu').html(html);
								$(".quyu option[value='"+areayCode+"']").attr("selected",true);
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

	</body>

</html><?php }
}
