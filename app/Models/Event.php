<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
