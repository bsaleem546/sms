<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\Subject;
use App\Models\TimeTable;
use App\Services\TimeSlotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeTableController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:time-table-list|time-table-create|time-table-edit|time-table-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:time-table-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:time-table-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:time-table-delete', ['only' => ['destroy']]);
    }

    public function getTimetable($id)
    {
        $arr = array();
        $data = TimeTable::with('subject')->where('__class_id', $id)->get();
        foreach ($data as $d){
            $timseslot = $d->start_time.' - '.$d->end_time;

            array_push($arr, [ 'timeslot' => $d->start_time.' - '.$d->end_time, 'day' => $d->day, 'subject' => $d->subject->name ]);
        }
        dd( $arr );

       return TimeTable::with('subject')->where('__class_id', $id)->get();
    }

    public function getSubjectsByClass($id)
    {
        return Subject::where('__class_id', $id)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = _Class::all();
        return view('timetables.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = _Class::all();
        $subjects = Subject::all();
        $timeslots = new TimeSlotService();

//        dd($timeslots->timeslotarray());
        return view('timetables.create', compact('classes', 'subjects','timeslots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        DB::beginTransaction();

        try {
            $data = $request->validate([
                "__class_id" => "required",
                "subject_id" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "day" => "required",
            ]);

            $data1 = TimeTable::where('__class_id', $request->__class_id)
                ->where('start_time', $request->start_time)
                ->where('end_time', $request->end_time)
                ->where('day', $request->day)->first();

            if($data1 !== null){
                DB::rollBack();
                return redirect()->back()->with('error','Time Slot Already Exist ');
            }

            TimeTable::create($data);

            DB::commit();
            return redirect()->route('time-tables.create')
                ->with('success', 'Record updated.....');

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
