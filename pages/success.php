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
  </head>
  <body>
  	<style type="text/css">
	html,body{
		margin: 0;
		padding: 0;
		height: 100%;
		background-color: #fff;
		width: 100%;
		color:#222222;
	}
	img {
		display: inline-block;
	}
	.pagewrap{
		height: 100%;
	}

	.pageblock{
		width: 100%;
	}

	.pagewrap .fb-like{
		position: fixed;
		left: 30px;
		top: 75px;
		z-index: 100;
	}

	.pagewrap .githubbuttons{
		position: fixed;
		left: 220px;
		top: 75px;
		z-index: 100;
	}

	.pagewrap .copy{
		font-size: 10px;
		bottom: 20px;
		left: 30px;
		z-index: 100;
		position: absolute;
		color: white;
	}

	.pagewrap .copy a,.pagewrap .copy a:hover{
		color: white;
	} 

	.pageblock#fullscreen{
		height: 100%;
		background: none;
		color: white;
	}

	.pageblock#fullscreen h1{
		color: white;
		font-size: 72px;
		margin: 0;
		padding: 0;
		font-family: 'sxehwcmaax-blackblack', Helvetica, Arial, Verdana;
		font-weight:normal;
	}

	.pageblock#fullscreen .slider{
		width: 100%;
		height: 100%;
		overflow: hidden;
		position: relative;
	}

	.pageblock#fullscreen .slider .slide{
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		float: left;
		position: absolute;
	}

	.pageblock#fullscreen .slider .slide .slidecontent{
		position: absolute;
		bottom: 50px;
		width: 100%;
		text-align: center;
	}



	.pageblock#fullscreen #slideposition{
		position: absolute;
		bottom: 10px;
		left: 0;
		display: block;
		width: 100%;
		text-align: center;
	}

	.pageblock#fullscreen #slideposition ul{
		display: inline-block;
		list-style-type: none;
		margin: 0;
		padding: 0;
	}

	.pageblock#fullscreen #slideposition ul li.indicator{
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

	.pageblock#fullscreen #slideposition ul li.indicator.active{
		background: #ababab;
		opacity: 0.8;
	}
	.slidecontent-user {
		position: absolute;
		top: 10%;
		width: 100%;
		text-align: center;
	}
	.slidecontent-hd {
		position: absolute;
		width: 100%;
		top: 10%;
		text-align: center;
	}
	.slidecontent-hd .page-sbkimg{
		width: 28%;
	}
	@media screen and (min-width: 320px) and (max-width: 480px) {
	    .slidecontent-hd {
			top: 4%;
		}
		.slidecontent-hd .page-sbkimg{
			width: 70%;
		}
	}
	@media only screen and (min-width: 321px) and (max-width: 1024px) {
	    .slidecontent-hd {
			top: 4%;
		}
		.slidecontent-hd .page-sbkimg{
			width: 80%;
		}
	}
	@media all and (orientation : landscape) { /*　　这是匹配横屏的状态，横屏时的css代码　　*/
		.slidecontent-hd {
			top: 4%;
		}
		.slidecontent-hd .page-sbkimg{
			width: 28%;
		}
	}
	
  	</style>
	<div class='pagewrap'>
		<div class='pageblock' id='fullscreen'>
			<div class='slider'>
				<div class='slide' style="background-color:#fe514d;">
					<div class='slidecontent-hd'>
						<img src="/_public/images/user.jpg" width="150" height="150" class="am-circle">
						<p style="padding: 0px 10px;">
							<strong>何琴</strong><br/>
							市场顾问<br/>
							华腾财富投资顾问有限公司
						</p>
						<p style="padding: 0px 10px;margin-top:0;">您的好友何琴邀请您下载使用和聊APP，保持永久联系。</p>
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-white am-radius-r" style="color:#fe514d;width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
					</div>		
				</div>
				<div class='slide' style="background-color:#20c0f1;">
					<div class='slidecontent-hd'>
						<img src="/_public/images/text_02_bd.png"  class="am-center page-sbkimg">
						<img src="/_public/images/view_02_bd.png" class="am-center am-margin-top-lg page-sbkimg">
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-white am-radius-r" style="color:#56c9e8;width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>

					</div>
					
				</div>
				<div class='slide' style="background-color:#ffbc3d;">
					<div class='slidecontent-hd'>
						<img src="/_public/images/text_03_bd.png" class="am-center page-sbkimg">
						<img src="/_public/images/view_03_bd.png" class="am-center am-margin-top-lg page-sbkimg">
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-white am-radius-r" style="color:#ffbc3d;width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
					</div>
				</div>
				<div class='slide' style="background-color:#9074d0;">
					<div class='slidecontent-hd'>
						<img src="/_public/images/text_04_bd.png" class="am-center page-sbkimg">
						<img src="/_public/images/view_041_bd.png" class="am-center am-margin-top-lg page-sbkimg">
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-white am-radius-r" style="color:#9074d0;width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;">注册和聊</a>
					</div>

					
				</div>
				<div class='slide' style="background-color:#fff;">

					<div class='slidecontent-hd'>
						<img src="/_public/images/view_05_bd.png" class="am-center page-sbkimg">
						
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-purple am-radius-r" style="width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#9174d0;border-color:#9174d0;">注册和聊</a>
					</div>					
				</div>
				<div class='slide' style="background-color:#fff;">

					<div class='slidecontent-hd'>
						<img src="/_public/images/view_06_bd.png" class="am-center page-sbkimg">
						
					</div>
					<div class='slidecontent'>
						<a href="#" class="am-btn am-btn-danger am-radius-r" style="color:#fff;width:50%;">下载app</a><br>
						<a href="#" class="am-btn am-btn-transparent am-radius-r am-margin-top-sm" style="width:50%;color:#8d8d8d;border-color:#ddd;">注册人和网</a>
					</div>

					
				</div>
			</div>
		</div>
	</div>
  </body>
</html>