@extends('layouts.app')

@section('title', 'Fees')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">All Fees</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Fees</li>
                </ol>
                @can('fee-create')
                    <a href="{{ route('fees.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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

                    <h5 class="card-title">Fees list</h5>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>GR NO</th>
                                <th>Session</th>
                                <th>Student Name</th>
                                <th>Student Class</th>
                                <th>Fee Type</th>
                                <th>Fee Amount</th>
                                <th>Fee Discount</th>
                                <th>Month Of</th>
                                <th>Due Date</th>
                                <th>Voucher Count</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->students->admission->gr_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->_session->start_date)->format('Y')." - ".\Carbon\Carbon::parse($d->_session->end_date)->format('Y') }}</td>
                                    <td>{{ $d->students->name }}</td>
                                    <td>{{ $d->students->_class->name." - ".$d->students->_class->section->name }}</td>
                                    <td>{{ $d->fee_type }}</td>
                                    <td>{{ $d->fee_amount }}</td>
                                    <td>{{ $d->fee_discount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->month_of)->format('M-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->due_date)->format('M d, Y') }}</td>
                                    <td>{{ $d->voucher_count }}</td>
                                    <td>
                                        @if($d->status == 'pending')
                                            <label class="label label-warning">{{ $d->status }}</label>
                                        @elseif($d->status == 'paid')
                                            <label class="label label-success">{{ $d->status }}</label>
                                        @else
                                            <label class="label label-danger">{{ $d->status }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('fees.show',$d->id) }}">Show</a>
                                        @can('fee-edit')
                                            <a class="btn btn-primary" href="{{ route('fees.edit',$d->id) }}">Pay</a>
                                        @endcan
                                        @can('fee-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['fees.destroy', $d->id],'style'=>'display:inline']) !!}
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



