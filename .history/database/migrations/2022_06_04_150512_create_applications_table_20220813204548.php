<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('email')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->integer('logistic')->nullable();
            $table->integer('cleaning')->nullable();
            $table->string('slogan')->nullable();
            $table->string('motto')->nullable();
            $table->string('regNo')->nullable();
            $table->text('description')->nullable();
            $table->string('currency')->nullable();
            $table->string('country')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('decimal_number')->nullable();
            $table->string('transac_report_alias')->nullable();
            $table->string('order_invoice_alias')->nullable();
            $table->boolean('cashier_setting')->default(0);
            $table->boolean('product_preview')->default(0);
            $table->double('tax')->nullable();
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
        Schema::dropIfExists('applications');
    }
}