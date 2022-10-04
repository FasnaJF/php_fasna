<!DOCTYPE html>
<html>
<head>
    <title>Sales Team</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @yield('content')
</div>

<div class="modal fade" id="popupRepresentative" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="representativeForm" name="representativeForm" class="form-horizontal">
                    <div class="form-group" id="rep_id">
                        <label for="id" class="col-sm-6 control-label">ID</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="id" name="id" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="full_name" class="col-sm-6 control-label">Full Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-6 control-label">Email Address</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="col-sm-6 control-label">Telephone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter Phone Number" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="joined_date" class="col-sm-6 control-label">Joined Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="joined_date" name="joined_date" placeholder="Enter Joined Date" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="current_route" class="col-sm-6 control-label">Current Route</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="current_route" name="current_route" placeholder="Enter Current Route" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Comments</label>
                        <div class="col-sm-12">
                            <label for="comments"></label>
                            <textarea id="comments" name="comments" placeholder="Enter Comments" class="form-control"></textarea>
                        </div>
                    </div>
                    <span class="alert-danger" id="error"></span>
                    <div class="col-sm-offset-2 col-sm-12 mt-1">
                        <button class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#createRepresentative').click(function () {
            $('#saveBtn').text("Create Representative");
            $('#saveBtn').val("create");
            $('#id').val('');
            $('#representativeForm').trigger("reset");
            $('#modelHeading').html("Create New Representative");
            $('#rep_id').hide();
            $('#popupRepresentative').modal('show');
        });

        $('#saveBtn').click(function (e){
            e.preventDefault();
            $(this).html('Sending..');

            if($(this).val() === 'create'){
                $.ajax({
                    data: $('#representativeForm').serialize(),
                    url: "{{ route('representatives.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#representativeForm').trigger("reset");
                        $('#createRepresentative').modal('hide');
                        location.reload();
                    },
                    error: function (data) {
                        var response = (JSON.parse(data.responseText));
                        $.each( response.errors, function( key, value) {
                            $('#error').text(value[0]);
                        });
                        $('#saveBtn').html('Create Representative');
                    }
                });
            }else{
                alert('update');
            }

        })


    });
</script>
</html>
