@extends('main.mainPage')

@section('main')
<div class="alert alert-success">
    <strong>My Table!</strong> Test Table .
</div>
<div class="container">
    <div class="row">
        <button type="button" onclick="addFrom()" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">
            Add New Data
        </button>
        <button class="btn btn-lg btn-primary" onclick="sweetAlert()">SweetAlert</button>

    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-bordered" id="contact-tables">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Religion</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>

    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="modal-add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="addData_from" data-toogle="valibator">
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
                <button type="submit" class="btn btn-primary btn-insert"></button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modal-Edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" data-toogle="valibator">
                @csrf {{method_field('POST')}}
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="hidden" class="form-control"  id="idss" name="idss" aria-describedby="emailHelp">
                        <input type="text" class="form-control" id="name_S" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone_S" name="phone" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email_S" aria-describedby="emailHelp">
                    </div><div class="form-group">
                        <label for="exampleFormControlSelect1">Select Religion</label>
                        <select class="form-control" id="religion_S" name="religion">
                            <option value="Select Religion">--- Select Religion---</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddu">Buddu</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="editDataSubmit()" class="btn btn-primary btn-insert"></button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- View Modal -->
<div class="modal fade" id="modal-show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">ID :<span class="text-danger" id="sp_id"></span></li>
                    <li class="list-group-item">Name :<span class="text-danger" id="sp_name"></span></li>
                    <li class="list-group-item">Number :<span class="text-danger" id="sp_Number"></span></li>
                    <li class="list-group-item">Email :<span class="text-danger" id="sp_Email"></span></li>
                    <li class="list-group-item">Religion :<span class="text-danger" id="sp_Religion"></span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@endsection