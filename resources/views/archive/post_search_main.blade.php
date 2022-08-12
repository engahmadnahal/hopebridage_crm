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
                <div class="portlet box green package-form-rg">
                    <div class="portlet-title myptitle">
                        <div class="caption">
                            <i class="fa fa-search"></i>بحث
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="expand mycollapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body collapse-body form">
                        <form action="#" class="horizontal-form">

                            <div class="form-body" style="padding: 10px;">
                                <div class="row" style="position: relative">
                                    <div class="col-md-4">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">رقم المعاملة</span>
                                            <input data-column="0" type="text" class="form-control searchable"
                                                   placeholder="" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group selectbs-wlbl">
                                            <span class="lblselect">الجهة المرسلة</span>
                                            <select data-column="4" class="bs-select form-control searchableList">
                                                <option value=""> اختر الجهة</option>
                                                @foreach($JehaIn as $mainjeha)
                                                    <option value="{{ $mainjeha->id }}">{{ $mainjeha->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group selectbs-wlbl">
                                            <span class="lblselect">الجهة المستقبلة</span>
                                            <select data-column="5" class="bs-select form-control searchableList">
                                                <option value=""> اختر الجهة</option>
                                                @foreach($JehaIn as $mainjeha)
                                                    <option value="{{ $mainjeha->id }}">{{ $mainjeha->name }}</option>
                                                @endforeach
                                            </select>
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
                                                <input id="from_date" name="from_date" type="text" class="form-control datepicker" value="{{$date}}" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-wlbl">
                                            <span class="lblinput">الى</span>
                                            <div class="input-group">
                                                <input id="to_date" name="to_date" type="text" class="form-control datepicker" value="{{$date}}" data-date-format="yyyy-mm-dd" required data-plugin-options='{"autoclose": true}'> <span class="input-group-addon"><i class="list-icon material-icons">date_range</i></span>
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
                </div>
            </div>
            <div class="table-toolbar">
                <div class="row">
                </div>
            </div>
            <table id="data_tb" dir="rtl" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>رقم البريد</th>
                    <th>نوع البريد</th>
                    <th> عنوان المعاملة</th>
                    <th> تاريخ المعاملة</th>
                    <th> الجهة المرسلة</th>
                    <th> الجهة المستقبلة</th>
                    {{--<th> التصنيف</th>--}}
                    <th> الاجراء</th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="proc_img_div" align="center"></div>
        <div class="modal fade" id="action_list" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span1
                                    aria-hidden="true">&times;</span1>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">قائمة الاجراءات السابقة</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="action_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>رقم الاجراء</th>
                                    <th>نوع الاجراء</th>
                                    <th> السبب</th>
                                    <th> ملاحظات</th>
                                    <th> التاريخ</th>
                                    <th> المستخدم</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer" dir="rtl">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> اغلاق <i
                                    class="fa fa-close"></i></button>
                        <button type="button" id="add_new_action" class="btn btn-primary"> اضافة اجراء <i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
    {{--<script src="{{url('')}}/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js" type="text/javascript"></script>--}}

    <script>

        $(document).ready(function () {
            bootbox.addLocale('ar', {
                CONFIRM: 'موافق',
                OK: 'نعم',
                CANCEL: 'الغاء'
            });
            bootbox.setLocale('ar');
            $(function () {
                var url = '{{url($route)}}';
                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: true,
                   columnDefs: [
                       { width: 100, targets: 6 }
                   ],
//                    fixedColumns: false,
                   // "ajax": url,
                    "ajax":{
                        url:url,
                        data: function(d) {
                           // '_token': $('input[name=_token]').val(),
                            d.from_date= document.getElementById('from_date').value;
                            d.to_date= document.getElementById('to_date').value;
                        }
                    } ,
                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'post_no', 'name': 'post_no'},    // first:dataname , second name in database
                        {'data': 'posttype.name', 'name': 'post_type'},
                        {'data': 'title', 'name': 'title'},
                        {'data': 'post_date', 'name': 'post_date'},
                        {'data': 'jehafrom.name', 'name': 'jeha_from'},
                        {'data': 'jehato.name', 'name': 'jeha_to'},
                        // {'data': 'getstatus.name', 'name': 'status_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ],
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },


//                    "scrollY":        "200px",
//                    "scrollCollapse": true
                });
            });

            $('.searchable').change(function () {
                var column = jQuery(this).attr('data-column');
                oTable.columns(column).search(jQuery(this).val()).draw();
            });

            $('.searchableList').change(function () {
                var column = $(this).attr('data-column');
                oTable.columns(column).search($(this).val()).draw();
            });
            $('#from_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
               oTable.draw();
            });

            $('#to_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            }).on('changeDate', function (e) {
               oTable.draw();
            });
            $(document).on('click', '#action_list_btn', function (e) {
                e.preventDefault();

                var url = '{{url('')}}/' + $(this).attr('pull-link') + document.getElementById('post_id_main').value;

                if (document.getElementById('post_id_main').value == "") {
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
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    },
//                    "scrollY":        "200px"
//                    "scrollCollapse": true
                });
            });

            // btn new action on action list modal
            $(document).on('click', '#add_new_action', function (e) {

                $('#action_list').modal('hide');
                $('#action_modal').modal('show');

            });


        });
    </script>
    @endpush
@endsection