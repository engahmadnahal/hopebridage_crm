@extends('layouts.index')
@section('content')

    <section class="content">

        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase"></span>
                            {{--<span class="caption-helper">weekly stats...</span>--}}
                        </div>
                        <div class="actions1" style="align-content: center">
                            <div class="btn-group btn-group-devided" >
<h3 >  عذرا الصفحة المطلوبة غير متوفرة</h3>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_statistics_loading">
                           </div>
                        <div id="site_statistics_content" class="display-none">
                            <div id="site_statistics" class="chart"> 21/12/2017 </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>

    </section>

@endsection