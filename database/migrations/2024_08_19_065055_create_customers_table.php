<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('credit_days')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('shipping_country_id');
            $table->unsignedBigInteger('shipping_state_id');
            $table->unsignedBigInteger('shipping_city_id');
            $table->text('shipping_address');
            $table->unsignedBigInteger('billing_country_id');
            $table->unsignedBigInteger('billing_state_id');
            $table->unsignedBigInteger('billing_city_id');
            $table->text('billing_address');
            $table->string('gst_number');
            $table->unsignedBigInteger('assigned_to');
            $table->timestamps();
            $table->foreign('shipping_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('shipping_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('shipping_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('billing_country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('billing_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('billing_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('employees')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};