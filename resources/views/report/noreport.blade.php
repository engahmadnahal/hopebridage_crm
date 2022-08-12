
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
                <form action="#" class="horizontal-form">

                    <div class="form-body" style="padding: 10px;">
                        <div class="row" style="position: relative">
                            <div class="col-md-9">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect">لم يستفيد من المشروع التالي </span>
                                    <select data-column="1" name="project_id" id="project_id" class="bs-select form-control searchableList" multiple>
                                        <option value="">اختر المشروع</option>
                                        @foreach($Projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group selectbs-wlbl">
                                    <span class="lblselect"> نوع الطلب </span>
                                    <select data-column="1" name="type" id="type" class="bs-select form-control searchableList">
                                        <option value="">اختر نوع الطلب</option>
                                        @foreach($Types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @include('customers.filter',['type'=>1])
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label col-md-3">رقم الملف</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" id="customer_id" class="form-control searchable" placeholder="من">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="customer_id_to" class="form-control searchable" placeholder="الى">
                                        </div>
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
                                {{--<label><input type="checkbox"  />  تحديد الكل  </label>--}}
                                <label class="">
                                    <input type="checkbox" class="mycheckbox pcheckbox" id="selectall" onClick="selectAll(this)" value="0">

                                    <i class="fa fa-check"></i><span class="label-checkbox marginR5">تحديد الكل</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="portlet-body collapse-body form">
                {!! Form::open(['method'=>'post','url'=> url($route) , 'id'=>'add_form','class'=>'form-horizontal form-row-seperated'])!!}
                <table id="data_tb" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>الرقم </th>
                        <th>رقم الملف </th>
                        <th>الهوية </th>
                        <th> اسم المستفيد </th>
                        <th> الجوال </th>
                        <th> المحافظة</th>
                        <th>نوع الحالة </th>
                        <th> التقييم </th>
                        <th> مرات الاستفادة </th>
                        <th>الاجراء </th>
                    </tr>
                    </thead>
                </table>
                <div class="form-body" style="padding: 10px;">
                    <div class="row" style="position: relative">
                        <div class="col-md-12">
                            <div class="form-group selectbs-wlbl">
                                <span class="lblselect">المشروع الذي سيستفيد منه </span>
                                <select data-column="1" name="apply_project_id" id="apply_project_id" class="bs-select form-control" required>
                                    <option value="">اختر المشروع</option>
                                    @foreach($Projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3">ملاحظة </label>
                                <div class="col-md-9">
                                    <input type="text" name="note" class="form-control" placeholder="ملاحظات" >
                                    <span class="house_shower" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="margin-top: 10px;">
                    <div class="row">
                        <div class="col-md-9" style="margin-right: 40px;">
                            <button type="submit" class="btn btn-primary" style="width: 150px;">  حفظ   <i class="fa fa-check"></i> </button>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div id="proc_img_div" align="center"></div>
        </div>


    </section>
    @push('js')

        <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="portlet-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span1
                                        aria-hidden="true">&times;</span1></button>
                            <span class="caption-subject font-purple-soft bold uppercase">المشاريع التي استفاد منها</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table id="project_tb" dir="rtl" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> م </th>
                                    <th>المشروع </th>
                                    <th> التاريخ </th>
                                </tr>
                                </thead>
                                <tbody id="projects_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" dir="rtl">
                        <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق  <i class="fa fa-close"></i>   </a>
                    </div>
                </div>
            </div>
        </div>



        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <script>
            function selectAll(source) {
                checkboxes = document.getElementsByName('selCustomer[]');
                for(var i in checkboxes)
                    checkboxes[i].checked = source.checked;
            }

            $('#project_id').select2({placeholder:'اختر المشروع'});
            $('#project_id').change(function () {
                // console.log(document.getElementById('project_id').children('option:checked'));
            });

            $(document).on('click', '#project_count', function (e){
                e.preventDefault();

                var url =$(this).attr('href');

                if ($.fn.DataTable.isDataTable("#project_tb")) {
                    $('#project_tb').DataTable().clear().destroy();
                }

                $.ajax(url,{

                }).done(function (data) {
                    $('#projects_body').html(data);
                    $('#project_model').modal('show');

                });


            });



            $(document).ready(function () {
                var oTable;
                $("#myDIV").show();
                $("#myDIV .form-actions").hide();

                bootbox.addLocale('ar', {
                    CONFIRM: 'موافق',
                    OK:'نعم',
                    CANCEL:'الغاء'
                });

                bootbox.setLocale('ar');

                $(function () {
                    var url =  '{{url("Report/NoNeedCustomerData")}}';

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
                            { width: 150, targets: 0 },
                            { width: 40, targets: 6 },
                            { width: 50, targets: 5 }
                        ],
                        buttons: [
                            {
                                extend: 'excel',
                                text: 'تصدير اكسل',
                                className: 'btn-success',
                                title: 'تصدير اكسل'

                            }
                        ],
                        fixedColumns: true,
                        "ajax":{
                            url:url,
                            data: function(d) {
                                d.project_id= getSelectValues(document.getElementById('project_id'));
                                d.name= document.getElementById('name').value;
                                d.card_no= document.getElementById('card_no').value;
                                d.file_no= document.getElementById('file_no').value;
                                d.total= document.getElementById('total').value;
                                d.total_to= document.getElementById('total_to').value;
                                d.child_no= document.getElementById('child_no').value;
                                d.child_no_to= document.getElementById('child_no_to').value;
                                d.state= document.getElementById('state').value;
                                d.region= document.getElementById('region').value;
                                d.housetype= document.getElementById('housetype').value;
                                d.material= document.getElementById('material').value;
                                d.type= document.getElementById('type').value;
                                d.customer_id= document.getElementById('customer_id').value;
                                d.customer_id_to= document.getElementById('customer_id_to').value;


                                d.beneficiary_count= document.getElementById('beneficiary_count').value;
                                d.beneficiary_count_to= document.getElementById('beneficiary_count_to').value;

                                d.citizin= document.getElementById('citizin').value;
                                d.region_type= document.getElementById('region_type').value;
                                d.main_reason= document.getElementById('main_reason').value;
                                d.education= document.getElementById('education').value;
                                d.work= document.getElementById('work').value;
                                d.work_region= document.getElementById('work_region').value;


                                d.child_university= document.getElementById('child_university').value;
                                d.child_special= document.getElementById('child_special').value;
                                d.work_day_no= document.getElementById('work_day_no').value;
                                d.rejection = document.getElementById('rejection').value;
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
                            {'data': 'file_no', 'name': 'file_no'},
                            {'data': 'card_no', 'name': 'card_no'},
                            {'data': 'name', 'name': 'name'},
                            {'data': 'mobile', 'name': 'mobile'},
                            {'data': 'getstate.name', 'name': 'state_id'},
                            {'data': 'gettype.name', 'name': 'type'},
                            {'data': 'total_perc', 'name': 'total_perc'},
                            {'data': 'projects_count', 'name': 'projects_count'},
                            // {'data': 'customer_id', 'name': 'customer_id'},
                            {'data': 'action', 'name': 'action', 'orderable': false}
                        ],
                        "fnDrawCallback": function () {
                            oTable.column(0).nodes().each(function (cell, i) {
                                cell.innerHTML = (parseInt(oTable.page.info().start)) + i + 1;
                            });
                        }

                    });
                });



                $('.btn-submit-search').click(function () {
                    oTable.ajax.reload();
                });


                $('#add_form').submit(function (e) {
                    e.preventDefault();
                    //  oTable.order( [ 1, 'asc' ] ).draw();

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
                                        oTable.ajax.reload();
                                    }

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
                function getSelectValues(select) {
                    var result = [];
                    var options = select && select.options;
                    var opt;

                    for (var i=0, iLen=options.length; i<iLen; i++) {
                        opt = options[i];

                        if (opt.selected) {
                            result.push(opt.value || opt.text);
                        }
                    }
                    return result;
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
                            $('#sponser_id_up').val(response.items.sponser_id);
                            $('#description_up').val(response.items.description);
                            $('#id_up').val(response.items.id);
                            // document.getElementById("status_up").value = response.items.status;
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
                    success: function(response){
                        oTable.ajax.reload();
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
    @endpush
@endsection