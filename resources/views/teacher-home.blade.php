{{--//TOTAL STUDENT--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Total Student</h5>
                    <h4 class="card-title" style="color:#004274">{{count($data1)}}</h4>
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//CLASSES--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Classes</h5>
                    <h4 class="card-title" style="color:#004274">{{count($SUBID)}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//TOTAL ASSIGN SUBJECTS--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Total Assign Subjects</h5>
                    <h4 class="card-title " style="color:#004274">{{count($SUB)}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//SALARY--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">salary</h5>
                    <h4 class="card-title " style="color:#004274">{{$data->salary}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//VEHICLE NUMBER--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">vehicle Number</h5>
                    <h4 class="card-title" style="color:#004274">{{$transport->vehicle_number}}</h4>
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//VEHICLE MODEL--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">vehicle Model</h5>
                    <h4 class="card-title" style="color:#004274">{{$transport->vehicle_model}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//DRIVER NAME--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Driver Name</h5>
                    <h4 class="card-title " style="color:#004274">{{$transport->driver_name}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//DRIVER PHONE--}}
<div class="col-lg-3 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Driver Phone</h5>
                    <h4 class="card-title " style="color:#004274">{{$transport->driver_phone}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//ANNOUNCEMENT--}}
<div class="col-lg-12 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <div class="card-body">
                    <h5 class="card-title" style="color:#004274">Announcement</h5>
                    <h4 class="card-title" style="color:#004274">{{$data2->notice}}</h4>
                    {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                    {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-info">View Badges</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--//CHART--}}
<div class="col-lg-6 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                <canvas id="abc" style="width:40%;height:90%;max-width:100%"></canvas>
                <script>
                    var xValues = ["Absent", "Present", "Leaves","Late"];
                    var yValues = [{{$absent}}, {{$present}}, {{$leave}},{{$late}}];
                    var barColors = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797",
                        "#CB3414",
                    ];

                    new Chart("abc", {
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Your Presence Status"
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
{{--salary chart--}}
<div class="col-lg-6 mb-2 order-0">
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-12">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                <canvas id="chart" style="width:40%;height:90%;max-width:100%"></canvas>
                {{--@dd($salary)--}}
                <script>
                    var XValues = ["Salary", "Deduction"];
                    var YValues = [{{$salary->salary}},{{$salary->deduction}}];
                    var BarColors = [
                        "#b91d47",
                        "#00aba9",
                    ];

                    new Chart("chart", {
                        type: "pie",
                        data: {
                            labels: XValues,
                            datasets: [{
                                backgroundColor: BarColors,
                                data: YValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Salary of{{$salary->month_of}}"
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
