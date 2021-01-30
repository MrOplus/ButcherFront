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
        $zone = auth()->user()->zones()->findOrFail($zone_id) ;
        return view('app/record/create')->with(['zone'=> $zone]);
    }
    function doAddRecord(Request  $request,$zone_id){
        $zone = auth()->user()->zones()->findOrFail($zone_id);
        $request->validate(['name' => "required|unique:zone_records,name,zone_id"]);
        $record =  $zone->records()->create($request->all());
        return $record;
    }
    function deleteRecord(Request $request,$record_id){
        $record =  auth()->user()->records()->findOrFail($record_id);
        $record->delete();
        return redirect()->action([self::class,"showRecords"],$record->zone_id);
    }
    function editRecord(){

    }
    function doEditRecord(){

    }
}
