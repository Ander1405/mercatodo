<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('name',50);
            $table->text('description')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('price');
            $table->string('storage');
            $table->string('ram');
            $table->string('processor');
            $table->string('graph');
            $table->string('brand');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('status', ['enabled', 'disabled']);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
