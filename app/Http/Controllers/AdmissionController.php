<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmissionRequest;
use App\Http\Resources\AdmissionResource;
use App\Models\_Session;
use App\Models\Admission;
use App\Models\Fees;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdmissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admission-list|admission-create|admission-edit|admission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:admission-create', ['only' => ['create']]);
        $this->middleware('permission:admission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admission-delete', ['only' => ['destroy']]);
        $this->middleware('permission:admission-confirm', ['only' => ['store']]);
    }

    public function edit($id)
    {
        $data = Admission::findOrFail($id);
        return view('admissions.edit', compact('data'));
    }

    public function create()
    {
        return view('admissions.create');
    }

    public function index()
    {
        $data = Admission::latest()->get();
        return view('admissions.index', compact('data'));
    }

    public function store(AdmissionRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $admission = new AdmissionResource($request);
            $res = $admission->save($data);
            $ad_id = $res['ad_id'];

            if ( $res['status'] == false){
                return redirect()->back()->with( 'error', $res['error'] );
            }
            else{
                if ($request->is_login == 1){
                    $user = User::create([
                        'name' => $request->student_name,
                        'email' => $request->email,
                        'password' => Hash::make('student123'),
                    ]);
                    $role = Role::find(3);
                    $user->assignRole([$role->id]);
                    Admission::where('id', $ad_id)->update([ 'student_auth_id' => $user->id ]);
                }

                if ($request->reg_id > 0){
                    Registration::where('id', $request->reg_id)->update([ 'status' => 'admitted' ]);
                    DB::commit();
                    return redirect()->route('registrations.students')
                        ->with( 'success',$res['success'] );
                }
                else{
                    DB::commit();
                    return redirect()->route('admission.index')
                        ->with( 'success',$res['success'] );
                }

            }
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }
}
