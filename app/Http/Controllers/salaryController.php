<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class salaryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:salary-list|salary-create|salary-edit|salary-delete', ['only' => ['index','store']]);
        $this->middleware('permission:salary-create', ['only' => ['create','store']]);
        $this->middleware('permission:salary-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:salary-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Salary::latest()->get();
        return view('salary.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::latest()->get();
        return view('salary.create', compact('staffs'));
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
        $data = Salary::findOrFail($id);
        $staffs = Staff::latest()->get();
        return view('salary.edit', compact('staffs', 'data'));
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
        DB::beginTransaction();
        try {
            Salary::find($id)->delete();
            DB::commit();
            return redirect()->route('salaries.index')
                ->with('success','Staff Salary deleted successfully');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
        }
    }
}
