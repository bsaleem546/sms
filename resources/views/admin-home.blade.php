<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Departments</h5>
                    <h4 class="card-title" style="color:#004274">{{$dep}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">All Users</h5>
                    <h4 class="card-title" style="color:#004274">{{$user}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">All Students</h5>
                    <h4 class="card-title" style="color:#004274">{{$stu}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">All Staff</h5>
                    <h4 class="card-title" style="color:#004274">{{$staff}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">All Teachers</h5>
{{--                    @dd($teacher->users->departments)--}}
                    <h4 class="card-title" style="color:#004274">{{count($teacher)}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-2 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Transport</h5>
                    <h4 class="card-title" style="color:#004274">{{$transport}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Pending Salaries</h5>
                    <h4 class="card-title" style="color:#004274">{{$pen_salaries}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Staff Pending Leaves</h5>
                    <h4 class="card-title" style="color:#004274">{{$pen_Sleaves}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Student Pending Leaves</h5>
                    <h4 class="card-title" style="color:#004274">{{$pen_stuleaves}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Pending Fees</h5>
                    <h4 class="card-title" style="color:#004274">{{$pen_fee}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--REG ADM CHART--}}
<div class="col-lg-12 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                    <canvas id="MyChart" style="width:100%;max-width:100%"></canvas>
                    {{--@dd($admission)--}}
                    <script type="text/javascript">
                        var xValues = ["Admissions","Pending Admissions","Registrations","Pending Registrations",];
                        var yValues = [{{$admission}},{{$admission_p}},{{$registration}},{{$registration_p}}];
                        //var barColors = ["#004274", "#004274","#004274","#004274","#004274","#004274", "#004274","#004274","#004274","#004274"];

                        new Chart("MyChart", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    fill: false,
                                    lineTension: 0,
                                    backgroundColor: "rgba(0,0,255,1.0)",
                                    borderColor: "rgba(0,0,255,0.1)",
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                    yAxes: [{ticks: {mix: {{$minmax1->maxs}}, max: {{$minmax->max}}}}],
                                },
                                title: {
                                    display: true,
                                    text: "Registration And Admission"
                                }
                            }
                        });

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
{{--STU_CHART--}}
<div class="col-lg-12 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                    <canvas id="myChart" style="width:100%;max-width:100%"></canvas>

                    <script type="text/javascript">
                        var data = {!! $STUDENTCLASSESARRAY !!}
                        var xValues = data.class_name
                        var yValues =  data.students_total
                        //var barColors = ["#004274", "#004274","#004274","#004274","#004274","#004274", "#004274","#004274","#004274","#004274"];

                        new Chart("myChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: "#004274",
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "Number Of Student"
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@dd($dep)--}}
