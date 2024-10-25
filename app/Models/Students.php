<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    // Cast methods to array for easy handling
    protected $fillable = [
        'menu_id',
        'submenu_id',
        'students', // Store methods as JSON
    ];

    // Ensure 'methods' is cast to an array when retrieving
    protected $casts = [
        'students' => 'array',
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
