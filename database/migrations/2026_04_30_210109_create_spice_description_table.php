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
        
       Schema::create('spice_description', function(Blueprint $table){
            $table->id();
            $table->foreignId('spices_id')->constrained('spices')->cascadeOnDelete();
            $table->foreignId('spice_format_id')->constrained('spice_format')->cascadeOnDelete();
            $table->unique(['spices_id','spice_format_id']);
            $table->timestamps();
            $table->string('image');

       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spice_description');
    }
};
