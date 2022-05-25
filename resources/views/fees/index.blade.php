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

                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Fees list</h5>
                        @if( auth()->user()->is_admin )
                            <a class="btn btn-primary" href="{{ route('fees.print.all') }}">Print All</a>
                            <a class="btn btn-outline-primary" href="javascript::void(0)" onclick="printSelected()">Print Selected</a>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>GR NO</th>
                                <th>Session</th>
                                <th>Student Name</th>
                                <th>Student Class</th>
                                <th>Month Of</th>
                                <th>Due Date</th>
                                <th>Arrears</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if( auth()->user()->is_admin )
                                    @include('components.admin.fee-component')
                                @endif
                                @if( auth()->user()->is_student )
                                    @include('components.student.fee-component')
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

    <script>
        function printSelected() {
            var data = {!! $data !!}
            var arr = []
            $.each(data, (i, v) => {
                var chk = $('#chk_'+v.id).is(':checked')
                if (chk === true){
                    arr.push(v.id)
                }
            })
            if (arr.length > 0){
                var arrStr = JSON.stringify(arr);
                console.log(arrStr)
                window.location = 'fees/print/'+arrStr;
            }
            else{
                alert('No fees selected')
            }
        }
    </script>

@endsection


