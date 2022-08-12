@extends('layouts.index')

@section('content')


    <div class="widget-list row">

        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-1">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد الطلبات</p><span
                                        class="counter-title color-white"><span
                                            class="counter">{{$customer_cnt}}</span> </span>
                                <!-- /.counter-title --> <span class="counter-difference text-success"> </span>
                                <div class="mr-t-20"><span data-toggle="sparklines" data-height="15" data-width="70"
                                                           data-line-color="#ffffff" data-line-width="3"
                                                           data-spot-radius="1" data-fill-color="rgba(0,0,0,0)"
                                                           data-spot-color="undefined" data-min-spot-color="undefined"
                                                           data-max-spot-color="undefined"
                                                           data-highlight-line-color="undefined"><!-- 10,5,7,8,3,0,4,12,10,8,12 --></span>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-user-plus bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-2">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد المشاريع</p><span
                                        class="counter-title color-white"><span
                                            class="counter">{{$project_cnt}}</span></span>
                                <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                <div class="progress" style="width: 70%; position: relative; top: 25px">
                                    <div class="progress-bar bg-white" style="width: 66%" role="progressbar"><span
                                                class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-award bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-3">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد المستفيدين</p><span
                                        class="counter-title color-white"><span class="counter">{{$reciever_cnt}}</span> </span>
                                <!-- /.counter-title -->
                                <div style="margin-top: 15px"><span data-toggle="sparklines" data-height="15"
                                                                    data-bar-width="3" data-type="bar"
                                                                    data-chart-range-min="0" data-bar-spacing="3"
                                                                    data-bar-color="#ffffff"><!-- 2,4,5,3,2,3,5,3,2,3,5,4,2 --></span>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-briefcase bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-4">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد المستخدمين</p><span class="counter-title"><span
                                            class="counter">{{$user_cnt}}</span> </span>
                                <!-- /.counter-title -->
                                <div class="progress" style="width: 70%; position: relative; top: 25px">
                                    <div class="progress-bar bg-white" style="width: 66%" role="progressbar"><span
                                                class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-clock bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-1">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد الأيتام المكفولين</p><span class="counter-title"><span
                                            class="counter">{{$Orphan_cnt}}</span> </span>
                                <!-- /.counter-title -->
                                <div class="progress" style="width: 70%; position: relative; top: 25px">
                                    <div class="progress-bar bg-white" style="width: 66%" role="progressbar"><span
                                                class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-user-check bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder widget-sm col-md-3 widget-full-height">
            <div class="widget-bg widget-bg-2">
                <div class="widget-body">
                    <a href="#">
                        <div class="counter-w-info media">
                            <div class="media-body">
                                <p class="text-white mr-b-5">عدد الممولين</p><span class="counter-title"><span
                                            class="counter">{{$ProjectSponser_cnt}}</span> </span>
                                <!-- /.counter-title -->
                                <div class="progress" style="width: 70%; position: relative; top: 25px">
                                    <div class="progress-bar bg-white" style="width: 66%" role="progressbar"><span
                                                class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.media-body -->
                            <div class="pull-right align-self-center"><i
                                        class="list-icon feather feather-briefcase bg-white"></i>
                            </div>
                        </div>
                    </a>
                    <!-- /.counter-w-info -->
                </div>
                <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->


    </div>
    <!-- /.widget-list -->
    <hr>



    @push('js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script>


        </script>
    @endpush





@endsection