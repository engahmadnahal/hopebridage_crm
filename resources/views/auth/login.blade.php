@extends('layouts.app')

@section('content')
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
                                        {{--<img src="{{url('assets')}}/loingstyle/img/test.png" class="logo" alt="images">--}}
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

                            <div class="roww">
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
                                                <a href="{{ route('password.request') }}">
                                                    <p>نسيت كلمة المرور ؟</p>
                                                </a>

                                                {{-- <a href="#">
                                                    <p>لا يوجد لديك حساب ؟ قم بالتسجيل الأن !</p>
                                                </a> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-7 ">

                                    <div class="col-sm-8 col-sm-offset-2 text">

                                        <h1 class="" style="font-size: 54px; font-weight: 700"><span class="text-warning">جمعية جسر الأمل الخيرية الفلسطينية </span></h1>
                                        {{-- <div class="description">
                                            <p>
                                                <strong>نظام تقييم مستوى الفقر الالكتروني</strong>
                                                <br>
                                                أهلا بك عزيزي الزائر لنظام تقييم مستوى الفقر الالكتروني
                                            </p>
                                        </div> --}}
                                    </div>


                                    <div class="fig">
                                        <figure class="mb-0" style="margin-top: 180px;">
                                            {{--<img src="{{url('assets')}}/loingstyle/images/showcase.png" alt="Showcase">--}}



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
                            <div class="roww">
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


@endsection
