<script src="{{url('')}}/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/js/popper.min.js"></script>
<script src="{{url('')}}/assets/global2/js/bootstrap.min.js"></script>
<script src="{{url('')}}/assets/global2/js/metisMenu.min.js"></script>
<script src="{{url('')}}/assets/global2/js/perfect-scrollbar.jquery.js"></script>
<script src="{{url('')}}/assets/global2/js/countUp.min.js"></script>
<script src="{{url('')}}/assets/global2/js/switchery.min.js"></script>
<script src="{{url('')}}/assets/global2/js/moment.min.js"></script>
<script src="{{url('')}}/assets/global2/js/circle-progress.min.js"></script>
<script src="{{url('')}}/assets/global2/js/slick.min.js"></script>
<script src="{{url('')}}/assets/global2/js/mithril.js"></script>
<script src="{{url('')}}/assets/global2/vendors/theme-widgets/widgets.js"></script>
<script src="{{url('')}}/assets/global2/js/theme.js"></script>
<script src="{{url('')}}/assets/global2/js/custom.js"></script>
<script src="{{url('')}}/assets/global2/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/assets/global2/js/dataTables.buttons.min.js"></script>
<script src="{{url('')}}/assets/global2/js/buttons.print.min.js"></script>
<script src="{{url('')}}/assets/global2/js/jszip.min.js"></script>
<script src="{{url('')}}/assets/global2/js/pdfmake.min.js"></script>
<script src="{{url('')}}/assets/global2/js/buttons.html5.min.js"></script>
<script src="{{url('')}}/assets/global2/scripts/app.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/moment.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global2/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
{{--<script src="{{url('')}}/assets/global2/js/jquery.sparkline.min.js"></script>--}}
<script src="{{url('')}}/assets/js/jquery-treeview.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/js/jquery_tree_demo.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/js/bootbox/bootbox.min.js"></script>
<script src="{{url('')}}/assets/js/bootstrap-toastr/toastr.js"></script>
<script>
    $('.searchable').change(function () {
        var column = jQuery(this).attr('data-column');
        oTable.columns(column).search(jQuery(this).val()).draw();
    });

    $('.searchableList').change(function () {
        var column = $(this).attr('data-column');
        oTable.columns(column).search($(this).val()).draw();
    });
    $('#date_from').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        endDate: '0d'
    }).on('changeDate', function (e) {
        oTable.draw();
    });

    $('#date_to').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        endDate: '0d'
    }).on('changeDate', function (e) {
        oTable.draw();
    });

    $('#date_year').datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
    }).on('changeDate', function (e) {
        oTable.draw();
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    function ajaxFail(data) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': data.csrf
            }
        });
        if (data.status == 422) {
            var html = document.createElement("ul");
            html.style.listStyle = 'circle';

            responseJSON = JSON.parse(data.responseText);
            $.each(responseJSON.errors, function (index, value) {
                console.log(value);
                var li = document.createElement("li");
                li.append(document.createTextNode(value));
                li.style.fontSize = '13px';
                li.style.textAlign = 'right';
                li.style.paddingBottom = '5px';
                html.append(li);
            });

            swal({
                title: '{{__('خطأ في البيانات المدخلة')}}', icon: "error",
                content: html, type: 'error', button: {
                    text:'الغاء',
                    closeModal: true,

                }
            });


        } else {
            swal('{{__('خطأ')}}', '{{__('خطأ غير معروف')}}', 'error');

        }
    }


</script>
@stack('js')