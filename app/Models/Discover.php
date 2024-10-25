<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discover extends Model
{
    use HasFactory;

    protected $table = 'discover';


    // protected $fillable = [
    //     'section_name', 
    //     'images', 
    //     'description',
    // ];
    protected $fillable = [
        'discovers',  // Allow mass assignment for 'discovers'
    ];

    protected $casts = [
        'discovers' => 'array',  // Cast the 'discovers' field to array
    ];

}
