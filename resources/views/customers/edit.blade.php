@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="widget-list row">
            <div class="widget-holder widget-sm col-md-3 widget-full-height">
                <div class="widget-bg">
                    <div class="widget-body">
                        <a href="#">
                            <div class="counter-w-info media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">رقم الملف</p><span class="counter-title color-primary"><span
                                                class="counter">{{$customer->file_no}}</span> </span>
                                    <!-- /.counter-title --> <span class="counter-difference text-success"> </span>
                                    <div class="mr-t-20"><span data-toggle="sparklines" data-height="15" data-width="70"
                                                               data-line-color="#1976d2" data-line-width="3"
                                                               data-spot-radius="1" data-fill-color="rgba(0,0,0,0)"
                                                               data-spot-color="undefined"
                                                               data-min-spot-color="undefined"
                                                               data-max-spot-color="undefined"
                                                               data-highlight-line-color="undefined"><!-- 10,5,7,8,3,0,4,12,10,8,12 --></span>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-user-plus bg-primary"></i>
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
                <div class="widget-bg">
                    <div class="widget-body">
                        <a href="#">
                            <div class="counter-w-info media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">التقييم</p><span class="counter-title color-info"><span
                                                class="counter">{{$customer->total}}</span></span>
                                    <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                    <div class="progress" style="width: 70%; position: relative; top: 25px">
                                        <div class="progress-bar bg-info" style="width: 66%" role="progressbar"><span
                                                    class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-award bg-info"></i>
                                </div>
                            </div>
                        </a>
                        <!-- /.counter-w-info -->
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>

            <div class="widget-holder widget-sm col-md-3 widget-full-height">
                <div class="widget-bg">
                    <div class="widget-body">
                        <a href="#project_model" id="project_count" data-toggle="modal">
                            <div class="counter-w-info media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">عدد مرات الاستفادة</p><span
                                            class="counter-title color-info"><span
                                                class="counter">{{$help_count}}</span></span>
                                    <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                    <div class="progress" style="width: 70%; position: relative; top: 25px">
                                        <div class="progress-bar bg-info" style="width: 66%" role="progressbar"><span
                                                    class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-watch bg-pink"></i>
                                </div>
                            </div>
                        </a>
                        <!-- /.counter-w-info -->
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>


            <div class="widget-holder widget-sm col-md-3 widget-full-height">
                <div class="widget-bg">
                    <div class="widget-body">
                            <div class="counter-w-warning media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">أخر تحديث</p><span
                                            class="counter-title color-info"><span style="direction: ltr">{{$customer->updated_at}}</span></span>
                                    <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                    <div class="progress" style="width: 70%; position: relative; top: 25px">
                                        <div class="progress-bar bg-info" style="width: 66%" role="progressbar"><span
                                                    class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-watch bg-pink"></i>
                                </div>
                            </div>
                        
                        <!-- /.counter-w-info -->
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>


        </div>
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase"> مستفيد جديد </span>
                </div>
            </div>
            <div class="portlet-body">
                {{--<div class="tabbable-line">--}}
                {{--<ul class="nav nav-tabs nav-tabs-lg">--}}
                {{--<li class="active">--}}
                {{--<a href="#tab_3" class="nav-link"  data-toggle="tab"> البيانات الرئيسية </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#tab_4" class="nav-link"  data-toggle="tab" id="customer_tab"> معلومات العائلة--}}
                {{--<span class="badge badge-success">4</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#tab_5" class="nav-link" data-toggle="tab" id="attachment_id2"> بيانات خاصة برب الاسرة والسكن </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#tab_7" class="nav-link"  data-toggle="tab" id="related_post_tab2"> السلع المعمرة ورأي الأخصائي </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#tab_8" class="nav-link"  data-toggle="tab" > رأي الأخصائي </a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {!! Form::open(['method'=>'post','url'=> url($route) , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}
                {{--<div class="tab-content">--}}
                <div class="tab-pane active" id="tab_3">
                    <div class="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ملاحظات مدخل البيانات </label>
                                    <div class="col-md-12">
                                        <input type="text" name="note2" value="{{$customer->note2}}"
                                               class="form-control">
                                        <span class="note2" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> نوع الحالة </label>
                                    <div class="col-md-9">
                                        <input type="hidden" name="customer_id" id="customer_id"
                                               value="{{$customer->id}}">
                                        <select name="type" id="customer_type" class="form-control" required>
                                            <option value=""> -- اختر نوع الحالة --</option>
                                            @foreach($Types as $tt)
                                                <option value="{{$tt->id}}" {{($tt->id==$customer->type ? "selected" : "")}}>{{$tt->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="type" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">المحافظة</label>
                                    <div class="col-md-9">
                                        <select name="state_id" id="state_id" class="form-control" required>
                                            <option value=""> -- اختر المحافظة --</option>
                                            @foreach($States as $state)
                                                <option value="{{$state->id}}" {{($state->id==$customer->state_id ? "selected" : "")}}>{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="state_id" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اختر المنطقة</label>
                                    <div class="col-md-9">
                                        <select name="region_id" id="region_id" class="form-control" required>
                                            @foreach($Regions as $region)
                                                <option value="{{$region->id}}" {{($region->id==$customer->region_id ? "selected" : "")}}>{{$region->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="region_id" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">العنوان</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" value="{{$customer->address}}"
                                               placeholder="العنوان" class="form-control">
                                        <span class="address" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> اسم المستفيد </label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_name" value="{{$customer->name}}"
                                               class="form-control" required>
                                        <span class="cus_name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">رقم الهوية</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="card_no" value="{{$customer->card_no}}"
                                                   class="form-control" required>
                                        </div>
                                        <span class="card_no" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">هوية الزوج/ة</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="card_no_wife" value="{{$customer->card_no_wife}}"
                                                   class="form-control" required>
                                        </div>
                                        <span class="card_no_wife" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اسم رب الاسرة </label>
                                    <div class="col-md-9">
                                        <input type="text" name="father_name" value="{{$customer->father_name}}"
                                               class="form-control" placeholder="اسم رب الاسرة" required>
                                        <span class="father_name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> اسم المجيب على النموذج </label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_entry" value="{{$customer->cus_entry}}"
                                               class="form-control" placeholder="المجيب على النموذج" required>
                                        <span class="cus_entry" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">المعيل الثاني </label>
                                    <div class="col-md-9">
                                        <input type="text" name="second_father" value="{{$customer->second_father}}"
                                               placeholder="المعيل الثاني" class="form-control">
                                        <span class="second_father" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">جوال /الهاتف</label>
                                    <div class="col-md-9">
                                        <input type="text" name="mobile" value="{{$customer->mobile}}"
                                               placeholder="الجوال" class="form-control">
                                        <span class="mobile" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">المواطنة</label>
                                    <div class="col-md-9">
                                        <select name="citizin" class="form-control" required>
                                            <option value=""> -- اختر مواطن/لاجىء --</option>
                                            @foreach($Citizens as $citz)
                                                <option value="{{$citz->id}}" {{($citz->id==$customer->state_id ? "selected" : "")}}>{{$citz->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="citizin" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">نوع المنطقة السكنية</label>
                                    <div class="col-md-9">
                                        <select name="region_type" id="region_type" class="form-control" required>
                                            @foreach($RegionTypes as $regiontype)
                                                <option value="{{$regiontype->id}}" {{($regiontype->id==$customer->region_type ? "selected" : "")}}>{{$regiontype->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="region_type" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">عدد افراد الاسرة</label>
                                    <div class="col-md-9">
                                        <input id="child_no" name="child_no" type="text" class="form-control"
                                               value="{{$customer->child_no}}">
                                        <span class="child_no" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="death_div"
                                 style={{($customer->type == 1 ? "display:none" : "display:block") }}>
                                <div class="form-group">
                                    <label class="control-label col-md-3">تاريخ الوفاة</label>
                                    <div class="col-md-9">
                                        <input id="child_dob" name="child_dob" type="text"
                                               class="form-control datepicker" value="{{$customer->death_date}}"
                                               data-date-format="yyyy-mm-dd" data-plugin-options='{"autoclose": true}'>
                                        <span class="death_date" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-eye font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">بيانات العائلة</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">الاسم </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="child_name[]" class="form-control"
                                                               placeholder="الاسم">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">الهوية </label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="child_card_no[]" class="form-control"
                                                               placeholder="الهوية">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> نوع العلاقة </label>
                                                    <div class="col-md-12">
                                                        <select name="child_relation[]" class="form-control">
                                                            @foreach($Relation as $rell)
                                                                <option value="{{$rell->id}}">{{$rell->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"> العمل </label>
                                                    <div class="col-md-10">
                                                        <select name="child_work[]" class="form-control">
                                                            @foreach($Works as $wk)
                                                                <option value="{{$wk->id}}">{{$wk->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">تاريخ الميلاد</label>
                                                    <div class="col-md-10">
                                                        <input id="child_dob" name="child_dob[]" type="text"
                                                               class="form-control datepicker" value="{{$date}}"
                                                               data-date-format="yyyy-mm-dd" required
                                                               data-plugin-options='{"autoclose": true}'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">الجنس </label>
                                                    <div class="col-md-12">
                                                        <select name="child_jender[]" class="form-control">
                                                            @foreach($Jenders as $jender)
                                                                <option value="{{$jender->id}}">{{$jender->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label col-md-12">ح.الصحية </label>
                                                    <div class="col-md-12">
                                                        <select name="child_health[]" class="form-control">
                                                            @foreach($Healths as $helth)
                                                                <option value="{{$helth->id}}">{{$helth->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                        </div>
                                        <div class="row" id="family_row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="text" name="child_name[]" class="form-control"
                                                               placeholder="الاسم ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="text" name="child_card_no[]" class="form-control"
                                                               placeholder="الهوية ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <select name="child_relation[]" class="form-control">
                                                            @foreach($Relation as $rell)
                                                                <option value="{{$rell->id}}">{{$rell->name}}</option>
                                                            @endforeach
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <select name="child_work[]" class="form-control">
                                                            @foreach($Works as $wk)
                                                                <option value="{{$wk->id}}">{{$wk->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <input id="child_dob" name="child_dob[]" type="text"
                                                               class="form-control datepicker" value="{{$date}}"
                                                               data-date-format="yyyy-mm-dd" required
                                                               data-plugin-options='{"autoclose": true}'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <select name="child_jender[]" class="form-control">
                                                            @foreach($Jenders as $jender)
                                                                <option value="{{$jender->id}}">{{$jender->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <select name="child_health[]" class="form-control">
                                                            @foreach($Healths as $helth)
                                                                <option value="{{$helth->id}}">{{$helth->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1" onClick="delete_row(this)">
                                                <div class="form-group">
                                                    <a class="btn btn-circle btn-default btn-icon-only" title="حذف"><i
                                                                class="fa fa-close"> </i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn-group">
                                            @if(in_array(29,$allowedActions))
                                                <a class="btn btn-default btn-sm" id="new_family_btn"><i
                                                            class="fa fa-plus"> </i> اضافة </a>
                                            @endif
                                            <a id="family_show" class="btn btn-green btn-sm" href="#family_model"
                                               data-toggle="modal" style="margin-left:10px; "><i
                                                        class="fa fa-users"> </i> عرض العائلة </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-eye font-purple-soft"></i>
                                    <span class="caption-subject font-purple-soft bold uppercase">بيانات سببية</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">السبب الرئيسي للاحتياج </label>
                                            <div class="col-md-9">
                                                <select name="main_reason" class="form-control" required>
                                                    @foreach($MainReasons as $reason)
                                                        <option value="{{$reason->id}}" {{($reason->id==$customer->main_reason ? "selected" : "")}}>{{$reason->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="main_reason" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد البالغين فوق 18 ولا
                                                يعملون </label>
                                            <div class="col-md-9">
                                                <input type="text" name="child_not_working"
                                                       value="{{$customer->child_not_working}}" class="form-control"
                                                       placeholder="البالغين فوق 18 ولا يعملون" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد البالغين فوق 18 ويعملون </label>
                                            <div class="col-md-9">
                                                <input type="text" name="child_working"
                                                       value="{{$customer->child_working}}" class="form-control"
                                                       placeholder="البالغين فوق 18 ويعملون" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد الاطفال الأيتام </label>
                                            <div class="col-md-9">
                                                <input type="text" name="child_yatem_no"
                                                       value="{{$customer->child_yatem_no}}" class="form-control"
                                                       placeholder="عدد الاطفال الأيتام" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد الابناء في الجامعات </label>
                                            <div class="col-md-9">
                                                <input type="text" name="child_university"
                                                       value="{{$customer->child_university}}" class="form-control"
                                                       placeholder="اسم رب الاسرة" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد الأطفال ذوي الاحتياجات
                                                الخاصة</label>
                                            <div class="col-md-9">
                                                <input type="text" name="child_special"
                                                       value="{{$customer->child_special}}" class="form-control"
                                                       placeholder="الأطفال ذوي الاحتياجات الخاصة" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">معدل الدخل الشهري</label>
                                            <div class="col-md-9">
                                                <input type="text" name="work_day_no" value="{{$customer->work_day_no}}"
                                                       class="form-control" placeholder="الجهة">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">هل يستلم احد افراد الاسرة
                                                مساعدات </label>
                                            <div class="col-md-9">
                                                <select name="recieve_help" class="form-control" required>
                                                    <option value="1"> {{trans('ar.yes')}} </option>
                                                    <option value="2">{{trans('ar.no')}}</option>
                                                </select>
                                                <span class="citizin" style="color: darkred"></span></div>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">حدد الجهة </label>--}}
                                    {{--<div class="col-md-9">--}}
                                    {{--<input type="text" name="help_jeha_name" value="{{$customer->help_jeha_name}}" class="form-control" placeholder="الجهة" >--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اذا كانت نعم حدد جهة المساعدات</label>
                                            <div class="col-md-9">
                                                <select name="help_types" class="form-control">
                                                    @foreach($HelpTypes as $help)
                                                        <option value="{{$help->id}}" {{($help->id==$customer->help_types ? "selected" : "")}}>{{$help->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="row" >--}}
                                {{--<div class="col-md-4">--}}
                                {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3">هل يتلقى رب الأسرة مساعدات من الشؤون </label>--}}
                                {{--<div class="col-md-9">--}}
                                {{--<select name="shown_help" class="form-control" required>--}}
                                {{--<option value="1"> {{trans('ar.yes')}} </option>--}}
                                {{--<option value="2">{{trans('ar.no')}}</option>--}}
                                {{--</select>--}}
                                {{--<span class="shown_help" style="color: darkred"></span>                                             </div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3">هل يتلقى رب الأسرة مساعدات من الوكالة </label>--}}
                                {{--<div class="col-md-9">--}}
                                {{--<select name="unrwa_help" class="form-control" required>--}}
                                {{--<option value="1"> {{trans('ar.yes')}} </option>--}}
                                {{--<option value="2">{{trans('ar.no')}}</option>--}}
                                {{--</select>--}}
                                {{--<span class="unrwa_help" style="color: darkred"></span>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-paperclip font-purple-soft"></i>
                                    <span class="caption-subject font-purple-soft bold uppercase">بيانات خاصة برب الأسرة والعمل</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">المستوى التعليمي </label>
                                            <div class="col-md-9">
                                                <select name="education" class="form-control" required>
                                                    <option value=""> -- اختر المستوى التعليمي --</option>
                                                    @foreach($Educations as $edu)
                                                        <option value="{{$edu->id}}" {{($edu->id==$customer->education ? "selected" : "")}}>{{$edu->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="education" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">حالة العمل </label>
                                            <div class="col-md-9">
                                                <select name="work" class="form-control" required>
                                                    <option value=""> -- اختر حالة العمل --</option>
                                                    @foreach($Works as $work)
                                                        <option value="{{$work->id}}" {{($work->id==$customer->work ? "selected" : "")}}>{{$work->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="work" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">قطاع العمل</label>
                                            <div class="col-md-9">
                                                <select name="work_region" class="form-control" required>
                                                    <option value=""> -- اختر قطاع العمل --</option>
                                                    @foreach($WorkRegion as $wregion)
                                                        <option value="{{$wregion->id}}" {{($wregion->id==$customer->work_region ? "selected" : "")}}>{{$wregion->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="work_region" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3"> حيازة ملكية السكن</label>
                                            <div class="col-md-9">
                                                <select name="house_owner" class="form-control" required>
                                                    <option value=""> -- اختر نوع الملكية --</option>
                                                    @foreach($HouseOwner as $house_o)
                                                        <option value="{{$house_o->id}}" {{($house_o->id==$customer->house_owner ? "selected" : "")}}>{{$house_o->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="house_owner" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">نوع المسكن </label>
                                            <div class="col-md-9">
                                                <select name="house_type" class="form-control" required>
                                                    <option value=""> -- اختر نوع السكن --</option>
                                                    @foreach($HouseType as $house_ty)
                                                        <option value="{{$house_ty->id}}" {{($house_ty->id==$customer->house_type ? "selected" : "")}}>{{$house_ty->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="house_type" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3"> عدد غرف النوم</label>
                                            <div class="col-md-9">
                                                <select name="house_room" class="form-control" required>
                                                    <option value=""> -- اختر عدد الغرف --</option>
                                                    @foreach($HouseRoom as $room)
                                                        <option value="{{$room->id}}" {{($room->id==$customer->house_room ? "selected" : "")}}>{{$room->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="house_room" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">نوع مادة بناء السقف </label>
                                            <div class="col-md-9">
                                                <select name="house_material" class="form-control" required>
                                                    <option value=""> -- اختر نوع المادة --</option>
                                                    @foreach($HouseMaterial as $material)
                                                        <option value="{{$material->id}}" {{($material->id==$customer->house_material ? "selected" : "")}}>{{$material->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="house_material" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">نوع مادة بناء الجدران </label>
                                            <div class="col-md-9">
                                                <select name="wall_material" class="form-control" required>
                                                    <option value=""> -- اختر نوع المادة --</option>
                                                    @foreach($HouseWallMaterial as $wall)
                                                        <option value="{{$wall->id}}" {{($wall->id==$customer->wall_material ? "selected" : "")}}>{{$wall->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="wall_material" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">توفير الحمام </label>
                                            <div class="col-md-9">
                                                <select name="house_shower" class="form-control" required>
                                                    <option value=""> -- اختر --</option>
                                                    @foreach($HouseShower as $shower)
                                                        <option value="{{$shower->id}}" {{($shower->id==$customer->house_shower ? "selected" : "")}}>{{$shower->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="house_shower" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">المصدر الرئيسي لوقود الطهي </label>
                                            <div class="col-md-9">
                                                <select name="food_gaz" class="form-control" required>
                                                    <option value=""> -- اختر الوقود --</option>
                                                    @foreach($FoodGaz as $gaz)
                                                        <option value="{{$gaz->id}}" {{($gaz->id==$customer->food_gaz ? "selected" : "")}}>{{$gaz->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="food_gaz" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-eye font-purple-soft"></i>
                                    <span class="caption-subject font-purple-soft bold uppercase">السلع المعمرة ورأي الأخصائي</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">نوع السلعة </label>
                                            <label class="control-label col-md-3">قم باختيار السلع المتوفرة في منزل رب
                                                الأسرة </label>
                                            <div class="col-md-9">
                                                <ul>
                                                    @foreach($Furnitures as $fur)
                                                        <li>
                                                            <label class="checkbox-inline parent-check">
                                                                <input type="checkbox" name="furniture[]"
                                                                       value="{{$fur->id}}"
                                                                       class="mycheckbox" {{ in_array($fur->id,$UserFurnitures)?"checked":"" }}>
                                                                <span class="label-checkbox">{{$fur->name}}</span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <span class="education" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-md-3"> رأي الأخصائي </label>
                                            <label class="control-label col-md-3"> هل أنت واثق من تصنيف الاسرة كحالة
                                                شديدة الفقر او غير فقيرة </label>
                                            <div class="col-md-9">
                                                <select name="user_pinion" class="form-control" required>
                                                    <option value=""> -- اختر رأي الأخصائي --</option>
                                                    @foreach($UserOpinion as $uop)
                                                        <option value="{{$uop->id}}" {{($uop->id==$customer->user_pinion ? "selected" : "")}}>{{$uop->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="user_pinion" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ملاحظات </label>
                                            <div class="col-md-9">
                                                <input type="text" name="note" value="{{$customer->note}}"
                                                       class="form-control" placeholder="ملاحظات">
                                                <span class="note" style="color: darkred"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if(in_array(29,$allowedActions))
                            <div class="form-actions" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-9" style="margin-right: 40px;">
                                        <button type="submit" class="btn btn-primary" style="width: 150px;"> حفظ <i
                                                    class="fa fa-check"></i></button>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
                {{--<div class="tab-pane" id="tab_5">--}}
                {{----}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="tab_7">--}}
                {{----}}
                {{--</div>--}}

                {{--</div>--}}

                {{--</div>--}}
            </div>
        </div>
        <div class="modal fade" id="family_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span1
                                        aria-hidden="true">&times;
                                </span1>
                            </button>
                            <span class="caption-subject font-purple-soft bold uppercase">بيانات العائلة</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> م</th>
                                    <th>الاسم</th>
                                    <th> الهوية</th>
                                    <th> العلاقة</th>
                                    <th> تاريخ الميلاد</th>
                                    <th> الجنس</th>
                                    <th> الحالة</th>
                                    <th> الاجراء</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق <i
                                    class="fa fa-close"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span1
                                        aria-hidden="true">&times;
                                </span1>
                            </button>
                            <span class="caption-subject font-purple-soft bold uppercase">المشاريع التي استفاد منها</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="project_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> م</th>
                                    <th>المشروع</th>
                                    <th> التاريخ</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق <i
                                    class="fa fa-close"></i> </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @push('js')

        <script>
            function delete_row(e) {
                var element_count = e.parentNode.parentNode.childElementCount;
                if (element_count > 2)
                    e.parentNode.parentNode.removeChild(e.parentNode);
            }

            $(document).ready(function () {

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');

                $(document).on('click', '#family_show', function (e) {

                    var url = '{{url('Family')}}/' + document.getElementById('customer_id').value;

                    if ($.fn.DataTable.isDataTable("#data_tb")) {
                        $('#data_tb').DataTable().clear().destroy();
                    }

                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        "serverSide": true,
                        paging: true,
                        searching: false,
                        info: false,
                        columnDefs: [
                            // { width: 120, targets: 5 }
                        ],
//                    fixedColumns: false,
                        "ajax": url,

                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>",
                            "infoEmpty": "لا يوجد نتائج",
                            "zeroRecords": "لا يوجد نتائج للبحث",
                            "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                            "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                            "search": "بحث عن مستفيد (بالاسم او رقم الهوية او رقم الطلب): ",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير",
                            },
                        },
                        "columns": [
                            {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                            {'data': 'name', 'name': 'name'},
                            {'data': 'card_no', 'name': 'card_no'},
                            {'data': 'rel.name', 'name': 'relation'},
                            {'data': 'dob', 'name': 'dob'},
                            {'data': 'jender.name', 'name': 'jender_id'},
                            {'data': 'health.name', 'name': 'health_id'},
                            {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                        ],
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },
//                    "scrollY":        "200px",
//                    "scrollCollapse": true
                    });
                });

                $(document).on('click', '#project_count', function (e) {

                    var url = '{{url('customerProject')}}/' + document.getElementById('customer_id').value;

                    if ($.fn.DataTable.isDataTable("#project_tb")) {
                        $('#project_tb').DataTable().clear().destroy();
                    }

                    oTable = $("#project_tb").DataTable({
                        "processing": false,
                        "serverSide": true,
                        paging: false,
                        searching: false,
                        info: false,
                        columnDefs: [
                            // { width: 120, targets: 5 }
                        ],
//                    fixedColumns: false,
                        "ajax": url,

                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>",
                            "infoEmpty": "لا يوجد نتائج",
                            "zeroRecords": "لا يوجد نتائج للبحث",
                            "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                            "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير",
                            },
                        },
                        "columns": [
                            {
                                orderable: false,
                                'render': function () {
                                    return '';
                                }
                            },
                            // {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                            {'data': 'project.name', 'name': 'project_id'},
                            {'data': 'created_at', 'name': 'created_at'},
                        ],
                        "fnDrawCallback": function () {
                            oTable.column(0).nodes().each(function (cell, i) {
                                cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            });
                        },
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },
//                    "scrollY":        "200px",
//                    "scrollCollapse": true
                    });
                });

                $(document).on('click', '#new_family_btn', function (e) {
                    var original = document.getElementById('family_row');
                    var clone = original.cloneNode(true);
                    original.parentNode.appendChild(clone);

                });

                $('#add_form').submit(function (e) {
                    e.preventDefault();

                    var url = $(this).attr('action');
                    bootbox.confirm('تأكيد الحفظ !!', function (res) {
                        if (res) {
                            $.ajax({
                                'url': url,
                                'type': 'post',
                                'datatype': 'json',
                                'data': $('#add_form').serializeArray(),
                            })
                                .done(function (response) {
                                    if (response.status)
                                        toastr.success(response.message);
                                    else
                                        toastr.error(response.message);

                                    $.each(response.data, function (index, val) {
                                        // console.log(index+","+val);
                                        $("." + index).clear();
                                    });

                                    if (response.id > 1)
                                        window.location.href = "{{url('Customer')}}/" + response.id + "/edit";

                                })
                                .fail(function (data) {
                                    toastr.error('عفوا تحقق من البيانات المدخلة');

                                    $.each(data.responseJSON.message, function (index, val) {
                                        //  console.log(index+","+val);
                                        $("." + index).text(val);
                                        toastr.error(val);
                                    });
                                })
                        }
                    });

                });


                $('#customer_type').change(function () {
                    var customer_type = this.value;
                    if (customer_type == 1)
                        document.getElementById('death_div').style = 'display:none';
                    else
                        document.getElementById('death_div').style = 'display:block';

                });

            });

            $(document).on('click', '#delete_family', function (e) {
                e.preventDefault();

                var url = '{{url('')}}/' + $(this).attr('pull-link');
                bootbox.confirm('تأكيد الحذف !!', function (res) {
                    if (res) {
                        $.ajax({
                            'url': url,
                            'type': 'get',
                            'datatype': 'json',
                        })
                            .done(function (response) {
                                toastr.success(response.message);
                                oTable.ajax.reload();

                            })
                            .fail(function (data) {
                                toastr.fail(response.message);
                            })
                    }
                });

            });

            $('#state_id').change(function () {

                $('#region_id').empty();
                // document.getElementById('state_id').value;

                $.ajax({
                    url: '{{url("getRegion")}}/' + document.getElementById('state_id').value,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        for (var i = 0; i < response.items.length; i++) {
                            $('#region_id').append('<option value=' + response.items[i].id + ' >' + response.items[i].name + '</option>');
                        }
                    },
                    contentType: false,
                    processData: false,
                });


            });

            function getregion() {
            }


        </script>
    @endpush
@endsection
