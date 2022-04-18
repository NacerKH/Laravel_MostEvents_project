<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cevent extends Model
{
    protected $fillable = [
         'cevent_id','picture','active','expire'
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    
    public function picture(){

        if (!empty($this->picture)){
            return asset($this->picture);
        }
        return asset('assets/logo/logoeve.png');
        
    }
    public function managerFullNamec() {
        $manager = User::find($this->cevent_id);
        return $manager->firstname . " " . $manager->lastname;
    }
    public function managerPHonec() {
        $manager = User::find($this->cevent_id);
        return $manager->phone;
    }
    

    public function event(){
        $event = Event::where('cevent_id',$this->id);
        if (!$this->isCevent()){
            $event = $event->where("active",true);
        }    
        return $event->orderBy('id','desc')->get();
    }
    public function isCevent(){  
        return (auth()->id() ==  $this->cevent_id);

    }
    public function bookingt(){
        return Bookt::where('cevent_id',$this->id)->orderBy('id','desc')->get();
 }
 public function post(){
    $event = Event::where('event_id',$this->id);
    if (!$this->isManager()){
        $event = $event->where("active",true);
    }    
    return $event->orderBy('id','desc')->get();
}
public function isManager(){  
    return (auth()->id() == $this->cevent_id);

}
public function booking(){
    return Book::where('user_id',$this->id)->orderBy('id','desc')->get();
}

public function events() 
{
return $this->hasMany(Event::class);
}

}
