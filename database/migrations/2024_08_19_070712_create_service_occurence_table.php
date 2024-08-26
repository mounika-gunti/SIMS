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
        Schema::create('service_occurence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->enum('frequency_type', ['monthly', 'quarterly', 'biannually', 'annually', 'onetime']);
            $table->string('month_name')->nullable();
            $table->string('quarter_name')->nullable();
            $table->enum('biannual_name', ['first', 'second'])->nullable();
            $table->string('from_day');
            $table->string('to_day');
            $table->string('from_month')->nullable();
            $table->string('to_month')->nullable();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_occurence');
    }
};