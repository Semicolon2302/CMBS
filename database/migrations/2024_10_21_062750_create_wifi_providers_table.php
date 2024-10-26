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
        Schema::create('wifi_providers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('barangay_id') 
                ->constrained()
                ->onDelete('cascade'); // Delete providers if the associated ICT entry is deleted
            $table->string('question');
            $table->string('provider')->nullable(); // Provider name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wifi_providers');
    }
};
