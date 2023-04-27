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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type_id')->constrained(table: 'resaurant_categories', indexName: 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->text('address');
            $table->bigInteger('phone');
            $table->bigInteger('account');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};