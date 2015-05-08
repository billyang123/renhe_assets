<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>引导页</title>
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <script type="text/javascript" src="/_public/javascripts/vendor.js"></script>
    <script type="text/javascript" src="/_public/javascripts/app.js"></script>
    <link href="/_public/stylesheets/app.css" rel="stylesheet">
    <script type="text/javascript" data-main="module/h5PageSlide">require('scripts/main')</script>
  </head>
  <body>
    <style type="text/css">
    html {
        height:100%;
    }
    #fullscrool {
        width: 100%;
        height: 100%;
        position: absolute;
    }
    body{
    
    width:100%;
    overflow:hidden;
    
    }
    .hide{ display:none;}

    .page{
        width:100%;
        height:100%;
        position:absolute;
        text-align:center;
    }

    .page .wrap{
        height:100%;
    }
    .page-1-1 {
        background-color: #fe514d;
    }
    .page-1-2{ background-color:#56c9e8;}
    .page-2-1,.page-1-3{ background-color:#ffbc3d;}
    .page-2-2{ background-color:#9261BF;}
    .page-3-1,.page-1-4{ background-color:#9074d0;}
    .page-3-2{ background-color:#F3533C;}
    .page-4-1,.page-1-5{ background-color:#FFF;}
    .page-4-2{ background-color:#FFBF50;}
    .page-5-1,.page-1-6{ background-color:#FFF;}

    .page-current{
        z-index:1;
    }
    .page>.wrap>img {
        position: absolute;
    }
    .slidecontent{
        position: absolute;
        top: 77%;
        width: 100%;
        text-align: center;
    }
    .page .img_1{
        height:auto;
        width:250px;
        position:absolute;
        left:50%;
        top:2%;
        margin-left:-125px;
    }
    .page .img_2{
        height:auto;
        width: 250px;
        position:absolute;
        left:50%;
        top: 27%;
        margin-left:-125px;
    }
    .page.img_3 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:93%;
        margin-left:-12px;
    }
    #slideposition{
        position: absolute;
        bottom: 0;
        left: 0;
        display: block;
        width: 100%;
        text-align: center;
        z-index: 10;
    }

    #slideposition ul{
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    #slideposition ul li.indicator{
        display: inline-block;
        height: 10px;
        width: 10px;
        background: #ddd;
        margin: 0px 7px;
        padding: 0;
        -webkit-border-radius: 999px;
        -moz-border-radius: 999px;
        border-radius: 999px;
        overflow: hidden;
        cursor: pointer;
    }

    #slideposition ul li.indicator.active{
        background: #ababab;
        opacity: 0.8;
    }
    .img-info_1,.img-info_2 {
        position: absolute;
        width: 100%;
        padding: 0px 10px;
    }
    .img-info_1 {
        top: 37%;
        color: #FFF;
    }
    </style>
    <div id="fullscrool" data-row="2">
            <!--
                .pt-page-moveFromTop
                .pt-page-moveFromLeft
                .pt-page-moveFromRight
                .pt-page-moveFromBottom
                .pt-page-moveIconUp 上下条跳动
                .pt-page-scaleUp 放大
                .pt-page-moveCircle 上下浮动
                .pt-page-rotateCubeBottomIn
                .pt-page-rotateCubeTopIn
            -->
            <div class="page page-1-1 page-current">
                <div class="wrap">
                    <img src="http://amui.qiniudn.com/bw-2014-06-19.jpg" class="img_1 pt-page-flipInLeft am-circle" width="150" height="150">
                    <p style="padding: 0px 10px;" class="img-info_1">
                        <strong>何琴</strong><br/>
                        市场顾问<br/>
                        华腾财富投资顾问有限公司<br><br>
                        您的好友何琴邀请您下载使用和聊APP，保持永久联系。
                    </p>
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-white am-radius-r" style="color:#fe514d;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
                    </div>
                </div>
            </div>
            <div class="page page-1-2">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/text_02_bd.png" />
                    <img class="img_2 pt-page-flipInLeft" src="/_public/images/view_02_bd.png" />
                    <!--<img class="img_1 pt-page-moveFromTop" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/cover.png" />
                    <img class="img_2 pt-page-moveFromLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_cover.png" />
                    <img class="img_3 pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />-->

                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-white am-radius-r" style="color:#56c9e8;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
                    </div>
                </div>
            </div>
            <div class="page page-1-3 hide">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/text_03_bd.png" />
                    <img class="img_2 pt-page-flipInLeft" src="/_public/images/view_03_bd.png" />
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-white am-radius-r" style="color:#ffbc3d;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
                    </div>
                    <!--<img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle.png" />
                    <img class="img_3 hide pt-page-moveFromLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_develop.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_develop.png" />-->
                </div>
            </div>
            <div class="page page-1-4 hide">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/text_04_bd.png" />
                    <img class="img_2 pt-page-flipInLeft" src="/_public/images/view_041_bd.png" />
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-white am-radius-r" style="color:#9074d0;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
                    </div>
                    <!--<img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_design.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle-design.png" />
                    <img class="img_3 pt-page-moveFromBottom hide" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people_design.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_design.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_design.png" />-->
                </div>
            </div>
            <div class="page page-1-5 hide">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/view_05_bd.png" />
                   
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-purple am-radius-r" style="width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#9174d0;border-color:#9174d0;">注册和聊</a>
                    </div>
                    <!--<img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_production.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle-production.png" />
                    <img class="img_3 pt-page-moveFromRight hide" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people_production.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_production.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_production.png" />
                    <img class="img_8 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/pic_shadow_production.png" />-->
                </div>
            </div>
            <div class="page page-1-6 hide">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/view_06_bd.png" />
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-danger am-radius-r" style="color:#fff;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#8d8d8d;border-color:#ddd;">注册人和网</a>
                    </div>
                    <!--<img class="img_1 hide pt-page-rotateCubeBottomIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/pic_back.png" />
                    <img class="img_2 hide pt-page-rotateCubeTopIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_join.png" />-->
                </div>
            </div>
            <div class="page page-2-1 hide">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/view_06_bd.png" />
                    <div class='slidecontent pt-page-moveFromBottom'>
                        <a href="#" class="am-btn am-btn-danger am-radius-r" style="color:#fff;width:50%;">下载app</a><br>
                        <a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#8d8d8d;border-color:#ddd;">注册人和网</a>
                    </div>
                    <!--<img class="img_1 hide pt-page-rotateCubeBottomIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/pic_back.png" />
                    <img class="img_2 hide pt-page-rotateCubeTopIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_join.png" />-->
                </div>
            </div>
            <div id="slideposition">
                <ul></ul>
            </div>
        </div>
  </body>
</html>