<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->unsignedBigInteger('category_id');
            $table->string('subcat',100)->nullable();
            $table->string('logo',200);
            $table->string('mobile',100)->unique();
            $table->string('address');
            $table->string('email',100)->unique();
            $table->string('password');
            
            $table->tinyInteger('active')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('main_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
