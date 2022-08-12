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
                <div class="form-package">
                    {!! Form::open(['class'=>'form-validation',"id"=>"form"]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">

                                <div class="tab-content tabcontent-noborder">
                                    <div class="tab-pane active">
                                        <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-globe"></i>اسم المجموعة
                                                </div>
                                            </div>
                                            <div class="portlet-body collapse-body form">
                                                <div class="horizontal-form">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group input-wlbl">
                                                                    <span class="lblinput">الاسم</span>
                                                                    <input name="name" type="text" value="{{ $result->name }}"
                                                                           class="form-control txtnotnumber txtinput-required"
                                                                           data-validation="{{ $cp_route_name.$route }}/validateInput/{{ $result->id or "" }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group input-wlbl">
                                                                    <span class="lblinput lblinputtop">تاريخ الانشاء</span>
                                                                    <div class="input-group">
                                                                        <input type="text" value="{{ $created_at }}" readonly
                                                                               class="form-control">
                                                                        <span class="input-group-addon"><i
                                                                                    class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">الحالة</label>
                                                                    <div class="col-md-9">
                                                                        <input name="status" value="1" type="checkbox"
                                                                               {{ $result->status?"checked":"" }}
                                                                               class="make-switch"
                                                                               data-on-text="&nbsp;{{ trans("cp.active") }}&nbsp;"
                                                                               data-off-text="&nbsp;{{ trans("cp.inactive") }}&nbsp;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @include("user.roles_permission")
                                    </div>
                                </div>
                                <div class="form-top tabbable-line clearfix">
                                    <div class="actions">
                                        <button id="save-close-btn" type="submit"
                                                class="btn btn-articlesave btn-primary tooltip-one-info">حفظ
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <a href="{{$route}}/role"
                                           class="btn btn-default tooltip-one-info">الغاء
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div id="proc_img_div" align="center"></div>
        </div>




    </section>
    @push('js')
    <script src="{{url('')}}/assets/js/checkbox.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/js/validation.js" type="text/javascript"></script>
    <script type="application/javascript">

            $(document).ready(function () {


                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK:'نعم',
                    CANCEL:'الغاء'
                });

                bootbox.setLocale('ar');


                $('#form').submit(function (e) {
                    e.preventDefault();

                    var url=$(this).attr('action');
                    bootbox.confirm('تأكيد الحفظ !!',function (res) {
                        if(res){
                            $.ajax({
                                'url':url,
                                'type':'post',
                                'datatype':'json',
                                'data':$('#form').serializeArray(),
                            })
                                .done(function(response) {
                                    toastr.success(response.message);
                                    document.getElementById("form").reset();

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
            });
        </script>


    @endpush
@endsection









