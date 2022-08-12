@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="portlet light portlet-fit portlet-datatable bordered">
        <div class="portlet-title">
                    <div class="caption">
                        <i class="list-icon feather feather-settings"></i> {{$title}}  </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    {!! Form::open(['method'=>'post','url'=>url($route) ,'files'=> true ,'id'=>'add_form' ,'class'=>'form-horizontal'])!!}
                    <div class="portlet-body form">

                     <div class="form-body">
                         
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  اسم المؤسسة </label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{isset($data->name) ? $data->name : ''}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  اسم النظام </label>
                                <div class="col-md-9">
                                    <input type="text" name="sys_name" value="{{isset($data->sys_name) ? $data->sys_name : ''}}"  class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  العنوان </label>
                                <div class="col-md-9">
                                    <input type="text" name="address" value="{{isset($data->address) ? $data->address : ''}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  الجوال </label>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" value="{{isset($data->mobile) ? $data->mobile : ''}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  الهاتف </label>
                                <div class="col-md-9">
                                    <input type="text" name="phone" value="{{isset($data->phone) ? $data->phone : ''}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  الموقع </label>
                                <div class="col-md-9">
                                    <input type="text" name="site" value="{{isset($data->site) ? $data->site : ''}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  الايميل </label>
                                <div class="col-md-9">
                                    <input type="text" name="email" value="{{isset($data->email) ? $data->email : ''}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">  شعار المؤسسة </label>

                                    <div class="col-md-9 form-group" style="text-align: center">
                                        <input name="file" id="file" type="file" multiple="" class="btn btn-success" />
                                    </div>

                            </div>
                        </div>
                    </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                         <div class="col-md-9 form-group" style="text-align: center">
                                         <img src="{{url("uploads/news/sub/".$data->img_name)}}">        </div>

                                 </div>
                             </div>
                         </div>
                    </div>
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary"> حفظ <i class="fa fa-check"></i> </button>
                                    <button type="reset" class="btn btn-default"> الغاء <i class="fa fa-close"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> </div>
                    </div>
                </div>
                    </div>
            {!! Form::close() !!}
            <!-- END FORM-->
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


        $('#add_form').submit(function (e) {
               e.preventDefault();

               var url=$(this).attr('action');
                var formData = new FormData(this);
                bootbox.confirm('تأكيد الحفظ !!',function (res) {
                  if(res){
                      $.ajax({
                          'url':url,
                          'type':'post',
                          // 'datatype':'json',
                          'data':formData,
                          cache: false,

                          contentType: false,
                          processData: false,
                      })
                          .done(function(response) {
                              toastr.success(response.message);
                            // document.getElementById("add_form").reset();
                            //  oTable.ajax.reload();
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
                        document.getElementById("status_up").value = response.items.status;
                        document.getElementById('select_jeha').value=response.items.jeha_id;;
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









