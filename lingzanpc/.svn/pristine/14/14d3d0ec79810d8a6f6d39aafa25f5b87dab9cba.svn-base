$(function(){
//	$(".container .box .delete").click(function(){
//		$(this).offsetParent().remove()
//	})
	//这里是上传产品弹窗
	$(".container .box .upload-box").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#picked").css('display','block');
	    
	})
	$("#picked .picked-box .picked-content .picked-show .picked-left .title-item").click(function(event) {
		event.stopPropagation()
		$(this).find('div.class-item').slideToggle()
		$(this).siblings().find('div.class-item').slideUp()
	})
	$("#picked .picked-box .picked-content .picked-show .picked-left .title-item .class-item").click(function(event) {
		event.stopPropagation()
		$(this).css("display", "block")
			//		$(this).find('div.class-item').slideToggle()
	})
	$("#picked .picked-box .picked-content .picked-show .picked-left .title-item .class-item a").click(function() {
		var text = $(this).text();
		$(this).parent().prev().text(text);
		$(this).parent().slideUp()
	})
	$("#picked .picked-box .picked-content").click(function() {
		
		$('#picked .class-item ').slideUp()
	})
	
	//上传弹窗大小变化
	$('#picked .picked-box .change').click(function(){
		var text=$("#picked .picked-box .change span").text();
		if(text=="基本选项"){
			$(this).css("padding","10px 50px")
			$("#picked .picked-left .back-two").css("display","none")
			$("#picked .picked-left").css("width","250px")
			$("#picked .picked-box .picked-content").css("width","700px")
			$("#picked .picked-box .change span").text("全部选项")
			$("#picked .picked-box .change i").css({transform:"rotate(180deg)"})
		}else{
			$(this).css("padding","10px")
			
			$("#picked .picked-left .back-two").css("display","block")
			$("#picked .picked-left").css("width","400px")
			$("#picked .picked-box .picked-content").css("width","800px")
			$("#picked .picked-box .change span").text("基本选项")
			$("#picked .picked-box .change i").css({transform:"rotate(-0deg)"})
		}
	})

	$(".containers .box .edit").click(function(event){
		
		var src=$(this).prev().prev().find('img').attr('src');
	    $('#picked .picked-box .picked-content .picked-show .picked-left img').attr("src",src)
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#picked").css('display','block');
	})
	
})