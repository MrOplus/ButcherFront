<?php

namespace App\Http\Controllers;

use App\Models\RecordEntry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    function showEntries(Request $request,$record_id){
        $record = auth()->user()->records()->findOrFail($record_id);
        return view('app/entry/entries')->with(['record'=>$record]);
    }
    function addEntry(Request $request,$record_id){
        $record = auth()->user()->records()->findOrFail($record_id);
        return view('app/entry/add')->with(['record'=>$record]);
    }
    function doAddEntry(Request $request,$record_id){
        $request->validate([
            'type'=>'required',
            'ttl' => 'required|numeric',
            'value' => 'required',
            'weight' => 'required|numeric',
            'order' => 'required|numeric'
        ]);
        $valid_types = ['AAAA','A','NS','TXT','CNAME'];
        if (!in_array($request->type,$valid_types))
            abort(403);
        $record = auth()->user()->records()->findOrFail($record_id);
        $record->entries()->create($request->all());
        return redirect()->action([self::class,'showEntries'],$record_id);
    }
    function editEntry(Request $request,$entry_id){
        $entry = RecordEntry::findOrFail($entry_id);
        if($entry->record->zone->user->id != auth()->user()->id)
            abort(403);
        return view('app/entry/edit')->with(['entry'=>$entry]);
    }
    function doEditEntry(Request $request,$entry_id){
        $entry = RecordEntry::findOrFail($entry_id);
        if($entry->record->zone->user->id != auth()->user()->id)
            abort(403);
        $entry->update($request->all());
        return redirect()->route("show-zone-record-entries",$entry->record->id);
    }
    function deleteEntry(Request $request,$entry_id){
        $entry = RecordEntry::findOrFail($entry_id);
        if($entry->record->zone->user->id != auth()->user()->id)
            abort(403);
        $entry->delete();
        return redirect()->route("show-zone-record-entries",$entry->record->id);
    }
}
