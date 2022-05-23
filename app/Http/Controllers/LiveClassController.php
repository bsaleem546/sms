<?php

namespace App\Http\Controllers;

use App\Models\_Class;
use App\Models\LiveClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveClassController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:live-class-list|live-class-create|live-class-edit|live-class-delete', ['only' => ['index','store']]);
        $this->middleware('permission:live-class-create', ['only' => ['create','store']]);
        $this->middleware('permission:live-class-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:live-class-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LiveClass::latest()->get();
        return view('live-classes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = _Class::latest()->get();
        return view('live-classes.create', compact('classes'));
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
                'class_id' => 'required',
                'meeting_link' => 'required',
            ]);

            LiveClass::create([
                'class_id' => $request->class_id,
                'user_id' => auth()->user()->id,
                'meeting_link' => $request->meeting_link,
            ]);

            DB::commit();
            return redirect()->route('live-classes.index')
                ->with('success','Link saved successfully');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
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
        $classes = _Class::latest()->get();
        $data = LiveClass::findOrFail($id);
        return view('live-classes.edit', compact('classes', 'data'));
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
                'class_id' => 'required',
                'meeting_link' => 'required',
                'status' => 'required',
            ]);

            LiveClass::where('id', $id)->update([
                'class_id' => $request->class_id,
                'user_id' => auth()->user()->id,
                'meeting_link' => $request->meeting_link,
                'status' => $request->status,
            ]);

            DB::commit();
            return redirect()->route('live-classes.index')
                ->with('success','Link saved successfully');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
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
            LiveClass::where('id', $id)->delete();
            DB::commit();
            return redirect()->route('live-classes.index')
                ->with('success','Link deleted successfully');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
        }
    }
}
