@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-send"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>رقم البريد </th>
                    <th>نوع البريد </th>
                    <th>  عنوان المعاملة </th>
                    <th> تاريخ المعاملة </th>
                    <th>  الجهة المرسلة </th>
                    <th> الجهة المستقبلة </th>
                    <th> التصنيف </th>
                    <th> الاجراء </th>
                </tr>
                </thead>
            </table>
        </div>
            <a name="detail_section"></a>

        </div>
        <div id="proc_img_div" align="center"></div>
        <div id="detail_contaner" class="portlet light portlet-fit portlet-datatable bordered" style="display: none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-info"></i>

                    <span class="caption-subject font-blue-sharp bold uppercase"> تفاصيل المعاملة </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs nav-tabs-lg">
                        <li class="active">
                            <a href="#tab_3" class="nav-link"  data-toggle="tab"> تفاصيل المعاملة </a>
                        </li>
                        <li>
                            <a href="#tab_4" class="nav-link"  data-toggle="tab" id="customer_tab"> معلومات المراجعين
                                {{--<span class="badge badge-success">4</span>--}}
                            </a>
                        </li>
                        <li>
                            <a href="#tab_5" class="nav-link"  data-toggle="tab" id="attachment_id"> المرفقات </a>
                        </li>
                        <li>
                            <a href="#tab_7" class="nav-link"  data-toggle="tab" id="related_post_tab"> المعاملات المرتبطة </a>
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
                                                {{--<label class="control-label col-md-3">حالة المعاملة</label>--}}
                                                {{--<div class="col-md-9">--}}
                                                    {{--<input name="status" id="status" value="" class="form-control" style="" readonly>--}}
                                                {{--</div>--}}
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
                                                    <input type="hidden" name="post_id" id="post_id" value=""  class="post_id">
                                                    <input type="hidden" name="jeha_id" id="jeha_id" value="">
                                                    <input type="hidden" name="post_id_main" id="post_id_main" value="">
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
                                                    @if(in_array(36,$allowedActions))
                                                    <a href="#action_list" data-toggle="modal" pull-link="PosAction/jeha/" class="btn btn-success" id="action_list_btn"> الاجراءات السابقة <i class="fa fa-angle-double-left"></i> </a>
                                                    @endif
                                                    @if(in_array(35,$allowedActions))
                                                    <a href="#action_modal" data-toggle="modal" pull-link="PosJeha/edit" class="btn btn-success" id="action_btn"> اضافة اجراء <i class="fa fa-plus"> </i> </a>
                                                    @endif
                                                    @if( (in_array(27,$allowedActions)) || (in_array(28,$allowedActions)) || (in_array(29,$allowedActions)) )
                                                        <div class="btn-group">
                                                            <button class="btn btn-pink dropdown-toggle" data-toggle="dropdown" type="button"> <span class="caret"></span>  <i class="fa fa-share"> </i>تحويل المعاملة
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                @if(in_array(27,$allowedActions))
                                                                    <a class="dropdown-item" href="#refer_modal_inner" data-toggle="modal">تحويل لادارتي</a>
                                                                @endif
                                                                @if(in_array(28,$allowedActions))
                                                                    <a class="dropdown-item" href="#refer_modal" data-toggle="modal">تحويل لادارة اخرى</a>
                                                                @endif
                                                                @if(in_array(29,$allowedActions))
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
                                        @if(in_array(31,$allowedActions))
                                        <div class="row" style="padding: 10px;">
                                            <a  id="search_customer" pull-link="{{url('customer/all')}}" href="#search_customer_model" data-toggle="modal"  type="button" class="btn   btn-success" style="width: 100px;"> بحث  <i class="fa fa-search"></i>   </a>
                                            <a id="new_customer_btn" href="#new_customer" data-toggle="modal" type="button" class="btn btn-green  "  > اضافة جديد <i class="fa fa-plus"></i>   </a>
                                        </div>
                                        @endif

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
                                    @if(in_array(38,$allowedActions))
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
                                                <label class="col-md-3 control-label font-purple-soft"> التفاصيل</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="file_details" class="form-control" placeholder="التفاصيل ">
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
                                        @if(in_array(37,$allowedActions))
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
                                @if(in_array(37,$allowedActions))
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
                                @if(in_array(33,$allowedActions))
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
                                                    <a id="related_search" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success   yallow"  > بحث  في الوارد<i class="fa fa-search"></i>   </a>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <a id="related_search_sader" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success   yallow"  > بحث  في الصادر<i class="fa fa-search"></i>   </a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<button type="button" href="#search_related_model" class="btn   btn-success   "  >  حفظ  <i class="fa fa-search"></i></button>--}}

                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="{{in_array(33,$allowedActions)?'col-md-8':'col-md-12'}}">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-eye font-purple-soft"></i>
                                                <span class="caption-subject font-purple-soft bold uppercase">اضافة معاملة مرتبطة</span>
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
                            <h4 class="modal-title" id="exampleModalLabel">اضافة اجراء</h4>
                        </div>
                        {!! Form::open(['method'=>'post','url'=>url('newAction/Sader') , 'id'=>'add_action']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> حالة المعاملة  </label>
                                        <div class="col-md-9">
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
                                            <input type="hidden" id="id_up" name="id_up" value="">
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
                            <button type="submit" class="btn   btn-primary  "  > حفظ   <i class="fa fa-check"></i>  </button>
                            <button type="reset" class="btn   btn-default  "   data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
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
                        <button type="button" id="add_new_action" class="btn   btn-primary  "  > اضافة اجراء   <i class="fa fa-plus"></i>  </button>
                        <button type="reset" class="btn   btn-default  "   data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
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
                        <button type="submit" class="btn   btn-primary  "  > حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  "   data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>

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
                        <button type="submit" class="btn   btn-primary  "  > حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  "   data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
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
                        <button type="reset" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ التحويل</button>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn   btn-primary  "  > حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  "   data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
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
                        <button type="submit" class="btn   btn-primary   "  > حفظ  <i class="fa fa-check"></i></button>
                        <a id="empty_customer" type="button" data-dismiss="modal" class="btn   btn-default   "  > الغاء  <i class="fa fa-close"></i>   </a>
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
                        {{--<div class="row" id="title_search_div">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<span class="lblinput">رقم القيد</span>--}}
                                    {{--<input id="post_no_search" type="text" class="form-control searchable"--}}
                                           {{--placeholder="بحث برقم القيد" value=""/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<span class="lblinput">عنوان المعاملة</span>--}}
                                    {{--<input id="title_search" type="text" class="form-control searchable"--}}
                                           {{--placeholder="بحث بعنوان المعاملة" value=""/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div>
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
                        <a type="reset" data-dismiss="modal" class="btn   btn-default  "  > اغلاق  <i class="fa fa-close"></i>   </a>
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
                var url ='{{url('Post/mainSaderData')}}';

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: true,
                   columnDefs: [
                       { width: 120, targets: 7 }
                   ],
//                    fixedColumns: false,
                    "ajax": url,

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
                    "columns": [
                    {'data': 'post_no', 'name': 'post_no'},    // first:dataname , second name in database
                    {'data': 'posttype.name', 'name': 'post_type'},
                    {'data': 'title', 'name': 'title'},
                    {'data': 'post_date', 'name': 'post_date'},
                    {'data': 'jehafrom.name', 'name': 'jeha_from'},
                    {'data': 'jehato.name', 'name': 'jeha_to'},
                    {'data': 'posttasneef.name', 'name': 'tasneef'},
                    {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                ],
                    "oPaginate": {
                        "sFirst":    "الأول",
                        "sPrevious": "السابق",
                        "sNext":     "التالي",
                        "sLast":     "الأخير"
                    },
//                    "scrollY":        "200px",
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
                    "oPaginate": {
                        "sFirst":    "الأول",
                        "sPrevious": "السابق",
                        "sNext":     "التالي",
                        "sLast":     "الأخير"
                    },
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
            // $(document).on('click', '#refer_btn', function (e) {
            //
            //     if( document.getElementById('id_up').value =="")
            //     {
            //         $('#refer_modal').modal('hide');
            //         bootbox.alert("يجب تحديد المعاملة");
            //         return false;
            //     }
            //
            // });

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
                else {  document.getElementById("id_up").value = $(this).attr('pull-link'); }

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
                        $('input[type="hidden"][class="post_id"]').prop("value", response.items.id);
                        document.getElementById("post_type").value = response.items.posttype.name;
                   //     document.getElementById("status").value = response.items.getstatus.name;
                        document.getElementById("post_no").value = response.items.post_no;
                        document.getElementById("post_id_main").value = response.items.id;
                        document.getElementById("jeha_from").value = response.items.jehafrom.name;
                        document.getElementById("post_date").value = response.items.post_date;
                        document.getElementById("pian").value = response.items.pian;
                        document.getElementById("title").value = response.items.title;
                        document.getElementById("Tasneef").value = response.items.post_tasneef.name;
                        document.getElementById("post_in_out").value = response.items.post_in_out.name;
                        document.getElementById("importent").value = response.items.importent.name;
                        document.getElementById("jawwal").value = response.items.jawwal;
                        document.getElementById("security_degree").value = response.items.security.name;
                        document.getElementById("need_answer").value = (response.items.need_answer==1 ? "نعم" : "لا");
                        document.getElementById("save_box").value = response.items.save_box;

//                      document.getElementById("attachment").value = response.items.post.attachment;
//                      document.getElementById("receive_way").value = response.items.post.receive_way;

                        // Used for hidden inputs
                        document.getElementById("id_up").value = response.items.id;
                        document.getElementById("jeha_id").value = response.items.jeha_id;
                     // document.getElementById("post_id_ref").value = response.items.id;
                     // document.getElementById("post_dept_id").value = response.items.id;

                        // if(response.items.status != 3)
                        //     document.getElementById("status").style="background-color:#f28c89";
                        // else
                        //     document.getElementById("status").style="background-color: #d8f99f";

                    },
                    error: function (xhr) {

                    }
                })
            });

            $('#add_action').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action')+'/'+document.getElementById('id_up').value;
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

           // show image function
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


            $(document).on('click', '#remove_customer', function (e) {
                var cus_id=$(this).attr('customer_id');
                removeCustomer(cus_id);
            });

           // all function of customer

            // functions for related posts

            $(document).on('click', '#related_post_tab', function (e){
                 getRelated();
            });

            $(document).on('click', '#related_search_sader', function (e){
                var url= '{{url('Post/mainSaderData')}}';
                getSader(url);
            });

            $(document).on('click', '#related_search', function (e){
                var url= '{{url('Post/mainWaredData')}}';
                getSader(url);
            });
          // get js.blade function

        });
    </script>
    @endpush
    @extends('archive.js')
@endsection