<?php
/* Smarty version 3.1.30, created on 2018-01-04 09:45:19
  from "D:\lingzanpc\application\views\templates\search\search.index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4d872f86d3e3_24013821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26165b744f71a84cecf0330e587b3ffde17d2ad4' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\search\\search.index.html',
      1 => 1513649538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a4d872f86d3e3_24013821 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<?php $_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/search.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/icon.css">

	<body>
        <!--这里是商家采集弹窗-->
		<div id="caiji">
			<div class="caiji-box">
				<div class="caiji-content">
					<div class="caiji-title">
						<span>采集</span>
						<i></i>
					</div>
					<!-- <form id="colPro1" class="form-one" method="post" action="member/add_product"> -->
					<div class="caiji-show">
						<div class="caiji-left">
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/cai1.jpg" alt="" />
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
									</div>
								</div>
							</div>
							<div class="creat">
								<div class="creat-box"  onClick="addProjectProduct()">
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
						<button class="guanzhu">确认关注</button>
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
	    			<div class="title">确定取消关注该用户吗</div>
	    			<span>取消</span>
	    			<button type="submit">确定</button>
	    		</div>
	    	</div>
	    </div>

		<!--这是海报-->
		<div class="search">
			<!-- <h1>搜索你想要的 <?php echo $_smarty_tpl->tpl_vars['data']->value['row'];?>
个结果</h1> -->
			<div class="titleBox">搜到你想要的 <?php if ($_smarty_tpl->tpl_vars['type']->value != '个人') {?> <?php echo $_smarty_tpl->tpl_vars['data']->value['row'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['user1']->value['row'];?>
 <?php }?>个结果</div>
			<div class="search-box">
				<form action="search" method="get" id="tijiao" >
				<div class="search-nav">
					<div class="search-select">
					<p><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</p>
						<i></i>
						<div class="search-option">
							<div class="search-item" onClick="changeType('全部')">全部</div>
							<div class="search-item" onClick="changeType('项目')">项目</div>
							<div class="search-item" onClick="changeType('产品')">产品</div>
							<div class="search-item" onClick="changeType('笔记')">笔记</div>
							<div class="search-item" onClick="changeType('个人')">个人</div>
							<!-- <div class="search-item" onClick="changeType('品牌')">品牌</div> -->
						</div>
					</div>
					<div class="easyui-panel" style="flex: 1;box-sizing: border-box;border-bottom: 1px solid #d5d5d5;">

						<input type="hidden" class="searchType" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" placeholder="点击输入关键词">
						<input class="easyui-tagbox" style="width:100%;text-indent: 10px" placeholder="点击输入关键词">

					</div>
					<a href="javascript:void(0)" class="subData" style="display:block; width:64px; height:49px; line-height:49px; text-align:center; background-color: #b9b9b9; float:left; color: #ffffff; font-size: 18px;">搜索</a>
				</div>
				</form>
				<div class="search-sub">
					<!-- <span>点选热词：</span>
					<div class="hot">
						<a href="">保利</a>
						<a href="">旗舰</a>
						<a href="">常州</a>
						<a href="">日光</a>
						<a href="">办公室</a>
						<a href="">海棠</a>
						<a href="">生活</a>
						<a href="">国际</a>
						<a href="">层次</a>
						<a href="">浪漫</a>
						<a href="">保利</a>
						<a href="">万科</a>
					</div>
					<div class="change"></div> -->
				</div>
			</div>
		</div>
		<div class="pagination-one">
			<!--这是标题-->
			<div class="middle" style="height:10px;">
				<!-- <div class="title">
					<h1></h1>
				</div> -->
			</div>

			<!--这是瀑布流-->
			<input type="hidden" id="p" value="<?php echo $_smarty_tpl->tpl_vars['p1']->value;?>
" />
			<div class="container" id="container">
				<?php if ($_smarty_tpl->tpl_vars['data']->value['list'] != '') {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['list'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['flag'] == 1) {?>
				<div class="box product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<a href="/collection/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<div class="boximg" >
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" >
							<i style="display:none">采集</i>
	                        <div class="col-tow" onClick="getLibraryList(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" proid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style="display:block">采集</div>
							<textarea style="display:none;" rows="3" cols="40" name="desc"><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
</textarea>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
							<em>产品</em>
						</div>
						<div class="behavior">
							<div class="peson">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
" />
								<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
							</div>
							<div class="praise" >
								<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
									<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyZan'] == 0) {?>
									<span onclick="fabulous(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"></span>
									<input type="hidden" id="puserid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" />
									<i class="zan_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
									<?php } else { ?>
									<div class="yizan"></div>
									<i><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
									<?php }?>
								<?php } else { ?>
									<span></span>
									<i><?php echo $_smarty_tpl->tpl_vars['item']->value['zancount'];?>
</i>
								<?php }?>
							</div>
						</div>
					</a>
				</div>

				<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['flag'] == 2) {?>

				<div class="box">
					<a href="/library/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<div class="boximg">
							<?php if ($_smarty_tpl->tpl_vars['item']->value['pic'] != '') {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
							<?php } else { ?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
							<?php }?>
							<p>[<?php echo $_smarty_tpl->tpl_vars['item']->value['libname'];?>
] <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
							<em>项目</em>
							<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
								<div class="rate" onClick="followProject(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">关注</div>
								<?php } else { ?>
								<div class="rate1">已关注</div>
								<?php }?>
							<?php }?>
						</div>
						<div class="behavior">
							<div class="peson">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
"/>
								<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>

							</div>
							<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow1'] == 0) {?>
							<div class="praise praise-tan peson_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
								<strong>+</strong>
								<em>关注</em>
							</div>
							<?php } else { ?>
							<div class="praise">
								<strong></strong>
								<em>已关注</em>
							</div>
							<?php }?>
						<?php }?>
						</div>
					</a>
				</div>

				<?php } else { ?>
				<div class="box">
				<a href="/note/info/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"  class="note_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<div class="boximg">
						<?php if ($_smarty_tpl->tpl_vars['item']->value['pic'] != '') {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
						<?php } else { ?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/image/li_image.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
						<?php }?>
						<p><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['name'],0,18);?>
</p>
						<em>笔记</em>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
							<div class="rate" onClick="followNote(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">收藏</div>
							<?php } else { ?>
							<div class="rate1">已收藏</div>
							<?php }?>
						<?php }?>
					</div>
					<div class="behavior">
						<div class="peson">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
">
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
							<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow1'] == 0) {?>
							<div class="praise praise-tan peson_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
" onclick="followWindow(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">
								<strong>+</strong>
								<em>关注</em>
							</div>
							<?php } else { ?>
							<div class="praise">
								<strong></strong>
								<em>已关注</em>
							</div>
							<?php }?>
						<?php }?>
					</div>
				</a>
			</div>
				<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>

				<div class="add-btn">
					加载更多
				</div>
			</div>
		</div>
		<!--这里是内容二-->
		<div class="page-tow">
			<!--这是标题-->
			<div class="middle" style="height:10px">

			</div>

			<!--这是瀑布流-->
			<input type="hidden" class="p" value="<?php echo $_smarty_tpl->tpl_vars['p2']->value;?>
" />
			<div class="container" id="containers">
				<?php if ($_smarty_tpl->tpl_vars['user1']->value['list'] != '') {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user1']->value['list'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<div class="box box_<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">
					<?php if ($_smarty_tpl->tpl_vars['item']->value['userid'] == $_smarty_tpl->tpl_vars['user']->value['userid']) {?>
					<a href="/member/library">
					<?php } else { ?>
					<a href="/member/library/<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
">
					<?php }?>
						<div class="boximg">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
">
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
						</div>
						<div class="behavior">
							<div class="personr">
								<em><?php echo $_smarty_tpl->tpl_vars['item']->value['librarycount'];?>
 项目</em>
								<span><?php echo $_smarty_tpl->tpl_vars['item']->value['productcount'];?>
产品</span>
							</div>
							<div class="show-img">
								<ul>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['product'], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
									<li><img src="<?php echo $_smarty_tpl->tpl_vars['item2']->value['smallpic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item2']->value['proname'];?>
" /></li>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								</ul>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['myInfo']->value['userid'] != $_smarty_tpl->tpl_vars['item']->value['userid']) {?>
								<?php if ($_smarty_tpl->tpl_vars['item']->value['alreadyFollow'] == 0) {?>
								<div class="interest" onclick="followPeople(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">
									添加关注
								</div>
								<?php } else { ?>
								<div class="interest" onclick="cancelFollowPeople(<?php echo $_smarty_tpl->tpl_vars['item']->value['userid'];?>
)">
									取消关注
								</div>
								<?php }?>
							<?php }?>
						</div>
					</a>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>

				<div class="add-btn">
					加载更多
				</div>
			</div>
		</div>
		<input type="hidden" class="seachWord" value="<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
" /> 
		<input type="hidden" class="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" /> 

		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/jquery.easyui.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/js/search.js"><?php echo '</script'; ?>
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

			var type = "<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
";
			var static_url = "<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
";
			var myUserId = "<?php echo $_smarty_tpl->tpl_vars['myInfo']->value['userid'];?>
";

			$('.search .search-box .search-nav input').css({
				height: "50px",
				lineHeight: "50px",
				outline: "none",
				border: "none"
			})

			$(document).ready(function(){

				$('.easyui-tagbox').attr({'name':"seachWord"}).val("<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
");//easyui-tagbox
				var seachWord = "<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
";
				if(seachWord != ''){
					var html1 = '';
					var html2 = '';
					var arr = seachWord.split(',');
					var count = arr.length;
					for (var i = 0; i < count; i++) {
						html1 += '<span class="tagbox-label" tagbox-index="'+i+'" style="height: 40px; line-height: 40px;">'+arr[i]+'<a href="javascript:;" class="tagbox-remove"></a></span>';
						html2 += '<input type="hidden" class="textbox-value"  name="" placeholder="点击输入关键词"  value="'+arr[i]+'">';
					};

					$('#_easyui_textbox_input1').before(html1);
					$('#_easyui_textbox_input1').after(html2);

				}

				// $('.search-select p').text("<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
");
				// $('.searchType').val("<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
");
				if('<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
' == '个人' || '<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
' == '品牌')
				{
					$('.page-tow').css("display","block");
		        	$('.pagination-one').hide();

				}

				//点击热门关键词，修改连接并跳转
				 $(".search-sub a").click(function(){
				 	var type = $('.searchType').val();
				 	var seachWord = $(this).text();
				 	$(this).attr('href',"search?seachWord="+seachWord+"&type="+type);
				 })

				 //点击搜索数据
				 $('.subData').click(function(){
				 	var seach = '';
				 	$('.textbox-value').each(function(){
				 		var tab = $(this).val();
				 		seach += tab+',';
				 	})
				 	var t = $("#_easyui_textbox_input1").val();
				 	if(t != '') {
				 		seach += t+',';
				 	}
				 	var count = seach.length-1;
				 	var word = seach.substring(0,count);
				 	$('.easyui-tagbox').val(word);
				 	$('#tijiao').submit();
				 })

			})

			//切换搜索类型，赋值后提交
			function changeType(searchType) {

				$('.searchType').val(searchType);
				$('#tijiao').submit();

			}

			changeKeyWork(<?php echo $_smarty_tpl->tpl_vars['offset']->value;?>
);

			//换一批关键词
			function changeKeyWork(i) {
				if(type != '项目' && type != '产品') {
					return false;
				}
				var html = '';
				$.ajax({
	              url:'/search/getKeyWorkList',
	              type:"post",
	              data:{offset:i},
	              success:function(ret){

	                  if(ret != ''){

	                      var jsonarray = eval('('+ret+')');
	                      var pages  = jsonarray.pages;

	                       if(jsonarray != null) {
	                       		html += '<span>点选热词：</span><div class="hot">';
					           $.each(jsonarray.list, function(k, n) {
					           	// alert(i)
						           	var sty = '';
						           	if(n == "<?php echo $_smarty_tpl->tpl_vars['seachWord']->value;?>
") {
						           		sty = 'style="text-decoration: underline;color:#C90000;"';
						           	}
					           		html += '<a href="search?type='+type+'&seachWord='+n+'&pages='+i+'" '+sty+'>'+n+'</a>';
					           	}); 

					           i++;
		                      if(pages<=i) {
		                      	i = 0;
		                      }
					          html += '</div><div class="change" onClick="changeKeyWork('+i+')"></div>';

				       		}

	                   }
	                   $('.search-box .search-sub').html(html);

	              },   
	              error:function(){
	                  // alert('网络异常，请稍后再试');
	                  return false;
	              }

	          	})

			}

	function pickclick(){


	$(".praise").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		if($(this).hasClass('praise-tan')){
			$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#interset").css('display', 'block');
		}
        
	})

	}

	pickclick()

		<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
