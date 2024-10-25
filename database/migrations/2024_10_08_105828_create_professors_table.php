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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable(); // Photo URL or path
            $table->string('designation'); // Main designation
            $table->json('additional_designation')->nullable(); // Additional designations stored as JSON
            $table->string('mail_id')->unique();
            $table->string('linkedin')->nullable();
            $table->string('google_scholar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
