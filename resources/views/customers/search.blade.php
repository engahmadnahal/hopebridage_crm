@extends('layouts.index')

@section('content')
    <section class="content">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <button class="btn btn-default" onclick="myFunction()"><i class="fa fa-search"></i></button>
                    <span class="caption-subject font-blue-sharp bold uppercase"> {{$title}}</span>
                </div>
            </div>
            <div class="portlet-body collapse-body form">
                <form action="#" class="horizontal-form">
                    @include('customers.filter')
                </form>
                <div id="proc_img_div" align="center"></div>
            </div>
            <div class="portlet-body form">
                <table id="data_tb" dir="rtl" class="table  table-bordered table-hover table-responsive"
                       style="display: block">
                    <thead>
                    <tr>
                        {{--                        <th style="text-align: center;width: 25px;"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>--}}
                        <th>رقم الطلب</th>
                        <th> النوع</th>
                        <th> اسم المستفيد</th>
                        <th> الهوية</th>
                        <th> المحافظة</th>
                        <th> المنطقة</th>
                        <th> المستخدم</th>
                        <th> عدد مرات الاستفادة</th>
                        <th>سبب رفض (قبول) طلب المستفيد</th>
                        <th width="150px"> الاجراء</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <a name="detail_section"></a>
        </div>
        <div id="detail_contaner" class="portlet light portlet-fit portlet-datatable bordered" style="display: none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-info"></i>

                    <span class="caption-subject font-blue-sharp bold uppercase"> تفاصيل المعاملة </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <div class="tab-content">

                    </div>
                </div>
            </div>
        </div>

        <style>
            #data_tb td:last-child {
                padding: 18px 10px;
            }
        </style>

    </section>


    <!-- Modal -->

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

    <div class="modal" tabindex="-1" role="dialog" id="sendMessageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">نص الرسالة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">نص الرسالة</label>
                        <textarea class="form-control" name="message" cols="3" id="message_text" required></textarea>
                        <p id="optradio1p" class="help-block" style="color:red !important;"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="button" id="sendMessageButton" class="btn btn-primary">ارسال</button>
                </div>

            </div>
        </div>
    </div>
    @push('js')
        <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span1
                                        aria-hidden="true">&times;
                                </span1>
                            </button>
                            <span class="caption-subject font-purple-soft bold uppercase">المشاريع التي استفاد منها</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="project_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> م</th>
                                    <th>المشروع</th>
                                    <th> التاريخ</th>
                                </tr>
                                </thead>
                                <tbody id="projects_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق <i
                                    class="fa fa-close"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).on('click', '#project_count', function (e) {
                e.preventDefault();

                var url = $(this).attr('href');

                if ($.fn.DataTable.isDataTable("#project_tb")) {
                    $('#project_tb').DataTable().clear().destroy();
                }

                $.ajax(url, {}).done(function (data) {
                    $('#projects_body').html(data);
                    $('#project_model').modal('show');

                });


            });

            $(document).ready(function () {
                var oTable;
                var ids = [];

                $('body').on('click', '.reject_btn', function (e) {
                    e.preventDefault();
                    $('#rejectForm').attr('action', $(this).attr('href'));
                    $('#rejectModal').modal('show');
                });

                $('body').on('click', '#sendMessageButton', function (e) {
                    if ($('#message_text').val() == '') {
                        $("#optradio1p").text('يرجى كتابة نص الرسالة');
                        return;
                    } else if (ids.length == 0) {
                        $("#optradio1p").text('يرجى اختيار المستفيدين');
                        return;
                    } else {
                        $("#optradio1p").hide();
                    }
                    console.log(ids);

                    var url = "{{url('Customer/send_message')}}";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            ids: ids,
                            message: $('#message_text').val(),
                            _token: "{{csrf_token()}}"
                        },
                        success: function (response) {
                            console.log(response);
                            toastr.success(response.message);
                            $('#sendMessageModal').modal('hide');
                        }
                    });
                });

                $('body').on('click', '.recovery_btn', function (e) {
                    e.preventDefault();
                    let element = $(this);
                    bootbox.confirm(' هل انت متأكد من استرجاع هذا العنصر !!', function (res) {
                        if (res) {
                            window.location = element.attr('href');
                        }
                    });
                });

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK: 'نعم',
                    CANCEL: 'الغاء'
                });

                bootbox.setLocale('ar');

                $(function () {
                    var url = '{{url('Customer/All')}}';

                    if ($.fn.DataTable.isDataTable("#data_tb")) {
                        $('#data_tb').DataTable().clear().destroy();
                    }


                    oTable = $("#data_tb").DataTable({
                        "processing": true,
                        serverSide: true,
                        paging: true,
                        searching: false,
                        info: true,
                        lengthMenu: [[25, 100, -1], [25, 100, "All"]],
                        pageLength: 25,
                        'columnDefs': [{
                            'targets': 0,
                            'searchable': false,
                            'orderable': false,
                            'className': 'dt-body-center',
                        }],
                        'order': [[1, 'asc']],
                        "ajax": {
                            url: url,
                            data: function (d) {
                                d.name = document.getElementById('name').value;
                                d.card_no = document.getElementById('card_no').value;
                                d.file_no = document.getElementById('file_no').value;
                                d.total = document.getElementById('total').value;
                                d.total_to = document.getElementById('total_to').value;
                                d.child_no = document.getElementById('child_no').value;
                                d.child_no_to = document.getElementById('child_no_to').value;
                                d.beneficiary_count = document.getElementById('beneficiary_count').value;
                                d.beneficiary_count_to = document.getElementById('beneficiary_count_to').value;
                                d.type = document.getElementById('type').value;

                                d.state = document.getElementById('state').value;
                                d.region = document.getElementById('region').value;
                                // d.health= document.getElementById('health').value;
                                d.housetype = document.getElementById('housetype').value;
                                d.material = document.getElementById('material').value;
                                d.citizin = document.getElementById('citizin').value;
                                d.region_type = document.getElementById('region_type').value;
                                d.main_reason = document.getElementById('main_reason').value;
                                d.education = document.getElementById('education').value;
                                d.work = document.getElementById('work').value;
                                d.work_region = document.getElementById('work_region').value;

                                d.child_university = document.getElementById('child_university').value;
                                d.child_special = document.getElementById('child_special').value;
                                d.work_day_no = document.getElementById('work_day_no').value;
                                d.rejection = document.getElementById('rejection').value;

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
                            "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>",
                            "infoEmpty": "لا يوجد نتائج",
                            "zeroRecords": "لا يوجد نتائج للبحث",
                            "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                            "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                            "search": "بحث عن مستفيد (بالاسم او رقم الهوية او رقم الطلب): ",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير",
                            },
                        },
                        "columns": [
                            {'data': 'file_no', 'name': 'file_no'},
                            {'data': 'gettype.name', 'name': 'type'},
                            {'data': 'name', 'name': 'name'},
                            {'data': 'card_no', 'name': 'card_no'},
                            {'data': 'getstate.name', 'name': 'state_id'},
                            {'data': 'getregion.name', 'name': 'region_id'},
                            {'data': 'user.name', 'name': 'user_id'},
                            {'data': 'projects_count', 'projects_count': 'projects_count'},
                            {'data': 'rejection', 'rejection': 'rejection'},
                            {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                        ],
                        "fnDrawCallback": function () {
                            // oTable.column(0).nodes().each(function (cell, i) {
                            //     cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            // });
                        },
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },

                    });

                });


                $('.btn-submit-search').click(function () {
                    oTable.ajax.reload();
                });

                var table = $('#data_tb').DataTable();
                $('#data_tb tbody').on('click', 'tr', function () {
                    $('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                });


                // btn new action on action list modal
                $(document).on('click', '#add_new_action', function (e) {

                    $('#action_list').modal('hide');
                    $('#action_modal').modal('show');

                });

                $(document).on('click', '#action_btn', function (e) {
                    e.preventDefault();
                    // this click from detail group buttons
                    if ($(this).attr('pull-link') == "PosJeha/edit") {

                        if (document.getElementById('id_up').value == "") {
                            $('#action_modal').modal('hide');
                            bootbox.alert("يجب تحديد المعاملة");
                            return false;
                        }
                    }
                    // this button from datatable on the top
                    else {
                        document.getElementById("id_up").value = $(this).attr('pull-link');
                    }

                });


                $('#add_action').submit(function (e) {
                    e.preventDefault();

                    var url = $(this).attr('action') + '/' + document.getElementById('id_up').value;
                    bootbox.confirm(' تأكيد الحفظ !!', function (res) {
                        if (res) {
                            $.ajax({
                                'url': url,
                                'type': 'post',
                                'datatype': 'json',
                                'data': $('#add_action').serializeArray(),
                            })
                                .done(function (response) {
                                    toastr.success(response.message);
                                    $('#action_modal').modal('hide');
                                    oTable.ajax.reload();
                                })
                                .fail(function (data) {
                                    $.each(data.responseJSON, function (index, val) {
                                        console.log(index + "," + val);
                                        $('input[name=' + index + '].span').after('<span>' + val + '</span>');

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


                // get js.blade function

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
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#region").empty();
                        $("#region").append("<option>اختر المنطقة</option>");
                        $.each(data.states, function (key, value) {
                            $("#region").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                });
            }
        </script>
        <script>
            function myFunction() {
                var x = $("#myDIV");
                if (x.is(":hidden")) {
                    x.show();
                } else {
                    x.hide();
                }
            }

        </script>
    @endpush
    @extends('archive.js')
@endsection