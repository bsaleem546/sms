@extends('layouts.app')

@section('title', 'Staffs')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Staffs</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Staffs</li>
                </ol>
                @can('staff-create')
                    <a href="{{ route('staffs.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if (Session::get('error'))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                <p>{{ Session::get('error') }}</p>
                            </ul>
                        </div>
                    @endif

                    <h5 class="card-title">Staffs list</h5>
{{--                    <div class="alert alert-warning">--}}
{{--                        <p>If admission record is deleted everything that is attached to that admission will be deleted also.</p>--}}
{{--                    </div>--}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
{{--                                <th>Gender</th>--}}
{{--                                <th width="200px">Date of birth</th>--}}
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Joining Date</th>
                                <th>Salary</th>
                                <th>Department</th>
                                <th>Added By</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->name }}</td>
{{--                                    <td>{{ $d->gender }}</td>--}}
{{--                                    <td>{{ $d->dob }}</td>--}}
                                    <td>{{ $d->address }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->joining_date }}</td>
                                    <td>{{ $d->salary }}</td>
                                    <td>
                                        @foreach($d->users->departments as $dd)
                                            <label class="label label-megna">{{ $dd->name }}</label>
                                        @endforeach
                                    </td>
                                    <td>{{ \App\Models\User::where('id', $d->added_by)->pluck('name')->first() }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('staffs.show',$d->id) }}">Show</a>
                                        @can('staff-edit')
                                            <a class="btn btn-primary" href="{{ route('staffs.edit',$d->id) }}">Edit</a>
                                        @endcan
                                        @can('staff-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['staffs.destroy', $d->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
