<?php

namespace App\Jobs;

use App\Mail\OrderSendEmail;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class OrderSendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // if job failes,it can 7 min retry,after this job can't work.
    public function retryUntil()
    {
        return now()->addMinutes(7);
    }

    // if jobs take long 60 second,this job can't work.
    public $timeout = 60;

    // if $timeout is pass,$failTimeOut is work.
    public $failOnTimeout = true;

    protected $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->onQueue('checkout');
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orderMail = new OrderSendEmail($this->order);
        Mail::to($this->order)->send($orderMail);
    }

    public function failed(Throwable $e)
    {
        // return $e;
    }
}
