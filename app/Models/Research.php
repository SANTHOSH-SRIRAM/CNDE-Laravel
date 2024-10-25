<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    

    protected $table = 'research';
    // Cast methods to array for easy handling
    protected $fillable = [
        'menu_id',
        'submenu_id',
        'name',
        'methods', // Store methods as JSON
    ];

    // Ensure 'methods' is cast to an array when retrieving
    protected $casts = [
        'methods' => 'array',
    ];

    /**
     * Relationship to the Menu model.
     * This links the research to a specific menu.
     */
    public function menu()
    {
        return $this->belongsTo(Menus::class, 'menu_id');
    }

    /**
     * Relationship to the Submenu model.
     * This links the research to a specific submenu.
     */
    public function submenu()
    {
        return $this->belongsTo(Submenu::class, 'submenu_id');
    }
}
