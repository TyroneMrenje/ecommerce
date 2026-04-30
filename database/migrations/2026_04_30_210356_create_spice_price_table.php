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

       Schema::create('spice_price', function(Blueprint $table){
            $table->id();
            $table->foreignId('spice_format_id')->constrained('spice_format');
            $table->integer('weight');
            $table->string('weight_unit')->default('g');
            $table->decimal('price',8, 2);
            $table->unique(['weight','spice_format_id']);
            $table->timestamps();
       });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spice_price');
    }
};
