<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';
    protected $fillable = ["name","owner"];
    protected $hidden = ['updated_at','created_at'];
    function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
    function records() {
        return $this->hasMany(ZoneRecord::class,'zone_id');
    }
    function user() {
        return $this->belongsTo(User::class,'user_id');
    }

}
