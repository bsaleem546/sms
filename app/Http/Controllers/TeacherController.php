<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Subject;
use App\Models\SUBSTAFF;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class TeacherController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:teacher-list|teacher-create|teacher-edit|teacher-delete', ['only' => ['index','store']]);
        $this->middleware('permission:teacher-create', ['only' => ['create','store']]);
        $this->middleware('permission:teacher-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:teacher-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('user_department')
            ->join('users', 'users.id', '=', 'user_department.user_id')
            ->join('departments', 'departments.id', '=', 'user_department.department_id')
            ->join('staffs', 'staffs.user_id', '=', 'users.id')
            ->select('staffs.*')->where('departments.name', 'Teacher')
            ->get();

        return view('teachers.index', compact('data'));
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
        DB::beginTransaction();
        try {

            $request->validate([
                "staff_id" => "required",
                "subjects" => "required",
            ]);

            $countSubjects = count($request->subjects);

            SUBSTAFF::where('staff_id', $request->staff_id)->delete();

            for ($i = 0; $i < $countSubjects; $i++){
                SUBSTAFF::create([
                    "staff_id" => $request->staff_id,
                    "subject_id" => $request->subjects[$i],
                ]);
            }
            DB::commit();
            return redirect()->route('teachers.index')
                ->with( 'success', 'Record created.....' );
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
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
        $data = Staff::findOrFail($id);
        $user = User::where('id', $data->user_id)->first();
        $userRole = $user->roles->first();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$userRole->id)
            ->get();
        return view('teachers.show', compact('data', 'userRole', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff_id = $id;
        $staff = Staff::findOrFail($id);
        $subjects = Subject::latest()->get();
        $data = DB::table('subject_staff')->where('staff_id', $id)->get();
        return view('teachers.assign', compact('data', 'subjects', 'staff_id', 'staff'));
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
