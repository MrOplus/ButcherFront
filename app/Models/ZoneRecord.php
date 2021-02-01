<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneRecord extends Model
{
    use HasFactory;
    protected $table = "zone_records";
    protected $fillable = ['name','A','AAAA','CNAME','TXT','NS'] ;

    function zone(){
        return $this->belongsTo(Zone::class,'zone_id');
    }
    function entries() {
        return $this->hasMany(RecordEntry::class,'record_id');
    }
    function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
