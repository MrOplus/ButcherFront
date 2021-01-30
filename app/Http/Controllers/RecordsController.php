<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    function showRecords(Request $request , $zone_id){
        $zone = auth()->user()->zones()->findOrFail($zone_id);
        return view('app/record/records')->with(['zone'=>$zone]);
    }
    function addRecord(Request $request,$zone_id){
        return view('app/record/create');
    }
}
