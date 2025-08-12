<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dna_mutation_logs', function (Blueprint $table) {
            $table->string('dna_sequence');
            $table->boolean('has_mutation');
        });
    }

    public function down(): void
    {
        Schema::table('dna_mutation_logs', function (Blueprint $table) {
            $table->dropColumn(['dna_sequence', 'has_mutation']);
        });
    }
};