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
        Schema::create('patents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('inventors');
            $table->string('priority_Date');
            $table->string('country');
            $table->string('reference');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patents');
    }
};
