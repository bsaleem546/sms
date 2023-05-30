{{-- Transport --}}
<div class="col-lg-12">
    <div class="card">
        <div class="d-flex align-items-center ">
            <div class="col-sm-12">
                <div class="card-body text-center">
                    <h3 class="card-title" style="color:#004274">Transport Details</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@isset($transport)
    <div class="col-lg-3 mb-2 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#004274">Vehicle Number</h5>
                        {{--                    @dd($min) --}}
                        <h4 class="card-title" style="color:#004274">{{ $transport->vehicle_number }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Vehicle Model</h5>
                        <h4 class="card-title" style="color:#004274">{{ $transport->vehicle_model }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Driver Name</h5>
                        <h4 class="card-title" style="color:#004274">{{ $transport->driver_name }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Driver Cell no</h5>
                        <h4 class="card-title" style="color:#004274">{{ $transport->driver_phone }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset

{{-- SttudentFeeDetails --}}
@isset($fee)
    <div class="col-lg-12">
        <div class="card">
            <div class="d-flex align-items-center ">
                <div class="col-sm-12">
                    <div class="card-body text-center">
                        <h3 class="card-title" style="color:#004274">Fee Details</h3>
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
                        <h5 class="card-title" style="color:#004274">Month Of</h5>
                        <h4 class="card-title" style="color:#004274">{{ $fee->month_of }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Fee</h5>
                        <h4 class="card-title" style="color:#004274">{{ $fee->total }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Remaining</h5>
                        <h4 class="card-title" style="color:#004274">{{ $fee->arrears }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
                        <h5 class="card-title" style="color:#004274">Due Date</h5>
                        <h4 class="card-title" style="color:#004274">{{ $fee->due_date }}</h4>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset

{{-- Announcement --}}
@isset($announcement)
    <div class="col-lg-12">
        <div class="card">
            <div class="d-flex align-items-center ">
                <div class="col-sm-12">
                    <div class="card-body text-center">
                        <h3 class="card-title" style="color:#004274">Other Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-2 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#004274">Announcement</h5>
                        <h6 class="card-title" style="color:#004274">Title : {{ $announcement->title }}</h6>
                        <p class="card-title" style="color:#004274">{{ $announcement->notice }}</p>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset

{{-- Live Link --}}
@isset($livelink)
    <div class="col-lg-12 mb-2 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#004274">Live Class</h5>
                        <p class="card-title" style="color:#004274"><a style="color:#004274"
                                href="{{ $livelink->meeting_link }}">{{ $livelink->meeting_link }}</a></p>
                        {{--                                <p class="mb-4">{{$data1->description}}</p> --}}
                        {{--                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset

{{-- fee chart --}}
@isset($fees)
    <div class="col-lg-12 mb-2 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        <h5 class="card-title" style="color:#004274">Fee Details</h5>
                        <canvas id="myChart" style="width:100%;max-width:100%"></canvas>

                        <script>
                            var fee = {!! $fees !!};
                            var arr = {
                                total: [],
                                month_of: []
                            }


                            for (let i = 0; i < fee.length; i++) {
                                arr.month_of.push(fee[i].month_of);
                                arr.total.push(fee[i].total);
                            }
                            var xValues = (arr.month_of)
                            var yValues = (arr.total)
                            console.log(arr)
                            console.log(arr.month_of)
                            console.log(arr.total)
                            {{-- var yValues = {{$fees->total}}; --}}

                            new Chart("myChart", {
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
                                    legend: {
                                        display: false
                                    },
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                min: {{ $minmax->DateStart }},
                                                max: {{ $minmax->DateEnd }}
                                            }
                                        }],
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset
