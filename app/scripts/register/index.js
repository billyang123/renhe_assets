require('scripts/module/ajax')
$(function() {
  $('#doc-vld-msg').validator({

    onValid: function(validity) {
      $(validity.field).closest('.rh-form-group').find('.rh-error').hide();
    },
    onInValid: function(validity) {
      var $field = $(validity.field);
      var $group = $field.closest('.rh-u-sm-8');
      var $alert = $group.find('.rh-error');
      // 使用自定义的提示信息 或 插件内置的提示信息
      var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

      if (!$alert.length) {
        $alert = $('<div class="rh-error"></div>').hide().
          appendTo($group);
      }
      $alert.html('<i class="rh-icon-warning"></i>'+msg).show();
    }
  });
  $(document).on("ajax:before",'a.js-sccode',function(e){
  	$(this).data('params',{'iphone':$("#doc-ipt-1").val()})
  })
  $(document).on("ajax:success",'a.js-sccode',function(e,data){
  	var _type = $(this).data("one-send");
  	if(_type == true){
  		$(this).text("重新发送")
  	}
  })
  var toggleFn = function(target){
  	var fes;
  	if(target.hasClass('rh-icon-circle-o')){
  		target.removeClass('rh-icon-circle-o').addClass('rh-icon-check-circle');
  		 fes = true;
  	}else if(target.hasClass('rh-icon-check-circle')){
  		target.removeClass('rh-icon-check-circle').addClass('rh-icon-circle-o');
  		fes = false;
  	}else{
  		fes = false
  	}
  	return fes;
  }
  $("#slider .reg-list-icon").click(function(e){
  	toggleFn($(this));
  })
  $('#slider .reg-option').click(function(){
  	var stg = toggleFn($(this));
  	$("#slider .reg-list-icon").each(function(){
  		if(stg){
  			$(this).removeClass('rh-icon-check-circle').addClass('rh-icon-circle-o');
  		}else{
  			$(this).removeClass('rh-icon-circle-o').addClass('rh-icon-check-circle');
  		}
  	})
  })
});
