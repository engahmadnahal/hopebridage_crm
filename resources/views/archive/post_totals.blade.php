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
                                        <button type="reset"
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

                    <th> م </th>
                    <th> الجهة </th>
                    <th> العدد </th>

                </tr>
                </thead>
            </table>
        </div>
        <div id="proc_img_div" align="center"></div>
    </section>
    @push('js')

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
                    searching: false,
                    info: true,
                    "ajax":{
                        url:url,
                        data: function(d) {
                            d.from_date= document.getElementById('from_date').value;
                            d.to_date= document.getElementById('to_date').value;
                        }
                    } ,
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
                        {'data': 'jeha.name', 'name': 'jeha_id'},
                        {'data': 'total', 'name': 'total'},

                    ],
                    "fnDrawCallback": function () {
                        oTable.column(0).nodes().each(function (cell, i) {
                            cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                        });
                    },
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
                $('#data_tb').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-success',
                            title: 'تصدير اكسل'
                        },
                        'print'
                    ],
                } );
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