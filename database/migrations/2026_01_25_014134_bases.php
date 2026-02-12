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
        // Users
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Home::class)->nullable();
            $table->softDeletes();

            $table->text('color')->comment('in hexcode, including the #')->nullable();
        });

        // Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->text('name');
            $table->enum('type', ['need', 'want', 'investment']);

            $table->text('color')->comment('in hexcode, including the #')->nullable();
            $table->foreignIdFor(Home::class);
        });

        // Homes
        Schema::create('homes', function (Blueprint $table) {
            $table->uuid();
        });

        // Transactions
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();

            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class);

            $table->date('date');
            $table->text('name');
            $table->text('comment')->nullable();
        });

        // SimpleTransactions
        Schema::create('simple_transactions', function (Blueprint $table) {
            $table->id();
            $table->morphs(Transaction::class);
            $table->float('original_amount', 2);
        });

        // SplitTransactions
        Schema::create('split_transactions', function (Blueprint $table) {
            $table->id();
            $table->morphs(Transaction::class);
            // Transaction that this Split contributes to
            $table->foreignIdFor(Settlement::class);
            $table->foreignId('original_transaction')->constrained('simple_transactions');

            $table->float('amount', 2);
        });

        // Settlements
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Sender')->constrained('users');
            $table->foreignId('Receiver')->constrained('users');

            $table->date('date');
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
        Schema::dropIfExists('settlements');
    }
};
