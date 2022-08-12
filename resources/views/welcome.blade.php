<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@if(isset($title)) {{$title}} @endif</title>
	<!-- Modernizr -->
    {{--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">--}}
        <link rel="stylesheet" href="{{url('assets')}}/loingstyle/bootstrap/css/bootstrap.min.css">



	<script src="{{url('assets')}}/loingstyle/js/modernizr.js"></script>
	<!-- Open Sans from Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<!-- Main styles file -->
	<link rel="stylesheet" href="{{url('assets')}}/loingstyle/css/styles.css" />
	<!-- Icons via Font Awesome -->
	<link rel="stylesheet" href="{{url('assets')}}/loingstyle/css/font-awesome.min.css" />
</head>
<body class="color-scheme-neue">
	<!-- Animated background -->
	<canvas id="bg-canvas"></canvas>
	<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: url({{url('assets')}}/loingstyle/images/hongkong-bg.jpg) no-repeat center center; background-size: cover; "></div>
	<!-- First screen -->
	<div class="splash">
		<div class="centered-unit">
			<div class="container">
			
				<div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                                    <div class ="logo ">
                    <a href="{{url('assets')}}/loingstyle/index.html">
{{--                        <img src="{{url('assets')}}/loingstyle/img/test.png" class="logo" alt="images">--}}
                    </a>
                    </div>
                    <h1 class="mb-0" style="font-size: 54px; font-weight: 700"><span class="text-warning">  </span></h1>
                            <div class="description">
                            	<p>
	                            	 <strong></strong>
                                     <br>
                                       
                            	</p>
                            </div>
                        </div>
                  
                    <div class="row">
                        <div class="col-md-5 col-sm-6 col-sm-offset-0 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>قم بتسجيل الدخول</h3>
                            		<p>أدخل البريد الالكتروني وكلمة المرور للدخول الى النظام</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
									{{ csrf_field() }}

			                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			                    		<label class="sr-only" for="form-username">{{ old('email') }}</label>
			                        	<input type="text" name="email" placeholder="البريد الالكتروني" class="form-username form-control" id="email">

			                        	        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        1111
                                    </span>
                                @endif


			                        </div>
			                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			                        	<label class="sr-only" for="form-password">كلمة المرور</label>
			                        	<input type="password" name="password" placeholder="كلمة المرور" class="form-password form-control" id="password">

			                        	     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

			                        </div>
			                        <button type="submit" class="btn">تسجيل الدخول</button>
                                    <div class="forget">
                                   {{--<a href="{{ route('password.request') }}">--}}
                                    {{--<p>نسيت كلمة المرور ؟</p>--}}
                                {{--</a>--}}

                                 {{--<a href="#">--}}
                                    {{--<p>لا يوجد لديك حساب ؟ قم بالتسجيل الأن !</p>--}}
                                {{--</a>--}}
                                    </div>
			                    </form>
		                    </div>
                        </div>

<div class="col-md-7 ">

<div class="col-sm-8 col-sm-offset-2 text">
                                   
                    <h1 class="" style="font-size: 54px; font-weight: 700"><span class="text-warning">جمعية جسر الأمل الخيرية الفلسطينية</span></h1>
                            <div class="description">
                            	<p>
	                            	 <strong>نظام تسجيل الاحياجات</strong>
                                     <br>
                                        أهلا بك عزيزي الباحث
                            	</p>
                            </div>
                        </div>


<div class="fig">
	                  <figure class="mb-0" style="margin-top: 180px;">
                <img src="{{url('assets')}}/loingstyle/images/showcase.png" alt="Showcase">

 

                </figure>
<style type="text/css">
.mb-0  {

	 animation: imageAnimation 8s linear infinite;
  backface-visibility: hidden;
  background-size: cover;
  background-position: center center;
  color: transparent;
  height: 100%;
  left: 0;
  top: 0;
  width: 100%;
}


  @keyframes imageAnimation {
  0% {
    opacity:1;
  }
  17% {
    opacity:1;
  }
  25% {
    opacity:0;
  }
 
}
</style> 


                        	</div>



                                                </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3> تواصل معنا من خلال</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="{{url('assets')}}/loingstyle/#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="{{url('assets')}}/loingstyle/#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="{{url('assets')}}/loingstyle/#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
				<!-- Countdown end -->
			</div>	
		</div>
	</div>
	</div>
	<!-- Second screen -->
	
	
	<!-- JavaScripts -->
	
	<script src="{{url('assets')}}/loingstyle/js/jquery.js"></script>
	<script src="{{url('assets')}}/loingstyle/js/countdown.js"></script>
	<script src="{{url('assets')}}/loingstyle/js/bezierCanvas.js"></script>
	<script src="{{url('assets')}}/loingstyle/js/notifyMe.js"></script>
	
	<script type="text/javascript">
	$().ready(function(){
	
		// Activate countdownTimer plugin on a '.countdown' element
		$(".countdown").countdownTimer({
			// Set the end date for the countdown
			endTime: new Date("April 21, 2014 11:13:00 UTC+0200")
		});
		
		
		// Activate notifyMe plugin on a '#notifyMe' element	
		$("#notifyMe").notifyMe();
		
			
		// Activate bezierCanvas plugin on a #bg-canvas element
		$("#bg-canvas").bezierCanvas({
			maxStyles: 5,
			maxLines: 100,
			strokeWidth: 0.7,
			lineSpacing: 0.09,
			spacingVariation: 0.07,
			colorBase: {r: 100,g: 120,b: 200},
			colorVariation: {r: 50, g: 50, b: 50},
			moveCenterX: 0,
			moveCenterY: 0,
			delayVariation: 4,
			globalAlpha: 0.4,
			globalSpeed:200,
		});
		
		// Add handler on 'Scroll down to learn more' link
		$().ready(function(){
			$(".overlap .more").click(function(e){
				e.preventDefault();
				$("body,html").animate({scrollTop: $(window).height()});
			});
		});		

		
	});
	</script>
        
</body>
</html>