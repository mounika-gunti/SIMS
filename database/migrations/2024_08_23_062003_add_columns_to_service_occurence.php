<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_occurence', function (Blueprint $table) {
            $table->string('from_date')->after('to_month');
            $table->string('to_date')->after('from_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_occurence', function (Blueprint $table) {
            //
        });
    }
};
