<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'menu_id', 'subparent_name',];

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'menu_id');
    }
    public function startups()
    {
        return $this->hasMany(Startups::class); // Assuming submenus have multiple startups
    }

    public function research()
    {
        return $this->hasMany(Research::class);
    }

    public function product()
    {
        return $this->hasMany(Products::class);
    }

    public function fundedresearch()
    {
        return $this->hasMany(FundedResearch::class);
    }

    public function students()
    {
        return $this->hasMany(Students::class);
    }
    public function professors()
    {
        return $this->hasMany(Professors::class);
    }
}
