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
                    <i class="fa fa-edit"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase"> تعديل المعاملة </span>
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
                        <a href="#tab_5" class="nav-link" data-toggle="tab" id="attachment_id"> المرفقات </a>
                    </li>
                    <li>
                        <a href="#tab_7" class="nav-link"  data-toggle="tab" id="related_post_tab"> المعاملات المرتبطة </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_3">
                        <div class="form">
                            <!-- BEGIN FORM-->
                            {!! Form::open(['method'=>'post','url'=> url($route.'/update') , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label class="control-label col-md-3">  نوع البريد </label>
                                        <div class="col-md-9">
                                            <select name="post_type" id="post_type"  class="form-control" required>
                                                @foreach($PostType as $type)
                                                    <option value="{{$type->id}}" {{($type->id==$Post->post_type ? "selected" : "")}}>{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="post_type" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">داخلي/خارجي</label>
                                        <div class="col-md-9">
                                            <select name="post_in_out" id="post_in_out"  class="form-control" required>
                                                @foreach($PostInOut as $p_in_out)
                                                    <option value="{{$p_in_out->id}}" {{($p_in_out->id==$Post->post_in_out ? "selected" : "")}}>{{$p_in_out->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="post_in_out" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الجهة المرسلة</label>
                                        <div class="col-md-9">
                                            <select name="jeha_from" id="jeha_from"  class="form-control" required>
                                                @foreach($JehaAll as $jeha_in)
                                                    <option value="{{$jeha_in->id}}"  {{($jeha_in->id==$Post->jeha_from ? "selected" : "")}}>{{$jeha_in->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="jeha" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الجهة المستقبلة</label>
                                        <div class="col-md-9">
                                            <select name="jeha_to" id="jeha_to"  class="form-control" required>
                                                @foreach($JehaAll as $jeha_in)
                                                    <option value="{{$jeha_in->id}}"  {{($jeha_in->id==$Post->jeha_to ? "selected" : "")}}>{{$jeha_in->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="jeha" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> رقم القيد </label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="post_id" value="{{$Post->id}}" class="form-control">
                                            <input type="text" name="post_no" value="{{$Post->post_no}}" readonly class="form-control" required>
                                            <span class="post_no" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">تاريخ المعاملة</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input id="post_date" name="post_date" type="text" value="{{$Post->post_date}}" class="form-control datepicker"  data-date-format="yyyy-mm-dd"  data-plugin-options='{"autoclose": true}' required> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                            </div>
                                            <span class="post_date" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">تصنيف المعاملة </label>
                                        <div class="col-md-9">
                                            <select name="Tasneef" id="Tasneef"  class="form-control" required>
                                                <option value=""> -- اختر تصنيف المعاملة -- </option>
                                                @foreach($Tasneef as $tasn)
                                                    <option value="{{$tasn->id}}" {{($tasn->id==$Post->tasneef ? "selected" : "")}}>{{$tasn->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="Tasneef" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> درجة الاهمية </label>
                                        <div class="col-md-9">
                                            <select name="importent" id="importent"  class="form-control" required>
                                                @foreach($Important as $imp)
                                                    <option value="{{$imp->id}}" {{($imp->id==$Post->importent_degree ? "selected" : "")}}>{{$imp->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="importent" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">عنوان المعاملة </label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" value="{{$Post->title}}" class="form-control" placeholder="عنوان المعاملة" required>
                                            <span class="title" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> البيان </label>
                                        <div class="col-md-9">
                                            <input type="text" name="pian" value="{{$Post->pian}}" class="form-control" placeholder="البيان" required>
                                            <span class="pian" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">طريقة التوصيل </label>
                                        <div class="col-md-9">
                                            <input type="text" name="receive_way" value="{{$Post->receive_way}}" class="form-control" >
                                            <span class="receive_way" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">جوال المراجع</label>
                                        <div class="col-md-9">
                                            <input type="text" name="jawwal" value="{{$Post->jawwal}}" class="form-control" >
                                            <span class="jawwal" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">يحتاج الى رد</label>
                                        <div class="col-md-9">
                                            <select name="need_answer" id="need_answer"  class="form-control" required>
                                                <option value="1" {{($Post->need_answer==1 ? "selected" : "")}}> {{trans('ar.yes')}} </option>
                                                <option value="2" {{($Post->need_answer==2 ? "selected" : "")}}>{{trans('ar.no')}}</option>
                                            </select>
                                            <span class="need_answer" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">المرفقات</label>
                                        <div class="col-md-9">
                                            <input type="text" name="attachment" value="{{$Post->attachment}}" class="form-control" >
                                            <span class="attachment" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">درجة السرية </label>
                                        <div class="col-md-9">
                                            <select name="security" id="security"  class="form-control" required>
                                                @foreach($Security as $sec)
                                                    <option value="{{$sec->id}}" {{($sec->id==$Post->security_degree ? "selected" : "")}}>{{$sec->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="security" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">مكان الحفظ</label>
                                        <div class="col-md-9">
                                            <input type="text" name="save_box" value="{{$Post->save_box}}" class="form-control" >
                                            <span class="save_box" style="color: darkred"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-9" style="margin-right: 40px;">
                                        <button type="submit" class="btn btn-primary" style="width: 150px;">  حفظ   <i class="fa fa-check"></i> </button>
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
                                    <div class="col-md-6">
                                        {{--<a href="webrun:D:\Program\Project1.exe" type="button" class="btn btn-outline-info " style="width: 90px;">ادخال سكانر</a>--}}
                                    </div>
                                </div>
                            </div>
                         {!! Form::close() !!}
                           <!-- END FORM-->
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
                                        <a  id="search_customer" pull-link="{{url('customer/all')}}" href="#search_customer_model" data-toggle="modal"  type="button" class="btn btn-primary  " style="width: 100px;"> بحث  <i class="fa fa-search"></i>   </a>
                                        <a href="#new_customer" data-toggle="modal" type="button" class="btn   btn-green  "> اضافة جديد <i class="fa fa-plus"></i>   </a>
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
                                        <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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
                                        <button type="submit" class="btn btn-green " > رفع الملفات  <i class="fa fa-upload"></i></button>
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
                                        <div id="zoom_image_div" style="height: 700px; overflow: scroll">

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
                                            <i class="fa fa-search font-purple-soft"></i>
                                            <span class="caption-subject font-purple-soft bold uppercase">بحث عن معاملة</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        {!! Form::open(['method'=>'post','url'=>url('Post/relatedSearch') ,'files'=> true, 'id'=>'related_post_form','class'=>'form-horizontal form-row-seperated'])!!}
                                        <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">

                                        {!! Form::close() !!}
                                           <div class="form-group">
                                            <label class="col-md-3 control-label font-purple-soft"> </label>
                                            <div class="col-md-9">
                                                <a id="related_search" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success   yallow" style="width: 100px;"> بحث  في الوارد<i class="fa fa-search"></i>   </a>
                                                <a id="related_search_sader" pull-link="{{url('customer/all')}}" href="#search_related_model" data-toggle="modal"  type="button" class="btn   btn-success   yallow" style="width: 100px;"> بحث  في الصادر<i class="fa fa-search"></i>   </a>

                                            </div>
                                        </div>
                                      {{--<button type="button" href="#search_related_model" class="btn   btn-success   " style="width: 100px;">  حفظ  <i class="fa fa-search"></i></button>--}}

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
        <div class="modal fade" id="refer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل المعاملة للادارات </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route.'/refer_dept') , 'id'=>'refer_form']) !!}

                    <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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
                        {!! Form::open(['method'=>'post','url'=>url($route.'/refer_dept') , 'id'=>'refer_form_inner']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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
                        <h4 class="modal-title" id="exampleModalLabel">تحويل البريد للادارات الداخلية</h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route.'/refer_user') , 'id'=>'refer_form_user']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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
                            <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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
                                                    <th> رقم البريد </th>
                                                    <th> العنوان </th>
                                                    <th> الجهة </th>
                                                    <th> التاريخ </th>
                                                    <th> الاجراء </th>
                                                </tr>
                                                </thead>
                                            </table>
                                </div>
                                <div class="portlet light bordered">

                                    {{--<div class="portlet-body">--}}
                                        <div class="row" style="background-color:#f7f8f9; border: 1px; margin: 0px;" >
                                            {!! Form::open(['method'=>'post','url'=>url('post/customer') , 'id'=>'save_customer','class'=>'form-horizontal form-row-seperated'])!!}
                                            <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
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

                        {{--<div class="modal-footer" dir="rtl">--}}
                            {{--<button type="reset" class="btn btn-default" data-dismiss="modal">اغلاق</button>--}}
                            {{--<button type="submit" class="btn btn-primary">  حفظ  </button>--}}
                        {{--</div>--}}
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
                            <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق  <i class="fa fa-close"></i>   </a>
                        </div>
                   </div>
                </div>
            </div>

    </section>
    @push('js')
<script src="{{url('')}}/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/pages/scripts/form-fileupload.min.js" type="text/javascript"></script>

<script>
        $(document).ready(function () {

            bootbox.addLocale('ar', {
                CONFIRM: 'موافق',
                OK:'نعم',
                CANCEL:'الغاء'
            });

            bootbox.setLocale('ar');

            $('#jeha_main').change(function(){
                $('#jeha').empty();
                var selectedjeha = $(this).val();
                $.ajax({
                    url:  '{{url("getJehaUsers")}}'+'/'+selectedjeha,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#jeha_users').empty();
                            for (var i = 0; i < response.items.length ; i++) {
                                $('#jeha_users').append('<li class="pull-right"><label><input type="checkbox" name="user_refereds[]" value="'+response.items[i].id+'">'+response.items[i].name+'</label> </li>');
                            }
                    },
                    contentType: false,
                    processData: false,
                });
            });

            $('.searchable').change(function () {
                var column = jQuery(this).attr('data-column');
                oTable.columns(column).search(jQuery(this).val()).draw();
            });


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
                var url= '{{url('Post/mainSaderData')}}';
                getSader(url);
            });

            $(document).on('click', '#related_search', function (e){
                var url= '{{url('Post/mainWaredData')}}';
                getSader(url);
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
                                return '<a pull-link="Post/related/'+row['id']+'/'+post_id+'" class="btn  btn-circle btn-icon-only btn-green" title="اضافة كمعاملة مرتبطة" id="add_related">  <i class="fa fa-plus"> </i></a>';
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

            $('#add_form').submit(function (e) {
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm('تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#add_form').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);

                                document.getElementById("add_form").reset();

                                oTable.ajax.reload();

                                $.each(response.data, function(index, val) {
                                    console.log(index+","+val);
                                    $("."+index).clear();
                                });
                                $(".password").clear();
                            })
                            .fail(function(data) {

                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);
                                    $("."+index).text(val);
                                });
                            })
                    }
                });

            });

            $(document).on('click', '#delete_btn', function (e) {
                e.preventDefault();

                var url = $(this).attr('href');
                bootbox.confirm('تأكيد عملية الحذف !', function (res) {

                    if (res) {

                        $.ajax({
                            'url': url,
                            'type': 'get',
                            'dataType': 'json',
                            success: function (response) {
                                console.log(response);
                                oTable.ajax.reload();
                                toastr.success(response.message);
                            },
                            error: function (xhr) {

                            }
                        })
                    }

                });
            });

            $(document).on('click', '#edit_btn', function () {
                var url = $(this).attr('pull-link');
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',
                    success: function (response) {
                        $('#name_up').val(response.items.name);
                        document.getElementById("status_up").value = response.items.status;
                        $('#id_up').val(response.items.id);

                    },
                    error: function (xhr) {

                    }
                })
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

        });
    </script>
    @endpush
@endsection
