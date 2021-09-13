<?php

namespace App\Providers;

use App\Providers\IncompleteCart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIncompleteCartNotification
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
     * @param  IncompleteCart  $event
     * @return void
     */
    public function handle(IncompleteCart $event)
    {
        //
    }
}
