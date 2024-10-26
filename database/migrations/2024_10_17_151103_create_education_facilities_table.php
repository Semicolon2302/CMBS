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
        Schema::create('education_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id') // Foreign key to barangays table
            ->constrained() // This links to the barangays table
            ->onDelete('cascade');
            $table->string('facility_type'); // e.g., "Barangay Health Center"
            $table->boolean('available')->nullable(); // For yes/no radio
            $table->string('distance')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('dimension')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('institution')->nullable(); // e.g., "Private", "Public", etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_facilities');
    }
};
