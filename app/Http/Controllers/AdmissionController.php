<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admission-confirm', ['only' => ['store']]);
    }

    public function store(Request $request)
    {
        dd($request);

        DB::beginTransaction();
        try {

            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }
}
