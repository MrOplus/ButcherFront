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
        foreach ($zones as $zone){
            $zone_shadow = $zone->toArray();
            $zone_shadow['records'] = [] ;
            foreach ($zone->records as $record){
                $record_shadow  = $record->toArray();
                $record_shadow['entries'] = [] ;
                foreach ($record->entries as $entry){
                    $entry_shadow = $entry->toArray();
                    if(!isset($record_shadow['entries'][$entry->type]))
                        $record_shadow['entries'][$entry->type] = [] ;
                    $record_shadow['entries'][$entry->type][] = $entry_shadow;
                }
                $zone_shadow['records'][] = $record_shadow;
            }
            $structure[] = $zone_shadow;
        }
        Storage::put('config.json',json_encode($structure));
        return view('app/config/apply')->with(['message'=>'Applying Configurations ... it may takes up to 1 minuets depends on your dataset size']);

    }
    function confirm(){
        return view('app/config/apply');
    }
}
