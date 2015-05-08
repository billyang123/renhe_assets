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
    <script type="text/javascript" src="../_public/javascripts/vendor.js"></script>
    <script type="text/javascript" src="../_public/javascripts/app.js"></script>
    <link href="../_public/stylesheets/app.css" rel="stylesheet">
    <script type="text/javascript" data-main="register/index">
    staticDomain = "#";
    require('scripts/main')</script>
  </head>
  <body>
    <div class="reg-container">
      <header data-am-widget="header" class="am-header reg-header">
        <div class="am-header-left am-header-nav js-goback">
          <a href="#left-link" class="reg-back">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
            alt="" />
            新用户注册
          </a>
        </div>
      </header>
      <div class="j-alert-content">
        <div class="am-alert am-alert-r am-clearfix">
          <i class="am-icon-check-circle am-tip-icon"></i>导入并邀请邮箱通讯录中的好友，快速拓展你的人脉提升社交的效率。
        </div>
      </div>
      <section>
        <form class="am-form am-form-horizontal" id="js-rh-form" data-remote="true" action="/pages/a.json" method="post">
          <div class="am-form-group reg-group">
            <label for="doc-ipt-1" class="am-u-sm-4 am-form-label" >手机号码</label>
            <div class="am-u-sm-8">
              <input type="text" id="doc-ipt-1" placeholder="请输入你的手机号码" name="phone" required pattern="^1((3|5|8){1}\d{1}|70)\d{8}$">
            </div>
            
          </div>
          <div class="am-form-group reg-group">
            <label for="doc-ipt-2" class="am-u-sm-4 am-form-label">验证码</label>
            <div class="am-u-sm-6">
              <input type="text" id="doc-ipt-2" placeholder="请输入验证码" name="code" required>
            </div>
            <div class="am-u-sm-2 am-relative">
              <a class="am-btn am-btn-default am-btn-xs am-radius-r am-insideput js-sccode" data-am-loading="{spinner: 'circle-o-notch', loadingText: '发送中', resetText: '重新发送'}" href="/pages/a.json" data-remote="true" data-params-name="phone">发送</a>
            </div>
          </div>
          <div class="am-form-group reg-group">
            <label for="doc-ipt-3" class="am-u-sm-4 am-form-label">密码</label>
            <div class="am-u-sm-8">
              <input type="password" id="doc-ipt-3" placeholder="请输入密码">
            </div>
          </div>
          <div class="am-form-group reg-group">
            <label for="doc-ipt-4" class="am-u-sm-4 am-form-label">真实姓名</label>
            <div class="am-u-sm-8">
              <input type="text" id="doc-ipt-4" placeholder="请输入真实姓名">
            </div>
          </div>
          <div class="am-form-group reg-group">
            <label for="doc-ipt-5" class="am-u-sm-4 am-form-label">邮箱</label>
            <div class="am-u-sm-8">
              <input type="email" id="doc-ipt-5" placeholder="请输入邮箱">
            </div>
          </div>
          <div class="am-form-group">
            <div class="am-text-center">
              <button type="submit" class="am-btn am-btn-purple am-radius-r" style="width:80%;">下一步</button>
            </div>
          </div>
        </form>
        <div class="am-text-center">
          <p class="reg-text">我已阅读并同意<a href="#">人和网服务条款</a></p>
        </div>
      </section>
    </div>
    <div class="reg-container">
      <header data-am-widget="header" class="am-header reg-header">
        <div class="am-header-left am-header-nav">
          <a href="#left-link" class="reg-back">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
            alt="" />
            从邮箱导入
          </a>
        </div>
      </header>
      <div class="am-alert am-alert-r am-clearfix">
        <i class="am-icon-check-circle am-tip-icon"></i>导入并邀请邮箱通讯录中的好友，快速拓展你的人脉提升社交的效率。
      </div>
      <section>
        <form class="am-form am-form-horizontal">
          <div class="am-form-group">
            <div class="am-u-sm-12 clearfix reg-email-ipt">
              <input type="text"  value="2897555081" style="width:50%;" class="am-fl"><span class="am-fl">@</span><input class="am-fl" type="text"  value="qq.com" style="width:30%;">
            </div>
            
          </div>
          
          <div class="am-form-group">
            <div class="am-text-center">
              <button type="submit" class="am-btn am-btn-purple am-radius-r" style="width:80%;">导入联系人</button>
            </div>
          </div>
        </form>
        <div class="am-text-center">
          <p class="reg-text">人和网不会记住你的邮箱密码，请放心使用。</p>
        </div>
      </section>
    </div>
    <div class="reg-container">
      <header data-am-widget="header" class="am-header reg-header">
        <div class="am-header-left am-header-nav">
          <a href="#left-link" class="reg-back">
            <img class="am-header-icon-custom" src="data:image/svg+xml;charset=utf-8,&lt;svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 12 20&quot;&gt;&lt;path d=&quot;M10,0l2,2l-8,8l8,8l-2,2L0,10L10,0z&quot; fill=&quot;%23fff&quot;/&gt;&lt;/svg&gt;"
            alt="" />
            发送邀请
          </a>
        </div>
      </header>
      <section>
      <div id="slider">
          <div class="slider-content">
            <ul class="am-list reg-contacts-list">
              
              <li id="a">
                <a name="a" class="reg-cl-title">A</a>
                <ul class="am-list">
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str" data-checked="true">
                    <i class="am-icon-circle-o am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                </ul>
              </li>
              <li id="b">
                <a name="b" class="reg-cl-title">B</a>
                <ul class="am-list">
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                </ul>
              </li>
              <li id="c">
                <a name="c" class="reg-cl-title">C</a>
                <ul class="am-list">
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str" data-checked="true">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                  <li class="clearfix">
                    <input type="hidden" value="289755081@qq.com" class="js-email-str">
                    <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
                    <div class="am-fl">
                      <strong>billyang</strong></br>
                      <span>289755081@qq.com</span>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="reg-option clearfix">
            <input value="s@a.com,adas" type="hidden" class="js-emails" name="emails">
            <i class="am-icon-check-circle am-fl reg-list-icon am-icon-md"></i>
            <strong class="am-fl">全选</strong>
            <button class="am-btn am-btn-purple am-radius am-fr">发送（50/50）</button>
          </div>
      </div>
      </section>

    </div>
  </body>
</html>