<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$sys_title}}</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600%7CRoboto:400" rel="stylesheet"
          type="text/css">

    <meta content="" name="description"/>

    <meta content="" name="author"/>
    <style>
        @media print {
            #document-title, #Footer {
                display: none !important;
            }
        }
    </style>

@include('layouts.css')

<!-- <link rel="shortcut icon" href="favicon.ico" /> --> </head>

<!-- END HEAD -->


<body class="sidebar-expand rtl">


<!-- BEGIN CONTAINER -->

<div id="wrapper" class="wrapper">

    @include('layouts.header')

    <div class="content-wrapper">
        @include('layouts.menu')
        <main class="main-wrapper clearfix">

            <!-- Page Title Area -->
            <div class="row page-title clearfix">
            {{--<div class="page-title-left">--}}
            {{--<h6 class="page-title-heading mr-0 mr-r-5">Dashboard</h6>--}}
            {{--<p class="page-title-description mr-0 d-none d-md-inline-block">statistics, charts and events</p>--}}
            {{--</div>--}}
            <!-- /.page-title-left -->
                <div class="page-title-left d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        @if(isset($title))
                            <li class="breadcrumb-item active">{{$title}}</li>
                        @endif
                        @if(isset($breadcrumb))
                            <li class="breadcrumb-item "><a href="#">{{$breadcrumb}}</a></li>
                        @endif
                        <li class="breadcrumb-item"><a href="{{url('home')}}">الرئيسية</a>
                        </li>

                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>

            @yield('content')


        </main>


    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <footer class="footer"><span class="heading-font-family">الحقوق محفوظة @ 2018. شركة وقت البيانات</span>
    </footer>
</div>
<!--/ #wrapper -->


@include('layouts.js')
<script>
    @if(session()->has('msg'))
        toastr.success('{{session()->get('msg')}}');
    @endif
</script>


</body>


</html>