<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneRecord extends Model
{
    use HasFactory;
    protected $table = "zone_records";
    protected $fillable = ['name'] ;

    function zone(){
        return $this->belongsTo(Zone::class,'zone_id');
    }
}
