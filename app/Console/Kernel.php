<?php

namespace App\Console;

use App\Console\Commands\Notify;
use App\Console\Commands\Expiration;
use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\SendSubscriptionExpireMessageJob;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Expiration::class,
        // Notify::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {   
        // $schedule->command('inspire')->hourly();
        $schedule->command('user:expire')->everyMinute();
        if (stripos((string) shell_exec('ps xf | grep \'[q]ueue:work\''), 'artisan queue:work') === false) {
            $schedule->command('queue:work --queue=expired --sleep=2 --tries=3 --timeout=5')->everyMinute()->appendOutputTo(storage_path() . '/logs/scheduler.log');
        }
        // $schedule->command('Notify:email')->daily();
        
        $schedule->command('authentication-log:purge')->monthly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
