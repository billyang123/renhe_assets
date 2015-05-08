<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>人和网app</title>
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <script type="text/javascript" src="/_public/javascripts/vendor.js"></script>
    <script type="text/javascript" src="/_public/javascripts/app.js"></script>
    <link href="/_public/stylesheets/app.css" rel="stylesheet">
    <script type="text/javascript" data-main="register/index">require('scripts/main')</script>
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
    .page-current{
        z-index:1;
    }
    .page .wrap>img {
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
  	<div id="fullscrool">
  		#set($page_index = 0)
  		
  		#if($inviteMember)
  		#set($page_index=$page_index+1)
  		<div class="page page-1-${page_index} page-current" style="background-color: #fe514d;">
            <div class="wrap">
                <img src="$inviteMember.userFaceImageUrl" class="img_1 am-circle" width="150" height="150">
                <p style="padding: 0px 10px;" class="img-info_1">
                    <strong>$inviteMember.name</strong><br/>
							$inviteMember.curTitle<br/>
							$inviteMember.curCompany<br><br>
				                 您的好友$inviteMember.name邀请您下载使用人和网APP，保持永久联系。
                </p>
                <div class='slidecontent pt-page-moveFromBottom'>
                    #if($register)
					<a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-white am-radius-r" style="color:#fe514d;width:50%;">下载app</a><br>
					<a href="/register/view.shtml?email=$!email" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册人和网</a>
					#else
					<a href="/app/renhedownload.shtml?from=h5importemail" class="am-btn am-btn-white am-radius-r" style="color:#fe514d;width:50%;">下载app</a><br>
					#end
                </div>
            </div>
        </div>
        #end
        
        #set($page_index=$page_index+1)
        <div class="page page-1-${page_index}" style="background-color: #56c9e8;">
            <div class="wrap">
                <img class="img_1" src="/_public/images/text_02_bd.png" />
                <img class="img_2" src="/_public/images/view_02_bd.png" />

                <div class='slidecontent pt-page-moveFromBottom'>
                    #if($register)
					<a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-white am-radius-r" style="color:#56c9e8;width:50%;">下载app</a><br>
					<a href="/register/view.shtml?email=$!email" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册人和网</a>
					#else
					<a href="/app/renhedownload.shtml?from=h5importemail" class="am-btn am-btn-white am-radius-r" style="color:#56c9e8;width:50%;">下载app</a><br>
					#end
                </div>
            </div>
        </div>
        
        #set($page_index=$page_index+1) 
        <div class="page page-1-${page_index} hide" style="background-color: #ffbc3d;">
            <div class="wrap">
                <img class="img_1" src="/_public/images/text_03_bd.png" />
                <img class="img_2" src="/_public/images/view_03_bd.png" />
                <div class='slidecontent pt-page-moveFromBottom'>
                    #if($register)
					<a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-white am-radius-r" style="color:#ffbc3d;width:50%;">下载app</a><br>
					<a href="/register/view.shtml?email=$!email" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册人和网</a>
					#else 
					<a href="/app/renhedownload.shtml?from=h5importemail" class="am-btn am-btn-white am-radius-r" style="color:#ffbc3d;width:50%;">下载app</a><br>
					#end
                </div>
            </div>
        </div>
        
        #set($page_index=$page_index+1)
        <div class="page page-1-${page_index} hide" style="background-color: #9074d0;">
            <div class="wrap">
                <img class="img_1" src="/_public/images/text_04_bd.png" />
                <img class="img_2" src="/_public/images/view_041_bd.png" />
                <div class='slidecontent pt-page-moveFromBottom'>
                    #if($register)
					<a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-white am-radius-r" style="color:#9074d0;width:50%;">下载app</a><br>
					<a href="/register/view.shtml?email=$!email" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册人和网</a>
					#else
					<a href="/app/renhedownload.shtml?from=h5importemail" class="am-btn am-btn-white am-radius-r" style="color:#9074d0;width:50%;">下载app</a><br>
					#end
                </div>
            </div>
        </div>
        
##        #set($page_index=$page_index+1)
##        <div class="page page-1-${page_index} hide" style="background-color: #FFF;">
##           <div class="wrap">
##                <img class="img_1" src="/_public/images/view_05_bd.png" />
##               
##                <div class='slidecontent pt-page-moveFromBottom'>
##                    <a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-purple am-radius-r" style="width:50%;">下载app</a><br>
##						#if($register)
##						<a href="/register/view.shtml" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#9174d0;border-color:#9174d0;">注册人和网</a>
##						#end
##				  </div>
##            </div>
##        </div>
        
        #set($page_index=$page_index+1)
        <div class="page page-1-${page_index} hide" style="background-color: #FFF;">
            <div class="wrap">
                <img class="img_1" src="/_public/images/view_06_bd.png" />
                <div class='slidecontent pt-page-moveFromBottom'>
                	#if($register)
					<a href="/app/renhedownload.shtml?from=h5register" class="am-btn am-btn-danger am-radius-r" style="color:#fff;width:50%;">下载app</a><br>
					<a href="/register/view.shtml?email=$!email" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#8d8d8d;border-color:#ddd;">注册人和网</a>
					#else
					<a href="/app/renhedownload.shtml?from=h5importemail" class="am-btn am-btn-danger am-radius-r" style="color:#fff;width:50%;">下载app</a><br>
					#end
                </div>
            </div>
        </div>
        
        <div id="slideposition"></div>
  	</div>
  	<div style="display:none;">
    	<a href="http://www.anquan.org/s/r.renhe.cn" name="QanjmBQKrDC7pYUT05zcAHcCIQ9d5Uhxyv59iRDAQJTIPrsxTi">
			安全联盟
		</a>
    </div>
	<script type="text/javascript">
        (function(){

	        var now = { row:1, col:1 }, last = { row:0, col:0};
	        const towards = { up:1, right:2, down:3, left:4};
	        var isAnimating = false;
	
			var pages = $('[class*="page-1-"]');
			var str = '';
	        for (var i = 0; i < pages.length; i++) {
	            str+='<li class="indicator '+(i==0?'active':'')+'" data-index="'+i+'"></li>';
	        };
	        $('#slideposition').html('<ul>'+str+'</ul>');
	        var limitColNum = [pages.length];//每行配置页数
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
	            
	            if (last.row>0 && last.row<=limitRowNum && last.col<limitColNum[now.row-1]) { now.row = last.row; now.col = now.col + 1; pageMove(towards.left);}
	        });
	        hammertime.on('swiperight', function(e) {
	            if (isAnimating) return;
	            last.row = now.row;
	            last.col = now.col;
	            if (last.row>0 && last.row<=limitRowNum && last.col!=1) { now.row = last.row; now.col = now.col - 1; pageMove(towards.right);}   
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
	        $('#slideposition li').live("click",function(e){
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
        </script>
  </body>
</html>