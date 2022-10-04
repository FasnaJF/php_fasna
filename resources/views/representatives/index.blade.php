@extends('representatives.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sales Team</h2>
            </div>
            <div class="pull-right" style="float: right;margin-bottom: 15px;">
                <a class="btn btn-success" href="javascript:void(0)" id="createRepresentative"> Add New</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Current Route</th>
            <th>Action</th>
        </tr>
        @foreach ($representatives as $representative)
            <tr>
                <td>{{ $representative->id }}</td>
                <td>{{ $representative->full_name }}</td>
                <td>{{ $representative->email }}</td>
                <td>{{ $representative->telephone }}</td>
                <td>{{ $representative->current_route }}</td>
                <td>

                    <a class="btn btn-primary" href="javascript:void(0)" id="showDetails">Show</a>

                    <a class="btn btn-warning" href="javascript:void(0)" id="editDetails">Edit</a>

                    <a class="btn btn-danger" href="{{ route('representatives.destroy',$representative->id) }}">Delete</a>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
