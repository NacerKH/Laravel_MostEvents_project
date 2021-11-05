<?php

use Carbon\Carbon;

use App\Models\Cevent;
use Illuminate\Database\Seeder;

class CeventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $cevent= new Cevent();
        $cevent->subscription_end_date = Carbon::createFromFormat('Y-m-d H:i:s', now())->addMonths(1)->toDateString();
     
        $cevent->active = 1;
        $cevent->cevent_id= 3;
        $cevent->save();
     

  
  
      
       
    }
}
