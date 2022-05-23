<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

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
        $data = Result::latest()->get();
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
        dd($request);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
