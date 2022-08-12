
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
                {!! Form::open(['method'=>'post','url'=>url($route) , 'id'=>'add_form'])!!}

                    <div class="form-body" style="padding: 10px;">
                        <div class="row" style="position: relative">
                            <div class="col-md-6">
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
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> الشهر </span>
                                    <input id="month" name="month" type="text" class="form-control searchable">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> السنة </span>
                                    <input id="year" name="year" type="text" class="form-control searchable">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="col-md-3 clearfix ">
                            <div class="btn-search-reset pull-right">
                                <button type="submit"
                                        class="btn green btn-submit-search">حفظ الدفعات
                                </button>
                                <button type="button"
                                        class="btn default btn-reset">الغاء
                                </button>
                            </div>
                        </div>
                    </div>
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

                          $.each(data.responseJSON, function(index, val) {
                             console.log(index+","+val);
                             $('input[name='+index+']').after('<span class="help-block invalid-feedback">'+val+'</span>');
                              toastr.error(val);
                          });
                      })
                  }
                });
              
            });

        });
    </script>
    @endpush
@endsection









