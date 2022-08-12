@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="row">

        </div>

        <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>
            <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
            </div>
        </div>
        <div class="portlet-body form">
            <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>رقم البريد </th>
                    <th>نوع البريد </th>
                    <th>  عنوان المعاملة </th>
                    <th> تاريخ المعاملة </th>
                    <th> مصدر المعاملة </th>
                    <th> الجهة المحولة </th>
                    <th> الحالة </th>
                    <th> الاجراء </th>
                </tr>
                </thead>
            </table>

        </div>
            <div id="proc_img_div" align="center"></div>

            <div class="portlet light bordered" style="border: 1px solid white !important;">

                    <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>
                        <span class="caption-subject font-blue-sharp bold uppercase"> تفاصيل المعاملة </span>
                    </div>
                </div>
                <div class="portlet-body form" >
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">  نوع البريد </label>
                                <div class="col-md-9">
                                    <input name="post_type" id="post_type" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label col-md-3">عنوان المعاملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="title" id="title" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> رقم البريد </label>
                                <div class="col-md-9">
                                    <input type="text" name="post_no" id="post_no" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label col-md-3"> البيان </label>
                                <div class="col-md-9">
                                    <input type="text" name="pian" id="pian" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">داخلي/خارجي</label>
                                <div class="col-md-9">
                                    <input name="post_in_out" id="post_in_out" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">مصدر المعاملة</label>
                                <div class="col-md-9">
                                    <input name="jeha_from" id="jeha_from" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">حالة المعاملة</label>
                                <div class="col-md-9">
                                    <input name="status" id="status" value="" class="form-control" style="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">يحتاج الى رد</label>
                                <div class="col-md-9">
                                    <input type="text" name="need_answer" id="need_answer" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تاريخ المعاملة</label>
                                <div class="col-md-9">
                                    <input type="text" name="post_date" id="post_date" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">تصنيف المعاملة </label>
                                <div class="col-md-9">
                                    <input type="text" name="Tasneef"  id="Tasneef" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3"> درجة الاهمية </label>
                                <div class="col-md-9">
                                    <input name="importent" id="importent" value="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label col-md-3">جوال المراجع</label>
                                <div class="col-md-9">
                                    <input type="text" name="jawwal" id="jawwal" class="form-control" readonly>
                                    <input type="hidden" name="post_id" id="post_id" value="">
                                    <input type="hidden" name="jeha_id" id="jeha_id" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="portlet box green">
                    <div class="portlet-body form">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6" style="margin: 10px;">
                                            <a href="#action_list" data-toggle="modal" pull-link="PosAction/jeha/" class="btn btn-success" id="action_list_btn"> الاجراءات السابقة <i class="fa fa-angle-double-left"></i> </a>
                                            <a href="#action_modal" data-toggle="modal" pull-link="PosJeha/edit" class="btn btn-success" id="action_btn"> اضافة اجراء <i class="fa fa-plus"> </i> </a>
                                            <a href="#refer_modal" data-toggle="modal"  class="btn btn-success" id="refer_btn"> تحويل المعاملة <i class="fa fa-share"> </i></a>
                                            <a href="#action_modal" data-toggle="modal"  class="btn btn-success" id="action_btn">اضافة اجراء</a>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="action_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <h4 class="modal-title" id="exampleModalLabel">تعديل أمر اداري</h4>
                        </div>
                        {!! Form::open(['method'=>'post','url'=>url($route.'/update') , 'id'=>'add_action']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> حالة المعاملة  </label>
                                        <div class="col-md-9">
                                            <select name="select_status" id="select_status" class="form-control">
                                                <option value=""> -- اختر الاجراء  -- </option>
                                                @foreach($statuses as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الاجراء</label>
                                        <div class="col-md-9">
                                            <select name="action" id="action" class="form-control">
                                                <option value=""> -- اختر الاجراء  -- </option>
                                                @foreach($actions as $action)
                                                    <option value="{{$action->id}}">{{$action->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="id_up" name="id_up" value="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label col-md-3">  توضيح الاجراء  </label>
                                    <div class="col-md-9">
                                        <input type="text" name="reason" id="reason" class="form-control">

                                    </div>
                                   </div>
                                </div>
                             </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> ملاحظات  </label>
                                        <div class="col-md-9">
                                            <input type="text" name="note" id="note" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" dir="rtl">
                            <button type="button" class="btn btn-default" data-dismiss="modal">  اغلاق <i class="fa fa-close"></i></button>
                            <button type="submit" class="btn btn-primary"> حفظ <i class="fa fa-check"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        <div class="modal fade" id="action_list" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">قائمة الاجراءات السابقة</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="action_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>رقم الاجراء </th>
                                    <th>نوع الاجراء </th>
                                    <th>  السبب </th>
                                    <th> ملاحظات </th>
                                    <th> التاريخ </th>
                                    <th> المستخدم </th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> اغلاق <i class="fa fa-close"></i></button>
                        <button type="button" id="add_new_action" class="btn btn-primary"> اضافة اجراء <i class="fa fa-plus"></i></button >
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="refer_modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                    aria-hidden="true">&times;</span1></button>
                        <h4 class="modal-title" id="exampleModalLabel">تحويل البريد للاقسام والموظفين </h4>
                    </div>
                    {!! Form::open(['method'=>'post','url'=>url($route.'/refer_dept') , 'id'=>'refer_form']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="" id="post_id_ref" name="post_id_ref">
                                <input type="hidden" value="" id="post_dept_id" name="post_dept_id">
                                <div class="form-group">
                                    <laable class="form-group"> الاقسام <i class="fa fa-user"></i></laable>
                                    <ul>
                                    @if(isset($depts))
                                        @foreach($depts as $dept)
                                                <li>
                                                    <label><input type="checkbox" class="dept_refered" name="dept_refereds[]" value="{{$dept->id}}"> {{$dept->name}}</label>
                                                </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <laable class="form-group"> الموظفين <i class="fa fa-user"></i></laable>
                                    <ul>
                                    @if(isset($users))
                                        @foreach($users as $user)
                                                <li>
                                                    <label><input type="checkbox" class="user_refered" name="user_refereds[]" value="{{$user->id}}"> {{$user->name}}</label>
                                                </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ التحويل</button>
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
                var url ='{{url('PosJeha/new')}}';

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").removeAttr('width').DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: false,
                    searching: false,
                    info: false,
                    columnDefs: [
                        { width: 175, targets: 7 }
                    ],
                    fixedColumns: false,
                    "ajax": url,

                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'post_id', 'name': 'post_id'},    // first:dataname , second name in database
                        {'data': 'post.posttype.name', 'name': 'post_id'},
                        {'data': 'post.title', 'name': 'post_id'},
                        {'data': 'post.post_date', 'name': 'post_id'},
                        {'data': 'post.jehafrom.name', 'name': 'post_id'},
                        {'data': 'jehafrom.name', 'name': 'jeha_from_id'},
                        {'data': 'getstatus.name', 'name': 'status'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ],
//                    "scrollY":        "200px"
//                    "scrollCollapse": true
                });
            });

            var table = $('#data_tb').DataTable();
            $('#data_tb tbody').on( 'click', 'tr', function () {
                    $('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
            });

            $(document).on('click', '#action_list_btn', function (e) {
                e.preventDefault();

                var url = $(this).attr('pull-link') + document.getElementById('post_id').value;

                if( document.getElementById('post_id').value =="")
                {
                    $('#action_list').modal('hide');
                    bootbox.alert("يجب تحديد المعاملة");
                    return false;
                }

                if ($.fn.DataTable.isDataTable("#action_tb")) {
                    $('#action_tb').DataTable().clear().destroy();
                }
                oTable = $("#action_tb").DataTable({
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
                        {'data': 'action.name', 'name': 'action_id'},
                        {'data': 'reason', 'name': 'reason'},
                        {'data': 'note', 'name': 'note'},
                        {'data': 'created_at', 'name': 'created_at'},
                        {'data': 'user.name', 'name': 'user_id'},
                    ],
//                    "scrollY":        "200px"
//                    "scrollCollapse": true
                });
            });

            // btn new action on action list modal
            $(document).on('click', '#add_new_action', function (e) {

                $('#action_list').modal('hide');
                $('#action_modal').modal('show');

            });

            // btn new action on action list modal
            $(document).on('click', '#refer_btn', function (e) {

                if( document.getElementById('id_up').value =="")
                {
                    $('#refer_modal').modal('hide');
                    bootbox.alert("يجب تحديد المعاملة");
                    return false;
                }

            });

                $(document).on('click', '#action_btn', function (e) {
                e.preventDefault();

                var url="";
                // this click from detail group buttons
                if($(this).attr('pull-link') == "PosJeha/edit"){

                    if(document.getElementById('id_up').value =="")
                    {
                        $('#action_modal').modal('hide');
                        bootbox.alert("يجب تحديد المعاملة");
                        return false;
                    }
                    url = $(this).attr('pull-link')+'/'+document.getElementById('id_up').value;

                }
                // this button from datatable on the top
                else { url= $(this).attr('pull-link'); }

                        $.ajax({
                            'url': url,
                            'type': 'get',
                            'dataType': 'json',
                            success: function (response) {
                                console.log(response);
                                document.getElementById("action").selectedIndex = response.items.action;
                                document.getElementById("select_status").selectedIndex = response.items.status;
                                document.getElementById("reason").value = response.items.reason;
                                document.getElementById("note").value = response.items.note;

                            },
                            error: function (xhr) {
                            }
                        })
                });

            $(document).on('click', '#post_show', function () {
                var url = $(this).attr('pull-link');
                document.getElementById("proc_img_div").innerHTML="<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                $.ajax({
                    'url': url,
                    'type': 'get',
                    'dataType': 'json',
                    success: function (response) {
                       // console.log(response);
                        //remove loading icon
                        document.getElementById("proc_img_div").innerHTML="";
                       // view retured data
                        document.getElementById("post_type").value = response.items.post.posttype.name;
                        document.getElementById("status").value = response.items.getstatus.name;
                        document.getElementById("post_no").value = response.items.post.post_no;
                        document.getElementById("post_id").value = response.items.post.id;
                        document.getElementById("jeha_from").value = response.items.post.jehafrom.name;
                        document.getElementById("post_date").value = response.items.post.post_date;
                        document.getElementById("pian").value = response.items.post.pian;
                        document.getElementById("title").value = response.items.post.title;
                        document.getElementById("Tasneef").value = response.items.post.post_tasneef.name;
                        document.getElementById("post_in_out").value = response.items.post.post_in_out.name;
                        document.getElementById("importent").value = response.items.post.importent.name;
                        document.getElementById("jawwal").value = response.items.post.jawwal;
                        document.getElementById("need_answer").value = (response.items.post.need_answer==1 ? "نعم" : "لا");
//                        document.getElementById("attachment").value = response.items.post.attachment;
//                        document.getElementById("receive_way").value = response.items.post.receive_way;

                        // Used for hidden inputs
                        document.getElementById("id_up").value = response.items.id;
                        document.getElementById("jeha_id").value = response.items.jeha_id;
                        document.getElementById("post_id_ref").value = response.items.post.id;
                        document.getElementById("post_dept_id").value = response.items.id;

                        if(response.items.status != 3)
                            document.getElementById("status").style="background-color:#f28c89";
                        else
                            document.getElementById("status").style="background-color: #d8f99f";

                    },
                    error: function (xhr) {

                    }
                })
            });

            $('#add_action').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action')+'/'+document.getElementById('id_up').value;
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#add_action').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#action_modal').modal('hide');
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

            $('#refer_form').submit(function(e){
                e.preventDefault();

                var url=$(this).attr('action');
                bootbox.confirm(' تأكيد الحفظ !!',function (res) {
                    if(res){
                        $.ajax({
                            'url':url,
                            'type':'post',
                            'datatype':'json',
                            'data':$('#refer_form').serializeArray(),
                        })
                            .done(function(response) {
                                toastr.success(response.message);
                                $('#refer_modal').modal('hide');
                            })
                            .fail(function(data) {
                                $.each(data.responseJSON, function(index, val) {
                                    console.log(index+","+val);

                                });
                            })
                    }
                });
            });

        });
    </script>
    @endpush
@endsection