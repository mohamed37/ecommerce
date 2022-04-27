<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',150);
            $table->string('lastname',150);
            $table->string('username',150)->unique();
            $table->string('email',150)->unique();
            $table->string('password');
            $table->string('phone',200);
            $table->string('age',150);
            $table->string('photo',150);
            $table->string('card_number',150)->unique();
            $table->string('address',150);
           
            $table->tinyInteger('expire')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
