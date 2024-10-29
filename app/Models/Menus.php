<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $table = 'menus';

    public function submenus()
    {
        return $this->hasMany(Submenu::class, 'menu_id');
    }
    public function professors()
    {
        return $this->hasMany(Professors::class);
    }
    
}
