<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{

    public function up(): void
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->enum('type',['products','amortization']);
            $table->string('filename');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('exports');
    }
}
