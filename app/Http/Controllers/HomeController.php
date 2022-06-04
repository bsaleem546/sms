<?php

namespace App\Http\Controllers;
use App\Models\_Class;
use App\Models\Admission;
use App\Models\Fees;
use App\Models\LiveClass;
use App\Models\Salary;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\NoticeBoard;
use App\Models\_Session;
use App\Models\Student;
use App\Models\TimeTable;
use App\Models\Staff;
use App\Models\StaffAttendence;
use Illuminate\Support\Facades\DB;
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
            $present = count(StaffAttendence::where('staff_id',$data->id)->where('status','present')->get());
            $absent = count(StaffAttendence::where('staff_id',$data->id)->where('status','absent')->get());
            $leave = count(StaffAttendence::where('staff_id',$data->id)->where('status','leave')->get());
            $late = count(StaffAttendence::where('staff_id',$data->id)->where('status','late')->get());
            $data2 = NoticeBoard::latest()->first();
            //Students
            $SESSIONID = _Session::where('status', 1)->first();
            $data1 = array();
//            $staff = Staff::where('email', auth()->user()->email)->first();
            $SUBID = DB::table('subject_staff')
                ->join('subjects', 'subjects.id', '=', 'subject_staff.subject_id')
                ->where('staff_id', $data->id)->distinct()->get(['__class_id']);
//            dd($SUBID);
            foreach ($SUBID as $sub){
                $std = Student::where('__class_id', $sub->__class_id)->where('__session_id', $SESSIONID->id)->get();
                foreach($std as $student){
                    array_push($data1, $student);
                }
            }
            $transport = $data->transport;
            $SUB = DB::table('subject_staff')->where('staff_id',$data->id)->distinct()->get(['subject_id']);
//            dd($SUB);
//TimeTable
            $timetable = array();
            $staff = Staff::where('email',auth()->user()->email)->first();
            $SUBID = DB::table('subject_staff')
                ->join('subjects', 'subjects.id', '=', 'subject_staff.subject_id')
                ->where('staff_id', $staff->id)->distinct()->get(['__class_id']);
            foreach ($SUBID as $sub){
                $tt = TimeTable::where('__class_id', $sub->__class_id)->latest()->get();
                foreach ($tt as $t){
                    array_push($timetable, $t);
                }
            }
//salary chart
            $salary = Salary::where('staff_id',$data->id)->latest()->first();
//            dd($present);
            return view('home',compact('present','absent','leave','data','data2','late','data1','SUBID','transport','SUB','timetable','salary'));
        }

        if(auth()->user()->is_student){
            $d = Admission::where('student_auth_id',auth()->user()->id)->first();
//            dd($d);
            $transport = $d->st;
            $fee = Fees::where('admission_id',$d->id)->latest()->first();
            $announcement = NoticeBoard::latest()->first();
            $livelink = LiveClass::where('class_id',$d->__class_id)->latest()->first();
//fee chart
//            $chart_options = [
//                'chart_title' => 'Users by months',
//                'report_type' => 'group_by_date',
//                'model' => Fees::where('admission_id',$d->id)->get(),
//                'group_by_field' => 'created_at',
//                'group_by_period' => 'month',
//                'chart_type' => 'bar',
//            ];
//            $chart1 = new LaravelChart($chart_options);

             $fees = Fees::where('admission_id',$d->id)->get();
//             dd($fee);


        }

        return view('home',compact('transport','fee','announcement','livelink','fees'));
    }

}
