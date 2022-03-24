<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmissionRequest;
use App\Http\Requests\AdmissionUpdateRequest;
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

    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            Fees::where('admission_id', $id)->delete();
            Student::where('admission_id', $id)->delete();
            Admission::where('id', $id)->delete();

            DB::commit();
            return redirect()->route('admission.index')
                ->with( 'success', 'Record deleted.....' );
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
        dd($id);
    }

    public function update(AdmissionUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $img = null;
            if ($request->id_proof !== null){
                $img = time().'.' . $request->id_proof->getClientOriginalExtension();
                \Image::make($request->id_proof)->save(public_path('uploads/students/').$img);
            }

            $admission = new AdmissionResource($request);
            $res = $admission->update($data, $id, $img);
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
                DB::commit();
                return redirect()->route('admission.index')
                    ->with( 'success',$res['success'] );
            }
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Admission::findOrFail($id);
        $ad_fee = Fees::where('admission_id', $id)->where('fee_type', 'admission')->first();
        $tt_fee = Fees::where('admission_id', $id)->where('fee_type', 'tuition')->latest()->first();
        $tp_fee = null;
        if ($data->is_trans == 1){
            $tp_fee = Fees::where('admission_id', $id)->where('fee_type', 'transportation')->latest()->first();
        }
        return view('admissions.edit', compact('data', 'ad_fee', 'tt_fee', 'tp_fee'));
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
