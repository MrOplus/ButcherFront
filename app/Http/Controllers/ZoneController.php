<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoneController extends Controller
{
    function create(){
        return view('app/zone/create');
    }
    function doCreate(Request $request){
        $request->validate(['name'=>'required|unique:zones','owner'=>'required|email']);
        $zone = auth()->user()->zones()->create($request->only(['name','owner']));
        if($zone){
            return redirect()->route('show-zone-record',$zone->id);
        }else{
            return view('app/zone/create')->withErrors(["Unable to create record"]);
        }
    }
    function showZone($id){
        $zone = auth()->user()->zones()->findOrFail($id);
        return view('app/zone/edit')->with(['zone' => $zone]);

    }
    function doEditZone(Request $request,$id){
        $request->validate(['owner'=>'required|email']);
        $zone = auth()->user()->zones()->findOrFail($id);
        $zone->owner = $request->owner;
        $zone->save();
        return view('app/zone/edit')->with(['zone' => $zone]);
    }
}
