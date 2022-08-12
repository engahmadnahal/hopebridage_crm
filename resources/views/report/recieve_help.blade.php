
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
                                    <span class="lblselect">لم يستفيد من المشروع التالي </span>
                                    <select data-column="1" name="project_id" id="project_id" class="bs-select form-control searchableList">
                                        <option value="">اختر المشروع</option>
                                        @foreach($Projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">  رقم الهوية </span>
                                    <div class="input-group">
                                        <input id="card_no" name="card_no"  type="text" class="form-control searchable">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">  الاسم </span>
                                    <div class="input-group">
                                        <input id="name" name="name"  type="text" class="form-control searchable">
                                    </div>
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
                                        <input id="date_from" name="date_from" type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-wlbl">
                                    <span class="lblinput">الى</span>
                                    <div class="input-group">
                                        <input id="date_to" name="date_to" type="text" class="form-control datepicker"  data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
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
           {!! Form::open(['method'=>'post','url'=> url($route) , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}
                <table id="data_tb" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>م </th>
                <th>الهوية </th>
                <th> اسم المستفيد </th>
                <th>نوع الحالة </th>
                <th> المشروع المستفيد منه </th>
                <th>التاريخ </th>
                <th>الاجراء </th>
                </tr>
                </thead>
                </table>

           {!! Form::close() !!}
            </div>
            <div id="proc_img_div" align="center"></div>
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
                var url =  '{{url("recieveHelpData")}}';

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true ,
                    searching: false,
                    info: false,
                    columnDefs: [
                       { width: 150, targets: 0 },
                       { width: 40, targets: 6 },
                   ],
                   fixedColumns: true,
                    "ajax":{
                        url:url,
                        data: function(d) {
                            d.date_from= document.getElementById('date_from').value;
                            d.date_to= document.getElementById('date_to').value;
                            d.project_id= document.getElementById('project_id').value;
                            d.card_no= document.getElementById('card_no').value;
                            d.name= document.getElementById('name').value;
                        }
                    } ,
                    "language": {
                        "sProcessing": "<img src='{{url('assets/images/loading.gif')}}'>"
                    },
                    "columns": [
                        {
                            orderable: false,
                            'render': function () {
                                return '';
                            }
                        },
                        {'data': 'customer.card_no', 'name': 'customer_id'},
                        {'data': 'customer.name', 'name': 'customer_id'},
                        {'data': 'customer.gettype.name', 'name': 'customer_id'},
                        {'data': 'project.name', 'name': 'project_id'},
                        {'data': 'created_at', 'name': 'created_at'},
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
                              oTable.ajax.reload();
                          }

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