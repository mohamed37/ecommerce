<?php

namespace App\Notifications;

use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class OrderNotify extends Notification
{
    use Queueable;
    private $products;
   
    public function __construct($products)
    {
        $this->products = $products;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

   

   
    public function toDatabase($notifiable)
    {
        return [
            'greeting' => 'Hi Artisan',
            'body' => 'This is our example notification tutorial',
            'thanks' => 'Thank you for visiting codechief.org!',
        ];
                    
    }

  
}
