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
    
  </head>
  <body>
  	<style>
        html,body,div,span,h1,h2,h3,h4,h5,h6,p,a{
            font-size:100%;
            font:inherit;
            vertical-align:baseline;
            margin:0;
            padding:0;
            border:0;
        }
        html,body{
            height:100%;
            margin:0 auto;
            font-family: "Microsoft Yahei", Helvetica, Arial, Verdana, sans-serif;
            height:100%;
            background:#dedede;
            -webkit-user-select:none;
            -webkit-text-size-adjust:none;
        }
        .imag
        {
            height:100%;
            width:320px;
            margin:0 auto;
            position: relative;
        }
        
        
        .imag-splash .start-text
        {
            padding:30px 10px;
            display:block;
            color: #fff;
        }
        
        .imag-splash > .loading{
            margin:10px;
            font-size:90%;
            color:gray;
        }
        .flex-container-vertical {
            display: -moz-box;
            display: -ms-box-box;
            display: -webkit-box;
            display: -o-box;
            display: box;
            -moz-box-orient: vertical;
            -webkit-box-orient: vertical;
            -ms-box-orient: vertical;
            -o-box-orient: vertical;
            box-orient: vertical;
            -moz-box-align:stretch;
            -ms--box-align:stretch;
            -webkit-box-align:stretch;
            -o-box-align:stretch;
            box-align:stretch;
        }
        .flex-row-1 {
            -moz-box-flex: 1;
            -webkit-box-flex: 1;
            -ms-box-flex: 1;
            -o-box-flex: 1;
            box-flex: 1;
        }
        .imag-main{
            position: absolute;
            top:0;
            left:100%;
            height:100%;
            width:100%;
            margin:0;
            z-index:2;
        }
    </style>
    <div class="imag">
        <div class="imag-splash">
            <div class="help-text">
                <noscript>
                    <span style="background:#fff;padding:10px;">请打开浏览器Javascript选项。</span>
                </noscript>
                <span class="start-text"></span>
                <span class="tip-text" ></span>

            </div>
        </div>
        <div class="imag-main flex-container-vertical">
            <div class="imag-body flex-row-1">
                <div class="slider">
                    <div class="page imetro-index-page" title="首页"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="公司介绍"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="企业文化"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="套餐新玩法"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="你飞Young了吗"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="iPhone5 Note2 合约机"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="青春时尚包"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="3G智能手机大讲堂"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="翼吧"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page luckyDraw" title="刮刮乐"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                    <div class="page" title="应用墙"><img src="/_public/images/h5_reg_guide_2.jpg" alt="找人脉更方便" class="js-guide-img"></div>
                </div>
            </div>
        </div>
        <div class="imag-popup-box">
            <div class="imag-popup-close touchable"></div>
            <div class="imag-popup-content"></div>
        </div>
        <div class="imag-popup-mask"></div>
        <div class="imag-global-loading"></div>
    </div>
    <script type="text/javascript">
        
        function fullScreen(rootDom) {
            var root = rootDom || document.body;
            document.body.style.overflow = 'hidden';
            root.style.height = window.screen.height + 'px';
            window.scrollTo(0, 1)
            root.style.height = window.innerHeight + 'px';
        }

        var App = {
            loadGlobalResource: function () {
                function animate() {
                    $('.tip-text').show().animate(
                    { opacity: 0.2 }, {
                        ease: 'linear',
                        duration: 500,
                        complete: function () {
                            $('.tip-text').animate(
                                { opacity: 1 }, {
                                    ease: 'linear',
                                    duration: 500,
                                    complete: function () {
                                        animate();
                                    }
                                }
                            );
                        }
                    })
                }
                var startTxt = document.querySelector('.imag-splash .start-text');
                
            },
            refresh: function (isFullScreen) {
                var imag = document.querySelector('.imag');
                var isWideScreen = window.innerWidth > 800;
                if (!isWideScreen && isFullScreen) {
                    fullScreen(imag);
                }
                else {
                    imag.style.height = '100%';
                    document.body.style.overflow = 'visible';
                }
            },
            init: function () {
                document.addEventListener('touchstart', function (e) { if (!$(e.changedTouches[0].target).hasClass('imag-tel')) { e.preventDefault(); } }, false);
                document.querySelector('.imag-splash').addEventListener('touchstart', function (e) {
                    e.preventDefault();
                })
                window.addEventListener('load', function (e) {
                    App.refresh(true);
                    App.loadGlobalResource();
                });
                window.addEventListener('onorientationchange' in window ? 'orientationchange' : 'resize', function (e) {
                    App.refresh(true);
                });
            }
        };
        App.init();
        window._hmt = [];
    </script>

	
  </body>
</html>