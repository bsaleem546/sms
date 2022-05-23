<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\_Session;
use App\Models\Result;
use App\Models\ResultDetail;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamResultController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:result-list|result-create|result-edit|result-delete', ['only' => ['index','store']]);
        $this->middleware('permission:result-create', ['only' => ['create','store']]);
        $this->middleware('permission:result-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:result-delete', ['only' => ['destroy']]);
    }

    public function getSubjectsAndStudents($id)
    {
        $subjects = Subject::where('__class_id', $id)->get();
        $students = Student::where('__class_id', $id)->get();
        return response()->json([ 'subjects' => $subjects, 'students' => $students ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = DB::table('results')
//            ->join('result_detail','result.id','result_detail.id')
//            ->select('result.exam_type as term')->get();
        $data = Result::with('__class')->latest()->get();
        return view('result.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = _Class::latest()->get();
        return view('result.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $admission = Student::findOrFail($request->formData['student_id']);
            $session = _Session::where('status', 1)->first();

            $total_marks = 0;
            $obt_marks = 0;
            foreach ($request->local_subjects as $ls){
                $total_marks += $ls['total_marks'];
                $obt_marks += $ls['obt_marks'];
            }
            $percentage = ceil($obt_marks/$total_marks*100);
            $grade = null;
            $status = null;
            if ($percentage > 90){ $grade = 'A+'; }
            else if ($percentage > 80 && $percentage < 90){ $grade = 'A'; $status = 'pass'; }
            else if ($percentage > 70 && $percentage < 80){ $grade = 'B'; $status = 'pass'; }
            else if ($percentage > 60 && $percentage < 70){ $grade = 'C'; $status = 'pass'; }
            else if ($percentage > 50 && $percentage < 60){ $grade = 'D'; $status = 'pass'; }
            else { $grade = 'F'; $status = 'fail'; }

            $result = Result::create([
                'admission_id' => $admission->admission_id,
                'student_id' => $admission->id,
                'class_id' => $request->formData['class_id'],
                'session_id' => $session->id,
                'exam_type' => $request->formData['exam_type'],
                'total_marks' => $total_marks,
                'obtained_marks' => $obt_marks,
                'percentage' => $percentage,
                'grade' => $grade,
                'status' => $status,
            ]);

            foreach ($request->local_subjects as $ls){
                ResultDetail::create([
                    'result_id' => $result->id,
                    'subject_name' => $ls['subject_name'],
                    'subject_marks' => $ls['total_marks'],
                    'obtained_marks' => $ls['obt_marks'],
                ]);
            }
            DB::commit();
            return response()->json([ 'status' => true, 'msg' => 'Record saved....' ]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response()->json([ 'status' => false, 'msg' => $exception->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Result::findOrFail($id);
        $classes = _Class::latest()->get();
        $rds = ResultDetail::where('result_id', $id)->get();
        return view('result.edit', compact('classes', 'data', 'rds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $grade = null;
            $status = null;
            $percentage = ceil($request->formData['per']);
            $total_marks = $request->formData['total'];
            $obt_marks = $request->formData['obt'];

            if ($percentage > 90){ $grade = 'A+'; }
            else if ($percentage > 80 && $percentage < 90){ $grade = 'A'; $status = 'pass'; }
            else if ($percentage > 70 && $percentage < 80){ $grade = 'B'; $status = 'pass'; }
            else if ($percentage > 60 && $percentage < 70){ $grade = 'C'; $status = 'pass'; }
            else if ($percentage > 50 && $percentage < 60){ $grade = 'D'; $status = 'pass'; }
            else { $grade = 'F'; $status = 'fail'; }

            $data = Result::findOrFail($id);
            $data->total_marks = $total_marks;
            $data->obtained_marks = $obt_marks;
            $data->percentage = $percentage;
            $data->grade = $grade;
            $data->status = $status;
            $data->update();

            foreach ($request->local_result_details as $ls){
                $rs = ResultDetail::findOrFail($ls['id']);
                $rs->subject_name = $ls['subject_name'];
                $rs->subject_marks = $ls['total_marks'];
                $rs->obtained_marks = $ls['obt_marks'];
                $rs->update();
            }
            DB::commit();
            return response()->json([ 'status' => true, 'msg' => 'Record saved....' ]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response()->json([ 'status' => false, 'msg' => $exception->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            DB::beginTransaction();
            try {
                ResultDetail:: where('result_id',$id)->delete();
                Result::where('id', $id)->delete();

                DB::commit();
                return redirect()->route('result.index')
                    ->with( 'success', 'Record deleted.....' );
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('error',$exception->getMessage());
            }
        }
    }
}
