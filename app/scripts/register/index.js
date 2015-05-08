require('scripts/module/ajax')
require('scripts/module/simpleSlider')
$(function() {
  var register = {
    setWarn:function(data){
      var _data = (typeof(data) == 'string') ? $.parseJSON(data):data
      if(!_data.success){
        if(!_data.name) return;
        if(_data.msg=="") return;
        var _filed= $('[name="'+_data.name+'"]');
        if(_filed.length=0) return;
        var _group = $('[name="'+_data.name+'"]').parent('div');
        var _alert = _group.find(".am-error");
        _group.parent('.am-form-group').removeClass('am-form-success').addClass('am-form-error')
        if (!_alert.length) {
          _alert = $('<div class="am-error"></div>').hide().
            appendTo(_group);
        }
        _alert.html('<i class="am-icon-warning"></i>'+_data.msg).show();
      }
      return _data;
    },
    checkEmailIdArr:function(){
      var email_arr = [];
      $('.outlookId').each(function(index,item){
        if($(this).data("checked")) {
          email_arr.push($(item).val())
        }
      })
      return email_arr;
    },
    numValus:function(dnum){
      var numArr = $(".js-numofnum").text().split('/');
      var ns = parseInt(numArr[0],10)+dnum;
      if(typeof(dnum) == 'string'){
        dnum=='all'&&$(".js-numofnum").text(numArr[1] + "/"+ numArr[1]);
        dnum=='none'&&$(".js-numofnum").text(0 + "/"+ numArr[1]);
      }else{
        $(".js-numofnum").text(ns + "/"+ numArr[1]);
      }
      return numArr;
    },
    toggleFn:function(target){
      var fes;
      if(target.hasClass('am-icon-circle-o')){
        target.removeClass('am-icon-circle-o').addClass('am-icon-check-circle');
         fes = true;
      }else if(target.hasClass('am-icon-check-circle')){
        target.removeClass('am-icon-check-circle').addClass('am-icon-circle-o');
        fes = false;
        
      }else{
        fes = false
        
      }
      return fes;
    },
    setTimeCode:function(btn,num){
      var tm = setInterval(function(){
          btn.attr("disabled","disabled");
          btn.html('<span class="am-icon-circle-o-notch am-icon-spin"></span>'+(num--)+'\u79D2\u91CD\u53D1');
          if(num==0){
            btn.button('reset');
            clearInterval(tm);
            btn.removeAttr("disabled","disabled");
          }

      }, 1000);
    }
  }
  $('.js-loading[data-am-loading][type="submit"]').click(function(){
    $(this).button('loading');
    $(this).closest("form").submit();
  })
  $('#js-rh-form').validator({

    onValid: function(validity) {
      $(validity.field).siblings('.am-error').hide();
    },
    onInValid: function(validity) {
      var $field = $(validity.field);
      var $group = $field.parent("div");
      var $alert = $group.find('.am-error');
      
      var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

      if (!$alert.length) {
        $alert = $('<div class="am-error"></div>').hide().
          appendTo($group);
      }
      $alert.html('<i class="am-icon-warning"></i>'+msg).show();
    }
  });

  $(".js-goback").click(function() {
    var refer = document.referrer;
    var domain = 'http://m.renhe.cn';
    var devDomain = 'http://devwm.renhe.cn';
    var length = domain.length;
    var devLength = devDomain.length;
    if (refer.substr(0, length) == domain || refer.substr(0, devLength) == devDomain) {
      history.go(-1);
    } else {
      window.location = domain + "/register/index.shtml";
    }
  });
  $('a.js-sccode').on("ajax:before",function(e){
    var params = {};
    params[$(this).data('params-name')] = $("#doc-ipt-1").val();
  	$(this).data('params',params)
  })
  $('form.js-rh-form').on("ajax:success",function(e,data){
    var res = register.setWarn(data);
    if(res.success){
      window.location.href= $(this).attr("redirect");
    }
  })
  $('a.js-sccode').on("ajax:success",function(e,data){
    register.setWarn(data);
    register.setTimeCode($(this),$(this).data('loading-time'))
    return false;
  })
  $(".reg-contacts-list .reg-list-icon").click(function(e){
  	if(register.toggleFn($(this))){
      register.numValus(1);
      $(this).find('.outlookId').data('checked',true);
    }else{
      register.numValus(-1);
      $(this).find('.outlookId').data('checked',false);
    }
  })
  $('.reg-option .reg-list-icon').click(function(){
  	var stg = register.toggleFn($(this));
    stg?register.numValus("all"):register.numValus("none");
  	$(".reg-contacts-list .reg-list-icon").each(function(){
  		if(stg){
        $(this).removeClass('am-icon-circle-o').addClass('am-icon-check-circle');
        $(this).find('.outlookId').data('checked',true);
  		}else{  			
        $(this).removeClass('am-icon-check-circle').addClass('am-icon-circle-o');
        $(this).find('.outlookId').data('checked',false)
  		}
  	})
  })
  $("#sendEmailBtn").click(function() {
    var outlookIds = register.checkEmailIdArr();
    if (outlookIds.length > 0) {
      jQuery.ajax({
        url:"http://" + staticDomain + "/ajax/inviteImportedContact.html?jsoncallback=?",
        type:"POST",
        dataType:"jsonp",
        data:{
          outlookIds : outlookIds,
          inviteEmailType : "from_h5register"
        },
        complete:function(){
          alert("\u53D1\u9001\u6210\u529F\uFF01")
          location.href = "/register/download.shtml?from=h5importemail"
        }
      })
        //jQuery.post("http://" + staticDomain + "/ajax/inviteImportedContact.html?jsoncallback=?", { outlookIds : outlookIds,  inviteEmailType : "invite_from_contact" },function(res){
          //alert("\u53D1\u9001\u6210\u529F\uFF01")
        //}, "jsonp");
      } else {
        alert("\u81F3\u5C11\u9009\u62E9\u4E00\u4E2A\u8054\u7CFB\u4EBA\21");
      }
  });
  var options = {
        slides: '.slide', // The name of a slide in the slidesContainer
        swipe: true,    // Add possibility to Swipe > note that you have to include touchSwipe for this
        slideTracker: true, // Add a UL with list items to track the current slide
        slideTrackerID: 'slideposition', // The name of the UL that tracks the slideshttp://localhost:8080/_public/images/h5_reg_guide_4.jpg
        slideOnInterval: false, // Slide on intervalhttp://localhost:8080/_public/images/h5_reg_guide_3.jpg
        interval: 9000, // Interval to slide on if slideOnInterval is enabled
        animateDuration: 500, // Duration of an animation
        animationEasing: 'ease', // Accepts: linear ease in out in-out snap easeOutCubic easeInOutCubic easeInCirc easeOutCirc easeInOutCirc easeInExpo easeOutExpo easeInOutExpo easeInQuad easeOutQuad easeInOutQuad easeInQuart easeOutQuart easeInOutQuart easeInQuint easeOutQuint easeInOutQuint easeInSine easeOutSine easeInOutSine easeInBack easeOutBack easeInOutBack
        pauseOnHover: false, // Pause when user hovers the slide container
        unLoopEdCb:true,
        onece:true
    };

    $(".slider").simpleSlider(options);
    mainslider = $(".slider").data("simpleslider");
    /* yes, that's all! */
    $(".slider").on("beforeSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide; 
        if(event.prevIndex==newSlide) return;    
        $(".slider .slide[data-index='"+prevSlide+"'] .slidecontent").fadeOut();
        $(".slider .slide[data-index='"+newSlide+"'] .slidecontent").hide();
    });

    $(".slider").on("afterSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        if(event.prevIndex==newSlide) return;
        $(".slider .slide[data-index='"+newSlide+"'] .slidecontent").fadeIn();
    });
    $('.js-guide-img').each(function(){
      $(this).parent().backstretch($(this).attr("src"));
      $(this).remove();
    })
});
