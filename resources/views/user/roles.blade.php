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
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{url($route)}}"  type="button" class="btn btn-default tooltip-one-info"><i class="fa fa-plus"></i> اضافة جديد </a>
                        </div>
                    </div>
                </div>

                <table id="data_tb" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>الرقم </th>
                <th> الاسم </th>
                <th> الحالة </th>
                <th>الاجراء </th>
                </tr>
                </thead>
                </table>
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
                var url =  '{{url($route)}}'+'/All';

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
                        {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                        {'data': 'name', 'name': 'name'},    // first:dataname , second name in database
                        {'data': 'status', 'name': 'status'},
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
                                  $('input[name='+index+']').after('<span>'+val+'</span>');

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
                                  $('input[name='+index+']').after('<span>'+val+'</span>');

                                });
                            })
                    }
                });
            });

        });
    </script>
    @endpush
@endsection









