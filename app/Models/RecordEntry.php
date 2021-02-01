<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordEntry extends Model
{
    use HasFactory;
    protected $table = "record_entries";
    protected $fillable = ['type','weight','ttl','order','value'];

    function record(){
        return $this->belongsTo(ZoneRecord::class,'record_id');
    }
    function setValueAttribute($value){
        $this->attributes['value'] = strtolower($value);
    }
}
