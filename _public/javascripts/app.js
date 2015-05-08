(function() {
  'use strict';

  var globals = typeof window === 'undefined' ? global : window;
  if (typeof globals.require === 'function') return;

  var modules = {};
  var cache = {};
  var has = ({}).hasOwnProperty;

  var aliases = {};

  var endsWith = function(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
  };

  var unalias = function(alias, loaderPath) {
    var start = 0;
    if (loaderPath) {
      if (loaderPath.indexOf('components/' === 0)) {
        start = 'components/'.length;
      }
      if (loaderPath.indexOf('/', start) > 0) {
        loaderPath = loaderPath.substring(start, loaderPath.indexOf('/', start));
      }
    }
    var result = aliases[alias + '/index.js'] || aliases[loaderPath + '/deps/' + alias + '/index.js'];
    if (result) {
      return 'components/' + result.substring(0, result.length - '.js'.length);
    }
    return alias;
  };

  var expand = (function() {
    var reg = /^\.\.?(\/|$)/;
    return function(root, name) {
      var results = [], parts, part;
      parts = (reg.test(name) ? root + '/' + name : name).split('/');
      for (var i = 0, length = parts.length; i < length; i++) {
        part = parts[i];
        if (part === '..') {
          results.pop();
        } else if (part !== '.' && part !== '') {
          results.push(part);
        }
      }
      return results.join('/');
    };
  })();
  var dirname = function(path) {
    return path.split('/').slice(0, -1).join('/');
  };

  var localRequire = function(path) {
    return function(name) {
      var absolute = expand(dirname(path), name);
      return globals.require(absolute, path);
    };
  };

  var initModule = function(name, definition) {
    var module = {id: name, exports: {}};
    cache[name] = module;
    definition(module.exports, localRequire(name), module);
    return module.exports;
  };

  var require = function(name, loaderPath) {
    var path = expand(name, '.');
    if (loaderPath == null) loaderPath = '/';
    path = unalias(name, loaderPath);

    if (has.call(cache, path)) return cache[path].exports;
    if (has.call(modules, path)) return initModule(path, modules[path]);

    var dirIndex = expand(path, './index');
    if (has.call(cache, dirIndex)) return cache[dirIndex].exports;
    if (has.call(modules, dirIndex)) return initModule(dirIndex, modules[dirIndex]);

    throw new Error('Cannot find module "' + name + '" from '+ '"' + loaderPath + '"');
  };

  require.alias = function(from, to) {
    aliases[to] = from;
  };

  require.register = require.define = function(bundle, fn) {
    if (typeof bundle === 'object') {
      for (var key in bundle) {
        if (has.call(bundle, key)) {
          modules[key] = bundle[key];
        }
      }
    } else {
      modules[bundle] = fn;
    }
  };

  require.list = function() {
    var result = [];
    for (var item in modules) {
      if (has.call(modules, item)) {
        result.push(item);
      }
    }
    return result;
  };

  require.brunch = true;
  globals.require = require;
})();
require.register("scripts/main", function(exports, require, module) {
$(document).ready(function() {
	var script_path = 'scripts/';
	$('[data-main]').each(function(index,item){
		require(script_path+$(item).data('main'));
	})
})
});

;require.register("scripts/module/ajax", function(exports, require, module) {
var $document;

$document = $(document);

$document.on('ajax:success', '[data-done], [data-target]', function(evt, res) {
  var $res, $self, done, hasIn, self, target;
  if (this !== evt.target) {
    return;
  }
  self = this;
  $self = $(this);
  $res = $(res);
  target = $self.data('target');
  done = $self.data('done');
  hasIn = $res.hasClass('in');
  if (hasIn) {
    $res.removeClass('in');
  }
  if (target) {
    $res.appendTo(target);
  }
  if (done) {
    (new Function('res', 'r', '$r', done)).call(self, res, res, $res);
  }
  if (hasIn) {
    $res.prop('offsetWidth');
  }
  if (hasIn) {
    $res.addClass('in');
  }
  if ($self.is('form')) {
    return $self[0].reset();
  }
});

$document.on('ajax:send', 'a[data-remote], form[data-remote], button', function(evt) {
  var $this;
  if (this !== evt.target) {
    return;
  }
  $this = $(this);
  if ($this.data('am-loading')) {
    return $this.button('loading');
  }
  if ($this.is('form')) {
    return $this.find(':submit:enabled').attr('disabled', 'disabled').attr('data-disabled-by', 'ajax');
  } else if ($this.is(':enabled')) {
    return $this.attr('disabled', 'disabled');
  } else {
    return $this.addClass('am-disabled');
  }
});

$document.on('ajax:complete', 'a[data-remote], form[data-remote], button', function(evt) {
  var $this;
  if (this !== evt.target) {
    return;
  }
  $this = $(this);
  if ($this.data('am-loading') && !$this.data('loading-time')) {
    return $this.button('reset');
  }
  if ($this.is('form')) {
    return $this.find(':submit:disabled[data-disabled-by=ajax]').removeAttr('disabled').removeAttr('data-disabled-by');
  } else if ($this.is(':disabled')) {
    return $this.removeAttr('disabled');
  } else {
    $this.removeClass('am-disabled');
    if ($this.is('[data-remote-once=true]')) {
      $this.removeAttr('data-remote');
      return $this.on('click', function(evt) {
        return evt.preventDefault();
      });
    }
  }
});

$(window).on('beforeunload', function() {
  $document.off('ajax:error');
});
});

;require.register("scripts/module/h5PageSlide", function(exports, require, module) {
(function(){

    var now = { row:1, col:1 }, last = { row:0, col:0};
    const towards = { up:1, right:2, down:3, left:4};
    var isAnimating = false;
    var pagesRow = $("#fullscrool").data('row');
  	var limitNum = function(){
    	var arr = [];
    	var idxs = 1;
    	while(idxs < pagesRow+1){
    		arr.push($('[class*="page-'+idxs+'-"]').length);
    		idxs++;
    	}
    	return arr;
    }
    var limitColNum = limitNum();//每行配置页数
    var limitRowNum = pagesRow;//行数
    var sidePst = function(idx){
        var pglen = limitColNum[idx-1];
        var str = '';
        for (var i = 0; i < pglen; i++) {
            str+='<li class="indicator '+(i==0?'active':'')+'" data-index="'+i+'"></li>';
        };
        $('#slideposition').html('<ul>'+str+'</ul>');
        $('#slideposition>ul>li').on("click",function(e){
            var index = $(this).data("index") + 1;
            var i_lf;
            if(index>now.col){
                i_lf = towards.left;
            }else if(index<now.col){
                i_lf = towards.right;
            }else{
                return;
            }
            last.row = now.row;
            last.col = now.col;
            now.row = last.row; now.col = index;                    
            pageMove(i_lf);
        })
    }
    sidePst(now.row);
    s=window.innerHeight/500;
    ss=250*(1-s);

    $('.wrap').css('-webkit-transform','scale('+s+','+s+') translate(0px,-'+ss+'px)');

    document.addEventListener('touchmove',function(event){event.preventDefault(); },false);


    var Hammer = $.AMUI.Hammer;

    var hammertime = new Hammer(document.getElementById('fullscrool'));
    //hammertime.add(new Hammer.Swipe());
    hammertime.get('swipe').set({ direction: Hammer.DIRECTION_ALL });
    
    hammertime.on('swipeleft', function(e) {
        if (isAnimating) return;
        console.log(last,now)
        last.row = now.row;
        last.col = now.col;
        
        if (last.row>0 && last.row<limitRowNum && last.col<limitColNum[now.row-1]) { now.row = last.row; now.col = now.col + 1; pageMove(towards.left);}
    });
    hammertime.on('swiperight', function(e) {
        if (isAnimating) return;
        last.row = now.row;
        last.col = now.col;
        if (last.row>0 && last.row<limitRowNum && last.col!=1) { now.row = last.row; now.col = now.col - 1; pageMove(towards.right);}   
    });
    hammertime.on('swipeup', function(e) {
        if (isAnimating) return;
        console.log(last,now)
        last.row = now.row;
        last.col = now.col;
        if (last.row != limitRowNum) { now.row = last.row+1; now.col = 1; pageMove(towards.up);}
        sidePst(now.row);
    });
    hammertime.on('swipedown', function(e) {
        if (isAnimating) return;
        last.row = now.row;
        last.col = now.col;
        if (last.row!=1) { now.row = last.row-1; now.col = 1; pageMove(towards.down);}
        sidePst(now.row);  
    });
    function pageMove(tw){
        var lastPage = ".page-"+last.row+"-"+last.col,
            nowPage = ".page-"+now.row+"-"+now.col;
        
        switch(tw) {
            case towards.up:
                outClass = 'pt-page-moveToTop';
                inClass = 'pt-page-moveFromBottom';
                break;
            case towards.right:
                outClass = 'pt-page-moveToRight';
                inClass = 'pt-page-moveFromLeft';
                break;
            case towards.down:
                outClass = 'pt-page-moveToBottom';
                inClass = 'pt-page-moveFromTop';
                break;
            case towards.left:
                outClass = 'pt-page-moveToLeft';
                inClass = 'pt-page-moveFromRight';
                break;
        }
        isAnimating = true;
        $(nowPage).removeClass("hide");
        
        $(lastPage).addClass(outClass);
        $(nowPage).addClass(inClass);
        
        setTimeout(function(){
            $(lastPage).removeClass('page-current');
            $(lastPage).removeClass(outClass);
            $(lastPage).addClass("hide");
            $(lastPage).find("img").addClass("hide");
            
            $(nowPage).addClass('page-current');
            $(nowPage).removeClass(inClass);
            $(nowPage).find("img").removeClass("hide");
          
            $('[data-index="'+(last.col-1)+'"]').removeClass('active');
            $('[data-index="'+(now.col-1)+'"]').addClass('active')
            isAnimating = false;
        },600);
    }

})();
});

require.register("scripts/module/simpleSlider", function(exports, require, module) {
/*
    Version 2.3.4
    The MIT License (MIT)

    Simple jQuery Slider is just what is says it is: a simple but powerfull jQuery slider.
    Copyright (c) 2014 Dirk Groenen - Bitlabs Development

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
*/
(function($){
    var simpleSlider = function(element, useroptions){
        // Set some variables
        var obj = this,
            sliderInterval = null;
        obj.currentSlide = 0;
        obj.totalSlides = 0;
        obj.prevIndex = 0;
        // Extend default options with user options
        useroptions = (useroptions === undefined) ? {} : useroptions;
        var options = $.extend({
            slidesContainer: element,
            slides: '.slide',
            slideTracker: true,
            slideTrackerID: 'slideposition',
            slideOnInterval: true,
            interval: 5000,
            swipe: true,
            animateDuration: 1000,
            animationEasing: 'ease',
            pauseOnHover: false,
            updateTransit: true, // Change this to false is you dont want the slider to update the transit useTransitionEnd to true
            unLoopEdCb:false,
            onece:false
        }, useroptions);

        // Init the slider
        obj.init = function(){
            // If transit is included and useTransitionEnd == false we will change this to true (better animation performance).
            // Unless the user changed updateTransit to false
            if(options.updateTransit && $.support.transition && jQuery().transition && !$.transit.useTransitionEnd){
                $.transit.useTransitionEnd = true;
            }

            // Find the slides in the sliderdom and add the index attribute
            $(options.slidesContainer).find(options.slides).each(function(index){
                // Give each slide a data-index so we can control it later on
                $(this).attr('data-index', index);

                // A fixed width is needed for the IE left animation. Here we give each slide a width                
                if ($.support.transition && jQuery().transition){
                    $(this).css({
                        x: index*100+'%',
                        width: $(this).outerWidth()
                    });
                }
                else{
                    $(this).css({
                        left: index*100+'%',
                        width: $(this).outerWidth()
                    });
                }
            });

            // Count the total slides
            obj.totalSlides = $(options.slidesContainer).find(options.slides).length;

            // Place the slideTracker after the container if enabled in the options
            if(options.slideTracker){
                // Add the slideposition div and add the indicators
                $(options.slidesContainer).after("<div id='"+ options.slideTrackerID +"'><ul></ul></div>");
                for(var x = 0; x < obj.totalSlides;x++){
                    $('#'+ options.slideTrackerID +' ul').append('<li class="indicator" data-index="'+x+'"></li>');
                }
                $('#'+ options.slideTrackerID +' ul li[data-index="'+obj.currentSlide+'"]').addClass('active');

                // Make the slide indicators clickable
                $("#"+ options.slideTrackerID +" ul li").click(function(){
                    if(!($(this).hasClass("active")))
                        obj.nextSlide($(this).data('index'));
                });
            }

            // Start the slider interval if enabled in options
            if(options.slideOnInterval){
                setSliderInterval();
            }

            // Change the cursor with a grabbing hand that simulates the swiping on desktops
            if(options.swipe && $.AMUI.Hammer){
                $(options.slidesContainer).css('cursor','-webkit-grab');
                $(options.slidesContainer).css('cursor','-moz-grab');
                $(options.slidesContainer).css('cursor','grab');

                $(options.slidesContainer).mousedown(function(){
                    $(options.slidesContainer).css('cursor','-webkit-grabbing');
                    $(options.slidesContainer).css('cursor','-moz-grabbing');
                    $(options.slidesContainer).css('cursor','grabbing');
                });

                $(options.slidesContainer).mouseup(function(){
                    $(options.slidesContainer).css('cursor','-webkit-grab');
                    $(options.slidesContainer).css('cursor','-moz-grab');
                    $(options.slidesContainer).css('cursor','grab');
                });

                // Add the swipe actions to the container

                var Hammer = $.AMUI.Hammer;
                var hammertime = new Hammer($(options.slidesContainer)[0]);

                hammertime.on('swipeleft', function(e) {
                  obj.nextSlide();
                });
                hammertime.on('swiperight', function(e) {
                  obj.prevSlide();
                });
            }
            else if(!$.AMUI.Hammer && options.swipe === true){
                console.warn("Duo the missing TouchSwipe.js swipe has been disabled.");
            }
        }();

        // Bind the function that recalculates the width of each slide on a resize.
        $(window).resize(function(){
            $(options.slidesContainer).find(options.slides).each(function(index){
                // Reset width; otherwise it will keep the same width as before
                $(this).css('width','');
                $(this).css({x: index*100+'%',width: $(this).outerWidth()});
            });
        });

        // Controller of the interval
        function setSliderInterval(){
            clearInterval(sliderInterval);
            sliderInterval = setInterval(function(){
                obj.nextSlide();
            },options.interval);
        };

        // Go to a previous slide (calls the nextslide function with the new slide number
        obj.prevSlide = function(){
            //if(options.unLoopEdCb && obj.currentSlide == 0) return;
            //var slide = (obj.currentSlide > 0) ? obj.currentSlide -= 1 : (obj.totalSlides - 1);
            var unNum = options.onece ? 0:(obj.totalSlides - 1);
            var slide = (obj.currentSlide > 0) ? obj.currentSlide -= 1 : unNum;
            obj.nextSlide(slide);
        };

        // Go to a next slide (function is also used for the previous slide and goto slide functions).
        // If a paramater is given it will go to the given slide
        obj.nextSlide = function(slide){
            // Cache the previous slide number and set slided to false
            var prevSlide = obj.currentSlide,
                slided = false;
            var unNum = options.onece ? (obj.totalSlides - 1):0;
            if(options.unLoopEdCb && obj.currentSlide == (obj.totalSlides-1)) {
                typeof(options.unLoopEdCb) == "function" && options.unLoopEdCb();
            }
            if(slide === undefined)
                //obj.currentSlide = (obj.currentSlide < (obj.totalSlides-1)) ? obj.currentSlide += 1 : 0 ;
                obj.currentSlide = (obj.currentSlide < (obj.totalSlides-1)) ? obj.currentSlide += 1 : unNum ;
            else
                obj.currentSlide = slide;

            // Create trigger point before a slide slides. Trigger wil return the prev and coming slide number
            $(element).trigger({
                type: "beforeSliding",
                prevSlide: prevSlide,
                newSlide: obj.currentSlide,
                totalSlides:obj.totalSlides,
                prevIndex:obj.prevIndex
            });

            // Slide animation, here we determine if we can use CSS transitions (transit.js) or have to use jQuery animate
            $(options.slidesContainer).find(options.slides).each(function(index){
                if ($.support.transition && jQuery().transition)
                    $(this).stop().transition({x: ($(this).data('index')-obj.currentSlide)*100+'%'}, options.animateDuration, options.animationEasing);
                else
                    $(this).stop().animate({left: ($(this).data('index')-obj.currentSlide)*100+'%'}, options.animateDuration, triggerSlideEnd);
            });

            // Somehow the callback from $.transition doesn't work, so we create ow custom bind here
            $(options.slidesContainer).on('oTransitionEnd webkitTransitionEnd oTransitionEnd otransitionend transitionend', triggerSlideEnd);

            // Create trigger point after a slide slides. All the slides return a TransitionEnd; to prevent a repeating trigger we keep a slided var
            function triggerSlideEnd(){
                if(!slided){
                    $(element).trigger({
                        type: "afterSliding",
                        prevSlide: prevSlide,
                        newSlide: obj.currentSlide,
                        totalSlides:obj.totalSlides,
                        prevIndex:obj.prevIndex
                    });
                    slided = true;
                }
                obj.prevIndex = obj.currentSlide;
            }

            // Show current slide bulb
            $('#'+ options.slideTrackerID +' ul li').removeClass('active');
            $('#'+ options.slideTrackerID +' ul li[data-index="'+obj.currentSlide+'"]').addClass('active');

            // (Re)set the slider interval
            if(options.slideOnInterval){
                setSliderInterval();
            }
        };

        // Function for the pauseOnHover.
        //The function will clear the interval and restart it after the mouse disappears from the container
        if(options.pauseOnHover){
            $(options.slidesContainer).hover(function(){
                clearInterval(sliderInterval);
            }, function(){
                setSliderInterval();
            });
        }
    };

    // Create a plugin
    $.fn.simpleSlider = function(options){
        return this.each(function(){
            var element = $(this);

            // Return early if this element already has a plugin instance
            if (element.data('simpleslider')) return;

            // Pass options and element to the plugin constructer
            var simpleslider = new simpleSlider(this, options);

            // Store the plugin object in this element's data
            element.data('simpleslider', simpleslider);
        });
    }
})(jQuery);

});

require.register("scripts/register/index", function(exports, require, module) {
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

});


//# sourceMappingURL=app.js.map