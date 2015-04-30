require('scripts/module/ajax')
require('scripts/module/simpleSlider')
$(function() {
  var setWarn = function(data){
    var _data = (typeof(data) == 'string') ? $.parseJSON(data):data
    if(!_data.success){
      if(!_data.name) return;
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
  }
  var checkEmailIdArr = function(){
    var email_arr = [];
    $('.outlookId').each(function(index,item){
      if($(this).data("checked")) {
        email_arr.push($(item).val())
      }
    })
    return email_arr;
  }
  var numValus = function(){
    var numArr = $(".js-numofnum").text().split('/');

    return numArr
  }
  var toggleFn = function(target){
    var fes;
    if(target.hasClass('am-icon-circle-o')){
      target.removeClass('am-icon-circle-o').addClass('am-icon-check-circle');
       fes = true;
       var numArr = numValus(),ns = numArr[0]++;
       $(".js-numofnum").text(ns + "/"+ numArr[1])

    }else if(target.hasClass('am-icon-check-circle')){
      target.removeClass('am-icon-check-circle').addClass('am-icon-circle-o');
      fes = false;
      var numArr = numValus(),ns = numArr[0]--;
       $(".js-numofnum").text(ns + "/"+ numArr[1])
    }else{
      fes = false
      
    }
    fes?target.find('.outlookId').data('checked',true):target.find('.outlookId').data('checked',false)
    return fes;
  }
  $('#js-rh-form').validator({

    onValid: function(validity) {
      $(validity.field).siblings('.am-error').hide();
    },
    onInValid: function(validity) {
      var $field = $(validity.field);
      var $group = $field.parent("div");
      var $alert = $group.find('.am-error');
      // 使用自定义的提示信息 或 插件内置的提示信息
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
    var domain = window.domain || 'http://devwm.renhe.cn';
    var length = domain.length;
    if (refer.substr(0, length) == domain) {
      history.go(-1);
    } else {
      location = domain;
    }
  });
  $(document).on("ajax:before",'a.js-sccode',function(e){
    var params = {};
    params[$(this).data('params-name')] = $("#doc-ipt-1").val();
  	$(this).data('params',params)
  })
  $(document).on("ajax:success",'form.js-rh-form',function(e,data){
    var res = setWarn(data);

  })
  $(document).on("ajax:success",'a.js-sccode',function(e,data){
    setWarn(data);
  })
  $(".reg-contacts-list .reg-list-icon").click(function(e){
  	toggleFn($(this));

  })
  $('.reg-option .reg-list-icon').click(function(){
  	var stg = toggleFn($(this));
  	$(".reg-contacts-list .reg-list-icon").each(function(){
  		if(stg){
        $(this).removeClass('am-icon-circle-o').addClass('am-icon-check-circle');		
  		}else{  			
        $(this).removeClass('am-icon-check-circle').addClass('am-icon-circle-o');
  		}
  	})
  })
  $("#sendEmailBtn").click(function() {
    var outlookIds = checkEmailIdArr();
    if (outlookIds.length > 0) {
        jQuery.post("/ajax/inviteImportedContact.html?jsoncallback=?", { outlookIds : outlookIds,  inviteEmailType : "invite_from_contact" }, "jsonp");
      } else {
        alert("至少选择一个联系人!");
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
        unLoopEdCb:true
    };

    $(".slider").simpleSlider(options);
    mainslider = $(".slider").data("simpleslider");
    /* yes, that's all! */
    $(".slider").on("beforeSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".slider .slide[data-index='"+prevSlide+"'] .slidecontent").fadeOut();
        $(".slider .slide[data-index='"+newSlide+"'] .slidecontent").hide();
    });

    $(".slider").on("afterSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".slider .slide[data-index='"+newSlide+"'] .slidecontent").fadeIn();
    });
    $('.js-guide-img').each(function(){
      $(this).parent().backstretch($(this).attr("src"));
      $(this).remove();
    })
});
