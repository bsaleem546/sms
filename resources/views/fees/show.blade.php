@extends('layouts.app')

@section('title', 'Show Fee')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Show Fee</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Fees</li>
                    <li class="breadcrumb-item active">Show Fee</li>
                </ol>
                <a href="{{ route('fees.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h3>{{ \Carbon\Carbon::parse($data->_session->start_date)->format('Y')." - ".\Carbon\Carbon::parse($data->_session->end_date)->format('Y')  }}</h3>--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <div>--}}
{{--                            <h5 class="card-title">{{ $data->students->name }}</h5>--}}
{{--                            <small>{{ $data->students->_class->name." - ".$data->students->_class->section->name }}</small>--}}
{{--                        </div>--}}
{{--                        <div class="text-right">--}}
{{--                            @if($data->status == 'pending')--}}
{{--                                <label class="label label-warning">{{ $data->status }}</label>--}}
{{--                            @elseif($data->status == 'paid')--}}
{{--                                <label class="label label-success">{{ $data->status }}</label>--}}
{{--                            @else--}}
{{--                                <label class="label label-danger">{{ $data->status }}</label>--}}
{{--                            @endif--}}
{{--                            <div>--}}
{{--                                @if($data->students->admission->student_pic !== null)--}}
{{--                                    <img src="{{ url('public/uploads/students/'.$data->students->admission->student_pic) }}" alt="" style="height: 150px">--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                    <h3><b>Fee Details:</b></h3>--}}
{{--                        <div>--}}
{{--                            @foreach($data1 as $data2 )--}}
{{--                            </row>--}}
{{--                            <h6>Fee Type: <span class="text-uppercase">{{ $data2->fee_type }}</span></h6>--}}
{{--                            <h6>Fee Amount: {{ $data2->fee_amount }}</h6><br>--}}
{{--                            @endforeach()--}}
{{--                            <h6>Month of: {{ \Carbon\Carbon::parse($data->month_of)->format('M-Y') }}</h6><br>--}}
{{--                            <h6>Due Date: {{ $data->due_date }}</h6><br>--}}
{{--                            <h6>Paid Date: {{ $data->paid_at }}</h6><br>--}}
{{--                            @if($data->status == 'paid')--}}
{{--                                <h6>Payment Type: <span class="text-uppercase">{{ $data->payment_type }}</span></h6><br>--}}
{{--                                <h6>Operator / Bank: {{ $data->operator }}</h6><br>--}}
{{--                                <h6>Transaction ID: {{ $data->transaction_id }}</h6><br>--}}
{{--                                <h6>Paid Amount: {{ $data->paid_amount }}</h6><br>--}}
{{--                                <h6>Balance Amount: {{ $data->balance_amount }}</h6><br>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="container mt-5 px-2 text-right">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-responsive table-borderless">--}}

{{--                            <thead>--}}
{{--                                <tr class="bg-light">--}}
{{--                                    <th scope="col" width="20%">Fee Types</th>--}}
{{--                                    <th scope="col" width="20%">Tuition Fee</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($data1 as $data2 )--}}
{{--                                <tr>--}}
{{--                                    <td><span class="text-uppercase">{{ $data2->fee_type }}</span></td>--}}
{{--                                    <td>{{ $data2->fee_amount }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach()--}}
{{--                            </tbody>--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $f->students->name }}</h5>
                    <small class="font-medium">{{ $f->students->_class->name." - ".$f->students->_class->section->name }}</small>
                    <div class="row">
                        <div class="col-lg-8 mt-3">
                            <h3><b>Fee Details:</b></h3><br><br>
                            <div class="row">
                                <div class="col-lg-4">
                                    @foreach($fds as $data2 )
                                        <h6>Fee Type: <span class="text-uppercase">{{ $data2->fee_type }}</span></h6>
                                        <h6>Fee Amount: {{ $data2->fee_amount }}</h6><br>
                                    @endforeach()
                                </div>
                                <div class="col-lg-4">
                                    <h6>Month of: {{ \Carbon\Carbon::parse($f->month_of)->format('M-Y') }}</h6><br>
                                    <h6>Due Date: {{ $f->due_date }}</h6><br>
                                    <h6>Paid Date: {{ $f->paid_at }}</h6><br>
                                    <h6>Total: <span class="text-uppercase">{{ $f->total }}</span></h6><br>
{{--                                    @if($f->status == 'paid')--}}
{{--                                        <h6>Payment Type: <span class="text-uppercase">{{ $f->payment_type }}</span></h6><br>--}}
{{--                                        <h6>Operator / Bank: {{ $f->operator }}</h6><br>--}}
{{--                                        <h6>Transaction ID: {{ $f->transaction_id }}</h6><br>--}}
{{--                                        <h6>Paid Amount: {{ $f->paid_amount }}</h6><br>--}}
{{--                                        <h6>Balance Amount: {{ $f->balance_amount }}</h6><br>--}}
{{--                                    @endif--}}
                                </div>
                            </div>

                            <div>


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                @if($f->students->admission->student_pic !== null)
                                    <img src="{{ url('public/uploads/students/'.$f->students->admission->student_pic) }}" alt="" style="height: 150px">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection








