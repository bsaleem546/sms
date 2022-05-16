@extends('layouts.app')

@section('title', 'Admission Update')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Admission Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Admission</li>
                    <li class="breadcrumb-item active">Update Admission</li>
                </ol>
                <a href="{{ route('admission.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
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

                    <h5 class="card-title">Update Admission</h5>


                    {!! Form::model($data, array('route' => ['admission.update', $data->id],'method'=>'PATCH', 'class' => 'form-material m-t-40 create', 'enctype' => 'multipart/form-data')) !!}

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
                                    <img id="image_uploaded" src="{{ url('public/uploads/students/'.$data->student_pic) }}" alt="" style="margin-bottom: 15px; height: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Student Name</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="student_name" required placeholder="Student name" class="form-control" value="{{ $data->student_name }}">
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
                                <label class="col-sm-12">Religion</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="religion" required placeholder="Religion" class="form-control" value="{{ $data->religion }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Cast</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="cast" required placeholder="Cast" class="form-control" value="{{ $data->cast }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Blood Group</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" name="blood_group" placeholder="Blood Group" class="form-control" value="{{ $data->blood_group }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="col-sm-12">Address</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Address" name="address" class="form-control" value="{{ $data->address }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-12">State / Province</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="State / Province" name="state" class="form-control" value="{{ $data->state }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-12">City</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="City" name="city" class="form-control" value="{{ $data->city }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-12">Country</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Country" name="country" class="form-control" value="{{ $data->country }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Phone</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Phone"  name="phone" class="form-control" value="{{ $data->phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Email</label>
                                <div class="col-sm-12 validate">
                                    <input type="email" required placeholder="Email" name="email" class="form-control" value="{{ $data->email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Extra Note</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" placeholder="Extra Note"  name="extra_note" class="form-control" value="{{ $data->extra_note }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h3>Admission Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-12">Selected Class</label>
                                <div class="col-sm-12 validate">
                                    <select name="selected_class" required class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach(\App\Models\_Class::latest()->get() as $c)
                                            <option value="{{ $c->id }}" {{ $c->id == $data->__class_id ? 'selected' : '' }}>{{ $c->name." ".$c->section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-12">GR NO</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="GR NO"  name="gr_no" class="form-control" value="{{ $data->gr_no }}">
                                </div>
                            </div>
{{--                            <div class="col-md-4">--}}
{{--                                <label class="col-sm-12">Roll No</label>--}}
{{--                                <div class="col-sm-12 validate">--}}
{{--                                    <input type="text" required placeholder="Roll No"  name="roll_no" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-12">Admission Fees</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Admission Fees"  name="admission_fees" value="{{ $ad_fee }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-12">Tuition Fees</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Admission Fees"  name="tuition_fees" value="{{ $tt_fee }}" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <h3>Parents Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Father Name</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Father Name"  name="father_name" class="form-control" value="{{ $data->father_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Father Phone</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" placeholder="Father Phone"  name="father_phone" class="form-control" value="{{ $data->father_phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Father Occupation</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" placeholder="Father Occupation"  name="father_occ" class="form-control" value="{{ $data->father_occ }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-sm-12">Mother Name</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Mother Name"  name="mother_name" class="form-control" value="{{ $data->mother_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Mother Phone</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Mother Phone"  name="mother_phone" class="form-control" value="{{ $data->mother_phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Mother Occupation</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" required placeholder="Mother Occupation"  name="mother_occ" class="form-control" value="{{ $data->mother_occ }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h3>Transport Information</h3>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row d-flex">
                                    <label class="col-sm-12">Want Transportation?</label>
                                    <input type="radio" name="is_trans" value="0" class="ml-4 mr-4" {{ $data->is_trans == 0 ? 'checked' : '' }}><span>No</span>
                                    <input type="radio" name="is_trans" value="1" class="ml-4 mr-4" {{ $data->is_trans == 1 ? 'checked' : '' }}><span>Yes</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Transportation</label>
                                <div class="col-sm-12 validate">
                                    <select name="transportation" class="form-control">
                                        <option value="0">Select Option</option>
                                        @foreach(\App\Models\Transport::latest()->get() as $t)
                                            <option value="{{ $t->id }}" {{ $t->id == $data->transport_id ? 'selected' : '' }}>{{ $t->vehicle_number.'  '.$t->vehicle_model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-sm-12">Transportation Fees</label>
                                <div class="col-sm-12 validate">
                                    <input type="text" placeholder="Transportation Fees"  name="transportation_fees"
                                           value="{{ $data->is_trans == 0 ? 0 : $tp_fee }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    @if($data->student_auth_id == null)
                        <div class="form-group">
                            <div class="row d-flex">
                                <div class="alert alert-cyan">
                                    <p>Student default password would be <b>student123 </b>. Which he/she can change after logging in.</p>
                                </div>
                                <label class="col-sm-12">Make Student Login</label>
                                <input type="radio" name="is_login" value="0" class="ml-4 mr-4" checked><span>No</span>
                                <input type="radio" name="is_login" value="1" class="ml-4 mr-4"><span>Yes</span>
                            </div>
                        </div>
                    @else
                            <input type="hidden" name="is_login" value="0" class="ml-4 mr-4">
                    @endif
                    @can('admission-confirm')
                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                    @endcan
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
