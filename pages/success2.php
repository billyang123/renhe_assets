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
    <script type="text/javascript" data-main="register/index">require('scripts/main')</script>
    <link rel="stylesheet" type="text/css" href="http://demo.mycodes.net/shouji/HTML5zhaopin/css/animations.css">


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
        font-size:100px;
        text-align:center;
    }

    .page .wrap{
        height:500px;
    }

    .page-1-1{ background-color:#083846;}
    .page-2-1{ background-color:#9261BF;}
    .page-2-2{ background-color:#9261BF;}
    .page-3-1{ background-color:#F3533C;}
    .page-3-2{ background-color:#F3533C;}
    .page-4-1{ background-color:#FFBF50;}
    .page-4-2{ background-color:#FFBF50;}
    .page-5-1{ background-color:#083846;}

    .page-current{
        z-index:1;
    }

    .page-1-1 .img_1 {
        height:auto;
        width:248px;
        position:absolute;
        left:50%;
        top:1%;
        margin-left:-124px;
    }
    .page-1-1 .img_2 {
        height:auto;
        width: 200px;
        position:absolute;
        left:50%;
        top: 27%;
        margin-left:-92px;
    }
    .page-1-1 .img_3 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:93%;
        margin-left:-12px;
    }
    .page-2-1 .img_1 {
        height:auto;width:158px;
        position:absolute;
        left:50%;
        top:2%;
        margin-left:-79px;
        z-index:2;
    }
    .page-2-1 .img_2 {
        height:auto;width:240px;
        position:absolute;
        left:50%;
        top:28%;
        margin-left:-120px;
    }
    .page-2-1 .img_3 {
        height:auto;width:241px;
        position:absolute;
        left:50%;
        top:36%;
        margin-left:-120px;
    }
    .page-2-1 .img_4 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-2-1 .img_5 {
        height:auto;width:142px;
        position:absolute;
        left:50%;
        top:82%;
        margin-left:-71px;
    }
    .page-2-1 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-2-1 .img_7 {
        height:auto;width:248px;
        position:absolute;
        left:50%;
        top:8%;
        margin-left:-110px;
    }
    .page-2-2 .img_1 {
        height:auto;width:293px;
        position:absolute;
        left:50%;
        top:5%;
        margin-left:-146px;
    }
    .page-2-2 .img_2 {
        height:auto;width:260px;
        position:absolute;
        left:50%;
        top:75%;
        margin-left:-130px;
    }
    .page-2-2 .img_3 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-2-2 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-3-1 .img_1 {
        height:auto;width:166px;
        position:absolute;
        left:50%;
        top:2%;
        margin-left:-86px;
        z-index:2;
    }
    .page-3-1 .img_2 {
        height:auto;width:250px;
        position:absolute;
        left:50%;
        top:30%;
        margin-left:-125px;
    }
    .page-3-1 .img_3 {
        height:auto;width:172px;
        position:absolute;
        left:50%;
        top:28%;
        margin-left:-55px;
    }
    .page-3-1 .img_4 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-3-1 .img_5 {
        height:auto;width:142px;
        position:absolute;
        left:50%;
        top:82%;
        margin-left:-71px;
    }
    .page-3-1 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-3-1 .img_7 {
        height:auto;width:248px;
        position:absolute;
        left:50%;
        top:43%;
        margin-left:-124px;
    }
    .page-3-2 .img_1 {
        height:auto;width:296px;
        position:absolute;
        left:50%;
        top:5%;
        margin-left:-148px;
    }
    .page-3-2 .img_2 {
        height:auto;width:260px;
        position:absolute;
        left:50%;
        top:75%;
        margin-left:-130px;
    }
    .page-3-2 .img_3 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-3-2 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-4-1 .img_1 {
        height:auto;width:162px;
        position:absolute;
        left:50%;
        top:2%;
        margin-left:-84px;
        z-index:2;
    }
    .page-4-1 .img_2 {
        height:auto;width:230px;
        position:absolute;
        left:50%;
        top:28%;
        margin-left:-115px;
    }
    .page-4-1 .img_3 {
        height:auto;width:161px;
        position:absolute;
        left:50%;
        top:28%;
        margin-left:-80px;
    }
    .page-4-1 .img_4 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-4-1 .img_5 {
        height:auto;width:142px;
        position:absolute;
        left:50%;
        top:82%;
        margin-left:-71px;
    }
    .page-4-1 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-4-1 .img_7 {
        height:auto;width:271px;
        position:absolute;
        left:50%;
        top:33%;
        margin-left:-135px;
    }
    .page-4-1 .img_8 {
        height:auto;width:169px;
        position:absolute;
        left:50%;
        top:75%;
        margin-left:-84px;
    }
    .page-4-2 .img_1 {
        height:auto;width:298px;
        position:absolute;
        left:50%;
        top:5%;
        margin-left:-149px;
    }
    .page-4-2 .img_2 {
        height:auto;width:260px;
        position:absolute;
        left:50%;
        top:75%;
        margin-left:-130px;
    }
    .page-4-2 .img_3 {
        height:auto;width:20px;
        position:absolute;
        left:50%;
        top:87%;
        margin-left:-10px;
    }
    .page-4-2 .img_6 {
        height:auto;width:25px;
        position:absolute;
        left:50%;
        top:92%;
        margin-left:-12px;
    }
    .page-5-1 .img_1 {
        height:auto;width:280px;
        position:absolute;
        left:50%;
        top:20%;
        margin-left:-140px;
    }
    .page-5-1 .img_2 {
        height:auto;width:260px;
        position:absolute;
        left:50%;
        top:67%;
        margin-left:-130px;
    }

    </style>
    <div id="fullscrool">
            <div class="page page-1-1 page-current">
                <div class="wrap">
                    <img class="img_1 pt-page-moveFromTop" src="/_public/images/text_01_bd.png" />
                    <img class="img_2 pt-page-moveFromLeft" src="/_public/images/view_01_bd.png" />
                    <!--<img class="img_1 pt-page-moveFromTop" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/cover.png" />
                    <img class="img_2 pt-page-moveFromLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_cover.png" />
                    <img class="img_3 pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />-->
                </div>
            </div>
            <div class="page page-1-2 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle.png" />
                    <img class="img_3 hide pt-page-moveFromLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_develop.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_develop.png" />
                </div>
            </div>
            <div class="page page-2-1 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle.png" />
                    <img class="img_3 hide pt-page-moveFromLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_develop.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_develop.png" />
                </div>
            </div>
            <div class="page page-2-2 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/introduction.png" />
                    <img class="img_2 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_develop.png" />
                    <img class="img_3 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot2.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                </div>
            </div>
            <div class="page page-3-1 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_design.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle-design.png" />
                    <img class="img_3 pt-page-moveFromBottom hide" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people_design.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_design.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_design.png" />
                </div>
            </div>
            <div class="page page-3-2 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/introduction_design.png" />
                    <img class="img_2 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_design.png" />
                    <img class="img_3 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot2.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                </div>
            </div>
            
            <div class="page page-4-1 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-moveFromBottom" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/wording_production.png" />
                    <img class="img_2 hide pt-page-moveCircle" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/circle-production.png" />
                    <img class="img_3 pt-page-moveFromRight hide" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/people_production.png" />
                    <img class="img_4 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot1.png" />
                    <img class="img_5 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/check_production.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                    <img class="img_7 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/floating_production.png" />
                    <img class="img_8 hide pt-page-scaleUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/pic_shadow_production.png" />
                </div>
            </div>
            
            <div class="page page-4-2 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/introduction_production.png" />
                    <img class="img_2 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_production.png" />
                    <img class="img_3 hide pt-page-flipInLeft" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/dot2.png" />
                    <img class="img_6 hide pt-page-moveIconUp" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/icon_up.png" />
                </div>
            </div>
            <div class="page page-5-1 hide">
                <div class="wrap">
                    <img class="img_1 hide pt-page-rotateCubeBottomIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/pic_back.png" />
                    <img class="img_2 hide pt-page-rotateCubeTopIn" src="http://demo.mycodes.net/shouji/HTML5zhaopin/img/btn_join.png" />
                </div>
            </div>
        </div>
        <script type="text/javascript">
        (function(){

        var now = { row:1, col:1 }, last = { row:0, col:0};
        const towards = { up:1, right:2, down:3, left:4};
        var isAnimating = false;


        var limitColNum = [2,2,2,2,2];//每行配置页数
        var limitRowNum = limitColNum.length;

        s=window.innerHeight/500;
        ss=250*(1-s);

        $('.wrap').css('-webkit-transform','scale('+s+','+s+') translate(0px,-'+ss+'px)');

        document.addEventListener('touchmove',function(event){
            event.preventDefault(); },false);


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
        });
        hammertime.on('swipedown', function(e) {
            if (isAnimating) return;
            last.row = now.row;
            last.col = now.col;
            if (last.row!=1) { now.row = last.row-1; now.col = 1; pageMove(towards.down);}  
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
                
                isAnimating = false;
            },600);
        }

        })();
        </script>
  </body>
</html>