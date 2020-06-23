<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


</head>
<body>

@yield('main')

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

<script>

    var table1 = $('#contact-tables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('all.contact') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'number', name: 'number'},
            {data: 'email', name: 'email'},
            {data: 'religion', name: 'religion'},
            {data: 'link', name: 'link', orderable: false, searchable: false}
        ]
    });

    //update Data Show By Ajax
    function editDataFrom(id) {
        save_method = 'edit';
        $('input[name_method]').val('PATCH');

        $.ajax({
            url: "{{ url('contactinfo') }}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-Edit-data').modal('show');
                $('.modal-title').text(data.name + ' ' + 'Edit Information');
                $('.btn-insert').text("Update Info");
                $('#idss').val(data.id);
                $('#name_S').val(data.name);
                $('#phone_S').val(data.number);
                $('#email_S').val(data.email);
                $('#religion_S').val(data.religion);

            }, error: function () {
                swal({
                    title: "Oops",
                    text: data.message,
                    icon: "error",
                    timer: '1500'
                });
            }
        });
    }

    //update Data By Ajax
    function editDataSubmit() {
        $('#modal-Edit-data form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#idss').val();
                if (save_method == "edit")
                    url = "{{url('editPost') }}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($("#modal-Edit-data form")[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#modal-Edit-data').modal('hide');
                        $('#contact-tables').DataTable().ajax.reload();
                        table1.ajax.reload();
                        swal({
                            title: "Success",
                            text: "You Data Update Successfully",
                            icon: "success",
                            button: "Great"
                        });
                    }, error: function (data) {
                        swal({
                            title: "Oops",
                            text: data.message,
                            icon: "error",
                            timer: '1500'
                        });
                    }
                });
                return false;
            }
        });
    }

    //insert Data By Ajax
    $(function () {
        $('#modal-add-data form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == "add")
                    url = "{{ url('contactinfo') }}";
                else
                    url = "{{url('contactinfo').'/'}}" + id;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($("#modal-add-data form")[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#modal-add-data').modal('hide');
                        $('#contact-tables').DataTable().ajax.reload();
                        swal({
                            title: "Success",
                            text: "You Clicked The Button",
                            icon: "success",
                            button: "Great"
                        });
                    }, error: function (data) {
                        swal({
                            title: "Oops",
                            text: data.message,
                            icon: "error",
                            timer: '1500'
                        });
                    }
                });
                return false;
            }
        });
    });

    //Dalete Data By Ajax
    function deleteData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url('contactinfo') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        $('#contact-tables').DataTable().ajax.reload();
                        swal({
                            title: "Delete Done",
                            text: "Poof! Your data file has been deleted!",
                            icon: "success",
                            button: "Done"
                        });
                    }, error: function () {
                        swal({
                            title: "Opps...",
                            text: data.message,
                            icon: "error",
                            button: '5000',
                        });
                    }
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });

    }

    //Show Data By Ajax
    function showDataFrom(id) {
        $.ajax({
            url: "{{ url('contactinfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-show-data').modal('show');
                $('.modal-title').text(data.name + ' ' + 'Information');
                $('#sp_id').text(data.id);
                $('#sp_name').text(data.name);
                $('#sp_Number').text(data.number);
                $('#sp_Email').text(data.email);
                $('#sp_Religion').text(data.religion);

            }, error: function () {
                swal({
                    title: "Oops",
                    text: data.message,
                    icon: "error",
                    timer: '1500'
                });
            }
        });
    }

    function addFrom() {
        save_method = 'add';
        $('input[name_method]').val('POST');
        $('#modal-add-data').modal('show');
        //$('#modal-add-data addData_from')[0].reset();
        //$(this).find('#modal-add-data')[0].reset();
        $('.modal-title').text('Add Froms');
        $('.btn-insert').text('Add Data');
    }

</script>

<script>

    var table1 = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('AllContact') !!}',
        columns: [
            {data: 'ID', name: 'ID'},
            {data: 'CON_INFO_ID', name: 'CON_INFO_ID'},
            {data: 'CON_NAME', name: 'CON_NAME'},
            {data: 'CON_PHONE', name: 'CON_PHONE'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

</script>

<script>

    function sweetAlert() {
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            button: "Aww yiss!",
        });

    }

</script>
</body>
</html>
