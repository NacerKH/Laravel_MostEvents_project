<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Mail\NotfiyExpiredUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSubscriptionExpireMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $user;
    private $expireDate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$expireDate)
    {
        $this->user = $user;
        $this->expireDate =$expireDate;
    }
    

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {     
            // $user=User::where('id',$this->owner->user_id)->first();
        info('im here inside send job class');
        $data =[
            'subject'=>'your subscription expired',
            'email'=> $this->user -> email,
            'message' => 'your must update your subscription',
            'name'=> $this->user ->name,
        ];    

        Mail::to($this->user-> email)->send(new NotfiyExpiredUsers($data));
    }
}
