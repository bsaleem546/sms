@extends('layouts.app')

@section('title', 'Exam Result Create')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Exam Result Create</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item">Exam Results</li>
                    <li class="breadcrumb-item active">Create Exam Result</li>
                </ol>
                <a href="{{ route('results.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back</a>
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

                    <h5 class="card-title">Create Exam Result</h5>


                    {!! Form::open(array('route' => 'results.store','method'=>'POST',
                        'class' => 'form-material m-t-40 create', 'enctype' => 'multipart/form-data')) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="font-medium">Class Name</label>
                                    <select name="class_id" required class="form-control" id="class_id">
                                        <option value="">Select Option</option>
                                        @foreach($classes as $cl)
                                            <option value="{{ $cl->id }}">{{ $cl->name.' - '.$cl->section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="font-medium">Student Name</label>
                                    <select name="student_id" required class="form-control" id="student_id">
                                        <option value="">Select Option</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="font-medium">Exam Type</label>
                                    <select name="exam_type" required class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="mid-term">Mid Term</option>
                                        <option value="final-term">Final Term</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Subjects</th>
                                    <th>Obt. Marks</th>
                                    <th>Total Marks</th>
                                </tr>
                                </thead>
                                <tbody id="tb">

                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#class_id').change( () => {
            $('#student_id').html('')
            $('#tb').html('')
            var id = $('#class_id').val()
            $.ajax({
                url: site_url+"/getSubjectsAndStudents/"+id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    $.each(res.students, (index, value) => {
                       $('#student_id').append('<option value="'+value.id+'">'+value.name+'</option>')
                    })

                    $.each(res.subjects, (index, value) => {
                        var html = '<tr>\n' +
                            '                                        <td>'+(index + 1)+'</td>\n' +
                            '                                        <td>'+value.name+'</td>\n' +
                            '                                        <td><input type="text" id="obt_'+value.id+'"></td>\n' +
                            '                                        <td><input type="text" id="tt_'+value.id+'"></td>\n' +
                            '                                    </tr>'
                        $('#tb').append(html)
                    })
                }
            });
        })
    </script>
@endsection
