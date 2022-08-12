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
            <div class="portlet-body collapse-body form">
                <form action="#" class="horizontal-form">

                    <div class="form-body" style="padding: 10px;">
                        <div class="row" style="position: relative">
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> المحافظة </span>
                                    <select data-column="1" id="state" class="bs-select form-control searchableList" onChange="getState();">
                                        <option value="">اختر المحافظة</option>
                                        @foreach($States as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> المنطقة </span>
                                    <select data-column="1" name="region" id="region" class="form-control searchableList">
                                        <option value="">اختر المنطقة</option>
                                        @foreach($Regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> المشروع </span>
                                    <select data-column="1" id="project" class="bs-select form-control searchableList">
                                        <option value="">اختر المشروع</option>
                                        @foreach($Projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <span class="lblselect"> الحالة </span>
                                    <div class="col-md-9">
                                        <select id="status" class="bs-select form-control searchableList">
                                            <option value="1"> {{trans('ar.active')}}</option>
                                            <option value="2">{{trans('ar.notactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative">
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> مبلغ الكفالة </span>
                                    <input id="salary" type="text" class="form-control searchable">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> العملة </span>
                                    <input id="currency" type="text" class="form-control searchable">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput"> تاريخ الكفالة من</span>
                                    <div class="input-group">
                                        <input id="date_from" name="date_from" type="text"
                                               class="form-control datepicker" data-date-format="yyyy-mm-dd"
                                               data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">الى تاريخ</span>
                                    <div class="input-group">
                                        <input id="date_to" type="text" class="form-control datepicker"
                                               data-date-format="yyyy-mm-dd" data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="position: relative">
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> المنظمة الداعمة </span>
                                    <select data-column="1" id="projectsponser" class="bs-select form-control searchableList">
                                        <option value="">اختر المنظمة</option>
                                        @foreach($ProjectSponser as $sponser)
                                            <option value="{{ $sponser->id }}">{{ $sponser->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> سنة الكفالة </span>
                                    <div class="input-group">
                                        <input id="date_year" name="date_year" type="text"
                                               class="form-control datepicker" data-date-format="yyyy"
                                               data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <span class="lblselect">التقييم</span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="total" name="total" class="form-control searchable" placeholder="من">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="total_to" name="total_to" class="form-control searchable" placeholder="الى">
                                        </div>
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
                                <button type="button"
                                        class="btn default btn-reset">تفريغ
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="portlet-body collapse-body form">
                <table id="data_tb" class="table table-responsive table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم اليتيم</th>
                        <th>اسم الوصي</th>
                        <th>هوية الوصي</th>
                        <th> المحافظة</th>
                        <th> المنطقة</th>
                        <th> الجوال</th>
                        <th> المستخدم</th>
                        <th> عدد مرات الاستفادة</th>
                        <th>سبب رفض (قبول) طلب اليتيم</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div id="proc_img_div" align="center"></div>
        </div>
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span1
                                    aria-hidden="true">&times;
                            </span1>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel"> اضافة {{$page_name}} </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route) , 'id'=>'edit_form'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div id="alert_error" class="alert alert-danger" style="display: none">
                                    <strong></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"> المشروع </label>
                                <div class="col-md-9">
                                    <input type="hidden" name="id_up" id="id_up" class="form-control">
                                    <select name="project_id" id="project_id" class="form-control" required>
                                        <option value=""> -- اختر المشروع --</option>
                                        @foreach($Projects as $proj)
                                            <option value="{{$proj->id}}">{{$proj->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="project_id" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">قيمة الكفالة الشهرية </label>
                                <div class="col-md-9">
                                    <input type="text" name="salary" id="salary_up" class="form-control">
                                    <span class="admin_user" style="color: darkred"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> نوع العملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="currency" id="currency_up" class="form-control">
                                    <span class="currency" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3"> البنك </label>
                                <div class="col-md-9">
                                    <input type="text" name="bank" id="bank_up" class="form-control">
                                    <span class="bank" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"> ملاحظات </label>
                                <div class="col-md-9">
                                    <input type="text" name="note" id="note_up" class="form-control">
                                    <span class="bank" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ بداية الكفالة </label>
                                <div class="col-md-9">
                                    <input name="start_dt" id="start_dt" type="text" class="form-control datepicker"
                                           data-date-format="yyyy-mm-dd" required
                                           data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i
                                                class="list-icon material-icons">date_range</i></span>
                                    <span class="start_dt" style="color: darkred"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ نهاية الكفالة</label>
                                <div class="col-md-9">
                                    <input name="end_dt" id="end_dt" type="text" class="form-control datepicker"
                                           data-date-format="yyyy-mm-dd" required
                                           data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i
                                                class="list-icon material-icons">date_range</i></span>
                                    <span class="end_dt" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3">الحالة</label>
                                <div class="col-md-9">
                                    <select name="status" id="status_up" class="form-control">
                                        <option value="1"> {{trans('ar.active')}}</option>
                                        <option value="2">{{trans('ar.notactive')}}</option>
                                    </select>
                                    <span class="status" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="submit" class="btn   btn-primary  " style="width: 100px;"> حفظ <i
                                    class="fa fa-check"></i></button>
                        <button type="reset" class="btn   btn-default  " style="width: 100px;" data-dismiss="modal">
                            الغاء <i class="fa fa-close"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="rejectModal">

        <div class="modal-dialog" role="document">
            <form id="rejectForm" action="" method="post">
                {{csrf_field()}}
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">سبب الرفض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">سبب الرفض</label>
                            <input type="text" required minlength="5" class="form-control" name="rejection">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="portlet-title">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <span class="caption-subject font-purple-soft bold uppercase">المشاريع التي استفاد منها</span>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table id="project_tb" dir="rtl" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> م </th>
                                <th>المشروع </th>
                                <th> التاريخ </th>
                            </tr>
                            </thead>
                            <tbody id="projects_body">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" dir="rtl">
                    <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق  <i class="fa fa-close"></i>   </a>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            $(document).ready(function () {

                $('body').on('click', '.reject_btn', function (e) {
                e.preventDefault();
                $('#rejectForm').attr('action', $(this).attr('href'));
                $('#rejectModal').modal('show');
            });



                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');


                $(function () {
                    var url = $('#edit_form').attr("action") + "/All";

                    if ($.fn.DataTable.isDataTable("#data_tb")) {
                        $('#data_tb').DataTable().clear().destroy();
                    }

                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        "serverSide": true,
                        paging: false,
                        searching: false,
                        info: false,
                        columnDefs: [
                            // { width: 50, targets: 8 },
                        ],
                        fixedColumns: true,
                        "ajax": {
                            url: url,
                            data: function (d) {
                                d.date_from = document.getElementById('date_from').value;
                                d.date_to = document.getElementById('date_to').value;
                                d.date_year = document.getElementById('date_year').value;
                                d.state = document.getElementById('state').value;
                                d.status = document.getElementById('status').value;
                                d.project = document.getElementById('project').value;
                                d.salary = document.getElementById('salary').value;
                                d.currency = document.getElementById('currency').value;
                                d.region = document.getElementById('region').value;
                                // d.rejection = document.getElementById('rejection').value;
                                d.total = document.getElementById('total').value;
                                d.total_to = document.getElementById('total_to').value;
                                d.projectsponser = document.getElementById('projectsponser').value;
                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend : 'excel',
                                text : 'Export to Excel',
                                exportOptions: {
                                    modifier: {
                                        search: 'applied',
                                        order: 'applied'
                                    }
                                }
                            },

                            {
                                extend: 'print',
                                text: 'Print',
                                exportOptions: {
                                    modifier: {
                                        search: 'applied',
                                        order: 'applied',
                                        columns: [0, 1, 2, 3, 5, 6]
                                    }
                                }
                            }

                        ],
                        "language": {
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                        },
                        "columns": [
                            {
                                orderable: false,
                                'render': function () {
                                    return '';
                                }
                            },
                            {'data': 'name', 'name': 'name'},
                            {'data': 'guardians_name', 'name': 'guardians_name'},
                            {'data': 'guardians_card_no', 'name': 'guardians_card_no'},
                            {'data': 'getstate.name', 'name': 'state_id'},
                            {'data': 'getregion.name', 'name': 'region_id'},
                            {'data': 'mobile', 'name': 'mobile'},
                            {'data': 'user.name', 'name': 'user_id'},
                            {'data': 'projects_count', 'projects_count': 'projects_count'},
                            {'data': 'rejection', 'rejection': 'rejection'},
                            {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                        ],
                        "fnDrawCallback": function () {
                            oTable.column(0).nodes().each(function (cell, i) {
                                cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            });
                        }

                    });
                });


                $('#add_form').submit(function (e) {
                    e.preventDefault();
                    //  oTable.order( [ 1, 'asc' ] ).draw();

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

                                    if (response.status == false)
                                        toastr.error(response.message);
                                    else {
                                        toastr.success(response.message);
                                        document.getElementById("add_form").reset();
                                        $('#add_modal').modal('hide');
                                        oTable.ajax.reload();
                                    }

                                })
                                .fail(function (data) {

                                    $.each(data.responseJSON.message, function (index, val) {
                                        console.log(index + "," + val);
                                        $('input[name=' + index + ']').after('<span class="help-block invalid-feedback">' + val + '</span>');

                                    });
                                })
                        }
                    });

                });

                $(document).on('click', '#project_count', function (e){
                    e.preventDefault();

                    var url =$(this).attr('href');

                    if ($.fn.DataTable.isDataTable("#project_tb")) {
                        $('#project_tb').DataTable().clear().destroy();
                    }

                    $.ajax(url,{

                    }).done(function (data) {
                        $('#projects_body').html(data);
                        $('#project_model').modal('show');

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

                $(document).on('click', '#new_yatem', function () {
                    var child = $(this).attr('child');

                    $('#child_id').val(child);


                });

                $(document).on('click', '#edit_btn', function () {
                    var url = $(this).attr('pull-link');
                    $.ajax({
                        'url': url,
                        'type': 'get',
                        'dataType': 'json',
                        success: function (response) {
                            $('#status_up').val(response.items.status);
                            $('#project_id').val(response.items.project_id);
                            $('#id_up').val(response.items.id);
                            $('#end_dt').val(response.items.end_dt);
                            $('#start_dt').val(response.items.start_dt);
                            $('#salary_up').val(response.items.salary);
                            $('#currency_up').val(response.items.currency);
                            $('#note_up').val(response.items.note);
                            $('#bank_up').val(response.items.bank);
                        },
                        error: function (xhr) {

                        }
                    })
                });

                $('#edit_form').submit(function (e) {
                    e.preventDefault();

                    var url = $(this).attr('action') + '/update/' + document.getElementById('id_up').value;
                    bootbox.confirm(' تأكيد الحفظ !!', function (res) {
                        if (res) {
                            $.ajax({
                                'url': url,
                                'type': 'post',
                                'datatype': 'json',
                                'data': $('#edit_form').serializeArray(),
                            })
                                .done(function (response) {
                                    toastr.success(response.message);
                                    $('#edit_modal').modal('hide');
                                    oTable.ajax.reload();
                                })
                                .fail(function (data) {
                                    $.each(data.responseJSON, function (index, val) {
                                        console.log(index + "," + val);
                                        $('input[name=' + index + ']').after('<span class="help-block invalid-feedback">' + val + '</span>');

                                    });
                                })
                        }
                    });
                });
            });
        </script>

        <script>
            function getState() {
                var url = "{{url('getState')}}";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        state: $("#state").val(),
                        _token: "{{csrf_token()}}"
                    },
                    success: function(response){
                        var data = JSON.parse(response);
                        oTable.ajax.reload();
                        $("#region").empty();
                        $("#region").append("<option>اختر المنطقة</option>");
                        $.each(data.states, function (key, value) {
                            $("#region").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                });
            }
        </script>
    @endpush
@endsection









