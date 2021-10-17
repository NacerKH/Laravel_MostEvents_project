<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\Oner;
use App\Models\Cevent;
use App\Models\Event;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'phone', 'adress', 'role', 'gender', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar(){

        if (!empty($this->avatar)){
            return asset($this->avatar);
        }
        return asset('assets/logo/logop.png');
    }
    public function cevents() 
    {
    return $this->hasMany(Cevent::class);
    }
    public function oners() 
    {
    return $this->hasMany(Oner::class);
    }
    public function oner()
    {
        return Oner::where('user_id', $this->id)->first();
    }
    public function client()
    {
        return User::where('id', $this->id)->first();
    }
    public function cevent()
    {
        return Cevent::where('cevent_id', $this->id)->first();
    }
  
    public function haveEvent()
    {
        return (!empty($this->cevent()->id));
    }
    public function haveOner()
    {
        return (!empty($this->oner()->id));
    }
    

    public function fullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    public function isAdmin()
    {
        return $this->role === "admin";
    }
    public function isClient()
    {
        return $this->role === "client<";
    }
    public function isManagerevent()
    {
        return $this->role === "cevent";
    }
    public function isManageroner()
    {
        return $this->role === "oner";
    }
   
    public function namelogo() {
        $manager = EVent::find($this->user_id);
        return $manager->picture;
    }
    public function ceventId()
    {
        return (!empty($this->cevent()->id)) ? $this->cevent()->id : null;
    }
    
}
