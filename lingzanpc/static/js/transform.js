$(function(){
	
	
	$("#pick .title-item .check_one .coordinate").click(function(){
	if($(this).find("em").hasClass("blak")){
		$(this).find("em").removeClass("blak")
	}else{
		$(this).find("em").addClass("blak").parent().siblings().find("em").removeClass("blak")
	}

})
$("#pick .title-item .check_tow .coordinate").click(function(){
	if($(this).find("em").hasClass("blak")){
		$(this).find("em").removeClass("blak")
	}else{
		$(this).find("em").addClass("blak").parent().siblings().find("em").removeClass("blak")
	}

})


	//这里是上传产品弹窗
	$(".container .box .upload-box").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');
	    
	})
	// $("#pick .pick-box .pick-content .pick-show .pick-left .title-item").click(function(event) {
	// 	event.stopPropagation()
	// 	$(this).find('div.class-item').slideToggle()
	// 	$(this).siblings().find('div.class-item').slideUp()
	// })
	$("#pick .pick-box .pick-content .pick-show .pick-left .title-item .class-item").click(function(event) {
		event.stopPropagation()
		$(this).css("display", "block")
			//		$(this).find('div.class-item').slideToggle()
	})
	$("#pick .pick-box .pick-content .pick-show .pick-left .title-item .class-item a").click(function() {
		var text = $(this).text();
		$(this).parent().prev().text(text);
		$(this).parent().slideUp()
	})
	$("#pick .pick-box .pick-content").click(function() {
		
		$('#pick .class-item ').slideUp()
	})
	
	//上传弹窗大小变化
	$('#pick .pick-box .change').click(function(){
		var text=$("#pick .pick-box .change em").text();
		if(text=="基本选项"){
//			$(this).css("padding","10px 50px")
//			$("#pick .pick-left .back-two").css("display","none")
			$("#pick .pick-box .pick-content .title-right").css("display","none")

			$("#pick .pick-box .pick-right").css("display","none")
//			$("#pick .pick-left").css("width","250px")
			$("#pick .pick-box .pick-content").css("width","440px")
			$("#pick .pick-box .change em").text("全部选项")
			$("#pick .pick-box .change strong").css({transform:"rotate(180deg)"})
			
//			$("#pick .pick-box .pick-content .title-left").css("width","250px")
		}else{
			$("#pick .pick-box .pick-content .pick-show .pick-right").css("display","block")
//			$(this).css("padding","10px")
			
//			$("#pick .pick-left .back-two").css("display","block")
//			$("#pick .pick-left").css("width","400px")
			$("#pick .pick-box .pick-content").css("width","800px")
			$("#pick .pick-box .change em").text("基本选项")
			$("#pick .pick-box .change strong").css({transform:"rotate(-0deg)"})
//			$("#pick .pick-box .pick-content .title-left").css("width","440px")
			$("#pick .pick-box .pick-content .title-right").css("display","inline-block")
			
			
			
		}
	})
	
	
	
	
	
	
	
  var textword=$(".pro-explain p").text()
  var slicetext=textword.substr(0,150)
  $(".pro-explain p").text(slicetext+"...")
	
	$(".sub-box .pro-explain em").click(function(){
		var emtext=$(this).text()
		if(emtext=='全文》'){
			$(".pro-explain p").text(textword)
			$(".pro-explain").css({"height":"auto"})
			$(this).text("收起》")
		}else{
			$(".pro-explain p").text(slicetext+"...")
			$(".pro-explain").css({"height":"40px"})
			$(this).text("全文》")
		}
	})
	
	var detailtop=$('.detail .detail-box .detail-title').offset().top
	$(window).scroll(function() {
		var scrollheight = $('body').scrollTop() || document.documentElement.scrollTop;
	
	console.log(scrollheight)

  if(scrollheight>=detailtop){
  	$(".detail .detail-box .detail-title").css({"position":"fixed","top":'0','zIndex':'9999',"background":"#ebebeb"})
  	$(".detail .detail-box .detail-item .thead").css({"position":"fixed","top":'70px','zIndex':'9999',"background":"#ebebeb"})
  	$(".detail-fixed").css({"display":"block"})
  }else{
  	$(".detail .detail-box .detail-title").css({"position":"relative","top":'0px','zIndex':'2'})
  	$(".detail .detail-box .detail-item .thead").css({"position":"relative","top":'0px','zIndex':'2'})
  	$(".detail-fixed").css({"display":"none"})
  	
  	
  }
})
	
	
	
	var showtype = $('#showtype').val();
	if(showtype == 1) {
		$('.detail .detail-box .detail-title .stripe').removeClass("stri")
		$('.detail .detail-box .trade').removeClass("tra");
		$('.detail .detail-box .detail-title .notes').css("display","none");
		$('.detail .detail-box .detail-title .notes').css("display","none");
		$('.detail .detail-box .detail-title .out_red').css("display","none");
		$('.detail .detail-box .detail-title .check_all').css("display","inline-block");
		$('.detail .detail-box .detail-item').css("display","none");
		$('#containerp').css("display","block");
	} else if(showtype == 2) {
		$('.detail .detail-box .detail-title .stripe').addClass("stri");
		$('.detail .detail-box .trade').addClass("tra");
		$('.detail .detail-box .detail-title .out_red').css("display","inline-block");
		$('.detail .detail-box .detail-title .out_red').css("display","inline-block");
		$('.detail .detail-box .detail-item').css("display","block");
		$('.detail .detail-box .detail-title .notes').css("display","inline-block");
		$('#containerp').css("display","none");
//		$('.detail .detail-box .detail-title .check_all').css("display","none");
	}

	$('.members .rol .right strong').click(function(evt){
		var texts=$(this).parent().find("input").val()
		var lengs=$('.members .member .member-add #power .power_nav a').size()
		$(".members .member .member-add #power .power_nav a").find("em").remove()
		var attr=["设计师","采购","供应商","访客"]
		for (var i=0;i<lengs;i++) {
			if($('.members .member .member-add #power .power_nav a').eq(i).text()==texts){
				$(".members .member .member-add #power .power_nav a").eq(i).addClass("tv").siblings().removeClass("tv")
				$(".members .member .member-add #power .power_nav a").eq(i).append("<em></em>")
			}
			
		}
		
		if(attr.indexOf(texts)<=0){
			$(".members .member .member-add #power .power_nav a").eq(0).addClass("tv").siblings().removeClass("tv")
			$(".members .member .member-add #power .power_nav a").eq(0).append("<em></em>")
		}
		
		
		evt.stopPropagation()
		$(".members .member .member-add #power").css("display","block")
		$("this").parents(".people-id").css("display","none")

		var proid = $('#proid1').val();
		var uid = $(this).parent().parent().parent().parent().attr('data-uid');
		var group = $(this).parent().children('input.group').val();
		$('.power-box').attr('data-uid', uid);
		$('.power-box').attr('data-group', group);
		$.ajax({
			url: '/ajax/get_member_permissions',
			type: 'POST',
			async: true,
			data: {
				proid: proid,
				uid: uid
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				var conf = data.errmsg.permissions.split(",");
				for(var i=0; i<conf.length; i++) {
					if(conf[i] == 1) {
						$('.auths_'+(i+1)).addClass("ck");
					} else {
						$('.auths_'+(i+1)).removeClass("ck")
					}
				}
			}
		});
	})
	
	$('.members #power .title i').click(function(){
		$(".members .member .member-add #power").css("display","none")
	})
	$('.members #power .confirm a').click(function(){
		$(".members .member .member-add #power").css("display","none")
	})
	$('.members #power .confirm a.determine').click(function(){
		var arr = new Array();
		var length = $(".auths").size();
		for (var i=0; i<length; i++) {
			if($(".auths").eq(i).hasClass("ck")) {
				arr.push(1);
			} else {
				arr.push(0);
			}
		}
		//alert(arr);
		var proid = $('#proid1').val();
		var uid = $(this).parent().parent().attr('data-uid');
		var group = $('.power_nav a.tv').html().replace(/<em>/, '').replace(/<\/em>/, '');
		$.ajax({
			url: '/ajax/set_member_permissions',
			type: 'POST',
			async: true,
			data: {
				proid: proid,
				uid: uid,
				permissions: arr,
				group: group
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
			}
		});
	})
	
	$(".members #power").click(function(evt){
		evt.stopPropagation()
	})
	$("body").click(function(evt){
		evt.stopPropagation()
		$(".members .member .member-add #power").css("display","none")
	})
	
	var em='<em></em>'
	$(".members .power_nav a").click(function(){
		$(this).append(em).siblings().find("em").remove();
		$(this).addClass("tv").siblings().removeClass('tv');
		var text = $(this).html().replace(/<em>/, '').replace(/<\/em>/, '');
		
		var proid = $('#proid1').val();
		var uid = $(this).parent().parent().attr('data-uid');
		var group = $(this).parent().parent().attr('data-group');
		
		if(text == group) {
			$.ajax({
				url: '/ajax/get_member_permissions',
				type: 'POST',
				async: true,
				data: {
					proid: proid,
					uid: uid
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
					var conf = data.errmsg.permissions.split(",");
					for(var i=0; i<conf.length; i++) {
						if(conf[i] == 1) {
							$('.auths_'+(i+1)).addClass("ck");
						} else {
							$('.auths_'+(i+1)).removeClass("ck")
						}
					}
				}
			});
		} else {
			var conf = new Array();
			switch(text) {
				case '设计师': conf = [1,1,1,0,1,1, 1,1,1,1, 1,1,1,1, 1,0, 1,1]; break;
				case '采购': conf = [1,1,1,0,1,1, 1,1,1,1, 1,1,0,1, 1,0, 1,1]; break;
				case '供应商': conf = [1,1,1,0,1,1, 0,0,0,0, 1,1,0,1, 1,0, 1,1]; break;
				case '访客': conf = [0,0,0,0,0,0, 0,0,0,0, 0,0,0,0, 0,0, 1,0]; break;
			}
			for(var i=0; i<conf.length; i++) {
				if(conf[i] == 1) {
					$('.auths_'+(i+1)).addClass("ck");
				} else {
					$('.auths_'+(i+1)).removeClass("ck")
				}
			}
		}
	})
	
	$(".members .sum_check i").click(function(){
		$(this).toggleClass("ck");
		if($(this).hasClass("ck")){
			console.log(1)
			$(this).parents(".pdcu").find('i').addClass("ck")
		}else{
			console.log(0)
			$(this).parents(".pdcu").find('i').removeClass("ck")
		}
	})
	
	$(".members .sub_check i").click(function(){
		$(this).toggleClass("ck");
	})
	
//	$(".detail .detail-box .detail-title .out_red").hover(function(){
//		
//		pri=setTimeout(function(){
//			$(".detail .detail-box .detail-title .out_red .inset").css("display","block")
//		},200)
//	},function(){
//		clearTimeout(pri)
//		out=setTimeout(function(){
//			$(".detail .detail-box .detail-title .out_red .inset").css("display","none")
//			
//		},200)
//		
//	})
	
	
	//这里是面料里面的总价
//	$(".detail .detail-box li .replace .replace-item").each(function(){
//		$(this).find(".flo>p").text("￥"+(parseInt($(this).find(".unpric>p").text().replace(/￥/g,"")))*(parseInt($(this).parents("li").find(".jia-item>p").eq(0).text())))
//	})
//	parseFloat($(this).find("span").text())
	
	//这里是鼠标移动显示打印导出
//	$(".detail .detail-box .detail-title .out_red").hover(function(){
//		
//		
//		pri=setTimeout(function(){
//			$(".detail .detail-box .detail-title .out_red .inset").css("display","block")
//		},200)
//	},function(){
//		clearTimeout(pri)
//		out=setTimeout(function(){
//			$(".detail .detail-box .detail-title .out_red .inset").css("display","none")
//			
//		},200)
//		
//	})
	
	//产品排序
	var sort=$('.detail .detail-box .detail-item ul li').size()
	for (var i=1;i<=sort;i++) {
		$('.detail .detail-box .detail-item ul li .all-select em').eq(i-1).text(i)
	}
	
	
	//这里是项目产品清单 编辑点击效果
	$('.detail .thead .pros span').click(function(){
		$('.detail .pros .cla-sub').slideToggle();
		//$(".prolist li").css('display', 'block');
	})
	$('.detail .thead .pros .cla-sub a').click(function(){

		$('.detail .thead .pros span').text($(this).text())

		if($(this).index() == 0) {
			$(".prolist li").css('display', 'block');
		} else {
			var k = $(this).index() + 2;
			var length = $(".prolist li").size();
			for (var i=0; i<length; i++) {
				if($(".prolist li").eq(i).attr('data-type1') != k) {
					$(".prolist li").eq(i).css('display', 'none');
				} else {
					$(".prolist li").eq(i).css('display', 'block');
				}
			}
		}

		$(this).parent().slideToggle()
	})
	$('.detail .unit span').click(function(){
		$('.detail .unit .flo-sub').slideToggle()
		if($('.detail .unit .flo-sub').css('display')=='block'){
			$('.detail .unit .flo-sub input').attr("disabled",false)
		}
	})
	$('.detail .operation span').click(function(){
		$('.detail .detail-box .detail-item .thead .operation .show-sub').slideToggle();
		$(".prolist li").css('display', 'block');
	})
	$('.detail .thead .show-sub a').click(function(){
		var k = $(this).index();
		var length = $(".prolist li").size();
		for (var i=0; i<length; i++) {
			if($(".prolist li").eq(i).attr('data-status') != k) {
				$(".prolist li").eq(i).css('display', 'none');
			} else {
				$(".prolist li").eq(i).css('display', 'block');
			}
		}
		$(this).parent().slideToggle()
	})
	//产品搜索
	$('#proseach').click(function() {
		var wd = $('#proseachword').val();
		var litotal=$('.detail .detail-box .detail-item ul li').size();
		var proname;
		var ppname;
		for (var i=0;i<litotal;i++) {
			proname = $('.detail .detail-box .detail-item ul li .remark .name').eq(i).text();
			ppname = $('.detail .detail-box .detail-item ul li .pros .model p').eq(i).text();
			if(proname.indexOf(wd) >= 0 || ppname.indexOf(wd) >= 0){
				$('.detail .detail-box .detail-item ul li').eq(i).css('display', 'block');
				$('.containerp .box').eq(i).css('display', 'block');
			} else {
				$('.detail .detail-box .detail-item ul li').eq(i).css('display', 'none');
				$('.containerp .box').eq(i).css('display', 'none');
			}
		}
	});
	
	$('.detail .detail-box .detail-title .detail-sear input').keyup(function(evt) {
		var wd = $('#proseachword').val();
		var litotal=$('.detail .detail-box .detail-item ul li').size();
		var proname;
		var ppname;
		if(evt.keyCode==13){
			for (var i=0;i<litotal;i++) {
			proname = $('.detail .detail-box .detail-item ul li .remark .name').eq(i).text();
			ppname = $('.detail .detail-box .detail-item ul li .pros .model p').eq(i).text();
			if(proname.indexOf(wd) >= 0 || ppname.indexOf(wd) >= 0){
				$('.detail .detail-box .detail-item ul li').eq(i).css('display', 'block');
				$('.containerp .box').eq(i).css('display', 'block');
			} else {
				$('.detail .detail-box .detail-item ul li').eq(i).css('display', 'none');
				$('.containerp .box').eq(i).css('display', 'none');
			}
		}
			
		}
		
		
	});
	
	
	
	//这里是点击自动排序
	$('.detail .thead .number span').click(function(){
		
		var length = $(".prolist li").size();
		var area = $('#area').val();
		for (var i=0;i<length;i++) {
			$('.detail .remark p.number').eq(i).text(area+'00'+(i+1));
		}

		var proid = $('#proid1').val();
		$.ajax({
			url: '/ajax/project_product_ppcode_auto',
			type: 'POST',
			async: true,
			data: {
				proid: proid
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
			}
		});
		
		
		$("#Number").addClass("numb")
		setTimeout(function(){
			$("#Number").removeClass("numb")
		},2000)
		
	})
	
	//产品编号 点击事件编辑
	$('.detail li .remark .togg-no').click(function(){
		var t=$(this).parent().find('input').val()
		$(this).parent().find('p').css("display","none")
		
		$(this).parent().find('input').css("display","block").attr("disabled",false).val('').focus().val(t)
		
		
		var sid = $(this).parent().parent().parent().parent().attr('data-proid');
		var field = $(this).attr('data-field');
		
		$(this).parent().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value)
			
			if(value.indexOf('-') >= 0) {
				$.ajax({
					url: '/ajax/project_product_reset4',
					type: 'POST',
					async: true,
					data: {
						sid: sid,
						field: field,
						text: value
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
					}
				});
			} else {
				$.ajax({
					url: '/ajax/project_product_reset2',
					type: 'POST',
					async: true,
					data: {
						sid: sid,
						field: field,
						text: value
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
					}
				});
			}
		});
		
		$(this).parent().find('input').keyup(function(evt){
			var value=$(this).val();
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text(value)
			}
		
		});

	})
	
	
	//这里是补充产品编号 点击事件编辑
	$('.detail .replace .replace-item .subNumber .togg-no').click(function(){
		var t=$(this).parent().find('input').val()
		$(this).parent().find('p').css("display","none")
		
		$(this).parent().find('input').css("display","block").attr("disabled",false).val('').focus().val(t)
		
		
//		var sid = $(this).parent().parent().parent().parent().attr('data-proid');
//		var field = $(this).attr('data-field');
		
		$(this).parent().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value)
			
			
		});
		
		$(this).parent().find('input').keyup(function(evt){
			var value=$(this).val();
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text(value)
			}
		
		});

	})
	
	
	
	
	//产品编号名称 点击事件编辑
	$('.detail .pros .model .togg-no').click(function(){
		var t=$(this).parent().find('p').text()
		$(this).parent().find('p').css("display","none")
		$(this).parent().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);
		
		var sid = $(this).parent().parent().attr('data-proid2');
		var field = $(this).attr('data-field');
		
		$(this).parent().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value)
			
			$.ajax({
				url: '/ajax/project_product_reset3',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		});
		
		$(this).parent().find('input').keyup(function(evt){
			var value=$(this).val();
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text(value)
			}
		
		});

	})
	
	//这里是子集--产品编号名称 点击事件编辑
	$('.detail .pros-sub .models .togg-no').click(function(){
		var t=$(this).parent().find('p').text()
		$(this).parent().find('p').css("display","none")
		$(this).parent().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);
		
		var sid = $(this).parent().parent().parent().attr('data-proid2');
		var field = $(this).attr('data-field');
		
		$(this).parent().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value)
			
			$.ajax({
				url: '/ajax/project_product_reset3',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		});
		
		$(this).parent().find('input').keyup(function(evt){
			var value=$(this).val();
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text(value)
			}
		
		});

	})
	
	

	
	
	//产品单价 点击事件编辑
	$('.detail .unpric-man>.togg-no').click(function(){
		var t=parseFloat($(this).prev().find('p').text().replace(/￥/g,""))
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);

		var sid1 = $(this).parent().parent().parent().attr('data-proid');
		var sid2 = $(this).parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');
		var sid = sid1 ? sid1 : sid2;

		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text("￥"+value)
			if(value==''){
				$(this).prev().css("display","block").text("￥0")
			}

		
				$.ajax({
					url: '/ajax/project_product_reset2',
					type: 'POST',
					async: true,
					data: {
						sid: sid,
						field: field,
						text: value
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
					}
				});
			
		})
		
		$(this).prev().find('input').keyup(function(evt){
			var num=parseInt($(this).parent().parent().next().find('p').text())
			var value=$(this).val();
			console.log(num)
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text("￥"+value)
			}else{
				if(value==''){
					num=0
				}
				$(this).parent().parent().next().next().text("￥"+(value*num))
			}
		
		})
		
		
	})
	//这里是备选面料单价
	$('.detail .unpric-sub>.togg-no').click(function(){
		var t=parseFloat($(this).prev().find('p').text().replace(/￥/g,""))
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);

		var sid = $(this).parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');

		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text("￥"+value)
			if(value==''){
				$(this).prev().css("display","block").text("￥0")
			}

				
				$.ajax({
					url: '/ajax/project_product_reset2',
					type: 'POST',
					async: true,
					data: {
						sid: sid,
						field: field,
						text: value
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
					}
				});
			
		})
		
		$(this).prev().find('input').keyup(function(evt){
//			var num=parseInt($(this).parent().parent().next().find('p').text())
			var parentNum=$(this).parents("li").find(".jia-item>p").html()
			var num=parseInt(parentNum)
			
			var value=$(this).val();
			console.log(num)
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text("￥"+value)
			}else{
				$(this).parent().parent().next().next().text("￥"+(value*num))
			}
		
		})
		
		
	})
	
	
	
	//产品数量 点击事件编辑
	$('.detail ul li .jia-man .togg-no').click(function(){
		var t=parseInt($(this).prev().find('p').text())
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);

		var sid = $(this).parent().parent().parent().attr('data-proid');
		var field = $(this).attr('data-field');

		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value+"件")
			if(value==''){
			$(this).prev().css("display","block").text("1件")
				
			}

			$.ajax({
				url: '/ajax/project_product_reset2',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		})
		
		$(this).prev().find('input').keyup(function(evt){
			var nums=$(this).parent().parent().prev().find('p').text()
//			var num=parseInt(num)
//			console.log(nums.substring(1))
            var num=parseInt(nums.substring(1))
			var value=$(this).val();
			
			
		 var subCon=$(this).parents("li").find(".meters").size()
//		 console.log(subCon)
//        for (var i=0;i++;i<subCon) {
//        	
//        	$(this).parents("li").find(".meters").eq(i).find("span").text("jjjj")
////        	parseInt($(this).parents("li").find(".meters").eq(i).find("span").text())
////        	(parseInt($(this).parents("li").find(".meters").eq(i).find("span").text())*value)+"米"
//        }

             $(this).parents("li").find(".meters").each(function(){
//           	console.log(parseFloat($(this).find("span").text()))
             	$(this).parents(".jia").find("p").text((parseFloat($(this).find("span").text())*value)+"米")
             })
			
			
			if(evt.keyCode==13){
				var value=$(this).val();
			    $(this).css("display","none")
			    $(this).prev().css("display","block").text(value+"件")
			}else{
				
				$(this).parent().parent().next().text("￥"+(value*num))
			}
		
		})
		
		
	})
	
	//这里是备选方案点击修改件数
	
	$('.detail ul li .jia-pro .togg-no').click(function(){
		var t=parseInt($(this).prev().find('p').text())
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).val('').focus().val(t);

		var sid = $(this).parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');

		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value+"件")
			if(value==''){
			$(this).prev().css("display","block").text("1件")
				
			}

			$.ajax({
				url: '/ajax/project_product_reset2',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		})
		
		$(this).prev().find('input').keyup(function(evt){
			var nums=$(this).parent().parent().prev().find('p').text()
//			var num=parseInt(num)
//			console.log(nums.substring(1))
            var num=parseInt(nums.substring(1))
			var value=$(this).val();
			
			
		 var subCon=$(this).parents("li").find(".meters").size()
//		 console.log(subCon)
//        for (var i=0;i++;i<subCon) {
//        	
//        	$(this).parents("li").find(".meters").eq(i).find("span").text("jjjj")
////        	parseInt($(this).parents("li").find(".meters").eq(i).find("span").text())
////        	(parseInt($(this).parents("li").find(".meters").eq(i).find("span").text())*value)+"米"
//        }

//           $(this).parents("li").find(".meters").each(function(){
////           	console.log(parseFloat($(this).find("span").text()))
//           	$(this).parents(".jia").find("p").text((parseFloat($(this).find("span").text())*value)+"米")
//           })
//			
			
			if(evt.keyCode==13){
				var value=$(this).val();
			    $(this).css("display","none")
			    $(this).prev().css("display","block").text(value+"件")
			}else{
				
				$(this).parent().parent().next().text("￥"+(value*num))
			}
		
		})
		
		
	})
	
	
	
	
	
//	//规格参数 点击事件编辑
	$('.detail .param .togg-no').click(function(){
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).focus();
		
		var sid1 = $(this).parent().parent().parent().parent().attr('data-proid');
		var sid2 = $(this).parent().parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');
		var sid = sid1 ? sid1 : sid2;
		
		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value)
			
			$.ajax({
				url: '/ajax/project_product_reset2',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		})
		
		$(this).prev().find('input').keyup(function(evt){
			if(evt.keyCode==13){
				var value=$(this).val();
			    $(this).css("display","none")
			    $(this).prev().css("display","block").text(value)
			}
		
		})
		
		
	})
	
	//产品备注 点击事件编辑
	$('.detail .count .togg-no').click(function(){
		var t=$(this).prev().find('textarea').text().replace(/\n/,"")
		$(this).prev().find('p').css("display","none")
		$(this).prev().find('textarea').css("display","block").attr("disabled",false).val('').focus().val(t);
		
		var sid = $(this).parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');
	
		
		$(this).prev().find('textarea').blur(function(){
			var value=$(this).val();
		
//			$(this).css("display","none")
			$(this).css("display","block").text(value)
//			$(this).parent().next().text(value)
			
			$.ajax({
				url: '/ajax/project_product_reset2',
				type: 'POST',
				async: true,
				data: {
					sid: sid,
					field: field,
					text: value
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
			
		})
		
		$(this).prev().find('textarea').keyup(function(evt){
			if(evt.keyCode==13){
				var value=$(this).val();
//			    $(this).css("display","none")
			    $(this).css("display","block").text(value)
			}
		
		})
		
		
	})
	
	
	
	
	
	
	//补充调整的1件几米 点击事件编辑
	$('.detail .replace-item .jia_sub .togg-no').click(function(){
		$(this).prev().find('span').css("display","none")
		$(this).prev().find('input').css("display","block").attr("disabled",false).focus();

		var sid = $(this).parent().parent().parent().attr('data-sid');
		var field = $(this).attr('data-field');

		$(this).prev().find('input').blur(function(){
			var value=$(this).val();
			$(this).css("display","none")
			$(this).prev().css("display","block").text(value+"米/件")
			if(value==''){
				$(this).prev().css("display","block").text(1+"米/件")
               value=1
			}

				$.ajax({
					url: '/ajax/project_product_reset2',
					type: 'POST',
					async: true,
					data: {
						sid: sid,
						field: field,
						text: value
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
					}
				});
		
		})
		
		$(this).prev().find('input').keyup(function(evt){
			var num=parseInt($(this).parent().parent().next().find('span').text())
			var value=$(this).val();
			var parentNum=$(this).parents("li").find(".jia-item>p").html()
			var parentCount=parseInt(parentNum)
			console.log(parentCount)
			
			console.log(num)
			
			$(this).parents(".jia_sub").find("p").text((value*parentCount)+"米")
			if(evt.keyCode==13){
				$(this).css("display","none")
				$(this).prev().css("display","block").text(value+"米/件")
			}else{
				if(value==''){
					num=0
				}
//				$(this).parent().parent().next().next().text("￥"+(value*num))
			}
		
		})
		
		
	})
	
	
	
	
	

	
	
	//这里是下载文档弹窗
	$(".sub-nav .files a.load").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#load").css('display','block');
	
	})
	$("#load .load-box .content .title i").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
//		$(window).scrollTop(0);
		$('body').css("overflow",'scroll')
	    $("#load").css('display','none');
	
	})

//	$('.detail .detail-box .detail-item ul li .state .state-select p').click(function(){
//		$(this).offsetParent().find(".state-group ").slideToggle()
//	})
	$('.detail .detail-box .detail-item ul li .state .state-group .state-item').click(function(){
		var texts=$(this).text();
		$(this).offsetParent('.state-select').prev().prev().text(texts);

		var status = $(this).attr('data-status');
		var sid = $(this).parent().attr('data-proid');

		$.ajax({
			url: '/ajax/project_product_status',
			type: 'POST',
			async: true,
			data: {
				sid: sid,
				status: status
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				location.reload();
			}
		});
	})
	
	//这里是修改方案 右边 修改项
	$('.detail .adjust .just-item .setup').click(function(){
		//$(".detail .setup .setselect").slideToggle()
		$(this).find('.setselect').slideToggle()
	})
	$('.setup .setselect .setitem').click(function(event){
		event.stopPropagation
		var text = $(this).text()
		$(this).parent().prev().text(text)

		var sid1 = $(this).parent().attr('data-sid1');
		var sid2 = $(this).parent().attr('data-sid2');
		$.ajax({
			url: '/ajax/project_product_edit',
			type: 'POST',
			async: true,
			data: {
				text: text,
				sid1: sid1,
				sid2: sid2
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				location.reload();
			}
		});
	})

	//这里是添加人物弹窗
	$(".members .member .member-add>img").click(function(){
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#custom").css("display","block")
	})
	$("#custom .custom-box").click(function(event){
		event.stopPropagation()
		$('body').css("overflow", 'scroll')
		$("#custom").css("display","none")
	})
	$("#custom .custom-box .content").click(function(event){
		event.stopPropagation()
	})
	$("#custom .custom-box .content .title i").click(function(event){
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#custom").css("display","none")
	})
	//项目添加好友
	$('#custom li .choics').click(function(){
		$(this).toggleClass("checkeds")
	})
	$('.Invitation button').click(function() {
		var proid = $('#proid1').val();
		var leng = $(".friends .checkeds").size();
		var arr = new Array();
		for (var i=0; i<leng; i++) {
			arr[i] = $(".friends .checkeds").eq(i).parent().attr('data-uid');
		}
		$.ajax({
			url: '/ajax/muti_project_member_invite',
			type: 'POST',
			async: true,
			data: {
				proid: proid,
				uid: arr
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				$("#custom").css("display","none");
				location.reload();
			}
		});
	});
	//项目中好友权限设置
	$('.members .Jurisdiction i').click(function(){
		$(this).toggleClass("gou")
	})
	$('.members .set span').click(function(){
		$(this).parent().prev().find('i').show()
//		$('.members .Jurisdiction i').show()
		$('.members .Jurisdiction-else').hide();
		$('.members .Jurisdiction').show();
		$(this).parent().find('.tg').hide();
		$(this).parent().parent().find('input').addClass('ed').attr("disabled",false)
		
	})
	$('.members .set a').click(function(){
//		$(".Jurisdiction-else .rules_"+uid).html('');
		$(this).parent().parent().find(".rul").eq(0).html("")
		var proid = $('#proid1').val();
		var uid = $(this).parent().attr('data-uid');
		var cls = $(this).attr('class');

		var leng = $(".Jurisdiction .rules_"+uid+" i").size();
		var permissions = new Array();
		for (var i=0; i<leng; i++) {
			var cls2 = $(".Jurisdiction .rules_"+uid+" i").eq(i).attr('class');
			if (cls2 == 'gou') {
				permissions[i] = 1;
				console.log($(".Jurisdiction .rules_"+uid+" i").eq(i).parent().parent())
				$(this).parent().parent().find(".rul").eq(0).append($(".Jurisdiction .rules_"+uid+" i").eq(i).parent().get(0).outerHTML.replace('<i class="gou" style="display: inline;"></i>','').replace('<i style="display: inline;" class="gou"></i>',''))
			} else {
				permissions[i] = 0;
			}
		}
		$('.members .Jurisdiction-else').show();
		$('.members .Jurisdiction').hide();

		if(cls == 'confirm') {
			var group = $(".group_"+uid).val();
			$.ajax({
				url: '/ajax/set_member_permissions',
				type: 'POST',
				async: true,
				data: {
					proid: proid,
					uid: uid,
					permissions: permissions,
					group: group
				},
				timeout: 5000,
				dataType: 'json',
				success: function(data){
					//console.log(data);
				}
			});
		}

		$(this).parent().prev().find('i').hide()
		$(this).parent().find('.tg').show();
		$(this).parent().parent().find('input').removeClass('ed').attr("disabled",true)
	})
	
	
	//这里是移除成员弹窗
	$(".people-id .rol .right .set i").click(function(){
		$(window).scrollTop(0);

		var uid = $(this).parent().attr('data-uid');
		var uname = $(this).parent().attr('data-uname');
		var avatar = $(this).parent().attr('data-avatar');
		var proid = $('#proid1').val();

		$('#yc_uid').val(uid);
		$('#yc_proid').val(proid);
		$('#yc_uname').html(uname);
		$('#yc_avatar').attr('src', avatar);

		$('body').css("overflow", 'hidden')
		$(".member-dele").css("display","block")
	})
	$('#yc_btn').click(function() {
		var pid = $('#yc_proid').val();
		var uid = $('#yc_uid').val();

		$.ajax({
			url: '/ajax/del_project_member',
			type: 'POST',
			async: true,
			data: {
				pid: pid,
				uid: uid,
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				location.reload();
			}
		});
	});
	$(".member-dele .dele-box").click(function(event){
		event.stopPropagation()
		$('body').css("overflow", 'scroll')
		$(".member-dele").css("display","none")
	})
	$(".member-dele .dele-box .content").click(function(event){
		event.stopPropagation()
		$(".member-dele").css("display","block")
		
	})
	$(".member-dele .dele-box .content i").click(function(event){
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$(".member-dele").css("display","none")
	})
	
	//这里是私信弹窗
	$(".members .right .set em").click(function(){
		$(window).scrollTop(0);

		var userid2 = $(this).parent().attr('data-uid');
		var uname = $(this).parent().attr('data-uname');

		$('#chat_userid2').val(userid2);
		$('#chat_uname').html(uname);

		var str = '';
		$.ajax({
			url: '/ajax/user_chat',
			type: 'POST',
			async: true,
			data: {
				userid2: userid2
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				$.each(data.errmsg, function (i, n) {
					if(n.sendtype == 2) {
						str += '<div class="item"><div class="people"><img src="'+n.avatar2+'" alt="" /></div><div class="text"><p>'+n.content+'</p><span>'+n.sendtime+'</span><em></em></div></div>';
					} else {
						str += '<div class="item host"><div class="text"><p>'+n.content+'</p><span>'+n.sendtime+'</span><em></em></div><div class="people"><img src="'+n.avatar1+'" alt="" /></div></div>';
					}
				});
				$('#letter .containerh').html(str);
				lct = document.getElementById('chat_container');
				lct.scrollTop = Math.max(0, lct.scrollHeight - lct.offsetHeight);
			}
		});

		$('body').css("overflow", 'hidden')
		$("#letter").css("display","block")
	})
	$("#letter .letter-box").click(function(event){
		event.stopPropagation()
		$('body').css("overflow", 'scroll')
		$("#letter").css("display","none")
	})
	$("#letter .letter-box .content").click(function(event){
		event.stopPropagation()
		$("#letter").css("display","block")
		
	})
	$("#letter .letter-box .content .title i").click(function(event){
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#letter").css("display","none")
	})
	
	
	//这里是角色下面的个人介绍
	$(".members .member .member-add .peon-item").hover(function(){
		that=$(this)
		t=setTimeout(function(){
			that.find(".people-id").show()
		},300)
	},function(){
			that.find(".people-id").hide()	
			clearTimeout(t)
	})
	
	
	
	//这里是更多留言弹窗
	$("#moveleave .moveleave-box .content .title i").click(function(){
		$('#moveleave ').css('display',"none")
		$('body').css("overflow", 'scroll')
	})
	$(".product .right .message .person strong").click(function(){
		$('#moveleave ').css('display',"block")
		$('body').css("overflow", 'hidden')
		$(window).scrollTop(0);
		
	})
	$(".product .right .message .leave a").click(function(){
		$('#moveleave ').css('display',"block")
		$('body').css("overflow", 'hidden')
		$(window).scrollTop(0);
		
	})

	//这里是添加人物时候的弹窗 导航切换效果
	$("#custom .caption a").click(function(){
		index=$("#custom .caption a").index(this);
		$(this).addClass("cutv").siblings().removeClass("cutv");
		console.log(index)
		$("#custom .custom-box .content .container .mode").eq(index).css("display","block").siblings().css("display","none")
	});
	
	//这里是批量编辑
	$(".detail .detail-box .detail-title .change .batch").click(function(){
	
		$(".detail-item .all-select i").css('display','block');
		$(".detail-item .replace-check i").css('display','block');
		$(".detail-item .all i").css('display','block')
		$('#allfloat').attr('disabled',false)
//		$(".detail .detail-box .detail-item ul li .count a").css('display','inline-block')
//	   $('.detail .detail-box .detail-item input').attr('disabled',false)
		
		$("#right-edit").hide();
		$(".detail .detail-box .detail-title .change-edit").show();
		$('.detail .detail-box .detail-item ul li .radio').show()
		$('.containerp .box .boximg label').css('display','block')
	});
	
	$('.detail .detail-box .detail-item input').attr('disabled',true)
	
	
	//这里是内容以里面的计算
//	$('.detail .detail-box .detail-item ul li .jia input').on('keyup',function(){
//		var values=$(this).val()
//		
//		var nextvalue=$(this).parent().next().find('input').val();
//		if(nextvalue==''||nextvalue<=0){
//			nextvalue=0
//		}
//		
//		var money=parseInt(values)+Number(values*(nextvalue/100)*1);
//		console.log(money)
//		$(this).parent().parent().find('.substro').text(money)
//	})
	
	$('.detail .detail-box .detail-item ul li .flo input').on('keyup',function(){
//		alert(0)
		var values=($(this).val()/100)
		
		var nextvalue=Number($(this).parent().prev().find('input').val());
		if(values==''||values<=0){
			values=0
		}
		
		var money=Number(nextvalue)+Number(nextvalue*values);
		console.log(money)
		$(this).parent().parent().find('.substro').text(money)
	})
	
	$(".detail .detail-box .detail-item ul li .radio").click(function(){
		$(this).toggleClass("checked")
	})
	
	//删除列表
	var arrr = [];
	$(".detail .change-edit a.dt").click(function(){

		 var block=$(".detail .detail-box .detail-item").css("display");
		// if(block == "block"){
		// 	var leng = $(".detail-item .checked").size();
		// 	var arr = new Array();
		// 	for (var i=0; i<leng; i++) {
		// 		arr[i] = $(".detail-item .checked").eq(i).attr('data-proid');
		// 	}

			
			if(block == "block"){
				$(".detail-item ul li .author .all-select i").each(function(){

					if($(this).hasClass('ck')){

						var product = $(this).parent('.all-select').parent('.author').parent('li').attr('data-proid');
						// arr[i] = product;
						arrr.push(product);

					}

				})

				$.ajax({
					url: '/ajax/muti_project_product_edit',
					type: 'POST',
					async: true,
					data: {
						type: 3,
						proid: arrr
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
						// $(".detail .detail-box .detail-item ul .checked").parent().parent().remove();
						$(".detail-item ul li .author .all-select .ck").parent().parent().parent().remove();
					}
				});

			} else {
				$(".containerp .box .boximg label").each(function(){

					if($(this).hasClass('checked')){
						var product = $(this).parent().parent().attr('data-proid');
						// arr[i] = product;
						arrr.push(product);
						
						$(this).parents(".box").remove()
					}

				})

				$.ajax({
					url: '/ajax/muti_project_product_edit',
					type: 'POST',
					async: true,
					data: {
						type: 3,
						proid: arrr
					},
					timeout: 5000,
					dataType: 'json',
					success: function(data){
						//console.log(data);
						// $(".detail .detail-box .detail-item ul .checked").parent().parent().remove();
						$(".containerp .box .boximg label .checked").parent().parent().parent().remove();
					}
				});

			}
		// } else {
		// 	var leng=$(".containerp .checked").size();
		// 	for (var i=0;i<leng;i++) {
		// 		var m = $(".containerp .checked").eq(i).parent().parent().parent().attr('data-proid');
		// 		console.log(m);
		// 	}
		// 	$(".containerp .checked").parent().parent().remove();
		// }

	})
	$(".detail .detail-title .delete").click(function() {
		$(".detail-item ul li .author .all-select i").each(function(){
			if($(this).hasClass('ck')){
				var product = $(this).parent('.all-select').parent('.author').parent('li').attr('data-proid');
				arrr.push(product);
			}
		})
		$.ajax({
			url: '/ajax/muti_project_product_edit',
			type: 'POST',
			async: true,
			data: {
				type: 3,
				proid: arrr
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				// $(".detail .detail-box .detail-item ul .checked").parent().parent().remove();
				$(".detail-item ul li .author .all-select .ck").parent().parent().parent().remove();
			}
		});
	});
	$('.detail .detail-box .detail-title .change-edit a.win').click(function(){
		//$(".detail-item .all-select i").css('display','none');
//		$(".detail-item .replace-check i").css('display','none');
		$(".detail-item .all i").css('display','none')
		$('.detail .detail-box .detail-item input').attr('disabled',true)
		
		$(".detail .detail-box .detail-title .trade").css('display','inline-block')
//		$(".detail .detail-box .detail-title .check_all").css('display','inline-block')
		
//		$('.containerp .box .boximg label').css('display','none')
		
		
		$('.detail .detail-box .detail-item ul li .radio').hide();
		$(".detail .detail-box .detail-title .change-edit").hide();
		$("#right-edit").show();
		$('.detail .detail-box .detail-item ul li .brand span').css("opacity","1")
		
		$(".all-select i").removeClass("ck")
		$(".containerp .box .boximg label").removeClass("checked");
		$('.detail .detail-box .detail-title .check_all i').removeClass("bgcolor");
		$('.detail .detail-box .detail-title .check_all span').text("全选");
		$(".detail .detail-box .detail-title .stripe").css("display","inline-block")
	})
	
//	$('.detail .detail-box .detail-title .change i').click(function(){
//		$(this).parent().siblings().toggle()
//		$(this).next().next().toggle()
//		$(this).prev().prev().prev().toggle()
//		$('.detail .detail-box .detail-item').toggle();
//		$('#containerp').toggle()
//	})

$('.detail .detail-box .detail-title .trade').click(function(){
	history.pushState({}, '', '?issee=1');
//	var block=$(".detail .detail-box .detail-item").css("display");
//		$(this).parent().siblings().toggle()
//		$(this).next().next().toggle()
//		$(this).prev().prev().prev().toggle()
//       if(block=="block"){
////       	$(".detail .detail-box .detail-title .change-edit").css("display","block")
////       	$(".detail .detail-box .detail-title #right-edit").css("display","none")
//          $(".detail .detail-box .detail-title .check_all").css("display","inline-block")
//       }else{
////       	$(".detail .detail-box .detail-title .change-edit").css("display","none")
////       	$(".detail .detail-box .detail-title #right-edit").css("display","block")
//          $(".detail .detail-box .detail-title .check_all").css("display","none")
//       }
      $(".detail .detail-box .detail-title .delete").css("display","none")
       $('.detail .detail-box .detail-title .stripe').removeClass("stri")
	   $(this).removeClass("tra")
       $('.detail .detail-box .detail-title .notes').css("display","none");
       $('.detail .detail-box .detail-title .out_red').css("display","none");
       $('.detail .detail-box .detail-title .check_all').css("display","inline-block");
		$('.detail .detail-box .detail-item').css("display","none");
		$('#containerp').css("display","block");

		// var onclick = $(".addProduct").attr('onclick');
		var src = "/library/project_product_add/"+projectId+"?issee=1";
		$(".addProduct").attr('onclick',"window.location.href='"+src+"'");

	})

$('.detail .detail-box .detail-title .stripe').click(function(){
		history.pushState({}, '', '?issee=2');
	   $(this).addClass("stri")
	   $('.detail .detail-box .trade').addClass("tra")
	   
       $('.detail .detail-box .detail-title .out_red').css("display","inline-block");
	
		$('.detail .detail-box .detail-item').css("display","block");
		$('.detail .detail-box .detail-title .notes').css("display","inline-block");
		$('#containerp').css("display","none");
//		$('.detail .detail-box .detail-title .check_all').css("display","none");

		var src = "/library/project_product_add/"+projectId+"?issee=2";
		$(".addProduct").attr('onclick',"window.location.href='"+src+"'");

	})
	//这里是产品清单右侧点击背景改变
//	$('.detail .detail-box .detail-title .change-edit a').click(function(){
//		$(this).addClass("bgcolor").siblings().removeClass('bgcolor')
//	})
	$(".containerp .box .boximg label").click(function(){
		$(this).toggleClass("checked")
		if($(this).hasClass("checked")){
			$(".detail .detail-box .detail-title .change-edit").css("display","block")
         	$(".detail .detail-box .detail-title #right-edit").css("display","none")
         	$(".detail .detail-box .detail-title .trade").css("display","none")
         	$(".detail .detail-box .detail-title .stripe").css("display","none")
			
		}
	})
	
	
	
	//这里是移除弹窗的效果
	

//$(".detail .detail-box .detail-title .change-edit a").eq(2).click(function(event){
//		event.preventDefault();
//		event.cancelBubble
//		event.stopPropagation();
//		$(window).scrollTop(0);
//		$('body').css("overflow",'hidden')
//	    // $("#move").css('display','block');
//	    // $("#move .move-box .content .title span").text('移除至')
//	    $("#caiji").css('display','block');
//	    $("#caiji .caiji-box .caiji-content .caiji-title span").text('移除至');
//	    $('#colPro1').attr('action','../../member/moveProductS');
//	     animate()
////	    var src=$(this).prev().attr("src");
////	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
//	
//	})

$(".detail .detail-box .detail-title .check_all").click(function(event){
	
	$(this).find("i").toggleClass("bgcolor")
     var block=$(".detail .detail-box .detail-item").css("display");
	if(block=="block"){
		if($(this).find("i").hasClass("bgcolor")){
			$('.detail .all-select i').addClass("ck")
			$('.detail .check_all span').text("清除")
			$(".detail .detail-box .detail-title .delete").css("display","inline-block")
//			$(".detail .detail-box .detail-title .stripe").css("display","none")
//			
//			$(".detail .detail-box .detail-title .change-edit").css("display","block")
//       	$(".detail .detail-box .detail-title #right-edit").css("display","none")
//       	$(".detail .detail-box .detail-title .trade").css("display","none")
			$('.detail .detail-box .replace-fab i').addClass('ck')
		}else{
			$('.detail .all-select i').removeClass("ck")
			$('.detail .check_all span').text("全选")
			$('.detail .detail-box .replace-fab i').removeClass('ck')
			$(".detail .detail-box .detail-title .delete").css("display","none")
		}
		
	}else{
		if($(this).find("i").hasClass("bgcolor")){
			$(".detail .detail-box .detail-title .stripe").css("display","none")
			$('.containerp .box .boximg label').addClass("checked")
			$('.detail .check_all span').text("清除")
			
			$(".detail .detail-box .detail-title .change-edit").css("display","block")
         	$(".detail .detail-box .detail-title #right-edit").css("display","none")
         	$(".detail .detail-box .detail-title .trade").css("display","none")
		}else{
			$('.containerp .box .boximg label').removeClass("checked")
			$('.detail .check_all span').text("全选")
			
		}
		
		
	}
	})



//$(".detail .detail-box .detail-title .change-edit a").eq(1).click(function(event){
//	// alert(1);
//		event.preventDefault();
//		event.cancelBubble
//		event.stopPropagation();
//		$(window).scrollTop(0);
//		$('body').css("overflow",'hidden')
//	    // $("#move").css('display','block');
//	    // $("#move .move-box .content .title span").text('拷贝至');
//	    $("#caiji").css('display','block');
//	    $("#caiji .caiji-box .caiji-content .caiji-title span").text('拷贝至');
//	    $('#colPro1').attr('action','../../member/copyProductS');
//	    animate()
////	    var src=$(this).prev().attr("src");
////	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
//	
//	})

//这里是产品清单
$('.detail .set .set-sect').click(function(){
	
	var text=$(this).find('p').text()
	if(text=="可修改"){
		//$('#help').css('display','block')
	}
	$(this).next().slideToggle()
})
$('#help .help-box .title i').click(function(){
		$('#help').css('display','none')
	
})

//mydel
//$('.detail .set .selct-box a.Material').click(function(){
//	$('#help').css('display','block');
////	var proid = $(this).parent().parent().parent().attr('data-proid');
////	$('.plan').attr('data-proid', proid);
//})

$('.detail .detail-box .detail-item ul li .operation a.Material').click(function(){
//	$('#help').css('display','block');
//	var proid = $(this).parent().parent().parent().attr('data-proid');
//	$('.plan').attr('data-proid', proid);
})
$('.plan').click(function() {
	var proid = $('#proid1').val();
	var sid = $(this).attr('data-proid');
//	var tyid = $(this).attr('data-tyid');
//	window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+tyid;
	window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+2;
});


//这里是补充设置
//$('.detail .cre .cre-box').click(function(){
//	//$(this).find('.cre-sub').slideToggle()
//	var sid = $(this).parent().parent().attr('data-sid');
//
//	$.ajax({
//		url: '/ajax/project_product_status',
//		type: 'POST',
//		async: true,
//		data: {
//			sid: sid,
//			status: 2
//		},
//		timeout: 5000,
//		dataType: 'json',
//		success: function(data){
//			//console.log(data);
//			location.reload();
//		}
//	});
//})
//$('.detail .cre .cre-box a').click(function(){
//	var sid = $(this).parent().parent().parent().parent().attr('data-sid');
//	var texts=$(this).text()
//	//var p= $(this).parent().prev('p').text(texts)
//
//	var textss = $(this).parent().prev().text();
//	if(texts=='删除'){
//		$.ajax({
//			url: '/ajax/project_product_status',
//			type: 'POST',
//			async: true,
//			data: {
//				sid: sid,
//				status: 2
//			},
//			timeout: 5000,
//			dataType: 'json',
//			success: function(data){
//				//console.log(data);
//				location.reload();
//			}
//		});
////		$(this).parent().parent().parent().parent().find('input').attr('disabled',true);
////		$(this).parent().parent().parent().parent().find('a').eq(0).css('display','none');
////		$(this).parent().parent().parent().parent().find('a').eq(1).css('display','none');
//		
//	}else{
//		$(this).parent().parent().parent().parent().find('input').attr('disabled',false);
//		$(this).parent().parent().parent().parent().find('a').eq(0).css('display','inline-block');
//		$(this).parent().parent().parent().parent().find('a').eq(1).css('display','inline-block');
//		$(this).parent().parent().parent().parent().find('i').css('display','block');
//
//		$(this).parent().parent().parent().css('display','none');
//		$(this).parent().parent().parent().next().css('display','block');
//	}
//
//})
$('.detail .cre .cre-box').click(function() {
	var sid = $(this).parent().parent().attr('data-sid');
	$.ajax({
		url: '/ajax/project_product_status',
		type: 'POST',
		async: true,
		data: {
			sid: sid,
			status: 2
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			location.reload();
		}
	});
});


$('.detail .replace-item .sure').click(function(){
//	$(this).css('display','none');
//	$('.detail .cre').css('display','block');
//
//	$(this).parent().parent().parent().parent().find('input').attr('disabled',true);
//	$(this).parent().parent().parent().parent().find('a').eq(0).css('display','none');
//	$(this).parent().parent().parent().parent().find('a').eq(1).css('display','none');
//	$(this).parent().parent().parent().parent().find('i').css('display','none');
	
	var sid = $(this).parent().attr('data-sid');
	var pp = new Array();
	$(this).parent().find("input[type='text']").each(function(){
		pp.push($(this).val());
	});

	$.ajax({
		url: '/ajax/project_product_reset',
		type: 'POST',
		async: true,
		data: {
			sid: sid,
			pp: pp,
			mid: 2
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			location.reload();
		}
	});
})

$('.detail .replace-item .use').click(function(){

	var sid = $(this).parent().parent().parent().attr('data-sid');
	$.ajax({
		url: '/ajax/project_product_change',
		type: 'POST',
		async: true,
		data: {
			sid: sid
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			location.reload();
		}
	});

})

$('.operation a.a1').click(function() {
	var texts = $(this).text();
	if(texts=='添加比对') {
		var proid = $('#proid1').val();
		var sid = $(this).parent().parent().parent().attr('data-proid');
		window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+1;
		return false;
	} else if(texts=='添加材料') {
		var proid = $('#proid1').val();
		var sid = $(this).parent().parent().parent().attr('data-proid');
		$(".plan").attr('data-proid', sid);
		window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+2;
		return false;
	} else if(texts=='删除产品') {
		var sid = $(this).parent().parent().parent().attr('data-proid');

		$.ajax({
			url: '/ajax/project_product_status',
			type: 'POST',
			async: true,
			data: {
				sid: sid,
				status: 2
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				location.reload();
			}
		});
		return false;
	}
})


$('.detail .set .selct-box a').click(function(){
	var texts=$(this).text()
//	$(this).parent().prev().find('p').text(texts);
	$(this).parent().slideUp();
	
//	if(texts=='锁定方案'){
//		$(this).parent().prev().css('background','#777')
//		$(this).parent().parent().parent().find('.togg-no').css("display","none")
//		
////		$(this).parent().parent().parent().find('.count-item').css("display","none")
////		$(this).parent().parent().parent().find('.togg-no').css("display","block")
//		return false;
//		
//	} else if(texts=='修改') {
//		$(this).parent().parent().css('display','none')
//		$(this).parent().parent().next().css('display','block')
//		$(this).parent().parent().parent().find('input').attr('disabled',false)
//		$(this).parent().parent().parent().find('i').css('display','block')
//		$(this).parent().parent().parent().find('.togg-no').css("display","block")
////		$(this).parent().parent().parent().find('.count-item').addClass("togg-edit")
//		return false;
//	} else if(texts=='补充调整') {
//		var proid = $('#proid1').val();
//		var sid = $(this).parent().attr('data-proid');
//		window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+2;
//		return false;
//	} else {
//		$(this).parent().prev().css('background','#055cfc')
//		$(this).parent().parent().parent().find('.togg-no').css("display","block")
//		
//	}

	if(texts=='补充备选产品') {
		var proid = $('#proid1').val();
		var sid = $(this).parent().attr('data-proid');
		window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+1;
		return false;
	} else if(texts=='补充包含材料') {
		var proid = $('#proid1').val();
		var sid = $(this).parent().attr('data-proid');
		$(".plan").attr('data-proid', sid);
		//window.location.href = '/library/project_product_add2/'+proid+'/'+sid+'/'+2;
		return false;
	} else if(texts=='删除') {
		var sid = $(this).parent().attr('data-proid');

		$.ajax({
			url: '/ajax/project_product_status',
			type: 'POST',
			async: true,
			data: {
				sid: sid,
				status: 2
			},
			timeout: 5000,
			dataType: 'json',
			success: function(data){
				//console.log(data);
				location.reload();
			}
		});
		return false;
	}

})
$('.detail .detail-box .detail-item ul li .sure').click(function(){
	var sid = $(this).parent().parent().attr('data-proid');
	var pp = new Array();
	$(this).parent().find("input[type='text']").each(function(){
		pp.push($(this).val());
	});

	$.ajax({
		url: '/ajax/project_product_reset',
		type: 'POST',
		async: true,
		data: {
			sid: sid,
			pp: pp,
			mid: 1
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			location.reload();
		}
	});

//	$(this).css('display','none')
//	$(this).prev().css('display','block')
//	$(this).toggleClass('ck')
//	$(this).parent().find('input').attr('disabled',true)
//	$(this).parent().find('i').css('display','none')
})
//$('.detail .replace-bak i').click(function(){
////	$(this).toggleClass('ck')
//if($(this).parents("li").find(".author .all-select i").hasClass("ck")){
//	$(this).parents("li").find(".author .all-select i").removeClass('ck')
//}
//$(this).addClass("ck").parents(".replace-item").siblings().find('.replace-bak i').removeClass("ck")
//})
//
$('.detail .replace-fab i').click(function(){
	$(this).toggleClass('ck')
//$(this).addClass("ck")
})

$('.detail .detail-box .detail-item ul li .same-select i').click(function(){
	$(this).toggleClass('ck')
	var mum=0
//	$(this).parents("li").find('.same-select i').removeClass("ck")
if($(this).parents('.same').hasClass("author")){
	if($(this).hasClass("ck")){
		$(this).parents(".same").next().find('.same-select i').removeClass("ck")
	}
}else{
	if($(this).hasClass("ck")){
		$(this).parents("li").find(".all-select i").removeClass("ck")
		$(this).parents(".same").siblings().find('.same-select i').removeClass("ck")
	}
}
	
//	if($(this).hasClass("ck")){
//		$(".detail .detail-box .detail-title #right-edit").css("display","none")
//		$(".detail .detail-box .detail-title .change-edit").css("display","block")
//		$(".detail .detail-box .detail-title .trade").css('display','none')
//		$(".detail .detail-box .detail-title .stripe").css("display","none")
//	}
//	if($(this).hasClass("ck")){
//		$(this).parents(".same").siblings().find('.same-select i').removeClass('ck')
//		$(this).parents("li").find('.all-select i').removeClass('ck')
//	}
	var length=$('.detail .detail-box .detail-item ul li .same-select i.ck').size()
	
	for (var i=0;i<length;i++) {
	  mum+=parseInt($('.detail .detail-box .detail-item ul li .same-select i.ck').parents(".same").eq(i).find('.jia-item p').text())
		
	}
	
	$(".detail .detail-box .detail-item .bottom-total .pieces").text("已选择"+mum+'件产品')
	
})



$('.detail .detail-box .detail-item .thead .all-select i').click(function(){
	
	var mum=0
	$(this).toggleClass('ck');
	if($(this).hasClass('ck')){
//		$(".detail .detail-box .detail-title .stripe").css("display","none")
		$('.detail .detail-box .detail-item ul li .all-select i').addClass('ck')
//		$(".detail .detail-box .detail-title #right-edit").css("display","none")
//		$(".detail .detail-box .detail-title .change-edit").css("display","block")
//		$(".detail .detail-box .detail-title .trade").css('display','none')
		$('.detail .detail-box .replace-fab i').addClass('ck')
      $(".detail .detail-box .detail-title .delete").css("display","inline-block")
		
	}else{
		$('.detail .detail-box .detail-item ul li .all-select i').removeClass('ck')
		$('.detail .detail-box .replace-fab i').removeClass('ck')
      $(".detail .detail-box .detail-title .delete").css("display","none")
		
		
	}
	
	var length=$('.detail .detail-box .detail-item ul li .same-select i.ck').size()
	
	for (var i=0;i<length;i++) {
	  mum+=parseInt($('.detail .detail-box .detail-item ul li .same-select i.ck').parents(".same").eq(i).find('.jia-item p').text())
		
	}
	
	$(".detail .detail-box .detail-item .bottom-total .pieces").text("已选择"+mum+'件产品')
	
	
})
//这里是底部的全选按钮
$('.detail .bottom-total .all i').click(function(){
	var mum=0
	$(this).toggleClass('ck');
	if($(this).hasClass('ck')){
//		$(".detail .detail-box .detail-title .stripe").css("display","none")
		$('.detail .detail-box .detail-item ul li .all-select i').addClass('ck')
//		$(".detail .detail-box .detail-title #right-edit").css("display","none")
//		$(".detail .detail-box .detail-title .change-edit").css("display","block")
//		$(".detail .detail-box .detail-title .trade").css('display','none')
	}else{
		$('.detail .detail-box .detail-item ul li .all-select i').removeClass('ck')
		
	}
	
	var length=$('.detail .detail-box .detail-item ul li .same-select i.ck').size()
	
	for (var i=0;i<length;i++) {
	  mum+=parseInt($('.detail .detail-box .detail-item ul li .same-select i.ck').parents(".same").eq(i).find('.jia-item p').text())
		
	}
	
	$(".detail .detail-box .detail-item .bottom-total .pieces").text("已选择"+mum+'件产品')
	
})

$('.detail .bottom-total .expot i').click(function(){
	$(this).toggleClass('ck')
})

$('.generate-order').click(function() {
	var proid = $('#proid1').val();
	var arr = [];
	$(".prolist i").each(function(){
		if($(this).hasClass('ck')){
			var sid = $(this).attr('data-sid');
			arr.push(sid);
		}
	})
	if (arr === undefined || arr.length == 0) {
		//alert('请勾选至少一件产品');return false;
		$(".prolist i").each(function(){
			var sid = $(this).attr('data-sid');
			arr.push(sid);
		})
	}
	$.ajax({
		url: '/ajax/project_product_setorder',
		type: 'POST',
		async: true,
		data: {
			proid: proid,
			sid: arr
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			window.location.href = '/library/project_order/'+proid+'/'+data.errmsg.orderid;
			//console.log(data);
			//location.reload();
		}
	});
});


//这里是清单记录弹窗
$('.detail .detail-box .detail-title .notes').click(function(){
	$(window).scrollTop(0);
	$('body').css('overflow','hidden')
	$('#record').show()
})
$('#record .record-box .content .title i').click(function(){
	$(window).scrollTop(800);
	$('body').css('overflow','scroll')
	$('#record').hide()
})

$("#move .move-box .content .title i").click(function(event) {
	event.preventDefault()
	event.stopPropagation();
	//		$(window).scrollTop(0);
	$('body').css("overflow", 'scroll')
	$("#move").css('display', 'none')
})
$("#move .move-box").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();
	$('body').css("overflow", 'scroll')
	$("#move").css('display', 'none')

})
$("#move .move-box .content").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();
});
	
	
//这里是里面弹窗里面的 输入效果
var inputVal = $('#move .move-box .content .move-content .crea-box .output input') /*这里是弹出窗上面的输入框*/
inputVal.on("keyup", function() {
	var values = inputVal.val();

	if(values == "") {
		$("#move .move-box .content .move-content .select .select-show").css("display", 'block');
		$("#move .move-box .content .move-content .creat .creat-box").css("display", 'none');
	} else {
		$("#move .move-box .content .move-content .select .select-show").css("display", 'none');
		$("#move .move-box .content .move-content .creat .creat-box").css("display", 'block');
		$("#move .move-box .content .move-content .creat .creat-box i").text(values);
	}

})

//点击选择已创建的材思库
$("#move .move-box .content .move-content .select-box .item").on("click", function() {
	$(this).addClass('addselect').siblings().removeClass("addselect")
})

//添加到已创建的材思库

$("#move .move-box .content .move-content .creat .creat-box").on("click", function() {

	var length = $('#move .move-box .content .move-content .select-box .item').length;
	var values = inputVal.val();
	var item = document.getElementsByClassName("item")
	var atr = []
	for(i = 0; i < length; i++) {
		if(atr.indexOf(item[i].innerText) <= -1) {
			atr.push(item[i].innerText)
		}
		//					return atr
	}

	if(atr.indexOf(values) >= 0) {
		alert("已创建这个材思库3333")
	} else {
		
		$('#move .move-box .content .move-content .select-show').css("display", 'block')
			//				var div=document.createElement('<div class="item"></div>')

		$('#move .move-box .content .move-content .select-box').append("<div class='item'>" + values + "</div>");

		$('#move .move-box .content .move-content .select-box .item').eq(length).insertBefore($('#move .move-box .content .move-content .select-box .item').eq(0))
	}

	$("#move .move-box .content .move-content .select-box .item").on("click", function() {
		$(this).addClass('addselect').siblings().removeClass("addselect")
	})

})

//这里是点确定添加动画
function animate(){
	var text=$('#move .move-box .content .title span').text()
var anima=""
 anima="<div class='winss'><div class='win-box'><div class='win-content'><img src='img/laught_03.png' alt='' /><span>'+text+'</span><i></i></div></div></div>";

$('#move .move-box .content .move-content .tijiao button').click(function(){
	$('#move').hide();
	$('body').css("overflow","scroll");
	$('body').append(anima);
	
	//这里是移除动画
$('.winss .win-box .win-content i').click(function(){
	$('.winss').remove()
})
})

}

//这是分享弹出层

$(".sub-nav span").click(function(event) {
	event.preventDefault();
	event.cancelBubble
	event.stopPropagation();
	$(window).scrollTop(0);
	$('body').css("overflow", 'hidden')
	$("#share").css('display', 'block');

})

//	$(".container .box a").click(function(event){
////		event.preventDefault()
//		event.stopPropagation();
//	})
$("#share .share-content .share-title i").click(function(event) {
	event.preventDefault()
	event.stopPropagation();
	//		$(window).scrollTop(0);
	$('body').css("overflow", 'scroll')
	$("#share").css('display', 'none')
})
$("#share .play-share").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();
	$('body').css("overflow", 'scroll')
	$("#share").css('display', 'none')

})
$("#share .share-content ").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();

});

$('#orderdesc').attr("disabled",false)

$('#checkorder').click(function() {
	var proid = $('#proid1').val();
	var desc = $('#orderdesc').val();
	window.location.href = '/library/project_order/'+proid+'/set/'+desc;
});

//这里是上传文件

$('.sub-nav .files a.add').click(function(){
  	$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#file").css('display','block');
})

$('#file .title i').click(function(){

		$('body').css("overflow",'scroll')
	    $("#file").css('display','none');
})

$('.load-con .del').click(function() {
	var id = $(this).parent().parent().attr('data-docid');
	$.ajax({
		url: '/ajax/del_project_doc',
		type: 'POST',
		async: true,
		data: {
			id: id
		},
		timeout: 5000,
		dataType: 'json',
		success: function(data){
			//console.log(data);
			location.reload();
		}
	});
});


'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));

	
})