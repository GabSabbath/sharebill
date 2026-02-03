<?php

use App\Models\Category;
use App\Models\Home;
use App\Models\Settlement;
use App\Models\Transaction;
use App\Models\User;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Home::class);
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Home::class);
        });

        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class);
        });

        Schema::create('simple_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->morphs(Transaction::class);

            $table->date('date');
            $table->text('name');
            $table->text('comment')->nullable();
        });

        Schema::create('split_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->morphs(Transaction::class);
            // Transaction that this Split contributes to
            $table->foreignIdFor(Settlement::class);
            $table->foreignId('original_transaction')->constrained('transactions');
        });

        Schema::create('settlements', function (Blueprint $table) {
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
        Schema::dropIfExists('simpletransactions');
        Schema::dropIfExists('split_transactions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('settliments');
    }
};
