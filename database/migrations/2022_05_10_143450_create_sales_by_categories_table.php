<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesByCategoriesTable extends Migration
{

    public function up(): void
    {
        Schema::create('sales_by_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id');
            $table->string('category');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sales_by_categories');
    }
}
