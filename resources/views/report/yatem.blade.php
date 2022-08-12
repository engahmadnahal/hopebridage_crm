
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
                                    <select data-column="1" name="state" id="state" class="bs-select form-control searchableList">
                                        <option value="">اختر المحافظة</option>
                                        @foreach($States as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative">
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput"> تاريخ وفاة الاب من</span>
                                    <div class="input-group">
                                        <input id="death_from" name="death_from" type="text" class="form-control datepicker "  data-date-format="yyyy-mm-dd"  data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">الى تاريخ</span>
                                    <div class="input-group">
                                        <input id="death_to" name="death_to" type="text" class="form-control datepicker "  data-date-format="yyyy-mm-dd"  data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="position: relative">
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput"> تاريخ ميلاد الطفل من</span>
                                    <div class="input-group">
                                        <input id="dob_from" name="dob_from" type="text" class="form-control datepicker "  data-date-format="yyyy-mm-dd"  data-plugin-options='{"autoclose": true}'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">الى تاريخ</span>
                                    <div class="input-group">
                                        <input id="dob_to" name="dob_to" type="text" class="form-control datepicker "  data-date-format="yyyy-mm-dd"  data-plugin-options='{"autoclose": true}'>
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
                <table id="data_tb" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>م </th>
                <th>الاسم </th>
                <th> تاريخ الميلاد </th>
                <th> العلاقة </th>
                <th>اسم مقدم الطلب </th>
                <th> الجوال </th>
                <th> المنطقة </th>
                <th>الاجراء3 </th>
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
                        <h4 class="modal-title" id="exampleModalLabel"> اضافة {{$page_name}} </h4>
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
                                <label class="control-label col-md-3"> المشروع  </label>
                                <div class="col-md-9">
                                    <input type="hidden" name="child_id" id="child_id" class="form-control">
                                    <select name="project_id"  class="form-control" required>
                                        <option value=""> -- اختر المشروع -- </option>
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
                                    <input type="text" name="salary" class="form-control">
                                    <span class="admin_user" style="color: darkred"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> نوع العملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="currency" class="form-control">
                                    <span class="currency" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3"> البنك </label>
                                <div class="col-md-9">
                                    <input type="text" name="bank" class="form-control">
                                    <span class="bank" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3"> ملاحظات  </label>
                                <div class="col-md-9">
                                    <input type="text" name="note" class="form-control">
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
                                    <input name="start_dt" type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    <span class="start_dt" style="color: darkred"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ نهاية الكفالة</label>
                                <div class="col-md-9">
                                    <input name="end_dt" type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    <span class="end_dt" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-3">الحالة</label>
                                <div class="col-md-9">
                                    <select name="status"  class="form-control">
                                        <option value="1"> {{trans('ar.active')}}</option>
                                        <option value="2">{{trans('ar.notactive')}}</option>
                                    </select>
                                    <span class="status" style="color: darkred"></span>
                                </div>
                            </div>
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
                var url =  '{{url("OrphanSearchData")}}';

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
                       { width: 50, targets: 0 },
                       { width: 65, targets: 2 },
                       { width: 50, targets: 3 },
                       { width: 75, targets: 6 },
                   ],
                   fixedColumns: true,
                    "ajax":{
                        url:url,
                        data: function(d) {
                            d.dob_from= document.getElementById('dob_from').value;
                            d.dob_to= document.getElementById('dob_to').value;
                            d.state= document.getElementById('state').value;
                            d.death_from= document.getElementById('death_from').value;
                            d.death_to= document.getElementById('death_to').value;
                        }
                    } ,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-success',
                            title: 'تصدير اكسل'
                        },
                        'print'
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
                        {'data': 'dob', 'name': 'dob'},
                        {'data': 'rel.name', 'name': 'relation'},
                        {'data': 'customer.name', 'name': 'customer_id'},
                        {'data': 'customer.mobile', 'name': 'customer_id'},
                        {'data': 'customer.getstate.name', 'name': 'customer_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ],
                    "fnDrawCallback": function () {
                        oTable.column(0).nodes().each(function (cell, i) {
                            cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                        });
                    }

                });
            });
            $('#dob_from').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
                oTable.draw();
            });

            $('#dob_to').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
                oTable.draw();
            });

            $('#death_from').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
                oTable.draw();
            });

            $('#death_to').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
                oTable.draw();
            });

            $('#add_form').submit(function (e) {
               e.preventDefault();
              //  oTable.order( [ 1, 'asc' ] ).draw();

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

                          if(response.status == false)
                              toastr.error(response.message);
                          else{
                              toastr.success(response.message);
                              document.getElementById("add_form").reset();
                              $('#add_modal').modal('hide');
                              oTable.ajax.reload();
                          }

                      })
                      .fail(function(data) {

                          $.each(data.responseJSON.message, function(index, val) {
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

            $(document).on('click', '#new_yatem', function () {
                var child = $(this).attr('child');

                        $('#child_id').val(child);


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









