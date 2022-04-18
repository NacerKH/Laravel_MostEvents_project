<?php

namespace App\Console\Commands;
use App\Models\User;

use Carbon\Carbon;
use App\Models\Oner;
use App\Models\Cevent;
use App\Traits\ExpirationTrait;
use Illuminate\Console\Command;
use App\Jobs\SendSubscriptionExpireMessageJob;

class Expiration extends Command
{ use ExpirationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users every month automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $owners = Oner::where('subscription_end_date', '<' ,now())->where('expire',0)->get();
        
        foreach ($owners as $owner ){
            $user= User::where('id',$owner->user_id)->first();
           $owner-> update(['expire' => 1]);
           $expire_date= Carbon::createFromFormat('Y-m-d',$owner->subscription_end_date) ->toDateString();
          dispatch(new SendSubscriptionExpireMessageJob($user,$expire_date))->onQueue('expired');;
        }
        // $creatos = Cevent::where('expire', 0)->get() ;
        $creatos = Cevent::where('subscription_end_date', '<' ,now())->where('expire',0)->get();
        foreach ($creatos as $creato ){
            $user=User::where('id',$creato->cevent_id)->first();
            $expire_date= Carbon::createFromFormat('Y-m-d',$creato->subscription_end_date) ->toDateString();
            dispatch(new SendSubscriptionExpireMessageJob($user,$expire_date))->onQueue('expired');
            $creato-> update(['expire' => 1]);
         }
    }
}
