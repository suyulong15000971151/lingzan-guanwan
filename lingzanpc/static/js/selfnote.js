$(function() {
	//这里是发布笔记弹窗
	$(".container .box .upload-box").click(function() {
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#note").css('display', 'block');
	});

	$("#note .note-box").click(function(event) {
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#note").css('display', 'none');
	})
	$("#note .note-box .note-content").click(function(event) {
		event.stopPropagation();
	})
	$("#note .note-box .note-content .title i").click(function(event) {
			event.stopPropagation();
			$('body').css("overflow", 'scroll')
			$("#note").css('display', 'none');
		})
		//这里是编辑笔记弹窗
	$(".container .box .edit").click(function() {
		$(window).scrollTop(0);
		$('body').css("overflow", 'hidden')
		$("#edit").css('display', 'block');
	});

	$("#edit .edit-box").click(function(event) {
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#edit").css('display', 'none');
	})
	$("#edit .edit-box .edit-content").click(function(event) {
		event.stopPropagation();
	})
	$("#edit .edit-box .edit-content .title i").click(function(event) {
		event.stopPropagation();
		$('body').css("overflow", 'scroll')
		$("#edit").css('display', 'none');
	})

	//这里是发布笔记的添加 输入框效果
	$("#note .container .add span").click(function() {
		var textSum = $('.inputtext:last').attr('offset');
		var imgSum = $('.imgBox:last').attr('offset');

		var text = $('.inputtext').length;
		if(text == 0) {
			textSum = 1;
		}else{
			textSum = parseInt(textSum)+1;
		}
		var img = $('.imgBox').length;
		if(img == 0) {
			imgSum = 1;
		}else{
			imgSum = parseInt(imgSum)+1;
		}

		var offset = textSum;
		if(imgSum > textSum) {
			offset = imgSum;
		}

		$("#note .container .add").before('<div class="inputtext" offset="'+offset+'"><textarea name="text_'+offset+'" rows="" cols=""></textarea><i></i></div>');
		//这里是点击删除 对应的输入框
		$(".inputtext i").click(function() {
			$(this).parent().remove()

		})
	})
	
	//这里是编辑笔记的添加 输入框效果
	$("#edit .add span").click(function() {
		var textSum1 = $('.inputtextarea:last').attr('offset');
		var textSum2 = $('.inputtext:last').attr('offset');
		var imgSum = $('.imgBox:last').attr('offset');

		var text1 = $('.inputtextarea').length;
		var text2 = $('.inputtext').length;
		var text = parseInt(text1) + parseInt(text2);
		if(text == 0) {
			textSum = 1;
		}else{
			// textSum = parseInt(textSum1)+parseInt(textSum1)+1;
			textSum = parseInt(textSum1)+1;
			if(textSum2 > textSum1) {
				textSum = parseInt(textSum2)+1;
			}
		}
		var img = $('.imgBox').length;
		if(img == 0) {
			imgSum = 1;
		}else{
			imgSum = parseInt(imgSum)+1;
		}

		var offset = textSum;
		if(imgSum > textSum) {
			offset = imgSum;
		}
		$("#edit .add").before('<div class="inputtext" offset="'+offset+'"><textarea name="text_'+offset+'" rows="" cols=""></textarea><i></i></div>');
		//这里是点击删除 对应的输入框
		$(".inputtext i").click(function() {
			$(this).parent().remove()

		})
	})
	
	//这里是编辑笔记点击效果
	$("#edit .edit-box .text i").click(function(){
		$(this).offsetParent().remove()
	})
    
    $("#edit .picture .pic-item i").click(function(){
    	$(this).parent().parent().remove()
    })
})