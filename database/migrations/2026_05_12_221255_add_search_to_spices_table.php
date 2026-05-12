<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('spices', function (Blueprint $table) {

           DB::statement("ALTER TABLE spices ADD COLUMN search_vector tsvector GENERATED ALWAYS AS (to_tsvector('english', name)) STORED");
           DB::statement(" CREATE INDEX spices_search_vector_idx ON spices USING GIN(search_vector)");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spices', function (Blueprint $table) {
            //
        });
    }
};
