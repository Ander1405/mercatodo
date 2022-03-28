<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmortizationsTable extends Migration
{

    public function up(): void
    {
        Schema::create('amortizations', function (Blueprint $table) {
            $table->id();
            $table->string('reference',40)->unique();
            $table->string('receipt')->nullable();
            $table->string('payer_document')->nullable();
            $table->string('payer_ip')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('amount');
            $table->string('status')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('process_url',255)->nullable();
            $table->string('request_id', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('shopping_car_id');
            $table->foreign('shopping_car_id')
                ->references('id')
                ->on('shopping_cars');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('amortizations');
    }
}
