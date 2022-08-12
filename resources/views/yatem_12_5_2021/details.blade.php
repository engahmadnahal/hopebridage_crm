@extends('layouts.index')

@section('content')

    <section class="content">
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye font-purple-soft"></i>
                    <span class="caption-subject font-purple-soft bold uppercase">بيانات الكفالة</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row" >
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم اليتيم </label>
                            <div class="col-md-9">
                                <input type="text" name="child_name" value="{{$yatem->child->name}}" class="form-control">
                                <input type="hidden" id="child_id" value="{{$yatem->child->id}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label col-md-3">المشروع </label>
                            <div class="col-md-9">
                                <input type="text" name="project_name" value="{{$yatem->project->name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">مبلغ الكفالة </label>
                            <div class="col-md-9">
                                <input type="text" name="" value="{{$yatem->salary}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">العملة </label>
                            <div class="col-md-9">
                                <input type="text" name="currency" value="{{$yatem->currency}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">البنك </label>
                            <div class="col-md-9">
                                <input type="text" name="bank" value="{{$yatem->bank}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">تاريخ الكفالة</label>
                            <div class="col-md-9">
                                <input type="text" name="start_dt" value="{{$yatem->start_dt}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                <div class="row" >
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم الام </label>
                            <div class="col-md-9">
                                <input type="text" name="child_not_working" value="{{$yatem->customer->second_father}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">هوية الام </label>
                            <div class="col-md-9">
                                <input type="text" name="currency" value="{{$yatem->customer->card_no_wife}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">المحاقظة </label>
                            <div class="col-md-9">
                                <input type="text" name="project_name" value="{{$yatem->customer->getstate->name}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">الجوال </label>
                            <div class="col-md-9">
                                <input type="text" name="bank" value="{{$yatem->customer->mobile}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">عدد افراد الاسرة</label>
                            <div class="col-md-9">
                                <input type="text" name="start_dt" value="{{$yatem->customer->child_no}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-3">تاريخ الوفاة</label>
                            <div class="col-md-9">
                                <input type="text" name="start_dt" value="{{$yatem->customer->death_date}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">العنوان</label>
                            <div class="col-md-9">
                                <input type="text" name="start_dt" value="{{$yatem->customer->address}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="form-actions" style="margin-top: 10px;">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-9" style="margin-right: 40px;">--}}
                        {{--<a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">طباعة</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div><hr>
        <table id="data_tb" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>م </th>
                <th>المشروع </th>
                <th>الشهر </th>
                <th> السنة </th>
                <th> مبلغ الكفالة </th>
                <th> العملة </th>
                {{--<th>الاجراء </th>--}}
            </tr>
            </thead>
        </table>
        {{--<div class="portlet light portlet-fit bordered">--}}
            {{--<div class="portlet-body">--}}
                    {{----}}
            {{--</div>--}}
        {{--</div>--}}
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
                var url =  "{{url('OrphanSalary')}}"+"/"+document.getElementById('child_id').value;;

                if ($.fn.DataTable.isDataTable("#data_tb")) {
                    $('#data_tb').DataTable().clear().destroy();
                }

                oTable = $("#data_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: false,
                    searching: false,
                    info: false,
                    columnDefs: [
                        // { width: 50, targets: 8 },
                    ],
                    fixedColumns: true,
                    "ajax":{
                        url:url,
                        data: function(d) {
                            // d.date_from= document.getElementById('date_from').value;
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
                        {'data': 'project.name', 'name': 'project_id'},
                        {'data': 'month', 'name': 'month'},
                        {'data': 'year', 'name': 'year'},
                        {'data': 'salary', 'name': 'salary'},
                        {'data': 'currency', 'name': 'currency'},
                    ],
                    "fnDrawCallback": function () {
                        oTable.column(0).nodes().each(function (cell, i) {
                            cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                        });
                    }

                });
            });

        });

    </script>
    @endpush
@endsection
