<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundedResearch extends Model
{
    use HasFactory;

    protected $table = 'fundedresearch';
    // Cast methods to array for easy handling
    protected $fillable = [
        'menu_id',
        'submenu_id',
        'from_year', // Store methods as JSON
        'to_year', // Store methods as JSON
        'agency', // Store methods as JSON
        'topic', // Store methods as JSON
        'status', // Store methods as JSON
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
