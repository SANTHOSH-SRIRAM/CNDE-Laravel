<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['logo_paths', 'section']; // Fillable attributes
    protected $table = 'clients'; // Table name

    protected $casts = [
        'logo_paths' => 'array', // Cast the logo_paths to an array
    ];
}
