@extends('representatives.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sales Team</h2>
            </div>
            <div class="pull-right" style="float: right;margin-bottom: 15px;">
                <a class="btn btn-success" href="{{ route('representatives.create') }}"> Add New</a>
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
                    <form action="{{ route('representatives.destroy',$representative->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('representatives.show',$representative->id) }}">Show</a>

                        <a class="btn btn-warning" href="{{ route('representatives.edit',$representative->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
