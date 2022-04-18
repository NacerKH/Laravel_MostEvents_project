<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{ protected $fillable = [
    'name','viewers'
];
public $timestamps=false;
}
