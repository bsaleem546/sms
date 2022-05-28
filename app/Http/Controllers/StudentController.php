<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','store']]);
        $this->middleware('permission:student-create', ['only' => ['create','store']]);
        $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->is_teacher ){
            $data = array();
            $staff = Staff::where('email', auth()->user()->email)->first();
            foreach ($staff->subjects as $sub){
                array_push($data, $sub->_class->student);
            }
            return view('students.index',compact('data'));
        }
        $data = Student::latest()->get();
        return view('students.index',compact('data'));


//        $data = Student::latest()->get();
//        return view('students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findOrFail($id);
        return view('students.show', compact('data'));
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
        try {

            Student::where('id', $id)->update([ 'status' => 'not-active' ]);

            return redirect()->route('students.index')
                ->with( 'success', 'Record deleted.....' );
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }
}
