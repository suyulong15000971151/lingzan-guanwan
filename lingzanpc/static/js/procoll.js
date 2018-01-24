//搜索个人页关注人

function followPeople(userid) {
  var href = $('.box_'+userid+' a').attr('href');
  $('.box_'+userid+' a').attr('href','javascript:void(0);');
  follow(userid);

}

//关注人
function follow(userid) {

 	$.ajax({
          url:'/product/follow',
          type:"post",
          data:{userid:userid},
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;

                  $('#interset').hide();
                  winPrompt2(msg);

                  if(code == 200) {
                    //列表页
                    $('.peson_'+userid).removeClass('praise-tan').html('<strong></strong><em>已关注</em>');
                    //产品详情页
                    $('.follow-r').attr('style','display:none;');
                    var html = '<div class="praise"><strong></strong><em>已关注</em></div>';
                    $('.follow-l').after(html);

                    //搜索页 个人
                    $('.container .box_'+userid+' .behavior .interest').attr('onClick','cancelFollowPeople('+userid+')').text('取消关注');

                  }

              }

          },   
          error:function(){  
              $('#interset').hide();
              winPrompt2('网络异常，请稍后再试');
              return false;
          }
      })

}


//搜索个人页取消关注人
function cancelFollowPeople(userid) {
  var href = $('.box_'+userid+' a').attr('href');
  $('.box_'+userid+' a').attr('href','javascript:void(0);');
  cancelFollowP(userid);

}

//取消关注人
function cancelFollowP(userid) {

      $('#config').addClass('big');
      $('#config .config-box .content button').remove();
      $("#config .config-box .content span").after('<button type="submit">确定</button>');

      $('#config .config-box .content span').click(function(){

        $('#config').removeClass('big');
        $('#config .config-box .content button').remove();

      })
      $('#config .config-box .content button').click(function(){

          $('#config').removeClass('big');
          $(this).remove();

          $.ajax({
                url:'/member/cancelFollow',
                type:"post",
                data:{userid:userid},
                success:function(ret){

                    if(ret != ''){

                        var jsonarray = eval('('+ret+')');
                        var msg = jsonarray.msg;
                        var code = jsonarray.code;

                        winPrompt2(msg);
                        if(code == 200) {

                           $('.container .box_'+userid+' .behavior .interest').attr('onClick','followPeople('+userid+')').text('添加关注');

                        }
                     }

                },   
                error:function(){
                    winPrompt2('网络异常，请稍后再试');
                    return false;
                }

          })

      })

}

//瀑布流关注人功能的弹窗与赋值
function followWindowOpen(userid, projectId){

    $(window).scrollTop(0);
    $('body').css("overflow", 'hidden')
    $("#interset").css('display', 'block');
    followWindow(userid, projectId);
}


//关注弹窗赋值
function followWindow(userid, projectId) {

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
                    $('.interset-content .confirm .guanzhu').attr('onclick','follow('+userid+')');

                }

            },   
            error:function(){  
                $('.confirm').before('<p>网络异常，请稍后再试</p>');
                return false;
            }
    })

}

//点赞单品
function fabulous(proid) {

    var puserid = $('#puserid').val();
    var href = $('.product_'+proid+' a').attr('href');
    $('.product_'+proid+' a').attr('href','javascript:void(0);');

    $.ajax({
        url:'/product/fabulous',
        type:"post",
        data:{proid:proid, puserid:puserid},
        success:function(ret){

            if(ret != ''){

                var jsonarray = eval('('+ret+')');
                var msg = jsonarray.msg;
                var code = jsonarray.code;

                winPrompt2(msg);

                if(code == 200) {

                //列表页
                var zan = $('.zan_'+proid).text();
                var zans = Number(zan)+1;
                 $('.product_'+proid).find('.praise').html('<div class="yizan"></div><i>'+zans+'</i>');

                 //产品详情页
                  var zan = $('.product .right .title .zans i').text();
                  var zans = Number(zan)+1;
                 $('.product .right .title .zans').html('<div class="yizan"></div><i>'+zans+'</i>');


                }


            }

            $('.product_'+proid+' a').attr('href',href);

        },   
        error:function(){
            winPrompt2('网络异常，请稍后再试');
            return false;
        }
  })

}

function showCollection(productId) {

    $('.product_'+productId+' a').find('i').eq(0).css("opacity", "1");
    $('.product_'+productId+' a').find('.col-tow').eq(0).css("opacity", "1");

}

function hideCollection(productId) {

    $('.product_'+productId+' a').find('i').eq(0).css("opacity", "0");
    $('.product_'+productId+' a').find('.col-tow').eq(0).css("opacity", "0");


}

//瀑布流产品的采集弹窗与赋值
function collectionWindowOpen(productId) {
    event.preventDefault();
    event.cancelBubble
    event.stopPropagation();
    $(window).scrollTop(0);
    $('body').css("overflow",'hidden');
    $("#caiji").css('display','block');
    getLibraryList(productId);
}

//点击采集窗口，并赋值
function getLibraryList(productId) {

  $('.submit').prev('p').remove();
  var src = $(".product_"+productId).find('.boximg').find('img').attr('src');
  var alt = $(".product_"+productId).find('.boximg').find('img').attr('alt');
  var desc = $(".product_"+productId+" .boximg textarea").text();

  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left img').attr('src',src);
  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left h2').text(alt);
  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left p').text(desc);
  $('#productId').val(productId);

  //搜索所有的材思库，并赋值
  getProjectData();

}

//添加区域
function addInput(libid) {

    var input = '<input type="text" placeholder="编辑完后按 enter 确认添加区域" class="proname" name="proname" libid="'+libid+'"/>';
    $('.addProject_'+libid).before(input);

    //按下回车，添加区域
    $('#caiji .sub-item .sub-add').parent().find("input").on("keyup", function(event) {

      if(event.keyCode == 13) {

        var value = $(this).val();
        var libid = $(this).attr('libid'); 

        //ajax添加子项目
        //搜索所有的材思库，并赋值

      $.ajax({
              url:'/member/add_project',
              type:"post",
              data:{proname:value,libid:libid},
              success:function(ret){
                  $('.submit').prev('p').remove();
                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {

                        $('.submit').before('<p>'+msg+'</p>');
                         return false;
                      }

                      $('.addProject_'+libid).before('<div class="project_'+msg+' sub-icon project" proid="'+msg+'" libid="'+libid+'" onClick="changeProject('+msg+')">' + value + '</div>');
                      

                    }

              },   
              error:function(){  
                  $('.submit').prev('p').remove();
                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }
          })

        $(this).remove();


      }

    })
     $('#caiji .sub-item .sub-add').parent().find("input").on("blur", function(event) {

        $(this).siblings().removeClass('addselect')
        $(this).parent().parent().siblings().find('.sub-icon').removeClass('addselect')
        var value = $(this).val();
        var libid = $(this).attr('libid');

        //ajax添加子项目
        //搜索所有的材思库，并赋值
      $.ajax({
              url:'/member/add_project',
              type:"post",
              data:{proname:value,libid:libid},
              success:function(ret){
                  $('.submit').prev('p').remove();
                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {

                         $('.submit').before('<p>'+msg+'</p>');
                         return false;
                      }
                      
                      $('.addProject_'+libid).before('<div class="addselect project_'+msg+' sub-icon project" proid="'+msg+'" libid="'+libid+'" onClick="changeProject('+msg+')">' + value + '</div>');
                      

                    }

              },   
              error:function(){  
                  $('.submit').prev('p').remove();
                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }
          })

        $(this).remove();

    })

}


//采集单品到子项目
function collectProduct1() {

  var proid = $('.addselect').attr('proid');
  $('#proid').val(proid);
   var libid = $('.addselect').attr('libid');
  $('#libid').val(libid);

  $('.submit button').attr("disabled","true"); //设置变灰按钮

  var ppname = $('#ppname').val();
  var productId = $('#productId').val();
  var libid = $('#libid').val();
  var proid = $('#proid').val();

   $.ajax({
        url:'/member/add_product',
        type:"post",
        data:{ppname:ppname,productId:productId,libid:libid,proid:proid},
        success:function(ret){

        setTimeout("$('.submit button').removeAttr('disabled')",3000);
         $('.submit').prev('p').remove();
          if(ret != ''){

              var jsonarray = eval('('+ret+')');
              var msg = jsonarray.msg;
              var code = jsonarray.code;
              if(code != 200){

                $('.submit').before(msg);
                return false;

              }

              winPrompt(msg);

            }

        $('body').css("overflow", 'scroll');
        $("#caiji").css('display', 'none');
       
      },
      error:function(){  
           $('.submit').prev('p').remove();
          $('.submit').before('<p>网络异常，请稍后再试</p>');
          return false;
      }
  })

}


//选择相对应的子项目
function changeProject(proid) {

    if($('.project_'+proid).hasClass('addselect')){
    	 $('.project').removeClass('addselect');

    }else{
    	 $('.project').removeClass('addselect');
       $('.project_'+proid).addClass('addselect');
    }
    
    
    
}

//展示或隐藏项目列表
function showHide(libid) {

  var showHide = $('.library_'+libid+' .sub-item').css('display');
  if(showHide == 'block') {
    $('.library_'+libid).children('.sub-item').attr('style','display:none');
  }else{
     $('.library_'+libid).children('.sub-item').attr('style','display:block');
  }

}

//添加项目
function addProjectProduct() {

  var libname = $('.libname').val();
  if(libname == '') {
    return false;
  }

    $.ajax({
          url:'/product/addLibrary',
          type:"post",
          data:{libname:libname,libflg:1},//添加的是单片类型的才思库，所以libflg为1
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;
                  if(code != 200) {

                 $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
                    return false;
                  }else{
                    var proid = jsonarray.proid;
                  }

                 $('#win .win-box .com span').html('添加成功').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
                 $('.select-box .item:first').addClass('library_'+msg);
                 $('.select-box .item:first i').attr('onClick','showHide('+msg+')');
                 var html = '<div class="project_'+proid+' sub-icon project" proid="'+proid+'" libid="'+msg+'" onclick="changeProject('+proid+')">项目总览</div>';
                 $('.select-box .item:first .sub-item .sub-add').before(html);
                 $('.select-box .item:first .sub-item .sub-add').addClass('addProject_'+msg).attr('onClick','addInput('+msg+')');
              }

          },   
          error:function(){  

              $('#win .win-box .com span').html('网络异常，请稍后再试').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
              return false;
          }
      })

}


//产品详情页点击采集窗口，并赋值
function getLibList(productId) {

  var src = $(".productImage").attr('src');
  var alt = $('.productInfo h1').text();
  var desc = $('.productInfo p').text();
  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left img').attr('src',src);
  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left h2').text(alt);
  $('#caiji .caiji-box .caiji-content .caiji-show .caiji-left p').text(desc);
  $('#productId').val(productId);

  //搜索所有的材思库，并赋值
  getProjectData();


}

//采集图片时添加材思库
function addLibraryProduct() {
       alert(0)
    var libname = $('#libname').val();
    $.ajax({
          url:'/product/addLibrary',
          type:"post",
          data:{libname:libname,libflg:1},//添加的是单片类型的才思库，所以libflg为1
          success:function(ret){
              $('.submit').prev('p').remove();
              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;
                  if(code != 200) {

                    $('.submit').before('<p>'+msg+'</p>');
                    return false;
                  }

                //给添加成功的材思库添加点击事件
                $('.select-box :first-child').attr('onclick','selectLibrary('+msg+')').addClass('addselect').siblings().removeClass("addselect");
                $('.selectLib').val(msg);

              }

          },   
          error:function(){  

              $('.submit').prev('p').remove();
              $('.submit').before('<p>网络异常，请稍后再试</p>');
              return false;
          }
      })

}


  //选择材思库
function selectLibrary(libid) {

  $('.selectLib').val(libid);
  $('.libId_'+libid).addClass('addselect').siblings().removeClass("addselect");

}

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

                  winPrompt2(msg);
                  if(code == 200) {

                    $('.project_'+proid).find('.rate').removeClass('rate').addClass('rate1').text('已关注');
                  }

              }

              $('.project_'+proid).attr('href',href);

          },   
          error:function(){  
              winPrompt2('网络异常，请稍后再试');
              return false;
          }
      })
}

//关注文章
function followNote(noteid,userid) {

  var href =  $('.note_'+noteid).attr('href');
  $('.note_'+noteid).attr('href','javascript:void(0);');
  $.ajax({
          url:'/member/followNotes',
          type:"post",
          data:{noteid:noteid,userid:userid},//添加的是单片类型的才思库，所以libflg为1
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;

                  winPrompt2(msg);
                  if(code == 200) {

                    $('.note_'+noteid).find('.rate').removeClass('rate').addClass('rate1').text('已收藏');

                  }


              }

              $('.note_'+noteid).attr('href',href);

          },   
          error:function(){

              winPrompt2('网络异常，请稍后再试');
              return false;
          }
      })
}

//转换成我的项目弹窗
function getLib(proid, userid, groupid) {

  var src = $('.product .left .show img').attr('src');
  var title = $('.product .right .title h1').text();
  $('#pick .pick-box .pick-content .pick-show .pick-left img').attr('src',src);
  $('#pick .pick-box .pick-content .pick-show .pick-left p').text(title);
  $('.libtitle').val(title);
  $('.proid').val(proid);
  $('.select-box .item').removeClass('addselect');
  $('.selectLib').val('');


    //搜索所有的材思库，并赋值
  $.ajax({
          url:'/product/getLibraryData',
          type:"post",
          success:function(ret){
              var html = '';
              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var library = jsonarray.library;
                  var code = jsonarray.code;
                  var count = library.length;
                  for(var i=0; i<count; i++){

                    var libid = library[i].libid;
                    var libname = library[i].libname;

                    html += '<div class="item libId_'+libid+'" sign="'+libid+'" onclick="selectLibrary('+libid+')">'+libname+'</div>';

                  }

              }

              $('.select-box').html(html);

          },   
          error:function(){  
              $('#pick .pick-box .pick-content .pick-show .pick-right .submit').prev('p').remove();
              $('#pick .pick-box .pick-content .pick-show .pick-right .submit').before('<p>网络异常，请稍后再试</p>');
              return false;
          }
      })

}


//转换成我的项目
function changeMyProject() {

    var proid = $.trim($('.proid').val());
    var libid = $.trim($('.selectLib').val());
    $.ajax({
              url:'/library/changeMyProject',
              type:"post",
              data:{proid:proid,libid:libid},
              success:function(ret){

                  $('.submit').prev('p').remove();
                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {

                         $('.submit').before(msg);
                         return false;
                      }

                      $('#pick').hide();
                      $('#win').css('display',"block").addClass('anima');
                      $('#win').find('span').text('转换成功').css({position:'absolute',top:'75px',left:'90px'});
                      setTimeout(function () {
                        $('#win').css('display','none');
                        $('body').css('overflow','scroll');
                      }, 1000);

                    }

              },   
              error:function(){  
                  $('.submit').prev('p').remove();
                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }
          })
}


//点击拷贝与移除产品弹窗，查询并赋值项目列表
function getProjectData() {
    //搜索所有的材思库，并赋值
  $.ajax({
          url:'/library/getLibraryList',
          type:"post",
          success:function(ret){

            $('.select-box').empty();
            $('.submit').prev('p').remove();
              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var library = jsonarray.library;
                  var html = '';
                  var count = library.length;
                  for(var i=0; i<count; i++){

                    var libid = library[i].libid;
                    var libname = library[i].libname;
                    var project = library[i].project;
                    var sum = project.length;

                    html += '<div class="item library_'+libid+'"><p>'+libname+'</p><i onClick="showHide('+libid+')"></i>';
                    html += '<div class="sub-item">';
                        for(var n=0; n<sum; n++){
                     html += '<div class="project_'+project[n].proid+' sub-icon project" proid="'+project[n].proid+'" libid="'+libid+'" onClick="changeProject('+project[n].proid+')">'+project[n].proname+'</div>';
                     }
                    html += '<div class="sub-add addProject_'+libid+'" onClick="addInput('+libid+')">添加区域</div>';
                    html += '</div>';
                    html += '</div>';
                }

               $('.select-box').html(html);
               var projectId = jsonarray.projectId;
              $('.project_'+projectId).addClass('addselect');

            }

          },   
          error:function(){  
              $('.submit').prev('p').remove();
              $('.submit').before('<p>网络异常，请稍后再试</p>');
              return false;
          }
      })
}

//拷贝图片
function copyImageS() {

    $('.submit').prev('p').remove();
    var productS = '';
    $(".detail-item ul li .author .all-select i").each(function(){

        if($(this).hasClass('ck')){

          var product = $(this).parent('.all-select').parent('.author').parent('li').attr('data-proid');
          productS += product+',';
        }

    }) 

    if(productS == '') {

      $('.submit').before('<p>请选择需要拷贝或移除的产品</p>');
      return false;
    }
    productS = productS.substring(0,productS.length-1);
    $('#productS').val(productS);

    var proid = $('.addselect').attr('proid');
    $('#proid').val(proid);
     var libid = $('.addselect').attr('libid');
    $('#libid').val(libid);

    $('.submit button').attr("disabled","true"); //设置变灰按钮
    $('.submit').prev('p').remove();
    $('#colPro1').ajaxSubmit({

    success:function(ret){

        setTimeout("$('.submit button').removeAttr('disabled')",3000);
        
        var jsonarray = eval('('+ret+')');
        var msg = jsonarray.msg;
        var code = jsonarray.code;
        if(code != 200){

          $('.submit').before(msg);
          return false;

        }

        $('#caiji').hide();
        $('#win').css('display',"block").addClass('anima');
        $('#win').find('span').text('操作成功').css({position:'absolute',top:'75px',left:'90px'});
        window.location.reload(); 

    },   
    error:function(){  

      $('.submit').before('<p>网络异常，请稍后再试</P>');
      return false;
    }

  })

}

//拷贝图片（旧）
function copyImage() {

    var productS = '';
    $(".detail-item ul li .man .checked").each(function(){
      var product = $(this).attr('data-proid');
      productS += product+',';
  })
    if(productS == '') {
      alert('请选择需要拷贝或移除的产品');
      return false;
    }
    productS = productS.substring(0,productS.length-1);
    $('#productS').val(productS);
    var proid = $('.addselect').attr('proid');
    $('#proid').val(proid);
     var libid = $('.addselect').attr('libid');
    $('#libid').val(libid);

    $('.submit button').attr("disabled","true"); //设置变灰按钮
    $('#colPro1').ajaxSubmit({

    success:function(ret){

        setTimeout("$('.submit button').removeAttr('disabled')",3000);
        $('.submit').prev('p').remove();
        var jsonarray = eval('('+ret+')');
        var msg = jsonarray.msg;
        var code = jsonarray.code;
        if(code != 200){

          $('.submit').before(msg);
            return false;

        }

         window.location.reload(); 

    },   
    error:function(){  
      alert('网络异常，请稍后再试');
      return false;
    }

  })

}

//点击添加图片时赋值
function selectProjectData() {

  $('.submit').prev('p').remove();
  //搜索所有的材思库，并赋值
  $('#pick .pick-box .pick-content .pick-show .pick-right .submit').prev('p').remove();
  $.ajax({
          url:'/library/getLibraryList',
          type:"post",
          success:function(ret){

            $('.select-box').empty();

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var library = jsonarray.library;
                  var html = '';
                  var count = library.length;
                  for(var i=0; i<count; i++){

                    var libid = library[i].libid;
                    var libname = library[i].libname;
                    var project = library[i].project;
                    var sum = project.length;

                    html += '<div class="item library_'+libid+'"><p>'+libname+'</p><i onClick="showHide('+libid+')"></i>';
                    html += '<div class="sub-item">';
                        for(var n=0; n<sum; n++){
                     html += '<div class="project_'+project[n].proid+' sub-icon project" proid="'+project[n].proid+'" libid="'+libid+'" onClick="changeProject('+project[n].proid+')">'+project[n].proname+'</div>';
                     }
                    html += '<div class="sub-add addProject_'+libid+'" onClick="addProject('+libid+')">添加区域</div>';
                    html += '</div>';
                    html += '</div>';
                }

               $('.select-box').html(html);

            }

          },   
          error:function(){  

              $('.submit').before('<p>网络异常，请稍后再试</p>');
              return false;

          }
      })
}


//点击添加图片时，清空表单
function addProductPopup() {

  selectProjectData();
  // $('.fenggeType').attr('style','display:block;');
  $('.simpleType').attr('style','display:block;');
  $('#proid').val('');
  $('#libid').val('');
  $('#tag').val('');
  $('#upImage').attr({'src':'','title':''});
  $('.proname').val('');
  $('.type1').val('');
  $('.type2').val('');
  $('.type3').val('');
  $('.type1').next('p').text('产品类别');
  $('.type2').next('p').text('产品分类');
//$('.type3').next('p').text('风格');

  $('.color').val('');
  $('.input-color').attr('style','');
  $('.input-color').next('p').text('颜色');
  $('.colorPick').attr('style','');
  $('.price').val('');
  $('.link').val('');
  $('.material').val('');
  $('.size').val('');
  $('.model').val('');
  $('.desc').val('');
  $('.libname').val('');
  $('.select-box .item').removeClass('addselect');
  $('.tag1').val('');
  $('.submit').prev('p').remove();

}

//在添加产品时添加项目
function addLibrary() {

  var libname = $('.libname').val();
  if(libname == '') {
    return false;
  }

    $.ajax({
          url:'/product/addLibrary',
          type:"post",
          data:{libname:libname,libflg:1},//添加的是单片类型的才思库，所以libflg为1
          success:function(ret){

              if(ret != ''){

                  var jsonarray = eval('('+ret+')');
                  var msg = jsonarray.msg;
                  var code = jsonarray.code;
                  if(code != 200) {
                    $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
                    return false;
                  }else{
                    var proid = jsonarray.proid;
                  }

                 $('#win .win-box .com span').html('添加成功').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
                 $('.select-box .item:first').addClass('library_'+msg);
                 $('.select-box .item:first i').attr('onClick','showHide('+msg+')');
                 var html = '<div class="project_'+proid+' sub-icon project" proid="'+proid+'" libid="'+msg+'" onclick="changeProject('+proid+')">项目总览</div>';
                 $('.select-box .item:first .sub-item .sub-add').before(html);
                 $('.select-box .item:first .sub-item .sub-add').addClass('addProject_'+msg).attr('onClick','addProject('+msg+')');
              }

          },   
          error:function(){  

              $('#win .win-box .com span').html('网络异常，请稍后再试').attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
              return false;
          }
      })

}

//添加产品时，添加区域
function addProject(libid) {
    var input = '<input type="text" placeholder="编辑完后按 enter 确认添加区域" class="proname" name="proname" libid="'+libid+'"/>';
    $('.addProject_'+libid).before(input);

    //按下回车，添加区域
    $('#pick .sub-item .sub-add').parent().find("input").on("keyup", function(event) {
      if(event.keyCode == 13) {
      	console.log(0)
        $(this).siblings().removeClass('addselect')
        $(this).parent().parent().siblings().find('.sub-icon').removeClass('addselect')
        var value = $(this).val();
        var libid = $(this).attr('libid');
        //ajax添加子项目
        //搜索所有的材思库，并赋值
        $('.submit').prev('p').remove();
      $.ajax({
              url:'/member/add_project',
              type:"post",
              data:{proname:value,libid:libid},
              success:function(ret){

                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {
                        $('.submit').prev('p').remove();
                         $('.submit').before('<p>'+msg+'</p>');
                         return false;
                      }
                      
                      $('.addProject_'+libid).before('<div class="addselect project_'+msg+' sub-icon project" proid="'+msg+'" libid="'+libid+'" onClick="changeProject('+msg+')">' + value + '</div>');
                      

                    }

              },   
              error:function(){  

                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }
          })

        $(this).remove();

      }

    })
    //按下回车，添加区域
    $('#pick .sub-item .sub-add').parent().find("input").on("blur", function(event) {
    
        $(this).siblings().removeClass('addselect')
        $(this).parent().parent().siblings().find('.sub-icon').removeClass('addselect')
        var value = $(this).val();
        var libid = $(this).attr('libid');

        //ajax添加子项目
        //搜索所有的材思库，并赋值
      $('.submit').prev('p').remove();
      $.ajax({
              url:'/member/add_project',
              type:"post",
              data:{proname:value,libid:libid},
              success:function(ret){

                  if(ret != ''){

                      var jsonarray = eval('('+ret+')');
                      var msg = jsonarray.msg;
                      var code = jsonarray.code;
                      if(code != 200) {

                         $('.submit').prev('p').remove();
                         $('.submit').before('<p>'+msg+'</p>');
                         return false;
                      }
                      
                      $('.addProject_'+libid).before('<div class="addselect project_'+msg+' sub-icon project" proid="'+msg+'" libid="'+libid+'" onClick="changeProject('+msg+')">' + value + '</div>');
                      

                    }

              },   
              error:function(){  

                  $('.submit').before('<p>网络异常，请稍后再试</p>');
                  return false;
              }
          })

        $(this).remove();

      

    })
    

}

$('#win .win-box .com i').click(function(){
    $('#win').css('display','none');
    $('body').css('overflow','scroll');
})


//产品详情页点击采集窗口，并赋值
function getLibList1(productId) {

  $('#productId').val(productId);

  //搜索所有的材思库，并赋值
  getProjectData();

}


//产品详情页点赞单品
function fabulous1(proid) {

    var puserid = $('#puserid').val();
    $.ajax({
        url:'/product/fabulous',
        type:"post",
        data:{proid:proid, puserid:puserid},
        success:function(ret){

            if(ret != ''){

                var jsonarray = eval('('+ret+')');
                var msg = jsonarray.msg;
                var code = jsonarray.code;

                winPrompt2(msg);

                if(code == 200) {

                var zan = $('#article .article-title .left i').text();
                var zans = Number(zan)+1;
                 $('#article .article-title .left').find('i').remove();
                 $('#article .article-title .left').find('input').remove();
                 $('#article .article-title .left').find('em').before('<div class="yizan">'+zans+'</div>');

                }


            }

        },   
        error:function(){  
            winPrompt2('网络异常，请稍后再试')
        }
  })

}

//弹出提示框并关闭
function winPrompt(msg){
    $('#caiji').hide();
    $('#win .win-box .com span').html(msg).attr('style',"position:absolute; top:73px; left:50%;transform:translateX(-50%)");
    $('#win').css('display',"block").addClass('anima');
    setTimeout(function () {
        $('#win').css('display','none');
        $('body').css('overflow','scroll');
    }, 1000)
}

//弹出提示框并关闭
function winPrompt2(msg){

    $(window).scrollTop(0);
    $('body').css("overflow", 'hidden');
    $('#win').css('display',"block").addClass('anima');
    $('#win').find('span').text(msg).css({position:'absolute',top:'75px',left:'90px'});
    setTimeout(function () {
        $('#win').css('display','none');
        $('body').css('overflow','scroll');
    }, 1000);
}

