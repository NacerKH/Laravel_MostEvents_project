<?php

namespace App\Listeners;
use App\Events\VideoViewerPage;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PhpParser\Node\Expr\New_;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(VideoViewerPage $event)
    {
       $this-> UpdateViewer($event->viewer);
    }
    public function UpdateViewer($viewer)
    {
        $viewer -> viewers =  $viewer -> viewers + 1;
        
        $viewer -> save();
    }
}
