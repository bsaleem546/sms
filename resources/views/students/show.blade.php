@extends('layouts.app')

@section('title', 'Students Details')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Students Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Students</li>
                </ol>
                <a href="{{ route('students.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8"><br><br>
                            <h3 class="card-title"><b>Student Details:</b></h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title">Student Name :{{ $data->name }}</h5><br>
                                    <h5><b> Class : </b>{{ $data->_class->name }}</h5>
                                    <h5 class="my-3"><b> Section : </b>{{ $data->_class->section->name }}</b></h5>
                                    <h5 class="my-3"><b> Roll Number : </b>{{ $data->roll_no }}</h5>
                                    <h5 class="my-3"><b> city : </b>{{ $data->admission->city }}</h5>
                                    <h5 class="my-3"><b> state : </b>{{ $data->admission->state }}</h5>
                                    <h5 class="my-3"><b> country : </b>{{ $data->admission->country }}</h5>
                                    <h5 class="my-3"><b> phone : </b>{{ $data->admission->phone }}</h5>
                                    <h5 class="my-3"><b> email : </b>{{ $data->admission->email }}</h5>
                                    <h5 class="my-3"><b> gender : </b>{{ $data->admission->gender }}</h5>
                                    <h5 class="my-3"><b> Religion : </b>{{ $data->admission->religion }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-right">
                                @if ($data->admission->student_pic !== null)
                                    <img src="{{ asset('uploads/students/' . $data->admission->student_pic) }}"
                                        alt="" style="height: 150px">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
