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
        Schema::create('surplus_items', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->string('image')->nullable();
            $table->decimal('original_price', 8, 2);
            $table->decimal('discounted_price', 8, 2);
            $table->integer('quantity');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surplus_items');
    }
};
