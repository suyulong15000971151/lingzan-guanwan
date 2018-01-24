// $(document).ready(function(){
// 	//添加新的材思库入库
// 	 $('.creat-box').click(function(){

// 	 	var libname = $('.libname').val();
// 	 	$.ajax({
//           url:'/product/addLibrary',
//           type:"post",
//           data:{libname:libname,libflg:1},//添加的是单片类型的才思库，所以libflg为1
//           success:function(ret){

//               if(ret != ''){

//                   var jsonarray = eval('('+ret+')');
//                   var msg = jsonarray.msg;
//                   var code = jsonarray.code;
//                   if(code != 200) {
//                   	alert(msg);
//                   	return false;
//                   }

//                   //给添加成功的材思库添加点击事件
//                  $('.select-box :first-child').attr('onclick','selectLibrary('+msg+')').addClass('addselect').siblings().removeClass("addselect");
//                  $('.selectLib').val(msg);

//               }

//           },   
//           error:function(){  
//               alert('网络异常，请稍后再试');
//               return false;
//           }
//       })

// 	 })


// })


//瀑布流关注人功能的弹窗与赋值
function followWindowOpen(userid, projectId = 0){

  $(window).scrollTop(0);
  $('body').css("overflow", 'hidden')
  $("#interset").css('display', 'block');
  followWindow(userid, projectId);
}


//关注弹窗赋值
function followWindow(userid, projectId = 0) {

$('.confirm').prev('p').remove();
 	$.ajax({
          url:'/product/getUserData',
          type:"post",
          data:{userid:userid},
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;

                  var avatar = msg[0].avatar;
                  var nickname = msg[0].nickname;
                  var product = msg.product;
                  var text = msg[0].librarycount+' 项目 '+msg[0].productcount+' 产品 ';
                  $('.interset-content .interset-mid .interset-item .middle img').attr('src',avatar);
                  $('.interset-content .interset-mid .interset-item .middle h2').text(nickname);
                  $('.interset-content .interset-mid .interset-item p').html(text);

                  var count = product.length;

                  var html = '';
                  for (var i = 0; i < count; i++) {
                  	var style = '';
                  	if(i == 2){
                  		style = 'style="margin-right: 0;"';
                  	}
                  	 html += '<img src="'+product[i].smallpic+'" alt="'+product[i].proname+'" '+style+'>';
                  };

                  $('.interset-content .interset-mid .interset-item .bottom').html(html);

                  var userid = msg[0].userid;
                  // alert(userid);
                  $('.interset-content .confirm .guanzhu').attr('onclick','follow('+userid+')');
                  // $('.project_'+projectId+' .behavior .praise strong').text('');
                  // $('.project_'+projectId+' .behavior .praise em').text('已关注');

              }

          },   
          error:function(){  
              // alert('网络异常，请稍后再试');
              $('.confirm').before('<p>网络异常，请稍后再试</p>');
              return false;
          }
      })

}


//点击采集窗口，并赋值
// function getLibraryList(productId) {

//   var src = $(".product_"+productId).find('.boximg').children('img').attr('src');
//   var alt = $(".product_"+productId).find('.boximg').children('img').attr('alt');
//   var desc = $(".product_"+productId+" .boximg textarea").text();

//   $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left img').attr('src',src);
//   $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left h2').text(alt);
//   $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left p').text(desc);
//   $('#productId').val(productId);

//   //搜索所有的材思库，并赋值
//   $.ajax({
//           url:'/library/getLibraryList',
//           type:"post",
//           success:function(ret){

//             $('.select-box').empty();

//               if(ret != ''){

//                   var jsonarray = eval('('+ret+')');
//                   var library = jsonarray.library;
//                   var html = '';
//                   var count = library.length;
//                   for(var i=0; i<count; i++){

//                     var libid = library[i].libid;
//                     var libname = library[i].libname;
//                     var project = library[i].project;
//                     var sum = project.length;

//                     html += '<div class="item library_'+libid+'"><p>'+libname+'</p><i onClick="showHide('+libid+')"></i>';
//                     html += '<div class="sub-item">';
//                         for(var n=0; n<sum; n++){
//                      html += '<div class="sub-icon project project_'+project[n].proid+'" proid="'+project[n].proid+'" libid="'+libid+'" onClick="changeProject('+project[n].proid+')">'+project[n].proname+'</div>';
//                      }
//                     html += '<div class="sub-add addProject_'+libid+'" onClick="addInput('+libid+')">添加区域</div>';
//                     html += '</div>';
//                     html += '</div>';
//                 }

//                $('.select-box').html(html);
//               var projectId = jsonarray.projectId;
//               $('.project_'+projectId).addClass('addselect');

//             }

//           },   
//           error:function(){  
//               alert('网络异常，请稍后再试');
//               return false;
//           }
//       })

// }

//添加区域
// function addInput(libid) {

//     var input = '<input type="text" class="proname" name="proname" libid="'+libid+'"/>';
//     $('.addProject_'+libid).before(input);

//     $('#caiji .sub-item .sub-icon').click(function() {
//     	console.log('0000')

//         $(this).parent().parent().siblings().find(".sub-icon").removeClass('addselect')
//         $(this).addClass('addselect').siblings().removeClass("addselect");
//       })


//     //按下回车，添加区域
//     $('#caiji .sub-item .sub-add').parent().find("input").on("keyup", function(event) {
//       if(event.keyCode == 13) {

//         var value = $(this).val();
//         var libid = $(this).attr('libid');

//         //ajax添加子项目
//         //搜索所有的材思库，并赋值
//       $.ajax({
//               url:'/member/add_project',
//               type:"post",
//               data:{proname:value,libid:libid},
//               success:function(ret){

//                   if(ret != ''){

//                       var jsonarray = eval('('+ret+')');
//                       var msg = jsonarray.msg;
//                       var code = jsonarray.code;
//                       if(code != 200) {
//                          alert(msg);
//                          return false;
//                       }

//                       $('.addProject_'+libid).before('<div class="sub-icon project project_'+msg+'" proid="'+msg+'" libid="'+libid+'" onClick="changeProject('+msg+')">' + value + '</div>');
                      

//                     }

//               },   
//               error:function(){  
//                   alert('网络异常，请稍后再试');
//                   return false;
//               }
//           })

//         $(this).remove();


//       }

//     })

// }


//采集单品到子项目
// function collectProduct1() {
//   var proid = $('.addselect').attr('proid');
//   $('#proid').val(proid);
//    var libid = $('.addselect').attr('libid');
//   $('#libid').val(libid);

//   $('.submit button').attr("disabled","true"); //设置变灰按钮
//   var ppname = $('#ppname').val();
//   var productId = $('#productId').val();
//   var libid = $('#libid').val();
//   var proid = $('#proid').val();

//    $.ajax({
//         url:'/member/add_product',
//         type:"post",
//         data:{ppname:ppname,productId:productId,libid:libid,proid:proid},
//         success:function(ret){

//         setTimeout("$('.submit button').removeAttr('disabled')",3000);
//          $('.submit').prev('p').remove();
//           if(ret != ''){

//               var jsonarray = eval('('+ret+')');
//               var msg = jsonarray.msg;
//               var code = jsonarray.code;
//               if(code != 200){

//                 $('.submit').before(msg);
//                   return false;

//               }

//             }

//         // event.preventDefault();
//         // event.stopPropagation();
//         // $(window).scrollTop(0);
//         $('body').css("overflow", 'scroll');
//         $("#caiji").css('display', 'none');

//       },
//       error:function(){  
//           alert('网络异常，请稍后再试');
//           return false;
//       }
//   })

// }


//选择相对应的子项目
// function changeProject(proid) {

//     $('.project').removeClass('addselect');
//     $('.project_'+proid).addClass('addselect');
// }


// function showHide(libid) {

//   var showHide = $('.library_'+libid+' .sub-item').css('display');
//   if(showHide == 'block') {
//     $('.library_'+libid).children('.sub-item').attr('style','display:none');
//   }else{
//      $('.library_'+libid).children('.sub-item').attr('style','display:block');
//   }

// }


//关注材思库的子项目
function followProject(proid,userid) {

  var href =  $('.project_'+proid).attr('href');
  $('.project_'+proid).attr('href','javascript:void(0);');
  $.ajax({
          url:'/member/followProject',
          type:"post",
          data:{proid:proid,userid:userid},//添加的是单片类型的才思库，所以libflg为1
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;
                  // alert(msg);
                  $(window).scrollTop(0);
                  $('body').css("overflow", 'hidden');
                  $('#win').css('display',"block").addClass('anima');
                  $('#win').find('span').text(msg).css({position:'absolute',top:'75px',left:'90px'});
                  if(code == 200) {
                   $('.project_'+proid).find('.rate').removeClass('rate').addClass('rate1').text('已关注');

                  }

              }

              $('.project_'+proid).attr('href',href);

          },   
          error:function(){  
              // alert('网络异常，请稍后再试');
              $(window).scrollTop(0);
              $('body').css("overflow", 'hidden');
              $('#win').css('display',"block").addClass('anima');
              $('#win').find('span').text('网络异常，请稍后再试').css({position:'absolute',top:'75px',left:'90px'});
              return false;
          }
      })
}

$('#win .win-box .com i').click(function(){
    $('#win').css('display','none');
    $('body').css('overflow','scroll');
})