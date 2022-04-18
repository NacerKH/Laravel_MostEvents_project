<?php

use Illuminate\Database\Seeder;

use App\Models\Oner;
use App\Models\Viewer;

class ViewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $viewer= new Viewer();
        $viewer->name="visitors";
        $viewer->viewers= 1;
   
        $viewer->save();
     
  
  
      
       
    }
}
