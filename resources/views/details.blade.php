    <section class="content">
        @if (!isset($stage))
            <div class="widget-list row">
                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">رقم الملف</p><span
                                                class="counter-title color-primary"><span
                                                    class="counter">#</span> </span>
                                        <!-- /.counter-title --> <span class="counter-difference text-success"> </span>
                                        <div class="mr-t-20"><span data-toggle="sparklines" data-height="15"
                                                                   data-width="70"
                                                                   data-line-color="#1976d2" data-line-width="3"
                                                                   data-spot-radius="1" data-fill-color="rgba(0,0,0,0)"
                                                                   data-spot-color="undefined"
                                                                   data-min-spot-color="undefined"
                                                                   data-max-spot-color="undefined"
                                                                   data-highlight-line-color="undefined"><!-- 10,5,7,8,3,0,4,12,10,8,12 --></span>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-user-plus bg-primary"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">التقييم</p><span
                                                class="counter-title color-info"><span
                                                    class="counter points">#</span></span>
                                        <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                        <div class="progress" style="width: 70%; position: relative; top: 25px">
                                            <div class="progress-bar bg-info" style="width: 66%"
                                                 role="progressbar"><span
                                                        class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-award bg-info"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>

                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#project_model" id="project_count" data-toggle="modal">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">عدد مرات الاستفادة</p><span
                                                class="counter-title color-info"><span
                                                    class="counter">#</span></span>
                                        <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                        <div class="progress" style="width: 70%; position: relative; top: 25px">
                                            <div class="progress-bar bg-info" style="width: 66%"
                                                 role="progressbar"><span
                                                        class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-watch bg-pink"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>


                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <div class="counter-w-warning media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">أخر تحديث</p><span
                                            class="counter-title color-info"><span
                                                style="direction: ltr">#</span></span>
                                    <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                    <div class="progress" style="width: 70%; position: relative; top: 25px">
                                        <div class="progress-bar bg-info" style="width: 66%" role="progressbar"><span
                                                    class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-watch bg-pink"></i>
                                </div>
                            </div>

                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>


            </div>
        @endif

        <div class="card">
            {{-- <div class="card-header">
                {{!isset($stage)?"تعديل بيانات ".$customer->name:'مستفيد جديد'}}
            </div> --}}
            <div class="card-body" style="position: relative">

                <div id="rootwizard">
                    <div id="bar" class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                    <div class="navbar ">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul>
                                    <li class="col"><a href="#tab1" data-toggle="tab">بيانات عامة</a></li>
                                    <li class="col"><a href="#tab2" data-toggle="tab"> رب الاسرة</a></li>
                                    <li class="col"><a href="#tab3" data-toggle="tab">التركيب الاسري</a></li>
                                    <li class="col"><a href="#tab4" data-toggle="tab">معلومات العمل</a></li>
                                    <li class="col"><a href="#tab5" data-toggle="tab">بيانات السكن</a></li>
                                    <li class="col"><a href="#tab6" data-toggle="tab">راي الباحث</a></li>
                                    <li class="col"><a href="#tab7" data-toggle="tab">تفاصيل الاسرة</a></li>
                                    <li class="col"><a href="#tab8" data-toggle="tab">المرفقات</a></li>
                                    <li class="col"><a href="#tab9" data-toggle="tab">تم</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                            @include('customers.tabs.personal')
                        </div>
                        <div class="tab-pane" id="tab2">
                            @include('customers.tabs.father_info')
                        </div>
                        <div class="tab-pane" id="tab3">
                            @include('customers.tabs.family_composition')

                        </div>
                        <div class="tab-pane" id="tab4">
                            @include('customers.tabs.work_info')


                        </div>
                        <div class="tab-pane" id="tab5">
                            @include('customers.tabs.housing_data')

                        </div>
                        <div class="tab-pane" id="tab6">
                            @include('customers.tabs.social_researcher')

                        </div>
                        <div class="tab-pane" id="tab7">
                            @include(
                                'customers.tabs.family_composition_details'
                            )

                        </div>
                        <div class="tab-pane" id="tab8">
                            @include('customers.tabs.attachments')

                        </div>
                        <div class="tab-pane" id="tab9">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped text-center">
                                        <tr>
                                            <td>رقم الملف</td>
                                            <td>
                                                <p id="file_no">#</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>التقيم</td>
                                            <td>
                                                <p class="points">#</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>اسم مدخل الطلب</td>
                                            <td>
                                                <p id="file_no">#</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>اسم الباحث</td>
                                            <td>
                                                <p id="file_no">#</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>تاريخ الاضافة</td>
                                            <td>
                                                <p id="file_no">#</p>
                                            </td>
                                        </tr>
                                        @if ($customer->userUpdated)
                                            <tr>
                                                <td>عدل بواسطة</td>
                                                <td><p id="file_no">{{$customer->userUpdated->name}}</p></td>
                                            </tr>

                                        @endif
                                        <tr>
                                            <td>تاريخ التعديل</td>
                                            <td>
                                                <p id="file_no">#</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <ul class="pager wizard">
                            <li class="previous"><a href="#">السابق
                                </a></li>
                            <li class="next"><a href="#">التالي
                                    <i class="fa fa-spin fa-spinner wizard-loader" style="display: none;"></i>
                                </a></li>
                            <li class="reset"><a href="#" type="reset">تراجع</a></li>

                            <li class="finish"><a href="# ">خروج

                                </a></li>

                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="portlet-title">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span1>
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

    <style>
        #rootwizard {
            margin-top: 20px;
        }

        table th {
            background-color: #eee !important;
            border: none;
            text-align: center;
        }

        #rootwizard .navbar {
            background: none;
            width: auto;
            position: relative;
            height: 50px;
            display: block;
        }

        #rootwizard .progress {
            height: 20px;
            position: absolute;
            top: 0;
            display: block;
            width: 100%;
            right: 0;
        }

        #rootwizard .navbar li a.active {
            color: #fff;
            background-color: #428bca;
        }

        #rootwizard .navbar li {
            text-align: center;
        }

        table.table-view {
            border-color: #000;
            ;
        }

        table.table-view th {
            background-color: #eee;
        }

        table.table-view .label-th {
            line-height: 34px !important;
            padding-top: 20px;
            text-align: left;
        }

        #rootwizard select.form-control {
            height: 34px;
        }

        .select2 {
            width: 100%;
            background-color: #fff;
        }

        .table-bordered {
            border-color: #000;
        }

        table.table-view {
            border-collapse: separate;
            border-top: 1px solid;
        }

        table.table-view th:first-child {
            border-right: 1px solid;
        }

        table.table-view th {
            border-left: 1px solid;
            border-bottom: 1px solid;
        }

        label {
            color: black !important;
            padding-left: 20px;
            padding-top: 5px;

        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]+label {
            background-color: #f8f9fa;
            cursor: pointer;
            display: block;
            height: 40px;
            width: 200px;
            text-align: center;
            line-height: 25px;
        }

        input[type="radio"]:checked+label {
            box-shadow: 0px 0px 5px 0px #00b92a;
            background-color: #53f142;
            color: #fff;
        }

        label.error {
            color: red !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }


        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>
    {{-- <link href="/plugins/fonts/style.css"/> --}}
    <link rel="stylesheet" href="/plugins/fonts/style.css">
@endsection

@push('js')
    <script src="/plugins/jquery.bootstrap.wizard.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_ar.js"
        integrity="sha256-elHFveOU5L4Pc/wo3WlEQPlbMrH6AlOyo79KeMCVo6U=" crossorigin="anonymous"></script>

    <script src="{{ url('') }}/assets/tags/bootstrap-tagsinput.js"></script>
    <link href="{{ url('') }}/assets/tags/bootstrap-tagsinput.css">

    <script>
        function getState() {
            var url = "{{ url('getState') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    state: $("#state_id").val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $("#region_id").empty();
                    $("#region_id").append("<option>اختر المنطقة</option>");
                    $.each(data.states, function(key, value) {
                        $("#region_id").append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });

                }
            });
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.select2').select2();

        $("input[type=number]").on("focus", function() {
            $(this).on("keydown", function(event) {
                if (event.keyCode === 38 || event.keyCode === 40) {
                    event.preventDefault();
                }
            });
            $(this).on("mousewheel", function(event) {
                this.blur()
            });
        });

        // $('.tags').tagsinput();
        var wizard;

        var stage = {{ isset($stage) ? intval($stage) : 0 }};
        var ajaxFinish = false;
        $(document).ready(function() {
            var validatorPersonal = $("#personalForm").validate();
            var fatherInfo = $("#father-info").validate();
            var familyComposition = $("#family-composition").validate();
            var workInfo = $("#work-info").validate();
            var housingData = $("#housing-data").validate();
            var researcher = $("#researcher").validate();
            var attachments = $("#attachments").validate();

            wizard = $('#rootwizard').bootstrapWizard({
                onNext: function(tab, navigation, index) {
                    if (ajaxFinish) {
                        ajaxFinish = false;
                        return true;
                    }
                    if (index == 1) {
                        // Make sure we entered the name
                        validatorPersonal.form();
                        if (validatorPersonal.valid()) {
                            ajax($('#personalForm'))
                        }
                        return false;
                    } else if (index == 2) {
                        fatherInfo.form();
                        if (fatherInfo.valid()) {
                            ajax($('#father-info'))
                        }
                        return false;
                    } else if (index == 3) {
                        familyComposition.form();
                        if (familyComposition.valid()) {
                            ajax($('#family-composition'))
                        }
                        return false;
                    } else if (index == 4) {
                        workInfo.form();
                        if (workInfo.valid()) {
                            ajax($('#work-info'))
                        }
                        return false;
                    } else if (index == 5) {
                        housingData.form();
                        if (housingData.valid()) {
                            ajax($('#housing-data'))
                        }
                        return false;
                    } else if (index == 6) {
                        researcher.form();
                        if (researcher.valid()) {
                            ajax($('#researcher'))
                        }
                        return false;
                    } else if (index == 7) {
                        researcher.form();
                        if (researcher.valid()) {
                            ajax($('#familyCompositionDetails'));
                        }
                        return false;
                    } else if (index == 8) {
                        attachments.form();
                        if (attachments.valid()) {
                            $('#attachments').submit();
                        }
                        return false;

                    }

                },
                onTabClick: function(tab, navigation, index, clickedIndex) {
                    @if (isset($stage))
                        if (clickedIndex > stage) {
                        return false;
                        }
                    @endif
                },
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#rootwizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#rootwizard .reset').click(function() {
                $(':input').val('');
                $('.tab-pane.active').find('select,.select2,input:radio,input:checkbox')
                    .each(function() {
                        $(this).val('');
                        $(this).prop('checked', false);
                    });

            });


            wizard.bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });

            @if (isset($stage))
                wizard.bootstrapWizard('show',{{ intval($stage) }});
            @endif
            @if (isset($stage2))
                wizard.bootstrapWizard('show',{{ intval($stage2) }});
            @endif
        });

        function ajax(obj, loader) {
            loader = typeof loader == 'undefined' ? "wizard-loader" : loader;
            $('.' + loader).show();
            $('.next').attr('disabled', true);
            $.ajax({
                url: obj.attr('action'),
                method: "POST",
                data: obj.serialize()
            }).done(function(data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    ajaxFinish = true;
                    wizard.bootstrapWizard('next');
                    if (data.file_no)
                        $('#file_no').text(data.file_no);
                    if (data.points)
                        $('.points').text(data.points);
                } else
                    toastr.error(data.msg);

                if (data.file_no)
                    $('#file_no').text(data.file_no);
                @if (isset($stage))
                    stage++;
                @endif

            }).fail(function(data) {
                ajaxFail(data)
            }).always(function() {
                $('.' + loader).hide();
                $('.next').attr('disabled', false);
            });
        }

        // $(document).on('click','.previous',function () {
        //    wizard.bootstrapWizard('prev');
        // });
        function nextTab() {
            let active = $('#rootwizard li [data-toggle=tab].active');

            let li_active = active.parent();
            let next = li_active.next();
            $('.previous').removeClass('disabled');
            if (next.length) {
                let next_active = next.find('[data-toggle=tab]');
                let tab_content = next.find('[data-toggle=tab]').attr('href');
                $('#rootwizard li [data-toggle=tab]').removeClass('active');
                $('#rootwizard .tab-pane').removeClass('active');
                next_active.addClass('active');
                $(tab_content).addClass('active');
            }

        }

        $('#father-info [name=health_id]').change(function() {
            $('#handicap.default-hide,#disease.default-hide').hide();
            $('#handicap.default-hide input,#disease.default-hide input').attr('required', false);

            if ($(this).val() == '3') {
                $('#handicap').show();
                $('#handicap input').attr('required', true);
            } else if ($(this).val() == '5') {
                $('#disease').show();
                $('#disease input').attr('required', true);
            }
        });
        $('[name=other_member].other_member').change(function() {
            $(this).closest('.row').find('#other_relation.default-hide').hide();
            $(this).closest('.row').find('#other_relation input').attr('required', false);
            if ($(this).val() == '1') {
                $(this).closest('.row').find('#other_relation').show();
                $(this).closest('.row').find('#other_relation input').attr('required', true);
            }
        });


        $('.add-new').click(function() {
            //form-add
            let income_source = $('#income_source').val();
            let income_type = $('#income_type').val();
            let income_amount = $('#income_amount').val();
            let income_side = $('#income_side').val();
            if (!(income_source && income_type && income_amount && income_side)) {
                toastr.error('تأكد من ادخال الحقول');

                return false;
            }

            let html = `<tr>
                                            <td><input type="text" name="income_source[]" readonly value="` +
                income_source + `"  class="form-control" ></td>
                                            <td><input type="text" name="income_type[]" readonly value="` +
                income_type + `"  class="form-control" ></td>
                                            <td><input type="number" name="income_amount[]" readonly value="` +
                income_amount + `"   class="form-control income_amount" ></td>
                                            <td><input type="text" name="income_side[]" readonly value="` +
                income_side + `"  class="form-control" ></td>
                                            <td>
                                                <a href="javascript:;" class="delete-income btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
            </td>
        </tr>`;
            $('.form-add').before(html);
            total_income();
            $('.form-add input').val('');
        });


        $('.add-new-need').click(function() {
            //form-add
            let need = $('#need').val();
            let description = $('#description').val();
            let count = $('#count').val();
            if (!(need && count)) {
                toastr.error('تأكد من ادخال الحقول');

                return false;
            }

            let html = `<tr>
                                            <td><input type="text" name="need[]" readonly value="` + need + `"  class="form-control" ></td>
                                            <td><input type="text" name="description[]" readonly value="` +
                description + `"  class="form-control" ></td>
                                            <td><input type="number" name="count[]" readonly value="` + count + `"   class="form-control" ></td>
                                            <td>
                                                <a href="javascript:;" class="delete-income btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
            </td>
        </tr>`;
            $('.form-add-need').before(html);
            total_income();
            $('.form-add-need input').val('');
        });

        $(document).on('click', '#project_count', function(e) {

            var url = '{{ url('customerProject') }}/' + '{{ $customer->id }}';

            if ($.fn.DataTable.isDataTable("#project_tb")) {
                $('#project_tb').DataTable().clear().destroy();
            }

            oTable = $("#project_tb").DataTable({
                "processing": false,
                "serverSide": true,
                paging: false,
                searching: false,
                info: false,
                columnDefs: [
                    // { width: 120, targets: 5 }
                ],
                //                    fixedColumns: false,
                "ajax": url,

                "language": {
                    "sProcessing": "<img src='{{ url('assets/global/plugins/jquery-file-upload/img/loading.gif') }}'>",
                    "infoEmpty": "لا يوجد نتائج",
                    "zeroRecords": "لا يوجد نتائج للبحث",
                    "info": "عرض  _START_ الى _END_ من _TOTAL_ نتيجة",
                    "lengthMenu": "عرض _MENU_ نتائج بالصفحة",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير",
                    },
                },
                "columns": [{
                        orderable: false,
                        'render': function() {
                            return '';
                        }
                    },
                    // {'data': 'id', 'name': 'id'},    // first:dataname , second name in database
                    {
                        'data': 'project.name',
                        'name': 'project_id'
                    },
                    {
                        'data': 'created_at',
                        'name': 'created_at'
                    },
                ],
                "fnDrawCallback": function() {
                    oTable.column(0).nodes().each(function(cell, i) {
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


        $('.add-new-child').click(function() {
            //form-add
            let child_name = $('#child_name').val();
            let child_dob = $('#child_dob').val();
            let child_jender = $('#child_jender').val();
            let child_jender_text = $('#child_jender option:checked').text();
            let child_card_no = $('#child_card_no').val();
            let child_relation = $('#child_relation').val();
            let child_relation_text = $('#child_relation option:checked').text();

            let child_qualification = $('#child_qualification').val();
            let child_qualification_text = $('#child_qualification option:checked').text();

            let child_social = $('#child_social').val();
            let child_social_text = $('#child_social option:checked').text();

            let child_health = $('#child_health').val();
            let child_health_text = $('#child_health option:checked').text();

            let child_job = $('#child_job').val();
            let child_salary = $('#child_salary').val();


            if (!(child_name && child_dob && child_jender && child_card_no && child_card_no &&
                    child_relation && child_qualification && child_social && child_health
                )) {
                toastr.error('تأكد من ادخال الحقول');

                return false;
            }

            let html = `<tr>
                                            <td>#</td>
                                            <td><input type="text" name="child_name[]" readonly value="` + child_name + `"  class="form-control" ></td>
                                            <td><input type="text" name="child_dob[]" readonly value="` + child_dob + `"  class="form-control" ></td>
                                            <td>
                                                <input type="hidden" name="child_jender[]" readonly value="` +
                child_jender + `"   class="form-control income_amount" >
                                                <input type="tet" readonly value="` + child_jender_text + `"   class="form-control income_amount" >
                                            </td>
                                            <td><input type="text" name="child_card_no[]" readonly value="` +
                child_card_no + `"  class="form-control" ></td>
                                           <td>
                                                <input type="hidden" name="child_relation[]" readonly value="` +
                child_relation + `"   class="form-control income_amount" >
                                                <input type="tet" readonly value="` + child_relation_text + `"   class="form-control income_amount" >
                                            </td>
                                             <td>
                                                <input type="hidden" name="child_qualification[]" readonly value="` +
                child_qualification + `"   class="form-control income_amount" >
                                                <input type="tet" readonly value="` + child_qualification_text + `"   class="form-control income_amount" >
                                             <td>
                                                <input type="hidden" name="child_social[]" readonly value="` +
                child_social + `"   class="form-control income_amount" >
                                                <input type="tet" readonly value="` + child_social_text + `"   class="form-control income_amount" >
                                             <td>
                                                <input type="hidden" name="child_health[]" readonly value="` +
                child_health + `"   class="form-control income_amount" >
                                                <input type="tet" readonly value="` + child_health_text + `"   class="form-control income_amount" >

                                            <td><input type="text" name="child_job[]" readonly value="` + child_job + `"  class="form-control" ></td>
                                            <td><input type="text" name="child_salary[]" readonly value="` +
                child_salary + `"  class="form-control" ></td>
                                            <td>
                                                <a href="javascript:;" class="delete-child btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
            </td>
        </tr>`;
            $('#children').append(html);
            $('#no-data').hide();
            $('.family-form input').val('');
        });

        function total_income() {
            var total = 0;
            $('.income_amount').each(function() {
                total += parseInt($(this).val());
            });
            $('#total_income').text(total + ' شيكل');
            total_outcome();
        }

        $('.outcome_price').change(function() {
            total_outcome();
        });

        function total_outcome() {
            var total_income = {{ $customer->income_sum ?? 0 }};
            $('.income_amount').each(function() {
                total_income += parseInt($(this).val());
            });

            var total_outcome = 0;

            $('.outcome_price').each(function() {
                total_outcome += parseInt($(this).val() ? $(this).val() : 0);
            });

            let total = total_income - total_outcome;

            $('#total_outcome').text(total_outcome + ' شيكل');
            $('#total_income_2').text(total_income + ' شيكل');
            $('#remain_income').text(total + ' شيكل');
        }

        $(document).on('click', '.delete-income', function() {
            $(this).closest('tr').remove();
            total_income();
        });

        $(document).on('click', '.delete-child', function() {
            $(this).closest('tr').remove();
        });

        $('[type=radio]:checked').change();


        $('body').on('click', '#addAttachment', function() {
            if ($(this).hasClass('delete-child-1')) {
                $(this).closest('tr').remove();
                return;
            }
            if ($('#addAttachment_title').val()) {
                $('#addAttachment_title').attr('required', true);

                $('#addAttachment_title').attr('id', '');
                $('#addAttachment_name').attr('id', '');
                $(this).attr('class', 'delete-child-1 btn btn-danger');
                $(this).find('i').attr('class', 'fa fa-times');

                html = `<tr>
                    <td><input type="text" name="title[]"  id="addAttachment_title" class="form-control"></td>
                    <td><input type="file" name="name[]"  id="addAttachment_name" class="form-control"></td>
                    <td><a href="javascript:;"  class="btn btn-success" id="addAttachment"><i class="fa fa-plus"></i></a></td>
                </tr>`;
                $('#attachments-table').append(html);

                return '';
            } else {
                toastr.error('ادخل البيانات بشكل صحيح');
            }
        })
    </script>

    <script>
        function gitCitizen() {

            var id_number = document.getElementById("id_number").value;
            console.log(id_number);

            $.ajax({
                url: "{{ route('get-citizen-data') }}",
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_number,
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'fail') {
                        toastr.error(data.msg);
                        window.location = '/Customer/v1/' + data.id + '/edit';
                    } else {
                        $('#check_duplicate').hide();
                    }
                }
            });


        }
    </script>
@endpush
