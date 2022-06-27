<?php

namespace App\Listeners;

use App\Events\NewProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;

class SendEmailAfterNewProduct implements ShouldQueue
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
     * @param  \App\Events\NewProduct  $event
     * @return void
     */
    public function handle(NewProduct $event)
    {
        // Tam dung 10 phut
        // $fileName = '$event->order->id' . '.txt';
        // $data = 'Sản phẩm mới tạo: ' . '$event->order->amount' . ' với ID: ' . '$event->note->id';
        // File::put(public_path('/txt/' . $fileName), $data);
        return true;
    }
}
