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
{{--@dd(count($absent))--}}

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Name</h5>
                                <h4 class="card-title text-primary">{{$data->name}}</h4>
{{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Email</h5>
                                <h4 class="card-title text-primary">{{$data->email}}</h4>
                                {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
{{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Staff id</h5>
                                <h4 class="card-title text-primary">{{$data->id}}</h4>
                                {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
{{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Announcement</h5>
                                <h4 class="card-title text-primary">{{$data2->notice}}</h4>
                                {{--                                <p class="mb-4">{{$data1->description}}</p>--}}
                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                            <canvas id="myChart" style="width:30%;max-width:100%"></canvas>

                            <script>
                                var xValues = ["Absent", "Present", "Leaves","Late"];
                                var yValues = [{{count($absent)}}, {{count($present)}}, {{count($leave)}},{{count($late)}}];
                                var barColors = [
                                    "#b91d47",
                                    "#00aba9",
                                    "#2b5797",
                                    "#CB3414",

                                ];

                                new Chart("myChart", {
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
        </div>
    </div>



@endsection
