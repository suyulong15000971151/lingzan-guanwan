$(function(){
	
	$('.man-show .plus').click(function(){
		$('body').css('overflow','hidden')
		$(window).scrollTop(0)
		$('#friend').show()
	})
	$('#friend .title i').click(function(){
		$('body').css('overflow','scroll')
//		$(window).scrollTop(0)
		$('#friend').hide()
	})
	
	
	$('#friend .look-pson span').click(function(){
		$('#friend .friend-con .box-one').css('display','none');
		$('#friend .title span').css('display','none');
		$('#friend .title .go-back').css('display','block');
		$('#friend .friend-con .box-tow').css('display','block');
	})
	
	$('#custom .title .go-back').click(function(){	
		$('#custom .title .go-back').css('display','none');
		$('#custom .friend-con .box-tow').css('display','none');
		$('#custom .friend-con .box-one').css('display','block');
		$('#custom .container .caption').css('display','block');
		$('#custom .title span').css('display','inline-block');
	})
	
	$('#friend .box-tow .send button').click(function(){	
		$('#friend').hide();
		$('#win').css('display',"block").addClass('anima');
	    
	    
	    $('#win .win-box .com i').click(function(){
	    	$('#win').css('display','none');
	     	$('body').css('overflow','scroll')
	    	
	    })
	})
	
	
})
