<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'date','to','from','picture','active','price'
    ];

/**
     * Set the date attribute.
     *
    * @param  string  $value
    * @return void
    */
//    public function setDateAttribute($value)
//    {
//        $this->attributes['date'] = Carbon::parse($value)->format('m/d/Y');
//    }

    public function picture(){

        if (!empty($this->picture)){
            return asset($this->picture);
        }
        return asset('assets/logo/logo.jpg');
    }
    public function cevent()
    {
        return $this->belongsTo(Cevent::class);
    }
    public function eventpic(){
        $q=Event::where('id',$this->nameevent)->get()->first();
        return $q->picture;
    }
    
}
