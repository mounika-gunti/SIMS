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
        Schema::create('menu_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('menu_id');
            $table->boolean('is_alloted');
            $table->boolean('all')->default(false);
            $table->boolean('add')->default(false);
            $table->boolean('edit')->default(false);
            $table->boolean('view')->default(false);
            $table->boolean('delete')->default(false);
            $table->timestamps();


            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->foreign('menu_id')
                ->references('id')->on('menus')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_roles');
    }
};