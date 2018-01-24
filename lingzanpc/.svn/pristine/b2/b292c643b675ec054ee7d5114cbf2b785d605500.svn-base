$(function(){
	
	//这里是下载文档弹窗
		$(".product .right .title i").click(function(event){
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
	
	
	
	$('#share .share-content .share-item a').hover(function(){
		$(this).find('p').css("display","block")
	},function(){
		$(this).find('p').css("display","none")
	})
	
	//这里是分享二维码 样式修改
	
	
	//这里是转换成我的项目弹窗
	$(".detail .detail-box .detail-title .change span").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');

	})
	
	
	
	//这里是页面清单切换
	$('.detail .detail-box .detail-title .change i').click(function(){
		$('.detail .detail-box .detail-item').toggle();
		$(' .container').toggle();
		$('.detail .detail-box .detail-title .change span').toggle()
		
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
})
