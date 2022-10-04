@extends('representatives.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Representative</h2>
            </div>
            <div class="pull-right" style="float: right">
                <a class="btn btn-primary" href="{{ route('representatives.index') }}">Back to list</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('representatives.update',$representative->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="id" class="col-sm-6 control-label">ID</label>
            <div class="col-sm-12">
                <input  readonly type="text" class="form-control" id="id" name="id"
                       value="{{$representative->id}}" >
            </div>
        </div>
        <div class="form-group">
            <label for="full_name" class="col-sm-6 control-label">Full Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name"
                       value="{{$representative->full_name}}" maxlength="50" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-6 control-label">Email Address</label>
            <div class="col-sm-12">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$representative->email}}"
                       required="">
            </div>
        </div>
        <div class="form-group">
            <label for="telephone" class="col-sm-6 control-label">Telephone</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter Phone Number"
                       value="{{$representative->telephone}}" maxlength="50" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="joined_date" class="col-sm-6 control-label">Joined Date</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" id="joined_date" name="joined_date"
                       placeholder="Enter Joined Date" value="{{explode(" ",$representative->joined_date)[0]}}" maxlength="50" required="">
            </div>
        </div>
        <div class="form-group">
            <label for="current_route" class="col-sm-6 control-label">Current Route</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="current_route" name="current_route"
                       placeholder="Enter Current Route" value="{{$representative->current_route}}" maxlength="50" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 control-label">Comments</label>
            <div class="col-sm-12">
                <label for="comments"></label>
                <textarea id="comments" name="comments" placeholder="Enter Comments" class="form-control">{{$representative->comments}}</textarea>
            </div>
        </div>
        <span class="alert-danger" id="error"></span>
        <div class="col-sm-offset-2 col-sm-12 mt-1">
            <button class="btn btn-primary" id="saveBtn" value="create">Save changes
            </button>
        </div>
    </form>

@endsection
