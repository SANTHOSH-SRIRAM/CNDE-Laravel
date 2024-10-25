<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Startups extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'submenu_id', 'logo', 'vision', 'mission', 'about'];

    // Mutator to store the file path when a logo is uploaded
    public function setLogoAttribute($value)
    {
        if ($value) {
            // Store the uploaded file and get its path
            $this->attributes['logo'] = Storage::disk('public')->put('logos', $value);
        }
    }

    // Accessor to retrieve the full URL of the logo
    public function getLogoUrlAttribute()
    {
        if ($this->attributes['logo']) {
            // Return the full URL of the stored logo file
            return Storage::disk('public')->url($this->attributes['logo']);
        }
        return null;
    }

    public function menu()
    {
        return $this->belongsTo(Menus::class);
    }

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
    public function startups()
{
    return $this->hasMany(Startups::class); // Assuming submenus have multiple startups
}

}
