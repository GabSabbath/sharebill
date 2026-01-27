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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        
        Schema::create('simple_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('split_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('homes');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('simpletransactions');
        Schema::dropIfExists('split_transactions');
    }
};
