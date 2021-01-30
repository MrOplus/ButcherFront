<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordEntry extends Model
{
    use HasFactory;
    protected $table = "record_entries";


    function record(){
        return $this->belongsTo(ZoneRecord::class,'record_id');
    }
}
