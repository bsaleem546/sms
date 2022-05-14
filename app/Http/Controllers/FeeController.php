<?php

namespace App\Http\Controllers;

use App\Models\_Session;
use App\Models\Admission;
use App\Models\Fees;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:fee-list|fee-create|fee-edit|fee-delete', ['only' => ['index','store']]);
        $this->middleware('permission:fee-create', ['only' => ['create','store']]);
        $this->middleware('permission:fee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fee-delete', ['only' => ['destroy']]);
    }

    public function printView($id)
    {
        $data = array();
        if ($id === 0){
            $fees = Fees::where('status', 'pending')->get();
            foreach ($fees as $f){
                $data = Student::with('fees')->where('students.id', $f->student_id)->get();
            }
            dd($data);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Fees::latest()->get();
        return view('fees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Admission::all();
        return view('fees.create', compact('students'));
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
                "admission_id" => "required",
                "fee_type" => "required",
                "fee_amount" => "required",
                "month_of" => "required",
                "due_date" => "required",
            ]);

            $get_admission = Admission::findOrFail($request->admission_id);
            $get_session = _Session::where('status', 1)->first();

            Fees::create([
                'admission_id' => $request->admission_id,
                '__session_id' => $get_session->id,
                'student_id' => $get_admission->student->id,
                'fee_type' => $request->fee_type,
                'fee_amount' => $request->fee_amount,
                'month_of' => $request->month_of,
                'due_date' => $request->due_date,
                'status' => 'pending',
            ]);

            DB::commit();
            return redirect()->route('fees.index')
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
        $data = Fees::findOrFail($id);
        return view('fees.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fees::findOrFail($id);
        return view('fees.edit', compact('data'));
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

            $request->validate([
                "payment_type" => "nullable",
                "operator" => "nullable",
                "transaction_id" => "nullable",
                "paid_amount" => "required",
                "fee_discount" => "nullable",
            ]);

            $fee = Fees::findOrFail($id);
            $fee->payment_type = $request->payment_type;
            $fee->operator = $request->operator;
            $fee->transaction_id = $request->transaction_id;
            $fee->fee_discount = $request->fee_discount;
            $fee->paid_amount = $request->paid_amount;
            $fee->balance_amount = $fee->fee_amount - $request->paid_amount;
            $fee->paid_at = date('Y-m-d');
            $fee->status = 'paid';
            $fee->update();

            DB::commit();
            return redirect()->route('fees.index')
                ->with( 'success', 'Record updated.....' );
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
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
        DB::beginTransaction();
        try {
            Fees::where('id', $id)->delete();

            DB::commit();
            return redirect()->route('fees.index')
                ->with( 'success', 'Record deleted.....' );
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }
}
