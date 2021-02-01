<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneRecord extends Model
{
    use HasFactory;
    protected $table = "zone_records";
    protected $fillable = ['name','A','AAAA','CNAME','TXT','NS'] ;
    protected $hidden = ['id','zone_id','updated_at','created_at','entries'];

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
