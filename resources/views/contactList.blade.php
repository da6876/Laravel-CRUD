@extends('main.mainPage')

@section('main')

<div class="alert alert-success">
    <strong>Hello!</strong> Test Table .
</div>

<hr>

<div class="container">
    <div class="row">
        <table class="table table-striped table-dark" id="users-table">
            <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>CON_INFO_ID</th>
                <th>CON_NAME</th>
                <th>CON_PHONE</th>
                <th>Create Info</th>
                <th>updated_at</th>
                <th>action</th>
            </tr>
            </thead>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="from" data-toogle="valibator">
                @csrf {{method_field('POST')}}
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    </div><div class="form-group">
                        <label for="exampleFormControlSelect1">Select Religion</label>
                        <select class="form-control" id="religion" name="religion">
                            <option value="Select Religion">--- Select Religion---</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddu">Buddu</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-insert">Add Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection