<?php
/* Smarty version 3.1.30, created on 2018-01-18 13:51:44
  from "D:\lingzanpc\application\views\templates\library\library.project.order.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6035f06d33f0_91330866',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f653b808046d2c33e82ca3ac28c1210b3f4646b' => 
    array (
      0 => 'D:\\lingzanpc\\application\\views\\templates\\library\\library.project.order.html',
      1 => 1516254699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:general/general.header.html' => 1,
  ),
),false)) {
function content_5a6035f06d33f0_91330866 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:general/general.header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/css/order.css" />
		

<html>
	<head>
		<title></title>
</head>
		<style type="text/css" media="print">	

			img{width:200px;height:200px}


 
		</style>
		
		
	<body>
		<div class="man-title">
			<div class="man-box">
				<input type="hidden" id="proid" value="<?php echo $_smarty_tpl->tpl_vars['proid']->value;?>
" />
				<input type="hidden" id="orderid" value="<?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
" />
				<!--<span><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
  /  <?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
  /   <?php echo $_smarty_tpl->tpl_vars['order']->value['addtime'];?>
</span>-->
				<h3>项目产品订单</h3>
			<div class="make">
				<!--<p>该订单生成者</p>
				<img src="<?php echo $_smarty_tpl->tpl_vars['order']->value['avatar'];?>
"/>-->
				<div class="back" onclick="window.history.go(-1)" title="返回"></div>
			</div>
			</div>
			
		</div>
<!--startprint-->
<div class="order-box">
			<div class="order-title">
				<div class="pro"><?php echo $_smarty_tpl->tpl_vars['project']->value['libname'];?>
  /  <?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['project']->value['proname'];?>
  /   <?php echo $_smarty_tpl->tpl_vars['order']->value['addtime'];?>
</div>
				<!--<div class="change"></div>-->
				<div class="export"></div>
				<div class="prints"></div>
			</div>

			<div class="detail-item" id='ddd'>
				<div class="thead">
					<div class="all-select">全选</div>
					<div class="number">项目编号和名称</div>
					<!--<div class="name">名称</div>-->
					<div class="pros">产品编号和名称</div>
					<div class="parameter">规格参数</div>
					<div class="unit">单价</div>
					<div class="count">数量</div>
					<div class="subtotal">总价</div>
					<div class="operation">备注说明</div>
				</div>
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
					<li>
						<div class="author">
							<div class="all-select"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</div>
							<div class="remark">
								<!--<input type="text" class="number" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['ppcode'];?>
" />
								<input type="text" class="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['item']->value['ppname'];?>
" />-->
								<p><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
</p>
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppname'];?>
</p>
							</div>
							<div class="pros">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['smallpic'];?>
" alt="" />
								<p><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['model'];?>
</p>
								<div><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['proname'];?>
</div>
							</div>
							<div class="param">
								<p>规格:<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['param1'];?>
</p>
								<p>材质:<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['param2'];?>
</p>
							</div>
							<div class="unpric">
								<p>￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppprice'];?>
</p>
							</div>
							<div class="count">
								<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
件
							</div>
							<div class="substro">
								￥<?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['totalprice'];?>

							</div>
							<div class="notes"><?php echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppdesc'];?>
</div>
						</div>

						<?php if (isset($_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_2'])) {?>
						<div class="replace">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sp2']['tyid_2'], 'item3', false, 'key3', 'item3', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key3']->value => $_smarty_tpl->tpl_vars['item3']->value) {
?>
							<div class="replace-item">
								<div class="replace-check">
									<?php echo $_smarty_tpl->tpl_vars['key3']->value+1;?>

								</div>

								<div class="remark">
									<p><?php echo $_smarty_tpl->tpl_vars['project']->value['area'];
echo $_smarty_tpl->tpl_vars['item']->value['sp1']['ppcode'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppcode'];?>
</p>
									<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['ppname'];?>
</p>
								</div>
								<div class="pros">
									<img src="<?php echo $_smarty_tpl->tpl_vars['item3']->value['smallpic'];?>
" alt="" />
									<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['proname'];?>
</p>
								</div>
								<div class="param">
									<p>规格:<?php echo $_smarty_tpl->tpl_vars['item3']->value['model'];?>
</p>
									<p>材质:<?php echo $_smarty_tpl->tpl_vars['item3']->value['param2'];?>
</p>
								</div>
								<div class="unpric">
									<p>￥<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppprice'];?>
</p>
								</div>
								<div class="count">
									<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['average']*$_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>
米</p>
									<p><?php echo $_smarty_tpl->tpl_vars['item3']->value['average'];?>
米/件</p>
								</div>
								<div class="substro">
									￥<?php echo $_smarty_tpl->tpl_vars['item3']->value['ppprice']*$_smarty_tpl->tpl_vars['item3']->value['average']*$_smarty_tpl->tpl_vars['item']->value['sp1']['count'];?>

								</div>
								
								<div class="notes"></div>
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
					<!--<div class="all">
						<i></i><span>全选</span>
					</div>-->
					<!--<div class="float">
						<span>选中的产品上浮</span>
						<input type="text" />
						<span>%</span>
					</div>-->
					<!--<div class="remak">
						<span>备注 </span> <input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['order']->value['desc'];?>
"/>
					</div>-->
					<div class="money">
						<span>五类产品 共<?php echo $_smarty_tpl->tpl_vars['order']->value['count'];?>
件  合计：</span> <em>￥<?php echo $_smarty_tpl->tpl_vars['totalprice']->value;?>
</em>
					</div>
				</div>
			</div>

		</div>
		
	
		<!--endprint-->
		<?php echo '<script'; ?>
 type="text/javascript">
			function doPrint() {   
              bdhtml=window.document.body.innerHTML;   
              sprnstr="<!--startprint-->";   
              eprnstr="<!--endprint-->";   
              prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);   
              prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));   
              window.document.body.innerHTML=prnhtml;  
              window.print();   
                  }
			
			
			$(".order-box .order-title .prints").click(function(){
				doPrint()
			})
			$(".order-box .order-title .export").click(function(){
				var proid = $('#proid').val();
				var orderid = $('#orderid').val();
				window.location.href = '/library/export2/'+proid+'/'+orderid;
			})
//   window.onload=function(){
//   	doPrint()
//   }
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
