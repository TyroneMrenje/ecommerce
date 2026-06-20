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
    // drop if exists first
    DB::statement("ALTER TABLE spices DROP COLUMN IF EXISTS search_vector");
    
    DB::statement("
        ALTER TABLE spices 
        ADD COLUMN search_vector tsvector 
        GENERATED ALWAYS AS (to_tsvector('english', name)) STORED
    ");

    DB::statement("
        CREATE INDEX IF NOT EXISTS spices_search_vector_idx 
        ON spices USING GIN(search_vector)
    ");
}

public function down(): void
{
    DB::statement("DROP INDEX IF EXISTS spices_search_vector_idx");
    DB::statement("ALTER TABLE spices DROP COLUMN IF EXISTS search_vector");
}
};
