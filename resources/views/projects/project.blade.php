
@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
                </div>

            </div>
            <div class="portlet-body form">
                <div class="table-toolbar">
                    @if(in_array($perm,$allowedActions))
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="#add_modal" data-toggle="modal" type="button" style="margin-right: 20px;" class="btn btn-green"><i class="fa fa-plus"></i> اضافة جديد </a>
                        </div>
                    </div>@endif
                </div>

                <table id="data_tb" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>الرقم </th>
                <th> اسم المشروع </th>
                <th> التفاصيل/الوصف </th>
                <th> العميل </th>
                <th>الاجراء </th>
                </tr>
                </thead>
                </table>
            </div>
            <div id="proc_img_div" align="center"></div>
        </div>
        <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <h4 class="modal-title" id="exampleModalLabel">اضافة ممول جديد </h4>
                        </div>
                        {!! Form::open(['method'=>'post','url'=>url($route) , 'id'=>'add_form'])!!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div id="alert_error"  class="alert alert-danger" style="display: none">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> اسم المشروع  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> العميل  </label>
                                    <div class="col-md-9">
                                        <select name="sponser_id" id="sponser_id"  class="form-control" required>
                                            <option value=""> -- اختر العميل -- </option>
                                            @foreach($Sponsers as $Sponser)
                                                <option value="{{$Sponser->id}}">{{$Sponser->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="sponser_id" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> التفاصيل/الوصف  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3">الحالة</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<select name="status"  class="form-control">--}}
                                            {{--<option value="1"> {{trans('ar.active')}}</option>--}}
                                            {{--<option value="2">{{trans('ar.notactive')}}</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="modal-footer" dir="rtl">
                            <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                            <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> الغاء <i class="fa fa-close"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel"> تعديل  {{$page_name}} </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route.'/update') , 'id'=>'edit_form']) !!}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الاسم  </label>
                                    <div class="col-md-9">
                                        <input type="hidden" id="id_up" name="id_up">
                                        <input type="text" name="name" id="name_up" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الاسم  </label>
                                    <div class="col-md-9">
                                        <select name="sponser_id" id="sponser_id_up"  class="form-control" required>
                                            @foreach($Sponsers as $Sponser)
                                                <option value="{{$Sponser->id}}">{{$Sponser->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="sponser_id" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> التفاصيل/الوصف  </label>
                                    <div class="col-md-9">

                                        <input type="text" name="description" id="description_up" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label col-md-3">الحالة</label>--}}
                            {{--<div class="col-md-9">--}}
                            {{--<select name="status" id="status_up" class="form-control">--}}
                            {{--<option value="1"> {{trans('ar.active')}}</option>--}}
                            {{--<option value="2">{{trans('ar.notactive')}}</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ   <i class="fa fa-check"></i>  </button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal"> الغاء <i class="fa fa-close"></i></button>
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


            $(function () {
                var url =  $('#add_form').attr("action")+"/All";

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").DataTable({
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
                        {'data': 'id', 'name': 'id'},
                        {'data': 'name', 'name': 'name'},
                        {'data': 'description', 'name': 'description'},
                        {'data': 'sponser.name', 'name': 'sponser_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ]

                });
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
                          })
                          .fail(function(data) {

                              $.each(data.responseJSON, function(index, val) {
                                  console.log(index+","+val);
                                  $('input[name='+index+']').after('<span class="help-block invalid-feedback">'+val+'</span>');

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
                        $('#sponser_id_up').val(response.items.sponser_id);
                        $('#description_up').val(response.items.description);
                        $('#id_up').val(response.items.id);
                        // document.getElementById("status_up").value = response.items.status;
                    },
                    error: function (xhr) {

                    }
                })
            });
            $('#edit_form').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action')+'/'+document.getElementById('id_up').value;
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#edit_form').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#edit_modal').modal('hide');
                                oTable.ajax.reload();
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);
                                  $('input[name='+index+']').after('<span class="help-block invalid-feedback">'+val+'</span>');

                                });
                            })
                    }
                });
            });
        });
    </script>
    @endpush
@endsection









