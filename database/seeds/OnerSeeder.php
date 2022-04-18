<?php

use Carbon\Carbon;

use App\Models\Oner;
use Illuminate\Database\Seeder;

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
        $oner->subscription_end_date = Carbon::createFromFormat('Y-m-d H:i:s', now())->addMonths(1)->toDateString();

        $oner->user_id= 4;
        $oner->save();
     
  
  
      
       
    }
}
