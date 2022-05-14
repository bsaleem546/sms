@extends('layouts.app')

@section('title', 'Add Fees')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Add Department</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Fees</li>
                    <li class="breadcrumb-item active">Add Fees</li>
                </ol>
                <a href="{{ route('fees.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
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

                    <h5 class="card-title">Create Fees</h5>
                    {!! Form::open(array('route' => 'fees.store','method'=>'POST', 'class' => 'form-material m-t-40 create')) !!}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="">All Students</label>
                                    <div class="validate">
                                        <select class="form-control" required name="admission_id">
                                            <option value="">Select Please</option>
                                            @foreach($students as $s)
                                                <option value="{{ $s->id }}">{{ $s->student_name.' - '.$s->_class->name.' - GR-'.$s->gr_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-sm-12">Fee Type</label>
                                    <div class="col-sm-12 validate">
                                        <select class="form-control" required name="fee_type">
                                            <option value="">Select Please</option>
                                            <option value="admission">Admission</option>
                                            <option value="tuition">Tuition</option>
                                            <option value="transportation">Transportation</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-sm-12">Fees Amount</label>
                                    <div class="col-sm-12 validate">
                                        <input type="text" name="fee_amount" required placeholder="Fees Amount" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-sm-12">Month Of</label>
                                    <div class="col-sm-12 validate">
                                        <input type="date" name="month_of" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-sm-12">Month Of</label>
                                    <div class="col-sm-12 validate">
                                        <input type="date" name="due_date" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 mt-4">Submit</button>
                                </div>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

