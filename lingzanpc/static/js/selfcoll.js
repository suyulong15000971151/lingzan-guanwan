$(function(){
//	$(".container .box .delete").click(function(){
//		$(this).offsetParent().remove()
//	})
//这里是点击选择坐标对应的字段
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
	
	
	
	
	$(".container .box .edit").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');
	})
	
})