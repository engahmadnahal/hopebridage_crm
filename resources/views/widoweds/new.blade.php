@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="row">

        </div>
        <div class="clearfix">

        </div>
            <br>
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
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
              {{--<form id="add_form" onsubmit="return validateForm()" method="post" action="{{url($route)}}"  class="form-horizontal form-row-seperated">--}}
              <form id="add_form" method="post" action="{{url($route)}}"  class="form-horizontal form-row-seperated">

{{--              {!! Form::open(['method'=>'post','url'=> url($route) , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}--}}
                {{--<div class="tab-content">--}}
                    <div class="tab-pane active" id="tab_3">
                        <div class="form">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">  نوع الحالة </label>
                                        <div class="col-md-9">
                                            {{ csrf_field() }}
                                            {{--<input type="text" name="id" placeholder="تلقائي" readonly class="form-control">--}}
                                            <select name="type" id="customer_type" class="form-control" required>
                                                <option value=""> -- اختر نوع الحالة -- </option>
                                                @foreach($Types as $tt)
                                                    <option value="{{$tt->id}}">{{$tt->name}}</option>
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
                                            <select name="state_id" id="state_id"  class="form-control" required>
                                                <option value=""> -- اختر المحافظة -- </option>
                                                @foreach($States as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
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
                                            <select name="region_id" id="region_id"  class="form-control" required>
                                                @foreach($Regions as $region)
                                                    <option value="{{$region->id}}">{{$region->name}}</option>
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
                                            <input type="text" name="address" placeholder="العنوان" class="form-control" required>
                                            <span class="address" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> اسم المستفيد </label>
                                        <div class="col-md-9">
                                            <input type="text" name="cus_name" class="form-control" required>
                                            <span class="cus_name" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">رقم الهوية</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" name="card_no" class="form-control" required>
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
                                                <input type="text" name="card_no_wife" class="form-control" required>
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
                                            <input type="text" name="father_name" class="form-control" placeholder="اسم رب الاسرة" required>
                                            <span class="father_name" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> اسم المجيب على النموذج </label>
                                        <div class="col-md-9">
                                            <input type="text" name="cus_entry" class="form-control" placeholder="المجيب على النموذج" required>
                                            <span class="cus_entry" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">المعيل الثاني </label>
                                        <div class="col-md-9">
                                            <input type="text" name="second_father" placeholder="المعيل الثاني" class="form-control" >
                                            <span class="second_father" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">جوال /الهاتف</label>
                                        <div class="col-md-9">
                                            <input type="text" name="mobile" placeholder="الجوال" class="form-control" >
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
                                                <option value=""> -- اختر مواطن/لاجىء -- </option>
                                                @foreach($Citizens as $citz)
                                                    <option value="{{$citz->id}}">{{$citz->name}}</option>
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
                                            <select name="region_type" id="region_type"  class="form-control" required>
                                                @foreach($RegionTypes as $regiontype)
                                                    <option value="{{$regiontype->id}}">{{$regiontype->name}}</option>
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
                                            <input name="child_no" type="text" class="form-control">
                                            <span class="child_no" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="death_div" style="display:none">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">تاريخ الوفاة</label>
                                        <div class="col-md-9">
                                            <input id="death_date" name="death_date" type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" data-plugin-options='{"autoclose": true}'>
                                            <span class="death_date" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="portlet light bordered">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-eye font-purple-soft"></i>
                                                <span class="caption-subject font-purple-soft bold uppercase">بيانات العائلة</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="row" >
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">الاسم </label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="child_name[]" class="form-control" placeholder="الاسم" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">الهوية </label>
                                                            <div class="col-md-12">
                                                                <input type="text" name="child_card_no[]" class="form-control" placeholder="الهوية" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> نوع العلاقة  </label>
                                                            <div class="col-md-12">
                                                                <select name="child_relation[]" class="form-control" >
                                                                    @foreach($Relation as $rell)
                                                                        <option value="{{$rell->id}}">{{$rell->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"> العمل  </label>
                                                            <div class="col-md-10">
                                                                <select name="child_work[]" class="form-control" >
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
                                                                <input id="child_dob" name="child_dob[]" type="text" class="form-control datepicker" value="{{$date}}" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">الجنس </label>
                                                            <div class="col-md-12">
                                                                <select name="child_jender[]" class="form-control" >
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
                                                                <select name="child_health[]" class="form-control" >
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
                                                                <input type="text" name="child_name[]" class="form-control" placeholder="الاسم " >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <input type="text" name="child_card_no[]" class="form-control" placeholder="الهوية " >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <select name="child_relation[]" class="form-control" >
                                                                    @foreach($Relation as $rell)
                                                                        <option value="{{$rell->id}}">{{$rell->name}}</option>
                                                                    @endforeach
                                                                </select>                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="col-md-10">
                                                                <select name="child_work[]" class="form-control" >
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
                                                                <input id="child_dob" name="child_dob[]" type="text" class="form-control datepicker" value="{{$date}}" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'>
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
                                                            <a class="btn btn-circle btn-default btn-icon-only" title="حذف"><i class="fa fa-close"> </i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="btn-group">
                                                    <a class="btn btn-default btn-sm" id="new_family_btn"><i class="fa fa-plus"> </i>  اضافة </a>
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
                                        <span class="caption-subject font-purple-soft bold uppercase">بيانات سببية</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">السبب الرئيسي للاحتياج </label>
                                                <div class="col-md-9">
                                                    <select name="main_reason" class="form-control" required>
                                                        @foreach($MainReasons as $reason)
                                                            <option value="{{$reason->id}}">{{$reason->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="main_reason" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">عدد البالغين فوق 18 ولا يعملون </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="child_not_working" class="form-control" placeholder="البالغين فوق 18 ولا يعملون" required>
                                                    <span class="child_not_working" style="color: darkred"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">عدد البالغين فوق 18 ويعملون </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="child_working" class="form-control" placeholder="البالغين فوق 18 ويعملون" required>
                                                    <span class="child_working" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">عدد الاطفال الأيتام </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="child_yatem_no" class="form-control" placeholder="عدد الاطفال الأيتام" required>
                                                    <span class="child_yatem_no" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">عدد الابناء في الجامعات </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="child_university" class="form-control" placeholder="اسم رب الاسرة" required>
                                                    <span class="child_university" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">عدد الأطفال ذوي الاحتياجات الخاصة</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="child_special" class="form-control" placeholder="الأطفال ذوي الاحتياجات الخاصة" required>
                                                    <span class="child_special" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> معدل الدخل الشهري</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="work_day_no" class="form-control" placeholder="الدخل الشهري">
                                                    <span class="work_day_no" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">هل يستلم احد افراد الاسرة مساعدات </label>
                                                <div class="col-md-9">
                                                    <select name="recieve_help" class="form-control" required>
                                                        <option value="1"> {{trans('ar.yes')}} </option>
                                                        <option value="2">{{trans('ar.no')}}</option>
                                                    </select>
                                                    <span class="recieve_help" style="color: darkred"></span>                                             </div>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label col-md-3">حدد الجهة </label>--}}
                                                {{--<div class="col-md-9">--}}
                                                    {{--<input type="text" name="help_jeha_name" class="form-control" placeholder="الجهة" >--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">اذا كانت نعم حدد جهة المساعدات</label>
                                                <div class="col-md-9">
                                                    <select name="help_types" class="form-control">
                                                        <option value=""> -- اختر النوع -- </option>
                                                    @foreach($HelpTypes as $help)
                                                            <option value="{{$help->id}}">{{$help->name}}</option>
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
                                                        <option value=""> -- اختر المستوى التعليمي -- </option>
                                                        @foreach($Educations as $edu)
                                                            <option value="{{$edu->id}}">{{$edu->name}}</option>
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
                                                        <option value=""> -- اختر حالة العمل -- </option>
                                                        @foreach($Works as $work)
                                                            <option value="{{$work->id}}">{{$work->name}}</option>
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
                                                        <option value=""> -- اختر قطاع العمل -- </option>
                                                        @foreach($WorkRegion as $wregion)
                                                            <option value="{{$wregion->id}}">{{$wregion->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="work_region" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"> حيازة ملكية السكن</label>
                                                <div class="col-md-9">
                                                    <select name="house_owner" class="form-control" required>
                                                        <option value=""> -- اختر نوع الملكية -- </option>
                                                        @foreach($HouseOwner as $house_o)
                                                            <option value="{{$house_o->id}}">{{$house_o->name}}</option>
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
                                                        <option value=""> -- اختر نوع السكن -- </option>
                                                        @foreach($HouseType as $house_ty)
                                                            <option value="{{$house_ty->id}}">{{$house_ty->name}}</option>
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
                                                        <option value=""> -- اختر عدد الغرف -- </option>
                                                        @foreach($HouseRoom as $room)
                                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="house_room" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">نوع مادة بناء السقف </label>
                                                <div class="col-md-9">
                                                    <select name="house_material" class="form-control" required>
                                                        <option value=""> -- اختر نوع المادة -- </option>
                                                        @foreach($HouseMaterial as $material)
                                                            <option value="{{$material->id}}">{{$material->name}}</option>
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
                                                        <option value=""> -- اختر نوع المادة -- </option>
                                                        @foreach($HouseWallMaterial as $wall)
                                                            <option value="{{$wall->id}}">{{$wall->name}}</option>
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
                                                        <option value=""> -- اختر -- </option>
                                                        @foreach($HouseShower as $shower)
                                                            <option value="{{$shower->id}}">{{$shower->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="house_shower" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">المصدر الرئيسي لوقود الطهي </label>
                                                <div class="col-md-9">
                                                    <select name="food_gaz" class="form-control" required>
                                                        <option value=""> -- اختر الوقود -- </option>
                                                        @foreach($FoodGaz as $gaz)
                                                            <option value="{{$gaz->id}}">{{$gaz->name}}</option>
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
                                                <label class="control-label col-md-3">قم باختيار السلع المتوفرة في منزل رب الأسرة </label>
                                                <div class="col-md-9">
                                                    <ul>
                                                        @foreach($Furnitures as $fur)
                                                            <li>
                                                                <label class="checkbox-inline parent-check">
                                                                    <input type="checkbox" name="furniture[]" value="{{$fur->id}}" class="mycheckbox">
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
                                                <label class="control-label col-md-3"> هل أنت واثق من تصنيف الاسرة كحالة شديدة الفقر او غير فقيرة </label>
                                                <div class="col-md-9">
                                                    <select name="user_pinion" class="form-control" required>
                                                        <option value=""> -- اختر رأي الأخصائي -- </option>
                                                        @foreach($UserOpinion as $uop)
                                                            <option value="{{$uop->id}}">{{$uop->name}}</option>
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
                                                <label class="control-label col-md-3">ملاحظات الفاحص</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="note" class="form-control" placeholder=" ملاحظات الفاحص">
                                                    <span class="note" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ملاحظات مدخل البيانات</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="note2" class="form-control" placeholder="ملاحظات مدخل البيانات">
                                                    <span class="note2" style="color: darkred"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-9" style="margin-right: 40px;">
                                        <button type="submit" class="btn btn-primary" style="width: 150px;">  حفظ   <i class="fa fa-check"></i> </button>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
{{--                            {!! Form::close() !!}--}}
                         </div>
                    </div>
              </form>
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

    </section>
    @push('js')

<script>
    function delete_row(e)
    {
        var element_count = e.parentNode.parentNode.childElementCount;
        if(element_count > 2)
            e.parentNode.parentNode.removeChild(e.parentNode);
    }

        $(document).ready(function () {

            bootbox.addLocale('ar', {
                CONFIRM: 'موافق',
                OK:'نعم',
                CANCEL:'الغاء'
            });

            bootbox.setLocale('ar');


            $(document).on('click', '#new_family_btn', function (e){
                var original = document.getElementById('family_row');
                var clone = original.cloneNode(true);
                original.parentNode.appendChild(clone);

            });

            $('#customer_type').change(function(){
                var customer_type = this.value;
                if(customer_type == 1)
                    document.getElementById('death_div').style='display:none';
                else
                    document.getElementById('death_div').style='display:block';

            });


            $('#add_form').submit(function (e) {
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm('تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#add_form').serializeArray()
                            // ,beforeSend: function () {
                            //     var y = document.getElementsByTagName("Span");
                            //     var i;
                            //     alert(y.length);
                            //     for (i = 0; i < y.length; i++) {
                            //         y[i].text = "xxx";
                            //     }
                            // },
                            // error: function (data) {
                            //     toastr.error('عفوا تحقق من البيانات المدخلة');
                            //
                            //     $.each(data.responseJSON.message, function(index, val) {
                            //         console.log(index+","+val);
                            //         $("."+index).text(val);
                            //
                            //     });
                            //
                            // }
                        })
                            .done(function(response) {
                                if(response.status)
                                toastr.success(response.message);
                                else
                                    toastr.error(response.message);


                                $.each(response.data, function(index, val) {
                                    // console.log(index+","+val);
                                    $("."+index).clear();
                                });


                                if(response.id>1)
                                    window.location.href = "{{url('Customer')}}/"+response.id+"/edit";

                            })
                            .fail(function(data) {
                                toastr.error('عفوا تحقق من البيانات المدخلة');

                                $.each(data.responseJSON.message, function(index, val) {
                                   // console.log(index+","+val);
                                    $("."+index).text(val);
                                    toastr.error(val);

                                });
                            })
                    }
                });
            });

            {{--function validateForm()--}}
            {{--{--}}
                {{--bootbox.confirm('تأكيد الحفظ !!',function (res) {--}}
                    {{--if(res){--}}
                        {{--document.getElementById("proc_img_div").innerHTML="<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"--}}
                        {{--return true;--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}
        });
    </script>
    @endpush
@endsection
