<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->string('slug',150)->nullable();
            $table->string('photo',150)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            /* $table->collation ='utf8_general_ci';
            $table->charset = 'utf8'; */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_categories');
    }
}
