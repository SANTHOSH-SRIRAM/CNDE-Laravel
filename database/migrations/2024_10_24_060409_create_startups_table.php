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
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
                        // Foreign key referencing the menus table
                        $table->foreignId('menu_id')
                        ->constrained()
                        ->onDelete('cascade'); // Ensures that deleting a menu will delete related startups
        
                    // Foreign key referencing the submenus table
                    $table->foreignId('submenu_id')
                        ->constrained()
                        ->onDelete('cascade'); // Ensures that deleting a submenu will delete related startups
        
                    // Other fields
                    $table->string('logo'); // Path to logo image
                    $table->text('vision'); // Vision of the startup
                    $table->text('mission'); // Mission of the startup
                    $table->text('about'); // Information about the startup
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startups');
    }
};
