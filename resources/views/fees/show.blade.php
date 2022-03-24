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

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ \Carbon\Carbon::parse($data->_session->start_date)->format('Y')." - ".\Carbon\Carbon::parse($data->_session->end_date)->format('Y')  }}</h3>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $data->students->name }}</h5>
                            <small>{{ $data->students->_class->name." - ".$data->students->_class->section->name }}</small>
                        </div>
                        <div class="text-right">
                            @if($data->status == 'pending')
                                <label class="label label-warning">{{ $data->status }}</label>
                            @elseif($data->status == 'paid')
                                <label class="label label-success">{{ $data->status }}</label>
                            @else
                                <label class="label label-danger">{{ $data->status }}</label>
                            @endif
                            <div>
                                @if($data->students->admission->student_pic !== null)
                                    <img src="{{ url('public/uploads/students/'.$data->students->admission->student_pic) }}" alt="" style="height: 150px">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        <h6>Fee Type: <span class="text-uppercase">{{ $data->fee_type }}</span></h6>
                        <h6>Fee Amount: {{ $data->fee_amount }}</h6>
                        <h6>Fee Disount: {{ $data->fee_discount }}</h6>
                        <h6>Month of: {{ \Carbon\Carbon::parse($data->month_of)->format('M-Y') }}</h6>
                        <h6>Due Date: {{ $data->due_date }}</h6>
                        <h6>Paid Date: {{ $data->paid_at }}</h6>
                        @if($data->status == 'paid')
                            <h6>Payment Type: <span class="text-uppercase">{{ $data->payment_type }}</span></h6>
                            <h6>Operator / Bank: {{ $data->operator }}</h6>
                            <h6>Transaction ID: {{ $data->transaction_id }}</h6>
                            <h6>Paid Amount: {{ $data->paid_amount }}</h6>
                            <h6>Balance Amount: {{ $data->balance_amount }}</h6>
                        @endif
                        <h6>Number Of Vouchers Printed: <span class="label label-danger">{{ $data->voucher_count }}</span></h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
