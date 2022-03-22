@extends('layouts.app')

@section('title', 'Teachers')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Teachers</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Teachers</li>
                </ol>
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

                    <h5 class="card-title">Teachers list</h5>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->gender }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('teachers.show',$d->id) }}">Show</a>
                                        @can('teacher-edit')
                                            <a class="btn btn-primary" href="{{ route('teachers.edit',$d->id) }}">Assign Subjects</a>
                                        @endcan
{{--                                        @can('subject-delete')--}}
{{--                                            {!! Form::open(['method' => 'DELETE','route' => ['subjects.destroy', $d->id],'style'=>'display:inline']) !!}--}}
{{--                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
{{--                                            {!! Form::close() !!}--}}
{{--                                        @endcan--}}
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



