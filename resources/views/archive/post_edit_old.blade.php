@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="row">
        </div>
        <div class="clearfix">
        </div>
        <div class="tab-pane" id="tab_2">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> {{$title}} </div>
                    <div class="tools">
                        <a href="javascript:;"  class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    {!! Form::open(['method'=>'post','url'=>url($route).'/'+$post->id.'/edit' , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}
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
                                    <select name="jeha" id="jeha"  class="form-control" required>
                                        @foreach($JehaAll as $jeha_in)
                                            <option value="{{$jeha_in->id}}"  {{($jeha_in->id==$Post->jeha ? "selected" : "")}}>{{$jeha_in->name}}</option>
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
                                    <select name="jeha" id="jeha"  class="form-control" required>
                                        @foreach($JehaAll as $jeha_in)
                                            <option value="{{$jeha_in->id}}"  {{($jeha_in->id==$Post->jeha ? "selected" : "")}}>{{$jeha_in->name}}</option>
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
                                <label class="control-label col-md-3"> رقم البريد </label>
                                <div class="col-md-9">
                                    <input type="text" name="post_no" value="{{$Post->post_no}}" class="form-control" required>
                                    <span class="post_no" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ المعاملة</label>
                                <div class="col-md-9">
                                    <input type="text" name="post_date" value="{{$Post->post_date}}" class="form-control" placeholder="dd/mm/yyyy" required>
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
                    <div class="form-actions" style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-lg green" style="margin-left: 40px;width: 110px;">حفظ</button>
                                        <button type="button" class="btn btn-lg default" style="width: 100px;">الغاء</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="actions">
                                    <div class="btn-group">
                                        <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                            <span class="fa fa-angle-down"> </span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;"> </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;"> Q3 2014
                                                    <span class="label label-sm label-success"> current </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Q4 2014
                                                    <span class="label label-sm label-warning"> upcoming </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a href="#refer_modal" data-toggle="modal" type="button" class="btn btn-outline-info " style="width: 90px;">تحويل</a>
                                <a href="webrun:D:\Program\Project1.exe" type="button" class="btn btn-outline-info " style="width: 90px;">ادخال سكانر</a>
                                <button type="button" class="btn btn-outline-info">Info</button>
                                <button type="button" class="btn default" style="width: 80px;">رد </button>
                                <button type="button" class="btn default" style="width: 80px;">رد </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
            </div>
            <br>
        </div>
            <div class="modal fade" id="refer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <h4 class="modal-title" id="exampleModalLabel">تحويل البريد للادارات الداخلية</h4>
                        </div>
                        {!! Form::open(['method'=>'post','url'=>url($route.'/refer_dept') , 'id'=>'refer_form']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" value="{{$Post->id}}" id="post_id" name="post_id">
                                    <div class="form-group">
                                            @if(isset($JehaIn))
                                                @foreach($JehaIn as $jeha)
                                                    <ul class="list-inline" dir="rtl">
                                                        <li class="pull-right">
                                                            <label><input type="checkbox" class="jeha_refered" name="jeha_refereds[]" value="{{$jeha->id}}"> {{$jeha->name}}</label>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" dir="rtl">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary">حفظ التحويل</button>
                        </div>
                        {!! Form::close() !!}
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

            {{--$('#PostInOut').change(function(){--}}
                {{--$('#jeha').empty();--}}
                {{--var selectedjeha = $(this).val();--}}
                {{--$.ajax({--}}
                    {{--url:  '{{url("Post/getJeha")}}'+'/'+selectedjeha,--}}
                    {{--type: 'get',--}}
                    {{--dataType: 'json',--}}
                    {{--success: function(response) {--}}
                            {{--for (var i = 0; i < response.items.length ; i++) {--}}
                                {{--$('#department').append('<option value='+response.items[i].id+' >'+response.items[i].name+'</option>');--}}
                            {{--}--}}
                    {{--},--}}
                    {{--contentType: false,--}}
                    {{--processData: false,--}}
                {{--});--}}
            {{--});--}}

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

        });
    </script>
    @endpush
@endsection









