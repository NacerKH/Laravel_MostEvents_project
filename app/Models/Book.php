<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function user(){
        
        return User::find($this->user_id);
    }
    public function nameoner() {
        $manager = Oner::find($this->user_id);
        return $manager->name;
    }
    public function managerFullName() {
        $manager = User::find($this->oner_id);
        return $manager->firstname . " " . $manager->lastname;
    }
    public function namelogo() {
        $manager = Oner::find($this->user_id);
        return $manager->logo();
    }
}
