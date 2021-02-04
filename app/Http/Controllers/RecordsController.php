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
        $request->validate(['name' => "required"]);
        $result = $zone->records()->where('name',$request->name)->first();
        if($result){
            return view('app/record/create')->withError(['name'=> 'Record already exists']);
        }
        $record =  $zone->records()->create($request->all());
        return redirect()->route('show-zone-record-entries',$record->id);
    }
    function deleteRecord(Request $request,$record_id){
        $record =  auth()->user()->records()->findOrFail($record_id);
        $record->delete();
        return redirect()->action([self::class,"showRecords"],$record->zone_id);
    }
    function editRecord(Request $request,$record_id){
        $record = auth()->user()->records()->findOrFail($record_id);
        return view('app/record/edit')->with(['record'=>$record]);
    }
    function doEditRecord(Request $request,$record_id){
        $record = auth()->user()->records()->findOrFail($record_id);
        $record->update($request->all());
        return redirect()->action([self::class,"editRecord"],$record_id);
    }
}
