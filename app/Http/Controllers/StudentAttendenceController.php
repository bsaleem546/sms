<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\Student;
use App\Models\StudentAttendence;
use Illuminate\Http\Request;

class StudentAttendenceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:s_att-list|s_att-create|s_att-edit|s_att-delete', ['only' => ['index','store']]);
        $this->middleware('permission:s_att-create', ['only' => ['create','store']]);
        $this->middleware('permission:s_att-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:s_att-delete', ['only' => ['destroy']]);
        $this->middleware('permission:s_att-list', ['only' => ['listView']]);
    }

    public function listView()
    {
        $data = StudentAttendence::all();
        return view('student-atd.list', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->data as $d){

                $student = Student::findOrFail( $d['id'] );

                $chk = StudentAttendence::where('__class_id', $student->_class->id)->where('student_id', $student->id)
                        ->where('added_at', $d['date'])->first();

                if ($chk !== null){
                    $chk->attendence = $d['status'];
                    $chk->update();

                }
                else{
                    StudentAttendence::create([
                        'admission_id' => $student->admission->id,
                        '__class_id' => $student->_class->id,
                        '__session_id' => $student->__session_id,
                        'student_id' => $student->id,
                        'attendence' => $d['status'],
                        'added_at' => $d['date']
                    ]);
                }
            }

            return response()->json([ 'status' => true, 'msg' => 'Attendance marked' ]);
        }
        catch (\Exception $exception){
            return response()->json([ 'status' => false, 'msg' => $exception->getMessage() ]);
        }
        dd($request);
    }

    public function getStudentsFromClass($id)
    {
        return Student::where('__class_id', $id)->where('status', 'active')->get();
    }

    public function index()
    {
        $class = _Class::all();
        return view('student-atd.index', compact('class'));
    }
}
