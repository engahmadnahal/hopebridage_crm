@extends('layouts.index')

@section('content')

    <section class="content">
        {{--<div class="row">--}}

        {{--</div>--}}
        <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-inbox"></i>
            <span class="caption-subject font-blue-sharp bold"> {{$title}}</span>
            </div>
            <div class="accordion accordion-minimal" id="accordion1" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab">
                    <h5 class="card-title fw-300"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-search"></i> <strong>بحث عن معاملة</strong> </a></h5>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <form action="#" class="horizontal-form">

                            <div class="form-body" style="padding: 10px;">
                                <div class="row" style="position: relative">
                                    <div class="col-md-3">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">رقم القيد</span>
                                            <input id="post_no_search" type="text" class="form-control searchable"
                                                   placeholder="" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">عنوان المعاملة</span>
                                            <input id="title_search" type="text" class="form-control searchable"
                                                   placeholder="" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group selectbs-wlbl">
                                            <span class="lblselect">الحالة</span>
                                            <select id="status_search" class="bs-select form-control searchableList">
                                                <option value="">اختر الحالة</option>
                                                @foreach($statuses as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group selectbs-wlbl">
                                            <span class="lblselect">الجهة</span>
                                            <select  id="jeha_search" class="bs-select form-control searchableList">
                                                <option value=""> اختر الجهة</option>
                                                @foreach($JehaIn as $mainjeha)
                                                    <option value="{{ $mainjeha->id }}">{{ $mainjeha->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="position: relative">
                                 <span class="col-md-1">
                                    <span class="lbldate">تاريخ المعاملة</span>
                                 </span>
                                    <div class="col-md-4">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">من</span>
                                            <div class="input-group">
                                                <input id="from_date" name="from_date" type="text" class="form-control datepicker" value="" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">الى</span>
                                            <div class="input-group">
                                                <input id="to_date" name="to_date" type="text" class="form-control datepicker" value="" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="col-md-3 clearfix ">
                                    <div class="btn-search-reset pull-right">
                                        <button type="button"
                                                class="btn green btn-submit-search">بحث
                                        </button>
                                        <button type="reset"
                                                class="btn default btn-reset">تفريغ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="portlet-body form">
            <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th bgcolor="blue">رقم القيد </th>
                    <th  bgcolor="blue">نوع البريد </th>
                    <th  bgcolor="blue">  عنوان المعاملة </th>
                    <th bgcolor="blue"> تاريخ المعاملة </th>
                    <th bgcolor="blue"> مصدر المعاملة </th>
                    <th bgcolor="blue"> الجهة المحولة </th>
                    <th bgcolor="blue"> الحالة </th>
                    <th bgcolor="blue"> الاجراء </th>
                </tr>
                </thead>
            </table>

        </div>
            <a name="detail_section"></a>
        <div id="proc_img_div" align="center"></div>
        </div>

            {{--<div class="portlet light bordered" style="border: 1px solid white !important;">--}}

        <div id="detail_contaner" class="portlet light portlet-fit portlet-datatable bordered" style="display: none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-info"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase"> تفاصيل المعاملة </span>
                </div>
            </div>
           <div class="portlet-body">
                <div class="tabbable-line">
                <ul class="nav nav nav-tabs nav-tabs-lg nav nav-tabs nav-tabs-lg-lg">
                    <li class="active">
                        <a href="#tab_3" class="nav-link "data-toggle="tab"> تفاصيل المعاملة </a>
                    </li>
                    <li>
                        <a href="#tab_4" class="nav-link " data-toggle="tab" id="customer_tab"> معلومات المراجعين
                            {{--<span class="badge badge-success">4</span>--}}
                        </a>
                    </li>
                    <li>
                        <a href="#tab_5" class="nav-link " data-toggle="tab" id="attachment_id"> المرفقات </a>
                    </li>
                    <li>
                        <a href="#tab_7" class="nav-link "data-toggle="tab" id="related_post_tab"> المعاملات المرتبطة </a>
                    </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab_3">
                    <div class="portlet light bordered" style="border: 1px solid white !important;">
                        <div class="portlet-title">
                        </div>
                        <div class="portlet-body form" >
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">  نوع البريد </label>
                                <div class="col-md-9">
                                    <input name="post_type" id="post_type" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label col-md-3">عنوان المعاملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="title" id="title" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> رقم البريد </label>
                                <div class="col-md-9">
                                    <input type="text" name="post_no" id="post_no" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label col-md-3"> البيان </label>
                                <div class="col-md-9">
                                    <input type="text" name="pian" id="pian" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">داخلي/خارجي</label>
                                <div class="col-md-9">
                                    <input name="post_in_out" id="post_in_out" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">مصدر المعاملة</label>
                                <div class="col-md-9">
                                    <input name="jeha_from" id="jeha_from" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">حالة المعاملة</label>
                                <div class="col-md-9">
                                    <input name="status" id="status" value="" class="form-control" style="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">يحتاج الى رد</label>
                                <div class="col-md-9">
                                    <input type="text" name="need_answer" id="need_answer" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ المعاملة</label>
                                <div class="col-md-9">
                                    <input type="text" name="post_date" id="post_date" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تصنيف المعاملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="Tasneef"  id="Tasneef" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> درجة الاهمية </label>
                                <div class="col-md-9">
                                    <input name="importent" id="importent" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">جوال المراجع</label>
                                <div class="col-md-9">
                                    <input type="text" name="jawwal" id="jawwal" class="form-control" readonly>
                                    <input type="hidden" name="post_id_main" id="post_id_main" value="">
                                    <input type="hidden" name="jeha_id" id="jeha_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">درجة السرية</label>
                                <div class="col-md-9">
                                    <input type="text" name="security_degree" id="security_degree" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">مكان الحفظ</label>
                                <div class="col-md-9">
                                    <input type="text" name="save_box" id="save_box" class="form-control" readonly>
                                    <span class="save_box" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                        </div>
                    </div>
                    <div>
                        <div class="portlet box green">
                            <div class="portlet-body form">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6" style="margin: 10px;">
                                            @if(in_array(56,$allowedActions))
                                                <a href="#action_list" data-toggle="modal" pull-link="PosAction/jeha/" class="btn btn-primary" id="action_list_btn"> الاجراءات السابقة <i class="fa fa-angle-double-left"></i> </a>
                                            @endif
                                            @if(in_array(55,$allowedActions))
                                                <a href="#action_modal" data-toggle="modal" pull-link="newAction" class="btn btn-primary" id="action_btn"> اضافة اجراء <i class="fa fa-plus"> </i> </a>
                                            @endif
                                            @if( (in_array(47,$allowedActions)) || (in_array(48,$allowedActions)) || (in_array(49,$allowedActions)) )
                                                <div class="btn-group">
                                                    <button class="btn btn-pink dropdown-toggle" data-toggle="dropdown" type="button"> <span class="caret"></span>  <i class="fa fa-share"> </i>تحويل المعاملة
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if(in_array(47,$allowedActions))
                                                            <a class="dropdown-item" href="#refer_modal_inner" data-toggle="modal">تحويل لادارتي</a>
                                                        @endif
                                                        @if(in_array(48,$allowedActions))
                                                            <a class="dropdown-item" href="#refer_modal" data-toggle="modal">تحويل لادارة اخرى</a>
                                                        @endif
                                                        @if(in_array(49,$allowedActions))
                                                            <a class="dropdown-item" href="#refer_modal_user" data-toggle="modal">تحويل لموظف</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_4">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-users"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">اسماء المراجعين للمعاملة</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row" style="padding: 10px;">
                                        @if(in_array(51,$allowedActions))
                                        <a  id="search_customer" pull-link="{{url('customer/all')}}" href="#search_customer_model" data-toggle="modal"  type="button" class="btn   btn-success   yallow" style="width: 100px;"> بحث  <i class="fa fa-search"></i>   </a>
                                        <a href="#new_customer" data-toggle="modal" type="button" class="btn   btn-green  "> اضافة جديد <i class="fa fa-plus"></i>   </a>
                                        @endif
                                    </div>
                                    <div class="row" style="padding: 20px;">
                                        <table id="related_customer_tb" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>الهوية </th>
                                                <th> الاسم </th>
                                                <th> الجوال </th>
                                                <th> الايميل </th>
                                                <th> الاجراء </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="tab-pane" id="tab_5">
                        <div class="row">
                            <div class="col-md-4">
                                @if(in_array(59,$allowedActions))
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-paperclip font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold uppercase">اضافة مرفق</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        {!! Form::open(['method'=>'post','url'=>url('post/upload') ,'files'=> true, 'id'=>'upload_img','class'=>'form-horizontal form-row-seperated'])!!}
                                        <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                                        <div class="form-group">
                                            <input name="files[]" id="files" type="file" multiple="" class="btn   btn-success   " />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label font-purple-soft">اسم المرفق</label>
                                            <div class="col-md-9">
                                                <input type="text" name="file_desc" class="form-control" placeholder="اسم المرفق">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label font-purple-soft"> تاريخ الانتهاء</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input id="file_date" name="file_date" type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-green"> رفع الملفات  <i class="fa fa-upload"></i></button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                @endif
                                    @if(in_array(57,$allowedActions))
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-pin font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold ">عرض المرفقات</span>
                                            {{--<span class="badge badge-success">2</span>--}}
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table id="images_tb" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th> الاسم </th>
                                                {{--<th> الصورة </th>--}}
                                                <th width="20%"> عرض </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                        @endif
                            </div>
                            {{--<div class="col-md-2">--}}
                            {{----}}
                            {{--</div>--}}
                            @if(in_array(57,$allowedActions))
                            <div class="col-md-8">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-eye font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold uppercase">معاينة المرفقات</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="zoom_image_div" style="height: 600px; overflow: scroll">

                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_7">
                        <div class="row">
                            @if(in_array(53,$allowedActions))
                            <div class="col-md-4">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-paper-clip font-purple-soft"></i>
                                            <i class="fa fa-search font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold uppercase">بحث عن معاملة</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        {!! Form::open(['method'=>'post','url'=>url('Post/relatedSearch') ,'files'=> true, 'id'=>'related_post_form','class'=>'form-horizontal form-row-seperated'])!!}
                                        <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                                        {!! Form::close() !!}
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <a id="related_search" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success btn-sm yallow"  > بحث  في الوارد<i class="fa fa-search"></i>   </a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <a id="related_search_sader" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success btn-sm yallow"  > بحث  في الصادر<i class="fa fa-search"></i>   </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<button type="button" href="#search_related_model" class="btn   btn-success btn-sm "  >  حفظ  <i class="fa fa-search"></i></button>--}}

                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="{{in_array(53,$allowedActions)?'col-md-8':'col-md-12'}}">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-eye font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold uppercase"> المعاملات المرتبطة</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <table id="related_tb" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th> رقم القيد </th>
                                                    <th> العنوان </th>
                                                    <th> الجهة المرسلة </th>
                                                    <th>  التاريخ </th>
                                                    <th>  الاجراء </th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="action_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <h4 class="modal-title" id="exampleModalLabel">اضافة اجراء جديد</h4>
                        </div>
                        {!! Form::open(['method'=>'post','url'=>url('newAction') , 'id'=>'add_action']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> حالة المعاملة  </label>
                                        <div class="col-md-9">
                                            <input type="hidden" value="" id="post_action_id" name="post_action_id" class="post_action_id">

                                            <select name="select_status" id="select_status" class="form-control">
                                                <option value=""> -- اختر الحالة  -- </option>
                                                @foreach($statuses as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الاجراء</label>
                                        <div class="col-md-9">
                                            <select name="action" id="action" class="form-control">
                                                <option value=""> -- اختر الاجراء  -- </option>
                                                @foreach($actions as $action)
                                                    <option value="{{$action->id}}">{{$action->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label col-md-3">  توضيح الاجراء  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="reason" id="reason" class="form-control">

                                    </div>
                                   </div>
                                </div>
                             </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> ملاحظات  </label>
                                        <div class="col-md-9">
                                            <input type="text" name="note" id="note" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" dir="rtl">
                            <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                            <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        <div class="modal fade" id="action_list" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">قائمة الاجراءات السابقة</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="action_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>رقم الاجراء </th>
                                    <th>نوع الاجراء </th>
                                    <th>  السبب </th>
                                    <th> ملاحظات </th>
                                    <th> التاريخ </th>
                                    <th> المستخدم </th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" id="add_new_action" class="btn   btn-primary  " style="width: 100px;"> اضافة اجراء   <i class="fa fa-plus"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="refer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل المعاملة للادارات </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url('Post/refer_dept') , 'id'=>'refer_form']) !!}

                    <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"> سبب التحويل  </label>
                                <div class="col-md-9">
                                    <input type="text" name="ref_reason" id="ref_reason" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"> ملاحظات  </label>
                                <div class="col-md-9">
                                    <input type="text" name="ref_note" id="ref_note" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div_child" class="form-group">
                        {!! $main_tree !!}
                    </div>

                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="refer_modal_inner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل المعاملة لادارتي </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url('Post/refer_dept') , 'id'=>'refer_form_inner']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                                <div class="form-group">
                                    {!! $dept_tree !!}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> سبب التحويل  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="ref_reason" id="ref_reason" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> ملاحظات  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="ref_note" id="ref_note" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="refer_modal_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل البريد للموظفين</h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url('Post/refer_user') , 'id'=>'refer_form_user']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                                <input type="hidden" value="" id="post_jeha_id" name="post_jeha_id">
                                <div class="form-group">
                                    <select name="jeha_main" id="jeha_main"  class="form-control" required>
                                        <option value=""> -- اختر الادارة التابع لها الموظف -- </option>
                                        @foreach($AllMainJeha as $jeha)
                                            <option value="{{$jeha->id}}">{{$jeha->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <ul class="list-inline" id="jeha_users" dir="rtl">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> سبب التحويل  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="ref_reason" id="ref_reason" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="background-color: #f28c89">
                                    <label class="control-label col-md-3"> ملاحظات  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="ref_note" id="ref_note" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="new_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل البريد للادارات الداخلية</h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url('customer') , 'id'=>'cus_add_form']) !!}
                    <div class="modal-body">
                        <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الهوية </label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_card_no" id="cus_card_no" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الاسم</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_name" id="cus_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الجوال   </label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_mobile" id="cus_mobile" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الايميل</label>
                                    <div class="col-md-9">
                                        <input type="text" name="cus_email" id="cus_email" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="search_customer_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <span class="caption-subject font-purple-soft bold uppercase">بحث عن مراجع</span>
                        </div>
                    </div>
                    <div class="modal-body">

                        <div >

                            <div class="row" style="padding: 20px;">
                                <table id="customer_tb" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>الهوية </th>
                                        <th> الاسم </th>
                                        <th> الجوال </th>
                                        <th> الايميل </th>
                                        <th> الاجراء </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="portlet light bordered">

                                {{--<div class="portlet-body">--}}
                                <div class="row" style="background-color:#f7f8f9; border: 1px; margin: 0px;" >
                                    {!! Form::open(['method'=>'post','url'=>url('post/customer') , 'id'=>'save_customer','class'=>'form-horizontal form-row-seperated'])!!}
                                    <input type="hidden" value="" id="post_id" name="post_id" class="post_id">
                                    <div class="col-md-3">
                                        <p class="font-purple-soft bold">اسماء المراجعين:</p>
                                    </div>

                                    <div class="col-md-6">
                                        <ul class="list-inline" id="cus_list">
                                        </ul>
                                    </div>

                                </div>
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary   " style="width: 100px;"> حفظ  <i class="fa fa-check"></i></button>
                        <a id="empty_customer" type="button" data-dismiss="modal" class="btn   btn-default   " style="width: 100px;"> الغاء  <i class="fa fa-close"></i>   </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="search_related_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <span class="caption-subject font-purple-soft bold uppercase">بحث عن معاملة</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="title_search_div">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="lblinput">رقم القيد</span>
                                    <input id="post_no_search" type="text" class="form-control searchable"
                                           placeholder="بحث برقم القيد" value=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="lblinput">عنوان المعاملة</span>
                                    <input id="title_search" type="text" class="form-control searchable"
                                           placeholder="بحث بعنوان المعاملة" value=""/>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div class="row" style="padding: 20px;">
                                <table id="search_related_tb" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>رقم القيد </th>
                                        <th> العنوان </th>
                                        <th> التاريخ </th>
                                        <th> الجهة </th>
                                        <th> الاجراء </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <a type="reset" data-dismiss="modal" class="btn   btn-default" style="width: 100px;"> اغلاق  <i class="fa fa-close"></i>   </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @push('js')
    <script>
        $(document).ready(function () {


            bootbox.addLocale('ar', {
                CONFIRM: 'موافق',
                OK:'نعم',
                CANCEL:'الغاء'
            });

            bootbox.setLocale('ar');

            $(function () {
                var url ='{{url('InnerPos/waredData')}}';

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").removeAttr('width').DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: false,
                    info: true,
                    columnDefs: [
                        { width: 120, targets: 7 }
                    ],
                    fixedColumns: false,
                    "ajax":{
                        url:url,
                        data:function(d) {
                            d.from_date = document.getElementById('from_date').value;
                            d.to_date = document.getElementById('to_date').value;
                            d.jeha_search = document.getElementById('jeha_search').value;
                            d.status_search = document.getElementById('status_search').value;
                            d.title_search = document.getElementById('title_search').value;
                            d.post_no_search = document.getElementById('post_no_search').value;
                        }
                    },

                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>",
                        "infoEmpty": "لا يوجد نتائج",
                        "zeroRecords": "لا يوجد نتائج للبحث",
                        "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                        "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                        "search":         "بحث عن معاملة (بالعنوان او الرقم): ",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير",
                        },
                    },
                    "rowCallback": function(row, data, index){
                        if(data['status_id']== 1){ // منجز
                            $(row).css('background-color', '#');
                        }else if (data['status_id']== 2){ //قيد العمل
                            $(row).css('background-color', '#fce99d');
                        }else if (data['status_id']== 3){ //غير منجز
                            $(row).css('background-color', '#f28c89');
                        }

                    },
                    "columns": [
                        {'data': 'post.post_no', 'name': 'post_id'},    // first:dataname , second name in database
                        {'data': 'post.posttype.name', 'name': 'post_id'},
                        {'data': 'post.title', 'name': 'post_id'},
                        {'data': 'created_at', 'name': 'created_at'},
                        {'data': 'post.jehafrom.name', 'name': 'post_id'},
                        {'data': 'jehafrom.name', 'name': 'jeha_from_id'},
                        {'data': 'getstatus.name', 'name': 'status_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ],

//                    "scrollY":        "200px"
//                    "scrollCollapse": true
                });
            });

            var table = $('#data_tb').DataTable();
            $('#data_tb tbody').on( 'click', 'tr', function () {
                    $('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
            });

            $(document).on('click', '#action_list_btn', function (e) {
                e.preventDefault();

                var url = '{{url('')}}/'+$(this).attr('pull-link') + document.getElementById('post_id_main').value;

                if( document.getElementById('post_id_main').value =="")
                {
                    $('#action_list').modal('hide');
                    bootbox.alert("يجب تحديد المعاملة");
                    return false;
                }

                if ($.fn.DataTable.isDataTable("#action_tb")) {
                    $('#action_tb').DataTable().clear().destroy();
                }
                oTable = $("#action_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: false,
                    searching: false,
                    info: false,
                    "ajax": url,

                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                        {'data': 'action.name', 'name': 'action_id'},
                        {'data': 'reason', 'name': 'reason'},
                        {'data': 'note', 'name': 'note'},
                        {'data': 'created_at', 'name': 'created_at'},
                        {'data': 'user.name', 'name': 'user_id'},
                    ],
//                    "scrollY":        "200px"
//                    "scrollCollapse": true
                });
            });

            // btn new action on action list modal
            $(document).on('click', '#add_new_action', function (e) {

                $('#action_list').modal('hide');
                $('#action_modal').modal('show');

            });

            // btn new action on action list modal
            $(document).on('click', '#refer_btn', function (e) {

                if( document.getElementById('post_action_id').value =="")
                {
                    $('#refer_modal').modal('hide');
                    bootbox.alert("يجب تحديد المعاملة");
                    return false;
                }

            });

            $(document).on('click', '#action_btn', function (e) {
                e.preventDefault();
                // this click from detail group buttons
                if($(this).attr('pull-link') == "PosJeha/edit"){

                    if(document.getElementById('id_up').value =="")
                    {
                        $('#action_modal').modal('hide');
                        bootbox.alert("يجب تحديد المعاملة");
                        return false;
                    }
                }
                // this button from datatable on the top
                else {  document.getElementById("post_action_id").value = $(this).attr('pull-link'); }

            });

            $(document).on('click', '#post_show', function () {
                document.getElementById("detail_contaner").style.display="block";

                var url = '{{url('')}}/'+$(this).attr('pull-link');
                document.getElementById("proc_img_div").innerHTML="<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',
                    success: function (response) {
                       // console.log(response);
                        //remove loading icon
                        document.getElementById("proc_img_div").innerHTML="";
                       // view retured data
                        $('input[type="hidden"][class="post_id"]').prop("value", response.items.post.id);
                        document.getElementById("post_jeha_id").value = response.items.id;
                        document.getElementById("post_action_id").value = response.items.id;
                        document.getElementById("post_type").value = response.items.post.posttype.name;
//                        document.getElementById("status").value = response.items.getstatus.name;
                        document.getElementById("post_no").value = response.items.post.post_no;
                        document.getElementById("post_id_main").value = response.items.post.id;
                        document.getElementById("jeha_from").value = response.items.post.jehafrom.name;
                        document.getElementById("post_date").value = response.items.post.post_date;
                        document.getElementById("pian").value = response.items.post.pian;
                        document.getElementById("title").value = response.items.post.title;
                        document.getElementById("Tasneef").value = response.items.post.posttasneef.name;
//                        document.getElementById("post_in_out").value = response.items.post.post_in_out.name;
                        document.getElementById("importent").value = response.items.post.importent.name;
                        document.getElementById("jawwal").value = response.items.post.jawwal;
                        document.getElementById("security_degree").value = response.items.post.security.name;
                        document.getElementById("need_answer").value = (response.items.post.need_answer==1 ? "نعم" : "لا");
                        document.getElementById("save_box").value = response.items.post.save_box;
//                        document.getElementById("attachment").value = response.items.post.attachment;
//                        document.getElementById("receive_way").value = response.items.post.receive_way;

                        // Used for hidden inputs

                        document.getElementById("jeha_id").value = response.items.jeha_id;
                       // document.getElementById("post_id_ref").value = response.items.post.id;
                       // document.getElementById("post_dept_id").value = response.items.id;
//                        document.getElementsByName("post_id22").value=response.items.post.id;
//                        $('.post_id').val("NS");

                        if(response.items.status_id != 1)
                            document.getElementById("status").style="background-color:#f28c89";
                        else
                            document.getElementById("status").style="background-color: #d8f99f";

                    },
                    error: function (xhr) {

                    }
                })
            });

            $('#add_action').submit(function(e){
                e.preventDefault();

                //post_id_main
                var url=$(this).attr('action')+'/'+document.getElementById('post_action_id').value;
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#add_action').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#action_modal').modal('hide');
                                oTable.ajax.reload();
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);
                                    $('input[name='+index+'].span').after('<span>'+val+'</span>');

                                });
                            })
                    }
                });
            });

            $('#refer_form').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#refer_form').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#refer_modal').modal('hide');
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);

                                });
                            })
                    }
                });
            });

            $('#refer_form_inner').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#refer_form_inner').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#refer_modal_inner').modal('hide');
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);

                                });
                            })
                    }
                });
            });
            $('#refer_form_user').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#refer_form_user').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#refer_modal_user').modal('hide');
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);

                                });
                            })
                    }
                });
            });

            $('#jeha_main').change(function(){
                $('#jeha').empty();
                var selectedjeha = $(this).val();
                $.ajax({
                    url:  '{{url("getJehaUsers")}}'+'/'+selectedjeha,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        for (var i = 0; i < response.items.length ; i++) {
                            $('#jeha_users').append('<li class="pull-right"><label><input type="checkbox" name="user_refereds[]" value="'+response.items[i].id+'">'+response.items[i].name+'</label> </li>');
                        }
                    },
                    contentType: false,
                    processData: false,
                });
            });


            function getImages() {
                if ($.fn.DataTable.isDataTable("#images_tb")) {
                    $('#images_tb').DataTable().clear().destroy();
                }
                var url= '{{url('post/getImage')}}'+'/'+document.getElementById('post_id').value;
                oTable = $("#images_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: false,
                    searching: false,
                    info: false,
                    "ajax": url,

                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'file_desc', 'name': 'file_name'},    // first:dataname , second name in database
//                        {'data': 'file_ext', 'name': 'file_ext'},    // first:dataname , second name in database
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ]

                });
            }

            $(document).on('click', '#attachment_id', function (e) {
                getImages();
            });

            $(document).on('click', '#show_image', function (e) {

                var image = '{{url('')}}'+'/uploads/news'+'/'+$(this).attr('image_id');
                // alert(image);
                if($(this).attr('file_ext') == 'file_pdf.jpg')
                {
                    document.getElementById('zoom_image_div').innerHTML='<object width="100%" height="100%" data="'+image+'"></object>';
                }
                else if($(this).attr('file_ext') == 'file_jpg.jpg'){
                    document.getElementById('zoom_image_div').innerHTML='<img src="'+image+'"/>';
                }
//                else if($(this).attr('file_ext') == 'file_doc.jpg') {
//                    document.getElementById('zoom_image_div').innerHTML = '<iframe src="http://docs.google.com/gview?url=' + image + '&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
//                }
            });

            $('#upload_img').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                oTable = $("#images_tb");

                var url=$(this).attr('action');
                $.ajax({
                    'url':url,
                    'type':'post',
                    'data':formData,
                    cache: false,

                    contentType: false,
                    processData: false,
                })
                    .done(function(response) {
                        toastr.success('response.message');
                        getImages();
                    })
                    .fail(function(data) {
                    })

            });

            $(document).on('click', '#customer_tab', function (e) {
                getCustomers();
            });

            function getCustomers() {
                if( document.getElementById('post_id').value =="")
                {
                    $('#action_list').modal('hide');
                    bootbox.alert("يجب تحديد المعاملة");
                    return false;
                }
                if ($.fn.DataTable.isDataTable("#related_customer_tb")) {
                    $('#related_customer_tb').DataTable().clear().destroy();
                }
                var url= '{{url('getCustomer')}}'+'/'+document.getElementById('post_id').value;
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',
                    success: function (response) {

                        oTable = $("#related_customer_tb").DataTable({
                            "processing": true,
                            "serverSide": true,
                            paging: false,
                            searching: false,
                            info: false,
                            "ajax": url,

                            "language": {
                                "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                            },
                            "columns": [
                                {'data': 'customer.card_no', 'name': 'customer_id'},    // first:dataname , second name in database
                                {'data': 'customer.name', 'name': 'customer_id'},    // first:dataname , second name in database
                                {'data': 'customer.mobile', 'name': 'customer_id'},
                                {'data': 'customer.email', 'name': 'customer_id'},
                                {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                            ]

                        });

                        oTable.ajax.reload();
                    },
                    error: function (xhr) {

                    }
                })
            }

            $(document).on('click', '#remove_customer', function (e) {
                var cus_id=$(this).attr('customer_id');
                removeCustomer(cus_id);
            });

            function removeCustomer(cus_id) {

                var url= '{{url('removeCustomer')}}'+'/'+cus_id;
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',

                })
                    .done(function(response) {
                        toastr.success('response.message');
                        oTable.ajax.reload();
                    })
                    .fail(function(data) {
                    })
            }

            $(document).on('click', '#search_customer', function (e) {
                if($.fn.DataTable.isDataTable("#customer_tb")) {
                    $('#customer_tb').DataTable().clear().destroy();
                }
                var url=$(this).attr('pull-link');
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',
                    success: function (response) {

                        oTable = $("#customer_tb").DataTable({
                            "processing": true,
                            "serverSide": true,
                            paging: true,
                            searching: true,
                            info: false,
                            "ajax": url,

                            "language": {
                                "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                            },
                            "columns": [
                                {'data': 'card_no', 'name': 'card_no'},    // first:dataname , second name in database
                                {'data': 'name', 'name': 'name'},    // first:dataname , second name in database
                                {'data': 'mobile', 'name': 'mobile'},
                                {'data': 'email', 'name': 'email'},
                                {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                            ]

                        });

                        oTable.ajax.reload();
                    },
                    error: function (xhr) {

                    }
                })
            });
            $(document).on('click', '#add_to_array', function (e) {
                var cus_id_s = $(this).attr('customer_id');
                var cus_name_s = $(this).attr('customer_name');
                $('#cus_list').append('<li><label><input checked type="checkbox" name="customers[]" value="'+cus_id_s+'">'+cus_name_s+'</label> </li>');
            });
            $(document).on('click', '#empty_customer', function (e) {
                $('#cus_list').empty();
            });
            $('#save_customer').submit( function (e) {
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#save_customer').serializeArray(),
                        })
                            .done(function(response) {
                                $('#search_customer_model').modal('hide');
                                toastr.success(response.message);
                                getCustomers();

                            })
                            .fail(function(data) {

                            })
                    }
                });
            });
            $('#cus_add_form').submit(function (e) {
                e.preventDefault();

                var url=$(this).attr('action');
                $.ajax({
                    'url':url,
                    'type':'post',
                    'datatype':'json',
                    'data':$('#cus_add_form').serializeArray(),
                })
                    .done(function(response) {
                        toastr.success(response.message);
                        var cus_id_s = response.data.id;
                        var cus_name_s = response.data.name;
                        $('#cus_list').append('<li><label><input checked type="checkbox" name="customers[]" value="'+cus_id_s+'">'+cus_name_s+'</label> </li>');
                        document.getElementById("cus_add_form").reset();
                        $('#new_customer').modal('hide');

                        oTable.ajax.reload();

                        $.each(response.data, function(index, val) {
                            console.log(index+","+val);
                            $("."+index).clear();
                        });
                    })
                    .fail(function(data) {

                        $.each(data.responseJSON, function(index, val) {
                            console.log(index+","+val);
                            $("."+index).text(val);
                        });
                    })

            });

            // functions for related posts

            $(document).on('click', '#related_post_tab', function (e){
                getRelated();
            });
            function getRelated(){

                if($.fn.DataTable.isDataTable("#related_tb")) {
                    $('#related_tb').DataTable().clear().destroy();
                }

                var url= '{{url('Post/getRelated/')}}'+'/'+document.getElementById('post_id').value;
                oTable = $("#related_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: false,
                    "ajax": url,
                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'post_id', 'name': 'post_id'},
                        {'data': 'post.title', 'name': 'post_id'},
                        {'data': 'post.jehafrom.name', 'name': 'post_id'},
                        {'data': 'post.post_date', 'name': 'post_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ]

                });
            }

            $(document).on('click', '#related_search_sader', function (e){
                var url= '{{url('InnerPos/saderData')}}';
                document.getElementById('title_search_div').style.display="none";
                getSader(url);
            });

            $(document).on('click', '#related_search', function (e){
                var url= '{{url('InnerPos/waredData')}}';
                document.getElementById('title_search_div').style.display="flex";
                getWared(url);
            });

            function getWared(url){
                var post_id=document.getElementById('post_id').value;
                if($.fn.DataTable.isDataTable("#search_related_tb")) {
                    $('#search_related_tb').DataTable().clear().destroy();
                }

                oTable = $("#search_related_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: false,
                    "ajax": url,
                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'post.post_no', 'name': 'post_id'},
                        {'data': 'post.title', 'name': 'post_id'},
                        {'data': 'post.post_date', 'name': 'post_id'},
                        {'data': 'post.jehafrom.name', 'name': 'post_id'},
                        {
                            orderable: false,
                            'render': function (data, type, row) {
                                return '<a pull-link="Post/related/'+row['post_id']+'/'+post_id+'" class="btn btn-circle  btn-icon-only btn-green" title="اضافة كمعاملة مرتبطة" id="add_related">  <i class="fa fa-plus"> </i></a>';
                            }
                        },
                    ]
                });
            }
            function getSader(url){
                var post_id=document.getElementById('post_id').value;
                if($.fn.DataTable.isDataTable("#search_related_tb")) {
                    $('#search_related_tb').DataTable().clear().destroy();
                }

                oTable = $("#search_related_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: false,
                    "ajax": url,
                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'post_no', 'name': 'post_no'},
                        {'data': 'title', 'name': 'title'},
                        {'data': 'post_date', 'name': 'post_date'},
                        {'data': 'jehato.name', 'name': 'id'},
                        {
                            orderable: false,
                            'render': function (data, type, row) {
                                return '<a pull-link="Post/related/'+row['id']+'/'+post_id+'" class="btn btn-circle  btn-icon-only btn-green" title="اضافة كمعاملة مرتبطة" id="add_related">  <i class="fa fa-plus"> </i></a>';
                            }
                        },
                    ]
                });
            }

            $(document).on('click', '#add_related', function (e) {
                e.preventDefault();

                var url='{{url('')}}/'+$(this).attr('pull-link');

                $.ajax({
                    'url':url,
                    'type':'get',
                    'datatype':'json',
                })
                    .done(function(response) {
                        toastr.success(response.message);
                        getRelated();
                    })
                    .fail(function(data) {

                    })
//                    }
//                });
            });

            $(document).on('click', '#delete_related', function (e) {
                e.preventDefault();

                var url='{{url('')}}/'+$(this).attr('pull-link');

                $.ajax({
                    'url':url,
                    'type':'get',
                    'datatype':'json',
                })
                    .done(function(response) {
                        toastr.success(response.message);
                        getRelated();
                    })
                    .fail(function(data) {

                    })
//                    }
//                });
            });
            $('#related_post_form').submit(function (e) {
                e.preventDefault();


                var url=$(this).attr('action');
                $.ajax({
                    'url':url,
                    'type':'post',
                    'data':$('#related_post_form').serializeArray(),
                })
                    .done(function(response) {
                        toastr.success('response.message');
                        getRelated();
                    })
                    .fail(function(data) {
                    })

            });

        });
    </script>
    @endpush
@endsection