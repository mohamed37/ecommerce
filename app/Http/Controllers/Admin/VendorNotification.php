<?php

namespace App\Http\Controllers\Admin;

use Pusher\Pusher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorNotification extends Controller
{
    public function notify()
    {
        $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'encrypted' => true
                        );
        $pusher = new Pusher(
                            env('PUSHER_APP_KEY'),
                            env('PUSHER_APP_SECRET'),
                            env('PUSHER_APP_ID'), 
                            $options
                        );

        $data['message'] = 'hello investmentnovel';
        $pusher->trigger('my-channel', 'App\\Events\\MyEvent', $data);

    }
}
