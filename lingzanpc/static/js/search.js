$(function(){
	$(".container .box .boximg i").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#pick").css('display','block');
	    
		})
	$(".container .box .boximg .col-tow").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#caiji").css('display','block');
//	    var src=$(this).prev().attr("src");
//	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
	
	})
	//这里面是搜索框里面的 字段效果
	 $('.panel-body').css({border:"none"});
	  $('span.textbox').css({height:"50px",lineHeight:"50px"})
	  $('.tagbox-label').css({height:"40px",lineHeight:"40px"})
	  //这里是搜索框左侧选项卡
	  $('.search .search-box .search-nav .search-select p').click(function(){
	  	$('.search .search-box .search-nav .search-select .search-option').slideToggle();
	  })
	  
	  $('.search .search-box .search-nav .search-select .search-option .search-item').click(function(){
	  	var itemText=$(this).text();
	  	$(this).offsetParent().offsetParent().find("p").text(itemText)
	  })
	  
	  
	  //这里是导航切换样式展示
	  $('.search .search-box .search-nav .search-select .search-option .search-item').eq(0).click(function(){
	  		$('.pagination-one').css("display","block");
	    	$('.page-tow').hide()
	    	
	        waterfull();
	       
	    	
	    })
	  $('.search .search-box .search-nav .search-select .search-option .search-item').eq(1).click(function(){
	    		$('.pagination-one').css("display","block");
	    		$('.page-tow').hide()
	    
	    		waterfull();
	    	
	 
	    })
	  
	    $('.search .search-box .search-nav .search-select .search-option .search-item').eq(2).click(function(){

	    		$('.page-tow').css("display","block");
	        	$('.pagination-one').hide()
	           waterfull_2()
	    
	    })
	    $('.search .search-box .search-nav .search-select .search-option .search-item').eq(3).click(function(){

	    	$('.page-tow').css("display","block");
	    	$('.pagination-one').hide()
			waterfull_2()
	    	
	    })


//	    	 * 瀑布流的原理：
//			 *   寻找到一排中高度最小的图片，然后排放在高度最小的图片的下面
//			 *
//			 * */

			function followPeople1(){

		// 	$(".container .box .behavior .praise").click(function(event){
	 //   event.preventDefault();
		// event.cancelBubble
		// event.stopPropagation();
		// $(window).scrollTop(0);
		// $('body').css("overflow",'hidden')
	 //    $("#interset").css('display','block');
		// 	})

				$(".container .box .behavior .praise").click(function(event) {
				event.preventDefault();
				event.cancelBubble
				event.stopPropagation();
				if($(this).hasClass('praise-tan')){
					$(window).scrollTop(0);
				$('body').css("overflow", 'hidden')
				$("#interset").css('display', 'block');
				}
				// else{
					// if($(this).find('span')){
					
					// }else{
						
					// }
				// }
		        
			})
		}

			function pickclick(){

	$(".container .box .boximg .col-tow").click(function(event){
		event.preventDefault();
		event.cancelBubble
		event.stopPropagation();
		$(window).scrollTop(0);
		$('body').css("overflow",'hidden')
	    $("#caiji").css('display','block');
	    var productId = $(this).attr('proid');
	    getLibraryList(productId);
//	    var src=$(this).prev().attr("src");
//	    $("#pick .pick-box .pick-content .pick-show .pick-left img").attr("src",src)
	
	})
			}
			
			
			pickclick()

			function imgsize(){

				$('img').css('opacity','1')
				var imgleng = $('.container .box .boximg img').get().length;
				var imgobj = $('.container .box .boximg img').get();
				// var imgout = $('.container .box .boximg .img-out').get()

				var imgWid = []
				var imgHid = []
				for(var i = 0; i < imgleng; i++) {
					imgobj[i].style.height = Number(imgobj[i].offsetWidth * 255 / imgobj[i].offsetHeight)
					// imgobj[i].style.width = '255px'
					// imgout[i].style.cssText = 'Max-height:400px;overflow:hidden'

				}

			}


			var container = document.getElementById("container");
			var containers = document.getElementById("containers");
			// var btn = document.getElementsByClassName("add-btn").item(0);
			var index = 0;
			window.onload = function() {
				imgsize()
				waterfull();
				waterfull_2();
			};

			function waterfull() {

				var box = $(".pagination-one .container .box").get()

				if(box != '') {

					//				var box=boxx.get()
					//console.log(box[0].offsetWidth)

					//计算一排中的能排放的数量
					var containerWidth = document.documentElement.clientWidth;
					if(containerWidth >= 1600) {
						containerWidth = 1600;
					}
					var boxWidth = box[0].offsetWidth;
					var num = Math.floor(containerWidth / boxWidth);
					//居中操作
					container.style.width = num * (boxWidth + 20) + "px";
					containers.style.width = num * (boxWidth + 20) + "px";
					//摆放位置
					var boxheight = [];
					for(var i = 0; i < box.length; i++) {
						if(i < num) { // 第一排中的元素
							boxheight.push(box[i].offsetHeight);
						} else {
							//非第一排中的内容
							box[i].style.position = "absolute";
							//设置位置之前。必须知道当前要放在哪个盒子下面
							var minBoxHeight = Math.min.apply(null, boxheight);
							//根据最小值得到位置
							//               var index = boxheight.indexOf(minBoxHeight);
							var index = getIndex(boxheight, minBoxHeight);
							box[i].style.top = (minBoxHeight + 20) + "px";
							box[i].style.left = (box[index].offsetLeft - 10) + "px";
							//把盒子的高度加回去
							boxheight[index] = boxheight[index] + box[i].offsetHeight + 20;
						}

					}

					// btn.style.top = (box[box.length - 1].offsetTop + box[box.length - 1].offsetHeight + 20) + "px";

				}

			}

			function waterfull_2() {
//				var box = $(".page-tow .container .box").get(0);
                var box = $(".page-tow .container .box").get()
                if(box != '') {

                	// var box=boxx.get()
	//				console.log(box[0])
					//计算一排中的能排放的数量
					var containerWidth = document.documentElement.clientWidth;
					if(containerWidth >= 1600) {
						containerWidth = 1600;
					}
					var boxWidth = box[0].offsetWidth;
					var num = Math.floor(containerWidth / boxWidth);
					//居中操作
	//				container.style.width = num * (boxWidth + 20) + "px";
					containers.style.width = num * (boxWidth + 20) + "px";
					//摆放位置
					var boxheight = [];
					for(var i = 0; i < box.length; i++) {
						if(i < num) { // 第一排中的元素
							boxheight.push(box[i].offsetHeight);
						} else {
							//非第一排中的内容
							box[i].style.position = "absolute";
							//设置位置之前。必须知道当前要放在哪个盒子下面
							var minBoxHeight = Math.min.apply(null, boxheight);
							//根据最小值得到位置
							//               var index = boxheight.indexOf(minBoxHeight);
							var index = getIndex(boxheight, minBoxHeight);
							box[i].style.top = (minBoxHeight + 20) + "px";
							box[i].style.left = (box[index].offsetLeft - 10) + "px";
							//把盒子的高度加回去
							boxheight[index] = boxheight[index] + box[i].offsetHeight + 20;
						}
					}

					// var btn = document.getElementsByClassName("add-btn").item(0);
					// btn.style.top = (box[box.length - 1].offsetTop + box[box.length - 1].offsetHeight + 20) + "px";

                }
//				

			}
				
			

			//过滤的形式
			function getIndex(boxArr, minIndex) {
				for(var i = 0; i < boxArr.length; i++) {
					if(boxArr[i] == minIndex) {
						return i;
					}
				}
			}

			/*
			 *
			 * 什么加载！
			 *    滚动到底部的时候加载
			 *        滚动
			 *        底部的判断
			 *
			 *    页面的高度+滚动的高度 > 最后一张图片距离页面顶部的高度： 加载
			 * */

		function loadFlag() {
			//获取页面高度
			var pageHeight = document.documentElement.clientHeight;
			//滚动的高度
			var scrollHeight = document.documentElement.scrollTop || document.body.scrollTop;
			//最后一张图片距离顶部的高度
			var boxs = document.getElementsByClassName("box");

			return pageHeight + scrollHeight > boxHeight ? true : false;
		}

		function isEmptyObject(e) {
			var t;
			for (t in e)
				return !1;
			return !0;
		}

		$(function(){
			$(document).scroll(function(){

				imgsize()
				waterfull();
				waterfull_2();
				//滚动条滑动的时候获取滚动条距离顶部的距离
				var scroll=$(document).scrollTop();
				//屏幕的高度
				var client=$(window).height();
				var h=$(document).height();
				var flag=true;
				if (h<=scroll+client) { // 到达底部时,加载新内容
					if(flag==false){
						return;
					}
					var p1 = $('#p').val();
					var p2 = $('.p').val();
					var str1 = '';
					var str2 = '';
					$.ajax({
						url: '/search/getData',
						type: 'POST',
						async: true,
						data: {
							p1: p1,
							p2: p2,
							seachWord: $('.seachWord').val(),
							type: $('.type').val()
						},
						timeout: 3000,
						dataType: 'json',
						success: function(data){
							//console.log(data);
							//location.reload();
							if(!isEmptyObject(data.errmsg)) {
								$.each(data.errmsg.list, function(i, n) {

									if(n.flag == 2){

										if(n.pic != '') {
											var img = '<img src="'+n.pic+'" alt="'+n.name+'"/>';
										}else{
											var img = '<img src="'+static_url+'/image/li_image.jpg" alt="'+n.name+'"/>';
										}
										str1 += '<div class="box"><a href="/library/project/'+n.id+'" class="project_'+n.id+'"><div class="boximg">'+img+'<p>['+n.libname+'] '+n.name+'</p><em>项目</em>';
	
										if(myUserId !=  n.userid) {

											if(n.alreadyFollow == 0) {
												str1 += '<div class="rate" onClick="followProject('+n.id+','+n.userid+')">关注</div>';
											}else{
												str1 += '<div class="rate1">已关注</div>';
											}
										}

										str1 += '</div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'"/><span>'+n.nickname+'</span></div>';

										if(myUserId != n.userid) {
											if (n.alreadyFollow1 == 0){

												str1 +='<div class="praise praise-tan peson_'+n.userid+'" onclick="followWindowOpen('+n.userid+','+n.id+')">';
												str1 +='<strong>+</strong><em>关注</em></div>';

											}else{

												str1 +='<div class="praise">';
												str1 +='<strong></strong><em>已关注</em></div>';

											}

										}

										str1 +='</div></a></div>';

									}else if(n.flag == 1){
											// alert(2);
											if(n.pic != '') {
												var img = '<img src="'+n.pic+'" alt="'+n.name+'"/>';
											}else{
												var img = '<img src="'+static_url+'/image/li_image.jpg" alt="'+n.name+'"/>';
											}

											str1 += '<div class="box product_'+n.id+'" onmouseover="showColle('+n.id+')" onmouseout="hideColle('+n.id+')"><a href="/collection/product/'+n.id+'">';
											str1 += '<div class="boximg">'+img+'<div class="col-tow"  proid='+n.id+' style="display:block">采集</div><textarea style="display:none;" rows="3" cols="40" name="desc">'+n.desc+'</textarea>';
											str1 += '<p>'+n.name+'</p><em>产品</em></div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'" /><span>'+n.nickname+'</span></div><div class="praise">';
											if(myUserId != n.userid) {
												if(n.alreadyZan == 0) {
													str1 += '<span onclick="fabulous('+n.id+')"></span><input type="hidden" id="puserid" value="'+n.userid+'" /><i class="zan_'+n.id+'">'+n.zancount+'</i>';
												}else{
													str1 += '<div class="yizan"></div><i>'+n.zancount+'</i>';
												}
											}else{
												str1 += '<span></span><i>'+n.zancount+'</i>';
											}

											str1 += '</div></div></a>';
											str1 += '</div>';

										}else if(n.flag == 3) {

										if(n.pic != '') {
											var img = '<img src="'+n.pic+'" alt="'+n.name+'"/>';
										}else{
											var img = '<img src="'+static_url+'/image/li_image.jpg" alt="'+n.name+'"/>';
										}
										str1 += '<div class="box"><a href="/note/info/'+n.id+'" class="note_'+n.id+'"><div class="boximg">'+img+'<p>'+n.name.substring(0,14)+'</p><em>笔记</em>';
	
										if(myUserId != n.userid) {

											if(n.alreadyFollow == 0) {
												str1 += '<div class="rate" onClick="followNote('+n.id+','+n.userid+')">收藏</div>';
											}else{
												str1 += '<div class="rate1">已收藏</div>';
											}
										}

										str1 += '</div><div class="behavior"><div class="peson"><img src="'+n.avatar+'" alt="'+n.nickname+'"/><span>'+n.nickname+'</span></div>';

										if(myUserId != n.userid) {
											if (n.alreadyFollow1 == 0){

												str1 +='<div class="praise praise-tan peson_'+n.userid+'" onclick="followWindowOpen('+n.userid+','+n.id+')">';
												str1 +='<strong>+</strong><em>关注</em></div>';

											}else{

												str1 +='<div class="praise">';
												str1 +='<strong></strong><em>已关注</em></div>';

											}

										}

										str1 +='</div></a></div>';

									}else{

											str2 += '<div class="box box_'+n.userid+'">';

											if(n.userid == myUserId) {
												str2 += '<a href="/member/library">';
											}else{
												str2 += '<a href="/member/library/'+n.userid+'">';
											}
											str2 += '<div class="boximg"><img src="'+n.avatar+'" alt="'+n.nickname+'"><p>'+n.nickname+'</p></div>';
											str2 += '<div class="behavior"><div class="personr"><em>'+n.librarycount+' 项目</em><span>'+n.productcount+' 产品</span>';
											str2 += '</div><div class="show-img"><ul>';
											var product = n.product;
											var count = product.length;
											for (var i = 0; i < count; i++) {
												str2 += '<li><img src="'+product[i].smallpic+'" alt="'+product[i].proname+'" /></li>';
											};

											str2 += '</ul></div>';
											if(myUserId != n.userid) {

												if(n.alreadyFollow == 0) {
													str2 += '<div class="interest" onclick="followPeople('+n.userid+')">添加关注</div>';
												}else{
													str2 += '<div class="interest" onclick="cancelFollowPeople('+n.userid+')">取消关注</div>';
												}

											}

											str2 += '</div></a></div>';

									}


								});
								$('#container').append(str1);
								$('#containers').append(str2);

								imgsize()
								waterfull();
								waterfull_2();
								pickclick()
								followPeople1()
								
								$('#p').val(Number(p1)+1);
								$('.p').val(Number(p2)+1);
								
								
//									window.onload = function() {
			                        	                        
			                        
//			                               };
							}
						}
					});
				}
			});
		});

})

function showColle(productId) {

	$('.product_'+productId+' a .boximg').find('.col-tow').css("opacity", "1");

}

function hideColle(productId) {

	$('.product_'+productId+' a .boximg').find('.col-tow').css("opacity", "0");

}