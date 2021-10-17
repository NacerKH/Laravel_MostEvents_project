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
    { $admin = new User();
        $admin->firstname = "Super";
        $admin->lastname = "Admin";
        $admin->email = "super@admin.com";
        $admin->password = bcrypt('123456');
        $admin->role = 'admin';
        $admin->gender = 1;
        $admin->save();
        $user = new User();
        $user->firstname = "User";
        $user->lastname = "client";
        $user->email = "demo@user.com";
        $user->password = bcrypt('123456');
        $user->role = 'user';
        $user->gender = 1;
        $user->save();
        $user = new User();
        $user->firstname = "cevent";
        $user->lastname = "client";
        $user->email = "demoo@cevent.com";
        $user->password = bcrypt('123456');
        $user->role = 'user';
        $user->gender = 2;
        $user->save();
        $user = new User();
        $user->firstname = "oner";
        $user->lastname = "client";
        $user->email = "demoo@oner.com";
        $user->password = bcrypt('123456');
        $user->role = 'oner';
        $user->gender = 2;
        $oner= new Oner();
        $oner->name="california";
        $oner->active = "true";
        $oner->user_id= $user->id;
        $user->save();
        $oner->save();
  
  
      
       
    }
}
