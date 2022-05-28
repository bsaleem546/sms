@extends('layouts.app')

@section('title', 'Teacher Details')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Teacher Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Teacher Details</li>
                </ol>
                <a href="{{ route('teachers.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->name }}</h5>
                    <div class="row">
                        <div class="col-6">
                            <p>Gender: {{ $data->gender }}</p>
                            <p>Date of birth: {{ $data->dob }}</p>
                            <p>Address: {{ $data->address }}</p>
                            <p>Phone: {{ $data->phone }}</p>
                            <p>Email: {{ $data->email }}</p>
                            <p>Joining Date: {{ $data->joining_date }}</p>
                            <p>Salary: {{ $data->salary }}</p>
                            @if( count($data->subjects) > 0 )
                                <p>
                                    Subjects:
                                    @foreach($data->subjects as $subs)
                                        <label class="label label-primary">{{ $subs->name." - ".$subs->_class->name." - ".$subs->_class->section->name }}</label>
                                    @endforeach
                                </p>
                            @endif

                            <p>Bus Incharge:
                                @if($data->is_bus_incharge === 0)
                                    <label class="label label-danger">NO</label>
                                @else
                                    <label class="label label-success">YES</label>
                                @endif
                            </p>
                            <p>Transportation: {{ $data->transport->vehicle_number.' - '.$data->transport->vehicle_model }}</p>
                            <p>Department:
                                @foreach($data->users->departments as $dd)
                                    <label class="label label-megna">{{ $dd->name }}</label>
                                @endforeach</p>
                            <p>Role: {{ $userRole->name }}</p>
                            <p>Permissions:
                                @foreach($rolePermissions as $p)
                                    <label class="label label-warning">{{ $p->name }}</label>
                                @endforeach
                            </p>
                            <p>Added By: {{ \App\Models\User::where('id', $data->added_by)->pluck('name')->first() }}</p>
                            <p>Created At: {{ $data->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-6 justify-content-center">
                            @if($data->id_proof !== null)
                                <img src="{{ url('public/uploads/staffs/'.$data->id_proof) }}" alt="" class="shadow-lg" height="150px">
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
