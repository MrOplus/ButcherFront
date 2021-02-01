<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    function apply(Request $request) {
        $structure = [] ;
        $zones = Zone::all();
        foreach($zones as $zone){
            $zone_array = $zone->toArray();
            $zone_array['records'] = [];
            foreach ($zone->records as $record){
                $temp = $record->toArray();
                $temp['entries'] = null ;
                foreach ($record->entries()->orderBy('order')->get() as $entry){
                    $temp['entries'][$entry->type][] = $entry->toArray();
                    $zone_array['records'][] = $temp;
                }
            }
            $structure[] = $zone_array;
        }
        Storage::put('config.json',json_encode($structure));
        return view('app/config/apply')->with(['message'=>'Applying Configurations ... it may takes up to 1 minuets depends on your dataset size']);

    }
    function confirm(){
        return view('app/config/apply');
    }
}
