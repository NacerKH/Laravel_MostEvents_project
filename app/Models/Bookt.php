<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookt extends Model
{
 public function events()
  {


    return $this->hasMany(Event::class); 
 }





    function user(){
        
        return User::find($this->user_id);
    }
    
    public function evename() {
        
        $manager = Event::where('id',$this->nameevent)->get()->first();
        
       
       
        return $manager->name;
    }
    public function eventpic(){
        $q=Event::where('id',$this->nameevent)->get()->first();
        return $q->picture;
    }
}
