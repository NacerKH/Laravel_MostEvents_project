<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Oner;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    // ---------------------------------------------------------------------------------Admin
    { $admin = new User();
        $admin->firstname = "Super";
        $admin->lastname = "Admin";
        $admin->email = "super@admin.com";
        $admin->password = bcrypt('123456');
        $admin->role = 'admin';
        $admin->email_verified_at = now();
        $admin->phone= '98531566';
        $admin->gender = 1;
        $admin->save();
        // -------------------------------------------------------------------------------Client
        $user = new User();
        $user->firstname = "User";
        $user->lastname = "client";
        $user->email = "demo@user.com";
        $user->password = bcrypt('123456');
        $user->role = 'user';
        $user->email_verified_at = now();
        $user->phone= '53262900';
        $user->gender = 1;
        $user->save();
        // --------------------------------------------------------------------------creator Event
        $user = new User();
        $user->firstname = "cevent";
        $user->lastname = "client";
        $user->email = "demoo@cevent.com";
        $user->password = bcrypt('123456');
        $user->email_verified_at = now();
        $user->role = 'cevent';
        $user->phone= '52262900';
         $user->gender = 2;
        //  ---------------------------------------------------------------- Owner Space
        $user->save();
        $user = new User();
        $user->firstname = "oner";
        $user->lastname = "client";
        $user->email = "demoo@oner.com";
        $user->email_verified_at = now();

        $user->password = bcrypt('123456');
        $user->role = 'oner';
        $user->phone= '54262900';
        $user->gender = 2;
        $user->save();
   
  
  
      
       
    }
}
