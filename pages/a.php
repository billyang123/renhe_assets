<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>新用户注册</title>
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    #set($cdnPath = "http://192.168.1.103:8080")
    <script type="text/javascript" src="${cdnPath}/_public/javascripts/vendor.js"></script>
    <script type="text/javascript" src="${cdnPath}/_public/javascripts/app.js"></script>
    <link href="${cdnPath}/_public/stylesheets/app.css" rel="stylesheet">
    <script type="text/javascript" data-main="register/index">require('scripts/main')</script>
  </head>
  <body>
    <div class="reg-container">
      <header data-am-widget="header" class="am-header reg-header">
        <div class="am-header-left am-header-nav">
          <a href="#left-link" class="reg-back">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
            alt="" />  新用户注册
          </a>
        </div>
      </header>
      <section>
        <form class="rh-form rh-form-horizontal" id="doc-vld-msg">
          <div class="rh-form-group reg-group">
            <label for="doc-ipt-1" class="rh-u-sm-4 rh-form-label" >手机号码</label>
            <div class="rh-u-sm-8">
              <input type="text" id="doc-ipt-1" placeholder="请输入你的手机号码" required pattern="^1((3|5|8){1}\d{1}|70)\d{8}$">
            </div>
            
          </div>
          <div class="rh-form-group reg-group">
            <label for="doc-ipt-2" class="rh-u-sm-4 rh-form-label">验证码</label>
            <div class="rh-u-sm-6">
              <input type="text" id="doc-ipt-2" placeholder="请输入验证码">
            </div>
            <div class="rh-u-sm-2 rh-relative">
              <button type="button" class="rh-btn rh-btn-default rh-btn-xs rh-radius-r rh-insideput">重新发送</button>
            </div>
          </div>
          <div class="rh-form-group reg-group">
            <label for="doc-ipt-3" class="rh-u-sm-4 rh-form-label">密码</label>
            <div class="rh-u-sm-8">
              <input type="password" id="doc-ipt-3" placeholder="请输入密码">
            </div>
          </div>
          <div class="rh-form-group reg-group">
            <label for="doc-ipt-4" class="rh-u-sm-4 rh-form-label">真实姓名</label>
            <div class="rh-u-sm-8">
              <input type="text" id="doc-ipt-4" placeholder="请输入真实姓名">
            </div>
          </div>
          <div class="rh-form-group reg-group">
            <label for="doc-ipt-5" class="rh-u-sm-4 rh-form-label">邮箱</label>
            <div class="rh-u-sm-8">
              <input type="email" id="doc-ipt-5" placeholder="请输入邮箱">
            </div>
          </div>
          <div class="rh-form-group">
            <div class="rh-text-center">
              <button type="submit" class="rh-btn rh-btn-purple rh-radius-r" style="width:80%;">下一步</button>
            </div>
          </div>
        </form>
        <div class="rh-text-center">
          <p class="reg-text">我已阅读并同意<a href="#">人和网服务条款</a></p>
        </div>
      </section>
    </div>
    
  </body>
</html>