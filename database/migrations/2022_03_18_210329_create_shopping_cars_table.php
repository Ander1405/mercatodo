<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCarsTable extends Migration
{

    public function up(): void
    {
        Schema::create('shopping_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('shopping_cars');
    }
}
