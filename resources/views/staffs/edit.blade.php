@extends('layouts.app')

@section('title', 'Staff Edit')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Staff Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Staffs</li>
                    <li class="breadcrumb-item active">Edit Staff</li>
                </ol>
                <a href="{{ route('staffs.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
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

                    <h5 class="card-title">Edit Staff</h5>
                    <div class="alert alert-warning">
                        <p>Default staff login password will be <b>staff123</b> .</p>
                    </div>

                    {!! Form::model($data, array('route' => ['staffs.update', $data->id],'method'=>'PATCH', 'class' => 'form-material m-t-40 create', 'enctype' => 'multipart/form-data')) !!}

                    <h3>Personal Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-12">Upload an image</label>
                                <div class="col-sm-12 validate">
                                    <input type="file" id="id_proof" name="id_proof" class="form-control" accept="image/*" onchange="loadImage(event)">
                                    <script>
                                        var loadImage = function(event) {

                                            var input = document.getElementById('id_proof');
                                            var file = input.files[0];
                                            if( file.size > 2097152 )
                                            {
                                                alert("Cannot upload Files greater than 2MB")
                                                input.value = '';
                                            }
                                            else
                                            {
                                                var output = document.getElementById('image_uploaded');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            }
                                        };
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <img id="image_uploaded" src="{{ $data->id_proof !== null ?  url('public/uploads/staffs/'.$data->id_proof) : url('public/placeholder.png') }}" alt="" style="margin-bottom: 15px; height: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Name</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="name" required placeholder="Name" class="form-control" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Gender</label>
                                <div class="d-flex">
                                    <div class="col-sm-12 validate">
                                        <select name="gender" class="form-control" required>
                                            <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Date of birth</label>
                                <div class="col-sm-12 validate">
                                    <input type="date" name="dob" required  class="form-control" value="{{ $data->dob }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Address</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="address" required placeholder="Address" class="form-control" value="{{ $data->address }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Phone</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="phone" required placeholder="Phone" class="form-control" value="{{ $data->phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Email</label>
                                <div class="col-sm-12 validate">
                                    <input type="email" name="email" required placeholder="Email" class="form-control" value="{{ $data->email }}">
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <h3>Joining Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="col-sm-12">Joining date</label>
                                <div class="col-sm-12 validate">
                                    <input type="date" name="joining_date" required class="form-control" value="{{ $data->joining_date }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-12">Salary</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="salary" required class="form-control" value="{{ $data->salary }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-inline-flex">
                                    <label class="col-sm-12">Department</label>
                                    @foreach($data->users->departments as $dd)
                                        <label class="label label-megna">{{ $dd->name }}</label>
                                    @endforeach
                                </div>

                                <div class="col-sm-12 validate">
                                    <select name="department" class="form-control" required>
                                        <option value="">Select Option</option>
                                        @foreach($deps as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-12">Role</label>
                                <div class="col-sm-12 validate">
                                    {!! Form::select('roles', $roles, $userRole, array('class' => 'form-control','required')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3>Transportation Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-12">Is bus incharge</label>
                                <div class="col-sm-12 validate">
                                    <input type="radio" name="is_bus_incharge" value="0" {{ $data->is_bus_incharge == 0 ? 'checked' : '' }}><span> No </span>
                                    <input type="radio" name="is_bus_incharge" value="1" {{ $data->is_bus_incharge == 1 ? 'checked' : '' }}><span> Yes </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-12">Transports</label>
                                <div class="col-sm-12 validate">
                                    <select name="transport_id" class="form-control" required>
                                        <option value="">Select Option</option>
                                        @foreach($transports as $t)
                                            <option value="{{ $t->id }}" {{ $t->id == $data->transport_id ? 'selected' : '' }}>{{ $t->vehicle_number.'  '.$t->vehicle_model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>



                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
