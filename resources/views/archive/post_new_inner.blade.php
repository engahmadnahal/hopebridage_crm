@extends('layouts.index')

@section('content')

    <section class="content">

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i>
                        <span class="caption-subject font-blue-sharp bold"> {{$title}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

{{--                    {!! Form::open(['method'=>'post','url'=>url($route) , 'id'=>'add_form','onsubmit'=>'return validateForm()','class'=>'form-horizontal form-row-seperated'])!!}--}}
                    <form id="add_form" onsubmit="return validateForm()" method="post" action="{{url($route)}}"  class="form-horizontal form-row-seperated">
                        {{ csrf_field() }}
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input name="post_type" id="post_type" value="3" type="hidden">
                        <input name="post_in_out" id="post_in_out" value="1"  type="hidden">
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> رقم القيد </label>
                                <div class="col-md-9">
                                    <input type="text" name="post_no" readonly  class="form-control" placeholder="سيتم ادخاله  تلقائيا">
                                    <input type="hidden" name="post_replay" value="{{isset($post_replay_id) ? $post_replay_id : ''}}" class="form-control" placeholder="سيتم ادخال رقم القيد تلقائيا بعد الحفظ">
                                    <span class="post_no" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ المعاملة</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="post_date" name="post_date" type="text" class="form-control datepicker" value="{{$date}}" data-date-format="yyyy-mm-dd" data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                    </div>
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
                                            <option value="{{$tasn->id}}">{{$tasn->name}}</option>
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
                                        <option value=""> -- اختر درجة الأهمية -- </option>
                                        @foreach($Important as $imp)
                                            <option value="{{$imp->id}}">{{$imp->name}}</option>
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
                                    <input type="text" name="title"  class="form-control" placeholder="عنوان المعاملة" required>
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
                                    <input type="text" name="pian"  class="form-control" placeholder="البيان" required>
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
                                    <input type="text" name="receive_way"  class="form-control" >
                                        <span class="receive_way" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">جوال المراجع</label>
                                <div class="col-md-9">
                                    <input type="text" name="jawwal" class="form-control" >
                                    <span class="jawwal" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">يحتاج الى رد</label>
                                <div class="col-md-9">
                                    <select name="need_answer" id="need_answer"  class="form-control" required>
                                            <option value="1"> {{trans('ar.yes')}} </option>
                                            <option value="2">{{trans('ar.no')}}</option>
                                    </select>
                                    <span class="need_answer" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">المرفقات</label>
                                <div class="col-md-9">
                                    <input type="text" name="attachment" class="form-control" >
                                    <span class="attachment" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">درجة السرية </label>
                                    <div class="col-md-9">
                                        <select name="security" id="security"  class="form-control" required>
                                            <option value=""> -- اختر درجة السرية -- </option>
                                            @foreach($Security as $sec)
                                                <option value="{{$sec->id}}">{{$sec->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="security" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-3">مكان الحفظ</label>
                                    <div class="col-md-9">
                                        <input type="text" name="save_box" class="form-control" >
                                        <span class="save_box" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                    <div class="form-actions" style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary" style="margin-left: 40px;width: 150px;">حفظ
                                        <i class="fa fa-check"></i>
                                        </button>
                                        <button type="reset" class="btn btn-red" style="width: 150px;">                                            الغاء
                                        <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>

                    </div>
                {{--{!! Form::close() !!}--}}
                <!-- END FORM-->
                    </form>
                </div>
            </div>

        <div id="proc_img_div" align="center"></div>

    </section>
    @push('js')
    <script>
        $(document).ready(function () {
            $('#post_in_out').change(function(){
                getJeha();
            });
            $('#post_type').change(function(){
                getJeha();
            });
            function getJeha(){
                $('#jeha_from').empty();
                $('#jeha_to').empty();
                // بريد داخلي يستدعي الجهات الداخلية للمرسل والمستقبل
                if(document.getElementById('post_in_out').value==1)
                {
                    $.ajax({
                        url:  '{{url("getJeha")}}',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            for (var i = 0; i < response.items_in.length ; i++) {
                                $('#jeha_from').append('<option value='+response.items_in[i].id+' >'+response.items_in[i].name+'</option>');
                                $('#jeha_to').append('<option value='+response.items_in[i].id+' >'+response.items_in[i].name+'</option>');
                            }
                        },
                        contentType: false,
                        processData: false,
                    });
                }
                // بريد صادر خارجي
                // يستدعي الجهات الداخلية للمرسل والجهات الخارجية للمستقبل
                if((document.getElementById('post_in_out').value==2) && (document.getElementById('post_type').value==1))
                {
                    $.ajax({
                        url:  '{{url("getJeha")}}',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            for (var i = 0; i < response.items_in.length ; i++) {
                                $('#jeha_from').append('<option value='+response.items_in[i].id+' >'+response.items_in[i].name+'</option>');
                            }
                            for (var i = 0; i < response.items_out.length ; i++) {
                                $('#jeha_to').append('<option value='+response.items_out[i].id+' >'+response.items_out[i].name+'</option>');
                            }
                        },
                        contentType: false,
                        processData: false,
                    });
                }
                // بريد وارد خارجي
                // يستدعي الجهات الخارجية للمرسل والجهات الداخلية للمستقبل
                if((document.getElementById('post_in_out').value==2) && (document.getElementById('post_type').value==2))
                {
                    $.ajax({
                        url:  '{{url("getJeha")}}',
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            for (var i = 0; i < response.items_in.length ; i++) {
                                $('#jeha_to').append('<option value='+response.items_in[i].id+' >'+response.items_in[i].name+'</option>');
                            }
                            for (var i = 0; i < response.items_out.length ; i++) {
                                $('#jeha_from').append('<option value='+response.items_out[i].id+' >'+response.items_out[i].name+'</option>');
                            }
                        },
                        contentType: false,
                        processData: false,
                    });
                }

            }


           function validateForm()
           {

                bootbox.confirm('تأكيد الحفظ !!',function (res) {
                    if(res){
                        document.getElementById("proc_img_div").innerHTML="<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                        return true;
                    }
                });

            }

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
                                    $('input[name='+index+'].span').after('<span>'+val+'</span>');

                                });
                            })
                    }
                });
            });

        });
    </script>
    @endpush
@endsection









