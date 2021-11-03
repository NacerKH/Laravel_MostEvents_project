<?php

use Illuminate\Database\Seeder;

use App\Models\Cevent;
class CeventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $cevent= new Cevent();
     
        $cevent->active = 1;
        $cevent->cevent_id= 3;
        $cevent->save();
     

  
  
      
       
    }
}
