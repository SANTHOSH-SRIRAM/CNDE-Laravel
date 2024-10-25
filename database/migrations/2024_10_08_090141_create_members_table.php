<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Member name
            $table->string('role'); // Member role
            $table->string('email')->nullable(); // Member email
            $table->string('photo')->nullable(); // Photo file path
            $table->foreignId('startup_id')->constrained()->onDelete('cascade'); // Foreign key relationship to startups
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
}
