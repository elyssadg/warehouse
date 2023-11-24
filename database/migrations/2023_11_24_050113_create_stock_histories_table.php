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
        Schema::create('stock_histories', function (Blueprint $table) {
            $table->id('stock_id');
            $table->foreignId('warehouse_id')->constrained('warehouses', 'warehouse_id');
            $table->foreignId('product_id')->constrained('products', 'product_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->integer('current_stock');
            $table->string('transaction_type');
            $table->integer('transaction_value');
            $table->dateTime('insert_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_histories');
    }
};
