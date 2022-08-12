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

                <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>الرقم </th>
                        <th> الاسم </th>
                        <th> اسم المستخدم </th>
                        <th> الحالة </th>
                        <th> المجموعة </th>
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
                        <h4 class="modal-title" id="exampleModalLabel">  اضافة  {{$page_name}}  </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route) , 'id'=>'add_form'])!!}
                    <div class="modal-body">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">  اسم الموظف </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name"  class="form-control" required>
                                        <span class="name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اسم المستخدم</label>
                                    <div class="col-md-9">
                                        <input type="text" name="username"  class="form-control" required>
                                        <span class="username" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الايميل </label>
                                    <div class="col-md-9">
                                        <input type="email" name="email"  class="form-control" required>
                                        <span class="email" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الحالة</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control">
                                            <option value="1"> {{trans('ar.active')}}</option>
                                            <option value="2">{{trans('ar.notactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">كلمة المرور </label>
                                    <div class="col-md-9">
                                        <input type="password" name="password"  class="form-control" required>
                                        <span class="password" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">تأكيد كلمة المرور</label>
                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        <span class="password" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الصلاحيات </label>
                                    <div class="col-md-9">
                                        <select name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br>
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
                                    <div id="alert_error"  class="alert alert-danger" style="display: none">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">  اسم الموظف </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control" required>
                                        <input type="hidden" name="id_up" id="id_up" class="form-control" required>
                                        <span class="name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اسم المستخدم</label>
                                    <div class="col-md-9">
                                        <input type="text" name="username" id="username" class="form-control" required>
                                        <span class="username" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الايميل </label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" id="email" class="form-control" required>
                                        <span class="email" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الحالة</label>
                                    <div class="col-md-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"> {{trans('ar.active')}}</option>
                                            <option value="2">{{trans('ar.notactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">كلمة المرور </label>
                                    <div class="col-md-9">
                                        <input type="password" name="password"  class="form-control">
                                        <span class="password" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">تأكيد كلمة المرور</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password_confirmation">
                                        <span class="password" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3"> الصلاحيات </label>
                                    <div class="col-md-9">
                                        <select name="role" id="role"  class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br>
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
                    $.fn.dataTable.ext.errMode = 'none';
                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        "serverSide": true,
                        paging: true,
                        searching: true,
                        info: true,
                        "ajax": url,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excel',
                                className: 'btn-success',
                                title: 'تصدير اكسل'
                            },
                            {
                                extend: 'pdf',
                                className: 'btn-danger',
                                title: 'ppddff'
                            },
                            { extend: 'print',
                                className: 'btn-info print_btn',
                                text: 'طباعة',
                                autoPrint: true,
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                },
                            }
                        ],


                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                        },
                        "columns": [
                            {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                            {'data': 'name', 'name': 'name'},
                            {'data': 'username', 'name': 'username'},
                            {'data': 'is_active', 'name': 'is_active'},
                            {'data': 'role.name', 'name': 'role_id'},
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
                            $('#name').val(response.items.name);
                            $('#email').val(response.items.email);
                            $('#username').val(response.items.username);
                            $('#status').val(response.items.is_active);
                            $('#role').val(response.items.role_id);
                            $('#id_up').val(response.items.id);
                            document.getElementById("status").value = response.items.is_active;
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









