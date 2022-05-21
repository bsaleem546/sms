@extends('layouts.app')

@section('title', 'Exam')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Examination</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Examination</li>
                </ol>
                @can('staff-create')
                    <a href="{{ route('results.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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

                    <h5 class="card-title">Examination</h5>
{{--                    <div class="alert alert-warning">--}}
{{--                        <p>If admission record is deleted everything that is attached to that admission will be deleted also.</p>--}}
{{--                    </div>--}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Admission</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Session</th>
                                <th>Exam Type</th>
                                <th>Total Marks</th>
                                <th>Obtained Marks</th>
                                <th>Percentage</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $d)
{{--                                @dd($data)--}}
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->admission_id }}</td>
                                    <td>{{ $d->student_id }}</td>
                                    <td>{{ $d->class_id }}</td>
                                    <td>{{ $d->session_id }}</td>
                                    <td>{{ $d->exam_type }}</td>
                                    <td>{{ $d->total_marks }}</td>
                                    <td>{{ $d->obtained_marks }}</td>
                                    <td>{{ $d->percentage }}</td>
                                    <td>{{ $d->grade }}</td>
                                    <td>{{ $d->status }}</td>
{{--                                    <td>{{ \App\Models\User::where('id', $d->added_by)->pluck('name')->first() }}</td>--}}
                                    <td>
                                        <a class="btn btn-info" href="{{ route('results.show',$d->id) }}">Show</a>
                                        @can('result-edit')
                                            <a class="btn btn-primary" href="{{ route('results.edit',$d->id) }}">Edit</a>
                                        @endcan
                                        @can('result-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['results.destroy', $d->id],'style'=>'display:inline']) !!}
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
