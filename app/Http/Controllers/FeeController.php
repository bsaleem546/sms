<?php

namespace App\Http\Controllers;

use App\Models\Fees;
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
        return view('fees.create');
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
                "payment_type" => "required",
                "operator" => "required",
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
            $fee->paid_at = date('M d, Y');
            $fee->update();

//            DB::commit();
            return redirect()->route('fees.index')
                ->with( 'success', 'Record updated.....' );
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
        dd($request);
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
