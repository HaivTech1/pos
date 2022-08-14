<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique();
            $table->string('title');
            $table->string('brand')->nullable();
            $table->string('slug')->nullable();
            $table->double('price');
            $table->double('discount')->nullable();
            $table->integer('qty')->default(1);
            $table->integer('alert_stock')->default('100');
            $table->text('product_code')->nullable();
            $table->string('qrcode')->nullable();
            $table->text('barcode')->nullable();
            $table->longText('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('isAvailable')->default(0);
            $table->foreignId('product_category_id')->constrained('product_categories')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}