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
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete(); // null for guest
            $table->string('session_id')->nullable()->index(); // for guest cart
            $table->timestamps();

            $table->index('user_id');
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('cart')->cascadeOnDelete();
            $table->foreignId('spice_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('spice_price_id'); 
            $table->string('name');        
            $table->decimal('price', 8, 2);  
            $table->string('weight');        
            $table->string('weight_unit');  
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->unique(['cart_id', 'spice_price_id']); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('cart'); 
    }

};
