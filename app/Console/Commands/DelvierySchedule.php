<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Delivery;


class DelvierySchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delivery:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Choose Delivery';

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
       $delivers = Delivery::Expiretion()->get();

       foreach($delivers as $delivery)
       {
           $delivery->update(['expire' => 0]);
       }

    }
}
