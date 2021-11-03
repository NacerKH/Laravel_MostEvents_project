<?php

use Illuminate\Database\Seeder;

use App\Models\Oner;
class OnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $oner= new Oner();
        $oner->name="california";
        $oner->active = 1;
        $oner->user_id= 4;
        $oner->save();
     
  
  
      
       
    }
}
