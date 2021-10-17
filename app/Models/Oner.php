<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oner extends Model
{
    protected $fillable = [
        'name', 'user_id', 'active','logo'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function managerFullName() {
        $manager = User::find($this->user_id);
        return $manager->firstname . " " . $manager->lastname;
    }
    public function managerPHone() {
        $manager = User::find($this->user_id);
        return $manager->phone;
    }
  
    public function logo(){

        if (!empty($this->logo)){
            return asset($this->logo);
        }
        return asset('assets/logo/logo.jpg');
    }
   public function isOner(){  
        return (auth()->id() == $this->user_id);

    }
    public function booking(){
     return Book::where('user_id',$this->id)->orderBy('id','desc')->get();
 }
}