$(function() {
	
	//普通用户点击采集弹窗
	$(".product .right .title .collect-pub").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#pick").css('display', 'block');

	})
	
	$(".product .right .follow .follow-r").click(function(){
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#interset").css('display', 'block');
	})
	//	$('.product .left .item ul li').eq(0).css("opacity","0.6")

//	var length = $('.product .left .show ul li').length
//	var index = 0;
//	boxWidth = $('.product .left .show img').width()
//	$('.product .left .show ul').css('width', boxWidth * length + "px");
//	$('.product .left a.arror-r').click(function() {
//		index >= length - 1 ? index = 0 : index++
//			$('.product .left .show ul').animate({
//				"marginLeft": -boxWidth * index + "px"
//			}, 500);
//		$('.product .left .item ul li').eq(index).addClass('opa').siblings().removeClass("opa")
//			//		css("marginLeft",-800*index+"px")
//			//		index++
//	})
//	$('.product .left a.arror-l').click(function() {
//		index <= 0 ? index = length - 1 : index--
//			$('.product .left .show ul').animate({
//				"marginLeft": -boxWidth * index + "px"
//			}, 500);
//		$('.product .left .item ul li').eq(index).addClass('opa').siblings().removeClass("opa")
//			//		css("marginLeft",-800*index+"px")
//			//		index++
//	})

	$('.product .left .item ul li').click(function() {
		var index = $("ul li").index(this);
		$(this).addClass("opa").siblings().removeClass("opa");
		$('.product .left .show ul').animate({
			"marginLeft": -boxWidth * index + "px"
		}, 500);
	})

	$(window).scroll(function() {

		if(document.documentElement.scrollTop >= 140 || $('body').scrollTop() >= 140) {
			$(".product .left").css("position", 'fixed').css("top", "100px")
		} else {
			$(".product .left").css("position", 'fixed').css("top", "100px")
		}

	})

	//这里是添加材思库

	$(".product .right .price .add").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#library").css('display', 'block');

	})

	$(".container .box a").click(function(event) {
		//		event.preventDefault()
		event.stopPropagation();
	})
	$("#library .library-box .library-content .library-title i").click(function(event) {
		event.preventDefault()
		event.stopPropagation();
		//		$(window).scrollTop(0);
		$('body').css("overflow", 'scroll')
		$("#library").css('display', 'none')
	})
	$("#library .library-box").click(function(event) {
		//		event.preventDefault()
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#library").css('display', 'none')

	})
	$("#library .library-box .library-content").click(function(event) {
		//		event.preventDefault()
		event.stopPropagation();

	});

	//这里是里面弹窗里面的 输入效果
	var inputVal = $('#library .library-box .library-content .library-show .library-right .output input') /*这里是弹出窗上面的输入框*/
	inputVal.on("keyup", function() {
		var values = inputVal.val();

		if(values == "") {
			$("#library .library-box .library-content .library-show .library-right .select .select-show").css("display", 'block');
			$("#library .library-box .library-content .library-show .library-right .creat .creat-box").css("display", 'none');
		} else {
			$("#library .library-box .library-content .library-show .library-right .select .select-show").css("display", 'none');
			$("#library .library-box .library-content .library-show .library-right .creat .creat-box").css("display", 'block');
			$("#library .library-box .library-content .library-show .library-right .creat .creat-box i").text(values);
		}

	})

	//点击选择已创建的材思库
	$("#library .library-box .library-content .library-show .library-right .select-box .item").on("click", function() {
		$(this).addClass('addselect').siblings().removeClass("addselect")
	})

	//添加到已创建的材思库

	$("#library .library-box .library-content .library-show .library-right .creat .creat-box").on("click", function() {

		var length = $('#library .library-box .library-content .library-show .library-right .select-box .item').length;
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
			alert("已创建这个材思库")
		} else {
			$('#library .library-box .library-content .library-show .library-right .select-show').css("display", 'block')
				//				var div=document.createElement('<div class="item"></div>')

			$('#library .library-box .library-content .library-show .library-right .select-box').append("<div class='item'>" + values + "</div>");

			$('#library .library-box .library-content .library-show .library-right .select-box .item').eq(length).insertBefore($('#library .library-box .library-content .library-show .library-right .select-box .item').eq(0))
		}

		$("#library .library-box .library-content .library-show .library-right .select-box .item").on("click", function() {
			$(this).addClass('addselect').siblings().removeClass("addselect")
		})

	})

	//这里是商家采集弹窗

	$(".product .right .title .collect").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#caiji").css('display', 'block');

	})

	

})