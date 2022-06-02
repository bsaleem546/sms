<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;
use App\Models\Staff;
use App\Models\StaffAttendence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_teacher){
            $data = Staff::where('user_id',auth()->user()->id)->first();
            $present = StaffAttendence::where('staff_id',$data->id)->where('status','present')->get();
            $absent = StaffAttendence::where('staff_id',$data->id)->where('status','absent')->get();
            $leave = StaffAttendence::where('staff_id',$data->id)->where('status','leave')->get();
            $late = StaffAttendence::where('staff_id',$data->id)->where('status','late')->get();
            $data2 = NoticeBoard::latest()->first();
//        dd($data1);
            return view('home',compact('present','absent','leave','data','data2','late'));
        }
    }

}
