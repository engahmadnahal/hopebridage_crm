@push('js')
<script>



    function getWared(url){
        var post_id=document.getElementById('post_id').value;
        if($.fn.DataTable.isDataTable("#search_related_tb")) {
            $('#search_related_tb').DataTable().clear().destroy();
        }

        oTable = $("#search_related_tb").DataTable({
            "processing": true,
            "serverSide": true,
            paging: true,
            searching: false,
            info: false,
            "ajax": {
                url : url,
                data:function (d) {
                    d.title_search = document.getElementById('title_search').value;
                    d.post_no_search = document.getElementById('post_no_search').value;
                }
            },
            "language": {
                "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
            },
            "columns": [
                {'data': 'post.post_no', 'name': 'post_id'},
                {'data': 'post.title', 'name': 'post_id'},
                {'data': 'post.post_date', 'name': 'post_id'},
                {'data': 'post.jehafrom.name', 'name': 'post_id'},
                {
                    orderable: false,
                    'render': function (data, type, row) {
                        return '<a pull-link="Post/related/'+row['post_id']+'/'+post_id+'" class="btn btn-circle btn-icon-only btn-green" title="اضافة كمعاملة مرتبطة" id="add_related">  <i class="fa fa-plus"> </i></a>';
                    }
                },
            ]
        });
    }
    function getSader(url){
        var post_id=document.getElementById('post_id').value;
        if($.fn.DataTable.isDataTable("#search_related_tb")) {
            $('#search_related_tb').DataTable().clear().destroy();
        }

        oTable = $("#search_related_tb").DataTable({
            "processing": true,
            "serverSide": true,
            paging: true,
            searching: true,
            info: false,
            "ajax": url,
            "language": {
                "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
            },
            "columns": [
                {'data': 'post_no', 'name': 'post_no'},
                {'data': 'title', 'name': 'title'},
                {'data': 'post_date', 'name': 'post_date'},
                {'data': 'jehato.name', 'name': 'id'},
                {
                    orderable: false,
                    'render': function (data, type, row) {
                        return '<a pull-link="Post/related/'+row['id']+'/'+post_id+'" class="btn btn-circle btn-icon-only btn-green" title="اضافة كمعاملة مرتبطة" id="add_related">  <i class="fa fa-plus"> </i></a>';
                    }
                },
            ]
        });
    }

    $(document).on('click', '#add_related', function (e) {
        e.preventDefault();

        var url='{{url('')}}/'+$(this).attr('pull-link');

        $.ajax({
            'url':url,
            'type':'get',
            'datatype':'json',
        })
            .done(function(response) {
                toastr.success(response.message);
                getRelated();
            })
            .fail(function(data) {

            })
//                    }
//                });
    });

    $(document).on('click', '#delete_related', function (e) {
        e.preventDefault();

        var url='{{url('')}}/'+$(this).attr('pull-link');

        $.ajax({
            'url':url,
            'type':'get',
            'datatype':'json',
        })
            .done(function(response) {
                toastr.success(response.message);
                getRelated();
            })
            .fail(function(data) {

            })

    });

    $('#related_post_form').submit(function (e) {
        e.preventDefault();


        var url=$(this).attr('action');
        $.ajax({
            'url':url,
            'type':'post',
            'data':$('#related_post_form').serializeArray(),
        })
            .done(function(response) {
                toastr.success('response.message');
                getRelated();
            })
            .fail(function(data) {
            })

    });

    $(document).on('click', '#show_image', function (e) {

        var image = '{{url('')}}'+'/uploads/news'+'/'+$(this).attr('image_id');
        // alert(image);
        if($(this).attr('file_ext') == 'file_pdf.jpg')
        {
            document.getElementById('zoom_image_div').innerHTML='<object width="100%" height="100%" data="'+image+'"></object>';
        }
        else if($(this).attr('file_ext') == 'file_jpg.jpg'){
            document.getElementById('zoom_image_div').innerHTML='<img src="'+image+'"/>';
        }
//                else if($(this).attr('file_ext') == 'file_doc.jpg') {
//                    document.getElementById('zoom_image_div').innerHTML = '<iframe src="http://docs.google.com/gview?url=' + image + '&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
//                }
    });

    function removeCustomer(cus_id) {

        var url= '{{url('removeCustomer')}}'+'/'+cus_id;
        $.ajax({
            'url': url,
            'type': 'get',
            'dataType': 'json',

        })
            .done(function(response) {
                toastr.success(response.message);
                oTable.ajax.reload();
            })
            .fail(function(data) {
            })
    }

    $(document).on('click', '#search_customer', function (e) {
        if($.fn.DataTable.isDataTable("#customer_tb")) {
            $('#customer_tb').DataTable().clear().destroy();
        }
        var url=$(this).attr('pull-link');
        $.ajax({
            'url': url,
            'type': 'get',
            'dataType': 'json',
            success: function (response) {

                oTable = $("#customer_tb").DataTable({
                    "processing": true,
                    "serverSide": true,
                    paging: true,
                    searching: true,
                    info: false,
                    "ajax": url,

                    "language": {
                        "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
                    },
                    "columns": [
                        {'data': 'card_no', 'name': 'card_no'},    // first:dataname , second name in database
                        {'data': 'name', 'name': 'name'},    // first:dataname , second name in database
                        {'data': 'mobile', 'name': 'mobile'},
                        {'data': 'email', 'name': 'email'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ]

                });

                oTable.ajax.reload();
            },
            error: function (xhr) {

            }
        })
    });
    $(document).on('click', '#add_to_array', function (e) {
        var cus_id_s = $(this).attr('customer_id');
        var cus_name_s = $(this).attr('customer_name');
        $('#cus_list').append('<li><label><input checked type="checkbox" name="customers[]" value="'+cus_id_s+'">'+cus_name_s+'</label> </li>');
    });
    $(document).on('click', '#empty_customer', function (e) {
        $('#cus_list').empty();
    });
    $('#save_customer').submit( function (e) {
        e.preventDefault();

        var url=$(this).attr('action');
        bootbox.confirm(' تأكيد الحفظ !!',function (res) {
            if(res){
                $.ajax({
                    'url':url,
                    'type':'post',
                    'datatype':'json',
                    'data':$('#save_customer').serializeArray(),
                })
                    .done(function(response) {
                        $('#search_customer_model').modal('hide');
                        toastr.success(response.message);
                        getCustomers();

                    })
                    .fail(function(data) {

                    })
            }
        });
    });
    $('#cus_add_form').submit(function (e) {
        e.preventDefault();

        var url=$(this).attr('action');
        $.ajax({
            'url':url,
            'type':'post',
            'datatype':'json',
            'data':$('#cus_add_form').serializeArray(),
        })
            .done(function(response) {
                toastr.success(response.message);
                var cus_id_s = response.data.id;
                var cus_name_s = response.data.name;
                $('#cus_list').append('<li><label><input checked type="checkbox" name="customers[]" value="'+cus_id_s+'">'+cus_name_s+'</label> </li>');
                document.getElementById("cus_add_form").reset();
                $('#new_customer').modal('hide');

                oTable.ajax.reload();

                $.each(response.data, function(index, val) {
                    console.log(index+","+val);
                    $("."+index).clear();
                });
            })
            .fail(function(data) {

                $.each(data.responseJSON, function(index, val) {
                    console.log(index+","+val);
                    $("."+index).text(val);
                });
            })

    });

    function getRelated(){

        if($.fn.DataTable.isDataTable("#related_tb")) {
            $('#related_tb').DataTable().clear().destroy();
        }
        var url= '{{url('Post/getRelated/')}}'+'/'+document.getElementById('post_id').value;

        oTable = $("#related_tb").DataTable({
            "processing": true,
            "serverSide": true,
            paging: true,
            searching: true,
            info: false,
            "ajax": url,
            "language": {
                "sProcessing": "<img src='{{url('assets/global/plugins/jquery-file-upload/img/loading.gif')}}'>"
            },
            "columns": [
                {'data': 'post_id', 'name': 'post_id'},
                {'data': 'post.title', 'name': 'post_id'},
                {'data': 'post.jehafrom.name', 'name': 'post_id'},
                {'data': 'post.post_date', 'name': 'post_id'},
                {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
            ]

        });
    }

    function getCustomers() {
        if( document.getElementById('post_id').value =="")
        {
            $('#action_list').modal('hide');
            bootbox.alert("يجب تحديد المعاملة");
            return false;
        }
        if ($.fn.DataTable.isDataTable("#related_customer_tb")) {
            $('#related_customer_tb').DataTable().clear().destroy();
        }
        var url= '{{url('getCustomer')}}'+'/'+document.getElementById('post_id').value;
        $.ajax({
            'url': url,
            'type': 'get',
            'dataType': 'json',
            success: function (response) {

                oTable = $("#related_customer_tb").DataTable({
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
                        {'data': 'customer.card_no', 'name': 'customer_id'},    // first:dataname , second name in database
                        {'data': 'customer.name', 'name': 'customer_id'},    // first:dataname , second name in database
                        {'data': 'customer.mobile', 'name': 'customer_id'},
                        {'data': 'customer.email', 'name': 'customer_id'},
                        {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false}
                    ]

                });

                oTable.ajax.reload();
            },
            error: function (xhr) {

            }
        })
    }


</script>

@endpush