<?php

namespace App\Listeners;

use App\Events\IncompleteCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendIncompleteCartNotification implements ShouldQueue
{
    
    use InteractsWithQueue;

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
     * @param  IncompleteCart  $event
     * @return void
     */
    public function handle(IncompleteCart $event)
    {
        Log::alert("your products in shopping cart . $event->user");
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\IncompleteCart  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(IncompleteCart $event, $exception)
    {
        //
    }
}
