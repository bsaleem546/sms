@extends('layouts.app')

@section('title', 'Timetable')

@section('content')

    <style>
        body {
            font-family: Tahoma;
        }



        /* declare a 7 column grid on the table */
        #calendar {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        #calendar tr, #calendar tbody {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            width: 100%;
        }

        caption {
            text-align: center;
            grid-column: 1 / -1;
            font-size: 130%;
            font-weight: bold;
            padding: 10px 0;
        }

        #calendar a {
            color: #8e352e;
            text-decoration: none;
        }

        #calendar td, #calendar th {
            padding: 5px;
            box-sizing:border-box;
            border: 1px solid #ccc;
        }

        #calendar .weekdays {
            background: #8e352e;
        }


        #calendar .weekdays th {
            text-align: center;
            text-transform: uppercase;
            line-height: 20px;
            border: none !important;
            padding: 10px 6px;
            color: #fff;
            font-size: 13px;
        }

        #calendar td {
            min-height: 180px;
            display: flex;
            flex-direction: column;
        }

        #calendar .days li:hover {
            background: #d3d3d3;
        }

        #calendar .date {
            text-align: center;
            margin-bottom: 5px;
            padding: 4px;
            background: #333;
            color: #fff;
            width: 20px;
            border-radius: 50%;
            flex: 0 0 auto;
            align-self: flex-end;
        }

        #calendar .event {
            flex: 0 0 auto;
            font-size: 13px;
            border-radius: 4px;
            padding: 5px;
            margin-bottom: 5px;
            line-height: 14px;
            background: #e4f2f2;
            border: 1px solid #b5dbdc;
            color: #009aaf;
            text-decoration: none;
        }

        #calendar .event-desc {
            color: #666;
            margin: 3px 0 7px 0;
            text-decoration: none;
        }

        #calendar .other-month {
            background: #f5f5f5;
            color: #666;
        }

        /* ============================
                        Mobile Responsiveness
           ============================*/


        @media(max-width: 768px) {

            #calendar .weekdays, #calendar .other-month {
                display: none;
            }

            #calendar li {
                height: auto !important;
                border: 1px solid #ededed;
                width: 100%;
                padding: 10px;
                margin-bottom: -1px;
            }

            #calendar, #calendar tr, #calendar tbody {
                grid-template-columns: 1fr;
            }

            #calendar  tr {
                grid-column: 1 / 2;
            }

            #calendar .date {
                align-self: flex-start;
            }
        }
    </style>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Timetable</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Timetable</li>
                </ol>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="row">--}}
{{--                                    <label class="col-sm-12">Class Name</label>--}}
{{--                                    <div class="col-sm-12 validate">--}}
{{--                                        <select required name="__class_id" class="form-control" id="class_id">--}}
{{--                                            <option value="">Select Option</option>--}}
{{--                                            @foreach($classes as $cl)--}}
{{--                                                <option value="{{ $cl->id }}">{{ $cl->name.' - '.$cl->section->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="row">--}}
{{--                                --}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <table id="calendar">
        <caption>August 2014</caption>
        <tr class="weekdays">
            <th scope="col">Sunday</th>
            <th scope="col">Monday</th>
            <th scope="col">Tuesday</th>
            <th scope="col">Wednesday</th>
            <th scope="col">Thursday</th>
            <th scope="col">Friday</th>
            <th scope="col">Saturday</th>
        </tr>

        <tr class="days">
            <td class="day other-month">
                <div class="date">27</div>
            </td>
            <td class="day other-month">
                <div class="date">28</div>
                <div class="event">
                    <div class="event-desc">
                        HTML 5 lecture with Brad Traversy from Eduonix
                    </div>
                    <div class="event-time">
                        1:00pm to 3:00pm
                    </div>
                </div>
            </td>
            <td class="day other-month">
                <div class="date">29</div>
            </td>
            <td class="day other-month">
                <div class="date">30</div>
            </td>
            <td class="day other-month">
                <div class="date">31</div>
            </td>


            <td class="day">
                <div class="date">1</div>
            </td>
            <td class="day">
                <div class="date">2</div>
                <div class="event">
                    <div class="event-desc">
                        Career development @ Community College room #402
                    </div>

                    <div class="event-time">
                        2:00pm to 5:00pm
                    </div>
                </div>
                <div class="event">
                    <div class="event-desc">
                        Test event 2
                    </div>

                    <div class="event-time">
                        5:00pm to 6:00pm
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="day">
                <div class="date">3</div>
            </td>
            <td class="day">
                <div class="date">4</div>
            </td>
            <td class="day">
                <div class="date">5</div>
            </td>
            <td class="day">
                <div class="date">6</div>
            </td>
            <td class="day">
                <div class="date">7</div>
                <div class="event">
                    <div class="event-desc">
                        Group Project meetup
                    </div>
                    <div class="event-time">
                        6:00pm to 8:30pm
                    </div>
                </div>
            </td>
            <td class="day">
                <div class="date">8</div>
            </td>
            <td class="day">
                <div class="date">9</div>
            </td>
        </tr>
        <tr>
            <td class="day">
                <div class="date">10</div>
            </td>
            <td class="day">
                <div class="date">11</div>
            </td>
            <td class="day">
                <div class="date">12</div>
            </td>
            <td class="day">
                <div class="date">13</div>
            </td>
            <td class="day">
                <div class="date">14</div>
                <div class="event">
                    <div class="event-desc">
                        Board Meeting
                    </div>
                    <div class="event-time">
                        1:00pm to 3:00pm
                    </div>
                </div>
            </td>
            <td class="day">
                <div class="date">15</div>
            </td>
            <td class="day">
                <div class="date">16</div>
            </td>
        </tr>
        <tr>

            <td class="day">
                <div class="date">17</div>
            </td>
            <td class="day">
                <div class="date">18</div>
            </td>
            <td class="day">
                <div class="date">19</div>
            </td>
            <td class="day">
                <div class="date">20</div>
            </td>
            <td class="day">
                <div class="date">21</div>
            </td>
            <td class="day">
                <div class="date">22</div>
                <div class="event">
                    <div class="event-desc">
                        Conference call
                    </div>
                    <div class="event-time">
                        9:00am to 12:00pm
                    </div>
                </div>
            </td>
            <td class="day">
                <div class="date">23</div>
            </td>
        </tr>
        <tr>
            <td class="day">
                <div class="date">24</div>
            </td>
            <td class="day">
                <div class="date">25</div>
                <div class="event">
                    <div class="event-desc">
                        Conference Call
                    </div>
                    <div class="event-time">
                        1:00pm to 3:00pm
                    </div>
                </div>
            </td>
            <td class="day">
                <div class="date">26</div>
            </td>
            <td class="day">
                <div class="date">27</div>
            </td>
            <td class="day">
                <div class="date">28</div>
            </td>
            <td class="day">
                <div class="date">29</div>
            </td>
            <td class="day">
                <div class="date">30</div>
            </td>
        </tr>
        <tr>

            <td class="day">
                <div class="date">31</div>
            </td>
            <td class="day other-month">
                <div class="date">1</div>
                <!-- Next Month -->
            </td>
            <td class="day other-month">
                <div class="date">2</div>
            </td>
            <td class="day other-month">
                <div class="date">3</div>
            </td>
            <td class="day other-month">
                <div class="date">4</div>
            </td>
            <td class="day other-month">
                <div class="date">5</div>
            </td>
            <td class="day other-month">
                <div class="date">6</div>
            </td>

    </table>


@endsection




