$(function() {
	
	//这里是个人中心项目盒子居中
		 //盒子居中
   function boxCenter(){
   	  var clientWid=document.body.clientWidth;
    var boxnum=Math.floor(clientWid/275)
    console.log(boxnum)
    var boxwid=document.getElementById('man-show')
    boxwid.style.width=(boxnum*275)+'px'
    document.getElementById('man-box').style.width=(boxnum*275-20)+'px'
   }
 
   window.onresize=function(){
   	boxCenter()
   }
  boxCenter()
	
	$('#edit .edit-box .edit-content .edit-container textarea').css('width','100%')
	
	//这里是创建材思库弹窗
	$(".create").click(function(event) {
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#pick").css('display', 'block');
	})

	$("#pick .pick-box .pick-content .pick-show .pick-left .title-item").click(function(event) {
		event.stopPropagation()
		$(this).find('div.class-item').slideToggle()
		$(this).siblings().find('div.class-item').slideUp()
	})
	$("#pick .pick-box .pick-content .pick-show .pick-left .title-item .class-item").click(function(event) {
		event.stopPropagation()
		$(this).css("display", "block")
			//		$(this).find('div.class-item').slideToggle()
	})
	$("#pick .pick-box .pick-content .pick-show .pick-left .title-item .class-item a").click(function() {
		var text = $(this).text();
		$(this).parent().prev().text(text)
		$(this).parent().prev().prev().text(text);
		$(this).parent().slideUp()
	});
	$("#pick .pick-box .pick-content").click(function(){
		$("#pick .pick-left .class-item").slideUp()
	})

	//这里是编辑材思库弹窗
	$(".man-show .man-item .edit").click(function() {
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		var parent = $(this).offsetParent()
		$("body").css("overflow", "hidden")
		
		$("#pick").show(500);
		var flat = true;
		$("#pick .pick-box .pick-content .pick-title span").text("编辑项目")
		$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").addClass("put")
		$("#pick .pick-box .pick-content .pick-show .pick-right .submit a").css("display", "inline-block")
//		$("#edit .edit-box .edit-content .edit-container .delete .item-con em").click(function() {
//			if(flat) {
//				flat = false;
//				$(this).css("background", "red")
//			} else {
//				flat = true;
//				$(this).css("background", "#999")
//			}
//		});
//		$("#edit .edit-box .edit-content .edit-container button").click(function() {
//			if(flat == false) {
//				parent.remove()
//			}
//		})
	})
	$(".man-item .edits").click(function() {
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		var parent = $(this).offsetParent()
		$("body").css("overflow", "hidden")
		$("#edit").show(500);
		var flat = true;
		$("#edit .edit-box .edit-content .edit-container .delete .item-con em").click(function() {
			if(flat) {
				flat = false;
				$(this).css("background", "red")
			} else {
				flat = true;
				$(this).css("background", "#999")
			}
		});
		$("#edit .edit-box .edit-content .edit-container button").click(function() {
			if(flat == false) {
				parent.remove()
			}
		})
	})
	$(".box .edit").click(function() {

		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#picked").show(500);
	})
	$("#edit .edit-box").click(function(event) {
		event.stopPropagation()
		$("#edit").hide(500)
		$('body').css("overflow", 'scroll')
		
	})
	$("#edit .edit-box .edit-content .title i").click(function(event) {

		event.stopPropagation()
		$("#edit").hide(500)
		$('body').css("overflow", 'scroll')
		
	})
	$("#edit .edit-box .edit-content").click(function(event) {
		event.stopPropagation()

	})

	//这里是材思库编辑 下拉框
	$("#edit .edit-box .edit-content .edit-container .edit-item .item-con").click(function(event) {
		event.stopPropagation()
		$(this).find('.sele-edit').slideToggle()
		$(this).parent().siblings().find('.sele-edit').slideUp()
	})
	$("#edit .edit-box .edit-content .sele-edit").click(function(event) {
		event.stopPropagation()
		$(this).css("display", "block")
			//		$(this).find('div.class-item').slideToggle()
	})
	$("#edit .edit-box .edit-content").click(function(event) {
		event.stopPropagation()
		$("#edit .edit-box .edit-content .sele-edit").slideUp()
			//		$(this).find('div.class-item').slideToggle()
	})
	
	$("#edit .edit-box .edit-content .sele-edit a").click(function() {
		var text = $(this).text();
		$(this).parent().prev().text(text);
		$(this).parent().slideUp()
	});

	//这里是上传图片
//  获取创建材思库名称的值
//	$("#pick .select-box .item").click(function(){
//	  var val=$(".addselect").text();
//	  $("#pick .select-box input").text(val)
//	})
//	

//这里是公共的
$("#picked .picked-box .picked-content .picked-title i").click(function(event) {
	event.preventDefault()
	event.stopPropagation();
	//		$(window).scrollTop(0);
	$("#pick .pick-box .pick-content .pick-show .pick-right .submit button").removeClass("put")
	$('body').css("overflow", 'scroll')
	$("#picked").css('display', 'none')
	$("#pick .pick-right .submit a").css('display', 'none')
})
$("#picked .picked-box").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();
	$('body').css("overflow", 'scroll')
	$("#picked").css('display', 'none')

})
$("#picked .picked-box .picked-content").click(function(event) {
	//		event.preventDefault()
	event.stopPropagation();

});

//这里是里面弹窗里面的 输入效果
var inputVal = $('#picked .picked-box .picked-content .picked-show .picked-right .output input') /*这里是弹出窗上面的输入框*/
inputVal.on("keyup", function() {
	var values = inputVal.val();

	if(values == "") {
		$("#picked .picked-box .picked-content .picked-show .picked-right .select .select-show").css("display", 'block');
		$("#picked .picked-box .picked-content .picked-show .picked-right .creat .creat-box").css("display", 'none');
	} else {
		$("#picked .picked-box .picked-content .picked-show .picked-right .select .select-show").css("display", 'none');
		$("#picked .picked-box .picked-content .picked-show .picked-right .creat .creat-box").css("display", 'block');
		$("#picked .picked-box .picked-content .picked-show .picked-right .creat .creat-box i").text(values);
	}

})

//点击选择已创建的材思库
$("#picked .picked-box .picked-content .picked-show .picked-right .select-box .item").on("click", function() {
	$(this).addClass('addselect').siblings().removeClass("addselect")
})

//添加到已创建的材思库

$("#picked .picked-box .picked-content .picked-show .picked-right .creat .creat-box").on("click", function() {

	var length = $('#picked .picked-box .picked-content .picked-show .picked-right .select-box .item').length;
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
		$('#picked .picked-box .picked-content .picked-show .picked-right .select-show').css("display", 'block')
			//				var div=document.createElement('<div class="item"></div>')

		$('#picked .picked-box .picked-content .picked-show .picked-right .select-box').append("<div class='item'>" + values + "</div>");

		$('#picked .picked-box .picked-content .picked-show .picked-right .select-box .item').eq(length).insertBefore($('#picked .picked-box .picked-content .picked-show .picked-right .select-box .item').eq(0))
	}

	$("#picked .picked-box .picked-content .picked-show .picked-right .select-box .item").on("click", function() {
		$(this).addClass('addselect').siblings().removeClass("addselect")
	})

})
})