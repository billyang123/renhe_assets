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
  if ($this.is('form')) {
    return $this.find(':submit:enabled').attr('disabled', 'disabled').attr('data-disabled-by', 'ajax');
  } else if ($this.is(':enabled')) {
    return $this.attr('disabled', 'disabled');
  } else {
    return $this.addClass('rh-disabled');
  }
});

$document.on('ajax:complete', 'a[data-remote], form[data-remote], button', function(evt) {
  var $this;
  if (this !== evt.target) {
    return;
  }
  $this = $(this);
  if ($this.is('form')) {
    return $this.find(':submit:disabled[data-disabled-by=ajax]').removeAttr('disabled').removeAttr('data-disabled-by');
  } else if ($this.is(':disabled')) {
    return $this.removeAttr('disabled');
  } else {
    $this.removeClass('rh-disabled');
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

;require.register("scripts/register/index", function(exports, require, module) {
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

});


//# sourceMappingURL=app.js.map