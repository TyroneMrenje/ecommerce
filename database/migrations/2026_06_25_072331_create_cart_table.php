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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('session_id')->nullable();
            $table->timestamps();
        });


        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spice_id')->constrained('spices')->cascadeOnDelete();
            $table->integer('quantity');
            $table->integer('weight');
            $table->decimal('total_price',8,2);
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
