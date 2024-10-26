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
        Schema::create('transportation_modes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id') // Foreign key to barangays table
            ->constrained() // This links to the barangays table
            ->onDelete('cascade');
            $table->string('mode_of_transpo'); // e.g., "Barangay Health Center"
            $table->boolean('available')->nullable(); // For yes/no radio
            $table->string('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_modes');
    }
};
