@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Home</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
{{--@dd(count($data1))--}}

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
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
                                    type: "pie",
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

                            <script>
                                var XValues = ["Italy", "France", "Spain", "USA", "Argentina"];
                                var YValues = [5000, 1000, 5, 24, 15];
                                var BarColors = [
                                    "#b91d47",
                                    "#00aba9",
                                    "#2b5797",
                                    "#e8c3b9",
                                    "#1e7145"
                                ];

                                new Chart("chart", {
                                    type: "doughnut",
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
                                            text: "World Wide Wine Production 2018"
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>



{{--            <div class="col-lg-6 mb-2 order-0">--}}
{{--                <div class="card">--}}
{{--                    <div class="d-flex align-items-end row">--}}
{{--                        <div class="container">--}}
{{--                            <div class="row justify-content-center">--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header"></div>--}}

{{--                                        <div class="card-body">--}}

{{--                                            <h1>{{ $chart1->options['chart_title'] }}</h1>--}}
{{--                                            {!! $chart1->renderHtml() !!}--}}

{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </div>
    </div>



@endsection

{{--@section('javascript')--}}
{{--    {!! $chart1->renderChartJsLibrary() !!}--}}
{{--    {!! $chart1->renderJs() !!}--}}
{{--@endsection--}}
