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
        Schema::create('fundedresearch', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')
                ->constrained()
                ->onDelete('cascade'); // Ensures that deleting a menu will delete related startups

            // Foreign key referencing the submenus table
            $table->foreignId('submenu_id')
                ->constrained()
                ->onDelete('cascade'); // Ensures that deleting a submenu will delete related startups
            $table->string('from_year');
            $table->string('to_year');
            $table->string('agency');
            $table->string('topic');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundedresearch');
    }
};
